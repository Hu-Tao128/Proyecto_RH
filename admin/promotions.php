<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 

$promotion = showPromotion();
?>
<section>
    <center>
        <div class="questions">
        <h2>Table for the promotions</h2>
        <p>In this section you can see the promotions for which employees can apply. Here you can modify the information of the promotions, activate or deactivate them so that they appear or do not appear in the employee promotions section, you can also delete the promotions if necessary.
<br><br>
At the bottom there is a form to add new promotions.</p>
        </div>
    </center>
<br>
<div class="scroll">
    <table border="1" class="tableAdmin">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Publication Date</th>
            <th colspan="3">Options</th>
        </tr>
        <?php foreach ($promotion as $renglon) {    ?>
        <tr>
            <td><?=$renglon['code']?></td>
            <td><?=$renglon['name']?></td>
            <td><?=$renglon['description']?></td>
            <td><?=$renglon['status']?></td>
            <td><?=$renglon['publicationDate']?></td>
            <td>
                <?php if ($renglon['status'] === 'Inactive') { ?>
                    <a href="changeStatus.php?id=<?php echo $renglon['code']?>&action=active" class="action-modify">Activate</a>
                <?php } else { ?>
                    <a href="changeStatus.php?id=<?php echo $renglon['code']?>&action=inactive" class="action-delete">Inactivate</a>
                <?php } ?>
            </td>
            <td><a href="modifyPromotion.php?id=<?php echo $renglon['code']?>" class="action-modify">Modify</a></td>
            <td><a href="deletePromotion.php?id=<?php echo $renglon['code']?>&action=delete&user=<?php echo $IDUsuario?>" class="action-delete">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</div>
<div>
    <h2>Make a promotion</h2>
    <form action="addPromotion.php" class="formPage" method="POST">
        <fieldset><br>
            <div class="firstInput">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Name of the promotion">
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Description of the promotion">
            </div>
            <br>
            <div>
                <button type="submit" name="btnAddPromotion">Make a promotion</button>
            </div>
        </fieldset>
    </form>
</div>
</section>
<?php include "../includes/footer.php" ?>