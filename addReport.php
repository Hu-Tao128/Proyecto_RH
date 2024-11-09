<?php
include("includes/header.php");
require_once 'includes/config/MySQL_ConexionDB.php';
require_once 'functions.php';

if (isset($_POST['btnReport'])) {
    $type = trim($_POST['type']);
    $date = trim($_POST['dateIncident']);
    $description = trim($_POST['description']);
    
    $dateIncident = date('Y-m-d', strtotime($date));
    //verificar el formato de la fecha :)

    try {
        global $db_con;

        $stmt = $db_con->prepare("INSERT INTO incidente (tipo_Incident, fechaIncident, descripcion, empleado) 
                                  VALUES (:type, :dateIncident, :description, :user)");

        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':dateIncident', $dateIncident);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user', $IDUsuario);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The Report was uploaded successfully.');
                    window.location.href = 'reportIncident.php';
                  </script>";
        } else {
            echo "Error.";
        }

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>
