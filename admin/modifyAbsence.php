<?php
require_once "../includes/config/MySQL_ConexionDB.php";
include "functionsAdmin.php";

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 'accept') {
        $query = "UPDATE ausencia SET estado = 'Accepted' WHERE numero = :id";
    } elseif ($action == 'decline') {
        $query = "UPDATE ausencia SET estado = 'Declined' WHERE numero = :id";
    } else {
        echo "Invalid Option.";
        exit;
    }

    try{
        global $db_con;

        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Absences was Modified.');
                    window.location.href = 'absence.php';
                  </script>";
        } else {
            echo "<script>
                    alert('The Absence wasn't modify');
                    window.location.href = 'absence.php'
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

} else {
    echo "<script>
            alert('Upss an error, Sorry');
            window.location.href = 'vacations.php'
            </script>";
}
?>