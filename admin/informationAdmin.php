<?php 
include "../includes/headerAdmin.php";
require_once "../functions.php";
require_once "../includes/config/MySQL_ConexionDB.php";

$info = getUserInfo($IDUsuario)[0] ?? []; // Accede al primer elemento, si existe(unico)
?>

<section class="position">
    <div class="info">
        <h2>Your information</h2>
        <p>
            Number: <?= $info['numero'] ?? 'N/A' ?> <br><br>
            Firstname: <?= $info['nombre'] ?? 'N/A' ?> <br><br>
            Lastname: <?= ($info['apelPaterno'] ?? '') . " " . ($info['apelMaterno'] ?? ''); ?> <br><br>
            Email: <?= $info['email'] ?? 'N/A' ?> <br><br>
            Gender: <?= ($info['sexo'] ?? '') === 'F' ? 'Female' : 'Male'; ?> <br><br>
            Age: <?= $info['edad'] ?? 'N/A' ?> <br><br>
            Phone number: <?= $info['celular'] ?? 'N/A' ?> <br><br>
            Password: <?= $info['contrasena'] ?? 'N/A' ?> <br><br>
            Contract date: <?= $info['fechaContrato'] ?? 'N/A' ?> <br><br>
            Workstation: <?= workspace($IDUsuario) ?? 'N/A' ?> <br><br>
        </p>
    </div>
</section>

<?php include "../includes/footer.php" ?>
