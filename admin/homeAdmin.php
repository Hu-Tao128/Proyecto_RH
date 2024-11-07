<?php include "../includes/headerAdmin.php";
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../funciones.php';

$info = getUserInfo($IDUsuario);
            foreach ($info as $infos) {
                $firstname = $infos['nombre'];
                $lastname = $infos['apelPaterno']." ".$infos['apelMaterno'];
                $contract = $infos['fechaContrato'];
}

$workspace = workspace($IDUsuario);
$salary = salary($IDUsuario);
?>

<section class="container_home">
    <div class="home_first_div">
        <h3>User Information</h3>
        <p>
            Firstname: <?php echo $firstname; ?> <br>
            Lastname: <?php echo $lastname; ?> <br>
            Workstation: <?php echo $workspace; ?> <br>
            Contract date: <?php echo $contract; ?> <br>
        </p>
    </div><!--
    <div class="home_first_div">
        <h3>Attendance</h3>
        <p>
            Mark today's attendance
        </p>
        <div class="home_button">
            <button>Mark attendance</button>
        </div>
        
    </div>-->
    <div class="home_first_div">
        <h3>Other Information</h3>
        <p>
            Performance: Performance <br>
            Salary: <?php echo $salary; ?> $ <br>
            Benefits: <br>  
            
            <?php 
                $beneficios = showBenefits();
                foreach ($beneficios as $beneficio) {
                    echo $beneficio['nombre'] . "\n"; ?> <br><?php
                }
            ?>
        </p>
    </div>
</section>

<?php include "../includes/footer.php";?>