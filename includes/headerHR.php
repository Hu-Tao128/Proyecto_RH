<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/estilosdeLeon.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <?php
    include_once("../functions.php");

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: ../principal.php");
            exit();
        }
        $IDUsuario = $_SESSION['user'];

        if(!empty(getIDSupervisor($IDUsuario)) && department($IDUsuario) != "D001"){
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
            <div class="dropdown">
                <a href="../Human_Resources/departaments.php" class="dropbtn">Departamens</a>

            </div>
            <div class="dropdown">
                <a href="../Human_Resources/employee.php" class="dropbtn">Employees</a>
            </div>
            <div class="dropdown">
                <a href="#" class="dropbtn">Complains</a>
                <div class="dropdown-content">
                    <a href="#">Complain 1</a>
                    <a href="#">Complain 2</a>
                    <a href="#">Complain 3</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="options">
        <nav>
            <a href="../admin/aplications.php">Aplications</a>
            <a href="../admin/promotions.php">Promotions</a>
            <a href="../Session/logout.php">Log out</a>
        </nav>
    </div>
</section>

