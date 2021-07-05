<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function send_mail($send_to_mail, $send_to_fullname, $subject, $content, $option = array())
{
    global $config;
    $config_email = $config['email'];
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = $config_email['smtp_host'];                  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $config_email['smtp_user'];                     // SMTP username
        $mail->Password   = $config_email['smtp_pass'];                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $config_email['smtp_port'];                                     // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->CharSet = "UTF-8";

        //Recipients
        $mail->setFrom($config_email['smtp_user'], $config_email['smtp_fullname']);
        // $mail->addAddress('ndtspear@gmail.com', 'YT Spear Channel');     // Add a recipient
        $mail->addAddress($send_to_mail, $send_to_fullname);               // Name is optional
        $mail->addReplyTo($config_email['smtp_user']);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        // $mail->AltBody = 'Sử dụng mail không cần thẻ html ở đây';

        $mail->send();
    } catch (Exception $e) {
        echo "Email không được gửi. Chi tiết lỗi: {$mail->ErrorInfo}";
    }
}
