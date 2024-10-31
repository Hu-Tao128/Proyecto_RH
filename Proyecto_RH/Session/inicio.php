<?php
session_start(); 

if (!isset($_SESSION['cliente_session'])) {
    header("Location: login.php");
    exit();
}

require_once '../MySQL_ConexionDB.php';
require_once '../funciones.php';

$Usuario = $_SESSION['cliente_session'];
$nombre = callEmpleados($Usuario);

include_once("../header.php");

?>
</br>
</br>
</br>
<section>
    <div>
        <img src="../admin/Imagenes/R.jpeg" height="250rem">
    </div>
    <div>
        <h2>Imagen de usuario: <?php echo $Usuario . ' - ' . htmlspecialchars($nombre); ?></h2>
    </div>
    <div></div>
</section>

<style>
    .navbar {
    background: rgba(0,0,0,0.7);
    width: 100%;
    position: fixed;
    z-index: 100;
}
  
nav {
    float: left;
}
  
nav ul {
    list-style: none;
    overflow: hidden; 
}
  
nav ul li {
    float: left;
    font-family: Arial, sans-serif;
    font-size: 16px;
}

nav ul li a {
    display: block;
    padding: 10px;
    color: #fff;
    text-decoration: none;
}

nav ul li:hover {
    background: #eca023;
}
</style>
<?php
include "../footer.php";
?>
