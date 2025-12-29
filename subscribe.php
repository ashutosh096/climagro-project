<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Database credentials (same as in application/config/database.php)
$conn = new mysqli('localhost', 'root', '', 'u404385609_climagro');

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'You are already subscribed!']);
    $stmt->close();
    $conn->close();
    exit;
}
$stmt->close();

// Insert new subscriber
$stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Subscribed — check your inbox.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Could not save subscription']);
}

$stmt->close();
$conn->close();
exit;

