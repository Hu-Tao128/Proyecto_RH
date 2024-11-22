<?php
include "../includes/headerProcess.php";
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../functions.php';

session_start();

if (isset($_POST['btnLogin'])) {
    $User = trim($_POST['code']);
    $Contrasena = trim($_POST['password']);
    
    try {			
        global $db_con;
        $stmt = $db_con->prepare("SELECT * FROM employee WHERE code = :user");
        $stmt->bindParam(':user', $User, PDO::PARAM_STR); 
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        
        $DBContrasena = ($count == 0) ? "" : $row['password'];
        
        if ($DBContrasena === $Contrasena) {
            $_SESSION['user'] = $row['code'];
           
            $info = getUserInfo($User);
            foreach ($info as $infos) {
                $supervisor = $infos['supervisorId'];
            }

            if (empty($supervisor)) {
                if(department($User) == 'D001') {
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
