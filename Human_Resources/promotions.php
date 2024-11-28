<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php"; 

$promotion = showPromotion();
?>
<section>

<h2>Table for the promotions</h2>
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
            <td><a href="deletePromotion.php?id=<?php echo $renglon['code']?>&action=delete" class="action-delete">Delete</a></td>
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