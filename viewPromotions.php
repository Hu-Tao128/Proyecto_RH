<?php include "includes/header.php";
require_once "includes/config/MySQL_ConexionDB.php";
require_once "functions.php"; 

$promotion = showPromotions();
$apply = showPromotionsEmploy($IDUsuario);
?>
<section>

    <h2>Table for the promotions</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Publication Date</th>
                <th>Options</th>
            </tr>
            <?php foreach($promotion as $renglon){ ?>
            <tr>
                <td><?=$renglon['code']?></td>
                <td><?=$renglon['name']?></td>
                <td><?=$renglon['description']?></td>
                <td><?=$renglon['publicationDate']?></td>
                <td><a href="applyPromotion.php?id=<?php echo $renglon['code']?>" class="action-modify">Apply</a></td>
            </tr> <?php
            } ?>
        </table>
    </div>

    <?php
        if (!empty($apply)){?>

        <div>
            <br><br><br>
            <h2>My Applies</h2>
            <table border="1" class="tableAdmin">
                <tr>
                    <th>Id</th>
                    <th>Publication Date</th>
                    <th>Status</th>
                    <th>Promotion</th>
                </tr>
                <?php 
                    foreach($apply as $renglon){ ?>
                <tr>
                    <td><?=$renglon['id']?></td>
                    <td><?=$renglon['publicationDate']?></td>
                    <td><?=$renglon['status']?></td>
                    <td><?php echo promotionName($renglon['promotion']);?></td>
                </tr><?php
                    }   ?>
            </table>
        </div><?php
        }
    ?>
</section>
<?php include "includes/footer.php" ?>