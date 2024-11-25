<?php
include "includes/header.php";
require_once "includes/config/MySQL_ConexionDB.php";
require_once "functions.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $status = "Pending";

    $date = (new DateTime())->format('Y-m-d');

    $query = "INSERT INTO application(publicationDate, status, employee, promotion) values (:date, :status, :employ, :promotion)";

    try{
        global $db_con;

        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':employ', $IDUsuario);
        $stmt->bindParam(':promotion', $id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('You Apply a promotion.');
                    window.location.href = 'viewPromotions.php';
                  </script>";
        } else {
            echo "<script>
                    alert('You do not apply for this promotion');
                    window.location.href = 'viewPromotions.php'
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

} else {
    echo "<script>
            alert('Upss an error, Sorry');
            window.location.href = 'viewPromotions.php'
            </script>";
}


?>


<?php include "includes/footer.php" ?>