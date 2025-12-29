<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <style>
        .error-container {
            text-align: center;
            padding: 50px;
            font-family: Arial, sans-serif;
        }
        .error-code {
            font-size: 72px;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <h1>Page Not Found</h1>
        <p>The page you requested could not be found.</p>
        <a href="<?php echo base_url(); ?>">Return to Homepage</a>
    </div>
</body>
</html>