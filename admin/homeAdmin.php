<?php include "../includes/headerAdmin.php";
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../functions.php';

$info = getUserInfo($IDUsuario);
            foreach ($info as $infos) {
                $firstname = $infos['firstName'];
                $lastname = $infos['lastName']." ".$infos['middleName'];
                $contract = $infos['contractDate'];
}

$workspace = workspace($IDUsuario);
$salary = salary($IDUsuario);
?>

<section class="homeInfo">
    <div class="moreInfo">
        <h2>Welcome to the human resources system</h2>
        <p>
        Welcome to the company's human resources page, here you can see your personal information and perform the actions of an administrator, such as viewing the information in the database and being able to change it.
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
            Salary: <?php echo $salary; ?> $ <br>
            Benefits: <br>  
            
            <?php 
                $beneficios = showBenefits();
                foreach ($beneficios as $beneficio) {
                    echo $beneficio['name'] . "\n"; ?> <br><?php
                }
            ?>
        </p>
    </div>
</section>

<section class="container_home">
    <div class="home_first_div">
        <h3>Inclusion message</h3>
        <p>
            In this company, we believe that every person counts. Use this space to assert your rights, consult resources and continue growing with us.
        </p>
    </div>
    <div class="home_first_div">
        <h3>Motivational Message</h3>
        <p>
            Remember! Your growth is the engine of our success. Use this platform to achieve your personal and professional goals with the support you need.
        </p>
    </div>
</section>


<?php include "../includes/footer.php";?>