<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
?>

<?php 
$vacations = getInfovacations($IDUsuario); 
// Para depurar: imprimir el contenido de $vacations
// echo "<pre>"; print_r($vacations); echo "</pre>";
?>

<section>
    <h2>Table for the vacations</h2>
    <h3>Here you found the vacations request about your Employees or staff under u</h3>
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
                    <td><?= $renglon['numero'] ?? 'N/A' ?></td>
                    <td><?= $renglon['fechaInicio'] ?? 'N/A' ?></td>
                    <td><?= $renglon['fechaFin'] ?? 'N/A' ?></td>
                    <td><?= $renglon['estado'] ?? 'N/A' ?></td>
                    <td><?= $renglon['empleado'] ?? 'N/A' ?></td>
                    <td><a href="modifyVacation.php?id=<?= $renglon['numero'] ?>">Modify</a></td>
                    <td><a href="deleteVacation.php?id=<?= $renglon['numero'] ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>

<?php include "../includes/footer.php"; ?>
