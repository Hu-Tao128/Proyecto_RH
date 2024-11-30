<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit();
    }
    $IDUsuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilosdeLeon.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>RH</title>
</head>
<body>
    <section class="header">
    <a href="home.php" style="text-decoration: none; color: inherit;">
        <h1>Human Resources</h1>
    </a>
        <div class="options">
            <nav>
<!-- <a href="activityUser.php">My Activity</a>-->
                <a href="questions.php">Questions</a>
                <a href="makeTicket.php">Make a ticket</a>
                <a href="requestVacation.php">Request vacation</a>
                <a href="reportIncident.php">Report an incident</a>
                <a href="information.php">Personal information</a>
                <a href="absence.php">Absences</a>
                <a href="viewPromotions.php">View Promotions</a>
                <a href="Session/logout.php">Log out</a>
            </nav>
        </div>
    </section>
