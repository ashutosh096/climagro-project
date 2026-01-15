<?php
/**
 * Features Grid Component
 * 
 * Usage:
 * $features_data = [
 *   'tag' => '...', 
 *   'title' => '...', 
 *   'description' => '...',
 *   'items' => [['icon' => '...', 'title' => '...', 'description' => '...'], ...]
 * ];
 * include('components/features_grid.php');
 */
?>
<style>
    .features-section {
        padding: 6rem 0;
        background: linear-gradient(180deg, #ffffff 0%, #f8fffe 100%);
    }

    .features-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .features-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 4rem;
    }

    .features-tag {
        display: inline-block;
        background: rgba(2, 91, 95, 0.1);
        color: var(--primary-color);
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .features-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 1rem;
    }

    .features-subtitle {
        font-size: 1.125rem;
        color: #6b7280;
        line-height: 1.7;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .feature-card {
        background: white;
        border-radius: 1.25rem;
        padding: 2rem;
        position: relative;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(2, 91, 95, 0.08);
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), #04888e);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 60px rgba(2, 91, 95, 0.15);
        border-color: rgba(2, 91, 95, 0.15);
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(2, 91, 95, 0.1), rgba(2, 91, 95, 0.05));
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        font-size: 1.75rem;
        color: var(--primary-color);
        transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        color: white;
        transform: scale(1.1);
    }

    .feature-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #1a1a2e;
        margin-bottom: 0.75rem;
    }

    .feature-description {
        font-size: 0.95rem;
        color: #6b7280;
        line-height: 1.7;
    }

    @media (max-width: 768px) {
        .features-title {
            font-size: 2rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="features-section" id="features">
    <div class="features-container">
        <div class="features-header">
            <?php if (!empty($features_data['tag'])): ?>
                <span class="features-tag"><?php echo $features_data['tag']; ?></span>
            <?php endif; ?>
            <h2 class="features-title"><?php echo $features_data['title']; ?></h2>
            <?php if (!empty($features_data['description'])): ?>
                <p class="features-subtitle"><?php echo $features_data['description']; ?></p>
            <?php endif; ?>
        </div>

        <div class="features-grid">
            <?php foreach ($features_data['items'] as $feature): ?>
                <div class="feature-card">
                    <div class="feature-icon">
                        <?php echo $feature['icon']; ?>
                    </div>
                    <h3 class="feature-title"><?php echo $feature['title']; ?></h3>
                    <p class="feature-description"><?php echo $feature['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
