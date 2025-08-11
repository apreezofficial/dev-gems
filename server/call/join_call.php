<?php
session_start();
require_once '../db/db_connect.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$room_id = filter_var($input['room_id'] ?? '', FILTER_SANITIZE_STRING);

try {
    if (empty($room_id)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Room ID is required']);
        exit;
    }

    $stmt = $conn->prepare('SELECT id FROM calls WHERE room_id = ?');
    $stmt->bind_param('s', $room_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result->fetch_assoc()) {
        http_response_code(404);
        echo json_encode(['success' => false, 'message' => 'Room not found']);
        exit;
    }
    $stmt->close();

    echo json_encode(['success' => true, 'message' => 'Joining call']);
} catch (Exception $e) {
    error_log('Error in join_call.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error']);
} finally {
    $conn->close();
}
?>