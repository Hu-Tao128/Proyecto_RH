<?php 
include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php";


if (isset($_POST['btnBenfits'])) {
    $code = trim($_POST['code']);
    $name = trim($_POST['name']);
    $type = trim($_POST['type']);
    $description = trim($_POST['description']);

    try {
        global $db_con;
        
        $stmt = $db_con->prepare("INSERT INTO beneficios (codigo, nombre, tipo, descripcion) 
                                  VALUES (:code, :name, :type, :description)");

        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':description', $description);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The Benefie was uploaded successful.');
                    window.location.href = 'benefies.php';
                  </script>";
        } else {
            echo "Error al agregar al empleado.";
        }

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>
