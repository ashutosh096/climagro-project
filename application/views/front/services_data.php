<?php
// services.php - Define the services data

$services = [
    [
        'id' => 'agri-ai',
        'title' => 'AgRI.ai',
        'description' => 'Precise crop-specific climate risk assessments for smarter agricultural decisions.',
        'features' => [
            'District-level risk analysis',
            'Crop area analytics',
            'Risk hotspot identification'
        ],
        'icon' => 'cpu',
        'gradientStyle' => 'linear-gradient(135deg, #2E7D32 0%, #66BB6A 100%)',
        'accentColor' => '#2E7D32',
        'imageUrl' => 'https://images.pexels.com/photos/440731/pexels-photo-440731.jpeg'
    ],
    [
        'id' => 'climate-risk-mapper',
        'title' => 'Climate Risk Mapper',
        'description' => 'Access multi-resolution climate and weather hazard maps, risk indices, and tailored analytics for vulnerable regions and sectors.',
        'features' => [
            'Heatwave, drought, and flood hazard maps',
            'Block, district, and regional climate data',
            'Dry/wet spell frequency and extreme heat indices',
            'Sector-specific climate risk mapping'
        ],
        'icon' => 'cloud-drizzle',
        'gradientStyle' => 'linear-gradient(135deg, #D84315 0%, #FF8A65 100%)',
        'accentColor' => '#D84315',
        'imageUrl' => 'https://images.pexels.com/photos/3278215/pexels-photo-3278215.jpeg'
    ],
    [
        'id' => 'climate-data-services',
        'title' => 'Climate Data',
        'description' => 'Access multi-resolution climate data for vulnerable regions and critical sectors.',
        'features' => [
            'Hazard mapping',
            'Regional analytics',
            'Sector-specific insights'
        ],
        'icon' => 'database',
        'gradientStyle' => 'linear-gradient(135deg, #FF8F00 0%, #FFB74D 100%)',
        'accentColor' => '#FF8F00',
        'imageUrl' => 'https://images.pexels.com/photos/2990650/pexels-photo-2990650.jpeg'
    ],
    [
        'id' => 'climate-consulting',
        'title' => 'Expert Consulting',
        'description' => 'Strategic climate risk planning for governments, NGOs, and enterprises.',
        'features' => [
            'Risk assessment',
            'Impact analysis',
            'Strategy planning'
        ],
        'icon' => 'lightbulb',
        'gradientStyle' => 'linear-gradient(135deg, #0277BD 0%, #4FC3F7 100%)',
        'accentColor' => '#0277BD',
        'imageUrl' => 'https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg'
    ],
    [
        'id' => 'climate-risk-data',
        'title' => 'Risk Intelligence',
        'description' => 'Transform climate data into actionable insights for better decision-making.',
        'features' => [
            'Tailored datasets',
            'Multi-level analysis',
            'Policy insights'
        ],
        'icon' => 'chart-line',
        'gradientStyle' => 'linear-gradient(135deg, #558B2F 0%, #AED581 100%)',
        'accentColor' => '#558B2F',
        'imageUrl' => 'https://images.pexels.com/photos/590022/pexels-photo-590022.jpeg'
    ]
];

/**
 * Get icon SVG based on icon name
 */
function getIcon($iconName) {
    $icons = [
        'cpu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M15 2v2M15 20v2M2 15h2M20 15h2M2 9h2M20 9h2M9 2v2M9 20v2"/></svg>',
        'building' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2M18 12h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-2M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>',
        'database' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>',
        'lightbulb' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>',
        'chart-line' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>',
    ];
    
    return $icons[$iconName] ?? '';
}
?>