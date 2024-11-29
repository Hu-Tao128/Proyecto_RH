<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php"; 
require_once "../functions.php"; 

$position = showPosition();

?>

<section>
    <center>
        <div class="questions">
        <h2>Table for the job positions</h2>
        <p>In this section you can see the complete list of job positions that exist in the company</p>
        </div>
    </center>
<br>
    <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Department</th>
            </tr>
            <?php foreach($position as $renglon) {?>
            <tr>
                <td><?= $renglon['code'] ?></td>
                <td><?= $renglon['name']?></td>
                <td><?= $renglon['salary']?></td>
                <td><?= $renglon['departmentCode']?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php"?>