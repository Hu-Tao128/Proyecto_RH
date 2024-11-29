<?php 
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php";
+require_once "../functions.php";


if (isset($_POST['btnBenfits'])) {
    $code = trim($_POST['code']);
    $name = trim($_POST['name']);
    $type = traducirTexto(trim($_POST['type']));
    $description = traducirTexto(trim($_POST['description']));
    try {
        global $db_con;
        
        $stmt = $db_con->prepare("INSERT INTO benefits (code, name, type, description) 
                                  VALUES ('code', :name, :type, :description)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The Benefie was uploaded successful.');
                    window.location.href = 'benefie.php';
                  </script>";
        } else {
            echo "Error to upload the benefie.";
        }

    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }
}
?>
