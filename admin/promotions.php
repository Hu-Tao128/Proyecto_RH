<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 

$promotion = showPromotions();
?>
<section>

    <h2>Table for the promotions</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Publication Date</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach($promotion as $renglon){ ?>
            <tr>
                <td><?=$renglon['code']?></td>
                <td><?=$renglon['name']?></td>
                <td><?=$renglon['description']?></td>
                <td><?=$renglon['status']?></td>
                <td><?=$renglon['publicationDate']?></td>
                <td><a href="" class="action-modify">Modify</a></td>
                <td><a href="deletePromotion.php?id=<?= $renglon['code']?>&action=delete" class="action-delete">Delete</a></td>
            </tr> <?php
            } ?>
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