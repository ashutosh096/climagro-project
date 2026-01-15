<?php
/**
 * Temporal Visual Component - Bar Chart
 */
?>
<style>
    .temporal-visual {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 4px;
        padding: 0 10px;
        position: relative;
    }
    
    .temporal-labels {
        position: absolute;
        top: 0;
        left: 10px;
        right: 10px;
        display: flex;
        justify-content: space-between;
        font-size: 10px;
    }
    
    .temporal-labels .past {
        color: #6b7280;
    }
    
    .temporal-labels .future {
        color: #FF8A65;
    }
    
    .bar-group {
        display: flex;
        align-items: flex-end;
        gap: 3px;
        height: 80px;
    }
    
    .bar {
        width: 8px;
        border-radius: 3px 3px 0 0;
        transition: all 0.3s ease;
    }
    
    .bar-past {
        background: rgba(156, 163, 175, 0.5);
    }
    
    .bar-past:hover {
        background: rgba(156, 163, 175, 0.7);
    }
    
    .bar-future {
        background: rgba(255, 138, 101, 0.7);
        animation: pulse-bar 2s infinite;
    }
    
    .bar-future:hover {
        background: #FF8A65;
    }
    
    @keyframes pulse-bar {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 1; }
    }
    
    .arrow-connector {
        display: flex;
        align-items: center;
        padding: 0 8px;
        color: rgba(255, 255, 255, 0.3);
    }
</style>

<div class="temporal-visual">
    <div class="temporal-labels">
        <span class="past">1901-2024</span>
        <span class="future">2025-2100</span>
    </div>
    
    <!-- Historical Bars -->
    <div class="bar-group">
        <div class="bar bar-past" style="height: 35%"></div>
        <div class="bar bar-past" style="height: 45%"></div>
        <div class="bar bar-past" style="height: 40%"></div>
        <div class="bar bar-past" style="height: 50%"></div>
        <div class="bar bar-past" style="height: 55%"></div>
        <div class="bar bar-past" style="height: 48%"></div>
    </div>
    
    <!-- Arrow -->
    <div class="arrow-connector">→</div>
    
    <!-- Future Bars (Upward Trend) -->
    <div class="bar-group">
        <div class="bar bar-future" style="height: 50%"></div>
        <div class="bar bar-future" style="height: 58%"></div>
        <div class="bar bar-future" style="height: 65%"></div>
        <div class="bar bar-future" style="height: 72%"></div>
        <div class="bar bar-future" style="height: 82%"></div>
        <div class="bar bar-future" style="height: 95%"></div>
    </div>
</div>
