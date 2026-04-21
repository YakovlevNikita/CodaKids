<?php
/**
 * Простая защита от спама по IP
 */
function checkRateLimit($ip, $maxAttempts = 5, $windowSeconds = 300) {
    $dir = __DIR__ . '/../tmp';
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
    
    $file = $dir . '/rate_' . preg_replace('/[^a-z0-9]/', '', strtolower(md5($ip))) . '.json';
    
    $data = ['count' => 0, 'time' => time()];
    if (file_exists($file)) {
        $content = @file_get_contents($file);
        $saved = @json_decode($content, true);
        if (is_array($saved)) {
            $data = $saved;
        }
    }
    
    if (time() - $data['time'] > $windowSeconds) {
        $data = ['count' => 0, 'time' => time()];
    }
    
    $data['count']++;
    @file_put_contents($file, json_encode($data), LOCK_EX);
    
    return $data['count'] <= $maxAttempts;
}
