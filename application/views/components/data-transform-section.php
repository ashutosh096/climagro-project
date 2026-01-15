<?php
/**
 * Data Transformation Section
 * 
 * "Turn Raw Climate Chaos into Risk Clarity"
 * Shows before/after comparison of raw data processing vs instant intelligence
 * Matches the current site design with primary teal and accent orange
 */
?>
<style>
    .transform-section {
        background: linear-gradient(180deg, #025b5f 0%, #023d40 100%);
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
        font-family: var(--font-body, 'Outfit', sans-serif);
    }
    
    .transform-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
    .transform-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .transform-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: white;
        margin: 0 0 20px 0;
        line-height: 1.2;
        font-family: var(--font-heading, 'Manrope', serif);
    }
    
    .transform-title .highlight {
        color: #f26a21;
        position: relative;
    }
    
    .transform-title .highlight::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #f26a21, rgba(242, 106, 33, 0.3));
        border-radius: 2px;
    }
    
    .transform-subtitle {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.8);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
    }
    
    .transform-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
        align-items: center;
    }
    
    @media (min-width: 1024px) {
        .transform-grid {
            grid-template-columns: 1fr auto 1fr;
            gap: 40px;
        }
    }
    
    /* Left Panel - Raw Data Processing */
    .chaos-panel {
        position: relative;
    }
    
    .panel-label {
        font-size: 1rem;
        font-weight: 600;
        color: white;
        margin-bottom: 20px;
        text-align: center;
        font-family: var(--font-heading, 'Manrope', serif);
    }
    
    .chaos-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 320px;
    }
    
    .chaos-image-container {
        position: relative;
        max-width: 400px;
        width: 100%;
    }
    
    .chaos-image-container img {
        width: 100%;
        height: auto;
        border-radius: 12px;
    }
    
    .chaos-footer {
        text-align: center;
        margin-top: 20px;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 500;
    }
    
    /* Arrow connector */
    .arrow-connector {
        display: none;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    @media (min-width: 1024px) {
        .arrow-connector {
            display: flex;
        }
    }
    
    .arrow-line {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #f26a21, #14b8a6);
        border-radius: 2px;
        position: relative;
    }
    
    .arrow-line::after {
        content: '';
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%);
        border: 8px solid transparent;
        border-left-color: #14b8a6;
    }
    
    .arrow-glow {
        width: 14px;
        height: 14px;
        background: #f26a21;
        border-radius: 50%;
        animation: arrow-pulse 1.5s infinite;
        box-shadow: 0 0 20px #f26a21;
    }
    
    @keyframes arrow-pulse {
        0%, 100% { opacity: 0.5; transform: scale(0.8); }
        50% { opacity: 1; transform: scale(1.2); }
    }
    
    /* Right Panel - Instant Intelligence */
    .clarity-panel {
        position: relative;
    }
    
    .clarity-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        padding: 28px;
        max-width: 360px;
        margin: 0 auto;
    }
    
    .clarity-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .clarity-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .clarity-item:first-child {
        padding-top: 0;
    }
    
    .clarity-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }
    
    .icon-wind { 
        background: rgba(59, 130, 246, 0.2); 
        border: 1px solid rgba(59, 130, 246, 0.3);
    }
    .icon-drought { 
        background: rgba(242, 106, 33, 0.2); 
        border: 1px solid rgba(242, 106, 33, 0.3);
    }
    .icon-anomaly { 
        background: rgba(168, 85, 247, 0.2); 
        border: 1px solid rgba(168, 85, 247, 0.3);
    }
    
    .clarity-content {
        flex: 1;
    }
    
    .clarity-label {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.6);
        margin: 0 0 4px 0;
    }
    
    .clarity-value {
        font-size: 1.2rem;
        font-weight: 600;
        color: white;
        margin: 0;
        font-family: var(--font-heading, 'Manrope', serif);
    }
    
    .value-high { color: #f26a21; }
    .value-up { color: #a855f7; }
    
    .api-status {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 24px;
        padding: 14px 18px;
        background: rgba(20, 184, 166, 0.15);
        border: 1px solid rgba(20, 184, 166, 0.3);
        border-radius: 10px;
    }
    
    .status-dot {
        width: 10px;
        height: 10px;
        background: #14b8a6;
        border-radius: 50%;
        animation: status-blink 1s infinite;
        box-shadow: 0 0 8px #14b8a6;
    }
    
    @keyframes status-blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }
    
    .api-text {
        font-size: 0.9rem;
        color: #14b8a6;
        font-weight: 600;
    }
    
    .clarity-footer {
        text-align: center;
        margin-top: 20px;
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.6);
        font-weight: 500;
    }
    
    @media (max-width: 640px) {
        .transform-title {
            font-size: 2rem;
        }
        
        .transform-section {
            padding: 60px 0 80px;
        }
    }
</style>

<section class="transform-section">
    <div class="transform-container">
        
        <!-- Header -->
        <div class="transform-header">
            <h2 class="transform-title">
                Turn Raw Climate Chaos into<br>
                <span class="highlight">Risk Clarity</span>
            </h2>
            <p class="transform-subtitle">
                Stop wasting months on data prep. Climatics delivers harmonized, analysis-ready 
                intelligence via API in milliseconds.
            </p>
        </div>
        
        <!-- Comparison Grid -->
        <div class="transform-grid">
            
            <!-- Left: Raw Data Processing (Chaos) -->
            <div class="chaos-panel">
                <div class="panel-label">Raw Data Processing</div>
                <div class="chaos-visual">
                    <div class="chaos-image-container">
                        <img src="<?php echo base_url('assest/img/about/raw-data-chaos.png'); ?>" alt="Raw Data Processing - Tangled Data with Errors">
                    </div>
                </div>
                <div class="chaos-footer">8 Months of Cleaning</div>
            </div>
            
            <!-- Arrow Connector -->
            <div class="arrow-connector">
                <div class="arrow-glow"></div>
                <div class="arrow-line"></div>
            </div>
            
            <!-- Right: Instant Hazard Intelligence (Clarity) -->
            <div class="clarity-panel">
                <div class="panel-label">Instant Hazard Intelligence</div>
                <div class="clarity-card">
                    
                    <div class="clarity-item">
                        <div class="clarity-icon icon-wind">💨</div>
                        <div class="clarity-content">
                            <p class="clarity-label">Wind Speed Analysis</p>
                            <p class="clarity-value">Real-time Data</p>
                        </div>
                    </div>
                    
                    <div class="clarity-item">
                        <div class="clarity-icon icon-drought">🔥</div>
                        <div class="clarity-content">
                            <p class="clarity-label">Drought Risk Score</p>
                            <p class="clarity-value value-high">High</p>
                        </div>
                    </div>
                    
                    <div class="clarity-item">
                        <div class="clarity-icon icon-anomaly">📈</div>
                        <div class="clarity-content">
                            <p class="clarity-label">Anomaly</p>
                            <p class="clarity-value value-up">+15%</p>
                        </div>
                    </div>
                    
                    <div class="api-status">
                        <span class="status-dot"></span>
                        <span class="api-text">API Response: 200ms</span>
                    </div>
                </div>
                <div class="clarity-footer">Analysis-Ready via API</div>
            </div>
            
        </div>
        
    </div>
</section>
