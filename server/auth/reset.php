<?php
header('Content-Type: application/json');
require_once '../db/db_connect.php';
require_once __DIR__ . '/../functions/general.php';

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$token = $input['token'] ?? '';
$password = $input['password'] ?? '';

if (empty($token) || empty($password)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Token and password are required']);
    exit;
}

// Validate password strength
if (strlen($password) < 8) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Password must be at least 8 characters long']);
    exit;
}

try {
    // Check if token exists and is valid
    $stmt = $conn->prepare('SELECT user_id, expires_at FROM password_reset_tokens WHERE token = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $tokenData = $result->fetch_assoc();
    $stmt->close();

    if (!$tokenData) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid or expired reset token']);
        exit;
    }

    // Check if token has expired
    $currentTime = date('Y-m-d H:i:s');
    if ($currentTime > $tokenData['expires_at']) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Reset token has expired']);
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the user's password
    $stmt = $conn->prepare('UPDATE users SET password = ? WHERE id = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('si', $hashedPassword, $tokenData['user_id']);
    if (!$stmt->execute()) {
        throw new Exception('Failed to update password: ' . $stmt->error);
    }
    $stmt->close();

    // Delete the used token
    $stmt = $conn->prepare('DELETE FROM password_reset_tokens WHERE token = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('s', $token);
    if (!$stmt->execute()) {
        error_log('Failed to delete token: ' . $stmt->error);
    }
    $stmt->close();

    $stmt = $conn->prepare('SELECT email FROM users WHERE id = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('i', $tokenData['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    $subject = 'Password Reset Confirmation';
    $html = '
        <h2>Password Reset Successfully</h2>
        <p>Your password for Meet has been successfully reset.</p>
        <p>If you did not perform this action, please contact support immediately.</p>
        <p><a href="https://0.0.0.0:3360/login.html">Log in to your account</a></p>
    ';

    if (!sendMail($user['email'], $subject, $html)) {
        error_log('Failed to send password reset confirmation email to ' . $user['email']);
    }

    echo json_encode(['success' => true, 'message' => 'Password reset successfully']);
} catch (Exception $e) {
    error_log('Error in reset.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error. Please try again later.']);
}
?>