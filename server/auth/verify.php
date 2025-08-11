<?php
header('Content-Type: application/json');
require_once '../db/db_connect.php'; // Your MySQLi connection
session_start();

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$email = $_SESSION['email_to_verify'] ?? '';
$code = filter_var($input['code'] ?? '', FILTER_SANITIZE_STRING);

try {
    if (empty($email) || empty($code)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }
    if (!preg_match('/^\d{4}$/', $code)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please enter a valid 4-digit code']);
        exit;
    }

    // Check if code matches
    $stmt = $conn->prepare('SELECT verification_code FROM users WHERE email = ? AND is_verified = 0');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid or already verified email']);
        exit;
    }

    if ($user['verification_code'] === $code) {
        // Mark user as verified
        $stmt = $conn->prepare('UPDATE users SET is_verified = 1, verification_code = NULL WHERE email = ?');
        if (!$stmt) {
            throw new Exception('Failed to prepare statement: ' . $conn->error);
        }
        $stmt->bind_param('s', $email);
        if ($stmt->execute()) {
            unset($_SESSION['email_to_verify']);
            echo json_encode(['success' => true, 'message' => 'Email verified successfully!']);
        } else {
            throw new Exception('Failed to verify user: ' . $stmt->error);
        }
        $stmt->close();
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid verification code']);
    }
} catch (Exception $e) {
    error_log('Error in verify.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error. Please try again later.']);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
}
?>