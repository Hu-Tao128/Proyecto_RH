<?php
include "../includes/headerProcess.php";
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../functions.php';
session_start();

$db_host = "localhost";
$db_name = "rrhh";
$root = "root";
$db_pass = "";

try {		
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $root, $db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    exit(); 
}

if (isset($_POST['btnLogin'])) {
    $Usuario = trim($_POST['code']);
    $Contrasena = trim($_POST['password']);
    
    try {			
        $stmt = $db_con->prepare("SELECT * FROM empleado WHERE numero = :usuario");
        $stmt->bindParam(':usuario', $Usuario, PDO::PARAM_INT); 
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        
        $DBContrasena = ($count == 0) ? "" : $row['contrasena'];
        
        if ($DBContrasena === $Contrasena) {
            $_SESSION['usuario'] = $row['numero'];
           
            $info = getUserInfo($Usuario);
            foreach ($info as $infos) {
                $supervisor = $infos['supervisor'];
            }

            if (empty($supervisor)) {
                header("Location: ../admin/homeAdmin.php");
            } else {
                header("Location: ../home.php");
                exit();
            }
        } else {
            echo '<br/><center><p>Upss... user or password is incorrect</p>';
            echo '<input type="button" class="loginButton" value="Try again" onclick="self.location=\'login.php\'" /></center>';
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}

include_once("../includes/footer.php");
?>
