<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesLeon.css">
    <link rel="stylesheet" href="../css/forms.css">
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
            <div class="dropdown">
                <a href="#" class="dropbtn">Departamens</a>
                <div class="dropdown-content">
                    <a href="#">Department 1</a>
                    <a href="#">Department 2</a>
                    <a href="#">Department 3</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="../Human_Resources/employee.php" class="dropbtn">Supervisors</a>
                <div class="dropdown-content">
                    <a href="#">Supervisor 1</a>
                    <a href="#">Supervisor 2</a>
                    <a href="#">Supervisor 3</a>
                </div>
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

