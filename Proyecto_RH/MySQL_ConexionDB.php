<?php
require_once '../configuracion.php';
$db_host = "localhost";
$db_name = "rrhh";
$root = "root";
$db_pass = "";

try{		
	$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$root,$db_pass);
	
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo $e->getMessage();
}
?>