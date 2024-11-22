<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <?php
    include_once("../functions.php");

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: ../principal.php");
            exit();
        }
        $IDUsuario = $_SESSION['user'];

        if(!empty(getIDSupervisor($IDUsuario))){
            header("Location: ../home.php");
            exit();
        }
        
    ?>
    <title>RH</title>
</head>
<body>
    <section class="header">
    <a href="../admin/homeAdmin.php" style="text-decoration: none; color: inherit;">
        <h1>Human Resources</h1>
    </a>
        <div class="options">
            <nav>
                <a href="incidents.php">Incidents</a>
                <a href="rating.php">Rating</a>
                <a href="tickets.php">Tickets</a>
                <a href="informationAdmin.php">Personal information</a>
                <a href="vacations.php">Vacations</a>
                <a href="attandence.php">Attandence</a>

                
            </nav>
        </div>
        <div class="options">
            <nav>
                <a href="absence.php">Absences</a>
                <a href="benefies.php">Benefies</a>
                <a href="aplications.php">Aplications</a>
                <a href="promotions.php">Promotions</a>
                <a href="employees.php">Employee</a>    
                <a href="../Session/logout.php">Log out</a>
            </nav>
        </div>
    </section>
