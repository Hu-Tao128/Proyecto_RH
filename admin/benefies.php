<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$benefits = showBenefits();
?>
<section>
    <center>
        <div class="questions">
        <h2>Table for the benefies</h2>
        <p>In this section you can see the benefits that the company's employees have, here you can modify the existing benefits or eliminate them if necessary.
<br><br>
At the bottom there is a form to add new benefits.</p>
        </div>
    </center>
<br>
    <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach($benefits as $renglon) { ?>
            <tr>
                <td><?=$renglon['code']?></td>
                <td><?=$renglon['name']?></td>
                <td><?=$renglon['type']?></td>
                <td><?=$renglon['description']?></td>
                <td><a href="modifyBenefie.php?id=<?php echo $renglon['code']?>" class="action-modify">Modify</a></td>
                <td><a href="deleteBenefies.php?id=<?= $renglon['code']?>&action=delete" class="action-delete">Delete</a></td>
            </tr><?php
            } ?>
        </table>
    </div>
    <div>
        <h2>Make a benefie</h2>
        <form action="addBenefits.php" class="formPage" method="POST">
        <fieldset><br>
                <div class="firstInput">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name of the benefie">
                </div>
                <br>
                <div>
                    <label for="type">Type of the benefie</label>
                    <input type="text" id="type" name="type" placeholder="Write the type of the benefie">
                </div>
                <br>
                <div>
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" placeholder="Description of the benefie">
                </div>
                <br>
                <div>
                    <button type="submit" name="btnBenfits">Make a benefie</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<?php include "../includes/footer.php" ?>
