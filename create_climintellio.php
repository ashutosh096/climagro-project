<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u404385609_climagro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS tbl_climintellio_requests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    request_type VARCHAR(100) DEFAULT NULL,
    location_method VARCHAR(100) DEFAULT NULL,
    hazards TEXT DEFAULT NULL,
    admin_level VARCHAR(100) DEFAULT NULL,
    country VARCHAR(100) DEFAULT 'India',
    states TEXT DEFAULT NULL,
    districts TEXT DEFAULT NULL,
    variables TEXT DEFAULT NULL,
    metrics TEXT DEFAULT NULL,
    coverage_type VARCHAR(100) DEFAULT NULL,
    hist_year_start INT(5) DEFAULT NULL,
    hist_year_end INT(5) DEFAULT NULL,
    future_year_start INT(5) DEFAULT NULL,
    future_year_end INT(5) DEFAULT NULL,
    scenarios TEXT DEFAULT NULL,
    format VARCHAR(50) DEFAULT NULL,
    user_name VARCHAR(255) DEFAULT NULL,
    user_email VARCHAR(255) DEFAULT NULL,
    user_org_type VARCHAR(100) DEFAULT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if ($conn->query($sql) === TRUE) {
    echo "Table tbl_climintellio_requests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
