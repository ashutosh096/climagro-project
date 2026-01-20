<?php
/**
 * Multi-Step Data Request Form Component
 * 
 * Implements a complex multi-step wizard for data access and hazard maps
 * Matches the Climagro website design (Teal/White/Outfit)
 */
?>
<style>
    /* Climagro Brand Variables (fallback if not defined globally) */
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

    /* Modal Overlay */
    .ms-modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(2, 59, 63, 0.4); /* Teal tinted backdrop */
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        transition: opacity 0.3s ease;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    .ms-modal-overlay.active {
        display: flex;
        opacity: 1;
    }
    
    /* Prevent body scroll when modal is open */
    body.modal-open {
        overflow: hidden;
        position: fixed;
        width: 100%;
    }

    /* Modal Container */
    .ms-modal {
        background: white;
        width: 100%;
        max-width: 650px;
        border-radius: 24px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(2, 91, 95, 0.15);
        border: 1px solid rgba(2, 91, 95, 0.05);
        display: flex;
        flex-direction: column;
        max-height: 90vh;
        max-height: 90dvh; /* Dynamic viewport height for mobile */
        transform: translateY(20px);
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-family: var(--ms-font-body);
        margin: auto;
    }

    .ms-modal-overlay.active .ms-modal {
        transform: translateY(0);
    }

    /* Header */
    .ms-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }

    .ms-title {
        color: var(--ms-text-heading);
        font-family: var(--ms-font-heading);
        font-size: 1.35rem;
        font-weight: 700;
        margin: 0;
    }

    .ms-close {
        background: var(--ms-bg-input);
        border: none;
        color: #6b7280;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .ms-close:hover {
        background: #e5e7eb;
        color: var(--ms-text-heading);
        transform: rotate(90deg);
    }

    /* Progress Bar */
    .ms-progress-container {
        padding: 0;
        height: 4px;
        background: #e5e7eb;
        width: 100%;
    }

    .ms-progress-bar {
        height: 100%;
        background: transparent;
        width: 100%;
        position: relative;
    }

    .ms-progress-fill {
        height: 100%;
        background: var(--ms-primary);
        width: 0%;
        transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Body/Steps */
    .ms-body {
        padding: 2rem 2rem;
        overflow-y: auto;
        overflow-x: hidden;
        flex: 1;
        min-height: 0; /* Important for flex scroll */
        -webkit-overflow-scrolling: touch;
        /* Custom Scrollbar */
        scrollbar-width: thin;
        scrollbar-color: #cbd5e1 #f1f5f9;
    }

    .ms-body::-webkit-scrollbar {
        width: 8px;
    }

    .ms-body::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 4px;
    }

    .ms-body::-webkit-scrollbar-thumb {
        background-color: #cbd5e1;
        border-radius: 4px;
        border: 2px solid #f1f5f9;
    }
    
    .ms-body::-webkit-scrollbar-thumb:hover {
        background-color: #94a3b8;
    }

    .ms-step {
        display: none;
        animation: fadeIn 0.4s ease;
    }

    .ms-step.active {
        display: block;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .ms-step-title {
        color: var(--ms-text-heading);
        font-family: var(--ms-font-heading);
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        line-height: 1.2;
    }

    .ms-step-subtitle {
        color: #64748b;
        font-size: 1rem;
        margin-bottom: 2.5rem;
        line-height: 1.6;
    }

    /* Form Elements */
    .ms-grid-options {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    @media (min-width: 640px) {
        .ms-grid-options.cols-2 {
            grid-template-columns: 1fr 1fr;
        }
    }

    .ms-option-card {
        background: #fff;
        border: 2px solid var(--ms-border);
        border-radius: 12px;
        padding: 1.5rem;
        cursor: pointer;
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        position: relative;
    }

    .ms-option-card:hover {
        border-color: #cbd5e1;
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }

    .ms-option-card.selected {
        background: var(--ms-primary-light);
        border-color: var(--ms-primary);
    }

    .ms-option-radio {
        appearance: none;
        width: 22px;
        height: 22px;
        border: 2px solid #94a3b8;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 2px;
        position: relative;
        transition: all 0.2s;
    }

    .ms-option-card.selected .ms-option-radio {
        border-color: var(--ms-primary);
        background: #fff;
    }

    .ms-option-card.selected .ms-option-radio::after {
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

    .ms-option-content {
        flex: 1;
    }

    .ms-option-title {
        color: var(--ms-text-heading);
        font-family: var(--ms-font-heading);
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.25rem;
        display: block;
    }

    .ms-option-desc {
        color: #64748b;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    /* Input Fields */
    .ms-input-group {
        margin-bottom: 1.5rem;
    }

    .ms-label {
        display: block;
        color: var(--ms-text-heading);
        font-size: 0.95rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-family: var(--ms-font-heading);
    }

    .ms-input, .ms-select {
        width: 100%;
        background: var(--ms-bg-input);
        border: 1px solid transparent;
        color: var(--ms-text-heading);
        padding: 1rem 1.25rem;
        border-radius: 8px;
        font-size: 1rem;
        font-family: var(--ms-font-body);
        transition: all 0.2s;
        height: auto;
    }

    .ms-input:focus, .ms-select:focus {
        outline: none;
        background: #fff;
        border-color: var(--ms-primary);
        box-shadow: 0 0 0 4px var(--ms-primary-light);
    }
    
    .ms-select option {
        background: #fff;
        color: var(--ms-text-heading);
    }

    /* Checkboxes */
    .ms-checkbox-group {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        gap: 0.75rem;
    }

    .ms-checkbox-label {
        background: #fff;
        border: 2px solid var(--ms-border);
        padding: 0.875rem 1rem;
        border-radius: 10px;
        cursor: pointer;
        color: #64748b;
        font-size: 0.95rem;
        transition: all 0.2s;
        text-align: center;
        user-select: none;
        font-weight: 500;
    }

    .ms-checkbox-label:hover {
        border-color: #cbd5e1;
    }

    .ms-checkbox-label.checked {
        background: var(--ms-primary-light);
        border-color: var(--ms-primary);
        color: var(--ms-primary);
        font-weight: 700;
    }

    .ms-checkbox-input {
        display: none;
    }
    
    /* Range Sliders styling */
    .ms-range-container {
        padding: 0 0.5rem;
    }
    
    .ms-range-values {
        display: flex;
        justify-content: space-between;
        color: var(--ms-accent);
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .ms-range-input {
        width: 100%;
        accent-color: var(--ms-accent);
    }

    /* Footer / Actions */
    .ms-footer {
        padding: 1.5rem 2rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: space-between;
        background: #f8fafc;
        border-radius: 0 0 24px 24px;
    }

    .ms-btn {
        padding: 0.875rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 1rem;
        border: 1px solid transparent;
        font-family: var(--ms-font-heading);
    }

    .ms-btn-next {
        background: var(--ms-primary);
        color: white;
        box-shadow: 0 4px 12px rgba(2, 91, 95, 0.25);
    }

    .ms-btn-next:hover {
        background: #024649;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(2, 91, 95, 0.35);
    }

    .ms-btn-prev {
        background: transparent;
        color: #64748b;
        padding-left: 0;
        border: none;
    }

    .ms-btn-prev:hover {
        color: var(--ms-text-heading);
    }
    
    .ms-btn-reset {
        background: #e2e8f0;
        color: #64748b;
        margin-right: auto;
        padding: 0.875rem 1.5rem;
    }
    
    .ms-btn-reset:hover {
        background: #cbd5e1;
        color: #475569;
    }

    /* Review List */
    .ms-review-list {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid #e2e8f0;
    }

    .ms-review-item {
        display: flex;
        justify-content: space-between;
        padding: 0.875rem 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .ms-review-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .ms-review-item:first-child {
        padding-top: 0;
    }

    .ms-review-label {
        color: #64748b;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .ms-review-value {
        color: var(--ms-text-heading);
        font-weight: 700;
        text-align: right;
        max-width: 60%;
    }
    
    @media (max-width: 640px) {
        .ms-modal {
            height: 100vh;
            max-height: 100vh;
            border-radius: 0;
        }
        
        .ms-header {
            padding: 1rem 1.25rem;
        }
        
        .ms-body {
            padding: 1.5rem 1.25rem;
        }
        
        .ms-footer {
            padding: 1rem 1.25rem;
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .ms-footer > div {
            width: 100%;
            display: flex;
            gap: 0.75rem;
        }
        
        .ms-btn-reset {
            width: 100%;
            margin-right: 0;
            text-align: center;
        }
        
        .ms-btn-prev {
            flex: 1;
            padding-left: 1rem;
            text-align: center;
        }
        
        .ms-btn-next {
            flex: 2;
            padding: 0.875rem 1rem;
        }
        
        .ms-step-title {
            font-size: 1.35rem;
        }
        
        .ms-step-subtitle {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        
        .ms-grid-options {
            grid-template-columns: 1fr;
        }
        
        .ms-option-card {
            padding: 1rem;
        }
        
        .ms-option-title {
            font-size: 1rem;
        }
        
        .ms-option-desc {
            font-size: 0.85rem;
        }
        
        .ms-checkbox-group {
            grid-template-columns: 1fr 1fr;
        }
        
        .ms-checkbox-label {
            padding: 0.75rem;
            font-size: 0.85rem;
        }
        
        .ms-review-item {
            flex-direction: column;
            gap: 0.25rem;
        }
        
        .ms-review-value {
            text-align: left;
            max-width: 100%;
        }
    }
    
    @media (max-width: 380px) {
        .ms-checkbox-group {
            grid-template-columns: 1fr;
        }
        
        .ms-btn {
            font-size: 0.9rem;
            padding: 0.75rem 1rem;
        }
        
        .ms-title {
            font-size: 1.1rem;
        }
    }

    /* Location Chips Styles */
    .ms-selected-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        padding: 1rem;
        background: var(--ms-bg-input);
        border-radius: 10px;
        min-height: 60px;
    }

    .ms-chip-placeholder {
        color: #9ca3af;
        font-size: 0.9rem;
        font-style: italic;
    }

    .ms-location-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--ms-primary);
        color: white;
        padding: 0.5rem 0.75rem;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 500;
        animation: chipAppear 0.2s ease;
    }

    @keyframes chipAppear {
        from { opacity: 0; transform: scale(0.8); }
        to { opacity: 1; transform: scale(1); }
    }

    .ms-chip-remove {
        background: rgba(255,255,255,0.25);
        border: none;
        color: white;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        line-height: 1;
        transition: background 0.2s;
    }

    .ms-chip-remove:hover {
        background: rgba(255,255,255,0.4);
    }

    /* Custom Multi-Select Dropdown (Modal) */
    .ms-multi-select-wrapper {
        position: relative;
        width: 100%;
        margin-bottom: 1rem;
    }

    /* Ensure dropdown stays within flow but floats over next items when open */
    .ms-multi-select-dropdown {
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
        z-index: 1000; /* High z-index to overlap footer if needed, but wrapper margin handles flow */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.2s ease-in-out;
        opacity: 0;
        visibility: hidden; /* Hide cleanly */
    }

    .ms-multi-select-wrapper.open .ms-multi-select-dropdown {
        max-height: 250px;
        opacity: 1;
        visibility: visible;
        overflow-y: auto;
        padding: 0.5rem 0;
    }

    /* Selected Tags Area */
    .ms-selected-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
        margin-top: 0.5rem;
        margin-bottom: 1rem; /* Space before next element */
        min-height: 0; /* Allow collapsing */
    }

    .ms-multi-option {
        padding: 0.6rem 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: background 0.15s;
        font-size: 0.9rem;
        color: #4b5563;
    }

    .ms-multi-option:hover {
        background-color: #f3f4f6;
    }

    .ms-multi-option.selected {
        background-color: #f0fdf4;
        color: var(--ms-primary);
        font-weight: 500;
    }

    .ms-multi-option input[type="checkbox"] {
        width: 16px;
        height: 16px;
        border-radius: 4px;
        border: 2px solid #cbd5e1;
        cursor: pointer;
        accent-color: var(--ms-primary);
    }

    .ms-selected-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }
    
    .ms-selected-tag {
        background: var(--ms-primary-light);
        color: var(--ms-primary);
        font-size: 0.8rem;
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
    }

    /* Hide native select when custom is active */
    .ms-select.hidden-force {
        display: none !important;
    }

    /* Metrics Step Styles */
    .ms-metrics-container {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .ms-metric-group {
        background: #fff;
        border: 1px solid var(--ms-border);
        border-radius: 12px;
        padding: 1rem;
        overflow: hidden;
    }

    .ms-metric-group-header {
        display: inline-block;
        background: #f3f4f6;
        color: #374151;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .ms-metric-options {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .ms-metric-chip {
        background: #fff;
        border: 2px solid var(--ms-border);
        padding: 0.5rem 1rem;
        border-radius: 50px;
        cursor: pointer;
        color: #64748b;
        font-size: 0.9rem;
        transition: all 0.2s;
        font-weight: 500;
        user-select: none;
    }

    .ms-metric-chip:hover {
        border-color: #94a3b8;
    }

    .ms-metric-chip.selected {
        background: var(--ms-primary);
        border-color: var(--ms-primary);
        color: white;
        font-weight: 600;
    }

    .ms-metric-chip input {
        display: none;
    }

    .ms-metrics-counter {
        background: var(--ms-primary-light);
        padding: 1rem;
        border-radius: 10px;
        text-align: left;
        color: var(--ms-text-heading);
        font-size: 0.95rem;
        margin-top: 1rem;
    }

    .ms-metrics-counter strong {
        color: var(--ms-primary);
    }
</style>

<!-- Modal Structure -->
<div id="multiStepModal" class="ms-modal-overlay">
    <div class="ms-modal">
        <div class="ms-header">
            <h3 class="ms-title">Request Data Access</h3>
            <button class="ms-close" onclick="closeMultiStepModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="ms-progress-container">
            <div class="ms-progress-bar">
                <div class="ms-progress-fill" id="msProgress"></div>
            </div>
        </div>

        <form id="msForm" onsubmit="return false;">
            <div class="ms-body">
                
                <!-- Step 1: Request Type -->
                <div class="ms-step active" data-step="1">
                    <h2 class="ms-step-title">What do you need?</h2>
                    <p class="ms-step-subtitle">Choose the type of data access you require.</p>
                    
                    <div class="ms-grid-options">
                        <label class="ms-option-card">
                            <input type="radio" name="request_type" value="Ready-to-use Data" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Ready-to-use Data</span>
                                <span class="ms-option-desc">Process-ready climate variables (NetCDF, CSV, ASCII) for direct integration into your models.</span>
                            </div>
                        </label>
                        
                        <label class="ms-option-card">
                            <input type="radio" name="request_type" value="Hazard Maps" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Hazard Maps</span>
                                <span class="ms-option-desc">Visualized risk assessments including flood, drought, and heatwave maps.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 2a: Location Method (Data Path) -->
                <div class="ms-step" data-step="2a">
                    <h2 class="ms-step-title">Location Method</h2>
                    <p class="ms-step-subtitle">How would you like to select your area of interest?</p>
                    
                    <div class="ms-grid-options">
                        <label class="ms-option-card">
                            <input type="radio" name="location_method" value="Administrative Boundary" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Administrative Boundary</span>
                                <span class="ms-option-desc">Select by State, District, or Sub-district boundaries.</span>
                            </div>
                        </label>
                        
                        <label class="ms-option-card">
                            <input type="radio" name="location_method" value="Gridded Data" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Gridded Data</span>
                                <span class="ms-option-desc">Select specific grid coordinates (Lat/Long).</span>
                            </div>
                        </label>
                    </div>
                </div>
                
                <!-- Step 2b: Hazard Type (Hazard Path) -->
                <div class="ms-step" data-step="2b">
                    <h2 class="ms-step-title">Hazard Types</h2>
                    <p class="ms-step-subtitle">Select the risks you want to analyze.</p>
                    
                    <div class="ms-checkbox-group">
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="hazards[]" value="Drought" class="ms-checkbox-input"> Drought
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="hazards[]" value="Flood" class="ms-checkbox-input"> Flood
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="hazards[]" value="Heat" class="ms-checkbox-input"> Extreme Heat
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="hazards[]" value="Extreme Rainfall" class="ms-checkbox-input"> Extreme Rainfall
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="hazards[]" value="Compound" class="ms-checkbox-input"> Compound Events
                        </label>
                    </div>
                </div>

                <!-- Step 3: Admin Level -->
                <div class="ms-step" data-step="3">
                    <h2 class="ms-step-title">Administrative Level</h2>
                    <p class="ms-step-subtitle">Choose the granularity of your data.</p>
                    
                    <div class="ms-grid-options">
                        <label class="ms-option-card">
                            <input type="radio" name="admin_level" value="State" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">State Level</span>
                            </div>
                        </label>
                        <label class="ms-option-card">
                            <input type="radio" name="admin_level" value="District" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">District Level</span>
                            </div>
                        </label>
                        <label class="ms-option-card">
                            <input type="radio" name="admin_level" value="Sub-district" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Sub-district (Block/Tehsil)</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 4: Specific Location -->
                <div class="ms-step" data-step="4">
                    <h2 class="ms-step-title">Select Location</h2>
                    <p class="ms-step-subtitle">Select states and districts (Ctrl+click for multiple).</p>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">Country</label>
                        <select name="country" class="ms-select" disabled>
                            <option value="India" selected>India</option>
                        </select>
                    </div>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">States *</label>
                        <select id="msStateSelect" name="states[]" class="ms-select ms-multi-select" multiple size="6">
                            <!-- Populated by JS -->
                        </select>
                        <small style="color: #64748b; font-size: 0.8rem;">Hold Ctrl/Cmd to select multiple states</small>
                    </div>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">Districts *</label>
                        <select id="msDistrictSelect" name="districts[]" class="ms-select ms-multi-select" multiple size="6">
                            <option value="">Select state(s) first</option>
                        </select>
                        <small style="color: #64748b; font-size: 0.8rem;">Hold Ctrl/Cmd to select multiple districts</small>
                    </div>
                </div>

                <!-- Step 5: Variables -->
                <div class="ms-step" data-step="5">
                    <h2 class="ms-step-title">Climate Variables</h2>
                    <p class="ms-step-subtitle">Select the parameters you need.</p>
                    
                    <div class="ms-checkbox-group">
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="Rainfall" class="ms-checkbox-input"> Rainfall
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="T-Max" class="ms-checkbox-input"> T-Max
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="T-Min" class="ms-checkbox-input"> T-Min
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="T-Mean" class="ms-checkbox-input"> T-Mean
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="Humidity" class="ms-checkbox-input"> Humidity
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="Wind Speed" class="ms-checkbox-input"> Wind Speed
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="Solar Radiation" class="ms-checkbox-input"> Solar Radiation
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="Soil Moisture" class="ms-checkbox-input"> Soil Moisture
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="PET / Evapotranspiration" class="ms-checkbox-input"> PET / Evapotranspiration
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="variables[]" value="NDVI / Vegetation" class="ms-checkbox-input"> NDVI / Vegetation
                        </label>
                    </div>
                </div>

                <!-- Step 5b: Metrics (Conditional on Variables) -->
                <div class="ms-step" data-step="5b">
                    <h2 class="ms-step-title">Metrics</h2>
                    <p class="ms-step-subtitle">Select specific metrics for your chosen variables.</p>
                    
                    <div id="msMetricsContainer" class="ms-metrics-container">
                        <!-- Dynamically populated by JS based on selected variables -->
                    </div>
                    
                    <div class="ms-metrics-counter" id="msMetricsCounter">
                        Selected metrics count: <strong>0</strong>
                    </div>
                    
                    <input type="hidden" name="metrics" id="msMetricsInput" value="">
                </div>

                <!-- Step 6: Coverage -->
                <div class="ms-step" data-step="6">
                    <h2 class="ms-step-title">Temporal Coverage</h2>
                    <p class="ms-step-subtitle">Select the time horizon for your analysis.</p>
                    
                    <div class="ms-grid-options">
                        <label class="ms-option-card">
                            <input type="radio" name="coverage" value="Historical" class="ms-option-radio" checked>
                            <div class="ms-option-content">
                                <span class="ms-option-title">Historical (1901-2024)</span>
                                <span class="ms-option-desc">Observed data from past records.</span>
                            </div>
                        </label>
                        
                        <label class="ms-option-card">
                            <input type="radio" name="coverage" value="Future Projections" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Future Projections (2025-2100)</span>
                                <span class="ms-option-desc">Modelled projections for future climate scenarios.</span>
                            </div>
                        </label>
                        
                        <label class="ms-option-card">
                            <input type="radio" name="coverage" value="Both" class="ms-option-radio">
                            <div class="ms-option-content">
                                <span class="ms-option-title">Both</span>
                                <span class="ms-option-desc">Complete timeline from 1901 to 2100.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Step 7: Climate Scenarios (Conditional) -->
                <div class="ms-step" data-step="7">
                    <h2 class="ms-step-title">Climate Scenarios</h2>
                    <p class="ms-step-subtitle">Select Shared Socioeconomic Pathways (SSPs).</p>
                    
                    <div class="ms-checkbox-group">
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="scenarios[]" value="SSP1-2.6" class="ms-checkbox-input"> SSP1-2.6 (Sustainability)
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="scenarios[]" value="SSP2-4.5" class="ms-checkbox-input" checked> SSP2-4.5 (Middle of Road)
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="scenarios[]" value="SSP3-7.0" class="ms-checkbox-input"> SSP3-7.0 (Regional Rivalry)
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="scenarios[]" value="SSP5-8.5" class="ms-checkbox-input"> SSP5-8.5 (Fossil-fueled)
                        </label>
                    </div>
                </div>

                <!-- Step 8: Format -->
                <div class="ms-step" data-step="8">
                    <h2 class="ms-step-title">Data Format</h2>
                    <p class="ms-step-subtitle">How would you like to receive the data?</p>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">File Format</label>
                        <select name="format" class="ms-select">
                            <option value="CSV">CSV (Spreadsheet)</option>
                            <option value="NetCDF">NetCDF (Scientific)</option>
                            <option value="GeoJSON">GeoJSON / Shapefile</option>
                            <option value="ASCII">ASCII Grid</option>
                        </select>
                    </div>
                    
                    <div class="ms-checkbox-group">
                        <label class="ms-checkbox-label checked">
                            <input type="checkbox" name="extras[]" value="Metadata" class="ms-checkbox-input" checked> Include Metadata
                        </label>
                        <label class="ms-checkbox-label">
                            <input type="checkbox" name="extras[]" value="Summary Tables" class="ms-checkbox-input"> Include Summary Tables
                        </label>
                    </div>
                </div>

                <!-- Step 9: Contact Details -->
                <div class="ms-step" data-step="9">
                    <h2 class="ms-step-title">Your Details</h2>
                    <p class="ms-step-subtitle">Where should we send the data access link?</p>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">Full Name *</label>
                        <input type="text" name="user_name" class="ms-input" placeholder="e.g. John Doe" required>
                    </div>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">Email Address *</label>
                        <input type="email" name="user_email" class="ms-input" placeholder="e.g. john@company.com" required>
                    </div>
                    
                    <div class="ms-input-group">
                        <label class="ms-label">Organization Type</label>
                        <select name="user_org_type" class="ms-select">
                            <option value="Agribusiness">Agribusiness</option>
                            <option value="Research">Research / Academic</option>
                            <option value="Government">Government / Policy</option>
                            <option value="Insurance">Insurance / Finance</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- Step 10: Summary -->
                <div class="ms-step" data-step="10">
                    <h2 class="ms-step-title">Review Request</h2>
                    <p class="ms-step-subtitle">Please review your configuration before submitting.</p>
                    
                    <div class="ms-review-list" id="msReviewList">
                        <!-- Populated by JS -->
                    </div>
                </div>
                
                <!-- Success State -->
                <div class="ms-step" data-step="success">
                    <div style="text-align: center; padding: 2rem 0;">
                        <div style="width: 80px; height: 80px; background: var(--ms-primary-light); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                            <i class="fas fa-check" style="color: var(--ms-primary); font-size: 2.5rem;"></i>
                        </div>
                        <h2 class="ms-step-title" style="color: var(--ms-primary);">Request Submitted!</h2>
                        <p class="ms-step-subtitle">We have received your request. An email with access details has been sent to your inbox.</p>
                        
                        <div style="background: var(--ms-bg-input); padding: 1rem; border-radius: 12px; margin-top: 1.5rem;">
                            <span style="display: block; font-size: 0.85rem; color: #64748b; margin-bottom: 0.5rem;">REQUEST ID</span>
                            <span style="font-family: monospace; font-size: 1.25rem; color: var(--ms-text-heading); letter-spacing: 2px;" id="msRequestId">CLM-XXXX-YYYY</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="ms-footer">
                <button type="button" class="ms-btn ms-btn-reset" onclick="msResetForm()" id="msResetBtn">Reset</button>
                <div style="display: flex; gap: 1rem;">
                    <button type="button" class="ms-btn ms-btn-prev" onclick="msPrevStep()" id="msPrevBtn">Back</button>
                    <button type="button" class="ms-btn ms-btn-next" onclick="msNextStep()" id="msNextBtn">Next</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Load Locations Data -->
<script src="<?php echo base_url('assest/js/india-locations.js'); ?>"></script>

<script>
    // State Management
    let currentStep = 1;
    let totalSteps = 10;
    const formData = {};
    const stepHistory = [];

    // Initialize Form
    document.addEventListener('DOMContentLoaded', () => {
        initLocations();
        updateUI();
        setupEventListeners();
    });

    // populate states/districts
    function initLocations() {
        const stateSelect = document.getElementById('msStateSelect');
        const districtSelect = document.getElementById('msDistrictSelect');
        
        if(typeof indiaLocations !== 'undefined') {
            const states = Object.keys(indiaLocations).sort();
            states.forEach(state => {
                const option = document.createElement('option');
                option.value = state;
                option.textContent = state;
                stateSelect.appendChild(option);
            });
            
            // Initialize custom select logic (after populating initial states)
            setupMsCustomMultiSelect('msStateSelect', 'Select State(s)');
            setupMsCustomMultiSelect('msDistrictSelect', 'Select District(s)');

            // Handle multi-state selection -> populate districts
            stateSelect.addEventListener('change', function() {
                const selectedStates = Array.from(this.selectedOptions).map(opt => opt.value);
                districtSelect.innerHTML = '';
                
                if (selectedStates.length === 0) {
                    districtSelect.innerHTML = '<option value="">Select state(s) first</option>';
                    refreshMsCustomMultiSelect('msDistrictSelect');
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
                        const districts = indiaLocations[state].sort();
                        districts.forEach(dist => {
                            const option = document.createElement('option');
                            option.value = dist;
                            option.textContent = `${dist} (${state})`;
                            districtSelect.appendChild(option);
                        });
                    }
                });
                
                // Refresh custom total UI for districts
                refreshMsCustomMultiSelect('msDistrictSelect');
            });
        }
    }

    // Custom Multi-Select Logic (Modal Version)
    function setupMsCustomMultiSelect(selectId, placeholder) {
        const select = document.getElementById(selectId);
        select.classList.add('hidden-force');
        
        let wrapper = document.getElementById(selectId + '_wrapper');
        if(wrapper) wrapper.remove(); // Cleanup if re-initializing
        
        // Create Wrapper
        wrapper = document.createElement('div');
        wrapper.className = 'ms-multi-select-wrapper';
        wrapper.id = selectId + '_wrapper';
        
        // Trigger
        const trigger = document.createElement('div');
        trigger.className = 'ms-multi-select-trigger';
        trigger.innerHTML = `<span>${placeholder}</span>`;
        trigger.onclick = (e) => {
            e.stopPropagation();
            // Close other dropdowns
            document.querySelectorAll('.ms-multi-select-wrapper').forEach(w => {
                if(w !== wrapper) w.classList.remove('open');
            });
            wrapper.classList.toggle('open');
        };
        
        // Dropdown List
        const dropdown = document.createElement('div');
        dropdown.className = 'ms-multi-select-dropdown';
        
        // Selected Tags Area (below trigger)
        let tagsArea = select.nextElementSibling;
        if(tagsArea && tagsArea.classList.contains('ms-selected-tags')) {
             tagsArea.innerHTML = '';
        } else {
             tagsArea = document.createElement('div');
             tagsArea.className = 'ms-selected-tags';
        }
        
        wrapper.appendChild(trigger);
        wrapper.appendChild(dropdown);
        
        // Insert wrapper after select (or replace existing layout if messy)
        select.parentNode.insertBefore(wrapper, select.nextSibling); 
        // Insert tags after wrapper
        if(!tagsArea.parentNode) wrapper.parentNode.insertBefore(tagsArea, wrapper.nextSibling);

        // Populate
        refreshMsCustomMultiSelect(selectId);

        // Close on click outside
        document.addEventListener('click', (e) => {
            if (!wrapper.contains(e.target)) {
                wrapper.classList.remove('open');
            }
        });
    }

    function refreshMsCustomMultiSelect(selectId) {
        const select = document.getElementById(selectId);
        const wrapper = document.getElementById(selectId + '_wrapper');
        if(!wrapper) return;
        
        const dropdown = wrapper.querySelector('.ms-multi-select-dropdown');
        const triggerSpan = wrapper.querySelector('.ms-multi-select-trigger span');
        const tagsArea = wrapper.nextElementSibling;

        dropdown.innerHTML = '';
        if(tagsArea) tagsArea.innerHTML = '';
        
        let selectedCount = 0;
        
        Array.from(select.options).forEach(opt => {
            if (opt.value === '') return;

            const optionDiv = document.createElement('div');
            optionDiv.className = `ms-multi-option ${opt.selected ? 'selected' : ''}`;
            
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = opt.selected;
            
            const label = document.createTextNode(opt.textContent);
            
            optionDiv.appendChild(checkbox);
            optionDiv.appendChild(label);
            
            optionDiv.onclick = (e) => {
                e.stopPropagation();
                opt.selected = !opt.selected;
                checkbox.checked = opt.selected;
                optionDiv.classList.toggle('selected', opt.selected);
                select.dispatchEvent(new Event('change'));
                updateMsSelectedDisplay(select, triggerSpan, tagsArea);
            };
            
            checkbox.onclick = (e) => { e.stopPropagation(); opt.selected = checkbox.checked; optionDiv.classList.toggle('selected'); select.dispatchEvent(new Event('change')); updateMsSelectedDisplay(select, triggerSpan, tagsArea); };

            dropdown.appendChild(optionDiv);
            if (opt.selected) selectedCount++;
        });

        updateMsSelectedDisplay(select, triggerSpan, tagsArea);
    }

    function updateMsSelectedDisplay(select, triggerSpan, tagsArea) {
        const selectedOptions = Array.from(select.selectedOptions);
        if (selectedOptions.length === 0) {
            triggerSpan.textContent = select.id.includes('State') ? 'Select State(s)' : 'Select District(s)';
            if(tagsArea) tagsArea.innerHTML = '';
        } else {
            triggerSpan.textContent = `${selectedOptions.length} Selected`;
            if(tagsArea) tagsArea.innerHTML = selectedOptions.map(opt => `<span class="ms-selected-tag">${opt.textContent}</span>`).join('');
        }
    }

    // Variable to Metrics Mapping
    const variableMetrics = {
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

    const msSelectedMetrics = {};

    function populateMetrics() {
        const container = document.getElementById('msMetricsContainer');
        const selectedVars = Array.from(document.querySelectorAll('input[name="variables[]"]:checked')).map(cb => cb.value);
        
        if (selectedVars.length === 0) {
            container.innerHTML = '<p style="color: #64748b; text-align: center;">No variables selected. Go back and select at least one variable.</p>';
            return;
        }

        let html = '';
        selectedVars.forEach(variable => {
            const metrics = variableMetrics[variable] || [];
            if (metrics.length > 0) {
                html += `
                    <div class="ms-metric-group">
                        <div class="ms-metric-group-header">${variable}</div>
                        <div class="ms-metric-options">
                            ${metrics.map(metric => `
                                <label class="ms-metric-chip" onclick="toggleMetric('${variable}', '${metric}', this)">
                                    <input type="checkbox" name="metric_${variable.replace(/[^a-zA-Z]/g, '')}" value="${metric}">
                                    ${metric}
                                </label>
                            `).join('')}
                        </div>
                    </div>
                `;
            }
        });

        container.innerHTML = html;
        updateMetricsCounter();
    }

    function toggleMetric(variable, metric, element) {
        const input = element.querySelector('input');
        input.checked = !input.checked;
        element.classList.toggle('selected', input.checked);

        // Track selected metrics
        if (!msSelectedMetrics[variable]) msSelectedMetrics[variable] = [];
        if (input.checked) {
            if (!msSelectedMetrics[variable].includes(metric)) {
                msSelectedMetrics[variable].push(metric);
            }
        } else {
            msSelectedMetrics[variable] = msSelectedMetrics[variable].filter(m => m !== metric);
        }

        updateMetricsCounter();
        document.getElementById('msMetricsInput').value = JSON.stringify(msSelectedMetrics);
    }

    function updateMetricsCounter() {
        let total = 0;
        Object.values(msSelectedMetrics).forEach(arr => total += arr.length);
        document.querySelector('#msMetricsCounter strong').textContent = total;
    }

    // Multi-location selection
    const msSelectedLocations = [];

    function msAddLocation() {
        const stateSelect = document.getElementById('msStateSelect');
        const districtSelect = document.getElementById('msDistrictSelect');
        const state = stateSelect.value;
        const district = districtSelect.value;

        if (!state) {
            alert('Please select a state');
            return;
        }
        if (!district) {
            alert('Please select a district');
            return;
        }

        // Check for duplicates
        const exists = msSelectedLocations.some(loc => loc.state === state && loc.district === district);
        if (exists) {
            alert('This location is already added');
            return;
        }

        msSelectedLocations.push({ state, district });
        msUpdateLocationsDisplay();

        // Reset selects
        stateSelect.value = '';
        districtSelect.innerHTML = '<option value="">Select District</option>';
    }

    function msRemoveLocation(index) {
        msSelectedLocations.splice(index, 1);
        msUpdateLocationsDisplay();
    }

    function msUpdateLocationsDisplay() {
        const container = document.getElementById('msSelectedLocations');
        const hiddenInput = document.getElementById('msLocationsInput');

        if (msSelectedLocations.length === 0) {
            container.innerHTML = '<span class="ms-chip-placeholder">No locations added yet. Select state & district above and click Add.</span>';
            hiddenInput.value = '';
        } else {
            container.innerHTML = msSelectedLocations.map((loc, idx) => `
                <div class="ms-location-chip">
                    ${loc.district}, ${loc.state}
                    <button type="button" class="ms-chip-remove" onclick="msRemoveLocation(${idx})">×</button>
                </div>
            `).join('');
            hiddenInput.value = JSON.stringify(msSelectedLocations);
        }
    }

    // Modal Control
    function openMultiStepModal() {
        const modal = document.getElementById('multiStepModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMultiStepModal() {
        const modal = document.getElementById('multiStepModal');
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Navigation
    function msNextStep() {
        if (!validateStep(currentStep)) return;
        
        stepHistory.push(currentStep);
        const nextStep = determineNextStep(currentStep);
        
        if (nextStep === 'submit') {
            submitForm();
        } else {
            currentStep = nextStep;
            updateUI();
        }
    }

    function msPrevStep() {
        if (stepHistory.length === 0) return;
        currentStep = stepHistory.pop();
        updateUI();
    }
    
    function msResetForm() {
        currentStep = 1;
        stepHistory.length = 0;
        document.getElementById('msForm').reset();
        // Reset selections visual state
        document.querySelectorAll('.ms-option-card').forEach(c => c.classList.remove('selected'));
        document.querySelectorAll('.ms-checkbox-label').forEach(c => c.classList.remove('checked'));
        // Re-select default checked options styling
        document.querySelectorAll('input:checked').forEach(input => {
            const card = input.closest('.ms-option-card');
            if (card) card.classList.add('selected');
            const label = input.closest('.ms-checkbox-label');
            if (label) label.classList.add('checked');
        });
        updateUI();
    }

    // Conditional Logic Route
    function determineNextStep(step) {
        const typeEl = document.querySelector('input[name="request_type"]:checked');
        const type = typeEl ? typeEl.value : '';
        
        if (typeof step === 'string') step = parseFloat(step); // normalize
        
        // Step 1: Type Selection
        if (step === 1) {
            return type === 'Ready-to-use Data' ? '2a' : '2b';
        }
        
        // Step 2a/2b -> Admin Level
        if (step === '2a' || step === '2b' || step === 2) { 
            return 3;
        }
        
        // Step 3 -> Location
        if (step === 3) return 4;
        
        // Step 4 -> Variables
        if (step === 4) return 5;
        
        // Step 5 -> Metrics (populate metrics dynamically)
        if (step === 5) {
            populateMetrics();
            return '5b';
        }
        
        // Step 5b (Metrics) -> Coverage
        if (step === '5b') return 6;
        
        // Step 6 -> Scenarios (if Future selected) or Format
        if (step === 6) {
            const coverageEl = document.querySelector('input[name="coverage"]:checked');
            const coverage = coverageEl ? coverageEl.value : '';
            return (coverage === 'Historical') ? 8 : 7;
        }
        
        // Step 7 -> Format
        if (step === 7) return 8;
        
        // Step 8 -> Contact
        if (step === 8) return 9;
        
        // Step 9 -> Summary
        if (step === 9) {
            populateSummary();
            return 10;
        }
        
        // Step 10 -> Submit
        if (step === 10) return 'submit';
        
        return step + 1;
    }

    function updateUI() {
        // Hide all steps
        document.querySelectorAll('.ms-step').forEach(step => step.classList.remove('active'));
        
        // Show current step
        const currentStepEl = document.querySelector(`.ms-step[data-step="${currentStep}"]`);
        if (currentStepEl) currentStepEl.classList.add('active');
        
        // Update Buttons
        const prevBtn = document.getElementById('msPrevBtn');
        const nextBtn = document.getElementById('msNextBtn');
        const resetBtn = document.getElementById('msResetBtn');
        
        prevBtn.style.visibility = stepHistory.length === 0 ? 'hidden' : 'visible';
        resetBtn.style.visibility = currentStep === 'success' ? 'hidden' : 'visible';
        
        if (currentStep === 10) {
            nextBtn.textContent = 'Submit Request';
            nextBtn.style.background = '#10b981'; // Green for submit action specifically
            nextBtn.style.color = '#ffffff';
        } else if (currentStep === 'success') {
            nextBtn.style.display = 'none';
            prevBtn.style.display = 'none';
            resetBtn.style.display = 'none';
            document.querySelector('.ms-footer').style.justifyContent = 'center';
            // Only add close button if not exists
            if(!document.getElementById('msFinalClose')) {
                const closeBtn = document.createElement('button');
                closeBtn.id = 'msFinalClose';
                closeBtn.className = 'ms-btn ms-btn-reset';
                closeBtn.textContent = 'Close';
                closeBtn.onclick = closeMultiStepModal;
                document.querySelector('.ms-footer').appendChild(closeBtn);
            }
        } else {
            nextBtn.textContent = 'Next';
            // Use Brand Primary for navigation
            nextBtn.style.background = 'var(--ms-primary)';
            nextBtn.style.display = 'block';
            prevBtn.style.display = 'block';
        }

        // Calculate progress (Approximate - 11 steps total now)
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
        else if (currentStep === 10) progress = 100;
        
        document.getElementById('msProgress').style.width = `${progress}%`;
    }

    // Validation
    function validateStep(step) {
        let valid = true;
        const currentEl = document.querySelector(`.ms-step[data-step="${step}"]`);
        
        // Check required inputs
        const requiredInputs = currentEl.querySelectorAll('[required]');
        requiredInputs.forEach(input => {
            if (!input.value) {
                valid = false;
                input.style.borderColor = '#ef4444';
                // Reset color on input
                input.addEventListener('input', function() { this.style.borderColor = ''; }, {once: true});
            }
        });
        
        // Check dropdowns (selects) - no longer needed for step 4
        
        // Check checkbox groups (at least one)
        if (step === '2b' || step === 5) {
            const checked = currentEl.querySelectorAll('input[type="checkbox"]:checked');
            if (checked.length === 0) {
                valid = false;
                alert('Please select at least one option.');
            }
        }

        // Check locations for step 4
        if (step === 4) {
            const selectedStates = document.getElementById('msStateSelect').selectedOptions.length;
            const selectedDistricts = document.getElementById('msDistrictSelect').selectedOptions.length;
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

    // Helper: Style Option Cards on click
    function setupEventListeners() {
        // Only handle change events - let the label do the clicking
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Remove selected class from all cards in same group
                const name = this.name;
                document.querySelectorAll(`input[name="${name}"]`).forEach(input => {
                    const card = input.closest('.ms-option-card');
                    if (card) card.classList.remove('selected');
                });
                // Add selected to the checked one
                if (this.checked) {
                    const card = this.closest('.ms-option-card');
                    if (card) card.classList.add('selected');
                }
            });
        });
        
        // Checkbox styling - only on change
        document.querySelectorAll('input[type="checkbox"]').forEach(box => {
            box.addEventListener('change', function() {
                const label = this.closest('.ms-checkbox-label');
                if (label) {
                    if (this.checked) label.classList.add('checked');
                    else label.classList.remove('checked');
                }
            });
        });
    }

    function populateSummary() {
        const container = document.getElementById('msReviewList');
        const formData = new FormData(document.getElementById('msForm'));
        let html = '';
        
        // Fields to display
        const fields = [
            { key: 'request_type', label: 'Request Type' },
            { key: 'location_method', label: 'Location Method' },
            { key: 'coverage', label: 'Coverage' },
            { key: 'format', label: 'Format' },
            { key: 'user_name', label: 'Name' },
            { key: 'user_email', label: 'Email' }
        ];
        
        fields.forEach(field => {
            const val = formData.get(field.key);
            if (val) {
                html += `
                    <div class="ms-review-item">
                        <span class="ms-review-label">${field.label}</span>
                        <span class="ms-review-value">${val}</span>
                    </div>
                `;
            }
        });

        // Add locations from multi-select
        const selectedStates = Array.from(document.getElementById('msStateSelect').selectedOptions).map(o => o.value);
        const selectedDistricts = Array.from(document.getElementById('msDistrictSelect').selectedOptions).map(o => o.textContent);
        if (selectedStates.length > 0) {
            html += `
                <div class="ms-review-item">
                    <span class="ms-review-label">States (${selectedStates.length})</span>
                    <span class="ms-review-value">${selectedStates.join(', ')}</span>
                </div>
            `;
        }
        if (selectedDistricts.length > 0) {
            html += `
                <div class="ms-review-item">
                    <span class="ms-review-label">Districts (${selectedDistricts.length})</span>
                    <span class="ms-review-value">${selectedDistricts.join(', ')}</span>
                </div>
            `;
        }
        
        // Arrays (checkboxes)
        const arrays = [
            { key: 'hazards[]', label: 'Hazards' },
            { key: 'variables[]', label: 'Variables' },
            { key: 'scenarios[]', label: 'Scenarios' }
        ];
        
        arrays.forEach(arr => {
            const vals = formData.getAll(arr.key);
            if (vals.length > 0) {
                html += `
                    <div class="ms-review-item">
                        <span class="ms-review-label">${arr.label}</span>
                        <span class="ms-review-value">${vals.join(', ')}</span>
                    </div>
                `;
            }
        });

        // Add metrics
        const metricsKeys = Object.keys(msSelectedMetrics);
        if (metricsKeys.length > 0) {
            let metricsStr = '';
            metricsKeys.forEach(variable => {
                if (msSelectedMetrics[variable].length > 0) {
                    metricsStr += `<strong>${variable}:</strong> ${msSelectedMetrics[variable].join(', ')}<br>`;
                }
            });
            if (metricsStr) {
                html += `
                    <div class="ms-review-item">
                        <span class="ms-review-label">Metrics</span>
                        <span class="ms-review-value">${metricsStr}</span>
                    </div>
                `;
            }
        }

        container.innerHTML = html;
    }

    function submitForm() {
        const submitBtn = document.getElementById('msNextBtn');
        submitBtn.textContent = 'Processing...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Generate Random ID
            const id = 'CLM-' + Math.random().toString(36).substr(2, 4).toUpperCase() + '-' + Math.random().toString(36).substr(2, 4).toUpperCase();
            document.getElementById('msRequestId').textContent = id;
            
            // Show Success
            currentStep = 'success';
            updateUI();
            
            // Actually submit to backend logic if needed using AJAX
            // const formData = new FormData(document.getElementById('msForm'));
            // fetch('...', { method: 'POST', body: formData });
            
        }, 1500);
    }
    
    // Modal Open/Close Functions
    function openMultiStepModal() {
        const modal = document.getElementById('multiStepModal');
        const scrollY = window.scrollY;
        document.body.style.top = `-${scrollY}px`;
        document.body.classList.add('modal-open');
        modal.classList.add('active');
        
        // Scroll body content inside modal to top
        const body = modal.querySelector('.ms-body');
        if (body) body.scrollTop = 0;
    }
    
    function closeMultiStepModal() {
        const modal = document.getElementById('multiStepModal');
        modal.classList.remove('active');
        
        // Restore body scroll position
        const scrollY = document.body.style.top;
        document.body.classList.remove('modal-open');
        document.body.style.top = '';
        window.scrollTo(0, parseInt(scrollY || '0') * -1);
        
        // Reset form for next use
        msResetForm();
    }
    
    // Close modal when clicking outside
    document.getElementById('multiStepModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeMultiStepModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('multiStepModal');
            if (modal.classList.contains('active')) {
                closeMultiStepModal();
            }
        }
    });
</script>
