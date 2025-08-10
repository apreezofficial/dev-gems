<?php
header('Content-Type: application/json');
require_once '../db/db_connect.php';
require_once '../functions/general/functions.php';


// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$email = filter_var($input['email'] ?? '', FILTER_SANITIZE_EMAIL);

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Valid email is required']);
    exit;
}

// Check if email exists in the users table
try {
    $stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'No account found with this email']);
        exit;
    }

    // Generate a unique reset token
    $token = bin2hex(random_bytes(32));
    $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expires in 1 hour

    // Store the token in the password_reset_tokens table
    $stmt = $conn->prepare('INSERT INTO password_reset_tokens (user_id, token, expires_at) VALUES (?, ?, ?)');
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }
    $stmt->bind_param('iss', $user['id'], $token, $expiresAt);
    if (!$stmt->execute()) {
        throw new Exception('Failed to store reset token: ' . $stmt->error);
    }

    // Create reset link
    $resetLink = 'https://0.0.0.0:3360/reset.php?token=' . $token;

    // Send email using the sendMail function
    $subject = 'Password Reset Request';
    $html = '
        <h2>Reset Your Password</h2>
        <p>Click the link below to reset your password. This link will expire in 1 hour.</p>
        <p><a href="' . $resetLink . '">Reset Password</a></p>
        <p>If you did not request this, please ignore this email.</p>
    ';

    if (sendMail($email, $subject, $html)) {
        echo json_encode(['success' => true, 'message' => 'Password reset link sent to your email']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to send reset email. Please try again.']);
    }
} catch (Exception $e) {
    error_log('Error in forgot.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error. Please try again later.']);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
}
?>