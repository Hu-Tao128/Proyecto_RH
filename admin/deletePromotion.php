<?php
require_once "../includes/config/MySQL_ConexionDB.php";
include "functionsAdmin.php";

echo "hola";
if(isset($_GET['id']) && isset($_GET['action'])){
        
    $id = $_GET['id'];
    $action = $_GET['action'];

    if($action == 'delete'){
        $query = "DELETE FROM promocion where codigo = :id";
    } else {
        echo "invalid option";
        exit;
    }

        try{
            global $db_con;
    
            $stmt = $db_con->prepare($query);
            $stmt->bindParam(':id', $id);
    
            if ($stmt->execute()) {
                echo "<script>
                        alert('Promotion was Eliminated.');
                        window.location.href = 'promotions.php';
                      </script>";
            } else {
                echo "<script>
                        alert('The promotion wasn't elimanted');
                        window.location.href = 'promotions.php'
                      </script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
    } else {
        echo "<script>
                alert('Upss an error, Sorry');
                window.location.href = 'promotions.php'
                </script>";
    }




?>