<?php
include("header.php");
include("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Data Access | ClimIntellio</title>
    <meta name="description" content="Submit your climate data requirements. ClimIntellio provides analysis-ready climate intelligence for research, insurance, banking, and agriculture sectors.">
    <style>
        /* Climagro Brand Variables */
        :root {
            --ms-primary: #025b5f;
            --ms-primary-light: rgba(2, 91, 95, 0.08);
            --ms-accent: #f26a21;
            --ms-text-heading: #00463B;
            --ms-text-body: #4b5563;
            --ms-bg-input: #F3F4F5;
            --ms-font-heading: 'Manrope', serif;
            --ms-font-body: 'Outfit', sans-serif;
            --ms-border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--ms-font-body);
            background: #f8fffe;
            min-height: 100vh;
        }

        /* Full Page Layout */
        .form-page {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            min-height: 100vh;
        }

        /* Left Panel - Branding */
        .form-sidebar {
            background: linear-gradient(135deg, #025b5f 0%, #04888e 100%);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
        }

        .form-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        .sidebar-content {
            position: relative;
            z-index: 1;
            max-width: 400px;
        }

        .sidebar-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.6rem 1.25rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.95);
            letter-spacing: 0.05em;
            margin-bottom: 2rem;
            backdrop-filter: blur(10px);
        }

        .sidebar-logo::before {
            content: '';
            width: 10px;
            height: 10px;
            background: #14b8a6;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }

        .sidebar-title {
            color: white;
            font-family: var(--ms-font-heading);
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .sidebar-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            line-height: 1.7;
            margin-bottom: 3rem;
        }

        .sidebar-features {
            list-style: none;
        }

        .sidebar-features li {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .sidebar-features li::before {
            content: '✓';
            width: 28px;
            height: 28px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .sidebar-back {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            margin-top: 3rem;
            transition: all 0.2s;
        }

        .sidebar-back:hover {
            color: white;
            gap: 0.75rem;
        }

        /* Right Panel - Form */
        .form-main {
            padding: 3rem 4rem;
            display: flex;
            flex-direction: column;
            background: white;
            min-height: 100vh;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .form-step-indicator {
            color: var(--ms-primary);
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Progress Bar */
        .fp-progress-container {
            height: 6px;
            background: #e5e7eb;
            border-radius: 3px;
            margin-bottom: 3rem;
            overflow: hidden;
        }

        .fp-progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--ms-primary), #14b8a6);
            width: 0%;
            border-radius: 3px;
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Steps */
        .fp-step {
            display: none;
            animation: fadeIn 0.4s ease;
            flex: 1;
        }

        .fp-step.active {
            display: flex;
            flex-direction: column;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fp-step-title {
            color: var(--ms-text-heading);
            font-family: var(--ms-font-heading);
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .fp-step-subtitle {
            color: #64748b;
            font-size: 1.05rem;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .fp-step-content {
            flex: 1;
        }

        /* Form Elements */
        .fp-grid-options {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .fp-option-card {
            background: #fff;
            border: 2px solid var(--ms-border);
            border-radius: 16px;
            padding: 1.75rem;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: flex-start;
            gap: 1.25rem;
            position: relative;
        }

        .fp-option-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.08);
        }

        .fp-option-card.selected {
            background: linear-gradient(135deg, rgba(2, 91, 95, 0.05), rgba(2, 91, 95, 0.02));
            border-color: var(--ms-primary);
            box-shadow: 0 0 0 4px var(--ms-primary-light);
        }

        .fp-option-radio {
            appearance: none;
            width: 24px;
            height: 24px;
            border: 2px solid #94a3b8;
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 2px;
            position: relative;
            transition: all 0.2s;
        }

        .fp-option-card.selected .fp-option-radio {
            border-color: var(--ms-primary);
            background: #fff;
        }

        .fp-option-card.selected .fp-option-radio::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            background: var(--ms-primary);
            border-radius: 50%;
        }

        .fp-option-content {
            flex: 1;
        }

        .fp-option-title {
            color: var(--ms-text-heading);
            font-family: var(--ms-font-heading);
            font-weight: 700;
            font-size: 1.15rem;
            margin-bottom: 0.35rem;
            display: block;
        }

        .fp-option-desc {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Input Fields */
        .fp-input-group {
            margin-bottom: 1.75rem;
        }

        .fp-label {
            display: block;
            color: var(--ms-text-heading);
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 0.6rem;
            font-family: var(--ms-font-heading);
        }

        .fp-input, .fp-select {
            width: 100%;
            background: var(--ms-bg-input);
            border: 2px solid transparent;
            color: var(--ms-text-heading);
            padding: 1.1rem 1.35rem;
            border-radius: 12px;
            font-size: 1rem;
            font-family: var(--ms-font-body);
            transition: all 0.2s;
        }

        .fp-input:focus, .fp-select:focus {
            outline: none;
            background: #fff;
            border-color: var(--ms-primary);
            box-shadow: 0 0 0 4px var(--ms-primary-light);
        }

        /* Checkboxes */
        .fp-checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 0.85rem;
        }

        .fp-checkbox-label {
            background: #fff;
            border: 2px solid var(--ms-border);
            padding: 1rem 1.25rem;
            border-radius: 12px;
            cursor: pointer;
            color: #64748b;
            font-size: 0.95rem;
            transition: all 0.2s;
            text-align: center;
            user-select: none;
            font-weight: 500;
        }

        .fp-checkbox-label:hover {
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        .fp-checkbox-label.checked {
            background: var(--ms-primary-light);
            border-color: var(--ms-primary);
            color: var(--ms-primary);
            font-weight: 700;
        }

        .fp-checkbox-input {
            display: none;
        }

        /* Footer / Actions */
        .fp-footer {
            padding-top: 2rem;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--ms-border);
        }

        .fp-btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s;
            font-size: 1rem;
            border: none;
            font-family: var(--ms-font-heading);
        }

        .fp-btn-next {
            background: linear-gradient(135deg, var(--ms-primary), #04888e);
            color: white;
            box-shadow: 0 8px 20px rgba(2, 91, 95, 0.3);
        }

        .fp-btn-next:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(2, 91, 95, 0.4);
        }

        .fp-btn-prev {
            background: transparent;
            color: #64748b;
            padding-left: 0;
        }

        .fp-btn-prev:hover {
            color: var(--ms-text-heading);
        }
        
        .fp-btn-reset {
            background: #f1f5f9;
            color: #64748b;
            padding: 1rem 1.75rem;
        }
        
        .fp-btn-reset:hover {
            background: #e2e8f0;
            color: #475569;
        }

        /* Review List */
        .fp-review-list {
            background: #f8fafc;
            border-radius: 16px;
            padding: 1.75rem;
            border: 1px solid #e2e8f0;
        }

        .fp-review-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .fp-review-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .fp-review-item:first-child {
            padding-top: 0;
        }

        .fp-review-label {
            color: #64748b;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .fp-review-value {
            color: var(--ms-text-heading);
            font-weight: 700;
            text-align: right;
            max-width: 60%;
        }

        /* Success State */
        .success-container {
            text-align: center;
            padding: 3rem 0;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--ms-primary-light), rgba(20, 184, 166, 0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
        }

        .success-icon i {
            color: var(--ms-primary);
            font-size: 3rem;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .form-page {
                grid-template-columns: 1fr;
            }

            .form-sidebar {
                position: relative;
                height: auto;
                min-height: auto;
                padding: 2rem;
            }

            .sidebar-content {
                max-width: 100%;
            }

            .sidebar-title {
                font-size: 2rem;
            }

            .sidebar-features {
                display: none;
            }

            .sidebar-back {
                margin-top: 1.5rem;
            }

            .form-main {
                padding: 2rem;
            }
        }

        @media (max-width: 640px) {
            .form-sidebar {
                padding: 1.5rem;
            }

            .sidebar-title {
                font-size: 1.5rem;
            }

            .sidebar-description {
                font-size: 0.95rem;
                margin-bottom: 1rem;
            }

            .form-main {
                padding: 1.5rem;
            }

            .fp-step-title {
                font-size: 1.5rem;
            }

            .fp-checkbox-group {
                grid-template-columns: 1fr 1fr;
            }

            .fp-footer {
                flex-direction: column;
                gap: 1rem;
            }

            .fp-footer > * {
                width: 100%;
                text-align: center;
            }

            .fp-btn-prev {
                order: 2;
                padding: 0.75rem;
            }

            .fp-btn-next {
                order: 1;
            }

            .fp-btn-reset {
                order: 3;
            }
        }

        /* Location Chips Styles */
        .fp-selected-chips {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            padding: 1rem;
            background: var(--ms-bg-input);
            border-radius: 12px;
            min-height: 60px;
        }

        .fp-chip-placeholder {
            color: #9ca3af;
            font-size: 0.9rem;
            font-style: italic;
        }

        .fp-location-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, var(--ms-primary), #04888e);
            color: white;
            padding: 0.5rem 0.85rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            animation: chipAppear 0.2s ease;
        }

        @keyframes chipAppear {
            from { opacity: 0; transform: scale(0.8); }
            to { opacity: 1; transform: scale(1); }
        }

        .fp-chip-remove {
            background: rgba(255,255,255,0.25);
            border: none;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            line-height: 1;
            transition: background 0.2s;
        }

        .fp-chip-remove:hover {
            background: rgba(255,255,255,0.4);
        }

        /* Metrics Step Styles */
        .fp-metrics-container {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .fp-metric-group {
            background: #fff;
            border: 1px solid var(--ms-border);
            border-radius: 16px;
            padding: 1.25rem;
        }

        .fp-metric-group-header {
            display: inline-block;
            background: #f3f4f6;
            color: #374151;
            padding: 0.4rem 0.85rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .fp-metric-options {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
        }

        .fp-metric-chip {
            background: #fff;
            border: 2px solid var(--ms-border);
            padding: 0.6rem 1.1rem;
            border-radius: 50px;
            cursor: pointer;
            color: #64748b;
            font-size: 0.9rem;
            transition: all 0.2s;
            font-weight: 500;
            user-select: none;
        }

        .fp-metric-chip:hover {
            border-color: #94a3b8;
            transform: translateY(-1px);
        }

        .fp-metric-chip.selected {
            background: linear-gradient(135deg, var(--ms-primary), #04888e);
            border-color: var(--ms-primary);
            color: white;
            font-weight: 600;
        }

        .fp-metric-chip input {
            display: none;
        }

        .fp-metrics-counter {
            background: var(--ms-primary-light);
            padding: 1.25rem;
            border-radius: 12px;
            text-align: left;
            color: var(--ms-text-heading);
            font-size: 1rem;
            margin-top: 1.5rem;
        }

        .fp-metrics-counter strong {
            color: var(--ms-primary);
        }

        /* Custom Multi-Select Dropdown */
        .fp-multi-select-wrapper {
            position: relative;
            width: 100%;
        }

        .fp-multi-select-trigger {
            background: #fff;
            border: 1px solid var(--ms-border);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 45px;
            font-size: 0.95rem;
            color: #374151;
            transition: all 0.2s;
        }

        .fp-multi-select-trigger:hover {
            border-color: #94a3b8;
        }

        .fp-multi-select-trigger:after {
            content: '▼';
            font-size: 0.7em;
            color: #9ca3af;
            transition: transform 0.2s;
        }

        .fp-multi-select-wrapper.open .fp-multi-select-trigger:after {
            transform: rotate(180deg);
        }

        .fp-multi-select-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border: 1px solid var(--ms-border);
            border-radius: 8px;
            margin-top: 4px;
            max-height: 0;
            overflow: hidden;
            z-index: 100;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
            opacity: 0;
        }

        .fp-multi-select-wrapper.open .fp-multi-select-dropdown {
            max-height: 250px;
            opacity: 1;
            overflow-y: auto;
            padding: 0.5rem 0;
        }

        .fp-multi-option {
            padding: 0.6rem 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: background 0.15s;
            font-size: 0.9rem;
            color: #4b5563;
        }

        .fp-multi-option:hover {
            background-color: #f3f4f6;
        }

        .fp-multi-option.selected {
            background-color: #f0fdf4;
            color: var(--ms-primary);
            font-weight: 500;
        }

        .fp-multi-option input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 2px solid #cbd5e1;
            cursor: pointer;
            accent-color: var(--ms-primary);
        }

        .fp-selected-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.25rem;
            margin-top: 0.5rem;
        }
        
        .fp-selected-tag {
            background: var(--ms-primary-light);
            color: var(--ms-primary);
            font-size: 0.8rem;
            padding: 0.2rem 0.6rem;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
        }

        /* Hide native select when custom is active */
        .fp-select.hidden-force {
            display: none !important;
        }
    </style>
</head>
<body>

<main class="form-page">
    <!-- Left Sidebar -->
    <aside class="form-sidebar">
        <div class="sidebar-content">
            <div class="sidebar-logo">ClimIntellio</div>
            <h1 class="sidebar-title">Request Climate Data Access</h1>
            <p class="sidebar-description">
                Get instant access to analysis-ready climate intelligence. Choose your parameters and receive customized data for your research or business needs.
            </p>
            
            <ul class="sidebar-features">
                <li>170+ years of climate data</li>
                <li>500+ districts covered</li>
                <li>25 hazard indices</li>
                <li>Multiple delivery formats</li>
                <li>API access available</li>
            </ul>

            <a href="<?php echo site_url('climintellio'); ?>" class="sidebar-back">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to ClimIntellio
            </a>
        </div>
    </aside>

    <!-- Right Form Panel -->
    <div class="form-main">
        <div class="form-header">
            <span class="form-step-indicator" id="stepIndicator">Step 1 of 10</span>
        </div>
        
        <div class="fp-progress-container">
            <div class="fp-progress-fill" id="fpProgress"></div>
        </div>

        <form id="fpForm" onsubmit="return false;">
            
            <!-- Step 1: Request Type -->
            <div class="fp-step active" data-step="1">
                <h2 class="fp-step-title">What do you need?</h2>
                <p class="fp-step-subtitle">Choose the type of data access you require.</p>
                
                <div class="fp-step-content">
                    <div class="fp-grid-options">
                        <label class="fp-option-card">
                            <input type="radio" name="request_type" value="Ready-to-use Data" class="fp-option-radio">
                            <div class="fp-option-content">
                                <span class="fp-option-title">Ready-to-use Data</span>
                                <span class="fp-option-desc">Process-ready climate variables (NetCDF, CSV, ASCII) for direct integration into your models.</span>
                            </div>
                        </label>
                        
                        <label class="fp-option-card">
                            <input type="radio" name="request_type" value="Hazard Maps" class="fp-option-radio">
                            <div class="fp-option-content">
                                <span class="fp-option-title">Hazard Maps</span>
                                <span class="fp-option-desc">Visualized risk assessments including flood, drought, and heatwave maps.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()" id="fpResetBtn">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()" id="fpPrevBtn" style="visibility: hidden;">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()" id="fpNextBtn">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 2a: Location Method (Data Path) -->
            <div class="fp-step" data-step="2a">
                <h2 class="fp-step-title">Location Method</h2>
                <p class="fp-step-subtitle">How would you like to select your area of interest?</p>
                
                <div class="fp-step-content">
                    <div class="fp-grid-options">
                        <label class="fp-option-card">
                            <input type="radio" name="location_method" value="Administrative Boundary" class="fp-option-radio">
                            <div class="fp-option-content">
                                <span class="fp-option-title">Administrative Boundary</span>
                                <span class="fp-option-desc">Select by State, District, or Sub-district boundaries.</span>
                            </div>
                        </label>
                        
                        <label class="fp-option-card">
                            <input type="radio" name="location_method" value="Gridded Data" class="fp-option-radio">
                            <div class="fp-option-content">
                                <span class="fp-option-title">Gridded Data</span>
                                <span class="fp-option-desc">Select specific grid coordinates (Lat/Long).</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>
            
            <!-- Step 2b: Hazard Type (Hazard Path) -->
            <div class="fp-step" data-step="2b">
                <h2 class="fp-step-title">Hazard Types</h2>
                <p class="fp-step-subtitle">Select the risks you want to analyze.</p>
                
                <div class="fp-step-content">
                    <div class="fp-checkbox-group">
                        <label class="fp-checkbox-label"><input type="checkbox" name="hazards[]" value="Drought" class="fp-checkbox-input"> Drought</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="hazards[]" value="Flood" class="fp-checkbox-input"> Flood</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="hazards[]" value="Heat" class="fp-checkbox-input"> Extreme Heat</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="hazards[]" value="Extreme Rainfall" class="fp-checkbox-input"> Extreme Rainfall</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="hazards[]" value="Compound" class="fp-checkbox-input"> Compound Events</label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 3: Admin Level -->
            <div class="fp-step" data-step="3">
                <h2 class="fp-step-title">Administrative Level</h2>
                <p class="fp-step-subtitle">Choose the granularity of your data.</p>
                
                <div class="fp-step-content">
                    <div class="fp-grid-options">
                        <label class="fp-option-card">
                            <input type="radio" name="admin_level" value="State" class="fp-option-radio">
                            <div class="fp-option-content"><span class="fp-option-title">State Level</span></div>
                        </label>
                        <label class="fp-option-card">
                            <input type="radio" name="admin_level" value="District" class="fp-option-radio">
                            <div class="fp-option-content"><span class="fp-option-title">District Level</span></div>
                        </label>
                        <label class="fp-option-card">
                            <input type="radio" name="admin_level" value="Sub-district" class="fp-option-radio">
                            <div class="fp-option-content"><span class="fp-option-title">Sub-district (Block/Tehsil)</span></div>
                        </label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 4: Specific Location -->
            <div class="fp-step" data-step="4">
                <h2 class="fp-step-title">Select Location</h2>
                <p class="fp-step-subtitle">Select states and districts (Ctrl+click for multiple).</p>
                
                <div class="fp-step-content">
                    <div class="fp-input-group">
                        <label class="fp-label">Country</label>
                        <select name="country" class="fp-select" disabled><option value="India" selected>India</option></select>
                    </div>
                    
                    <div class="fp-input-group">
                        <label class="fp-label">States *</label>
                        <select id="fpStateSelect" name="states[]" class="fp-select fp-multi-select" multiple size="6">
                            <!-- Populated by JS -->
                        </select>
                        <small style="color: #64748b; font-size: 0.8rem;">Hold Ctrl/Cmd to select multiple states</small>
                    </div>
                    
                    <div class="fp-input-group">
                        <label class="fp-label">Districts *</label>
                        <select id="fpDistrictSelect" name="districts[]" class="fp-select fp-multi-select" multiple size="6">
                            <option value="">Select state(s) first</option>
                        </select>
                        <small style="color: #64748b; font-size: 0.8rem;">Hold Ctrl/Cmd to select multiple districts</small>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 5: Variables -->
            <div class="fp-step" data-step="5">
                <h2 class="fp-step-title">Climate Variables</h2>
                <p class="fp-step-subtitle">Select the parameters you need.</p>
                
                <div class="fp-step-content">
                    <div class="fp-checkbox-group">
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="Rainfall" class="fp-checkbox-input"> Rainfall</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="T-Max" class="fp-checkbox-input"> T-Max</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="T-Min" class="fp-checkbox-input"> T-Min</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="T-Mean" class="fp-checkbox-input"> T-Mean</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="Humidity" class="fp-checkbox-input"> Humidity</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="Wind Speed" class="fp-checkbox-input"> Wind Speed</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="Solar Radiation" class="fp-checkbox-input"> Solar Radiation</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="Soil Moisture" class="fp-checkbox-input"> Soil Moisture</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="PET / Evapotranspiration" class="fp-checkbox-input"> PET</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="variables[]" value="NDVI / Vegetation" class="fp-checkbox-input"> NDVI</label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 5b: Metrics (Conditional on Variables) -->
            <div class="fp-step" data-step="5b">
                <h2 class="fp-step-title">Metrics</h2>
                <p class="fp-step-subtitle">Select specific metrics for your chosen variables.</p>
                
                <div class="fp-step-content">
                    <div id="fpMetricsContainer" class="fp-metrics-container">
                        <!-- Dynamically populated by JS -->
                    </div>
                    
                    <div class="fp-metrics-counter" id="fpMetricsCounter">
                        Selected metrics count: <strong>0</strong>
                    </div>
                    
                    <input type="hidden" name="metrics" id="fpMetricsInput" value="">
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 6: Coverage -->
            <div class="fp-step" data-step="6">
                <h2 class="fp-step-title">Temporal Coverage</h2>
                <p class="fp-step-subtitle">Select the time horizon for your analysis.</p>
                
                <div class="fp-step-content">
                    <div class="fp-grid-options">
                        <label class="fp-option-card selected">
                            <input type="radio" name="coverage" value="Historical" class="fp-option-radio" checked>
                            <div class="fp-option-content">
                                <span class="fp-option-title">Historical (1901-2024)</span>
                                <span class="fp-option-desc">Observed data from past records.</span>
                            </div>
                        </label>
                        <label class="fp-option-card">
                            <input type="radio" name="coverage" value="Future Projections" class="fp-option-radio">
                            <div class="fp-option-content">
                                <span class="fp-option-title">Future Projections (2025-2100)</span>
                                <span class="fp-option-desc">Modelled projections for future climate scenarios.</span>
                            </div>
                        </label>
                        <label class="fp-option-card">
                            <input type="radio" name="coverage" value="Both" class="fp-option-radio">
                            <div class="fp-option-content">
                                <span class="fp-option-title">Both</span>
                                <span class="fp-option-desc">Complete timeline from 1901 to 2100.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 7: Climate Scenarios -->
            <div class="fp-step" data-step="7">
                <h2 class="fp-step-title">Climate Scenarios</h2>
                <p class="fp-step-subtitle">Select Shared Socioeconomic Pathways (SSPs).</p>
                
                <div class="fp-step-content">
                    <div class="fp-checkbox-group">
                        <label class="fp-checkbox-label"><input type="checkbox" name="scenarios[]" value="SSP1-2.6" class="fp-checkbox-input"> SSP1-2.6 (Sustainability)</label>
                        <label class="fp-checkbox-label checked"><input type="checkbox" name="scenarios[]" value="SSP2-4.5" class="fp-checkbox-input" checked> SSP2-4.5 (Middle of Road)</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="scenarios[]" value="SSP3-7.0" class="fp-checkbox-input"> SSP3-7.0 (Regional Rivalry)</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="scenarios[]" value="SSP5-8.5" class="fp-checkbox-input"> SSP5-8.5 (Fossil-fueled)</label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 8: Format -->
            <div class="fp-step" data-step="8">
                <h2 class="fp-step-title">Data Format</h2>
                <p class="fp-step-subtitle">How would you like to receive the data?</p>
                
                <div class="fp-step-content">
                    <div class="fp-input-group">
                        <label class="fp-label">File Format</label>
                        <select name="format" class="fp-select">
                            <option value="CSV">CSV (Spreadsheet)</option>
                            <option value="NetCDF">NetCDF (Scientific)</option>
                            <option value="GeoJSON">GeoJSON / Shapefile</option>
                            <option value="ASCII">ASCII Grid</option>
                        </select>
                    </div>
                    <div class="fp-checkbox-group" style="margin-top: 1.5rem;">
                        <label class="fp-checkbox-label checked"><input type="checkbox" name="extras[]" value="Metadata" class="fp-checkbox-input" checked> Include Metadata</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="extras[]" value="Summary Tables" class="fp-checkbox-input"> Include Summary Tables</label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 9: Contact Details -->
            <div class="fp-step" data-step="9">
                <h2 class="fp-step-title">Your Details</h2>
                <p class="fp-step-subtitle">Where should we send the data access link?</p>
                
                <div class="fp-step-content">
                    <div class="fp-input-group">
                        <label class="fp-label">Full Name *</label>
                        <input type="text" name="user_name" class="fp-input" placeholder="e.g. John Doe" required>
                    </div>
                    <div class="fp-input-group">
                        <label class="fp-label">Email Address *</label>
                        <input type="email" name="user_email" class="fp-input" placeholder="e.g. john@company.com" required>
                    </div>
                    <div class="fp-input-group">
                        <label class="fp-label">Organization Type</label>
                        <select name="user_org_type" class="fp-select">
                            <option value="Agribusiness">Agribusiness</option>
                            <option value="Research">Research / Academic</option>
                            <option value="Government">Government / Policy</option>
                            <option value="Insurance">Insurance / Finance</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next →</button>
                    </div>
                </div>
            </div>

            <!-- Step 10: Summary -->
            <div class="fp-step" data-step="10">
                <h2 class="fp-step-title">Review Request</h2>
                <p class="fp-step-subtitle">Please review your configuration before submitting.</p>
                
                <div class="fp-step-content">
                    <div class="fp-review-list" id="fpReviewList"></div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()" style="background: linear-gradient(135deg, #10b981, #059669);">Submit Request</button>
                    </div>
                </div>
            </div>
            
            <!-- Success State -->
            <div class="fp-step" data-step="success">
                <div class="success-container">
                    <div class="success-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h2 class="fp-step-title" style="color: var(--ms-primary);">Request Submitted!</h2>
                    <p class="fp-step-subtitle">We have received your request. An email with access details has been sent to your inbox.</p>
                    
                    <div style="background: var(--ms-bg-input); padding: 1.25rem; border-radius: 16px; display: inline-block; margin-top: 1.5rem;">
                        <span style="display: block; font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">REQUEST ID</span>
                        <span style="font-family: monospace; font-size: 1.5rem; color: var(--ms-text-heading); letter-spacing: 3px;" id="fpRequestId">CLM-XXXX-YYYY</span>
                    </div>
                    
                    <div style="margin-top: 2.5rem;">
                        <a href="<?php echo site_url('climintellio'); ?>" class="fp-btn fp-btn-next" style="display: inline-block; text-decoration: none;">
                            ← Back to ClimIntellio
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>
</main>

<!-- Load Locations Data -->
<script src="<?php echo base_url('assest/js/india-locations.js'); ?>"></script>

<script>
    let currentStep = 1;
    const stepHistory = [];

    document.addEventListener('DOMContentLoaded', () => {
        initLocations();
        updateUI();
        setupEventListeners();
    });

    function initLocations() {
        const stateSelect = document.getElementById('fpStateSelect');
        const districtSelect = document.getElementById('fpDistrictSelect');
        
        if(typeof indiaLocations !== 'undefined') {
            Object.keys(indiaLocations).sort().forEach(state => {
                const option = document.createElement('option');
                option.value = state;
                option.textContent = state;
                stateSelect.appendChild(option);
            });
            
            // Initialize custom select for states
            setupCustomMultiSelect('fpStateSelect', 'Select State(s)');
            setupCustomMultiSelect('fpDistrictSelect', 'Select District(s)');

            // Handle multi-state selection -> populate districts
            stateSelect.addEventListener('change', function() {
                const selectedStates = Array.from(this.selectedOptions).map(opt => opt.value);
                districtSelect.innerHTML = '';
                
                if (selectedStates.length === 0) {
                    districtSelect.innerHTML = '<option value="">Select state(s) first</option>';
                    refreshCustomMultiSelect('fpDistrictSelect');
                    return;
                }

                // Add "All Districts" option
                const allOption = document.createElement('option');
                allOption.value = 'All Districts';
                allOption.textContent = '-- All Districts --';
                districtSelect.appendChild(allOption);

                // Add districts from all selected states
                selectedStates.forEach(state => {
                    if (indiaLocations[state]) {
                        indiaLocations[state].sort().forEach(dist => {
                            const option = document.createElement('option');
                            option.value = dist;
                            option.textContent = `${dist} (${state})`;
                            districtSelect.appendChild(option);
                        });
                    }
                });
                
                // Refresh custom district select options
                refreshCustomMultiSelect('fpDistrictSelect');
            });
        }
    }

    // Custom Multi-Select Logic
    function setupCustomMultiSelect(selectId, placeholder) {
        const select = document.getElementById(selectId);
        select.classList.add('hidden-force');
        
        // Create Wrapper
        const wrapper = document.createElement('div');
        wrapper.className = 'fp-multi-select-wrapper';
        wrapper.id = selectId + '_wrapper';
        
        // Trigger
        const trigger = document.createElement('div');
        trigger.className = 'fp-multi-select-trigger';
        trigger.innerHTML = `<span>${placeholder}</span>`;
        trigger.onclick = (e) => {
            // Close other dropdowns
            document.querySelectorAll('.fp-multi-select-wrapper').forEach(w => {
                if(w !== wrapper) w.classList.remove('open');
            });
            wrapper.classList.toggle('open');
        };
        
        // Dropdown List
        const dropdown = document.createElement('div');
        dropdown.className = 'fp-multi-select-dropdown';
        
        // Selected Tags Area (below trigger)
        const tagsArea = document.createElement('div');
        tagsArea.className = 'fp-selected-tags';
        
        wrapper.appendChild(trigger);
        wrapper.appendChild(dropdown);
        select.parentNode.insertBefore(wrapper, select.nextSibling); // Insert after select
        select.parentNode.insertBefore(tagsArea, wrapper.nextSibling); // Insert tags after wrapper

        // Populate
        refreshCustomMultiSelect(selectId);

        // Close on click outside
        document.addEventListener('click', (e) => {
            if (!wrapper.contains(e.target)) {
                wrapper.classList.remove('open');
            }
        });
    }

    function refreshCustomMultiSelect(selectId) {
        const select = document.getElementById(selectId);
        const wrapper = document.getElementById(selectId + '_wrapper');
        const dropdown = wrapper.querySelector('.fp-multi-select-dropdown');
        const triggerSpan = wrapper.querySelector('.fp-multi-select-trigger span');
        const tagsArea = wrapper.nextElementSibling; // tags are next sibling

        dropdown.innerHTML = '';
        tagsArea.innerHTML = '';
        
        let selectedCount = 0;
        
        Array.from(select.options).forEach(opt => {
            if (opt.value === '') return; // Skip placeholder

            const optionDiv = document.createElement('div');
            optionDiv.className = `fp-multi-option ${opt.selected ? 'selected' : ''}`;
            
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = opt.selected;
            
            const label = document.createTextNode(opt.textContent);
            
            optionDiv.appendChild(checkbox);
            optionDiv.appendChild(label);
            
            optionDiv.onclick = (e) => {
                e.stopPropagation(); // prevent closing
                // Toggle
                opt.selected = !opt.selected;
                checkbox.checked = opt.selected;
                optionDiv.classList.toggle('selected', opt.selected);
                
                // Trigger change on native select
                select.dispatchEvent(new Event('change'));
                
                // Update UI text immediately
                updateSelectedDisplay(select, triggerSpan, tagsArea);
            };
             // Allow checkbox click to bubble to div or handle it
            checkbox.onclick = (e) => { e.stopPropagation(); opt.selected = checkbox.checked; optionDiv.classList.toggle('selected'); select.dispatchEvent(new Event('change')); updateSelectedDisplay(select, triggerSpan, tagsArea); };

            dropdown.appendChild(optionDiv);
            if (opt.selected) selectedCount++;
        });

        updateSelectedDisplay(select, triggerSpan, tagsArea);
    }

    function updateSelectedDisplay(select, triggerSpan, tagsArea) {
        const selectedOptions = Array.from(select.selectedOptions);
        if (selectedOptions.length === 0) {
            triggerSpan.textContent = select.id.includes('State') ? 'Select State(s)' : 'Select District(s)';
            tagsArea.innerHTML = '';
        } else {
            triggerSpan.textContent = `${selectedOptions.length} Selected`;
            tagsArea.innerHTML = selectedOptions.map(opt => `<span class="fp-selected-tag">${opt.textContent}</span>`).join('');
        }
    }

    // Variable to Metrics Mapping
    const fpVariableMetrics = {
        'Rainfall': ['Seasonal Total', 'Wet Days', 'Dry Days', 'Heavy Rainfall Days', 'Trend', 'Anomaly', 'SPI'],
        'T-Max': ['Mean Max Temp', 'Hot Days (>35°C)', 'Heat Wave Days', 'Trend', 'Anomaly'],
        'T-Min': ['Mean Min Temp', 'Cold Days (<10°C)', 'Frost Days', 'Trend', 'Anomaly'],
        'T-Mean': ['Annual Mean', 'Growing Degree Days', 'Trend', 'Anomaly'],
        'Humidity': ['Mean Relative Humidity', 'High Humidity Days', 'Low Humidity Days'],
        'Wind Speed': ['Mean Wind', 'Max Wind', 'Windy Days'],
        'Solar Radiation': ['Mean Radiation', 'Sunshine Hours', 'Cloud Cover Days'],
        'Soil Moisture': ['Surface Soil Moisture', 'Root Zone Moisture', 'Soil Water Index'],
        'PET / Evapotranspiration': ['Reference ET', 'Potential ET', 'Aridity Index'],
        'NDVI / Vegetation': ['Mean NDVI', 'Peak NDVI', 'Vegetation Anomaly']
    };

    const fpSelectedMetrics = {};

    function fpPopulateMetrics() {
        const container = document.getElementById('fpMetricsContainer');
        const selectedVars = Array.from(document.querySelectorAll('input[name="variables[]"]:checked')).map(cb => cb.value);
        
        if (selectedVars.length === 0) {
            container.innerHTML = '<p style="color: #64748b; text-align: center;">No variables selected. Go back and select at least one variable.</p>';
            return;
        }

        let html = '';
        selectedVars.forEach(variable => {
            const metrics = fpVariableMetrics[variable] || [];
            if (metrics.length > 0) {
                html += `
                    <div class="fp-metric-group">
                        <div class="fp-metric-group-header">${variable}</div>
                        <div class="fp-metric-options">
                            ${metrics.map(metric => `
                                <label class="fp-metric-chip" onclick="fpToggleMetric('${variable}', '${metric}', this)">
                                    <input type="checkbox" value="${metric}">
                                    ${metric}
                                </label>
                            `).join('')}
                        </div>
                    </div>
                `;
            }
        });

        container.innerHTML = html;
        fpUpdateMetricsCounter();
    }

    function fpToggleMetric(variable, metric, element) {
        const input = element.querySelector('input');
        input.checked = !input.checked;
        element.classList.toggle('selected', input.checked);

        if (!fpSelectedMetrics[variable]) fpSelectedMetrics[variable] = [];
        if (input.checked) {
            if (!fpSelectedMetrics[variable].includes(metric)) {
                fpSelectedMetrics[variable].push(metric);
            }
        } else {
            fpSelectedMetrics[variable] = fpSelectedMetrics[variable].filter(m => m !== metric);
        }

        fpUpdateMetricsCounter();
        document.getElementById('fpMetricsInput').value = JSON.stringify(fpSelectedMetrics);
    }

    function fpUpdateMetricsCounter() {
        let total = 0;
        Object.values(fpSelectedMetrics).forEach(arr => total += arr.length);
        document.querySelector('#fpMetricsCounter strong').textContent = total;
    }

    // Multi-location selection
    const fpSelectedLocations = [];

    function fpAddLocation() {
        const stateSelect = document.getElementById('fpStateSelect');
        const districtSelect = document.getElementById('fpDistrictSelect');
        const state = stateSelect.value;
        const district = districtSelect.value;

        if (!state) { alert('Please select a state'); return; }
        if (!district) { alert('Please select a district'); return; }

        if (fpSelectedLocations.some(loc => loc.state === state && loc.district === district)) {
            alert('This location is already added');
            return;
        }

        fpSelectedLocations.push({ state, district });
        fpUpdateLocationsDisplay();
        stateSelect.value = '';
        districtSelect.innerHTML = '<option value="">Select District</option>';
    }

    function fpRemoveLocation(index) {
        fpSelectedLocations.splice(index, 1);
        fpUpdateLocationsDisplay();
    }

    function fpUpdateLocationsDisplay() {
        const container = document.getElementById('fpSelectedLocations');
        const hiddenInput = document.getElementById('fpLocationsInput');

        if (fpSelectedLocations.length === 0) {
            container.innerHTML = '<span class="fp-chip-placeholder">No locations added yet. Select state & district above and click Add.</span>';
            hiddenInput.value = '';
        } else {
            container.innerHTML = fpSelectedLocations.map((loc, idx) => `
                <div class="fp-location-chip">
                    ${loc.district}, ${loc.state}
                    <button type="button" class="fp-chip-remove" onclick="fpRemoveLocation(${idx})">×</button>
                </div>
            `).join('');
            hiddenInput.value = JSON.stringify(fpSelectedLocations);
        }
    }

    function fpNextStep() {
        if (!validateStep(currentStep)) return;
        stepHistory.push(currentStep);
        const nextStep = determineNextStep(currentStep);
        if (nextStep === 'submit') {
            submitForm();
        } else {
            currentStep = nextStep;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    }

    function fpPrevStep() {
        if (stepHistory.length === 0) return;
        currentStep = stepHistory.pop();
        updateUI();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    function fpResetForm() {
        currentStep = 1;
        stepHistory.length = 0;
        document.getElementById('fpForm').reset();
        document.querySelectorAll('.fp-option-card').forEach(c => c.classList.remove('selected'));
        document.querySelectorAll('.fp-checkbox-label').forEach(c => c.classList.remove('checked'));
        document.querySelectorAll('input:checked').forEach(input => {
            const card = input.closest('.fp-option-card');
            if (card) card.classList.add('selected');
            const label = input.closest('.fp-checkbox-label');
            if (label) label.classList.add('checked');
        });
        updateUI();
    }

    function determineNextStep(step) {
        const typeEl = document.querySelector('input[name="request_type"]:checked');
        const type = typeEl ? typeEl.value : '';
        if (typeof step === 'string') step = parseFloat(step);
        
        if (step === 1) return type === 'Ready-to-use Data' ? '2a' : '2b';
        if (step === '2a' || step === '2b' || step === 2) return 3;
        if (step === 3) return 4;
        if (step === 4) return 5;
        if (step === 5) {
            fpPopulateMetrics();
            return '5b';
        }
        if (step === '5b') return 6;
        if (step === 6) {
            const coverageEl = document.querySelector('input[name="coverage"]:checked');
            return (coverageEl?.value === 'Historical') ? 8 : 7;
        }
        if (step === 7) return 8;
        if (step === 8) return 9;
        if (step === 9) { populateSummary(); return 10; }
        if (step === 10) return 'submit';
        return step + 1;
    }

    function updateUI() {
        document.querySelectorAll('.fp-step').forEach(step => step.classList.remove('active'));
        document.querySelector(`.fp-step[data-step="${currentStep}"]`)?.classList.add('active');
        
        // Update step indicator
        const stepNum = typeof currentStep === 'number' ? currentStep : 
                       (currentStep === '2a' || currentStep === '2b') ? 2 : 
                       currentStep === '5b' ? 5 :
                       currentStep === 'success' ? 11 : parseInt(currentStep);
        document.getElementById('stepIndicator').textContent = currentStep === 'success' ? 'Complete!' : `Step ${stepNum} of 11`;

        // Progress (11 steps now)
        let progress = 9;
        if (currentStep === 1) progress = 9;
        else if (currentStep === '2a' || currentStep === '2b') progress = 18;
        else if (currentStep === 3) progress = 27;
        else if (currentStep === 4) progress = 36;
        else if (currentStep === 5) progress = 45;
        else if (currentStep === '5b') progress = 54;
        else if (currentStep === 6) progress = 63;
        else if (currentStep === 7) progress = 72;
        else if (currentStep === 8) progress = 81;
        else if (currentStep === 9) progress = 90;
        else if (currentStep === 10 || currentStep === 'success') progress = 100;
        document.getElementById('fpProgress').style.width = `${progress}%`;
    }

    function validateStep(step) {
        const currentEl = document.querySelector(`.fp-step[data-step="${step}"]`);
        let valid = true;
        currentEl.querySelectorAll('[required]').forEach(input => {
            if (!input.value) {
                valid = false;
                input.style.borderColor = '#ef4444';
                input.addEventListener('input', function() { this.style.borderColor = ''; }, {once: true});
            }
        });
        if (step === '2b' || step === 5) {
            if (currentEl.querySelectorAll('input[type="checkbox"]:checked').length === 0) {
                valid = false;
                alert('Please select at least one option.');
            }
        }
        // Check locations for step 4
        if (step === 4) {
            const selectedStates = document.getElementById('fpStateSelect').selectedOptions.length;
            const selectedDistricts = document.getElementById('fpDistrictSelect').selectedOptions.length;
            if (selectedStates === 0) {
                valid = false;
                alert('Please select at least one state.');
            } else if (selectedDistricts === 0) {
                valid = false;
                alert('Please select at least one district.');
            }
        }
        // Metrics step 5b is optional - no validation needed
        return valid;
    }

    function setupEventListeners() {
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll(`input[name="${this.name}"]`).forEach(input => {
                    input.closest('.fp-option-card')?.classList.remove('selected');
                });
                if (this.checked) this.closest('.fp-option-card')?.classList.add('selected');
            });
        });
        document.querySelectorAll('input[type="checkbox"]').forEach(box => {
            box.addEventListener('change', function() {
                const label = this.closest('.fp-checkbox-label');
                if (label) label.classList.toggle('checked', this.checked);
            });
        });
    }

    function populateSummary() {
        const formData = new FormData(document.getElementById('fpForm'));
        const fields = [
            { key: 'request_type', label: 'Request Type' },
            { key: 'location_method', label: 'Location Method' },
            { key: 'coverage', label: 'Coverage' },
            { key: 'format', label: 'Format' },
            { key: 'user_name', label: 'Name' },
            { key: 'user_email', label: 'Email' }
        ];
        const arrays = [
            { key: 'hazards[]', label: 'Hazards' },
            { key: 'variables[]', label: 'Variables' },
            { key: 'scenarios[]', label: 'Scenarios' }
        ];
        
        let html = '';
        fields.forEach(f => {
            const val = formData.get(f.key);
            if (val) html += `<div class="fp-review-item"><span class="fp-review-label">${f.label}</span><span class="fp-review-value">${val}</span></div>`;
        });

        // Add locations from multi-select
        const selectedStates = Array.from(document.getElementById('fpStateSelect').selectedOptions).map(o => o.value);
        const selectedDistricts = Array.from(document.getElementById('fpDistrictSelect').selectedOptions).map(o => o.textContent);
        if (selectedStates.length > 0) {
            html += `<div class="fp-review-item"><span class="fp-review-label">States (${selectedStates.length})</span><span class="fp-review-value">${selectedStates.join(', ')}</span></div>`;
        }
        if (selectedDistricts.length > 0) {
            html += `<div class="fp-review-item"><span class="fp-review-label">Districts (${selectedDistricts.length})</span><span class="fp-review-value">${selectedDistricts.join(', ')}</span></div>`;
        }

        arrays.forEach(a => {
            const vals = formData.getAll(a.key);
            if (vals.length) html += `<div class="fp-review-item"><span class="fp-review-label">${a.label}</span><span class="fp-review-value">${vals.join(', ')}</span></div>`;
        });

        // Add metrics
        const metricsKeys = Object.keys(fpSelectedMetrics);
        if (metricsKeys.length > 0) {
            let metricsStr = '';
            metricsKeys.forEach(variable => {
                if (fpSelectedMetrics[variable].length > 0) {
                    metricsStr += `<strong>${variable}:</strong> ${fpSelectedMetrics[variable].join(', ')}<br>`;
                }
            });
            if (metricsStr) {
                html += `<div class="fp-review-item"><span class="fp-review-label">Metrics</span><span class="fp-review-value">${metricsStr}</span></div>`;
            }
        }

        document.getElementById('fpReviewList').innerHTML = html;
    }

    function submitForm() {
        const btn = document.querySelector('.fp-step[data-step="10"] .fp-btn-next');
        btn.textContent = 'Processing...';
        btn.disabled = true;
        setTimeout(() => {
            document.getElementById('fpRequestId').textContent = 'CLM-' + Math.random().toString(36).substr(2,4).toUpperCase() + '-' + Math.random().toString(36).substr(2,4).toUpperCase();
            currentStep = 'success';
            updateUI();
        }, 1500);
    }
</script>

<?php include("footer.php"); ?>

</body>
</html>
