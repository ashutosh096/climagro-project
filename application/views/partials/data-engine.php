<?php
/**
 * Data Engine Section
 * 
 * Three separate sections for Hazard Intelligence features
 */
?>
<style>
    .hazard-section {
        background: #004d40;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .hazard-section.alt-bg {
        background: #003d33;
    }
    
    .hazard-section.dark-bg {
        background: #00332b;
    }
    
    .hazard-grid-pattern {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(to right, rgba(255,255,255,0.02) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255,255,255,0.02) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
    }
    
    .hazard-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 0 24px;
        position: relative;
        z-index: 10;
    }
    
    .hazard-content {
        display: grid;
        grid-template-columns: 1fr;
        gap: 48px;
        align-items: center;
    }
    
    @media (min-width: 768px) {
        .hazard-content {
            grid-template-columns: 1fr 1fr;
        }
        
        .hazard-content.reverse {
            direction: rtl;
        }
        
        .hazard-content.reverse > * {
            direction: ltr;
        }
    }
    
    .hazard-text {
        max-width: 500px;
    }
    
    .hazard-icon {
        width: 56px;
        height: 56px;
        background: rgba(255, 138, 101, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FF8A65;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
    
    .hazard-title {
        color: white;
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 16px 0;
        line-height: 1.2;
    }
    
    .hazard-description {
        color: #9ca3af;
        font-size: 1.1rem;
        line-height: 1.7;
        margin: 0;
    }
    
    .hazard-visual {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .hazard-visual-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 32px;
        width: 100%;
        max-width: 400px;
        backdrop-filter: blur(10px);
    }

    @media (max-width: 767px) {
        .hazard-title {
            font-size: 1.75rem;
        }
        
        .hazard-description {
            font-size: 1rem;
        }
    }
</style>

<!-- Section Title Header -->
<section class="hazard-section" style="padding-bottom: 0;">
    <div class="hazard-container" style="text-align: center; padding-bottom: 40px;">
        <span style="display: inline-block; background: rgba(242, 106, 33, 0.15); color: #FF8A65; padding: 8px 20px; border-radius: 20px; font-size: 0.9rem; font-weight: 600; margin-bottom: 20px;">The Data Engine</span>
        <h2 style="color: white; font-size: 2.5rem; font-weight: 700; margin: 0;">Climate Risk Intelligence</h2>
    </div>
</section>

<!-- Section 1: 70+ Years of Climate Data -->
<section class="hazard-section">
    <div class="hazard-grid-pattern"></div>
    <div class="hazard-container">
        <div class="hazard-content">
            <div class="hazard-text">
                <div class="hazard-icon">
                    <i class="fas fa-history"></i>
                </div>
                <h2 class="hazard-title">Centennial & Future Horizons</h2>
                <p class="hazard-description">
                    Access 70+ years of historical climate data (1901–2100) seamlessly integrated with future projections. Our comprehensive temporal coverage enables robust trend analysis and future scenario planning.
                </p>
            </div>
            <div class="hazard-visual">
                <div class="hazard-visual-card">
                    <?php include(__DIR__ . '/../components/data-engine/visuals/temporal-visual.php'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Sub-District Granularity -->
<section class="hazard-section alt-bg">
    <div class="hazard-grid-pattern"></div>
    <div class="hazard-container">
        <div class="hazard-content reverse">
            <div class="hazard-text">
                <div class="hazard-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <h2 class="hazard-title">Multi-Level Spatial Coverage</h2>
                <p class="hazard-description">
                    Drill down from national overviews to sub-district precision. Access data at State, District, and Block levels with at-point estimates coming soon. Localized insights for targeted decision-making.
                </p>
            </div>
            <div class="hazard-visual">
                <div class="hazard-visual-card">
                    <?php include(__DIR__ . '/../components/data-engine/visuals/spatial-visual.php'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 3: Compound Hazard Metrics -->
<section class="hazard-section dark-bg">
    <div class="hazard-grid-pattern"></div>
    <div class="hazard-container">
        <div class="hazard-content">
            <div class="hazard-text">
                <div class="hazard-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2 class="hazard-title">Comprehensive Hazard Indices</h2>
                <p class="hazard-description">
                    Monitor key climate risks including Drought, Flood, Heat, Dry/Wet Spells, and Extreme Temperature Days. Understand how multiple hazards impact agricultural and business outcomes.
                </p>
            </div>
            <div class="hazard-visual">
                <div class="hazard-visual-card">
                    <?php include(__DIR__ . '/../components/data-engine/visuals/hazard-visual.php'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
