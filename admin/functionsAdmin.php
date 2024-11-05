<?php

require("../includes/config/MySQL_ConexionDB.php");
function showTickets() {
    global $db_con;
    $tickets = [];

    try {
        $query = "SELECT * FROM quejas";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $tickets[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $tickets;
}
?>