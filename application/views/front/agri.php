<?php
include("header.php");
include("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClimIntellio Climate Data Platform | ClimAgro</title>
    <meta name="description" content="Climatics is an AI-enabled Climate Data SaaS platform offering harmonized, high-resolution climate datasets and hazard indices for 500+ districts in India.">
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

        /* Testimonial Section */
        .testimonial-section {
            padding: 4rem 0;
            background: linear-gradient(135deg, #f8fffe 0%, #ffffff 100%);
        }

        .testimonial-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
        }

        .testimonial-quote {
            font-size: 1.5rem;
            color: #1a1a2e;
            line-height: 1.8;
            font-style: italic;
            margin-bottom: 1.5rem;
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--primary-color);
        }

        .testimonial-role {
            font-size: 0.9rem;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .stats-container {
                gap: 2rem;
            }
            
            .stat-value {
                font-size: 2rem;
            }

            .testimonial-quote {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    

<style>
    .ci-hero {
        min-height: 88vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #f8fffe 0%, #e8f5f5 50%, #f0fafa 100%);
        position: relative;
        overflow: hidden;
        padding: 140px 0 3rem 0;
    }
    .ci-hero::before {
        content: '';
        position: absolute;
        top: -50%; right: -20%;
        width: 80%; height: 200%;
        background: radial-gradient(ellipse, rgba(2,91,95,0.08) 0%, transparent 70%);
        pointer-events: none;
    }
    .ci-hero-container {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        align-items: center;
        gap: 4rem;
        position: relative;
        z-index: 1;
    }
    .ci-hero-content { flex: 1; max-width: 580px; }
    .ci-hero-visual  { flex: 1; position: relative; }
    .ci-hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, rgba(2,91,95,0.1), rgba(2,91,95,0.05));
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        color: #025b5f;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(2,91,95,0.15);
    }
    .ci-hero-tag::before {
        content: '';
        width: 8px; height: 8px;
        background: #025b5f;
        border-radius: 50%;
        animation: ci-pulse 2s infinite;
    }
    @keyframes ci-pulse {
        0%,100%{opacity:1;transform:scale(1);}
        50%{opacity:0.5;transform:scale(1.2);}
    }
    .ci-hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: #1a1a2e;
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }
    .ci-hero-title .ci-highlight {
        background: linear-gradient(135deg, #025b5f, #04888e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .ci-hero-desc {
        font-size: 1.1rem;
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 2.5rem;
    }
    .ci-hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; }
    .ci-btn {
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    .ci-btn-primary {
        background: linear-gradient(135deg, #025b5f, #04888e);
        color: white;
        box-shadow: 0 10px 40px rgba(2,91,95,0.3);
    }
    .ci-btn-primary:hover { transform: translateY(-3px); color: white; box-shadow: 0 15px 50px rgba(2,91,95,0.4); }
    .ci-btn-secondary {
        background: white;
        color: #025b5f;
        border: 2px solid rgba(2,91,95,0.25);
    }
    .ci-btn-secondary:hover { border-color: #025b5f; color: #025b5f; transform: translateY(-2px); }
    .ci-hero-img-wrap {
        position: relative;
        animation: ci-float 6s ease-in-out infinite;
    }
    @keyframes ci-float {
        0%,100%{transform:translateY(0);}
        50%{transform:translateY(-16px);}
    }
    .ci-hero-img-wrap img {
        width: 100%;
        max-width: 600px;
        border-radius: 1.5rem;
        box-shadow: 0 25px 80px rgba(2,91,95,0.2);
    }
    @media(max-width:992px){
        .ci-hero{ padding-top:110px; min-height:auto; }
        .ci-hero-container{ flex-direction:column; text-align:center; }
        .ci-hero-content{ max-width:100%; }
        .ci-hero-title{ font-size:2.5rem; }
        .ci-hero-btns{ justify-content:center; }
        .ci-hero-visual{ order:-1; max-width:480px; }
    }
    @media(max-width:576px){
        .ci-hero-title{ font-size:2rem; }
        .ci-btn{ width:100%; justify-content:center; }
    }
</style>

<section class="ci-hero">
    <div class="ci-hero-container">
        <div class="ci-hero-content">
            <div class="ci-hero-tag">Climate Data Intelligence</div>
            <h1 class="ci-hero-title">
                ClimIntellio <span class="ci-highlight">Climate Data Platform</span>
            </h1>
            <p class="ci-hero-desc">
                ClimIntellio Climate Intelligence for Insurance, Banking, Agriculture, ESG &amp; Research. API-ready climate hazard intelligence built from decades of climate data. Scientifically robust. Institution-ready. Hazard, not risk.
            </p>
            <div class="ci-hero-btns">
                <a href="<?php echo site_url('climintellio/request-form'); ?>" class="ci-btn ci-btn-primary" target="_blank">
                    Request Data Access
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/>
                    </svg>
                </a>
                <a href="#features" class="ci-btn ci-btn-secondary">Explore Platform →</a>
            </div>
        </div>
        <div class="ci-hero-visual">
            <div class="ci-hero-img-wrap">
                <img src="<?php echo base_url('assest/img/about/AgRI.png'); ?>"
                     alt="ClimIntellio Climate Data Platform"
                     loading="eager">
            </div>
        </div>
    </div>
</section>


<!-- Data Transformation Section - Hidden for now -->
<?php // include(__DIR__ . '/../components/data-transform-section.php'); ?>

<!-- Data Engine Section -->
<?php include(__DIR__ . '/../partials/data-engine.php'); ?>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-value">70+</div>
            <div class="stat-label">Years (1901–2100)</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">30+</div>
            <div class="stat-label">Climate Indicators</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">500+</div>
            <div class="stat-label">All Districts</div>
            <div style="font-size: 0.8rem; color: #9ca3af; margin-top: 4px;">5000+ subdistricts</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">70–80%</div>
            <div class="stat-label">Reduction in Data Preparation Effort</div>
        </div>
    </div>
</section>


<?php
// How It Works Section Data
$steps_data = [
    'tag' => 'How It Works',
    'title' => 'From Data to Decisions',
    'description' => 'Our streamlined process transforms complex climate data into actionable intelligence for your research and operations.',
    'steps' => [
        [
            'number' => '01',
            'title' => 'Data Harmonization',
            'description' => 'We aggregate and clean climate data from multiple sources — satellite, ground stations, and models — creating consistent datasets.'
        ],
        [
            'number' => '02',
            'title' => 'AI Processing',
            'description' => 'Our algorithms analyze climate patterns and compute various impact-relevant metrics and hazards at various admin boundaries (Such as, sub-district, district, zone, etc.).'
        ],
        [
            'number' => '03',
            'title' => 'Decision-ready information',
            'description' => 'Generate impact-relevant metrics and hazard scores at various admin levels with temporal projections upto 2100.'
        ],
        [
            'number' => '04',
            'title' => 'Instant Delivery',
            'description' => 'Access analysis-ready data via Web Portal, CSV downloads, or seamless API integration.'
        ]
    ]
];
include(__DIR__ . '/components/steps_section.php');
?>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="testimonial-container">
        <p class="testimonial-quote">
            "Climatics transforms complex climate data into ready-to-use intelligence — accessible, reliable, and actionable."
        </p>
        <p class="testimonial-author">— ClimAgro Team</p>
        <p class="testimonial-role">Climate Data Intelligence</p>
    </div>
</section>

<!-- Data Engine Section moved to after Hero -->

<?php
// Use Cases Section Data
$usecases_data = [
    'tag' => 'Who Benefits',
    'title' => 'Built for Climate-Driven Decisions',
    'description' => 'Climatics empowers diverse sectors with harmonized climate and hazard datasets.',
    'items' => [
        [
            'icon' => '<i class="fas fa-university"></i>',
            'title' => 'Research Institutions & Universities',
            'description' => 'Access harmonized, long-term climate hazard intelligence to support reproducible research without the burden of raw data processing.',
            'benefits' => [
                'Faster research cycles with analysis-ready data',
                'Transparent, publication-ready methodologies',
                'Reduced data preparation and duplication of effort'
            ]
        ],
        [
            'icon' => '<i class="fas fa-shield-alt"></i>',
            'title' => 'Insurance & Reinsurance',
            'description' => 'Climate hazard intelligence to support underwriting analysis, portfolio assessment, and parametric product design.',
            'benefits' => [
                'Hazard-informed premium differentiation',
                'Spatial hazard mapping across portfolios',
                'Consistent long-term hazard baselines'
            ]
        ],
        [
            'icon' => '<i class="fas fa-landmark"></i>',
            'title' => 'Banking & Financial Institutions',
            'description' => 'Climate hazard screening to support agricultural lending, portfolio exposure analysis, and climate disclosures.',
            'benefits' => [
                'Climate-informed credit assessment',
                'Portfolio-level hazard screening',
                'Support for climate and ESG disclosures'
            ]
        ],
        [
            'icon' => '<i class="fas fa-seedling"></i>',
            'title' => 'Government & Disaster Management Authorities',
            'description' => 'Climate hazard intelligence to support disaster preparedness, climate adaptation, and public planning at administrative scales.',
            'benefits' => [
                'District- and state-level hazard mapping',
                'Long-term climate trend indicators',
                'Evidence-based support for resilience planning'
            ]
        ],
    ]     
];
$usecase_spotlight = [
    'tag' => 'USE CASE SPOTLIGHT',
    'title' => 'Hydroclimatic Variability & Water Availability — Jhansi, Uttar Pradesh',
    'description' => 'ClimIntellio was used to analyse long-term hydroclimatic trends in Jhansi district, generating district-level rainfall variability, drought frequency, and future water availability projections under SSP scenarios. The study supported evidence-based water resource planning for the region.'
];
?>
<!-- Use Case Spotlight Section -->
<section style="background:#f0fdfa; padding:4rem 2rem;">
    <div style="max-width:900px; margin:0 auto;">
        <span style="color:#025b5f; font-weight:700; font-size:0.85rem; letter-spacing:2px; text-transform:uppercase;">USE CASE SPOTLIGHT</span>
        <h2 style="font-size:1.8rem; font-weight:800; color:#1e293b; margin:1rem 0;">Hydroclimatic Variability & Water Availability — Jhansi, Uttar Pradesh</h2>
        <p style="font-size:1.1rem; color:#475569; line-height:1.8;">ClimIntellio was used to analyse long-term hydroclimatic trends in Jhansi district, generating district-level rainfall variability, drought frequency, and future water availability projections under SSP scenarios. The study supported evidence-based water resource planning for the region.</p>
    </div>
</section>
<?php include(__DIR__ . '/components/usecases_section.php'); ?>

<?php
// CTA Form Section Data - Hidden for now
/*
$cta_data = [
    'tag' => 'Get Started',
    'title' => 'Ready to Access Climate Intelligence?',
    'description' => 'Submit your data requirements and our team will provide a customized solution. Institutional subscriptions start at ₹1,00,000/year.',
    'form_action' => site_url('contact/submit'),
    'product_name' => 'Climatics'
];
include('components/cta_form_section.php');
*/
?>



</main>
</div>
<!-- Multi-Step Form Modal -->
<?php include(__DIR__ . '/components/multi-step-form.php'); ?>

<?php include("footer.php"); ?>

<script src="<?php echo base_url('assest/js/vendor/jquary-3.6.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/vendor/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/swiper.min.js'); ?>"></script>
<script src="<?php echo base_url('assest/js/main.js'); ?>"></script>

<script>
// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Intersection Observer for fade-in animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

document.querySelectorAll('.feature-card, .step-card, .usecase-card, .stat-item').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'all 0.6s ease';
    observer.observe(el);
});
</script>

</body>
</html>
