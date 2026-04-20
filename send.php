<?php
// =====================================================
// ОБРАБОТКА ФОРМЫ
// =====================================================

// Подключение конфигурации с секретными данными
$configPath = __DIR__ . '/includes/config.php';
if (!file_exists($configPath)) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Серверная ошибка: конфигурация не найдена']);
    exit;
}
require_once $configPath;

// =====================================================
// ОБРАБОТКА ЗАПРОСА
// =====================================================

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Получение данных
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$consent = isset($_POST['consent']) ? true : false;

// Валидация
if (empty($name) || strlen($name) < 2) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, введите ваше имя']);
    exit;
}

if (empty($phone) || strlen($phone) < 6) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, введите корректный номер телефона']);
    exit;
}

// Формирование сообщения
$date = date('d.m.Y H:i:s');
$message = "📝 <b>Новая заявка с сайта КодаКидс</b>\n\n";
$message .= "📅 Дата: $date\n";
$message .= "👤 Имя: $name\n";
$message .= "📱 Телефон: $phone\n";
if ($consent) {
    $message .= "✅ Согласие на обработку данных: Да\n";
}
$message .= "\n#заявка #codakids";

// Email сообщение
$emailMessage = "Новая заявка с сайта КодаКидс\n\n";
$emailMessage .= "Дата: $date\n";
$emailMessage .= "Имя: $name\n";
$emailMessage .= "Телефон: $phone\n";
if ($consent) {
    $emailMessage .= "Согласие на обработку данных: Да\n";
}

$errors = [];

// =====================================================
// ОТПРАВКА В TELEGRAM
// =====================================================
if ($telegramToken !== 'YOUR_BOT_TOKEN' && $chatId !== 'YOUR_CHAT_ID') {
    $url = "https://api.telegram.org/bot{$telegramToken}/sendMessage";
    
    $postData = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode !== 200 || !$response) {
        $errors[] = 'Telegram error';
        error_log('Telegram API error: ' . $response);
    }
} else {
    $errors[] = 'Telegram not configured';
}

// =====================================================
// ОТПРАВКА НА EMAIL
// =====================================================
if ($adminEmail !== 'your@email.ru') {
    $headers = "From: noreply@codakids.ru\r\n";
    $headers .= "Reply-To: $adminEmail\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
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
        echo json_encode(['success' => false, 'message' => 'Ошибка отправки. Пожалуйста, позвоните нам напрямую.']);
    }
}
