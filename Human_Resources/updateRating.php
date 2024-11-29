<?php

include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php";
require_once "../functions.php";


if(isset($_POST['btnReport'])){
    $id = trim($_POST['id']);
    $score = trim($_POST['score']);
    $evaluationDate = trim($_POST['evaluationDate']);
    $comments = traducirTexto(trim($_POST['comments']));
    $employee = trim($_POST['employee']);

    try {
        global $db_con;
        
        $evaluationDate = (new DateTime())->format('Y-m-d');

        $stmt = $db_con->prepare("update performance SET score = :score, evaluationDate = :evaluationDate, comments = :comments where code = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':score', $score, PDO::PARAM_INT);
        $stmt->bindParam(':evaluationDate', $evaluationDate, PDO::PARAM_STR);
        $stmt->bindParam(':comments', $comments, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>
                    alert('The rating has been updated successful.');
                    window.location.href = 'rating.php';
                  </script>";
        } else {
            echo "Error updating incident.";
        }

    } catch (PDOException $e) {
        echo "Connection error: " . $e->getMessage();
    }


}

?>