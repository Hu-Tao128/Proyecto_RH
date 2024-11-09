<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$incident = showIncidents();
?>
<section>
    <h2>Table for the incidents</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Type</th>
                <th>Incident Date</th>
                <th>Description</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach($incident as $renglon) { ?></php>
          <tr>
                <td><?=$renglon['numero']?></td>
                <td><?=$renglon['tipo_Incident']?></td>
                <td><?=$renglon['fechaIncident']?></td>
                <td><?=$renglon['descripcion']?></td>
                <?php $name = firstname($renglon['empleado']);?>
                <?php $lastname = lastname($renglon['empleado']);?>
                <td><?=$name." ".$lastname?></td>
                <td><a href="" class="action-modify">Modify</a></td>
                <td><a href="" class="action-delete">Delete</a></td>
            </tr><?php
            } ?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php" ?>
