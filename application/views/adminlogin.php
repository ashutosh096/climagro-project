<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title;?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0a1628 0%, #1a2940 50%, #0d1f3c 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* Animated background elements */
        .bg-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }
        
        .bg-shapes .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(2, 91, 95, 0.25);
            animation: float 20s infinite ease-in-out;
        }
        
        .bg-shapes .shape:nth-child(1) {
            width: 500px;
            height: 500px;
            top: -200px;
            right: -100px;
            animation-delay: 0s;
        }
        
        .bg-shapes .shape:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: -100px;
            left: -100px;
            animation-delay: -5s;
        }
        
        .bg-shapes .shape:nth-child(3) {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -10s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(10deg); }
        }
        
        .login-container {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 48px 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .logo-container img {
            max-width: 180px;
            height: auto;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.3));
        }
        
        .login-title {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
        }
        
        .login-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 14px;
            text-align: center;
            margin-bottom: 32px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.4);
            font-size: 16px;
            transition: color 0.3s ease;
        }
        
        .form-control {
            width: 100%;
            height: 52px;
            padding: 0 16px 0 48px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #ffffff;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }
        
        .form-control:focus {
            outline: none;
            border-color: #025B5F;
            background: rgba(2, 91, 95, 0.15);
            box-shadow: 0 0 0 4px rgba(2, 91, 95, 0.2);
        }
        
        .form-control:focus + i,
        .input-wrapper:hover i {
            color: #025b5f;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 16px;
        }
        
        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }
        
        .btn-login {
            width: 100%;
            height: 52px;
            background: linear-gradient(135deg, #025B5F 0%, #22c55e 100%);
            border: none;
            border-radius: 12px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 8px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px -5px rgba(2, 91, 95, 0.5);
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .footer-text {
            text-align: center;
            margin-top: 24px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 12px;
        }
        
        .footer-text a {
            color: #22c55e;
            text-decoration: none;
        }
        
        /* Responsive */
        @media (max-width: 480px) {
            .login-card {
                padding: 32px 24px;
            }
            
            .login-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <!-- Animated Background -->
    <div class="bg-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <img src="<?php echo base_url('assest/uploadfile/'.$profiledetail->comp_logo); ?>" alt="Logo">
            </div>
            
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Sign in to your admin account</p>
            
            <?php if(isset($loginerror)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $loginerror; ?>
                </div>
            <?php endif; @$loginerror=''; ?>
            
            <?php echo form_error('email', '<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_error('password', '<div class="alert alert-danger">', '</div>'); ?>
            
            <?php echo form_open("adminlogin/accesslogin"); ?>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <input type="text" class="form-control" id="email" name="email" 
                               placeholder="Enter your email" value="<?php echo set_value('email'); ?>">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="Enter your password">
                        <i class="fas fa-lock"></i>
                    </div>
                </div>
                
                <button type="submit" class="btn-login" name="login">
                    Sign In <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </button>
            <?php echo form_close(); ?>
            
            <p class="footer-text">
                Powered by <a href="#">Climagro</a>
            </p>
        </div>
    </div>
</body>
</html>
