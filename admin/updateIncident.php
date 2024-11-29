<?php

include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php";
require_once "../functions.php";


if(isset($_POST['btnReport'])){
    $id = trim($_POST['id']);
    $incidentType = traducirTexto(trim($_POST['type']));
    $incidentDate = traducirTexto(trim($_POST['dateIncident']));
    $description = traducirTexto(trim($_POST['description']));
    $employee = trim($_POST['employee']);

    try {
        global $db_con;
        
        $incidentDate = (new DateTime())->format('Y-m-d');

        $stmt = $db_con->prepare("update incident SET incidentType = :incidentType,  description = :description where id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->bindParam(':incidentType', $incidentType, PDO::PARAM_STR);

        $stmt->bindParam(':description', $description, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The incident has been updated successful.');
                    window.location.href = 'incidents.php';
                  </script>";
        } else {
            echo "Error updating incident.";
        }

    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }


}

?>