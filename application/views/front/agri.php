<?php
include("header.php");
include("navbar2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgRI.ai - Agriculture Risk Intelligence | Climagro</title>
    <meta name="description" content="AgRI.ai is a crop-location-specific risk estimator using AI and machine learning to analyze crop-climate interactions. Get historical, current, and long-term risk assessments.">
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
    'tag' => 'Agriculture Risk Intelligence',
    'title' => 'Transform Climate Risk into ',
    'highlight' => 'Agricultural Intelligence',
    'description' => 'AgRI.ai is a crop-location-specific risk estimator that uses AI and machine learning to analyze crop-climate interactions through historical data. Make smarter decisions with historical, current, short-term, medium-term, and long-term risk assessments.',
    'cta_primary' => [
        'text' => 'Request a Demo',
        'url' => '#request-demo'
    ],
    'cta_secondary' => [
        'text' => 'Learn More',
        'url' => '#features'
    ],
    'image' => base_url('assest/img/about/AgRI.png')
];
include('components/hero_section.php');
?>

<!-- Data Transformation Section -->
<?php include(__DIR__ . '/../components/data-transform-section.php'); ?>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-value">30+</div>
            <div class="stat-label">Years of Climate Data</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">100+</div>
            <div class="stat-label">Crop Types Analyzed</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">500+</div>
            <div class="stat-label">Districts Covered</div>
        </div>
        <div class="stat-item">
            <div class="stat-value">95%</div>
            <div class="stat-label">Forecast Accuracy</div>
        </div>
    </div>
</section>


<?php
// How It Works Section Data
$steps_data = [
    'tag' => 'How It Works',
    'title' => 'From Data to Decisions',
    'description' => 'Our streamlined process transforms complex climate data into actionable agricultural intelligence.',
    'steps' => [
        [
            'number' => '01',
            'title' => 'Data Integration',
            'description' => 'We aggregate climate data, satellite imagery, soil information, and historical crop records from multiple sources.'
        ],
        [
            'number' => '02',
            'title' => 'AI Processing',
            'description' => 'Our ML models analyze crop-climate relationships and identify risk patterns specific to your location.'
        ],
        [
            'number' => '03',
            'title' => 'Risk Assessment',
            'description' => 'Generate comprehensive risk scores across multiple time horizons with confidence intervals.'
        ],
        [
            'number' => '04',
            'title' => 'Actionable Insights',
            'description' => 'Receive clear recommendations and alerts to optimize planting, irrigation, and risk mitigation strategies.'
        ]
    ]
];
include('components/steps_section.php');
?>

<?php
// Use Cases Section Data
$usecases_data = [
    'tag' => 'Who Benefits',
    'title' => 'Built for the Entire Agricultural Ecosystem',
    'description' => 'AgRI.ai empowers stakeholders across the agricultural value chain with data-driven risk intelligence.',
    'items' => [
        [
            'icon' => '<i class="fas fa-tractor"></i>',
            'title' => 'Farmers & Agribusinesses',
            'description' => 'Make informed decisions about crop selection, planting schedules, and resource allocation.',
            'benefits' => [
                'Optimize planting and harvesting timing',
                'Reduce crop losses from weather events',
                'Improve yield forecasting accuracy'
            ]
        ],
        [
            'icon' => '<i class="fas fa-landmark"></i>',
            'title' => 'Insurance Companies',
            'description' => 'Enhance underwriting accuracy and develop innovative parametric insurance products.',
            'benefits' => [
                'Data-driven premium pricing',
                'Faster claims assessment',
                'Reduced information asymmetry'
            ]
        ],
        [
            'icon' => '<i class="fas fa-university"></i>',
            'title' => 'Financial Institutions',
            'description' => 'Assess agricultural credit risk and support sustainable lending practices.',
            'benefits' => [
                'Improved credit risk models',
                'Portfolio climate risk analysis',
                'ESG compliance support'
            ]
        ],
        [
            'icon' => '<i class="fas fa-balance-scale"></i>',
            'title' => 'Government & Policymakers',
            'description' => 'Design evidence-based agricultural policies and disaster preparedness programs.',
            'benefits' => [
                'Early warning for food security',
                'Targeted subsidy allocation',
                'Climate adaptation planning'
            ]
        ]
    ]
];
include('components/usecases_section.php');
?>

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="testimonial-container">
        <p class="testimonial-quote">
            "AgRI.ai has transformed how we assess crop insurance risk. The location-specific insights have helped us reduce claim disputes by 40% while offering better coverage to farmers."
        </p>
        <p class="testimonial-author">— Agricultural Insurance Executive</p>
        <p class="testimonial-role">Leading Crop Insurance Provider</p>
    </div>
</section>

<!-- Data Engine Section -->
<?php include(__DIR__ . '/../partials/data-engine.php'); ?>


<?php
// CTA Form Section Data
$cta_data = [
    'tag' => 'Get Started',
    'title' => 'Ready to Transform Your Agricultural Risk Management?',
    'description' => 'Schedule a personalized demo to see how AgRI.ai can help you make smarter, data-driven decisions for your agricultural operations.',
    'form_action' => site_url('contact/submit'),
    'product_name' => 'AgRI.ai'
];
include('components/cta_form_section.php');
?>

</main>
</div>
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
