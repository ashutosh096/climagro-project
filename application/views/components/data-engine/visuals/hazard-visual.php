<?php
/**
 * Hazard Visual Component - Badge Grid
 */
?>
<style>
    .hazard-visual {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .hazard-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }
    
    .hazard-badge {
        padding: 8px 12px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        color: white;
        transition: transform 0.2s ease;
        cursor: default;
    }
    
    .hazard-badge:hover {
        transform: scale(1.05);
    }
    
    .badge-heat {
        background: rgba(239, 68, 68, 0.25);
        border: 1px solid rgba(239, 68, 68, 0.4);
    }
    
    .badge-flood {
        background: rgba(59, 130, 246, 0.25);
        border: 1px solid rgba(59, 130, 246, 0.4);
    }
    
    .badge-drought {
        background: rgba(249, 115, 22, 0.25);
        border: 1px solid rgba(249, 115, 22, 0.4);
    }
    
    .badge-wet {
        background: rgba(20, 184, 166, 0.25);
        border: 1px solid rgba(20, 184, 166, 0.4);
    }
</style>

<div class="hazard-visual">
    <div class="hazard-grid">
        <div class="hazard-badge badge-heat">🔥 Heat</div>
        <div class="hazard-badge badge-flood">💧 Flood</div>
        <div class="hazard-badge badge-drought">🍂 Drought</div>
        <div class="hazard-badge badge-wet">🌧️ Wet Spells</div>
    </div>
</div>
