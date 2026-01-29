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
    
<?php
// Hero Section Data
$hero_data = [
    'tag' => 'Climate Data Intelligence',
    'title' => 'ClimIntellio   ',
    'highlight' => 'Climate Data Platform',
    'description' => 'ClimIntellio Climate Intelligence for Insurance, Banking, Agriculture, ESG & Research. API-ready climate hazard intelligence built from decades of climate data. Scientifically robust. Institution-ready. Hazard, not risk.',
    /*
    'cta_primary' => [
        'text' => 'Request Form →',
        'url' => '#request-demo'
    ],
    */
    'cta_newtab' => [
        'text' => 'Request Form',
        'url' => site_url('climintellio/request-form')
    ],
    'cta_secondary' => [
        'text' => 'Explore Platform →',
        'url' => '#features'
    ],
    'image' => base_url('assest/img/about/AgRI.png')
];
include('components/hero_section.php');
?>

<!-- Data Transformation Section - Hidden for now -->
<?php // include(__DIR__ . '/../components/data-transform-section.php'); ?>

<!-- Data Engine Section -->
<?php include(__DIR__ . '/../partials/data-engine.php'); ?>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-value">170+</div>
            <div class="stat-label">Years of Climate Data</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">25</div>
            <div class="stat-label">Hazard Indices</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">500+</div>
            <div class="stat-label">Districts Covered</div>
            <div style="font-size: 0.8rem; color: #9ca3af; margin-top: 4px;">5000+ subdistricts</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">70–80%</div>
            <div class="stat-label">Data Prep Time Saved</div>
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
include('components/steps_section.php');
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
        ]
    ]
];
include('components/usecases_section.php');
?>

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
<?php include('components/multi-step-form.php'); ?>

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
