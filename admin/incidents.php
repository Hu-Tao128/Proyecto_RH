<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$incident = showIncidents();
?>
<section>
    <center>
        <div class="questions">
        <h2>Table for the incidents</h2>
        <p>In this section I can see the incident reports made by employees. You can modify certain part of the information and delete a report if necessary</p>
        </div>
    </center>
    <br>
    <div class="scroll">
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
                <td><?=$renglon['id']?></td>
                <td><?=$renglon['incidentType']?></td>
                <td><?=$renglon['incidentDate']?></td>
                <td><?=$renglon['description']?></td>
                <?php $name = firstname($renglon['employee']);?>
                <?php $lastname = lastname($renglon['employee']);?>
                <td><?=$name." ".$lastname?></td>
                <td><a href="modifyIncident.php?id=<?php echo $renglon['id']?>" class="action-modify">Modify</a></td>
                <td><a href="deleteIncident.php?id=<?php echo $renglon['id']; ?>&action=delete&user=<?php echo $IDUsuario?>" class="action-delete">Delete</a></td>
            </tr><?php
            } ?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php" ?>
