<?php
include "../includes/headerProcess.php";
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../functions.php';
require_once '../includes/config/MySQL_ConexionDB.php';

session_start();

if (isset($_POST['btnLogin'])) {
    $Usuario = trim($_POST['code']);
    $Contrasena = trim($_POST['password']);
    
    try {			
        global $db_con;
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
                if(workspace($Usuario) == 'Analista') {
                    header("location: ../Human_Resources/homeRH.php");
                }else{
                    header("Location: ../admin/homeAdmin.php");
                }
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
