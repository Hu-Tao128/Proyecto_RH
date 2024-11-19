<?php include "../includes/headerAdmin.php";

require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php";
require_once "../functions.php";

$tickets = showTickets();

?>
<section>
    <h2>Table for the tickets</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Date</th>
                <th>Description</th>
                <th>Status</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php
                foreach ($tickets as $ticket=>$renglon) {?>
            <tr>
                    <td><?=$renglon['numero']?></td>
                    <td><?=$renglon['fecha']?></td>
                    <td><?=$renglon['descripcion']?></td>
                    <td><?=$renglon['estado']?></td><?php
                    $employ = $renglon["empleado"];

                    $firstname = firstname($employ);
                    $lastname = lastname($employ);
                    ?>
                    <td><?php echo $firstname." ".$lastname; ?></td><?php
                ?>
                <td><a href="" class="action-modify">Modify</a></td>
                <td><a href="deleteTickets.php?id=<?php echo $renglon['numero']?>&action=delete" class="action-delete">Delete</a></td>
            </tr><?php
        }?>
        </table>
    </div>
</section>
<?php include "../includes/footer.php" ?>
