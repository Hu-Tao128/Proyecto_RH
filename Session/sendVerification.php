<?php
include "../includes/headerLogin.php";
require '../vendor/autoload.php'; 

require_once "../functions.php";

if (isset($_POST['sendCode'])) {
    // Obtener el correo electrónico del formulario
    $id = $_POST['id'];
    $email = $_POST['email'];

    // Generar un código de verificación único
    $verificationCode = rand(100000, 999999);

    // Guardar el código de verificación en la base de datos (puedes usar tu tabla password_reset)
    saveVerificationCode($email, $verificationCode);

    // Enviar el correo con el código de verificación
    sendVerificationEmail($email, $verificationCode);
}

?>

<section>
    <div>
        <h1>Introduce the Verificaion Code that u received in your Email</h1>
        <form action="verifyCode.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="hidden" name="email" value="<?php echo $email?>">
            <input type="text" name="codeV" id="codeV" required>
            <button type="submit" name="btnVerify"></button>
        </form>
    </div>
</section>

<?php
    include "../includes/footer.php";
?>