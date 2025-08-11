<?php
session_start();
require_once '../db/db_connect.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

try {
    // Generate unique room ID
    $room_id = bin2hex(random_bytes(8));
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare('INSERT INTO calls (room_id, user_id, created_at) VALUES (?, ?, NOW())');
    $stmt->bind_param('si', $room_id, $user_id);
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'room_id' => $room_id]);
    } else {
        throw new Exception('Failed to create call');
    }
    $stmt->close();
} catch (Exception $e) {
    error_log('Error in start_call.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error']);
} finally {
    $conn->close();
}
?>