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

// Database credentials (dynamically loaded from CodeIgniter config)
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'u404385609_climagro';

$db_config_file = 'application/config/database.php';
if (file_exists($db_config_file)) {
    define('BASEPATH', true);
    define('ENVIRONMENT', 'production');
    include($db_config_file);
    if (isset($db['default'])) {
        $db_host = $db['default']['hostname'];
        $db_user = $db['default']['username'];
        $db_pass = $db['default']['password'];
        $db_name = $db['default']['database'];
    }
}

$conn = @new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$conn || $conn->connect_error) {
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

