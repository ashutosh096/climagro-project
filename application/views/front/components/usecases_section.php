<?php
/**
 * Use Cases / Target Audience Component
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
        background: #ffffff;
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

    .usecases-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a2e;
        margin-bottom: 1rem;
    }

    .usecases-subtitle {
        font-size: 1.125rem;
        color: #6b7280;
        line-height: 1.7;
    }

    .usecases-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
    }

    .usecase-card {
        background: linear-gradient(135deg, #f8fffe 0%, #ffffff 100%);
        border-radius: 1.25rem;
        padding: 2rem;
        border: 1px solid rgba(2, 91, 95, 0.08);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .usecase-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), #04888e);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }

    .usecase-card:hover {
        box-shadow: 0 20px 50px rgba(2, 91, 95, 0.12);
        transform: translateY(-5px);
    }

    .usecase-card:hover::after {
        transform: scaleX(1);
    }

    .usecase-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-color), #04888e);
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        margin-bottom: 1.5rem;
        box-shadow: 0 10px 30px rgba(2, 91, 95, 0.25);
    }

    .usecase-title {
        font-size: 1.35rem;
        font-weight: 600;
        color: #1a1a2e;
        margin-bottom: 0.75rem;
    }

    .usecase-description {
        font-size: 0.95rem;
        color: #6b7280;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .usecase-benefits {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .usecase-benefits li {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        font-size: 0.9rem;
        color: #4b5563;
        margin-bottom: 0.75rem;
    }

    .usecase-benefits li::before {
        content: '✓';
        flex-shrink: 0;
        width: 20px;
        height: 20px;
        background: rgba(2, 91, 95, 0.1);
        color: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .usecases-title {
            font-size: 2rem;
        }

        .usecases-grid {
            grid-template-columns: 1fr;
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
            <?php foreach ($usecases_data['items'] as $usecase): ?>
                <div class="usecase-card">
                    <div class="usecase-icon">
                        <?php echo $usecase['icon']; ?>
                    </div>
                    <h3 class="usecase-title"><?php echo $usecase['title']; ?></h3>
                    <p class="usecase-description"><?php echo $usecase['description']; ?></p>
                    
                    <?php if (!empty($usecase['benefits'])): ?>
                        <ul class="usecase-benefits">
                            <?php foreach ($usecase['benefits'] as $benefit): ?>
                                <li><?php echo $benefit; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
