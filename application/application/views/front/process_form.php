<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$db_host = 'localhost';
$db_name = 'u404385609_climagro';
$db_user = 'myprojectuser';
$db_pass = 'Ak23@akshat';

// Email configuration
$to_email = 'akshatsan23@gmail.com';
$subject = 'New Contact Form Submission';

// Log file
$log_file = __DIR__ . '/form_errors.log';

// Basic validation
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    file_put_contents($log_file, "Invalid request method\n", FILE_APPEND);
    header('Location: index.html');
    exit();
}

// Get form data with sanitization
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$subject_option = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validate required fields
if (empty($name) || empty($email) || empty($message)) {
    file_put_contents($log_file, "Missing required fields\n", FILE_APPEND);
    header('Location: error.html?reason=missing-fields');
    exit();
}

try {
    // Connect to database with error handling
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    
    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO contact_form 
        (name, email, phone, subject, message, created_at) 
        VALUES (:name, :email, :phone, :subject, :message, NOW())");
    
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':subject' => $subject_option,
        ':message' => $message
    ]);
    
    // Prepare email content
    $email_content = "New Contact Form Submission:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Subject: $subject_option\n";
    $email_content .= "Message:\n$message\n";
    
    // Send email with additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    if (!mail($to_email, $subject, $email_content, $headers)) {
        file_put_contents($log_file, "Failed to send email\n", FILE_APPEND);
    }
    
    // Redirect to thank you page
    header('Location: ');
    exit();
    
} catch (PDOException $e) {
    $error_msg = "Database error: " . $e->getMessage() . "\n";
    file_put_contents($log_file, $error_msg, FILE_APPEND);
    header('Location: error.html?reason=db-error');
    exit();
} catch (Exception $e) {
    $error_msg = "General error: " . $e->getMessage() . "\n";
    file_put_contents($log_file, $error_msg, FILE_APPEND);
    header('Location: error.html?reason=general-error');
    exit();
}
?>