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

function getInfoPromotion($id) {
    global $db_con;

    try {
        $query = "SELECT nombre FROM promocion WHERE codigo = :id";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR); 
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $row['nombre'];
}

function getInfovacations($supervisor) {
    global $db_con;
    $users = [];

    try {
        $query = "SELECT * FROM vacaciones as v INNER JOIN empleado as e on v.empleado = e.numero WHERE e.supervisor = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_INT); 
        
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
        $query = "SELECT a.numero AS Absence, a.fechaInicio, a.fechaFin, a.estado, a.tipo, a.descripcion, e.numero, a.empleado
                  FROM ausencia AS a
                  INNER JOIN empleado AS e ON a.empleado = e.numero
                  WHERE e.supervisor = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_INT); 
        
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
        $query = "SELECT * FROM empleado WHERE supervisor = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_INT); 
        
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
        $query = "SELECT * FROM attendance as a INNER JOIN empleado as e on a.employ = e.numero WHERE e.supervisor = :supervisor";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':supervisor', $supervisor, PDO::PARAM_INT); 
        
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
        $query = "SELECT * FROM incidente";
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
        $query = "SELECT * FROM promocion";
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

function showApplication(){
    global $db_con;
    $applications = [];

    try {
        $query = "SELECT * FROM postulacion";
        $stm = $db_con->prepare($query);
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
        $query = "SELECT * FROM puesto";
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

function showRatings(){
    global $db_con;
    $rating = [];

    try {
        $query = "SELECT * FROM desempenio";
        $stm = $db_con->prepare($query);
        $stm->execute();
    
        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $rating[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }
    return $rating;
}
?>