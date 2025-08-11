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
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare('SELECT room_id, created_at, duration FROM calls WHERE user_id = ? ORDER BY created_at DESC LIMIT 10');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $calls = [];
    while ($row = $result->fetch_assoc()) {
        $calls[] = $row;
    }
    $stmt->close();

    echo json_encode(['success' => true, 'calls' => $calls]);
} catch (Exception $e) {
    error_log('Error in call_history.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error']);
} finally {
    $conn->close();
}
?>