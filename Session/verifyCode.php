<?php
include "../includes/headerLogin.php";

require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../functions.php";

if (isset($_POST['btnVerify'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $code = $_POST['codeV'];
    
    // Conectar a la base de datos y verificar el código
    try {
        global $db_con;
    
        // Consulta SQL para obtener el código y la fecha de expiración
        $query = "SELECT verification_code, expires_at FROM password_reset WHERE email = :email";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            // Verificar si el código ingresado coincide
            if ($row['verification_code'] === $code) {
                // Verificar si el código ha expirado
                $expiresAt = new DateTime($row['expires_at']);
                $currentTime = new DateTime();
    
                if ($currentTime < $expiresAt) {
                    // Código válido y no expirado
                    session_start();


                    $_SESSION['user'] = $row['code'];
    
                    echo "<script>
                                alert('The entry was registered correctly.');
                                window.location.href = '../Human_Resources/homeRH.php';
                            </script>";
    
                } else {
                    // El código ha expirado
                    echo "El código ha expirado. Solicita uno nuevo.";
                }
            } else {
                // El código ingresado no coincide
                echo "Código de verificación incorrecto.";
            }
        } else {
            // El correo electrónico no existe en la base de datos
            echo "No se encontró un código de verificación para este correo.";
        }
    } catch (PDOException $e) {
        echo 'Error al verificar el código: ' . $e->getMessage();
    }
}
?>
