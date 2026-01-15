<?php
/**
 * Glass Card Component
 * 
 * Reusable glassmorphism card with hover effects.
 */
?>
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .glass-card:hover {
        border-color: #FF8A65;
        box-shadow: 0 10px 40px rgba(255, 138, 101, 0.15);
        transform: translateY(-4px);
    }
    
    .glass-card-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }
    
    .glass-card-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }
    
    .glass-card:hover .glass-card-icon {
        background: rgba(255, 138, 101, 0.2);
        color: #FF8A65;
    }
    
    .glass-card-title {
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0;
    }
    
    .glass-card-visual {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        position: relative;
        overflow: hidden;
    }
    
    .glass-card-subtitle {
        color: #9ca3af;
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }
</style>

<div class="glass-card">
    <!-- Header with Icon and Title -->
    <div class="glass-card-header">
        <div class="glass-card-icon">
            <?php echo $card_data['icon'] ?? ''; ?>
        </div>
        <h3 class="glass-card-title"><?php echo $card_data['title'] ?? ''; ?></h3>
    </div>
    
    <!-- Visual Container -->
    <div class="glass-card-visual">
        <?php echo $card_content ?? ''; ?>
    </div>
    
    <!-- Subtitle -->
    <p class="glass-card-subtitle"><?php echo $card_data['subtitle'] ?? ''; ?></p>
</div>
