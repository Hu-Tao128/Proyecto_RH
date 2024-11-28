<?php include "../includes/headerHR.php";

require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php";
require_once "../functions.php";

$tickets = showTicketsAll();

?>
<section>
    <h2>Table for the tickets</h2>
    <div class="scroll">
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
                    <td><?=$renglon['id']?></td>
                    <td><?=$renglon['date']?></td>
                    <td><?=$renglon['description']?></td>
                    <td><?=$renglon['statusTicket']?></td><?php
                    $employ = $renglon["employee"];

                    $firstname = firstname($employ);
                    $lastname = lastname($employ);
                    ?>
                    <td><?php echo $firstname." ".$lastname; ?></td><?php
                ?>
                <td><a href="modifyTicket.php?id=<?php echo $renglon['id']?>" class="action-modify">Modify</a></td>
                <td><a href="deleteTickets.php?id=<?php echo $renglon['id']?>&action=delete" class="action-delete">Delete</a></td>
            </tr><?php
        }?>
        </table>
    </div>
</section>
<?php include "../includes/footer.php" ?>
