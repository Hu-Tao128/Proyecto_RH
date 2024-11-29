<?php

require "vendor/autoload.php";
require_once "../includes/config/MySQL_ConexionDB.php";

// Recuperación de correo electrónico desde el formulario
$email = $_POST['email'];

// Generar un código único
$verificationCode = rand(100000, 999999);

// Guardar el código y el correo en la base de datos (con una tabla de recuperación temporal, por ejemplo)
saveVerificationCode($email, $verificationCode);

// Enviar el correo electrónico con SendGrid
sendVerificationEmail($email, $verificationCode);

// Función para guardar el código de verificación en la base de datos
function saveVerificationCode($email, $code) {
    // Aquí debes guardar el código de verificación en la base de datos junto con el correo electrónico
    // Este paso es importante para verificar el código más tarde.
}

// Función para enviar el correo con SendGrid
function sendVerificationEmail($email, $verificationCode) {
    $from = new SendGrid\Email(null, "your-email@example.com"); // Remitente
    $subject = "Password Reset Verification Code";
    $to = new SendGrid\Email(null, $email);
    $content = new SendGrid\Content("text/plain", "Your verification code is: $verificationCode");

    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = 'your-sendgrid-api-key';  // Tu API Key de SendGrid
    $sg = new \SendGrid($apiKey);
    
    try {
        $response = $sg->client->mail()->send()->post($mail);
        echo "Verification code sent successfully!";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage();
    }
}
?>
