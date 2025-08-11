<?php
header('Content-Type: application/json');
require_once '../db/db_connect.php'; // MySQLi connection
require_once '../functions/general/functions.php'; // sendMail function

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$username = filter_var($input['username'] ?? '', FILTER_SANITIZE_STRING);
$email = filter_var($input['email'] ?? '', FILTER_SANITIZE_EMAIL);
$password = $input['password'] ?? '';

try {
    // Server-side validation
    if (empty($username) || empty($email) || empty($password)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }
    if (strlen($password) < 6) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Password must be at least 6 characters long']);
        exit;
    }

    // Check for existing username
    $stmt = $conn->prepare('SELECT id FROM users WHERE username = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare username check: ' . $conn->error);
    }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    if ($stmt->get_result()->fetch_assoc()) {
        $stmt->close();
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Username already exists']);
        exit;
    }
    $stmt->close();

    // Check for existing email and its verification status
    $stmt = $conn->prepare('SELECT is_verified FROM users WHERE email = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare email check: ' . $conn->error);
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    // Generate 4-digit verification code
    $verification_code = sprintf("%04d", rand(0, 9999)); // Ensure 4 digits with leading zeros
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($user) {
        // Email exists
        if ($user['is_verified'] == 1) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Email already exists and is verified']);
            exit;
        }
        // Update existing unverified user
        $stmt = $conn->prepare('UPDATE users SET username = ?, password = ?, verification_code = ?, created_at = NOW() WHERE email = ?');
        if (!$stmt) {
            throw new Exception('Failed to prepare update: ' . $conn->error);
        }
        $stmt->bind_param('ssss', $username, $hashed_password, $verification_code, $email);
    } else {
        // Insert new user
        $stmt = $conn->prepare('INSERT INTO users (username, email, password, verification_code, is_verified) VALUES (?, ?, ?, ?, 0)');
        if (!$stmt) {
            throw new Exception('Failed to prepare insert: ' . $conn->error);
        }
        $stmt->bind_param('ssss', $username, $email, $hashed_password, $verification_code);
    }

    if (!$stmt->execute()) {
        throw new Exception('Failed to save user: ' . $stmt->error);
    }
    $stmt->close();

    // Send verification email
    $subject = 'Verify Your Meet Account';
    $html = '
        <h2>Verify Your Email</h2>
        <p>Hello ' . htmlspecialchars($username) . ',</p>
        <p>Your verification code is: <strong>' . $verification_code . '</strong></p>
        <p>Enter this code on the verification page to activate your account.</p>
        <p>If you did not sign up, please ignore this email.</p>
    ';

    session_start();
    $_SESSION['email_to_verify'] = $email;

    if (sendMail($email, $subject, $html)) {
        echo json_encode(['success' => true, 'message' => 'Registration successful! Please check your email for the verification code.']);
    } else {
        echo json_encode(['success' => true, 'message' => 'Registration successful! Please check your email for the verification code.']);
    }
} catch (Exception $e) {
    error_log('Error in signup.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error. Please try again later.']);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
}
?>