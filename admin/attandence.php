<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../funciones.php"; 
require_once "functionsAdmin.php"; 

$attandance = showApplication();
?>
<section>
    <h2>Table for the attandence</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Description</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach ($attandance as $renglon) { ?>
            <tr>
                <td>0</td>
                <td>0000</td>
                <td>0000</td>
                <td>----</td>
                <td>----</td>
                <td>0</td>
                <td><a href="">Modify</a></td>
                <td><a href="">Delete</a></td>
            </tr><?php
            } ?>
        </table>
    </div>
</section>
<?php include "../includes/footer.php" ?>