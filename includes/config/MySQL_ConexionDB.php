<?php
$db_host = "localhost";
$db_name = "rrhh";
$root = "root";
$db_pass = "";

$socket = "/var/run/mysqld/mysqld.sock";

try {
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}", $root, $db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    try {
        // Segundo intento: conexión usando el socket
        $db_con = new PDO("mysql:unix_socket={$socket};dbname={$db_name}", $root, $db_pass);
        $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }
}
?>
