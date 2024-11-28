<?php
include("includes/header.php");
require_once 'includes/config/MySQL_ConexionDB.php';
require_once 'functions.php';

if (isset($_POST['btnaddTicket'])) {
    $description = traducirTexto(trim($_POST['description']));

        $currentDate = new DateTime();
        $status = "Not yet";

    try {
        global $db_con;

        $dateNow = (new DateTime())->format('Y-m-d');//formafto de .a fecha
        
        $stmt = $db_con->prepare("INSERT INTO complaints (date , description, status, employee) 
                                  VALUES (:dateNow, :descriptions, :estado, :user)");

        $stmt->bindParam(':dateNow', $dateNow);
        $stmt->bindParam(':descriptions', $description);
        $stmt->bindParam(':estado', $status);
        $stmt->bindParam(':user', $IDUsuario);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The ticket was uploaded successful.');
                    window.location.href = 'makeTicket.php';
                  </script>";
        } else {
            echo "Error al agregar al empleado.";
        }

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>
