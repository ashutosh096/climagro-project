<?php
include("header.php");
include("navbar2.php");
?>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- ClimIntellio Form Styles -->
<style>
    /* Climagro Brand Variables & Modern UI Tokens */
    :root {
        --ms-primary: #025b5f;
        --ms-primary-dark: #014346;
        --ms-primary-light: rgba(2, 91, 95, 0.05);
        --ms-primary-fade: rgba(2, 91, 95, 0.1);
        --ms-accent: #f26a21;
        --ms-text-heading: #1e293b;
        --ms-text-body: #475569;
        --ms-bg-page: #f8fafc;
        --ms-bg-card: #ffffff;
        --ms-border: #e2e8f0;
        --ms-font-heading: 'Manrope', sans-serif;
        --ms-font-body: 'Outfit', sans-serif;
        --ms-shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --ms-shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --ms-shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --ms-radius: 16px;
    }

    /* Reset & Base */
    html { scroll-behavior: smooth; }
    body { font-family: var(--ms-font-body); background: var(--ms-bg-page); color: var(--ms-text-body); -webkit-font-smoothing: antialiased; }

    /* Full Page Layout */
    .form-page {
        display: grid;
        grid-template-columns: 450px 1fr;
        min-height: 100vh;
        background: #fff;
    }

    /* Left Panel - Branding */
    .form-sidebar {
        background: radial-gradient(circle at top right, #036c70, #025b5f);
        padding: 4rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: sticky;
        top: 0;
        height: 100vh;
        color: white;
        overflow: hidden;
    }

    .form-sidebar::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M1 1h2v2H1V1zm4 0h2v2H5V1zm4 0h2v2H9V1z'/%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.6;
        pointer-events: none;
    }

    .sidebar-content { position: relative; z-index: 2; }

    .sidebar-logo {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        padding: 0.75rem 1.5rem;
        border-radius: 100px;
        font-family: var(--ms-font-heading);
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        color: #fff;
        margin-bottom: 3rem;
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .sidebar-title {
        font-family: var(--ms-font-heading);
        font-size: 3rem;
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        color: #ffffff;
    }

    .sidebar-title .highlight {
        color: #5eead4;
        background: linear-gradient(135deg, #ccfbf1 0%, #2dd4bf 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .sidebar-desc {
        font-size: 1.1rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 3rem;
        max-width: 90%;
    }

    .sidebar-features { display: flex; flex-direction: column; gap: 1rem; }
    .sidebar-feature {
        display: flex; align-items: center; gap: 1rem;
        font-size: 1rem; color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }
    .sidebar-feature i {
        width: 28px; height: 28px;
        display: flex; align-items: center; justify-content: center;
        background: rgba(255,255,255,0.15);
        border-radius: 50%;
        color: #5eead4;
        font-size: 0.8rem;
    }

    /* Right Panel - Form */
    .form-main {
        padding: 4rem 6rem;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        max-width: 1000px;
        margin: 0 auto;
        width: 100%;
    }

    .form-header {
        display: flex; justify-content: space-between; align-items: flex-end;
        margin-bottom: 1rem; padding-bottom: 1rem;
    }

    #stepIndicator {
        font-family: var(--ms-font-heading);
        font-weight: 700;
        color: var(--ms-primary);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Premium Progress Bar */
    .fp-progress-bar {
        height: 6px;
        background: #f1f5f9;
        border-radius: 10px;
        margin-bottom: 3rem;
        overflow: hidden;
    }
    .fp-progress {
        height: 100%;
        background: linear-gradient(90deg, var(--ms-primary), #0d9488);
        border-radius: 10px;
        transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 0 10px rgba(13, 148, 136, 0.3);
    }

    /* Steps Animation */
    .fp-step { display: none; animation: slideUp 0.4s ease-out; }
    .fp-step.active { display: block; }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .fp-step-title {
        font-family: var(--ms-font-heading);
        font-size: 2.25rem;
        font-weight: 800;
        color: var(--ms-text-heading);
        margin-bottom: 0.75rem;
        letter-spacing: -0.5px;
    }
    .fp-step-subtitle {
        font-size: 1.1rem;
        color: var(--ms-text-body);
        margin-bottom: 2rem;
        line-height: 1.5;
    }

    /* Step Content Spacing */
    .fp-step-content {
        margin-bottom: 1.5rem;
    }

    /* Options Grid (Radio Cards) */
    .fp-grid-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .fp-option-card {
        position: relative;
        padding: 1.25rem;
        background: #fff;
        border: 2px solid var(--ms-border);
        border-radius: var(--ms-radius);
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: flex-start;
        gap: 0.875rem;
    }

    .fp-option-card:hover {
        border-color: #94a3b8;
        transform: translateY(-4px);
        box-shadow: var(--ms-shadow-md);
    }

    .fp-option-card.selected {
        border-color: var(--ms-primary);
        background: #f0fdfa; /* Extremely faint teal/mint */
        box-shadow: 0 0 0 1px var(--ms-primary), var(--ms-shadow-md);
    }

    .fp-option-radio {
        appearance: none;
        width: 22px; height: 22px;
        border: 2px solid #cbd5e1;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 2px;
        position: relative;
        transition: all 0.2s;
    }

    .fp-option-radio:checked {
        border-color: var(--ms-primary);
        background: var(--ms-primary);
        box-shadow: 0 0 0 2px #fff inset;
    }

    .fp-option-title {
        display: block;
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--ms-text-heading);
        margin-bottom: 0.5rem;
    }
    .fp-option-desc { font-size: 0.95rem; color: #64748b; line-height: 1.5; }

    /* Modern Inputs */
    .fp-input-group { margin-bottom: 1.25rem; }
    .fp-label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: #334155;
        margin-bottom: 0.5rem;
    }
    .fp-input, .fp-select, .fp-textarea {
        width: 100%;
        padding: 0.5rem 1rem;
        font-size: 0.95rem;
        background: #fff;
        border: 2px solid var(--ms-border);
        border-radius: 10px;
        color: var(--ms-text-heading) !important; /* Force dark text */
        transition: all 0.2s;
        font-family: inherit;
    }
    .fp-multi-select-wrapper {
    position: relative;
    width: 100%;
    display: block;
    }

    .fp-multi-select-dropdown {
    position: absolute;
    top: calc(100% + 6px);
    left: 0;
    width: 100%;
    max-height: 280px;
    overflow-y: auto;
    z-index: 9999;

    background: #fff;
    border: 1px solid var(--ms-border);
    border-radius: 12px;
    box-shadow: 0 10px 40px rgba(2, 91, 95, 0.25);
    display: none;
    }

    .fp-multi-select-wrapper.open .fp-multi-select-dropdown {
    display: block;
    }

    .fp-input:focus, .fp-select:focus, .fp-multi-select-trigger {
        outline: none;
        border-color: var(--ms-primary);
        box-shadow: 0 0 0 4px rgba(2, 91, 95, 0.1);
    }

    /* Checkboxes */
    .fp-checkbox-group {
        display: flex; flex-wrap: wrap; gap: 0.625rem;
    }
    .fp-checkbox-label {
        padding: 0.625rem 1rem;
        border: 2px solid var(--ms-border);
        border-radius: 50px;
        background: #fff;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--ms-text-body);
        cursor: pointer;
        transition: all 0.2s;
        display: flex; align-items: center; gap: 0.5rem;
    }
    .fp-checkbox-label:hover { border-color: #cbd5e1; background: #f8fafc; }
    .fp-checkbox-label.checked {
        border-color: var(--ms-primary);
        background: var(--ms-primary);
        color: #fff;
        box-shadow: 0 4px 12px rgba(2, 91, 95, 0.25);
    }
    .fp-checkbox-input { display: none; } /* Hide native checkbox inside chip */

    /* Footer Buttons */
    .fp-footer {
        margin-top: auto;
        padding-top: 2rem;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 0.875rem;
        border-top: 1px solid var(--ms-border);
    }
    
    .fp-btn {
        padding: 0.875rem 1.75rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
    }

    .fp-btn-reset {
        margin-right: auto; /* Push to left */
        background: transparent; color: #94a3b8;
    }
    .fp-btn-reset:hover { color: #ef4444; background: rgba(239, 68, 68, 0.05); }

    .fp-btn-prev { background: #fff; border: 2px solid var(--ms-border); color: #64748b; }
    .fp-btn-prev:hover { border-color: #94a3b8; color: #475569; transform: translateX(-2px); }

    .fp-btn-next {
        background: linear-gradient(135deg, var(--ms-primary), #036c70);
        color: #fff;
        box-shadow: 0 4px 15px rgba(2, 91, 95, 0.3);
        padding: 1rem 2.5rem;
    }
    .fp-btn-next:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(2, 91, 95, 0.4);
    }

    /* Custom Scrollbar */
    .form-main::-webkit-scrollbar { width: 8px; }
    .form-main::-webkit-scrollbar-track { background: transparent; }
    .form-main::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .form-main::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

    /* Responsive */
    @media (max-width: 1100px) {
        .form-page { grid-template-columns: 350px 1fr; }
        .form-main { padding: 2.5rem 3rem; }
        .form-sidebar { padding: 2.5rem; }
        .sidebar-title { font-size: 2.5rem; }
    }
    @media (max-width: 900px) {
        .form-page { display: block; }
        .form-sidebar {
            height: auto;
            position: relative; /* Disable sticky on mobile */
            padding: 2.5rem 1.5rem;
            text-align: center;
        }
        .sidebar-logo { margin: 0 auto 1.5rem; }
        .sidebar-title { font-size: 2rem; }
        .sidebar-desc { font-size: 1rem; margin-bottom: 1.5rem; }
        .sidebar-features { display: none; } /* Consider showing if critical, but keeping hidden for focus */
        
        .form-main { 
            padding: 1.5rem 1.25rem; 
            max-width: 100%; 
            min-height: auto; 
            overflow: visible; /* Let natural scroll happen */
        }

        .fp-step-title { font-size: 1.75rem; }
        .fp-step-subtitle { font-size: 1rem; margin-bottom: 1.5rem; }
        
        .fp-footer { flex-direction: column-reverse; gap: 0.75rem; padding-top: 1.5rem; }
        .fp-btn { width: 100%; justify-content: center; text-align: center; }
        .fp-btn-reset { margin-right: 0; }
        
        .fp-grid-options { grid-template-columns: 1fr; gap: 0.75rem; }
        .fp-option-card { padding: 1rem; }
        
        .fp-checkbox-group { gap: 0.5rem; }
        .fp-checkbox-label { padding: 0.5rem 0.875rem; font-size: 0.85rem; }
        
        .fp-input-group { margin-bottom: 1rem; }
        /* Prevent iOS zoom by ensuring 16px font size */
        .fp-input, .fp-select, .fp-textarea, .fp-multi-select-trigger { 
            padding: 0.75rem 0.875rem; 
            font-size: 1rem; 
        }
        
        .fp-progress-bar { margin-bottom: 2rem; }
        
        /* Adjust dropdown max-height for mobile screens */
        .fp-multi-select-dropdown { max-height: 40vh; }
    }
    @media (max-width: 480px) {
        .form-sidebar { padding: 2rem 1rem; }
        .sidebar-title { font-size: 1.75rem; }
        .sidebar-desc { font-size: 0.9rem; }
        .form-main { padding: 1.25rem 1rem; }
        .fp-step-title { font-size: 1.5rem; }
        .fp-step-subtitle { font-size: 0.9rem; }
        .fp-btn { padding: /*0.75rem 1.25rem*/ 0.875rem 1.25rem; font-size: 0.95rem; } /* Keep button clickable */
        .fp-option-card { padding: 0.875rem; gap: 0.625rem; }
        .fp-option-title { font-size: 1rem; }
        .fp-option-desc { font-size: 0.85rem; }
        .fp-multi-select-trigger { padding: 0.75rem; font-size: 1rem; } /* Ensure 16px */
        .fp-multi-option { padding: 0.625rem 0.875rem; font-size: 0.9rem; }
    }

    /* Selected Tags Styling (Mobile Friendly) */
    .fp-selected-tags {
        display: flex; flex-wrap: wrap; gap: 0.5rem; margin-top: 0.75rem;
    }
    .fp-selected-tag {
        background: #f1f5f9; 
        padding: 0.25rem 0.75rem; 
        border-radius: 4px; 
        font-size: 0.85rem; 
        color: var(--ms-text-body); 
        border: 1px solid var(--ms-border);
    }

    /* Helper: Metric Chips & Review Items */
    .fp-metric-chip {
        padding: 0.6rem 1rem; border-radius: 50px; background: #fff; border: 2px solid var(--ms-border);
        font-weight: 500; font-size: 0.9rem; transition: all 0.2s; cursor: pointer; color: var(--ms-text-body);
        display: inline-flex; align-items: center; gap: 0.5rem;
    }
    .fp-metric-chip:hover { border-color: #cbd5e1; }
    .fp-metric-chip.selected {
        background: #f0fdfa; border-color: var(--ms-primary); color: var(--ms-primary); font-weight: 600;
    }

    .fp-review-item {
        background: #fff; border: 1px solid var(--ms-border); padding: 1.25rem; border-radius: 12px;
        display: flex; justify-content: space-between; align-items: flex-start;
        margin-bottom: 0.75rem; transition: transform 0.2s;
    }
    .fp-review-item:hover { transform: translateX(4px); border-color: #cbd5e1; }
    .fp-review-label { font-size: 0.9rem; color: #64748b; }
    .fp-review-value { font-weight: 600; color: var(--ms-text-heading); text-align: right; max-width: 65%; }

    /* Custom Select Tweaks */
    .fp-multi-select-trigger {
        background: #fff; border: 2px solid var(--ms-border); border-radius: 12px;
        padding: 0.9rem 1.25rem; font-size: 1rem; color: var(--ms-text-heading);
        cursor: pointer; position: relative; display: flex; justify-content: space-between; align-items: center;
    }
    .fp-multi-select-trigger:after {
        content: '\f107'; font-family: "Font Awesome 5 Free"; font-weight: 900; color: #94a3b8;
    }

    /* Dropdown anchored to wrapper */
        .fp-multi-select-dropdown {
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        width: 100%;
        max-height: 300px;
        overflow-y: auto;
        z-index: 9999;

        background: #fff;
        border: 1px solid var(--ms-border);
        border-radius: 12px;
        padding: 0.5rem;
        box-shadow: 0 10px 40px rgba(2, 91, 95, 0.25);

        display: none;
        }

        /* SINGLE source of truth for visibility */
        .fp-multi-select-wrapper.open .fp-multi-select-dropdown {
        display: block;
        }


    .fp-multi-option { border-radius: 8px; padding: 0.75rem 1rem; margin-bottom: 2px; cursor: pointer; display: flex; align-items: center; gap: 0.8rem; }
    .fp-multi-option:hover { background: #f1f5f9; }
    .fp-multi-option.selected { background: #f0fdfa; color: var(--ms-primary); font-weight: 600; }
    .fp-multi-option input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--ms-primary); }

    /* Force Hide Native Multi-Selects */
    select.fp-multi-select, select.fp-select[multiple] {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        position: absolute !important;
        z-index: -9999 !important;
        width: 0 !important;
        height: 0 !important;
        overflow: hidden !important;
    }
    .fp-select.hidden-force { display: none !important; }

</style>

<main class="form-page">

    <!-- Left Sidebar -->
    <aside class="form-sidebar">
        <div class="sidebar-content">
            <div class="sidebar-logo">
                <i class="fas fa-layer-group" style="color:#5eead4;"></i> ClimIntellio
            </div>
            
            <h1 class="sidebar-title">
                Climate Intelligence <br>
                <span class="highlight">Simplified.</span>
            </h1>
            
            <p class="sidebar-desc">
                Access harmonized, high-resolution climate hazard data for 500+ districts. 
                Built for insurance, banking, and ESG analytics.
            </p>
            
            <div class="sidebar-features">
                <div class="sidebar-feature">
                    <i class="fas fa-database"></i>
                    <span>Harmonized Multi-Source Data</span>
                </div>
                <div class="sidebar-feature">
                    <i class="fas fa-chart-line"></i>
                    <span>Projections up to 2100 (SSPs)</span>
                </div>
                <div class="sidebar-feature">
                    <i class="fas fa-bolt"></i>
                    <span>Analysis-Ready Hazard Indices</span>
                </div>
                <div class="sidebar-feature">
                    <i class="fas fa-download"></i>
                    <span>Instant API & Download Access</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Right Form Area -->
    <div class="form-main">
        
        <form id="fpForm" class="fp-form" onsubmit="return false;">
            
            <div class="form-header">
                <div></div> <!-- Spacer -->
                <div id="stepIndicator">Step 1 of 9</div>
            </div>

            <!-- Progress Bar -->
            <div class="fp-progress-bar">
                <div class="fp-progress" id="fpProgress" style="width: 10%;"></div>
            </div>

            <!-- Step 1: Request Type -->
            <div class="fp-step active" data-step="1">
                <h2 class="fp-step-title">Select Request Type</h2>
                <p class="fp-step-subtitle">What kind of data access do you need?</p>
                
                <div class="fp-grid-options">
                    <label class="fp-option-card">
                        <input type="radio" name="request_type" value="Ready-to-use Data" class="fp-option-radio" checked>
                        <div class="fp-option-content">
                            <span class="fp-option-title">Ready-to-use Data</span>
                            <span class="fp-option-desc">Download pre-processed CSV/Excel files for specific locations.</span>
                        </div>
                    </label>
                    
                    <label class="fp-option-card">
                        <input type="radio" name="request_type" value="API Access" class="fp-option-radio">
                        <div class="fp-option-content">
                            <span class="fp-option-title">Hazard Maps</span>
                            <span class="fp-option-desc">Drought, flood, heat & extreme events</span>
                        </div>
                    </label>
                </div>

                <div class="fp-footer">
                    <!-- No Reset on Step 1 -->
                    <div style="margin-left: auto;">
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
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
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
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
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
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
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
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
                        <label class="fp-label">States</label>
                        <select id="fpStateSelect" name="states[]" class="fp-select fp-multi-select" multiple size="6">
                            <!-- Populated by JS -->
                        </select>
                        <small style="color: #64748b; font-size: 0.8rem;">Hold Ctrl/Cmd to select multiple states</small>
                    </div>
                    
                    <div class="fp-input-group">
                        <label class="fp-label">Districts</label>
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
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
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
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
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
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
                    </div>
                </div>
            </div>

            <!-- Step 6: Temporal Coverage & Scenarios -->
            <div class="fp-step" data-step="6">
                <h2 class="fp-step-title">Coverage & Scenarios</h2>
                <p class="fp-step-subtitle">Select time horizons and climate scenarios.</p>
                
                <div class="fp-step-content">
                    <div class="fp-input-group">
                        <label class="fp-label">Coverage Type *</label>
                        <div class="fp-grid-options">
                            <label class="fp-option-card">
                                <input type="radio" name="coverage" value="Historical" class="fp-option-radio" onchange="toggleCoverageFields()">
                                <div class="fp-option-content">
                                    <span class="fp-option-title">Historical</span>
                                </div>
                            </label>
                            <label class="fp-option-card">
                                <input type="radio" name="coverage" value="Future Projections" class="fp-option-radio" onchange="toggleCoverageFields()">
                                <div class="fp-option-content">
                                    <span class="fp-option-title">Future Projections</span>
                                </div>
                            </label>
                            <label class="fp-option-card">
                                <input type="radio" name="coverage" value="Both" class="fp-option-radio" checked onchange="toggleCoverageFields()">
                                <div class="fp-option-content">
                                    <span class="fp-option-title">Both</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Historical Data Section -->
                    <div id="fpHistoricalSection" style="margin-top: 1.5rem; padding: 1.5rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                        <h4 style="font-size: 1rem; font-weight: 600; color: var(--ms-text-heading); margin-bottom: 1rem;">Historical Data</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <div class="fp-input-group" style="margin-bottom: 0;">
                                <label class="fp-label">From Year</label>
                                <input type="number" name="hist_year_start" value="1901" min="1901" max="2026" class="fp-input">
                            </div>
                            <div class="fp-input-group" style="margin-bottom: 0;">
                                <label class="fp-label">To Year</label>
                                <input type="number" name="hist_year_end" value="2026" min="1901" max="2026" class="fp-input">
                            </div>
                        </div>
                    </div>

                    <!-- Future Projections Section -->
                    <div id="fpFutureSection" style="margin-top: 1.5rem; padding: 1.5rem; background: #f8fafc; border-radius: 12px; border: 1px solid #e2e8f0;">
                        <h4 style="font-size: 1rem; font-weight: 600; color: var(--ms-text-heading); margin-bottom: 1rem;">Future Projections</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                            <div class="fp-input-group" style="margin-bottom: 0;">
                                <label class="fp-label">From Year</label>
                                <input type="number" name="future_year_start" value="2027" min="2027" max="2100" class="fp-input">
                            </div>
                            <div class="fp-input-group" style="margin-bottom: 0;">
                                <label class="fp-label">To Year (up to 2100)</label>
                                <input type="number" name="future_year_end" value="2100" min="2027" max="2100" class="fp-input">
                            </div>
                        </div>
                        
                        <div class="fp-input-group" style="margin-bottom: 0;">
                            <label class="fp-label">Scenario * <i class="fas fa-question-circle" title="Shared Socioeconomic Pathways" style="color:#94a3b8; cursor:help;"></i></label>
                            <select id="fpScenarioSelect" name="scenarios[]" class="fp-select" multiple>
                                <option value="SSP1-2.6">SSP1-2.6 (Sustainability)</option>
                                <option value="SSP2-4.5" selected>SSP2-4.5 (Middle of Road)</option>
                                <option value="SSP3-7.0">SSP3-7.0 (Regional Rivalry)</option>
                                <option value="SSP5-8.5">SSP5-8.5 (Fossil-fueled)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
                    </div>
                </div>
            </div>

            <!-- Step 7: Format (Renumbered from 8) -->
            <div class="fp-step" data-step="7">
                <h2 class="fp-step-title">Data Format</h2>
                <p class="fp-step-subtitle">How would you like to receive the data?</p>
                
                <div class="fp-step-content">
                    <div class="fp-input-group">
                        <label class="fp-label">File Format(s)</label>
                        <select id="fpFormatSelect" name="format[]" class="fp-select fp-multi-select" multiple>
                            <option value="CSV">CSV (Spreadsheet)</option>
                            <option value="NetCDF">NetCDF (Scientific)</option>
                            <option value="GeoJSON">GeoJSON / Shapefile</option>
                            <option value="ASCII">ASCII Grid</option>
                        </select>
                    </div>
                    <div class="fp-checkbox-group" style="margin-top: 1.25rem;">
                        <label class="fp-checkbox-label checked"><input type="checkbox" name="extras[]" value="Metadata" class="fp-checkbox-input" checked> Include Metadata</label>
                        <label class="fp-checkbox-label"><input type="checkbox" name="extras[]" value="Summary Tables" class="fp-checkbox-input"> Include Summary Tables</label>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 0.875rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next</button>
                    </div>
                </div>
            </div>

            <!-- Step 8: Contact Details (Renumbered from 9) -->
            <div class="fp-step" data-step="8">
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
                    <div class="fp-input-group">
                        <label class="fp-label">Message (Optional)</label>
                        <textarea name="user_message" class="fp-textarea" rows="3" placeholder="Tell us more about your requirements..."></textarea>
                    </div>
                </div>

                <div class="fp-footer">
                    <button type="button" class="fp-btn fp-btn-reset" onclick="fpResetForm()">Reset</button>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <button type="button" class="fp-btn fp-btn-prev" onclick="fpPrevStep()">Back</button>
                        <button type="button" class="fp-btn fp-btn-next" onclick="fpNextStep()">Next &rarr;</button>
                    </div>
                </div>
            </div>

            <!-- Step 9: Summary (Renumbered from 10) -->
            <div class="fp-step" data-step="9">
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
                            &larr; Back to ClimIntellio
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
    // Script Loaded
    
    let currentStep = 1;
    const stepHistory = [];

    document.addEventListener('DOMContentLoaded', () => {
        initLocations();
        // Initialize scenario multi-select
        setupCustomMultiSelect('fpScenarioSelect', 'Select Scenarios');
        // Initialize format multi-select
        setupCustomMultiSelect('fpFormatSelect', 'Select Format(s)');
        updateUI();
        setupEventListeners();
        toggleCoverageFields(); // Initialize visibility
    });

    function initLocations() {
        const stateSelect = document.getElementById('fpStateSelect');
        const districtSelect = document.getElementById('fpDistrictSelect');
        
        if(typeof indiaLocations !== 'undefined') {
            // Add "All States" option
            const allStatesOption = document.createElement('option');
            allStatesOption.value = 'All States';
            allStatesOption.textContent = 'All States';
            stateSelect.appendChild(allStatesOption);

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

    // Custom Multi-Select Logic (Detached & Fixed)
   function setupCustomMultiSelect(selectId, placeholder) {
    const select = document.getElementById(selectId);
    if (!select) return;

    // Hide native select
    select.classList.add('hidden-force');
    select.style.display = 'none';

    // Remove old wrapper if exists
    const oldWrapper = document.getElementById(selectId + '_wrapper');
    if (oldWrapper) oldWrapper.remove();

    // Create wrapper
    const wrapper = document.createElement('div');
    wrapper.className = 'fp-multi-select-wrapper';
    wrapper.id = selectId + '_wrapper';

    // Trigger
    const trigger = document.createElement('div');
    trigger.className = 'fp-multi-select-trigger';
    trigger.innerHTML = `<span>${placeholder}</span>`;

    // Dropdown
    const dropdown = document.createElement('div');
    dropdown.className = 'fp-multi-select-dropdown';

    // Tags area
    const tagsArea = document.createElement('div');
    tagsArea.className = 'fp-selected-tags';

    // Assemble
    wrapper.appendChild(trigger);
    wrapper.appendChild(dropdown);

    select.parentNode.insertBefore(wrapper, select.nextSibling);
    select.parentNode.insertBefore(tagsArea, wrapper.nextSibling);

    // Store refs
    wrapper._dropdown = dropdown;
    wrapper._select = select;
    wrapper._tagsArea = tagsArea;

    // Toggle dropdown
    trigger.addEventListener('click', (e) => {
        e.stopPropagation();

        // Close other dropdowns
        document.querySelectorAll('.fp-multi-select-wrapper').forEach(w => {
            if (w !== wrapper) w.classList.remove('open');
        });

        wrapper.classList.toggle('open');
    });

    // Close on outside click
    document.addEventListener('click', () => {
        wrapper.classList.remove('open');
    });

    // Populate options
    refreshCustomMultiSelect(selectId);
}

    function refreshCustomMultiSelect(selectId) {
        const select = document.getElementById(selectId);
        const wrapper = document.getElementById(selectId + '_wrapper');
        if(!wrapper) return;
        
        const dropdown = wrapper._dropdown; // Access detached dropdown
        if(!dropdown) return;
        
        const triggerSpan = wrapper.querySelector('.fp-multi-select-trigger span');
        const tagsArea = wrapper.nextElementSibling;

        dropdown.innerHTML = '';
        tagsArea.innerHTML = '';
        
        let selectedCount = 0;
        
        Array.from(select.options).forEach(opt => {
            if (opt.value === '') return;

            const optionDiv = document.createElement('div');
            optionDiv.className = `fp-multi-option ${opt.selected ? 'selected' : ''}`;
            
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = opt.selected;
            
            const label = document.createTextNode(opt.textContent);
            
            optionDiv.appendChild(checkbox);
            optionDiv.appendChild(label);
            
            // Toggle Handler
            const toggle = (e) => {
                e.stopPropagation();
                opt.selected = !opt.selected;
                checkbox.checked = opt.selected;
                optionDiv.classList.toggle('selected', opt.selected);
                
                // Trigger Change
                select.dispatchEvent(new Event('change'));
                updateSelectedDisplay(select, triggerSpan, tagsArea);
            };
            
            optionDiv.onclick = toggle;
            checkbox.onclick = (e) => { 
                e.stopPropagation(); 
                // Checkbox click logic needs to sync with optionDiv
                // Already handled by parent click if we don't stopProp, but we need separate logic if stopped
                opt.selected = checkbox.checked;
                optionDiv.classList.toggle('selected', opt.selected);
                select.dispatchEvent(new Event('change'));
                updateSelectedDisplay(select, triggerSpan, tagsArea);
            };

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
        'T-Max': ['Mean Max Temp', 'Hot Days (>35Â°C)', 'Heat Wave Days', 'Trend', 'Anomaly'],
        'T-Min': ['Mean Min Temp', 'Cold Days (<10Â°C)', 'Frost Days', 'Trend', 'Anomaly'],
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
                    <button type="button" class="fp-chip-remove" onclick="fpRemoveLocation(${idx})">Ã—</button>
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

    function toggleCoverageFields() {
        const coverageGroup = document.querySelector('input[name="coverage"]:checked');
        const coverage = coverageGroup ? coverageGroup.value : 'Both';
        
        const histSection = document.getElementById('fpHistoricalSection');
        const futureSection = document.getElementById('fpFutureSection');
        
        if (!histSection || !futureSection) return;

        if (coverage === 'Historical') {
            histSection.style.display = 'block';
            futureSection.style.display = 'none';
        } else if (coverage === 'Future Projections') {
            histSection.style.display = 'none';
            futureSection.style.display = 'block';
        } else {
            histSection.style.display = 'block';
            futureSection.style.display = 'block';
        }
    }

    function determineNextStep(step) {
        const typeEl = document.querySelector('input[name="request_type"]:checked');
        const type = typeEl ? typeEl.value : '';
        
        // Don't convert string steps like '2a', '2b', '5b' to numbers
        if (typeof step === 'string' && /^\d+$/.test(step)) {
            step = parseInt(step);
        }
        
        if (step === 1) return type === 'Ready-to-use Data' ? '2a' : '2b';
        if (step === '2a' || step === '2b' || step === 2) return 3;
        if (step === 3) return 4;
        if (step === 4) return 5;
        if (step === 5) {
            fpPopulateMetrics();
            return '5b';
        }
        if (step === '5b') return 6;
        if (step === 6) return 7; // Coverage -> Format
        if (step === 7) return 8; // Format -> Details
        if (step === 8) { populateSummary(); return 9; } // Details -> Summary
        if (step === 9) return 'submit';
        
        return step + 1;
    }

    function updateUI() {
        document.querySelectorAll('.fp-step').forEach(step => step.classList.remove('active'));
        document.querySelector(`.fp-step[data-step="${currentStep}"]`)?.classList.add('active');
        
        // Update step indicator
        let stepNum = currentStep;
        if (currentStep === '2a' || currentStep === '2b') stepNum = 2;
        else if (currentStep === '5b') stepNum = 5;
        else if (currentStep === 'success') stepNum = 10;
        else stepNum = parseInt(currentStep);
        
        document.getElementById('stepIndicator').textContent = currentStep === 'success' ? 'Complete!' : `Step ${stepNum} of 9`;

        // Progress
        let progress = 0;
        if (currentStep === 1) progress = 10;
        else if (currentStep === '2a' || currentStep === '2b') progress = 20;
        else if (currentStep === 3) progress = 30;
        else if (currentStep === 4) progress = 40;
        else if (currentStep === 5) progress = 50;
        else if (currentStep === '5b') progress = 60;
        else if (currentStep === 6) progress = 70; // Coverage
        else if (currentStep === 7) progress = 80; // Format
        else if (currentStep === 8) progress = 90; // Details
        else if (currentStep === 9 || currentStep === 'success') progress = 100; // Summary
        
        document.getElementById('fpProgress').style.width = `${progress}%`;
    }

    function validateStep(step) {
        const currentEl = document.querySelector(`.fp-step[data-step="${step}"]`);
        let valid = true;
        
        if (!currentEl) return true;

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
                // Highlight the group
                const group = currentEl.querySelector('.fp-checkbox-group') || currentEl.querySelector('.fp-step-content');
                if(group) {
                    group.style.border = '1px solid #ef4444';
                    group.style.borderRadius = '8px';
                    group.style.padding = '10px';
                    setTimeout(() => { group.style.border = ''; group.style.padding = ''; }, 3000);
                }
            }
        }
        
        if (step === 4) {
            // Location selection is now optional
            const stateWrapper = document.getElementById('fpStateSelect_wrapper');
            const districtWrapper = document.getElementById('fpDistrictSelect_wrapper');
            
            // Clear any previous error styles just in case
            if(stateWrapper) stateWrapper.style.border = '';
            if(districtWrapper) districtWrapper.style.border = '';
        }

        // Validate Coverage Step 6
        if (step === 6) {
            const coverage = document.querySelector('input[name="coverage"]:checked')?.value;
            
            if (coverage === 'Historical' || coverage === 'Both') {
                const start = document.querySelector('input[name="hist_year_start"]');
                const end = document.querySelector('input[name="hist_year_end"]');
                if (!start.value || !end.value) { 
                    valid = false; 
                    if(!start.value) start.style.borderColor = '#ef4444';
                    if(!end.value) end.style.borderColor = '#ef4444';
                }
                else if (parseInt(start.value) > parseInt(end.value)) { 
                    valid = false; 
                    start.style.borderColor = '#ef4444';
                    end.style.borderColor = '#ef4444';
                }
            }
            
            if (coverage === 'Future Projections' || coverage === 'Both') {
                const start = document.querySelector('input[name="future_year_start"]');
                const end = document.querySelector('input[name="future_year_end"]');
                if (!start.value || !end.value) { 
                    valid = false; 
                     if(!start.value) start.style.borderColor = '#ef4444';
                    if(!end.value) end.style.borderColor = '#ef4444';
                }
                else if (parseInt(start.value) > parseInt(end.value)) { 
                    valid = false; 
                    start.style.borderColor = '#ef4444';
                    end.style.borderColor = '#ef4444';
                }
                
                // Validate Scenarios
                const selectedScenarios = document.getElementById('fpScenarioSelect').selectedOptions.length;
                if (selectedScenarios === 0) {
                    valid = false;
                     const scenarioWrapper = document.getElementById('fpScenarioSelect_wrapper');
                     if(scenarioWrapper) scenarioWrapper.style.border = '1px solid #ef4444';
                } else {
                     const scenarioWrapper = document.getElementById('fpScenarioSelect_wrapper');
                     if(scenarioWrapper) scenarioWrapper.style.border = '';
                }
            }
        }

        return valid;
    }

    function setupEventListeners() {
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Handle Styling
                document.querySelectorAll(`input[name="${this.name}"]`).forEach(input => {
                    input.closest('.fp-option-card')?.classList.remove('selected');
                });
                if (this.checked) this.closest('.fp-option-card')?.classList.add('selected');
                
                // Handle Logic
                if (this.name === 'coverage') {
                    toggleCoverageFields();
                }
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
            { key: 'user_email', label: 'Email' },
            { key: 'user_message', label: 'Message' }
        ];
        
        let html = '';
        fields.forEach(f => {
            const val = formData.get(f.key);
            if (val) html += `<div class="fp-review-item"><span class="fp-review-label">${f.label}</span><span class="fp-review-value">${val}</span></div>`;
        });

        // Date Ranges
        const coverage = formData.get('coverage');
        if (coverage === 'Historical' || coverage === 'Both') {
            const hStart = formData.get('hist_year_start');
            const hEnd = formData.get('hist_year_end');
            html += `<div class="fp-review-item"><span class="fp-review-label">Historical Data</span><span class="fp-review-value">${hStart} - ${hEnd}</span></div>`;
        }
        if (coverage === 'Future Projections' || coverage === 'Both') {
            const fStart = formData.get('future_year_start');
            const fEnd = formData.get('future_year_end');
            html += `<div class="fp-review-item"><span class="fp-review-label">Future Projections</span><span class="fp-review-value">${fStart} - ${fEnd}</span></div>`;
            
            // Scenarios
            const scenarios = formData.getAll('scenarios[]');
            if (scenarios.length) {
                html += `<div class="fp-review-item"><span class="fp-review-label">Scenarios</span><span class="fp-review-value">${scenarios.join(', ')}</span></div>`;
            }
        }

        // Locations
        const selectedStates = Array.from(document.getElementById('fpStateSelect').selectedOptions).map(o => o.value);
        const selectedDistricts = Array.from(document.getElementById('fpDistrictSelect').selectedOptions).map(o => o.textContent);
        if (selectedStates.length > 0) {
            html += `<div class="fp-review-item"><span class="fp-review-label">States (${selectedStates.length})</span><span class="fp-review-value">${selectedStates.join(', ')}</span></div>`;
        }
        if (selectedDistricts.length > 0) {
            html += `<div class="fp-review-item"><span class="fp-review-label">Districts (${selectedDistricts.length})</span><span class="fp-review-value">${selectedDistricts.join(', ')}</span></div>`;
        }

        // Other Arrays
        ['hazards[]', 'variables[]'].forEach(key => {
            const label = key.replace('[]', '').split('_').map(s => s.charAt(0).toUpperCase() + s.slice(1)).join(' ');
            const vals = formData.getAll(key);
            if (vals.length) html += `<div class="fp-review-item"><span class="fp-review-label">${label}</span><span class="fp-review-value">${vals.join(', ')}</span></div>`;
        });

        // Metrics
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
        const btn = document.querySelector('.fp-step.active .fp-btn-next'); // Use .active to be safe or target step 10/8 dynamically
        const originalText = btn ? btn.textContent : 'Submit';
        if(btn) {
             btn.textContent = 'Submitting...';
             btn.disabled = true;
        }

        const form = document.getElementById('fpForm');
        const formData = new FormData(form);

        fetch('<?php echo base_url("welcome/submit_climintellio"); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Determine ID from response or generate one
                // document.getElementById('fpRequestId').textContent = 'CLM-' + Math.random().toString(36).substr(2,4).toUpperCase();
                 alert("Thank you! " + data.message);
                 window.location.reload();
            } else {
                alert("Error: " + data.message);
                if(btn) {
                    btn.textContent = originalText;
                    btn.disabled = false;
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("An unexpected error occurred.");
            if(btn) {
                btn.textContent = originalText;
                btn.disabled = false;
            }
        });
    }
</script>

<?php include("footer.php"); ?>


