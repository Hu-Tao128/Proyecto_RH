<?php
include("configuracion.php");

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : (isset($_GET['accion']) ? $_GET['accion'] : null);

include_once("headerlogin.php");

switch ($accion) {
    case 'marcar':
        ?><script>
            document.title += " Marcar Entrada o Salida - <?= SITENAME ?>";
        </script><?php
        include "marcados.php";
        break;

    case 'formlogin':
        ?><script>
            document.title += " login - <?= SITENAME ?>";
        </script><?php
        include "Session/login.php";
        break;

    case 'sesion':
        ?><script>
            document.title += " login - <?= SITENAME ?>";
        </script><?php
        include "Session/loginProcess.php";
        break;

    case 'conexion':
        ?><script>
            document.title += " login - <?= SITENAME ?>";
        </script><?php
        include "Session/conexion.php";
        break;

    default:
        if (isset($_SESSION['usuario'])) {
            ?>
            <script>
                document.title += " <?= SITENAME ?>";
            </script>
            <?php
            include "pagina_especifica.php";
        } else {
            ?>
            <script>
                document.title += " <?= SITENAME ?>";
            </script>
            <?php
            include "principal.php";
        }

        break;
}

include_once("footer.php");
?>
