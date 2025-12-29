<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration - USE THE SAME CREDENTIALS AS IN YOUR FORM PROCESSOR
$db_host = 'localhost';
$db_name = 'u404385609_climagro';
$db_user = 'myprojectuser';
$db_pass = 'Ak23@akshat';

echo "<h2>Testing Database Connection</h2>";

try {
    // Attempt connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC                
    ]);
    
    echo "<p style='color:green;'>✅ Successfully connected to database!</p>";
    
    // Test query
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll();
    
    echo "<h3>Database Tables:</h3>";
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li>" . reset($table) . "</li>";
    }
    echo "</ul>";
    
    // Verify contact_form table exists
    $stmt = $pdo->query("DESCRIBE contact_form");
    $columns = $stmt->fetchAll();
    
    echo "<h3>contact_form Table Structure:</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    foreach ($columns as $col) {
        echo "<tr>";
        echo "<td>{$col['Field']}</td>";
        echo "<td>{$col['Type']}</td>";
        echo "<td>{$col['Null']}</td>";
        echo "<td>{$col['Key']}</td>";
        echo "<td>{$col['Default']}</td>";
        echo "<td>{$col['Extra']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    
} catch (PDOException $e) {
    echo "<p style='color:red;'>❌ Connection failed: " . $e->getMessage() . "</p>";
    
    // Additional debugging info
    echo "<h3>Debug Information:</h3>";
    echo "<p>Host: $db_host</p>";
    echo "<p>Database: $db_name</p>";
    echo "<p>Username: $db_user</p>";
    echo "<p>Using password: " . (empty($db_pass) ? 'NO' : 'YES') . "</p>";
    
    // Check if MySQL is running
    echo "<h3>Port Check:</h3>";
    $port = 3306; // Default MySQL port
    $connection = @fsockopen($db_host, $port, $errno, $errstr, 5);
    if (is_resource($connection)) {
        echo "<p>MySQL is running on port $port</p>";
        fclose($connection);
    } else {
        echo "<p>Could not connect to MySQL on port $port: $errstr ($errno)</p>";
    }
}
?>