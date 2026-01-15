<?php
/**
 * Console Export Card Component
 * Glassmorphism card with download options
 */
?>
<style>
    .export-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }
    
    .export-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .export-card-title {
        color: white;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0 0 4px 0;
    }
    
    .export-card-title svg {
        color: #FF8A65;
    }
    
    .export-card-subtitle {
        color: #9ca3af;
        font-size: 0.9rem;
        margin: 0;
    }
    
    .export-list {
        padding: 16px 24px;
    }
    
    .export-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.03);
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .export-item:hover {
        background: rgba(255, 255, 255, 0.08);
    }
    
    .export-item:last-child {
        margin-bottom: 0;
    }
    
    .export-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }
    
    .icon-csv { background: rgba(34, 197, 94, 0.2); color: #22c55e; }
    .icon-netcdf { background: rgba(59, 130, 246, 0.2); color: #3b82f6; }
    .icon-geojson { background: rgba(255, 138, 101, 0.2); color: #FF8A65; }
    
    .export-info {
        flex: 1;
    }
    
    .export-name {
        color: white;
        font-weight: 500;
        margin: 0 0 4px 0;
        transition: color 0.3s ease;
    }
    
    .export-item:hover .export-name {
        color: #FF8A65;
    }
    
    .export-desc {
        color: #6b7280;
        font-size: 0.85rem;
        margin: 0;
    }
    
    .export-ext {
        color: #4b5563;
        font-size: 0.75rem;
        font-family: monospace;
    }
    
    .export-cta {
        padding: 0 24px 24px;
    }
    
    .export-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 14px 24px;
        background: white;
        color: #00251a;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .export-btn:hover {
        background: #f3f4f6;
        transform: translateY(-2px);
    }
    
    .export-caption {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-top: 16px;
        color: #9ca3af;
        font-size: 14px;
    }
</style>

<div>
    <div class="export-card">
        <div class="export-card-header">
            <h3 class="export-card-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Bulk Data Exports
            </h3>
            <p class="export-card-subtitle">Download complete datasets for offline analysis</p>
        </div>
        
        <div class="export-list">
            <div class="export-item">
                <div class="export-icon icon-csv">📊</div>
                <div class="export-info">
                    <p class="export-name">CSV / Excel</p>
                    <p class="export-desc">Tabular format for spreadsheet analysis</p>
                </div>
                <span class="export-ext">.csv .xlsx</span>
            </div>
            
            <div class="export-item">
                <div class="export-icon icon-netcdf">📁</div>
                <div class="export-info">
                    <p class="export-name">NetCDF</p>
                    <p class="export-desc">Multi-dimensional scientific data format</p>
                </div>
                <span class="export-ext">.nc .nc4</span>
            </div>
            
            <div class="export-item">
                <div class="export-icon icon-geojson">🗺️</div>
                <div class="export-info">
                    <p class="export-name">GeoJSON</p>
                    <p class="export-desc">Geographic features for GIS mapping</p>
                </div>
                <span class="export-ext">.geojson</span>
            </div>
        </div>
        
        <div class="export-cta">
            <a href="#" class="export-btn">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                Download Sample Schema
            </a>
        </div>
    </div>
    
    <div class="export-caption">
        <span>Automated Daily Updates</span>
        <span>•</span>
        <span>S3 Compatible</span>
        <span>•</span>
        <span>SFTP Available</span>
    </div>
</div>
