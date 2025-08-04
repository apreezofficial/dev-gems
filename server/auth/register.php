<?php

header('Content-Type: application/json');
session_start();
require_once '../db/db_connect.php';
require_once '../functions/general/functions.php';

if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
    $data = json_decode(file_get_contents('php://input'), true);
    $_POST = $data;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    // SEND VERIFICATION CODE
    if ($_POST['action'] === 'send_code') {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);

        // check if email already used
        $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            http_response_code(409); 
            echo json_encode(['status' => 'error', 'message' => 'email already exists']);
            exit;
        }
        $check->close();

        $code = rand(100000, 999999);
        $_SESSION['verify_code'] = $code;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        $html = "<p>Hey $username,</p><p>Your verification code is <b>$code</b></p>";
        if (!sendMail($email, 'Your verification code', $html)) {
            http_response_code(500); 
            echo json_encode(['status' => 'error', 'message' => 'failed to send email']);
            exit;
        }

        http_response_code(200);
        echo json_encode(['status' => 'success', 'message' => 'verification code sent']);
        exit;
    }

    // VERIFY CODE
    if ($_POST['action'] === 'verify_code') {
        $code = $_POST['code'];

        if (!isset($_SESSION['verify_code']) || $code != $_SESSION['verify_code']) {
            http_response_code(400); 
            echo json_encode(['status' => 'error', 'message' => 'wrong code']);
            exit;
        }

        $_SESSION['verified'] = true;
        http_response_code(200); 
        echo json_encode(['status' => 'success', 'message' => 'code verified, continue registration']);
        exit;
    }

    // FINALIZE REGISTRATION
    if ($_POST['action'] === 'finalize_registration') {
        if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
            http_response_code(403); 
            echo json_encode(['status' => 'error', 'message' => 'code verification required']);
            exit;
        }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Handle profile image 
        $imageUrl = null;
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
            $imageUrl = uploadToCloudinary($_FILES['profile_image']['tmp_name']); 
        }

        $bio = isset($_POST['bio']) ? trim($_POST['bio']) : null;

        $username = $_SESSION['username'];
        $email = $_SESSION['email'];

        $stmt = $conn->prepare("UPDATE users SET password = ?, profile_image = ?, bio = ?, verified = 1 WHERE email = ?");
        $stmt->bind_param("ssss", $password, $imageUrl, $bio, $email);

        if ($stmt->execute()) {
            session_destroy();
            http_response_code(200); 
            echo json_encode(['status' => 'success', 'message' => 'registration completed']);
            exit;
        } else {
            http_response_code(500); 
            echo json_encode(['status' => 'error', 'message' => 'database error saving user details']);
            exit;
        }
    }

    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'invalid action']);
    exit;
}
?>