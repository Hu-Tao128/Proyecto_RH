<?php
require("../includes/config/MySQL_ConexionDB.php");
function showTickets($supervisor) {
    global $db_con;
    $tickets = [];

    try {
        $query = "SELECT c.id, c.date, c.description, c.status as statusTicket, c.employee FROM complaints as c INNER JOIN employee as e ON c.employee = e.code WHERE e.supervisorId = :supervisor";
        $stm = $db_con->prepare($query);
        $stm->bindParam(':supervisor', $supervisor, PDO::PARAM_STR); 
        
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $tickets[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }


    return $tickets;
}

function getInfoPromotion($id) {
    global $db_con;

    try {
        $query = "SELECT name FROM promotion WHERE code = :id";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR); 
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $row['name'];
}

function getInfovacations($supervisor) {
    global $db_con;
    $users = [];

    try {
        $query = "SELECT v.id, v.startDate, v.endDate, v.status as VStatus, v.employee FROM vacations as v INNER JOIN employee as e on v.employee = e.code WHERE e.supervisorId = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_STR); 
        
        // Ejecutar la consulta
        $stmt->execute();

        // Obtener todas las filas de resultados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $users;
}

function getInfoAbsences($supervisor) {
    global $db_con;
    $users = [];

    try {
        $query = "SELECT a.id, a.startDate, a.endDate, a.status, a.type, a.description, e.code as employee
                  FROM absence AS a
                  INNER JOIN employee AS e ON a.employee = e.code
                  WHERE e.supervisorId = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_STR); 
        
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $users;
}



function getInfoEmploy($supervisor) {
    global $db_con;
    $users = [];

    try {
        $query = "SELECT * FROM employee WHERE supervisorId = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_STR); 
        
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $users;
}

function getAttendance($supervisor) {
    global $db_con;
    $attendance = [];

    try {
        $query = "SELECT * FROM attendance as a INNER JOIN employee as e on a.employee = e.code WHERE e.supervisorId = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_STR); 
        
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $attendance[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $attendance;
}

function showIncidents(){
    global $db_con;
    $incidents = [];

    try {
        $query = "SELECT * FROM incident";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $incidents[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $incidents;
}

function showPromotions(){
    global $db_con;
    $promotions = [];

    try {
        $query = "SELECT * FROM promotion";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $promotions[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $promotions;
}

function showApplication($supervisor){
    global $db_con;
    $applications = [];

    try {
        $query = "SELECT * FROM application as a INNER JOIN employee as e ON a.employee = e.code WHERE e.supervisorId = :supervisor";
        $stm = $db_con->prepare($query);
        $stm->bindParam(':supervisor', $supervisor, PDO::PARAM_STR);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $applications[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $applications;
}

function listWorkstation(){
    global $db_con;
    $workspace = [];

    try {
        $query = "SELECT * FROM position";
        $stm = $db_con->prepare($query);
        $stm->execute();
    
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $workspace[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }
    return $workspace;
}    

function showAttandance(){
    global $db_con;
    $attandance = [];

    try {
        $query = "SELECT * FROM ";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $attandance[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $attandance;
}

function showRatings($supervisor){
    global $db_con;
    $rating = [];

    try {
        $query = "SELECT p.code as id, p.score, p.evaluationDate, p.comments, p.employee FROM performance as p INNER JOIN employee as e ON e.code = p.employee WHERE e.supervisorId = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_STR); 
        
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rating[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $rating;
}
?>