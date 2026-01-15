<?php
/**
 * Spatial Visual Component - Map Stack
 */
?>
<style>
    .spatial-visual {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .map-stack {
        position: relative;
        width: 100px;
        height: 70px;
    }
    
    .map-layer {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }
    
    .map-layer-1 {
        border: 1px solid rgba(255, 255, 255, 0.15);
        transform: translateY(-16px) translateX(8px);
        z-index: 1;
    }
    
    .map-layer-2 {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transform: translateY(-8px) translateX(4px);
        z-index: 2;
    }
    
    .map-layer-3 {
        background: rgba(255, 138, 101, 0.2);
        border: 2px solid #FF8A65;
        box-shadow: 0 8px 24px rgba(255, 138, 101, 0.25);
        z-index: 3;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .map-pin {
        color: #FF8A65;
        font-size: 1.5rem;
    }
    
    .spatial-labels {
        position: absolute;
        right: 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
        font-size: 11px;
    }
    
    .spatial-labels span {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .spatial-labels .line {
        width: 20px;
        height: 1px;
        background: currentColor;
        opacity: 0.5;
    }
    
    .label-state { color: rgba(255, 255, 255, 0.4); }
    .label-district { color: rgba(255, 255, 255, 0.6); }
    .label-subdistrict { color: #FF8A65; font-weight: 600; }
</style>

<div class="spatial-visual">
    <div class="map-stack">
        <div class="map-layer map-layer-1"></div>
        <div class="map-layer map-layer-2"></div>
        <div class="map-layer map-layer-3">
            <span class="map-pin">📍</span>
        </div>
    </div>
    
    <div class="spatial-labels">
        <span class="label-state"><span class="line"></span>State</span>
        <span class="label-district"><span class="line"></span>District</span>
        <span class="label-subdistrict"><span class="line"></span>Sub-District</span>
    </div>
</div>
