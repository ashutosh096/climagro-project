<?php
include("header.php");
include("navbar2.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Climate Data</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
        /* ========== RESET ========== */
        *{margin:0;padding:0;box-sizing:border-box}
        body{
          font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
          background:#f5f7fa;
          min-height:100vh;
          line-height:1.6;
          overflow-x:hidden;
        }
        
        /* ========== NAVBAR STYLES ========== */
        .header-area {
          background: #025b5f;
          box-shadow: 0 2px 10px rgba(2, 91, 95, 0.15);
          position: fixed;
          top: 0;
          left: 0;
          right: 0;
          z-index: 1100;
          color : #025b5f;
        }
        
        .xb-header {
          padding: 0;
        }
        
        .container {
          max-width: 1280px;
          margin: 0 auto;
          padding: 0 2rem;
          color : #025b5f;
        }
        
        .header__wrap {
          display: flex;
          align-items: center;
          justify-content: space-between;
          min-height: 70px;
          color : #025b5f;
        }
        
        .header-logo img {
          max-height: 50px;
          width: auto;
        }
        
        .main-menu__wrap {
          flex: 1;
          display: flex;
          justify-content: center;
        }
        
        .main-menu ul {
          display: flex;
          list-style: none;
          gap :15px;
          margin: 0;
          padding: 0;
          align-items: center;
          flex-wrap: nowrap;
        }
        
        .main-menu ul li {
          margin: 0 1.5rem;
          position: relative;
        }
        
        .main-menu ul li a {
          color: #fff;
          text-decoration: none;
          font-weight: 500;
          padding: 12px 0;
          transition: all 0.3s ease;
          display: block;
        }
        
        .main-menu ul li:hover > a {
          color: #4fc3c8;
        }
        
        /* Modern Dropdown Styles */
        .menu-item-has-children {
          position: relative;
        }
        
        .menu-item-has-children > a::after {
          content: "▼";
          font-size: 10px;
          margin-left: 6px;
          transition: transform 0.3s ease;
        }
        
        .menu-item-has-children:hover > a::after {
          transform: rotate(180deg);
        }
        
        .submenu {
          position: absolute;
          top: 100%;
          left: 0;
          width: 200px;
          background: #fff;
          border-radius: 8px;
          box-shadow: 0 10px 25px rgba(2, 91, 95, 0.2);
          opacity: 0;
          visibility: hidden;
          transform: translateY(10px);
          transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
          z-index: 100;
          padding: 8px 0;
          border: 1px solid #e1e5e9;
        }
        
        .menu-item-has-children:hover .submenu {
          opacity: 1;
          visibility: visible;
          transform: translateY(0);
        }
        
        .submenu li {
          margin: 0 !important;
        }
        
        .submenu a {
          display: block;
          padding: 12px 20px;
          color: #025b5f;
          font-size: 14px;
          transition: all 0.2s ease;
          position: relative;
        }
        
        .submenu a:hover {
          background: #f8fbfb;
          color: #025b5f;
          transform: translateX(4px);
        }
        
        .submenu a::before {
          content: "";
          position: absolute;
          left: 0;
          top: 0;
          height: 100%;
          width: 3px;
          background: #025b5f;
          transform: scaleY(0);
          transition: transform 0.2s ease;
        }
        
        .submenu a:hover::before {
          transform: scaleY(1);
        }
        
        .header-btn {
          display: flex;
          align-items: center;
          gap: 1rem;
        }
        
        .login-btn {
          background: linear-gradient(135deg, #025b5f 0%, #037a80 100%);
          color: white;
          padding: 12px 24px;
          border-radius: 6px;
          text-decoration: none;
          font-weight: 500;
          transition: all 0.3s ease;
        }
        
        .login-btn:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 16px rgba(2, 91, 95, 0.3);
        }
        
        .header-bar-mobile {
          display: none;
        }
        
        /* Mobile navbar styles */
        .xb-header-wrap {
          display: none;
        }
        
        @media (min-width: 769px) and (max-width: 991px) {
  .main-menu ul {
    gap: 10px; /* Further reduce gap for smaller desktop screens */
  }
  .main-menu a {
    padding: 12px 10px; /* Further reduce padding */
    font-size: 0.9rem; /* Slightly smaller font */
  }
}
        @media (max-width: 991px) {
          .main-menu {
            display: none;
          }
          
          .header-bar-mobile {
            display: block;
          }
          
          .xb-nav-mobile {
            background: #025b5f;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 18px;
          }
          
          .container {
            padding: 0 1rem;
          }
        }

        /* ---------- MAIN APP STYLES ---------- */
        :root {
          --nav-height: 70px;
          --primary-color: #025b5f;
          --primary-light: #037a80;
          --primary-dark: #014549;
          --accent-color: #4fc3c8;
        }

        .app-container{
          display:flex;
          min-height:100vh;
          padding-top: var(--nav-height);
        }
/* ========== SIDEBAR ========== */
.sidebar{
  width:340px;
  background:#fff;
  box-shadow:2px 0 10px rgba(2, 91, 95, 0.15);
  transition:transform .3s ease;
  position:fixed;
  top: var(--nav-height);
  left:0;
  height: calc(100vh - var(--nav-height));
  z-index:1000;
  overflow-y:auto;
  -ms-overflow-style:none;
  scrollbar-width:none;
  display: flex;
  flex-direction: column; /* ADD: Make sidebar flexbox */
}
.sidebar::-webkit-scrollbar{display:none}

/* Desktop collapse - show 80px of sidebar */
.sidebar.collapsed{transform:translateX(-360px)}

.sidebar-header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:1rem 1.5rem; /* CHANGE: Reduced from 1.5rem to 1rem top/bottom */
  border-bottom:1px solid #e1e5e9;
  background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
  color:#fff;
  position: sticky;
  top: 5px;
  z-index: 10;
  padding-top : 1.5rem; /* CHANGE: Reduced from 2rem to 1.5rem */
  flex-shrink: 0; /* ADD: Prevent header from shrinking */
}
.sidebar-header h2{
  margin:5px; /* CHANGE: Reduced from 10px to 5px */
  font-size:1.4rem; /* CHANGE: Reduced from 1.5rem to 1.4rem */
  font-weight:500;
  transition: opacity 0.3s ease;
}

.sidebar-toggle{
  background:rgba(255,255,255,.2);
  border:none;
  color:#fff;
  width:36px;height:36px; /* CHANGE: Reduced from 40px to 36px */
  border-radius:8px;
  cursor:pointer;
  display:flex;
  align-items:center;
  justify-content:center;
  transition:all .3s ease;
  font-size:1.1rem; /* CHANGE: Reduced from 1.2rem to 1.1rem */
  position: relative;
  z-index: 1102;
  flex-shrink: 0;
}
.sidebar-toggle:hover{background:rgba(255,255,255,.3);transform:scale(1.05)}
.toggle-icon{
  transition: transform 0.3s ease;
}
.sidebar.collapsed .toggle-icon{transform:rotate(180deg)}

.sidebar-content{
  padding:1rem; /* CHANGE: Reduced from 1.5rem to 1rem */
  transition: opacity 0.3s ease;
  flex: 1; /* ADD: Allow content to take remaining space */
  display: flex; /* ADD: Make content flexbox */
  flex-direction: column; /* ADD: Stack children vertically */
  gap: 0.75rem; /* ADD: Consistent small gap between elements */
}
.sidebar.collapsed .sidebar-content{
  opacity: 0; 
  pointer-events: none;
}

/* ADD: Compact control groups */
.control-group {
  margin-bottom: 0; /* Remove default margins */
}

.control-group h3 {
  font-size: 0.9rem; /* Smaller heading */
  font-weight: 600;
  color: #2d3748;
  margin-bottom: 0.5rem; /* Small margin below headings */
}

.radio-group {
  display: flex;
  flex-direction: column;
  gap: 0.25rem; /* Very small gap between radio buttons */
}

/* Horizontal radio group modifier */
.radio-group.horizontal {
  flex-direction: row; /* Display side by side */
  gap: 1rem; /* Gap between radio buttons */
  flex-wrap: wrap; /* Wrap if needed on smaller screens */
}
.radio-label {
  display: flex;
  align-items: center;
  cursor: pointer;
  padding: 0.25rem 0; /* Minimal padding */
  font-size: 0.85rem; /* Smaller text */
  color: #4a5568;
  transition: color 0.2s ease;
  white-space: nowrap;
}
.radio-label:hover {
  color: #2d3748;
}
.radio-custom {
  width: 16px;
  height: 16px;
  border: 2px solid #cbd5e0;
  border-radius: 50%;
  margin-right: 6px; /* Reduced margin for tighter spacing */
  position: relative;
  transition: all 0.2s ease;
  flex-shrink: 0; /* Prevent radio button from shrinking */
}

input[type="radio"] {
  display: none;
}

input[type="radio"]:checked + .radio-custom {
  border-color: var(--primary-color);
  background: var(--primary-color);
}

input[type="radio"]:checked + .radio-custom::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 6px;
  height: 6px;
  background: white;
  border-radius: 50%;
}

/* Responsive behavior for smaller screens */
@media (max-width: 768px) {
  .radio-group.horizontal {
    gap: 0.75rem; /* Slightly smaller gap on mobile */
  }
  
  .radio-label {
    font-size: 0.8rem; /* Slightly smaller text on mobile */
  }
}

/* If you want even more compact spacing */
@media (max-width: 300px) {
  .radio-group.horizontal {
    flex-direction: column; /* Stack vertically on very small screens */
    gap: 0.25rem;
  }
}

.dropdown {
  width: 100%;
  padding: 0.5rem 0.75rem; /* Compact padding */
  border: 1px solid #cbd5e0;
  border-radius: 6px;
  background: white;
  font-size: 0.85rem; /* Smaller text */
  color: #4a5568;
  transition: border-color 0.2s ease;
}

.load-btn {
  background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
  color: white;
  border: none;
  padding: 0.6rem 1rem; /* Compact padding */
  border-radius: 6px;
  font-size: 0.85rem; /* Smaller text */
  font-weight: 500;
  cursor: pointer;
  transition: all 0.2s ease;
  margin-top: 0.5rem; /* Small top margin */
}

/* Floating toggle button for when sidebar is collapsed */
.floating-toggle {
  display: none;
  position: fixed;
  top: calc(var(--nav-height) + 1.5rem);
  left: 20px;
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
  border: none;
  border-radius: 50%;
  color: white;
  cursor: pointer;
  z-index: 1103;
  box-shadow: 0 4px 16px rgba(2, 91, 95, 0.3);
  transition: all 0.3s ease;
  font-size: 1.4rem;
}
.floating-toggle:hover {
  transform: scale(1.1);
  box-shadow: 0 6px 20px rgba(2, 91, 95, 0.4);
}
.floating-toggle.show {
  display: flex;
  align-items: center;
  justify-content: center;
}
        /* ========== MAIN CONTENT ========== */
        .main-content{
          flex:1;
          margin-left:340px;
          transition:margin-left .3s ease;
          background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
          min-height: calc(100vh - var(--nav-height));
        }
        .main-content.expanded{margin-left:0px}
        .main-container{max-width:1200px;margin:0 auto;padding:2rem}
        .header{text-align:center;margin-bottom:3rem;color:#fff}
        .header h1{font-size:2.5rem;margin-bottom:.5rem;font-weight:700}
        .header p{font-size:1.1rem;opacity:.9}

        /* ========== CONTROLS ========== */
        .control-group h3{margin-bottom:1.5rem;color:var(--primary-color);font-size:1.1rem;font-weight:600}
        .control-group{margin-bottom:2rem}
        .radio-group{display:flex;flex-direction:column;gap:.75rem}
        .radio-label{
          display:flex;
          align-items:center;
          cursor:pointer;
          padding:.5rem;
          border-radius:8px;
          transition:all .3s ease;
          user-select: none;
        }
        .radio-label:hover{background:#f8fbfb}
        .radio-label input[type=radio]{display:none}
        .radio-custom{
          width:20px;
          height:20px;
          border:2px solid #ddd;
          border-radius:50%;
          margin-right:.75rem;
          position:relative;
          transition:all .3s ease;
          flex-shrink: 0;
        }
        .radio-label input[type=radio]:checked+.radio-custom{border-color:var(--primary-color)}
        .radio-label input[type=radio]:checked+.radio-custom::after{
          content:'';
          position:absolute;
          top:50%;left:50%;
          transform:translate(-50%,-50%);
          width:10px;height:10px;
          background:var(--primary-color);
          border-radius:50%;
        }
        .dropdown{
          width:100%;
          padding:.75rem 1rem;
          border:2px solid #e1e5e9;
          border-radius:8px;
          font-size:1rem;
          background:#fff;
          cursor:pointer;
          transition:all .3s ease;
        }
        .dropdown:hover,.dropdown:focus{
          outline:none;
          border-color:var(--primary-color);
          box-shadow:0 0 0 3px rgba(2, 91, 95, 0.1);
        }
        .dropdown:disabled {
          background: #f5f5f5;
          cursor: not-allowed;
          opacity: 0.7;
        }
        .load-btn{
          width:100%;
          padding:1rem 2rem;
          background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
          color:#fff;
          border:none;
          border-radius:8px;
          font-size:1.1rem;
          font-weight:600;
          cursor:pointer;
          transition:all .3s ease;
        }
        .load-btn:hover:not(:disabled){
          transform:translateY(-2px);
          box-shadow:0 4px 16px rgba(2, 91, 95, 0.3);
        }
        .load-btn:active:not(:disabled){transform:translateY(0)}
        .load-btn:disabled{
          opacity: 0.6;
          cursor: not-allowed;
        }

        /* ========== VISUALIZATION ========== */
        .visualization-container{
          width:100%;
          background:#fff;
          border-radius:12px;
          box-shadow:0 8px 32px rgba(2, 91, 95, 0.1);
          overflow:hidden;
          position: relative;
          min-height: 500px;
          border: 1px solid rgba(2, 91, 95, 0.1);
        }
        
        .chart-container {
          width: 100%;
          height: 100%;
          min-height: 500px;
          display: flex;
          align-items: center;
          justify-content: center;
          position: relative;
        }
        
        #chart-img{
          max-width:100%;
          max-height: 100%;
          height:auto;
          object-fit:contain;
          transition:opacity .3s ease;
          border-radius: 8px;
        }
        
        .loading-spinner{
          position:absolute;
          top:0;left:0;right:0;bottom:0;
          background:rgba(255,255,255,0.9);
          display:flex;
          flex-direction:column;
          align-items:center;
          justify-content:center;
          z-index:10;
        }
        .spinner{
          width:50px;height:50px;
          border:4px solid #f3f3f3;
          border-top:4px solid var(--primary-color);
          border-radius:50%;
          animation:spin 1s linear infinite;
          margin-bottom:1rem;
        }
        @keyframes spin{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}
        
        .error-message {
          color: #e74c3c;
          text-align: center;
          padding: 2rem;
          font-size: 1.1rem;
        }
        
        .placeholder-message {
          color: #6c757d;
          text-align: center;
          padding: 3rem 2rem;
          font-size: 1.1rem;
        }
        
        .hidden{display:none!important}

        /* ========== RESPONSIVE ========== */
        @media(max-width:768px){
          .sidebar{width:280px}
          .sidebar.collapsed{transform:translateX(-280px)}
          .main-content{margin-left:280px}
          .main-content.expanded{margin-left:0}
          .main-container{padding:1rem}
          .header h1{font-size:2rem}
          .visualization-container{min-height:400px}
        }
        
        @media(max-width:480px){
          .sidebar{
            width:100vw;
            max-width: 320px;
          }
          .sidebar.collapsed{transform:translateX(-100%)}
          .main-content{margin-left:0}
          .main-content.expanded{margin-left:0}
          .visualization-container{min-height:350px}
          .radio-group{gap:.5rem}
          .main-container{padding:1rem 0.5rem}
          
          .floating-toggle {
            left: 15px;
            top: calc(var(--nav-height) + 1rem);
            width: 45px;
            height: 45px;
          }
          
          /* Overlay for mobile when sidebar is open */
          .sidebar-overlay {
            position: fixed;
            top: var(--nav-height);
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(2, 91, 95, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
          }
          
          .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
          }
        } 
           * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #025b5f;
        }

        /* Header Styles */
        .header-area {
            background: #025b5f;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header__wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .header-logo img {
            max-width: 100px;
            height: auto;
        }

        /* Main Menu Styles */
        .main-menu ul {
            display: flex;
            list-style: none;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        .main-menu li {
            position: relative;
        }

        .main-menu a {
            text-decoration: none;
            color: #025b5f;
            font-weight: 500;
            padding: 12px 15px;
            display: block;
            transition: all 0.3s ease;
        }

        .main-menu > ul > li > a {
            border-radius: 6px;
        }

        .main-menu > ul > li > a:hover {
            background: #025b5f;
            color: white;
        }

        /* Dropdown Arrow */
        .menu-item-has-children > a::after {
            content: "▼";
            font-size: 10px;
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .menu-item-has-children:hover > a::after {
            transform: rotate(180deg);
        }

        /* DROPDOWN/SUBMENU - VERTICAL */
        .submenu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 220px;
            background: #025b5f;
            border-radius: 8px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: 1px solid #025b5f;
            
            /* HIDDEN BY DEFAULT */
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.3s ease;
            z-index: 999;
            
            /* FORCE VERTICAL LAYOUT */
            display: block !important;
            list-style: none !important;
        }

        /* SHOW DROPDOWN ON HOVER */
        .menu-item-has-children:hover .submenu {
            opacity: 1;
            visibility: visible;
            transform: translateY(2);
        }

        /* DROPDOWN ITEMS - STACK VERTICALLY */
        .submenu li {
            display: block !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            float: none !important;
            position: relative;
        }

        .submenu li a {
            display: block !important;
            width: 100% !important;
            padding: 15px 20px !important;
            color: #333 !important;
            font-size: 14px !important;
            font-weight: 400 !important;
            text-align: left !important;
            border-radius: 0 !important;
            background: transparent !important;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f0f0f0;
        }

        .submenu li:last-child a {
            border-bottom: none;
        }

        .submenu li a:hover {
            background: #025b5f !important;
            color: white !important;
            transform: translateX(5px);
        }

        /* ACCENT BAR ON HOVER */
        .submenu li a::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: #025b5f;
            transform: scaleY(0);
            transition: transform 0.2s ease;
        }

        .submenu li a:hover::before {
            transform: scaleY(1);
        }

        /* Header Button */
        .header-btn {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .login-btn {
            background: #b4e507;
            color: #000000;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-btn:hover {
            background: #014548;
            transform: translateY(-2px);
        }

        /* Mobile Menu Toggle */
        .header-bar-mobile {
            display: none;
        }

        .xb-nav-mobile {
            font-size: 20px;
            color: #025b5f;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-menu {
                display: none;
            }
            
            .header-bar-mobile {
                display: block;
            }
        }

        /* Modal hidden by default */
        .modal.hidden {
          display: none;
        }

        /* Modal hidden by default */
        .modal.hidden {
            display: none !important;
        }

        /* Layout and focus layer - FIXED: Added !important and higher z-index */
        .modal {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            z-index: 99999 !important; /* Much higher z-index */
            pointer-events: auto !important;
        }

        /* Dimmed background overlay */
        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            pointer-events: auto;
        }

        /* Popup content box */
        .modal-content {
            position: relative;
            background: #025b5f;
            padding: 32px;
            border-radius: 12px;
            max-width: 400px;
            width: 90%;
            max-height: 90vh;
            z-index: 1;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin: 20px;
            overflow-y: auto;
        }

        .modal-content h2 {
            margin: 0 0 16px 0;
            color: #fff;
            font-size: 24px;
        }

        .modal-content p {
            margin: 0 0 20px 0;
            color: #fff;
        }

       /* --- Main Modal Container & Visibility --- */
/* The main container acts as the full-screen overlay */
#emailModal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(17, 24, 39, 0.6); /* Semi-transparent dark background */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    backdrop-filter: blur(4px); /* Modern frosted glass effect */
    pointer-events: auto;
}

/* Use this class to hide the modal with JavaScript */
#emailModal.hidden {
    display: none;
}

/* --- Modal Content Box --- */
/* This is the white box that holds the content */
.modal-content {
    background-color: #ffffff;
    padding: 32px 40px;
    border-radius: 16px;
    width: 90%;
    max-width: 480px;
    position: relative;
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    text-align: center;
    animation: fadeIn 0.3s ease-out; /* Fade-in animation */
}

/* --- Typography & Close Button --- */
.modal-content h3 {
    font-size: 24px;
    font-weight: 600;
    color: #111827; /* Dark gray for text */
    margin: 0 0 8px 0;
}

.modal-content p {
    font-size: 16px;
    color: #4B5563; /* Lighter gray for secondary text */
    margin: 0 0 24px 0;
    line-height: 1.5;
}

/* A single, clean style for the close button */
.close-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 32px;
    height: 32px;
    font-size: 24px;
    color: #9CA3AF;
    background: none;
    border: none;
    border-radius: 50%; /* Makes the hover background circular */
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.2s, color 0.2s;
}

.close-btn:hover {
    background-color: #F3F4F6; /* Light gray background on hover */
    color: #111827;
}

/* --- Form Elements (Input & Button) --- */
#emailForm {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

#emailForm input[type="email"] {
    background-color: #F9FAFB;
    padding: 14px 16px;
    border: 1px solid #D1D5DB; /* Soft gray border */
    border-radius: 8px;
    font-size: 16px;
    color: #111827;
    transition: border-color 0.2s, box-shadow 0.2s;
}

/* Modern "glow" effect on focus */
#emailForm input[type="email"]:focus {
    outline: none;
    border-color: #2563EB; /* A nice blue for focus */
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
}

#emailForm button[type="submit"] {
    background: #1F2937; /* A strong, dark gray for the button */
    color: white;
    font-weight: 500;
    border: none;
    padding: 14px 24px;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.2s, transform 0.1s;
}

#emailForm button[type="submit"]:hover {
    background: #374151; /* Slightly lighter on hover */
    transform: translateY(-1px); /* Subtle lift effect */
}

/* --- Animations --- */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

        /* Close button */
        .close-btn {
            position: absolute;
            top: 12px;
            right: 16px;
            font-size: 28px;
            background: none;
            border: none;
            cursor: pointer;
            color: #999;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
        }

        .close-btn:hover {
            background: #f5f5f5;
            color: #333;
        }

        /* Prevent background scroll - IMPROVED */
        body.no-scroll {
            overflow: hidden !important;
            position: fixed !important;
            width: 100% !important;
            height: 100% !important;
        }

         .flex-container {
            
            display: flex;
            justify-content: flex-end;
            align-items: center;
            min-height: 50px;
            margin: 0px 0;
            padding: 30px;
            
        }
        .buttons-container {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border: 2px solid #d1d5db;
        }

        .btn-outline:hover {
            background: #f9fafb;
            border-color: #025b5f;
            transform: translateY(-2px);
        }

        /* Modal Styles */
        .climate-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            margin-top: var(--nav-height);
        }

        .climate-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .climate-modal {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 90vw;
            max-height: 90vh;
            overflow: hidden;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .climate-modal-overlay.active .climate-modal {
            transform: scale(1);
        }

        .climate-modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--accent));
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .climate-modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color : #025b5f;
        }

        .climate-close-btn {
            background: none;
            border: none;
            color: 025b5f;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.5rem;
            transition: background 0.2s ease;
        }

        .climate-close-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .climate-modal-body {
            padding: 1.5rem;
            max-height: 70vh;
            overflow-y: auto;
        }

        .climate-metrics-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .climate-metrics-table th,
        .climate-metrics-table td {
            padding: 0.75rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        .climate-metrics-table th {
            background: #f9fafb;
            font-weight: 600;
            color: var(--primary-color);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .climate-metrics-table td {
            font-size: 0.875rem;
            line-height: 1.5;
        }

        .climate-metrics-table tr:hover {
            background: #f9fafb;
        }

        .climate-metric-number {
            font-weight: 600;
            color: var(--accent);
            text-align: center;
            width: 60px;
        }

        .climate-metric-name {
            font-weight: 600;
            color: var(--primary-color);
        }
        .buttons-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: #1e3a8a;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 64, 175, 0.2);
        }

        .btn-outline {
            background: transparent;
            color: #fff;
            border: 2px solid #d1d5db;
        }

        .btn-outline:hover {
            background: #f9fafb;
            border-color: #025b5f;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .product-block {
                flex-direction: column;
                gap: 2rem;
            }

            .laptop-container {
                order: 2;
            }

            .product-content {
                order: 1;
            }

            .buttons-container {
                justify-content: center;
            }

            .climate-modal {
                margin: 1rem;
                max-width: calc(100vw - 2rem);
            }

            .climate-metrics-table {
                font-size: 0.75rem;
            }
        }
          

    </style>
  </head>
<body>

 

  <!-- Header end -->

  <div class="app-container">
    <!-- Mobile overlay -->
    <div id="sidebar-overlay" class="sidebar-overlay"></div>
    
    <!-- Floating toggle button -->
    <button id="floatingToggle" class="floating-toggle" aria-label="Open sidebar">
      <span>☰</span>
    </button>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <h2>Climate Explorer</h2>
        <button id="sidebarToggle" class="sidebar-toggle" aria-label="Toggle sidebar">
          <span class="toggle-icon">☰</span>
        </button>
      </div>

     <div class="sidebar-content">
      <!-- Variable -->
      <div class="control-group">
        <h3>Variable</h3>
        <div class="radio-group horizontal">
          <label class="radio-label">
            <input type="radio" name="variable" value="temperature" checked>
            <span class="radio-custom"></span>Temperature
          </label>
          <label class="radio-label">
            <input type="radio" name="variable" value="rainfall">
            <span class="radio-custom"></span>Rainfall
          </label>
        </div>
      </div>

      <!-- Type -->
      <div class="control-group">
        <h3>Type</h3>
        <div class="radio-group horizontal">
          <label class="radio-label">
            <input type="radio" name="type" value="map" checked>
            <span class="radio-custom"></span>Trend Map
          </label>
          <label class="radio-label">
            <input type="radio" name="type" value="timeseries">
            <span class="radio-custom"></span>Time Series
          </label>
        </div>
      </div>

        <!-- Location -->
        <div class="control-group">
          <h3>Location</h3>
          <select id="location-dropdown" class="dropdown">
            <option value="">Select location...</option>
          </select>
        </div>

        <!-- Files -->
        <div class="control-group">
          <h3>Files</h3>
          <select id="files-dropdown" class="dropdown" disabled>
            <option value="">Select location first...</option>
          </select>
        </div>

        <button id="load-visualization" class="load-btn" disabled>Load Visualization</button>
      </div>
    </aside>

    <!-- Main -->
    <main id="mainContent" class="main-content">
      <div class="container">
        <div class="header">
          <!-- <p>Climate Data Visualization</p> -->
          <!-- <p>Explore temperature and rainfall patterns across different regions</p> -->
        </div>
        
        <div class="visualization-container">
          <div id="loading-spinner" class="loading-spinner hidden">
            <div class="spinner"></div>
            <div>Loading visualization...</div>
          </div>
          
          <div class="chart-container">
            
            <div id="placeholder-message" class="placeholder-message">
              <img src="assest\img\bg\climatedata.jpg"/>
            </div>
            <img id="chart-img" src="" class="hidden" alt="Climate data visualization">
            <div id="error-message" class="error-message hidden"></div>
          </div>
        </div>
        <div class="flex-container ">
        <button class="btn btn-outline" id="climateLearnMoreBtn">
                        Data Repository
        </button>
        <button class="btn btn-secondary" id="download-btn">
                        Download
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
        </button>
    </div>
  </main>

   <!-- Modal -->
    <div class="climate-modal-overlay" id="climateModalOverlay">
        <div class="climate-modal">
            <div class="climate-modal-header">
                <h3 class="climate-modal-title">Climate Risk Metrics & Indicators</h3>
                <button class="climate-close-btn" id="climateCloseBtn">&times;</button>
            </div>
            <div class="climate-modal-body">
                <p style="color: #6b7280; margin-bottom: 1rem;">
                    CityAdapt.ai provides comprehensive climate risk assessment through 20 key metrics and indicators, covering everything from monsoon patterns to extreme weather events.
                </p>
                <table class="climate-metrics-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Metric</th>
                            <th>Definition & Implications</th>
                        </tr>
                    </thead>
                    <tbody id="climateMetricsTableBody">
                        <!-- Table content will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>  

  <div id="emailModal" class="modal hidden">

      <div class="modal-overlay"></div>

      <div class="modal-content">
          <button class="close-btn">&times;</button>

          <h3>Enter Your Email to Download</h3>
          
          <form id="emailForm">
              <input type="email" name="email" placeholder="Your email address" required />
              <button type="submit">Submit & Download</button>
          </form>
      </div>
  </div>
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       // Climate metrics data
        const metricsData = [
            {
                no: 1,
                metric: "Trend in monsoon season mean rainfall",
                definition: "Changes in average monsoon-season (June to September) rainfall, spatially averaged over the specified region",
                implications: "Agriculture risk; surface and ground water availability"
            },
            {
                no: 2,
                metric: "Trend in summer season average temperature",
                definition: "Change in the summer-season (March–May) average of daily mean temperature, spatially averaged over the specified region",
                implications: "Agriculture risk; human and livestock health risk; Infrastructure risk"
            },
            {
                no: 3,
                metric: "Monsoon season mean rainfall anomaly",
                definition: "Deviation of spatially averaged monsoon season (June–September) rainfall relative to the 1981–2010 baseline period",
                implications: "Identify dry vs wet season; Agricultural risk, water availability"
            },
            {
                no: 4,
                metric: "Temperature Anomalies",
                definition: "Deviation of spatially averaged summer season (March-May) daily average temperature relative to the 1981–2010 baseline period",
                implications: "Identify anomalously hot/cold summer, Agriculture risk; human and livestock health risk; Infrastructure risk"
            },
            {
                no: 5,
                metric: "Extreme wet days",
                definition: "Number of days in a year with the standardized precipitation anomaly exceeding 1 with respect to the long-term data (1981-2010)",
                implications: "Higher (lower) value indicates more (less) number of days in a year with excessive rainfall; Agricultural risk; health risk; soil erosion"
            },
            {
                no: 6,
                metric: "Extreme warm days",
                definition: "Number of days when the maximum temperature is greater than 90th percentile of the long-term data (1981-2010) for a moving window of 15 days",
                implications: "Higher (lower) value indicates more (less) number of days in a year with excessively warm days; Agriculture risk; wildfire risk; health and livestock risk"
            },
            {
                no: 7,
                metric: "Time-series of seasonal monsoon rainfall",
                definition: "Long-term annual variations in summer monsoon (June to September) total rainfall, spatially averaged over the specified region",
                implications: "Agriculture risk; surface and ground water availability; planning of dams and reservoirs; future projections"
            },
            {
                no: 8,
                metric: "Time-series of summer temperatures",
                definition: "Long-term annual variations in summer (March to May) daily mean temperature, spatially averaged over the specified region",
                implications: "Agriculture risk; human and livestock health risk; Infrastructure risk; ecosystem impact"
            },
            {
                no: 9,
                metric: "Growing degree days",
                definition: "The amount of heat available for plant growth during a specific period of crop cycle",
                implications: "Optimal planting dates; tracking the progress; crop management"
            },
            {
                no: 10,
                metric: "Heat stress index",
                definition: "Past, present and future estimate of heat discomfort combining temperature and humidity",
                implications: "Health, livestock, and labor safety"
            },
            {
                no: 11,
                metric: "Drought index",
                definition: "Past, present and future indicator of prolonged dry conditions based on rainfall and water loss",
                implications: "Agriculture, water resources, drought management"
            },
            {
                no: 12,
                metric: "Flood risk index",
                definition: "Past, present and future likelihood of flood events based on extreme rainfall and runoff",
                implications: "Disaster planning, infrastructure, and urban/rural development"
            },
            {
                no: 13,
                metric: "Projected summer average temperature",
                definition: "Average daily temperature over summer season (March-May) projected for a future period under climate scenarios",
                implications: "Crop selection, urban planning, energy demand"
            },
            {
                no: 14,
                metric: "Projected extreme heat days",
                definition: "Number of projected days exceeding extreme heat thresholds",
                implications: "Heatwave planning, human and livestock health sector, labor safety and productivity"
            },
            {
                no: 15,
                metric: "Projected growing degree days",
                definition: "Projected cumulative heat units above a base threshold, indicating crop development potential",
                implications: "Crop yield modeling, agricultural zoning, pest risk assessment"
            },
            {
                no: 16,
                metric: "Projected hot night frequency",
                definition: "Number of nights with projected minimum temperature above heat-stress thresholds",
                implications: "Public health, livestock productivity, energy demand, agriculture"
            },
            {
                no: 17,
                metric: "Projected monsoon season rainfall total",
                definition: "Total rainfall projected for monsoon season (June-September)",
                implications: "Agriculture, water availability"
            },
            {
                no: 18,
                metric: "Projected monsoon onset and withdrawal dates",
                definition: "Estimated start and end of monsoon season under future climate scenarios",
                implications: "Sowing time decisions, farming calendars, and irrigation management"
            },
            {
                no: 19,
                metric: "Projected heavy rainfall days",
                definition: "Future count of extreme rainfall days based on threshold exceedance",
                implications: "Flood risk, urban drainage, infrastructure design"
            },
            {
                no: 20,
                metric: "Future dry/wet spell frequency",
                definition: "Number of projected dry/wet spells periods with consecutive rainless/rain-surplus days",
                implications: "Drought monitoring, crop stress modeling, water planning"
            }
        ];

        // DOM elements
       
        const climateLearnMoreBtn = document.getElementById('climateLearnMoreBtn');
        const climateModalOverlay = document.getElementById('climateModalOverlay');
        const climateCloseBtn = document.getElementById('climateCloseBtn');
        const climateMetricsTableBody = document.getElementById('climateMetricsTableBody');
        // Assuming this code is within your class or main script file

        // Find the button and listen for clicks
        // document.getElementById('climateDownloadBtn').addEventListener('click', () => {
        //     // This calls the main download function
        //     downloadImage(); 
        // });
        // Populate table
        function populateClimateTable() {
            climateMetricsTableBody.innerHTML = metricsData.map(metric => `
                <tr>
                    <td class="climate-metric-number">${metric.no}</td>
                    <td class="climate-metric-name">${metric.metric}</td>
                    <td>
                        <strong>Definition:</strong> ${metric.definition}<br>
                        <strong>Implications:</strong> ${metric.implications}
                    </td>
                </tr>
            `).join('');
        }

        // Modal functions
        function openClimateModal() {
            climateModalOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeClimateModal() {
            climateModalOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Event listeners
        climateLearnMoreBtn.addEventListener('click', openClimateModal);
        climateCloseBtn.addEventListener('click', closeClimateModal);
        climateModalOverlay.addEventListener('click', (e) => {
            if (e.target === climateModalOverlay) {
                closeClimateModal();
            }
        });
        
        

        // Escape key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && climateModalOverlay.classList.contains('active')) {
                closeClimateModal();
            }
        });

        // Initialize
        populateClimateTable();

        // Add some interactive effects
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in, .laptop-container').forEach(el => observer.observe(el));
        });

        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.form-results').html('').removeClass('d-none');
                
                $('.form-results').html('<div class="alert alert-info">Sending your message...</div>');

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('.form-results').html('<div class="alert alert-success">' + response.message + '</div>');
                            $('#contactForm')[0].reset();
                        } else {
                            $('.form-results').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error, xhr.responseText);
                        $('.form-results').html('<div class="alert alert-danger">There was an unexpected error. Please try again later.</div>');
                    }
                });
            });
        });
    </script>
   


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       
  class ClimateDataVisualizer {

    constructor() {
      this.locationOptions = {
        map: [
          {value:'uttarpradesh',text:'Uttar Pradesh'},
          {value:'madhyapradesh',text:'Madhya Pradesh'},
          {value:'maharashtra',text:'Maharashtra'},
          {value:'haryana',text:'Haryana'}
        ],
        timeseries: [
          {value:'Mathura',text:'Mathura'},
          {value:'Kanpur',text:'Kanpur'},
          {value:'Jhansi',text:'Jhansi'},
          {value:'Lucknow',text:'Lucknow'},
          {value:'Upaverage',text:'UP Average'},
        ]
      };
      
      // Track current state
      this.currentState = {
        variable: 'temperature',
        type: 'map',
        location: '',
        file: ''
      };

      // This finds the modal elements and saves them so other methods can use them.
        this.modal = document.getElementById('emailModal');
        this.modalForm = document.getElementById('emailForm');
        this.modalCloseBtn = this.modal.querySelector('.close-btn');
        this.modalOverlay = this.modal.querySelector('.modal-overlay');
        this.modalSubmitBtn = this.modal.querySelector('button[type="submit"]');
      

       
      this.init();
    }
    
    init() {
      this.bindEvents();
      this.initSidebar();
      this.updateLocationDropdown();
      this.updateUI();
      this.updateFloatingToggle();
    }
    
    bindEvents() {
      // Variable change
      document.querySelectorAll('input[name="variable"]').forEach(el => {
        el.addEventListener('change', () => {
          this.currentState.variable = el.value;
          this.updateFileDropdown();
        });
      });
      
      // Type change  
      document.querySelectorAll('input[name="type"]').forEach(el => {
        el.addEventListener('change', () => {
          this.currentState.type = el.value;
          this.updateLocationDropdown();
        });
      });
      
      // Location change
      document.getElementById('location-dropdown').addEventListener('change', (e) => {
        this.currentState.location = e.target.value;
        this.updateFileDropdown();
      });
      
      // File change
      document.getElementById('files-dropdown').addEventListener('change', (e) => {
        this.currentState.file = e.target.value;
        this.updateUI();
      });
      
      // Load button
      document.getElementById('load-visualization').addEventListener('click', () => {
        this.loadVisualization();
      });
      
      // Sidebar toggle (inside sidebar)
      document.getElementById('sidebarToggle').addEventListener('click', () => {
        this.toggleSidebar();
      });
      
      // Floating toggle button
      document.getElementById('floatingToggle').addEventListener('click', () => {
        this.toggleSidebar();
      });
      
      // Mobile overlay click to close sidebar
      document.getElementById('sidebar-overlay').addEventListener('click', () => {
        if (window.innerWidth <= 480) {
          this.toggleSidebar();
        }
      });
      
      // Handle window resize
      window.addEventListener('resize', () => {
        this.handleResize();
      });

      // Download button
      // document.getElementById('download-btn').addEventListener('click', () => {
      //     this.downloadImage();
      // });
      // The main download button now OPENS THE MODAL instead of downloading directly
        // document.getElementById('download-btn').addEventListener('click', () => {
        //     this.showEmailModal();
        // });

        



          // --- MODIFIED: The main download button now opens the new modal ---
          document.getElementById('download-btn').addEventListener('click', this.showEmailModal.bind(this));

          // --- NEW: Listeners for the new modal logic ---
          this.modalForm.addEventListener('submit', this.handleModalSubmit.bind(this));
          this.modalCloseBtn.addEventListener('click', this.hideEmailModal.bind(this));
          this.modalOverlay.addEventListener('click', this.hideEmailModal.bind(this));
          
          
          document.addEventListener('keydown', (e) => {
              if (e.key === 'Escape' && !this.modal.classList.contains('hidden')) {
                  this.hideEmailModal();
              }
          });

          // ... (Your listeners for sidebar toggles, etc.) ...

    }
    
    initSidebar() {
      // Auto-collapse on mobile/tablet
      if (window.innerWidth <= 768) {
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('mainContent');
        sidebar.classList.add('collapsed');
        main.classList.add('expanded');
      }
    }
    
    handleResize() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      const overlay = document.getElementById('sidebar-overlay');
      
      if (window.innerWidth <= 768) {
        // On mobile/tablet, ensure sidebar starts collapsed
        if (!sidebar.classList.contains('collapsed')) {
          sidebar.classList.add('collapsed');
          main.classList.add('expanded');
        }
      } else {
        // On desktop, show sidebar by default
        if (sidebar.classList.contains('collapsed')) {
          sidebar.classList.remove('collapsed');
          main.classList.remove('expanded');
        }
        // Hide mobile overlay on desktop
        overlay.classList.remove('active');
      }
      
      // Update floating toggle visibility
      this.updateFloatingToggle();
    }
    
    toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      const overlay = document.getElementById('sidebar-overlay');
      const floatingToggle = document.getElementById('floatingToggle');
      
      const isCollapsed = sidebar.classList.contains('collapsed');
      
      if (isCollapsed) {
        // Show sidebar
        sidebar.classList.remove('collapsed');
        floatingToggle.classList.remove('show');
        
        if (window.innerWidth <= 480) {
          // On mobile, show overlay
          overlay.classList.add('active');
        } else if (window.innerWidth <= 768) {
          // On tablet, adjust main content
          main.classList.remove('expanded');
        } else {
          // On desktop, adjust main content
          main.classList.remove('expanded');
        }
      } else {
        // Hide sidebar
        sidebar.classList.add('collapsed');
        floatingToggle.classList.add('show');
        
        if (window.innerWidth <= 480) {
          // On mobile, hide overlay
          overlay.classList.remove('active');
        } else {
          // On tablet/desktop, expand main content
          main.classList.add('expanded');
        }
      }
    }
    
    updateFloatingToggle() {
      const sidebar = document.getElementById('sidebar');
      const floatingToggle = document.getElementById('floatingToggle');
      
      if (sidebar.classList.contains('collapsed')) {
        floatingToggle.classList.add('show');
      } else {
        floatingToggle.classList.remove('show');
      }
    }
    
    updateLocationDropdown() {
      const locationDropdown = document.getElementById('location-dropdown');
      const type = this.currentState.type;
      
      // Clear current options
      locationDropdown.innerHTML = '<option value="">Select location...</option>';
      
      // Add options for current type
      this.locationOptions[type].forEach(location => {
        const option = document.createElement('option');
        option.value = location.value;
        option.textContent = location.text;
        locationDropdown.appendChild(option);
      });
      
      // Reset current location and file
      this.currentState.location = '';
      this.currentState.file = '';
      
      // Reset file dropdown
      const filesDropdown = document.getElementById('files-dropdown');
      filesDropdown.innerHTML = '<option value="">Select location first...</option>';
      filesDropdown.disabled = true;
      
      this.updateUI();
    }
    
    async updateFileDropdown() {
      const filesDropdown = document.getElementById('files-dropdown');
      
      if (!this.currentState.location) {
        filesDropdown.innerHTML = '<option value="">Select location first...</option>';
        filesDropdown.disabled = true;
        this.currentState.file = '';
        this.updateUI();
        return;
      }
      
      // Show loading state
      filesDropdown.innerHTML = '<option value="">Loading files...</option>';
      filesDropdown.disabled = true;
      
      try {
        const url = `index.php/welcome/list_files?variable=${this.currentState.variable}&type=${this.currentState.type}&location=${this.currentState.location}`;
        const response = await fetch(url);
        
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const files = await response.json();
        
        filesDropdown.innerHTML = '<option value="">Select file...</option>';
        
        if (!Array.isArray(files) || files.length === 0) {
          const option = document.createElement('option');
          option.value = '';
          option.textContent = 'No files available';
          filesDropdown.appendChild(option);
        } else {
          files.forEach(file => {
            const option = document.createElement('option');
            option.value = file;
            option.textContent = file;
            filesDropdown.appendChild(option);
          });
        }
        
        filesDropdown.disabled = false;
        
      } catch (error) {
        console.error('Error fetching files:', error);
        filesDropdown.innerHTML = '<option value="">Error loading files</option>';
        
        // Show user-friendly error after a delay
        setTimeout(() => {
          filesDropdown.innerHTML = '<option value="">Select location first...</option>';
        }, 2000);
      }
      
      this.currentState.file = '';
      this.updateUI();
    }
    
    updateUI() {
      const loadBtn = document.getElementById('load-visualization');
      const canLoad = this.currentState.location && this.currentState.file;
      
      loadBtn.disabled = !canLoad;
    }
    
    loadVisualization() {
      if (!this.currentState.location || !this.currentState.file) {
        alert('Please select both location and file');
        return;
      }
      
      const img = document.getElementById('chart-img');
      const spinner = document.getElementById('loading-spinner');
      const placeholder = document.getElementById('placeholder-message');
      const errorMsg = document.getElementById('error-message');
      
      const downloadBtn = document.getElementById('download-btn');
      // Show loading state
      spinner.classList.remove('hidden');
      img.classList.add('hidden');
      placeholder.classList.add('hidden');
      errorMsg.classList.add('hidden');
      downloadBtn.style.display = 'none';
      // Construct image path
      const imagePath = `assest/${this.currentState.variable}/${this.currentState.type}/${this.currentState.location}/${this.currentState.file}`;
      
      // Simulate loading delay for better UX
      setTimeout(() => {
        img.onload = () => {
          spinner.classList.add('hidden');
          img.classList.remove('hidden');
          downloadBtn.style.display = 'inline-block'; // Show on success
        };
        
        img.onerror = () => {
          spinner.classList.add('hidden');
          errorMsg.textContent = `Could not load visualization: ${imagePath}`;
          errorMsg.classList.remove('hidden');
        };
        
        img.src = imagePath;
      }, 500);
    }
    // Add this new method inside your ClimateDataVisualizer class

    downloadImage() {
        console.log("Download initiated for:", this.currentState.file);
        
        // Check if there is a file to download
        if (!this.currentState.location || !this.currentState.file) {
            alert('Please load a visualization first before downloading.');
            return;
        }
        
        // Construct the same image path
        const imagePath = `assest/${this.currentState.variable}/${this.currentState.type}/${this.currentState.location}/${this.currentState.file}`;
        
        // Create a temporary link to trigger the download
        const link = document.createElement('a');
        link.href = imagePath;
        link.download = this.currentState.file; // Suggest the current filename
        
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
    // Add these new methods inside your ClimateDataVisualizer class





    // Add these new methods inside your ClimateDataVisualizer class

    showEmailModal() {
        // Check if an image is loaded before showing the modal
        if (!this.currentState.file) {
            alert('Please load a visualization first.');
            return;
        }
        this.modal.classList.remove('hidden');
        document.body.classList.add('no-scroll');
        const firstInput = this.modal.querySelector('input[type="email"]');
        if (firstInput) setTimeout(() => firstInput.focus(), 100);
    }

    hideEmailModal() {
        this.modal.classList.add('hidden');
        document.body.classList.remove('no-scroll');
    }

    handleModalSubmit(event) {
        event.preventDefault();
        const email = this.modalForm.email.value.trim();

        if (!email) return;

        // Use your dynamically generated URL
        const subscribeUrl = '<?= base_url("Welcome/subscribe") ?>';

        const originalText = this.modalSubmitBtn.textContent;
        this.modalSubmitBtn.textContent = 'Saving...';
        this.modalSubmitBtn.disabled = true;

        fetch(subscribeUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ email })
        })
        .then(res => res.json().then(data => ({ status: res.status, data })))
        .then(({ status, data }) => {
            // --- THIS IS THE KEY INTEGRATION ---
            if (status === 200 && data.success) {
                alert('Thank you! Your download will begin shortly.');
                this.hideEmailModal();
                this.downloadImage(); // <-- TRIGGER DOWNLOAD ON SUCCESS
            } else if (status === 409) {
                alert("You're already on our list! Your download will begin.");
                this.hideEmailModal();
                this.downloadImage(); // <-- TRIGGER DOWNLOAD EVEN IF ALREADY SUBSCRIBED
            } else {
                alert(data.error || 'A server error occurred.');
            }
        })
        .catch(err => {
            console.error('Network error:', err);
            alert('A network error occurred. Please try again.');
        })
        .finally(() => {
            this.modalSubmitBtn.textContent = originalText;
            this.modalSubmitBtn.disabled = false;
        });
    }

    // Initialize when DOM is ready
    

  }

  document.addEventListener('DOMContentLoaded', () => {
      new ClimateDataVisualizer();
    });


  // Add some interactive effects
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in, .laptop-container').forEach(el => observer.observe(el));
        });

        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                
                $('.form-results').html('').removeClass('d-none');
                
                $('.form-results').html('<div class="alert alert-info">Sending your message...</div>');

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('.form-results').html('<div class="alert alert-success">' + response.message + '</div>');
                            $('#contactForm')[0].reset();
                        } else {
                            $('.form-results').html('<div class="alert alert-danger">' + response.message + '</div>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error, xhr.responseText);
                        $('.form-results').html('<div class="alert alert-danger">There was an unexpected error. Please try again later.</div>');
                    }
                });
            });
        });
  
  


  
</script>
</body>
</html>