<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/perfil.css">
    
    <script src="node_modules/chart.js/dist/chart.umd.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <?php
    include_once("../functions.php");

        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: ../index.php");
            exit();
        }

        $IDUsuario = $_SESSION['user'];

        if (getStatus($IDUsuario) != 'Active'){
            header("Location: ../Session/logout.php");
            exit();
        }

        if(department($IDUsuario) != "D001"){
            header("Location: ../homeAdmin.php");
            exit();
        }
        
    ?>
    <title>RH</title>
</head>