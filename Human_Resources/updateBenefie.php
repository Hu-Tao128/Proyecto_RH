<?php

include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php";
require_once "../functions.php";


if(isset($_POST['btnReport'])){
    $id = trim($_POST['code']);
    $name = trim($_POST['name']);
    $type = traducirTexto(trim($_POST['type']));
    $description = traducirTexto(trim($_POST['description']));

    try {
        global $db_con;

        $stmt = $db_con->prepare("update benefits SET name = :name, type = :type, description = :description where code = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The benefie has been updated successful.');
                    window.location.href = 'benefie.php';
                  </script>";
        } else {
            echo "Error updating incident.";
        }

    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }


}

?>