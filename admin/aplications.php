<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../functions.php"; 
require_once "functionsAdmin.php"; 

$Application = showApplication();
?>
<section>
    <h2>Table for the aplications</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Publication Date</th>
                <th>Status</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach ($Application as $renglon){ ?>
            <tr>
                <td><?=$renglon['numero']?></td>
                <td><?=$renglon['fechaPub']?></td>
                <td><?=$renglon['estado']?></td>
                <?php $name = firstname($renglon['empleado']);?>
                <?php $lastname = lastname($renglon['empleado']);?>
                <td><?=$name." ".$lastname?></td>
                <td><a href="" class="action-modify">Modify</a></td>
                <td><a href="" class="action-delete">Delete</a></td>
            </tr><?php
            }   ?>
        </table>
    </div>
</section>
<?php include "../includes/footer.php" ?>
