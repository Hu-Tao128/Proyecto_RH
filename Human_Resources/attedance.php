<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../functions.php"; 
require_once "../admin/functionsAdmin.php"; 

$attandance = getAttendanceAll();
?>
<section>
    <h2>Table for the attandence</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>number</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Employee</th>
                <th>Options</th>
            </tr>
            <?php foreach ($attandance as $renglon) { ?>
            <tr>
                <td><?= $renglon['number']?></td>
                <td><?= $renglon['startDate']?></td>
                <?php
                    if ($renglon['endDate'] == '' || $renglon['endDate'] == null) {?>
                        <td>Working</td><?php
                    }else{?>
                        <td><?= $renglon['endDate']?></td><?php
                    }?>
                <?php 
                $employ = $renglon['employee'];
                $name = firstname($employ);
                $lastname = lastname($employ);?>
                <td><?php echo $name." ".$lastname;?></td>
                <td><a href="deleteAttandance.php?id=<?= $renglon['number']?>&action=delete" class="action-delete">Delete</a></td>
            </tr><?php
            } ?>
        </table>
    </div>
</section>
<?php include "../includes/footer.php" ?>