<?php include "includes/header.php";

require_once 'includes/config/MySQL_ConexionDB.php';
require_once 'functions.php';

$info = getUserInfo($IDUsuario);
            foreach ($info as $infos) {
                $firstname = $infos['nombre'];
                $lastname = $infos['apelPaterno']." ".$infos['apelMaterno'];
                $contract = $infos['fechaContrato'];
                $supervisor = $infos['supervisor'];
}

$workspace = workspace($IDUsuario);
$nameS = firstname($supervisor);
$SupLastNames = lastname($supervisor);
$salary = salary($IDUsuario);

//mi priner commit
?>
<section class="homeInfo">
    <div class="moreInfo">
        <h2>Welcome to the human resources system</h2>
        <p>
        Welcome to the company's human resources page, here you can see your personal information and perform certain actions such as requesting your vacation, making a complaint, among others.
        </p>
    </div>
    
    
    
</section>

<section class="container_home">
    <div class="home_first_div">
        <h3>User Information</h3>
        <p>
            Firstname: <?php echo $firstname; ?> <br>
            Lastname: <?php echo $lastname; ?> <br>
            Workstation: <?php echo $workspace; ?> <br>
            Contract date: <?php echo $contract; ?> <br>
            <?php 
                if ($supervisor != "" && $supervisor != null) { ?>
                    Supervisor: <?php echo $nameS." ".$SupLastNames; ?> <br> 
            <?php } ?>
        </p>
    </div>
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

<?php include "includes/footer.php" ?>
