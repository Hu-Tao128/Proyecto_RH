<?php 
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php";
require_once "../functions.php";


if (isset($_POST['btnAddPromotion'])) {
    $name = trim($_POST['name']);
    $description = traducirTexto(trim($_POST['description']));

    try {
        global $db_con;
        
        $date = (new DateTime())->format('Y-m-d');
        $status = "Active";

        $stmt = $db_con->prepare("INSERT INTO promotion (code, name, description, status, publicationDate) 
                                  VALUES ('code', :name, :description, :status, :date)");

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
            echo "Error adding the promotion.";
        }

    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }
}
?>
