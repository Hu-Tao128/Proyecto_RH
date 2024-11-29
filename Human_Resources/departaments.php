<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php"; 
require_once "../functions.php"; 

$departament = showDepartment();

?>

<section>
    <center>
        <div class="questions">
        <h2>Table for the departments</h2>
        <p>In this section you can see the departments that exist in the company.</p>
        </div>
    </center>
<br>
    <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>name</th>
            </tr>
            <?php foreach($departament as $renglon) {?>
            <tr>
                <td><?= $renglon['code'] ?></td>
                <td><?= $renglon['name']?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php"?>