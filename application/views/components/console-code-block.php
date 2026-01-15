<?php
/**
 * Console Code Block Component
 * Mock terminal window with cURL request
 */
?>
<style>
    .terminal-window {
        background: rgba(0, 0, 0, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    }
    
    .terminal-header {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        background: rgba(0, 0, 0, 0.4);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .terminal-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
    
    .dot-red { background: #ff5f56; }
    .dot-yellow { background: #ffbd2e; }
    .dot-green { background: #27c93f; }
    
    .terminal-title {
        margin-left: 12px;
        color: #6b7280;
        font-size: 13px;
        font-family: monospace;
    }
    
    .terminal-content {
        padding: 20px;
        font-family: 'Courier New', monospace;
        font-size: 13px;
        line-height: 1.6;
        overflow-x: auto;
    }
    
    .terminal-comment {
        color: #6b7280;
    }
    
    .terminal-command {
        color: #d1d5db;
    }
    
    .terminal-method {
        color: #FF8A65;
        font-weight: 600;
    }
    
    .terminal-url {
        color: #60a5fa;
    }
    
    .terminal-header-text {
        color: #4ade80;
    }
    
    .terminal-json {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 8px;
        padding: 12px;
        margin-top: 12px;
    }
    
    .json-key {
        color: #fbbf24;
    }
    
    .json-string {
        color: #4ade80;
    }
    
    .json-number {
        color: #FF8A65;
    }
    
    .terminal-caption {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 16px;
        margin-top: 16px;
        color: #9ca3af;
        font-size: 14px;
    }
    
    .status-dot {
        width: 8px;
        height: 8px;
        background: #4ade80;
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }
    
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
</style>

<div>
    <div class="terminal-window">
        <div class="terminal-header">
            <div class="terminal-dot dot-red"></div>
            <div class="terminal-dot dot-yellow"></div>
            <div class="terminal-dot dot-green"></div>
            <span class="terminal-title">api-request.sh</span>
        </div>
        
        <div class="terminal-content">
            <div class="terminal-comment"># Fetch district-level hazard data</div>
            <div style="margin-top: 8px;">
                <span class="terminal-command">curl</span> <span class="terminal-method">-X GET</span> \
            </div>
            <div style="padding-left: 20px;">
                <span class="terminal-url">"https://api.climagro.ai/v1/hazards"</span> \
            </div>
            <div style="padding-left: 20px;">
                <span class="terminal-command">-H</span> <span class="terminal-header-text">"Authorization: Bearer $API_KEY"</span> \
            </div>
            <div style="padding-left: 20px;">
                <span class="terminal-command">-H</span> <span class="terminal-header-text">"Content-Type: application/json"</span>
            </div>
            
            <div style="margin-top: 16px;" class="terminal-comment"># Response (200 OK)</div>
            <div class="terminal-json">
                <div>{</div>
                <div style="padding-left: 16px;"><span class="json-key">"region"</span>: <span class="json-string">"Kanpur"</span>,</div>
                <div style="padding-left: 16px;"><span class="json-key">"hazard_index"</span>: <span class="json-number">0.73</span>,</div>
                <div style="padding-left: 16px;"><span class="json-key">"risk_level"</span>: <span class="json-string">"HIGH"</span>,</div>
                <div style="padding-left: 16px;"><span class="json-key">"timestamp"</span>: <span class="json-string">"2026-01-13T10:00:00Z"</span></div>
                <div>}</div>
            </div>
        </div>
    </div>
    
    <div class="terminal-caption">
        <span style="display: flex; align-items: center; gap: 6px;">
            <span class="status-dot"></span>
            REST API
        </span>
        <span>•</span>
        <span>&lt;100ms Latency</span>
        <span>•</span>
        <span>JSON</span>
    </div>
</div>
