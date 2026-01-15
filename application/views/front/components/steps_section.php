<?php
/**
 * How It Works / Steps Component
 * 
 * Usage:
 * $steps_data = [
 *   'tag' => '...',
 *   'title' => '...',
 *   'description' => '...',
 *   'steps' => [['number' => '01', 'title' => '...', 'description' => '...'], ...]
 * ];
 * include('components/steps_section.php');
 */
?>
<style>
    .steps-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, #025b5f 0%, #014548 50%, #003d40 100%);
        position: relative;
        overflow: hidden;
    }

    .steps-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.5;
    }

    .steps-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 1;
    }

    .steps-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 4rem;
    }

    .steps-tag {
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        margin-bottom: 1rem;
        backdrop-filter: blur(10px);
    }

    .steps-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1rem;
    }

    .steps-subtitle {
        font-size: 1.125rem;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.7;
    }

    .steps-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        position: relative;
    }

    .step-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1.25rem;
        padding: 2rem;
        text-align: center;
        position: relative;
        transition: all 0.4s ease;
    }

    .step-card:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-5px);
        border-color: rgba(255, 255, 255, 0.2);
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        margin: 0 auto 1.5rem;
        border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .step-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: white;
        margin-bottom: 0.75rem;
    }

    .step-description {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.75);
        line-height: 1.7;
    }

    /* Connector line between steps */
    @media (min-width: 992px) {
        .steps-grid::before {
            content: '';
            position: absolute;
            top: 30px;
            left: 15%;
            right: 15%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            z-index: -1;
        }
    }

    @media (max-width: 768px) {
        .steps-title {
            font-size: 2rem;
        }
    }
</style>

<section class="steps-section" id="how-it-works">
    <div class="steps-container">
        <div class="steps-header">
            <?php if (!empty($steps_data['tag'])): ?>
                <span class="steps-tag"><?php echo $steps_data['tag']; ?></span>
            <?php endif; ?>
            <h2 class="steps-title"><?php echo $steps_data['title']; ?></h2>
            <?php if (!empty($steps_data['description'])): ?>
                <p class="steps-subtitle"><?php echo $steps_data['description']; ?></p>
            <?php endif; ?>
        </div>

        <div class="steps-grid">
            <?php foreach ($steps_data['steps'] as $step): ?>
                <div class="step-card">
                    <div class="step-number"><?php echo $step['number']; ?></div>
                    <h3 class="step-title"><?php echo $step['title']; ?></h3>
                    <p class="step-description"><?php echo $step['description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
