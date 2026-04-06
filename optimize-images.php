<?php
// Скрипт для сжатия изображений на хостинге
// Запусти один раз: твой-сайт.ру/optimize-images.php

$dir = __DIR__ . '/Foto/Courses/';
$files = glob($dir . '*.png');

echo "<h2>Оптимизация изображений</h2>";

foreach ($files as $file) {
    $filename = basename($file);
    $oldSize = filesize($file);
    
    // Загружаем изображение
    $img = imagecreatefrompng($file);
    
    // Сохраняем с 80% качества (для PNG используем сжатие)
    imagepng($img, $file, 6); // 0-9, где 9 - макс. сжатие
    
    imagedestroy($img);
    
    $newSize = filesize($file);
    $saved = round((1 - $newSize / $oldSize) * 100, 1);
    
    echo "$filename: " . round($oldSize/1024, 0) . "KB → " . round($newSize/1024, 0) . "KB (сэкономлено $saved%)<br>";
}

echo "<h3>Готово!</h3>";
?>
