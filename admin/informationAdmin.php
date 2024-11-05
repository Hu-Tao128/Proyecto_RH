<?php 
include "../includes/headerAdmin.php";
require_once "../funciones.php";
require_once "../includes/config/MySQL_ConexionDB.php";

$info = getUserInfo($IDUsuario)[0] ?? []; // Accede al primer elemento, si existe(unico)
?>

<section class="position">
    <div class="info">
        <h2>Your information</h2>
        <p>
            Number: <?= $info['numero'] ?? 'N/A' ?> <br>
            Firstname: <?= $info['nombre'] ?? 'N/A' ?> <br>
            Lastname: <?= ($info['apelPaterno'] ?? '') . " " . ($info['apelMaterno'] ?? ''); ?> <br>
            Email: <?= $info['email'] ?? 'N/A' ?> <br>
            Gender: <?= ($info['sexo'] ?? '') === 'F' ? 'Female' : 'Male'; ?> <br>
            Age: <?= $info['edad'] ?? 'N/A' ?> <br>
            Phone number: <?= $info['celular'] ?? 'N/A' ?> <br>
            Password: <?= $info['contrasena'] ?? 'N/A' ?> <br>
            Contract date: <?= $info['fechaContrato'] ?? 'N/A' ?> <br>
            Workstation: <?= workspace($IDUsuario) ?? 'N/A' ?> <br>
        </p>
    </div>
</section>

<?php include "../includes/footer.php" ?>
