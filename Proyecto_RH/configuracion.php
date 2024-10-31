<?php
if($_SERVER['SERVER_NAME']=='localhost' || $_SERVER['SERVER_NAME']=='127.0.0.1')
{
    define('ROOTURL','http://'.$_SERVER['SERVER_NAME'].'/Proyecto_RH/');
    define('DOCROOT',$_SERVER['DOCUMENT_ROOT'].'/Proyecto_RH/');

    define('SITENAME','Proyecto RH');
    define('AUTOR','Integramigos');
    define('CSS',ROOTURL.'css/');
    define('JS',ROOTURL.'js/');
    define('IMG',ROOTURL.'Imagenes/');

    define('IMAGES_ORIGEN','http://'.$_SERVER['SERVER_NAME'].'/Proyecto_RH/admin/');

    define('DBHOST','localhost');
    define('DBUSER','root');    
    define('DBPASSWD','');
    define('DBNAME','rrhh');

    define('HEADER',DOCROOT.'header.php');
    define('FOOTER',DOCROOT.'footer.php');

}

include_once('funciones.php');
session_start();
ini_set("display_errors","On");
?>