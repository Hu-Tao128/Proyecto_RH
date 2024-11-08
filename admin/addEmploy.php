<?php
include("../includes/headerAdmin.php");
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../funciones.php';

if (isset($_POST['btnAddEmploy'])) {
    $name = trim($_POST['name']);
    $firstLastname = trim($_POST['lastName']);
    $secondLastname = trim($_POST['secondLastName']);
    $email = trim($_POST['email']);
    $sex = $_POST['gender'];
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $birthDate = isset($_POST['birthDate']) ? $_POST['birthDate'] : null;
    $workspace = $_POST['seltWorkspace'];

    if ($birthDate) {
        $birthDateObj = new DateTime($birthDate);
        $currentDate = new DateTime();
        $age = $currentDate->diff($birthDateObj)->y;
    } else {
        echo "La fecha de nacimiento es obligatoria.";
        exit;
    }

    $supervisor = $IDUsuario;

    if (empty($name) || empty($firstLastname) || empty($email) || empty($sex) || empty($phone) || empty($password) || empty($birthDate) || empty($workspace)) {
        echo "Por favor, complete todos los campos del formulario.";
        exit;
    }

    try {
        global $db_con; // Usamos la variable global como es las funciones

        $fechaContrato = (new DateTime())->format('Y-m-d'); // Fecha actual en formato Y-m-d
        
        // Preparamos la sentencia de inserción
        $stmt = $db_con->prepare("INSERT INTO empleado (nombre, apelPaterno, apelMaterno, email, sexo, edad, celular, contrasena, fechaContrato, puesto, supervisor) 
                                  VALUES (:nombre, :apePaterno, :apeMaterno, :email, :sexo, :edad, :telefono, :contrasena, :fechaContrato, :puesto, :supervisor)");

        // Vinculamos los parámetros
        $stmt->bindParam(':nombre', $name);
        $stmt->bindParam(':apePaterno', $firstLastname);
        $stmt->bindParam(':apeMaterno', $secondLastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sexo', $sex);
        $stmt->bindParam(':edad', $age);
        $stmt->bindParam(':telefono', $phone);
        $stmt->bindParam(':contrasena', $password);
        $stmt->bindParam(':fechaContrato', $fechaContrato); 
        $stmt->bindParam(':puesto', $workspace);
        $stmt->bindParam(':supervisor', $supervisor);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Los datos del empleado fueron agregados con éxito.');
                    window.location.href = 'employees.php';
                  </script>";
                  // Redirige a la página de lista de empleados
        } else {
            echo "Error al agregar al empleado.";
        }

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>
