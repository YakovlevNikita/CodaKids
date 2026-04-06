<?php
// =====================================================
// НАСТРОЙКИ - ЗАПОЛНИ ЭТИ ДАННЫЕ
// =====================================================

// Telegram Bot API
$telegramToken = '8287572774:AAFUbyvSH_M_Vj4x5iguP9SqaS3qPp-vLOc';  // Замени на токен от @BotFather
$chatId = '290465234';           // Замени на свой chat_id от @userinfobot

// Email для дублирования
$adminEmail = 'yakovlev.nikita.2012@gmail.com';      // Замени на свою почту
$emailSubject = 'Новая заявка с сайта КодаКидс';

// =====================================================
// ОБРАБОТКА ФОРМЫ
// =====================================================

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Получение данных
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$consent = isset($_POST['consent']) ? true : false;

// Валидация
if (empty($phone) || strlen($phone) < 6) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, введите корректный номер телефона']);
    exit;
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Пожалуйста, введите корректный E-mail']);
    exit;
}

// Формирование сообщения
$date = date('d.m.Y H:i:s');
$message = "📝 <b>Новая заявка с сайта КодаКидс</b>\n\n";
$message .= "📅 Дата: $date\n";
$message .= "📱 Телефон: $phone\n";
$message .= "📧 Email: $email\n";
if ($consent) {
    $message .= "✅ Согласие на обработку данных: Да\n";
}
$message .= "\n#заявка #codakids";

// Email сообщение
$emailMessage = "Новая заявка с сайта КодаКидс\n\n";
$emailMessage .= "Дата: $date\n";
$emailMessage .= "Телефон: $phone\n";
$emailMessage .= "Email: $email\n";
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
    $headers .= "Reply-To: $email\r\n";
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
