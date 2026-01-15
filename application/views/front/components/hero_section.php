<?php
/**
 * Hero Section Component
 * 
 * Usage: 
 * $hero_data = ['tag' => '...', 'title' => '...', 'highlight' => '...', 'description' => '...', 'cta_primary' => [...], 'cta_secondary' => [...], 'image' => '...'];
 * include('components/hero_section.php');
 */
?>
<style>
    .hero-section {
        min-height: 90vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #f8fffe 0%, #e8f5f5 50%, #f0fafa 100%);
        position: relative;
        overflow: hidden;
        padding: 6rem 0;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 80%;
        height: 200%;
        background: radial-gradient(ellipse, rgba(2, 91, 95, 0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        align-items: center;
        gap: 4rem;
        position: relative;
        z-index: 1;
    }

    .hero-content {
        flex: 1;
        max-width: 600px;
    }

    .hero-visual {
        flex: 1;
        position: relative;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, rgba(2, 91, 95, 0.1), rgba(2, 91, 95, 0.05));
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--primary-color);
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(2, 91, 95, 0.15);
        backdrop-filter: blur(10px);
    }

    .hero-tag::before {
        content: '';
        width: 8px;
        height: 8px;
        background: var(--primary-color);
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        color: #1a1a2e;
        line-height: 1.1;
        margin-bottom: 1.5rem;
    }

    .hero-title .highlight {
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-description {
        font-size: 1.125rem;
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 2.5rem;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-btn {
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
        border: none;
    }

    .hero-btn-primary {
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        color: white;
        box-shadow: 0 10px 40px rgba(2, 91, 95, 0.3);
    }

    .hero-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 50px rgba(2, 91, 95, 0.4);
        color: white;
    }

    .hero-btn-secondary {
        background: white;
        color: var(--primary-color);
        border: 2px solid rgba(2, 91, 95, 0.2);
    }

    .hero-btn-secondary:hover {
        border-color: var(--primary-color);
        background: rgba(2, 91, 95, 0.05);
        color: var(--primary-color);
    }

    .hero-image-wrapper {
        position: relative;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    .hero-image-wrapper img {
        width: 100%;
        max-width: 600px;
        border-radius: 1.5rem;
        box-shadow: 0 25px 80px rgba(2, 91, 95, 0.2);
    }

    .hero-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 120%;
        height: 120%;
        background: radial-gradient(ellipse, rgba(2, 91, 95, 0.15) 0%, transparent 60%);
        z-index: -1;
        filter: blur(40px);
    }

    @media (max-width: 992px) {
        .hero-container {
            flex-direction: column;
            text-align: center;
        }

        .hero-content {
            max-width: 100%;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-visual {
            order: -1;
            max-width: 500px;
        }
    }

    @media (max-width: 576px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<section class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <?php if (!empty($hero_data['tag'])): ?>
                <div class="hero-tag"><?php echo $hero_data['tag']; ?></div>
            <?php endif; ?>
            
            <h1 class="hero-title">
                <?php echo $hero_data['title']; ?>
                <?php if (!empty($hero_data['highlight'])): ?>
                    <span class="highlight"><?php echo $hero_data['highlight']; ?></span>
                <?php endif; ?>
            </h1>
            
            <p class="hero-description"><?php echo $hero_data['description']; ?></p>
            
            <div class="hero-buttons">
                <?php if (!empty($hero_data['cta_primary'])): ?>
                    <a href="<?php echo $hero_data['cta_primary']['url']; ?>" class="hero-btn hero-btn-primary">
                        <?php echo $hero_data['cta_primary']['text']; ?>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                <?php endif; ?>
                
                <?php if (!empty($hero_data['cta_secondary'])): ?>
                    <a href="<?php echo $hero_data['cta_secondary']['url']; ?>" class="hero-btn hero-btn-secondary">
                        <?php echo $hero_data['cta_secondary']['text']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if (!empty($hero_data['image'])): ?>
            <div class="hero-visual">
                <div class="hero-glow"></div>
                <div class="hero-image-wrapper">
                    <img src="<?php echo $hero_data['image']; ?>" alt="<?php echo $hero_data['title']; ?>">
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
