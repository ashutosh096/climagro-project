<?php
include("header.php");
include("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Climate Risk Solutions</title>
    <style>
        /* Global Styles */
        html, body {
            overflow-x: hidden;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE 10+ */
        }
        
        /* Disable hover effect for primary buttons */
        .btn-primary {
            background-color: #025b5f;
            border-color: #025b5f;
            color: #fff;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: #025b5f !important;
            border-color: #025b5f !important;
            color: #fff !important;
            opacity: 1 !important;
        }

        html::-webkit-scrollbar, body::-webkit-scrollbar {
            display: none;
        }

        /* Offering Section Styles */
        .offering-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(to bottom right, #f7f9fc, #ffffff);
            /* padding: 0 2rem;  Removing padding here as .container handles it */
            width: 100%;       /* Ensure full width */
            max-width: none;   /* override if any */
            margin: 0;         /* Reset margin */
            padding-top: 100px; /* Matched large spacing from original screenshot */
        }
        
        /* Removed unnecessary media query for offering-container flex-direction */

        .laptop-frame {
            width: 100%;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 1024px) {
            .laptop-frame {
                width: 50%;
                padding: 4rem;
            }
        }

        .laptop-container {
            position: relative;
            width: 100%;
            max-width: 100%;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .laptop-container.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .laptop-screen {
            background-color: #025b5f;
            border-radius: 1rem 1rem 0.5rem 0.5rem;
            padding: 0.5rem;
            height: 24rem;
            width: 100%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .window-controls {
            display: flex;
            gap: 0.25rem;
            margin-bottom: 0.5rem;
        }

        .control-dot {
            width: 0.625rem;
            height: 0.625rem;
            border-radius: 9999px;
        }

        .content-area {
            background-color: white;
            border-radius: 0.5rem;
            overflow-y: hidden;
            flex: 1;
            padding: 1rem;
        }

        .content-header {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .laptop-base {
            background-color: #025b5f;
            height: 0.5rem;
            margin: 0 2rem;
            border-radius: 0 0 0.5rem 0.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .product-content {
            width: 100%;
            padding: 2rem;
            display: flex;
            align-items: center;
        }

        @media (min-width: 1024px) {
            .product-content {
                width: 44%;
                flex: 0 0 44%;
                padding: 0; /* Align with laptop container */
            }
            
            .laptop-container {
                width: 44%;
                flex: 0 0 44%;
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .progress-bar {
            width: 6rem;
            height: 0.5rem;
            background-color: #e5e7eb;
            border-radius: 9999px;
        }

        .progress-fill {
            height: 100%;
            border-radius: 9999px;
            transition: width 1.5s ease-out;
        }

        .product-block {
            display: flex;
            flex-direction: column;
            margin-bottom: 5rem;
            padding: 0 2rem;
        }

        @media (min-width: 1024px) {
            .product-block {
                flex-direction: row;
                align-items: center;
                gap: 8%; /* Increased spacing */
                padding: 0 2rem;
                justify-content: space-between;
            }

            .product-block:nth-child(even) {
                flex-direction: row-reverse;
            }
            
            /* Global override for content area padding in laptop screen */
            .content-area {
                padding: 1.5rem !important;
            }
        }    
        /* Generic Content Area Image - match Data Portal style */
        .content-area img {
            width: 100%;
            object-fit: contain;
            border-radius: 0.5rem;
            display: block;
        }

        .container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Title and Header Styles */
        .title-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 15px;
        }

        .subtitle-text {
            font-size: 1.1rem;
            letter-spacing: 2px;
            color: #4a5568;
            margin: 0;
            text-transform: uppercase;
            margin-top: 10px;
            font-weight: 500;
        }

        .corner-decoration {
            font-size: 2rem;
            color: #f26a21;
            position: relative;
            top: -6px;
        }

        .main-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #025b5f;
            margin: 0 30px;
            display: inline-block;
        }

        .section-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Contact Form Styles */
        .contact-icon {
            margin-right: 20px !important;
        }

        .xb-item--field {
            margin-right: 30px;
        }

        .form-results {
            min-height: 60px;
        }

        .alert {
            padding: 12px 20px;
            border-radius: 4px;
            margin-bottom: 0;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .product-block {
                gap: 2rem;
            }

            .product-title {
                font-size: 1.8rem;
            }

            .product-description {
                font-size: 1rem;
            }
        }

        @media (max-width: 768px) {
            .product-block {
                flex-direction: column;
                gap: 2rem;
            }

            .laptop-container {
                width: 100%;
                max-width: 100%;
            }

            .product-content {
                width: 100%;
                padding: 0 1rem;
            }

            .product-title {
                font-size: 1.6rem;
                margin-bottom: 1rem;
            }

            .product-description {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .product-blocks {
                gap: 3rem;
            }

            .xb-item--title {
                font-size: 2rem;
            }

            .about-wrap h3 {
                font-size: 1.5rem;
            }

            .section-header {
                margin-bottom: 60px;
            }

            /* img 3: Fix corner bracket alignment with title */
            .title-wrapper {
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                gap: 0.5rem;
                margin: 0 auto 15px !important;
            }
            .main-title {
                font-size: clamp(1.6rem, 6vw, 2.2rem) !important;
                margin: 0 !important;
                display: inline !important;
            }
            .corner-decoration {
                font-size: 1.5rem !important;
                position: relative !important; /* Changed from static to relative */
                line-height: 1 !important;
                flex-shrink: 0;
            }
        }

        @media (max-width: 480px) {
            .product-title {
                font-size: 1.4rem;
            }

            .product-tag {
                font-size: 0.75rem;
            }

            .demo-button {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }

            .laptop-screen {
                padding: 0.75rem;
                padding-top: 1.25rem;
            }

            .window-controls {
                top: 0.4rem;
            }

            .control-dot {
                width: 10px;
                height: 10px;
            }

            .laptop-container {
                flex: 1;
                min-width: 0;
                max-width: 600px;
                position: relative;
                aspect-ratio: 16/9;
            }

            .laptop-screen {
                background: #1e1e1e;
                border-radius: 10px 10px 0 0;
                padding: 4% 4% 0;
                position: relative;
                height: 0;
                padding-bottom: 56.25%;
            }

            .content-area {
                position: absolute;
                top: 8%;
                left: 4%;
                right: 4%;
                bottom: 4%;
                background: white;
                border-radius: 0.5rem;
                overflow: hidden;
            }

            .window-controls {
                top: 0.3rem;
                left: 0.8rem;
            }
        }
        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: flex-start;
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
            background: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(2, 91, 95, 0.3);
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
            color: #6b7280;
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
        
        /* Adjusting corner bracket spacing to match about page */
        .main-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #025b5f;
            margin: 0 6px; /* Tighter horizontal margin so corners sit close to text */
            display: inline-block;
        }
    </style>
</head>
<body>
    <!-- Offerings Section -->
    <section class="offering-container">
        <div class="container">
            <div class="section-header text-center mb-5" data-aos="fade-up" style="margin-bottom: 8rem !important;">
                <div class="title-wrapper">
                    <span class="corner-decoration" style="position: relative; top: -10px;">⌜</span>
                    <h2 class="main-title">Offerings</h2>
                    <span class="corner-decoration" style="position: relative; top: 6px;">⌟</span>
                </div>
                <p class="subtitle-text">Your Partners in Risk Intelligence</p>
            </div>
    <!-- First Product Block - ClimIntellio -->
    <div id="DATA" class="product-block">
      <!-- Laptop Frame -->
      <div class="laptop-container fade-in">
        <div class="laptop-screen">
          <div class="window-controls">
            <div class="control-dot" style="background-color: #ef4444;"></div>
            <div class="control-dot" style="background-color: #f59e0b;"></div>
            <div class="control-dot" style="background-color: #10b981;"></div>
          </div>
          <div class="content-area">
            <img src="assest/img/about/mokd.png" alt="ClimIntellio Dashboard">
          </div>
        </div>
        <div class="laptop-base"></div>
      </div>

      <!-- Text Content -->
      <div class="product-content">
        <div style="max-width: 36rem;">
          <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
            CLIMATE INTELLIGENCE PLATFORM
          </div>
          <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
            ClimIntellio –Ready to Use Climate Intelligence
          </h2>
          <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
            Access high-resolution climate and weather hazard maps for heatwaves, droughts, floods, and more. Explore multi-resolution climate data across block, district, and regional levels with flexible temporal scales. Get tailored climate risk mapping for vulnerable regions and sectors, along with sector-specific indices like dry/wet spell frequency and extreme heat days to support informed decision-making.
          </p>

          
          <div class="fade-in buttons-container">
                  <a href="<?php echo base_url('climintellio/request-form') ?>" class="btn btn-primary">
                      Request Data
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <line x1="5" y1="12" x2="19" y2="12"></line>
                          <polyline points="12 5 19 12 12 19"></polyline>
                      </svg>
                  </a>
                  <a href="<?php echo base_url('climintellio') ?>" class="btn btn-secondary">
                      Learn more
                  </a>
                  <a href="<?php echo base_url('climatedata') ?>" class="btn btn-outline">
                      Example Dataset
                  </a>
      
          </div>
        </div>
      </div>
    </div>

    <!-- Second Product Block - CropRisk.ai -->
    <div id="AGRI" class="product-block">
      <!-- Laptop Frame -->
      <div class="laptop-container fade-in">
        <div class="laptop-screen">
          <div class="window-controls">
            <div class="control-dot" style="background-color: #ef4444;"></div>
            <div class="control-dot" style="background-color: #f59e0b;"></div>
            <div class="control-dot" style="background-color: #10b981;"></div>
          </div>
          <div class="content-area">
            <img src="assest/img/about/AgRI.png" alt="Agriculture Risk Analysis Dashboard">
          </div>
        </div>
        <div class="laptop-base"></div>
      </div>

      <!-- Text Content -->
      <div class="product-content">
        <div style="max-width: 36rem;">
          <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
            AGRICULTURE RISK INTELLIGENCE
          </div>
          <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
            CropRisk.ai – Agriculture Risk Intelligence 
          </h2>
          <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
            CropRisk.ai is a crop-location-specific risk estimator that uses AI and machine learning to analyze crop-climate interactions through historical data. Integrating diverse datasets, CropRisk.ai provides historical, current , short-term , medium-term, and long-term risk assessments.
          </p>
          <div class="fade-in buttons-container">
            <a href="javascript:void(0);" class="btn btn-primary open-walkthrough-modal">
              Request Demo
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </a> 
            <a href="<?php echo base_url('croprisk') ?>" class="btn btn-secondary">
              Learn more
            </a>
            <a href="https://www.youtube.com/watch?v=yXlvvzwNR4k" target="_blank" class="btn btn-outline" style="display: inline-flex; align-items: center; gap: 0.5rem;">
              Watch Overview
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polygon points="5 3 19 12 5 21 5 3"></polygon>
              </svg>
            </a>
          </div>
        
        </div>
      </div>
    </div>
            <!-- Third Product Block - CityAdapt.AI -->
            <div id="CLIMATE" class="product-block">
                <div class="laptop-container fade-in">
                    <div class="laptop-screen">
                        <div class="window-controls">
                            <div class="control-dot" style="background-color: #ef4444;"></div>
                            <div class="control-dot" style="background-color: #f59e0b;"></div>
                            <div class="control-dot" style="background-color: #10b981;"></div>
                        </div>
                        <div class="content-area">
                            <img src="assest/img/about/CityAdapt.png" alt="Agriculture Risk Analysis Dashboard">
                        </div>
                    </div>
                    <div class="laptop-base"></div>
                </div>
                <div class="product-content">
                    <div style="max-width: 36rem;">
                        <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
                            CLIMATE RISK INTELLIGENCE
                        </div>
                        <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
                            CityAdapt.ai – Urban Climate Risk Intelligence
                        </h2>
                        <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
                            Gain deep insights into climate risks with ward-level vulnerability assessments and identification of high-risk hotspots. Track projected warming levels up to 2100 with annual updates, monitor greenhouse gas emissions, and access comprehensive socio-economic and demographic profiles to support data-driven urban resilience planning.
                        </p>
                        <div class="fade-in">
                            <a href="javascript:void(0);" class="btn btn-primary open-walkthrough-modal" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                                Book a Demo
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fourth Product Block - Climate Consulting -->
            <div id= "CONSULTING" class="product-block">
                <div class="laptop-container fade-in">
                    <div class="laptop-screen">
                        <div class="window-controls">
                            <div class="control-dot" style="background-color: #ef4444;"></div>
                            <div class="control-dot" style="background-color: #f59e0b;"></div>
                            <div class="control-dot" style="background-color: #10b981;"></div>
                        </div>
                        <div class="content-area">
                            <img src="assest/img/about/Consulting.png" alt="Agriculture Risk Analysis Dashboard">
                        </div>
                    </div>
                    <div class="laptop-base"></div>
                </div>
                <div class="product-content">
                    <div style="max-width: 36rem;">
                        <div class="fade-in" style="margin-bottom: 1rem; color: var(--accent); font-weight: 600; letter-spacing: 0.05em; font-size: 0.875rem;">
                            CLIMATE CONSULTING SERVICES
                        </div>
                        <h2 class="fade-in" style="font-size: 2.25rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--primary-color);">
                            Climate Consulting Services
                        </h2>
                        <p class="fade-in" style="color: #4b5563; font-size: 1.125rem; margin-bottom: 2rem;">
                            Delivering climate risk assessment reports tailored for corporate institutions, enterprises, governments , and NGOs. our services provide sector-specific climate impact analysis to guide effective risk mitigation. We also offer customized climate adaptation and resilience planning to support long-term sustainability and preparedness.
                        </p>
                        <div class="fade-in">
                            <a href="javascript:void(0);" class="btn btn-primary open-walkthrough-modal" style="display: inline-flex; align-items: center; gap: 0.5rem;">
                                Book a Demo
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
   <div id="consult-us" class="footer-contact sooter">
    <!-- <div class="footer-bg bg_img" data-background="assest/img/footer/footer-bg.png"></div> -->
    <div class="container">
        <div class="xb-contact-form">
            <div class="row g-0 mt-none-30">
                <div class="col-lg-7 mt-30">
                    <div class="xb-inner">
                        <h5 class="xb-item--sub-title text-white"><span><img src="assest/img/footer/contact.svg" alt=""></span> Contact Us</h5>
                        <h2 class="xb-item--title text-white">Do you have questions or went more information?</h2>
                        <form id="contactForm" action="<?= site_url('contact/submit') ?>" method="POST" onsubmit="return false;">
                            <div class="input-group">
                				<input type="hidden" id="url" name="url" value="<?php echo base_url();?>">
                			</div> 
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-user.svg" alt=""></span>
                                        <input type="text" placeholder="Steven Kevin" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-call.svg" alt=""></span>
                                        <input type="tel" placeholder="+91 98765 43210" name="phone" id="phone" inputmode="numeric" pattern="[0-9]*" maxlength="13" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-email.svg" alt=""></span>
                                        <input type="email" placeholder="example@climagroanlytics.com" name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="xb-item--field">
                                        <span><img src="assest/img/footer/contact-massage.svg" alt="   "></span>
                                        <select name="title" style="
                                            height: 50px; 
                                            padding: 2px 2px 2px 45px;  /* Added left padding */
                                            border-radius: 8px;          /* Added border radius */
                                            border: 1px solid #ccc;      /* Added border for better visibility */
                                            width: 100%;                 /* Ensure full width */
                                            background-color: white;     /* Ensure white background */
                                        ">
                                            <option value="">Help us understand how we can support you better.</option>
                                            <option value="Government / Policy Maker">Government / Policy Maker</option>
                                            <option value="Researcher / Academic">Researcher / Academic</option>
                                            <option value="Financial Institution / Insurer">Financial Institution / Insurer</option>
                                            <option value="NGO / Nonprofit">NGO / Nonprofit</option>
                                            <option value="Student">Student</option>
                                            <option value="Corporate Sustainability / ESG Professional">Corporate Sustainability / ESG Professional</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 ">
                                    <div class="xb-item--field">
                                    <span><img src="assest/img/footer/contact-massage.svg" alt="   "></span>
                                        <select name="interested" style="
                                            height: 50px; 
                                            padding: 2px 2px 2px 45px;  /* Added left padding */
                                            border-radius: 8px;          /* Added border radius */
                                            border: 1px solid #ccc;      /* Added border for better visibility */
                                            width: 100%;                 /* Ensure full width */
                                            background-color: white;     /* Ensure white background */
                                        ">
                                            <option value="" >Interested In (Optional)</option>
                                            <option value="CropRisk.ai">ClimIntellio</option>
                                            <option value="CropRisk.ai">CropRisk.ai</option>
                                            <option value="CityAdapt.ai">CityAdapt.ai</option>
                                            <option value="Climate Data Services">Climate Data Services</option>
                                            <option value="Climate Consulting">Climate Consulting</option>
                                            <option value="Collaborations">Collaborations / Research</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div> 
                                
                                
                                <div class="col-lg-12 xb-item--text-msg">
                                    <span><img src="assest/img/footer/contact-massage.svg" alt=""></span>
                                    <textarea class="xb-item--massage" name="comment" id="message" cols="30" rows="10" placeholder="Simultaneously we had a problem..."></textarea>
                                </div>
                                <div class="col-lg-12 xb-item--contact-btn">
                                    <button class="them-btn" type="submit">
                                        <span class="btn_label" data-text="Send Message">Send Message</span>
                                        <span class="btn_icon">
                                            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M14.434 0.999999C14.434 0.447714 13.9862 -8.61581e-07 13.434 -1.11446e-06L4.43396 -3.13672e-07C3.88168 -6.50847e-07 3.43396 0.447715 3.43396 0.999999C3.43396 1.55228 3.88168 2 4.43396 2L12.434 2L12.434 10C12.434 10.5523 12.8817 11 13.434 11C13.9862 11 14.434 10.5523 14.434 10L14.434 0.999999ZM2.14107 13.7071L14.1411 1.70711L12.7269 0.292893L0.726853 12.2929L2.14107 13.7071Z" fill="white"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mt-30">
                    <div class="footer-apps">
                        <div class="xb-item--holder">
                            <h2 class="xb-item--title text-white">Discover Future of Climate Risk Management </h2>
                            <p class="xb-item--content text-white">Unlock the power of advanced climate risk intelligence with a personalized demo! See firsthand how our cutting- edge solutions can help you navigate climate uncertainties. </p>
                            <h2 class="xb-item--title text-white">What You’ll Experience:</h2>
                            <ol>
                                <li>Climate-Induced Agricultural Risks  </li>
                                <li>
                                    Crop-Specific Vulnerability </li>
                                <li>Integration of Climate, Agricultural, and Management Data: </li>
                                <li>Localized Risk Estimation </li>
                                <li>Adaptation and Mitigation Strategies </li>
                                <li>Expert Guidance: Engage with our specialists who will answer your questions and show how our solutions can address your specific challenges. </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

        // Event listeners (with null checks)
        if (typeof climateLearnMoreBtn !== 'undefined' && climateLearnMoreBtn) {
            climateLearnMoreBtn.addEventListener('click', openClimateModal);
        }
        if (typeof climateCloseBtn !== 'undefined' && climateCloseBtn) {
            climateCloseBtn.addEventListener('click', closeClimateModal);
        }
        if (typeof climateModalOverlay !== 'undefined' && climateModalOverlay) {
            climateModalOverlay.addEventListener('click', (e) => {
                if (e.target === climateModalOverlay) {
                    closeClimateModal();
                }
            });
        }

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
            // Keep other jQuery code here if needed
        });

        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var form = this;
            var formData = new FormData(form);
            fetch(form.getAttribute('action'), { method: 'POST', body: formData })
            .then(function(res) { return res.json(); })
            .then(function(data) {
                if (data.success) {
                    form.reset();
                    if (typeof showClimToast === 'function') {
                        showClimToast('\uD83C\uDF89 Message Sent! Our team will connect with you soon.');
                    }
                } else {
                    var tmp = document.createElement('div');
                    tmp.innerHTML = data.message || 'Something went wrong.';
                    var lines = tmp.querySelectorAll('.error, div');
                    var msgs = [];
                    lines.forEach(function(el) { if (el.textContent.trim()) msgs.push('\u2022 ' + el.textContent.trim()); });
                    var cleanMsg = msgs.length ? msgs.join('<br>') : (tmp.textContent || data.message);
                    var r = document.querySelector('.form-results');
                    if (r) { r.innerHTML = '<div style="color:#ef4444;background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.25);border-radius:8px;padding:12px 16px;font-size:0.875rem;line-height:1.6;margin-top:12px;">\u26A0\uFE0F Please fix the following:<br>' + cleanMsg + '</div>'; r.classList.remove('d-none'); }
                }
            })
            .catch(function() {
                var r = document.querySelector('.form-results');
                if (r) { r.innerHTML = '<div style="color:#ef4444;padding:10px;">\u274C An error occurred. Please try again.</div>'; r.classList.remove('d-none'); }
            });
            return false;
        });
    </script>

    <?php include("footer.php"); ?>
</body>
</html>