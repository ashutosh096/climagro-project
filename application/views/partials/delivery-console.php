<?php
/**
 * Delivery Console Section
 * 
 * Section 4: "Built for Developers & Analysts"
 * Displays API integration and bulk export options side by side.
 */
?>
<style>
    .delivery-section {
        background: #00251a;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }
    
    .delivery-section::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 120%;
        height: 120%;
        background: radial-gradient(ellipse at center, rgba(255, 138, 101, 0.06) 0%, transparent 60%);
        pointer-events: none;
    }
    
    .delivery-section::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        height: 60%;
        background: radial-gradient(ellipse at top right, rgba(2, 91, 95, 0.12) 0%, transparent 50%);
        pointer-events: none;
    }
    
    .delivery-grid-overlay {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(to right, rgba(255,255,255,0.015) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255,255,255,0.015) 1px, transparent 1px);
        background-size: 60px 60px;
        pointer-events: none;
    }
    
    .delivery-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 10;
    }
    
    .delivery-header {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .delivery-tag {
        display: inline-block;
        padding: 8px 20px;
        background: rgba(255, 138, 101, 0.1);
        color: #FF8A65;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        border-radius: 50px;
        margin-bottom: 16px;
        border: 1px solid rgba(255, 138, 101, 0.2);
    }
    
    .delivery-title {
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 16px 0;
    }
    
    .delivery-subtitle {
        color: #9ca3af;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .delivery-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    @media (min-width: 1024px) {
        .delivery-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    
    .delivery-stats {
        margin-top: 60px;
        padding-top: 40px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .stats-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 40px;
        text-align: center;
    }
    
    .stat-item {
        display: flex;
        flex-direction: column;
    }
    
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 4px;
    }
    
    .stat-value.accent {
        color: #FF8A65;
    }
    
    .stat-label {
        font-size: 0.85rem;
        color: #6b7280;
    }
    
    .stat-divider {
        width: 1px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
    }
    
    @media (max-width: 640px) {
        .stat-divider {
            display: none;
        }
        
        .stats-row {
            gap: 30px;
        }
        
        .delivery-title {
            font-size: 2rem;
        }
    }
</style>

<section class="delivery-section">
    <div class="delivery-grid-overlay"></div>
    
    <div class="delivery-container">
        <div class="delivery-header">
            <span class="delivery-tag">INTEGRATION OPTIONS</span>
            <h2 class="delivery-title">Built for Developers & Analysts</h2>
            <p class="delivery-subtitle">Direct integration via REST API or bulk exports for actuarial modeling.</p>
        </div>
        
        <div class="delivery-grid">
            <div>
                <?php include(__DIR__ . '/../components/console-code-block.php'); ?>
            </div>
            <div>
                <?php include(__DIR__ . '/../components/console-export-card.php'); ?>
            </div>
        </div>
        
        <div class="delivery-stats">
            <div class="stats-row">
                <div class="stat-item">
                    <span class="stat-value">99.9%</span>
                    <span class="stat-label">API Uptime</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-value">50M+</span>
                    <span class="stat-label">API Calls/Month</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-value">1TB+</span>
                    <span class="stat-label">Data Served Daily</span>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <span class="stat-value accent">Free</span>
                    <span class="stat-label">Developer Tier</span>
                </div>
            </div>
        </div>
    </div>
</section>
