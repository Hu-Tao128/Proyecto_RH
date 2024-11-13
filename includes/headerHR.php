<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <?php
    include_once("../functions.php");

        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: ../principal.php");
            exit();
        }
        $IDUsuario = $_SESSION['usuario'];

        if(!empty(getIDSupervisor($IDUsuario)) && workspace($IDUsuario) != "Analista"){
            header("Location: ../home.php");
            exit();
        }
        
    ?>
    <title>RH</title>
</head>
<body>
    <section class="header">
    <a href="../Human_Resources/homeRH.php" style="text-decoration: none; color: inherit;">
        <h1>Human Resources</h1>
    </a><br>
        <div class="options">
            <nav>
                <a href="">Departamens</a>
                <a href="">Supervisors</a>
                <a href="">Complains</a>
            </nav>
        </div>
        <div class="options">
            <nav>
                <a href="">Aplications</a>
                <a href="">Promotions</a>
                <a href="../Session/logout.php">Log out</a>
            </nav>
        </div>
    </section>
