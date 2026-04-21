<?php
// =====================================================
// ОБРАБОТКА ФОРМЫ
// =====================================================

// Безопасные заголовки
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');

// Отключаем вывод ошибок в production
ini_set('display_errors', '0');
error_reporting(E_ALL);

// Подключение конфигурации с секретными данными
$configPath = __DIR__ . '/includes/config.php';
if (!file_exists($configPath)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Серверная ошибка: конфигурация не найдена']);
    exit;
}
require_once $configPath;

// Подключение CSRF и rate limiting
require_once __DIR__ . '/includes/csrf.php';
require_once __DIR__ . '/includes/rate-limit.php';

// =====================================================
// ОБРАБОТКА ЗАПРОСА
// =====================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Проверка CSRF-токена
$csrfToken = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
if (!validateCsrfToken($csrfToken)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Ошибка безопасности: неверный CSRF-токен. Обновите страницу и попробуйте снова.']);
    exit;
}

// Rate limiting по IP
$clientIp = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
if (!checkRateLimit($clientIp, 5, 300)) {
    http_response_code(429);
    echo json_encode(['success' => false, 'message' => 'Слишком много запросов. Попробуйте позже.']);
    exit;
}

// Получение и очистка данных
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$consent = isset($_POST['consent']) ? true : false;

// Валидация имени
if (empty($name) || mb_strlen($name) < 2 || mb_strlen($name) > 100) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, введите ваше имя (от 2 до 100 символов)']);
    exit;
}

// Валидация имени: только буквы, пробелы, дефисы
if (!preg_match('/^[\p{L}\s\-]+$/u', $name)) {
    echo json_encode(['success' => false, 'message' => 'Имя может содержать только буквы, пробелы и дефисы']);
    exit;
}

// Валидация телефона
if (empty($phone) || strlen($phone) < 6) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, введите корректный номер телефона']);
    exit;
}

// Проверка формата телефона (допускаем +, цифры, скобки, пробелы, дефисы)
if (!preg_match('/^[\+\d\s\(\)\-]+$/', $phone)) {
    echo json_encode(['success' => false, 'message' => 'Номер телефона содержит недопустимые символы']);
    exit;
}

// Проверка согласия на сервере
if (!$consent) {
    echo json_encode(['success' => false, 'message' => 'Необходимо согласие с политикой обработки персональных данных']);
    exit;
}

// Санитизация данных для вывода
$nameSafe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$phoneSafe = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');

// Формирование сообщения
$date = date('d.m.Y H:i:s');
$ip = htmlspecialchars($clientIp, ENT_QUOTES, 'UTF-8');
$message = "📝 <b>Новая заявка с сайта КодаКидс</b>\n\n";
$message .= "📅 Дата: $date\n";
$message .= "👤 Имя: $nameSafe\n";
$message .= "📱 Телефон: $phoneSafe\n";
$message .= "🌐 IP: $ip\n";
if ($consent) {
    $message .= "✅ Согласие на обработку данных: Да\n";
}
$message .= "\n#заявка #codakids";

// Email сообщение
$emailMessage = "Новая заявка с сайта КодаКидс\n\n";
$emailMessage .= "Дата: $date\n";
$emailMessage .= "Имя: $nameSafe\n";
$emailMessage .= "Телефон: $phoneSafe\n";
$emailMessage .= "IP: $ip\n";
if ($consent) {
    $emailMessage .= "Согласие на обработку данных: Да\n";
}

$errors = [];

// =====================================================
// ОТПРАВКА В TELEGRAM
// =====================================================
if ($telegramToken !== 'YOUR_BOT_TOKEN' && $chatId !== 'YOUR_CHAT_ID' && !empty($telegramToken) && !empty($chatId)) {
    $url = "https://api.telegram.org/bot{$telegramToken}/sendMessage";
    
    $postData = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($postData),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_USERAGENT => 'CodaKids-Form/1.0'
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($httpCode !== 200 || !$response) {
        $errors[] = 'Telegram error';
        error_log('Telegram API error: HTTP ' . $httpCode . ' | ' . $curlError);
    }
} else {
    $errors[] = 'Telegram not configured';
}

// =====================================================
// ОТПРАВКА НА EMAIL
// =====================================================
if ($adminEmail !== 'your@email.ru' && !empty($adminEmail) && filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
    $headers = "From: noreply@" . ($_SERVER['HTTP_HOST'] ?? 'codakids.ru') . "\r\n";
    $headers .= "Reply-To: " . $adminEmail . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    $mailSent = mail($adminEmail, $emailSubject, $emailMessage, $headers);
    
    if (!$mailSent) {
        $errors[] = 'Email error';
    }
} else {
    $errors[] = 'Email not configured';
}

// =====================================================
// ОТВЕТ
// =====================================================
if (empty($errors)) {
    echo json_encode(['success' => true, 'message' => 'Спасибо! Заявка отправлена. Мы свяжемся с вами в ближайшее время.']);
} else {
    // Если хотя бы одно отправилось, считаем успехом
    if (count($errors) < 2) {
        echo json_encode(['success' => true, 'message' => 'Заявка отправлена!']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Ошибка отправки. Пожалуйста, позвоните нам напрямую.']);
    }
}
