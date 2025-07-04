<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/PHPMailer/src/Exception.php';

function sendOrderConfirmationEmail($toEmail, $toName, $cartItems, $total) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_email@gmail.com';
        $mail->Password = 'your_app_password';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('your_email@gmail.com', 'NewarkIT');
        $mail->addAddress($toEmail, $toName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your NewarkIT Order Confirmation';

        // body
        $body = "<h3>Hi $toName,</h3><p>Thank you for your purchase! Here's your order:</p><ul>";
        foreach ($cartItems as $item) {
            $body .= "<li>{$item['name']} (x{$item['quantity']}) - $" . number_format($item['subtotal'], 2) . "</li>";
        }
        $body .= "</ul><p><strong>Total: $" . number_format($total, 2) . "</strong></p>";
        $body .= "<p>Visit us again at <a href='https://yourdomain.com'>NewarkIT</a>.</p>";

        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return false;
    }
}
?>