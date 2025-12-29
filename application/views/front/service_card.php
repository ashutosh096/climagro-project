<?php
// service_card.php - Template for a single service card
// Variables available: $service (the service data), $index (the service index in the array)
// The $isRight variable is determined by the loop in the parent template (odd vs even index)

$isRight = $index % 2 !== 0;
$icon = getIcon($service['icon']);

// Different layout based on left or right position
if ($isRight) {
    // Right side card
    ?>
    <div class="text-left">
        <h3 class="text-2xl font-bold text-gray-800 mb-3"><?= $service['title'] ?></h3>
        <p class="text-gray-600 mb-4"><?= $service['description'] ?></p>
        
        <ul class="space-y-2 mb-5">
            <?php foreach ($service['features'] as $feature): ?>
                <li class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full flex-shrink-0" style="background-color: <?= $service['accentColor'] ?>;"></span>
                    <span class="text-gray-700"><?= $feature ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <a href="#" class="font-medium flex items-center gap-1 transition-colors hover:opacity-80" style="color: <?= $service['accentColor'] ?>;">
            Learn More
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </a>
    </div>
<?php } else { 
    // Left side card
    ?>
    <div class="flex">
        <div class="mr-6 relative flex-shrink-0">
            <div class="w-20 h-20 rounded-full overflow-hidden shadow-lg">
                <img src="<?= $service['imageUrl'] ?>" alt="<?= $service['title'] ?>" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 rounded-full flex items-center justify-center" style="background: <?= $service['gradientStyle'] ?>;">
                <div class="text-white">
                    <?= $icon ?>
                </div>
            </div>
        </div>
        <div class="text-right">
            <h3 class="text-2xl font-bold text-gray-800 mb-3"><?= $service['title'] ?></h3>
            <p class="text-gray-600 mb-4"><?= $service['description'] ?></p>
            
            <ul class="space-y-2 mb-5">
                <?php foreach ($service['features'] as $feature): ?>
                    <li class="flex items-center justify-end gap-2">
                        <span class="text-gray-700"><?= $feature ?></span>
                        <span class="w-2 h-2 rounded-full flex-shrink-0" style="background-color: <?= $service['accentColor'] ?>;"></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            
            <a href="#" class="font-medium flex items-center justify-end gap-1 transition-colors hover:opacity-80" style="color: <?= $service['accentColor'] ?>;">
                Learn More
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </a>
        </div>
    </div>
<?php } ?>