<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("Location: ../principal.php");
        exit();
    }
    $IDUsuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>RH</title>
</head>
<body>
    <section class="header">
        <h1>Human Resources</h1>
        <div class="options">
            <nav>
                <a href="home.php">Home</a>
                <a href="makeTicket.php">Make a ticket</a>
                <a href="requestVacation.php">Request vacation</a>
                <a href="reportIncident.php">Report an incident</a>
                <a href="information.php">Personal information</a>
                <a href="../Session/logout.php">Close Session</a>
            </nav>
        </div>
    </section>
