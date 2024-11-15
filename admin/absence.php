<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$absences = getInfoAbsences($IDUsuario);
?>
<section>
    <h2>Table for the Request Justify Absences</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Type</th>
                <th>Description</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach ($absences as $renglon) { ?>
                <tr>
                    <td><?= $renglon['Absence'] ?? 'N/A' ?></td>
                    <td><?= $renglon['fechaInicio'] ?? 'N/A' ?></td>
                    <td><?= $renglon['fechaFin'] ?? 'N/A' ?></td>
                    <td><?= $renglon['estado'] ?? 'N/A' ?></td>
                    <td><?= $renglon['tipo'] ?? 'N/A' ?></td>
                    <td><?= $renglon['descripcion'] ?? 'N/A' ?></td>
                    <?php
                        $name = firstname($renglon['empleado']);
                        $lastname = lastname($renglon['empleado']);
                    ?>
                    <td><?= $name . " " . $lastname ?></td>
                    <td><a href="modifyAbsence.php?id=<?= $renglon['Absence'] ?>&action=accept" class="action-modify">Accept</a></td>
                    <td><a href="modifyAbsence.php?id=<?= $renglon['Absence'] ?>&action=decline" class="action-delete">Decline</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
