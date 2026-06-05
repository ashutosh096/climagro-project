<?php echo "CORRECT FILE LOADED"; ?>
<?php
include("header.php");
include("navbar2.php");
?>

<!-- Consolidated Styles -->
<style>
    /* About Section Styles */
    .xb-item--img img {
        width: 100%;
        height: 250px;
        /* max-height: 400px; */
        object-fit: cover;
        border-radius: 10px;
        display: block;
    }

    .bg-gradient-quartz-white {
        background: linear-gradient(180deg, #ffffff 0%, #f0f9f4 100%);
        padding: 100px 0 50px; /* matched large spacing from original screenshot */
    }

    .about-wrap {
        padding-right: 30px;
        margin-top: 24px; /* added space above ClimAgro section */
    }

    .xb-item--title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #025b5f;
        margin-bottom: 1rem;
    }

    .about-wrap h3 {
        font-size: 1.75rem;
        color: #025b5f;
        font-weight: 600;
    }

    .xb-item--content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #025b5f;
        margin-bottom: 1rem; /* reduced spacing after story */
    }

    .feature-block {
        display: flex;
        gap: 1.25rem;
        padding: 1.75rem;
        background: white;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.08);
        position: relative;
        overflow: hidden;
    }

    .feature-block:hover {
        transform: translateY(-5px) scale(1.01);
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.04);
        border-color: rgba(0, 0, 0, 0.12);
    }

    .feature-block:hover::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #3b82f6, #10b981);
    }

    .feature-icon {
        font-size: 1.5rem;
        color: #025b5f;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(45, 125, 70, 0.1);
        border-radius: 8px;
    }

    .feature-content h4 {
        color: #025b5f;
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
    }

    .about-image {
        position: relative;
        padding: 20px;
    }

    .image-decoration {
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 20px;
        z-index: -1;
    }

    .decoration-top-left {
        background: rgba(242, 106, 33, 0.1);
        top: 0;
        left: 0;
    }

    .decoration-bottom-right {
        background: rgba(45, 125, 70, 0.1);
        bottom: 0;
        right: 0;
    }

    .fade-in-left {
        opacity: 0;
        transform: translateX(-20px);
    }

    .fade-in-right {
        opacity: 0;
        transform: translateX(20px);
    }

    .fade-in-active {
        opacity: 1;
        transform: translateX(0);
        transition: all 0.6s ease;
    }

    .title-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 15px;
    }

    .main-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #025b5f;
        margin: 0 6px; /* Tighter horizontal margin so corners sit close to text */
        display: inline-block;
    }

    .subtitle-text {
        font-size: 1.1rem;
        letter-spacing: 2px;
        color: #4a5568;
        margin: 0;
    }

    .xb-team {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        background: #f0f9f4;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
        transition: transform 0.3s ease;
        min-height: 0; /* allow content-driven height */
    }

    /* Ensure team cards in the grid are equal height */
    .xb-team-right > [class*="col-"] {
        display: flex;
    }

    .xb-team {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
    }

    .xb-item--holder {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    .xb-item--holder {
            padding: 0rem 0;
            flex-grow: 1; /* Allow the holder to grow and fill available space */
            display: flex;
            flex-direction: column;
            gap: 0rem; /* Consistent spacing between elements */
        }

        .xb-item--sub-title {
            font-size: 0.9rem;
            color: #4a5568;
            display: block;
            margin-bottom: 0.25rem;
            overflow-wrap: break-word; /* Allow long words to break and wrap */
            max-height: 150px; /* Optional: Limit height to prevent excessive stretching */
            overflow-y: auto; /* Add scrollbar if content exceeds max-height */
            padding-top: 0px;
        }

        .xb-team:hover {
            transform: translateY(-5px);
        }

        /* Ensure image and holder align properly */
        .xb-item--img {
            margin-bottom: 1rem; /* Add spacing between image and content */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .xb-item--sub-title {
                max-height: 120px; /* Reduce max-height on mobile for better fit */
            }
        }

    .value-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .value-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .value-icon {
        width: 70px;
        height: 70px;
        background: rgba(45, 125, 70, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
    }

    .value-icon i {
        font-size: 2rem;
        color: #025b5f;
    }

    .value-card h3 {
        color: #025b5f;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .value-card p {
        color: #4a5568;
        margin: 0;
    }

    .mission-vision-container {
        display: flex;
        justify-content: space-between;
        gap: 2rem;
        width: 100%;
        max-width: 1200px;
        margin: 2rem auto 0; /* tightened space after story */
        padding: 0 1rem;
    }

    .feature-column {
        flex: 1;
        display: flex;
        align-items: flex-start;
    }
    .corner-decoration {
            font-size: 2rem;
            color: #f26a21;
            position: relative;
            top: -6px;
    }


    .feature-block {
        display: flex;
        gap: 1.5rem;
        width: 100%;
    }

    .feature-icon {
        font-size: 1.8rem;
        color: #2e7d32;
        min-width: 40px;
    }

    .feature-content {
        flex: 1;
    }

    .feature-content h4 {
        margin-top: 0;
        margin-bottom: 0.8rem;
        font-size: 1.25rem;
    }

    .feature-text {
        margin: 0;
        line-height: 1.6;
        color: #555;
    }

    /* Team Section Styles */
    .team {
        padding: 140px 0 80px;
    }

    .section-title {
        text-align: center;
        padding-bottom: 35px;
    }

    /* Responsive Styles */
    @media (max-width: 991px) {
        .about-wrap {
            padding-right: 0;
            margin-bottom: 3rem;
        }

        .bg-gradient-quartz-white {
            padding: 80px 0;
        }

        .mission-vision-container {
            gap: 1.5rem;
        }

        .feature-block {
            gap: 1.2rem;
        }

        .feature-icon {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 768px) {
        .xb-item--title {
            font-size: 2rem;
        }

        .about-wrap h3 {
            font-size: 1.5rem;
        }

        .section-header {
            margin-bottom: 60px;
        }

        .corner-decoration {
            font-size: 2rem;
            color: #f26a21;
            position: relative;
            top: -6px;
        }


        .title {
            font-size: 2rem;
        }

        .subtitle {
            font-size: 1.5rem;
        }

        .value-card {
            margin-bottom: 2rem;
        }

        .mission-vision-container {
            flex-direction: column;
            gap: 2rem;
        }

        .feature-block {
            gap: 1.5rem;
        }

        .feature-icon {
            font-size: 1.7rem;
            min-width: 36px;
        }
    }

    /* ============ MOBILE FIXES ============ */
    @media (max-width: 767px) {
        /* img 3: Fix corner bracket alignment with title */
        .title-wrapper {
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 0.5rem;
            margin: 0 auto 15px !important;
        }
        .main-title {
            font-size: clamp(1.6rem, 6vw, 2.2rem) !important;
            margin: 0 !important;
            display: inline !important;
        }
        .corner-decoration {
            font-size: 1.5rem !important;
            position: static !important;
            top: auto !important;
            line-height: 1 !important;
            flex-shrink: 0;
        }
        /* Core Values section top spacing on mobile */
        .values-section {
            padding-top: 3rem !important;
            padding-bottom: 3rem !important;
        }
        /* value card spacing */
        .value-card {
            margin-bottom: 1rem !important;
        }
        /* About section */
        .bg-gradient-quartz-white {
            padding: 5rem 0 2rem !important;
        }
        .xb-item--title {
            font-size: clamp(1.4rem, 5vw, 2rem) !important;
        }
    }

    @media (max-width: 480px) {
        .feature-block {
            gap: 1rem;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .feature-content h4 {
            margin-bottom: 0.5rem;
        }
        .feature-icon {
            margin-bottom: 0.5rem;
        }
    }
</style>


<!-- About Section -->
<section class="about-section bg-gradient-quartz-white">
    <div class="container">
        <!-- Our Story -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="title-wrapper">
                <span class="corner-decoration" style="position: relative; top: -10px;">⌜</span>
                <h2 class="main-title">Our Story</h2>
                <span class="corner-decoration" style="position: relative; top: 6px;"></span>
            </div>
            <p class="subtitle-text">WHO WE ARE</p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-wrap fade-in-left">
                    <h2 class="xb-item--title">ClimAgro Analytics</h2>
                   <p class="xb-item--content" style="text-align: justify; text-justify: inter-word;">ClimAgro Analytics is a research-driven AI startup specializing in climate risk intelligence. Our models analyze vast datasets on climate, agriculture, and socio-demographics to assess climate risks and crop-specific yield projections across past, present, and future periods. While our core expertise lies in agriculture, we also support climate-smart cities and sustainability planning, addressing broader climate challenges. By integrating advanced analytics with scientific research, we provide high-resolution risk assessments to help businesses and policymakers anticipate and mitigate climate risks effectively.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-image fade-in-right">
                    <div class="image-decoration decoration-top-left"></div>
                    <img class="w-100 rounded shadow-lg" src="<?= base_url() ?>assest/img/about/intelligence.jpg" alt="ClimAgro Analytics">
                    <div class="image-decoration decoration-bottom-right"></div>
                </div>
            </div>
        </div>

        <!-- Mission and Vision -->
        <div class="mission-vision-container">
            <div class="feature-column">
                <div class="feature-block">
                    <div class="feature-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Our Mission</h4>
                        <p class="feature-text">
                            To strengthen climate adaptation and resilience across agriculture and other climate-sensitive sectors.
                        </p>
                    </div>
                </div>
            </div>
            <div class="feature-column">
                <div class="feature-block">
                    <div class="feature-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Our Vision</h4>
                        <p class="feature-text">
                            To monitor, digitize, and optimize climate-sensitive systems, from farms to urban landscapes.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="values-section bg-light py-120">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="title-wrapper">
                <span class="corner-decoration" style="position: relative; top: -10px;">⌜</span>
                <h2 class="main-title">Our Core Values</h2>
                <span class="corner-decoration" style="position: relative; top: 6px;"></span>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3>Data Integrity</h3>
                    <p>We ensure accuracy and reliability in all our climate and agricultural data analysis.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Scientific Rigor</h3>
                    <p>Our solutions are built on peer-reviewed research and validated methodologies.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Sustainability</h3>
                    <p>We promote sustainable practices through climate-smart recommendations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- team section start -->
<section class="team pt-140 pb-80">
    <div class="container">
        <div class="section-title pb-35">
            <div class="title-wrapper">
                <span class="corner-decoration" style="position: relative; top: -10px;">⌜</span>
                <h1 class="main-title">Meet Our Team</h1>
                <span class="corner-decoration" style="position: relative; top: 6px;"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row xb-team-right">
                    <?php foreach ($teamlist as $team) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                            <div class="xb-team text-center">
                                <div class="xb-item--img">
                                    <img src="<?= base_url() ?>assest/uploadfile/webimages/<?= $team->image ?>" alt="<?= $team->name ?>" onerror="this.onerror=null;this.src='<?= base_url() ?>assest/uploadfile/webimages/noimage.png';">
                                </div>
                                <div class="xb-item--holder">
                                    <div class="linkedin-wrapper">
                                        <a class="xb-item--link" href="<?php echo $team->linkdine; ?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                    <h2 class="xb-item--title"><?php echo $team->name; ?></h2>
                                    <span class="xb-item--sub-title"><?php echo $team->designation; ?></span><br>
                                    <span class="xb-item--sub-title">
                                        <?php echo $team->content; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Mentor Section -->
<section class="team pt-0 pb-80">
    <div class="container">
        <div class="section-title pb-35">
            <div class="title-wrapper">
                <span class="corner-decoration" style="position: relative; top: -10px;">⌜</span>
                <h1 class="main-title">Our Advisors</h1>
                <span class="corner-decoration" style="position: relative; top: 6px;"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row xb-team-right">
                    <?php foreach ($aluminilist as $alumini) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                            <div class="xb-team text-center">
                                <div class="xb-item--img">
                                    <img src="<?= base_url() ?>assest/uploadfile/webimages/<?= $alumini->image ?>" alt="<?= $alumini->name ?>" onerror="this.onerror=null;this.src='<?= base_url() ?>assest/uploadfile/webimages/noimage.png';">
                                </div>
                                <div class="xb-item--holder">
                                    <div class="linkedin-wrapper">
                                        <a class="xb-item--link" href="<?php echo $alumini->linkdine; ?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                    <h2 class="xb-item--title"><?php echo $alumini->name; ?></h2>
                                    <span class="xb-item--sub-title"><?php echo $alumini->designation; ?></span><br>
                                    <span class="xb-item--sub-title"><?php echo $alumini->content; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for Animations -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-active');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in-left, .fade-in-right').forEach(el => observer.observe(el));
});
</script>

<?php include("footer.php"); ?>