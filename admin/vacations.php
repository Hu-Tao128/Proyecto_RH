<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$vacations = getInfovacations($IDUsuario); 
?>

<section>
    <h2>Table for the vacations</h2>
    <h3>Here you found the vacations request about your Employees</h3>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach ($vacations as $renglon) { ?>
                <tr>
                    <td><?= $renglon['id'] ?? 'N/A' ?></td>
                    <td><?= $renglon['startDate'] ?? 'N/A' ?></td>
                    <td><?= $renglon['endDate'] ?? 'N/A' ?></td>
                    <td><?= $renglon['status'] ?? 'N/A' ?></td>
                    <?php
                        $name = firstname($renglon['employee']); 
                        $lastname = lastname($renglon['employee']);
                    ?>
                    <td><?= $name." ".$lastname ?? 'N/A' ?></td>
                    <td><a href="modifyVacation.php?id=<?= $renglon['id'] ?>&action=accept" class="action-modify">Accept</a></td>
                    <td><a href="modifyVacation.php?id=<?= $renglon['id'] ?>&action=decline" class="action-delete">Decline</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
