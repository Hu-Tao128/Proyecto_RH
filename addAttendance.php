<?php
date_default_timezone_set('America/Tijuana');
require_once "includes/config/MySQL_ConexionDB.php";
require_once "functions.php";

if (isset($_POST['btnAddAttendance'])) {
    $employ = trim($_POST['code']);
    $startDate = date("Y-m-d H:i:s");

    try {
        global $db_con;

        $stmt = $db_con->prepare("SELECT number FROM attendance WHERE employ = :user AND endDate IS NULL");
        $stmt->bindParam(':user', $employ);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<script>
                    if (confirm('Ya tiene una entrada marcada. ¿Desea marcar su salida?')) {
                        window.location.href = 'addAttendance.php?markExit=1&employ={$employ}';
                    } else {
                        window.location.href = 'principal.php';
                    }
                  </script>";
        } else {
            $stmt = $db_con->prepare("INSERT INTO attendance (startDate, employ) 
                                      VALUES (:startDate, :user)");
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':user', $employ);

            if ($stmt->execute()) {
                echo "<script>
                        alert('La entrada fue registrada correctamente.');
                        window.location.href = 'principal.php';
                      </script>";
            } else {
                echo "<script>alert('Error al registrar la entrada.')</script>";
            }
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>

<?php
if (isset($_GET['markExit']) && $_GET['markExit'] == 1 && isset($_GET['employ'])) {
    $employ = $_GET['employ'];
    $endDate = date("Y-m-d H:i:s");

    try {
        global $db_con;
        $stmt = $db_con->prepare("UPDATE attendance SET endDate = :endDate WHERE employ = :user AND endDate IS NULL");
        $stmt->bindParam(':endDate', $endDate);
        $stmt->bindParam(':user', $employ);

        if ($stmt->execute()) {
            echo "<script>
                    alert('La salida fue registrada correctamente.');
                    window.location.href = 'principal.php';
                  </script>";
        } else {
            echo "<script>alert('Error al registrar la salida.')</script>";
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>