<?php
include("header.php");
include("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CropRisk.ai – Agriculture Risk Intelligence | ClimAgro Analytics</title>
    <meta name="description" content="CropRisk.ai is an AI-driven agricultural climate risk platform. Get crop-specific risk scores, yield projections, and forward-looking assessments at district and farm level.">
    <style>
        :root {
            --primary-color: #025b5f;
            --accent: #f26a21;
        }

        html, body {
            overflow-x: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar, body::-webkit-scrollbar {
            display: none;
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 3rem 0;
            border-bottom: 1px solid rgba(2, 91, 95, 0.08);
        }

        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: center;
            gap: 4rem;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6b7280;
            font-weight: 500;
        }

        /* Features Section */
        .features-section {
            padding: 5rem 0;
            background: #f8fafc;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .features-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(2, 91, 95, 0.08);
            color: var(--primary-color);
            padding: 0.5rem 1.25rem;
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            margin-bottom: 1.5rem;
        }

        .features-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .feature-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .feature-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .feature-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 10px 25px rgba(2, 91, 95, 0.1);
            transform: translateY(-4px);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: rgba(2, 91, 95, 0.1);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: var(--primary-color);
            font-size: 1.25rem;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            font-size: 0.95rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* Who Benefits Section */
        .benefits-section {
            padding: 5rem 0;
            background: white;
        }

        .benefits-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .benefits-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .benefit-card {
            background: #f8fafc;
            border-radius: 1rem;
            padding: 1.75rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .benefit-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .benefit-card:hover {
            border-color: var(--primary-color);
            box-shadow: 0 10px 25px rgba(2, 91, 95, 0.1);
            transform: translateY(-4px);
        }

        .benefit-icon {
            width: 56px;
            height: 56px;
            background: var(--primary-color);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .benefit-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }

        .benefit-desc {
            font-size: 0.95rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .benefit-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .benefit-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .benefit-list li::before {
            content: '✓';
            color: var(--primary-color);
            font-weight: 700;
            flex-shrink: 0;
        }

        /* How It Works Section */
        .how-section {
            padding: 5rem 0;
            background: #f8fafc;
        }

        .how-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .how-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .how-step {
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }

        .how-step.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .how-number {
            font-size: 3rem;
            font-weight: 800;
            color: rgba(2, 91, 95, 0.15);
            margin-bottom: 1rem;
        }

        .how-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }

        .how-desc {
            font-size: 0.9rem;
            color: #64748b;
            line-height: 1.6;
        }

        /* Tech Brief Section */
        .tech-brief {
            background: rgba(2, 91, 95, 0.04);
            border: 1px solid rgba(2, 91, 95, 0.15);
            border-radius: 1rem;
            padding: 1.5rem 2rem;
            margin: 2rem 0;
        }

        .tech-brief-title {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary-color);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .tech-brief ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .tech-brief ul li {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            font-size: 0.95rem;
            color: #475569;
            margin-bottom: 0.75rem;
            line-height: 1.5;
        }

        .tech-brief ul li::before {
            content: '→';
            color: var(--primary-color);
            font-weight: 700;
            flex-shrink: 0;
        }

        /* CTA Band */
        .cta-band {
            background: linear-gradient(135deg, var(--primary-color), #036c70);
            padding: 4rem 2rem;
            text-align: center;
            color: white;
        }

        .cta-band h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-band p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* FAQ Section */
        .faq-section {
            padding: 5rem 0;
            background: white;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .faq-item {
            border-bottom: 1px solid #e2e8f0;
            padding: 1.5rem 0;
        }

        .faq-question {
            font-size: 1.05rem;
            font-weight: 600;
            color: #1e293b;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-answer {
            font-size: 0.95rem;
            color: #64748b;
            line-height: 1.7;
            margin-top: 1rem;
            display: none;
        }

        .faq-answer.open {
            display: block;
        }

        /* Btn styles matching existing */
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
            color: white;
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
        }

        .btn-white {
            background: white;
            color: var(--primary-color);
            border: 2px solid white;
        }

        .btn-white:hover {
            background: transparent;
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-white {
            background: transparent;
            color: white;
            border: 2px solid rgba(255,255,255,0.5);
        }

        .btn-outline-white:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
            transform: translateY(-2px);
        }

        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: flex-start;
            align-items: center;
        }

        /* Fade in */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 768px) {
            .stats-container { gap: 2rem; }
            .stat-value { font-size: 2rem; }
            .features-title { font-size: 1.75rem; }
            .how-grid { grid-template-columns: 1fr 1fr; }
            .cta-band h2 { font-size: 1.5rem; }
            .buttons-container { justify-content: center; }
        }

        @media (max-width: 480px) {
            .how-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<?php
// Hero Section Data
$hero_data = [
    'tag' => 'Agriculture Risk Intelligence',
    'title' => 'CropRisk.ai',
    'highlight' => 'Agriculture Risk Intelligence',
    'description' => 'CropRisk.ai is an AI-driven agricultural risk platform that estimates crop and location-specific climate risks by integrating climate stress metrics, crop response models, and field management data. It enables forward-looking, predictive assessment of agricultural climate risk across time and space — from season-level outlooks to long-term projections to 2100.',
    'cta_newtab' => [
        'text' => 'Request a Demo',
        'url' => site_url('contact-us')
    ],
    'cta_secondary' => [
        'text' => 'Explore Features ↓',
        'url' => '#features'
    ],
    'image' => base_url('assest/img/about/AgRI.png')
];
include('components/hero_section.php');
?>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-value">20+</div>
            <div class="stat-label">Crops Covered</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">District+</div>
            <div class="stat-label">Block Level Spatial Resolution</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">Historical</div>
            <div class="stat-label">to 2100 Temporal Range</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">AI/ML</div>
            <div class="stat-label">+ Crop Model Technology</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">VaR &</div>
            <div class="stat-label">Expected Loss Estimates</div>
        </div>
    </div>
</section>

<!-- What is CropRisk.ai Section -->
<section style="padding: 5rem 0; background: white;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div class="fade-in">
                <div class="features-tag">
                    <i class="fas fa-seedling"></i> What is CropRisk.ai?
                </div>
                <h2 style="font-size: 2rem; font-weight: 700; color: #1e293b; margin-bottom: 1.5rem;">Predictive Agriculture Risk Intelligence, Powered by AI</h2>
                <p style="font-size: 1.05rem; color: #64748b; line-height: 1.7; margin-bottom: 1.5rem;">
                    CropRisk.ai combines crop-specific AI/ML models with scientific crop growth simulations to estimate climate risk at the intersection of where a crop is grown, how sensitive that crop is to climate stress, and what climate conditions are projected for that location.
                </p>
                <p style="font-size: 1.05rem; color: #64748b; line-height: 1.7; margin-bottom: 2rem;">
                    Unlike generic climate indices, CropRisk.ai accounts for crop phenology, growth stages, and management practices — giving risk estimates that are directly actionable for farmers, lenders, insurers, and agribusinesses.
                </p>
                <div class="tech-brief">
                    <div class="tech-brief-title">Tech Brief</div>
                    <ul>
                        <li>Crop and location-specific AI/ML models trained on historical climate, yield, and management datasets</li>
                        <li>Hybrid approach integrating data-driven ML with physics-based crop growth models</li>
                        <li>Historical and scenario-based short, medium, and long-term climate risk estimates</li>
                        <li>Risk attribution: separates contributions from hazard intensity, crop sensitivity, and geographic exposure</li>
                    </ul>
                </div>
            </div>
            <div class="fade-in">
                <div style="background: #f8fafc; border-radius: 1rem; padding: 2rem; border: 1px solid #e2e8f0;">
                    <img src="<?php echo base_url('assest/img/about/AgRI.png'); ?>" alt="CropRisk.ai Dashboard" style="width: 100%; border-radius: 0.75rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Platform Features Section -->
<section class="features-section" id="features">
    <div class="features-container">
        <div class="features-header">
            <div class="features-tag">
                <i class="fas fa-th-large"></i> Platform Features
            </div>
            <h2 class="features-title">Everything You Need for Agricultural Risk Intelligence</h2>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-chart-bar"></i></div>
                <div class="feature-title">Risk Score & Classification</div>
                <div class="feature-desc">Crop and location-specific risk score from Low to Very High, with historical context and benchmarking against district averages.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-map-marked-alt"></i></div>
                <div class="feature-title">Spatial Exposure Mapping</div>
                <div class="feature-desc">Map of crop area under each risk level, with identification of the highest-exposure geographies within a portfolio.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-dollar-sign"></i></div>
                <div class="feature-title">Value at Risk (VaR) & Expected Loss</div>
                <div class="feature-desc">Quantified financial exposure estimates — VaR and expected loss — enabling actuarial-grade risk pricing.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="feature-title">Dominant Hazard Attribution</div>
                <div class="feature-desc">Identifies which climate hazard (drought, heat stress, excess rain, cold stress) is the primary driver of risk for each crop-location.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-calendar-alt"></i></div>
                <div class="feature-title">Short, Medium & Long-term Projections</div>
                <div class="feature-desc">Risk projections at seasonal, decadal, and centennial horizons across SSP1-2.6, SSP2-4.5, SSP3-7.0, and SSP5-8.5 climate scenarios.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-history"></i></div>
                <div class="feature-title">Historical Risk Trends</div>
                <div class="feature-desc">Multi-decade analysis of how risk has evolved, including variability, persistence, and emerging hotspots.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-seedling"></i></div>
                <div class="feature-title">Yield Stability Index</div>
                <div class="feature-desc">Measures inter-annual yield variability to assess reliability of production from a given location under current and future climate.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-sync-alt"></i></div>
                <div class="feature-title">Crop Rotation Index</div>
                <div class="feature-desc">Evaluates the suitability of alternative crops as a risk management strategy, supporting adaptation planning.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-layer-group"></i></div>
                <div class="feature-title">Portfolio Risk Aggregation</div>
                <div class="feature-desc">Roll up district-level risks into state, regional, or national portfolio views for banks and insurers.</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-balance-scale"></i></div>
                <div class="feature-title">Relative Risk Benchmarking</div>
                <div class="feature-desc">Compare risk across crops, districts, or time periods on a normalised scale.</div>
            </div>
        </div>
    </div>
</section>

<!-- Who Benefits Section -->
<section class="benefits-section">
    <div class="benefits-container">
        <div class="benefits-header">
            <div class="features-tag">
                <i class="fas fa-users"></i> Who Benefits
            </div>
            <h2 class="features-title">Built for Every Stakeholder in the Agricultural Value Chain</h2>
        </div>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon"><i class="fas fa-landmark"></i></div>
                <div class="benefit-title">Banks & Financial Institutions</div>
                <div class="benefit-desc">Integrate agricultural climate risk into credit scoring, loan provisioning, and portfolio stress testing. Support BRSR and TNFD climate disclosure requirements.</div>
                <ul class="benefit-list">
                    <li>Climate-informed agricultural lending</li>
                    <li>Portfolio-level crop risk exposure mapping</li>
                    <li>Expected loss estimates for provisioning</li>
                </ul>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon"><i class="fas fa-shield-alt"></i></div>
                <div class="benefit-title">Insurance & Reinsurance</div>
                <div class="benefit-desc">Develop risk-differentiated products and improve underwriting accuracy with granular, location-specific hazard data.</div>
                <ul class="benefit-list">
                    <li>Parametric product design using hazard indices</li>
                    <li>Spatial risk mapping across insured areas</li>
                    <li>Long-term actuarial baseline for product pricing</li>
                </ul>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon"><i class="fas fa-tractor"></i></div>
                <div class="benefit-title">Agribusinesses</div>
                <div class="benefit-desc">Use CropRisk.ai to identify high-risk sourcing regions, forecast yields, optimise procurement, and strengthen contract negotiations.</div>
                <ul class="benefit-list">
                    <li>Pre-harvest supply forecasting</li>
                    <li>Climate risk screening for sourcing geographies</li>
                    <li>Commodity price volatility risk assessment</li>
                </ul>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon"><i class="fas fa-university"></i></div>
                <div class="benefit-title">Government Agencies</div>
                <div class="benefit-desc">Support evidence-based policy formulation, agricultural subsidy targeting, and climate adaptation planning at state and district levels.</div>
                <ul class="benefit-list">
                    <li>District-level crop vulnerability mapping</li>
                    <li>Identification of intervention hotspots</li>
                    <li>Scenario-based planning for climate adaptation</li>
                </ul>
            </div>
            <div class="benefit-card">
                <div class="benefit-icon"><i class="fas fa-leaf"></i></div>
                <div class="benefit-title">Seed Industry</div>
                <div class="benefit-desc">Inform the development and positioning of climate-resilient crop varieties using forward-looking risk analytics.</div>
                <ul class="benefit-list">
                    <li>Identify stress conditions driving demand for resilient varieties</li>
                    <li>Map high-risk geographies for targeted seed deployment</li>
                    <li>Validate variety performance under future climate scenarios</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-section">
    <div class="how-container">
        <div class="features-header">
            <div class="features-tag">
                <i class="fas fa-cogs"></i> How It Works
            </div>
            <h2 class="features-title">How CropRisk.ai Works</h2>
        </div>
        <div class="how-grid">
            <div class="how-step">
                <div class="how-number">01</div>
                <div class="how-title">Data Ingestion</div>
                <div class="how-desc">Climate, crop yield, soil, and farm management data are collected from satellite, ground stations, and government sources and harmonised.</div>
            </div>
            <div class="how-step">
                <div class="how-number">02</div>
                <div class="how-title">AI/ML Risk Modelling</div>
                <div class="how-desc">Crop and location-specific models estimate climate risk scores by integrating climate stress exposure, crop sensitivity, and management factors.</div>
            </div>
            <div class="how-step">
                <div class="how-number">03</div>
                <div class="how-title">Risk Attribution & Scoring</div>
                <div class="how-desc">Output includes risk score, risk class, dominant hazard, VaR, expected loss, yield stability index, and crop rotation recommendations.</div>
            </div>
            <div class="how-step">
                <div class="how-number">04</div>
                <div class="how-title">Delivery</div>
                <div class="how-desc">Results delivered via web dashboard, CSV/Excel exports, geospatial maps, and API for integration into enterprise lending or insurance systems.</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Band -->
<section class="cta-band">
    <h2>Ready to de-risk your agricultural portfolio?</h2>
    <p>See how CropRisk.ai turns climate uncertainty into actionable risk intelligence.</p>
    <div class="cta-buttons">
        <a href="javascript:void(0);" class="btn btn-white open-walkthrough-modal">
            Book a Demo
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
        <a href="<?php echo site_url('contact-us'); ?>" class="btn btn-outline-white">
            Download Product Brief
        </a>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="faq-container">
        <div class="features-header" style="margin-bottom: 2rem;">
            <div class="features-tag">
                <i class="fas fa-question-circle"></i> FAQ
            </div>
            <h2 class="features-title">Frequently Asked Questions</h2>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                Which crops does CropRisk.ai cover?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                CropRisk.ai supports 20+ major crops including rice, wheat, maize, soybean, sugarcane, cotton, pulses, and several horticulture crops. Coverage is being expanded continuously. Contact us if you need a specific crop not listed.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                At what spatial resolution is data available?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Risk estimates are available at district level across all of India. Sub-district (block/tehsil) level data is available for select states and is being expanded. Point-level estimates are available on request for enterprise clients.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                How is CropRisk.ai different from a generic crop model or weather forecast?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                CropRisk.ai is not a weather forecast. It is a risk intelligence platform. It integrates multi-decadal climate data with crop-specific models to produce risk scores, financial loss estimates, and forward projections — outputs designed for business decision-making, not farm operations.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                Can CropRisk.ai be integrated into our existing systems?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Yes. CropRisk.ai risk outputs can be delivered via API for integration into lending systems, insurance underwriting platforms, and commodity trading workflows. We support CSV, JSON, and standard geospatial formats.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                How frequently is the data updated?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Historical risk baselines are updated annually. Seasonal risk outlooks are updated at the start of each crop season. Future projections use the latest CMIP6 scenario outputs.
            </div>
        </div>
    </div>
</section>

</main>
</div>

<!-- Multi-Step Form Modal -->
<?php include('components/multi-step-form.php'); ?>

<?php include("footer.php"); ?>

<script src="<?php echo base_url('assest/js/vendor/jquary-3.6.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/vendor/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/swiper.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/main.js'); ?>"></script>

<script>
// FAQ Toggle
function toggleFaq(el) {
    const answer = el.nextElementSibling;
    const icon = el.querySelector('i');
    answer.classList.toggle('open');
    icon.style.transform = answer.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0)';
}

// Intersection Observer for animations
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('.feature-card, .benefit-card, .how-step, .fade-in, .stat-item').forEach(el => {
    observer.observe(el);
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});
</script>

</body>
</html>
