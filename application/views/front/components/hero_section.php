<!-- ===== HERO SECTION STYLES ===== -->
<style>
    .hero-section {
        padding: 110px 0 60px 0;
        background: linear-gradient(135deg, #f8fffe 0%, #e8f5f5 50%, #f0fafa 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%; right: -20%;
        width: 80%; height: 200%;
        background: radial-gradient(ellipse, rgba(2,91,95,0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, rgba(2,91,95,0.10), rgba(2,91,95,0.05));
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

    .hero-tag::before {
        content: '';
        width: 8px; height: 8px;
        background: #025b5f;
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0%,100% { opacity:1; transform:scale(1); }
        50%      { opacity:0.5; transform:scale(1.2); }
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        color: #1a1a2e;
        line-height: 1.15;
        margin-bottom: 1.25rem;
    }

    .hero-title .highlight {
        background: linear-gradient(135deg, #025b5f, #04888e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-description {
        font-size: 1.05rem;
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-btn {
        padding: 0.875rem 1.75rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }

    .hero-btn-primary {
        background: linear-gradient(135deg, #025b5f, #04888e);
        color: white;
        box-shadow: 0 10px 40px rgba(2,91,95,0.28);
    }

    .hero-btn-primary:hover {
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 16px 48px rgba(2,91,95,0.38);
    }

    .hero-btn-secondary {
        background: white;
        color: #025b5f;
        border: 2px solid rgba(2,91,95,0.2);
    }

    .hero-btn-secondary:hover {
        border-color: #025b5f;
        color: #025b5f;
        transform: translateY(-2px);
    }

    .hero-image-wrap {
        border-radius: 1.25rem;
        overflow: hidden;
        box-shadow: 0 16px 56px rgba(2,91,95,0.18), 0 4px 16px rgba(0,0,0,0.08);
        border: 1.5px solid rgba(2,91,95,0.12);
        background: #fff;
    }

    .hero-image-wrap img {
        width: 100%;
        height: auto;
        display: block;
    }

    @media (max-width: 992px) {
        .hero-container {
            grid-template-columns: 1fr;
            text-align: center;
        }
        .hero-title { font-size: 2.25rem; }
        .hero-buttons { justify-content: center; }
        .hero-image-wrap { margin-top: 2rem; }
    }

    @media (max-width: 576px) {
        .hero-title { font-size: 1.85rem; }
        .hero-btn { width: 100%; justify-content: center; }
    }
</style>

<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
    <div class="hero-container">

        <!-- Left: Text Content -->
        <div class="fade-in">
            <div class="hero-tag">
                <?php echo htmlspecialchars($hero_data['tag']); ?>
            </div>
            <h1 class="hero-title">
                <?php echo htmlspecialchars($hero_data['title']); ?>
                <span class="highlight"><?php echo htmlspecialchars($hero_data['highlight']); ?></span>
            </h1>
            <p class="hero-description">
                <?php echo htmlspecialchars($hero_data['description']); ?>
            </p>
            <div class="hero-buttons">
                <?php if (!empty($hero_data['cta_newtab'])): ?>
                <a href="<?php echo $hero_data['cta_newtab']['url']; ?>"
                   class="hero-btn hero-btn-primary"
                   target="_blank" rel="noopener">
                    <?php echo htmlspecialchars($hero_data['cta_newtab']['text']); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/>
                    </svg>
                </a>
                <?php endif; ?>
                <?php if (!empty($hero_data['cta_secondary'])): ?>
                <a href="<?php echo $hero_data['cta_secondary']['url']; ?>"
                   class="hero-btn hero-btn-secondary">
                    <?php echo htmlspecialchars($hero_data['cta_secondary']['text']); ?>
                </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Right: Image -->
        <div class="fade-in">
            <div class="hero-image-wrap">
                <img src="<?php echo $hero_data['image']; ?>"
                     alt="<?php echo htmlspecialchars($hero_data['title'] . ' ' . $hero_data['highlight']); ?>"
                     loading="eager">
            </div>
        </div>

    </div>
</section>
