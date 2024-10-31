<?php
$servername = "servername"; // Nombre/IP del servidor
$database = "databasename"; // Nombre de la BBDD
$username = "username"; // Nombre del usuario
$password = "password"; // Contraseña del usuario
// Creamos la conexión
$con = mysqli_connect($servername, $username, $password, $database);
// Comprobamos la conexión
if (!$con) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
echo "Conexión satisfactoria";
mysqli_close($con);
?>

<?php
try {
    $host = "hostname";
    $dbname = "databasename";
    $username = "username";
    $password = "password";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    echo "Conexión satisfactoria";
} catch (PDOException $e) {
    die("No se pudo conectar con databasename :" . $e->getMessage());
}
?>

<?php
$connection = mysql_connect("localhost", "username", "password");
if (!$connection) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("database_name", $connection);
mysql_close($connection);
?>