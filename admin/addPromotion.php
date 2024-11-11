<?php 
include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php";


if (isset($_POST['btnAddPromotion'])) {
    $code = trim($_POST['code']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    try {
        global $db_con;
        
        $date = (new DateTime())->format('Y-m-d');
        $status = "Active";

        $stmt = $db_con->prepare("INSERT INTO promocion (codigo, nombre, descripcion, estado, fechaPub) 
                                  VALUES (:code, :name, :description, :status, :date)");

        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The Promotion was uploaded successful.');
                    window.location.href = 'promotions.php';
                  </script>";
        } else {
            echo "Error al agregar la promocion.";
        }

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>
