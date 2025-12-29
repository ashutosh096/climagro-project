<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Climagro</title>
    
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
            background: linear-gradient(135deg, #0a1628 0%, #1a2940 50%, #0d1f3c 100%);
            min-height: 100vh;
            color: #ffffff;
        }
        
        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar-brand {
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .navbar-brand i {
            color: #025b5f;
            font-size: 28px;
        }
        
        .navbar-user {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .user-avatar {
            width: 42px;
            height: 42px;
            background: #025b5f;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .user-name {
            font-weight: 500;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            font-family: 'Inter', sans-serif;
        }
        
        .btn-danger {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .btn-danger:hover {
            background: rgba(239, 68, 68, 0.25);
        }
        
        /* Main Content */
        .main-content {
            padding: 40px 32px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Welcome Section */
        .welcome-section {
            margin-bottom: 48px;
        }
        
        .welcome-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .welcome-subtitle {
            color: rgba(255, 255, 255, 0.6);
            font-size: 16px;
        }
        
        .welcome-date {
            margin-top: 16px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        /* Quick Actions Grid */
        .section-title {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 20px;
        }
        
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }
        
        .action-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 28px;
            text-decoration: none;
            color: #ffffff;
            transition: all 0.3s ease;
            display: block;
        }
        
        .action-card:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(2, 91, 95, 0.5);
        }
        
        .card-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .card-icon.green {
            background: rgba(2, 91, 95, 0.3);
            color: #4fd1c5;
        }
        
        .card-icon.blue {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.3), rgba(99, 102, 241, 0.2));
            color: #60a5fa;
        }
        
        .card-icon.purple {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.3), rgba(192, 132, 252, 0.2));
            color: #a78bfa;
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .card-desc {
            color: rgba(255, 255, 255, 0.5);
            font-size: 13px;
            line-height: 1.5;
        }
        
        .card-arrow {
            margin-top: 20px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .action-card:hover .card-arrow {
            color: #025b5f;
            transform: translateX(4px);
        }
        
        /* Footer */
        .dashboard-footer {
            text-align: center;
            padding: 32px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 13px;
        }
        
        .dashboard-footer a {
            color: #025b5f;
            text-decoration: none;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 16px 20px;
            }
            
            .main-content {
                padding: 24px 20px;
            }
            
            .welcome-title {
                font-size: 28px;
            }
            
            .user-name {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php $adminDetail = $this->session->userdata("user_id"); ?>
    
    <!-- Navbar -->
    <nav class="navbar">
        <a href="<?php echo base_url('administrator/dashboard'); ?>" class="navbar-brand">
            <i class="fas fa-leaf"></i>
            Climagro
        </a>
        <div class="navbar-user">
            <div class="user-avatar">
                <?php echo strtoupper(substr($adminDetail->name ?? 'A', 0, 1)); ?>
            </div>
            <span class="user-name"><?php echo $adminDetail->name ?? 'Admin'; ?></span>
            <a href="<?php echo base_url('administrator/adminlogout'); ?>" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </nav>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1 class="welcome-title">Welcome back, <?php echo $adminDetail->name ?? 'Admin'; ?>!</h1>
            <p class="welcome-subtitle">Here's what's happening with your dashboard today.</p>
            <div class="welcome-date">
                <i class="fas fa-calendar"></i>
                <?php echo date('l, F j, Y'); ?>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <p class="section-title">Quick Actions</p>
        <div class="cards-grid">
            <a href="<?php echo base_url('administrator/managesubscribers'); ?>" class="action-card">
                <div class="card-icon green">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="card-title">Email Subscribers</h3>
                <p class="card-desc">View and manage newsletter subscribers. Download subscriber list as Excel.</p>
                <div class="card-arrow">
                    View Subscribers <i class="fas fa-arrow-right"></i>
                </div>
            </a>
            
            <a href="<?php echo base_url('administrator/managecontacts'); ?>" class="action-card">
                <div class="card-icon blue">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="card-title">Contact Submissions</h3>
                <p class="card-desc">View all contact form submissions. Export data to Excel for analysis.</p>
                <div class="card-arrow">
                    View Contacts <i class="fas fa-arrow-right"></i>
                </div>
            </a>
            
            <a href="<?php echo base_url(); ?>" target="_blank" class="action-card">
                <div class="card-icon purple">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="card-title">View Website</h3>
                <p class="card-desc">Open your website in a new tab to see how it looks to visitors.</p>
                <div class="card-arrow">
                    Open Website <i class="fas fa-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="dashboard-footer">
        <p>Powered by <a href="#">Climagro</a> &copy; <?php echo date('Y'); ?></p>
    </div>
</body>
</html>