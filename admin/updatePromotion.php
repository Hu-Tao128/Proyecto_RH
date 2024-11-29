<?php

include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php";
require_once "../functions.php";

if(isset($_POST['btnReport'])){
    $id = trim($_POST['code']);
    $name = traducirTexto(trim($_POST['name']));
    $status = trim($_POST['status']);
    $description = traducirTexto(trim($_POST['description']));

    try {
        global $db_con;

        $stmt = $db_con->prepare("update promotion SET name = :name, description = :description, status = :status where code = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The promotion has been updated successful.');
                    window.location.href = 'promotions.php';
                  </script>";
        } else {
            echo "Error updating incident.";
        }

    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }


}

?>