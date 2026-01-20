<?php
/**
 * Use Cases / Target Audience Component - Enhanced UX Version
 * 
 * Usage:
 * $usecases_data = [
 *   'tag' => '...',
 *   'title' => '...',
 *   'description' => '...',
 *   'items' => [['icon' => '...', 'title' => '...', 'description' => '...', 'benefits' => [...]], ...]
 * ];
 * include('components/usecases_section.php');
 */
?>
<style>
    .usecases-section {
        padding: 6rem 0;
        background: linear-gradient(180deg, #f8fffe 0%, #ffffff 50%, #f0fafa 100%);
        position: relative;
        overflow: hidden;
    }

    .usecases-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(2, 91, 95, 0.2), transparent);
    }

    .usecases-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .usecases-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 4rem;
    }

    .usecases-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, rgba(2, 91, 95, 0.1), rgba(2, 91, 95, 0.05));
        color: var(--primary-color);
        padding: 0.6rem 1.5rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
        border: 1px solid rgba(2, 91, 95, 0.15);
        backdrop-filter: blur(10px);
    }

    .usecases-tag::before {
        content: '';
        width: 8px;
        height: 8px;
        background: var(--primary-color);
        border-radius: 50%;
        animation: tag-pulse 2s infinite;
    }

    @keyframes tag-pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
    }

    .usecases-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: #1a1a2e;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .usecases-subtitle {
        font-size: 1.15rem;
        color: #6b7280;
        line-height: 1.8;
    }

    .usecases-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .usecase-card {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        border: 1px solid rgba(2, 91, 95, 0.08);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        opacity: 0;
        transform: translateY(30px);
        animation: cardFadeIn 0.6s ease forwards;
    }

    .usecase-card:nth-child(1) { animation-delay: 0.1s; }
    .usecase-card:nth-child(2) { animation-delay: 0.2s; }
    .usecase-card:nth-child(3) { animation-delay: 0.3s; }
    .usecase-card:nth-child(4) { animation-delay: 0.4s; }

    @keyframes cardFadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .usecase-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), #04888e, #14b8a6);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .usecase-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(2, 91, 95, 0.02) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }

    .usecase-card:hover {
        box-shadow: 0 25px 60px rgba(2, 91, 95, 0.15);
        transform: translateY(-8px);
        border-color: rgba(2, 91, 95, 0.15);
    }

    .usecase-card:hover::before {
        transform: scaleX(1);
    }

    .usecase-card:hover::after {
        opacity: 1;
    }

    .usecase-card-header {
        display: flex;
        align-items: flex-start;
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .usecase-icon {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        flex-shrink: 0;
        box-shadow: 0 8px 24px rgba(2, 91, 95, 0.3);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .usecase-icon::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .usecase-card:hover .usecase-icon {
        transform: scale(1.08) rotate(-3deg);
        box-shadow: 0 12px 30px rgba(2, 91, 95, 0.4);
    }

    .usecase-card:hover .usecase-icon::before {
        opacity: 1;
    }

    .usecase-title-wrapper {
        flex: 1;
        padding-top: 0.25rem;
    }

    .usecase-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 0.35rem 0;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .usecase-card:hover .usecase-title {
        color: var(--primary-color);
    }

    .usecase-subtitle {
        font-size: 0.85rem;
        color: #9ca3af;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .usecase-description {
        font-size: 0.95rem;
        color: #6b7280;
        line-height: 1.75;
        margin-bottom: 1.5rem;
    }

    .usecase-benefits {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.65rem;
    }

    .usecase-benefit-item {
        display: flex;
        align-items: center;
        gap: 0.85rem;
        font-size: 0.9rem;
        color: #4b5563;
        padding: 0.5rem 0.75rem;
        background: rgba(2, 91, 95, 0.03);
        border-radius: 0.75rem;
        transition: all 0.3s ease;
    }

    .usecase-card:hover .usecase-benefit-item {
        background: rgba(2, 91, 95, 0.06);
    }

    .benefit-check {
        width: 22px;
        height: 22px;
        background: linear-gradient(135deg, rgba(2, 91, 95, 0.1), rgba(2, 91, 95, 0.05));
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.65rem;
        font-weight: 700;
        flex-shrink: 0;
        border: 1px solid rgba(2, 91, 95, 0.15);
        transition: all 0.3s ease;
    }

    .usecase-card:hover .benefit-check {
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        color: white;
        border-color: transparent;
        transform: scale(1.1);
    }

    .usecase-card-footer {
        margin-top: 1.5rem;
        padding-top: 1.25rem;
        border-top: 1px solid rgba(2, 91, 95, 0.08);
        display: flex;
        justify-content: flex-end;
    }

    .usecase-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateX(-10px);
    }

    .usecase-card:hover .usecase-link {
        opacity: 1;
        transform: translateX(0);
    }

    .usecase-link svg {
        width: 18px;
        height: 18px;
        transition: transform 0.3s ease;
    }

    .usecase-link:hover svg {
        transform: translateX(4px);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .usecases-grid {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }
    }

    @media (max-width: 768px) {
        .usecases-section {
            padding: 4rem 0;
        }

        .usecases-title {
            font-size: 2rem;
        }

        .usecases-header {
            margin-bottom: 2.5rem;
        }

        .usecase-card {
            padding: 1.5rem;
        }

        .usecase-card-header {
            flex-direction: column;
            gap: 1rem;
        }

        .usecase-icon {
            width: 56px;
            height: 56px;
            font-size: 1.5rem;
        }

        .usecase-card-footer {
            display: none;
        }
    }
</style>

<section class="usecases-section" id="use-cases">
    <div class="usecases-container">
        <div class="usecases-header">
            <?php if (!empty($usecases_data['tag'])): ?>
                <span class="usecases-tag"><?php echo $usecases_data['tag']; ?></span>
            <?php endif; ?>
            <h2 class="usecases-title"><?php echo $usecases_data['title']; ?></h2>
            <?php if (!empty($usecases_data['description'])): ?>
                <p class="usecases-subtitle"><?php echo $usecases_data['description']; ?></p>
            <?php endif; ?>
        </div>

        <div class="usecases-grid">
            <?php 
            $sector_labels = ['Academic Research', 'Risk Management', 'Financial Services', 'Public Sector'];
            $index = 0;
            foreach ($usecases_data['items'] as $usecase): 
            ?>
                <div class="usecase-card">
                    <div class="usecase-card-header">
                        <div class="usecase-icon">
                            <?php echo $usecase['icon']; ?>
                        </div>
                        <div class="usecase-title-wrapper">
                            <h3 class="usecase-title"><?php echo $usecase['title']; ?></h3>
                            <span class="usecase-subtitle"><?php echo $sector_labels[$index] ?? 'Sector'; ?></span>
                        </div>
                    </div>
                    
                    <p class="usecase-description"><?php echo $usecase['description']; ?></p>
                    
                    <?php if (!empty($usecase['benefits'])): ?>
                        <ul class="usecase-benefits">
                            <?php foreach ($usecase['benefits'] as $benefit): ?>
                                <li class="usecase-benefit-item">
                                    <span class="benefit-check">✓</span>
                                    <?php echo $benefit; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <div class="usecase-card-footer">
                        <a href="#request-demo" class="usecase-link" onclick="openMultiStepModal(); return false;">
                            Learn more
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            <?php 
            $index++;
            endforeach; 
            ?>
        </div>
    </div>
</section>
