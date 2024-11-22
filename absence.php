<?php include "includes/header.php";
require_once "includes/config/MySQL_ConexionDB.php";
require_once "functions.php";


$absences = Absences($IDUsuario);
?>
<section>
    <h2>Justify Absence</h2>
    <form action="addAbsence.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
            </div>
            <br>
            <div>
                <label for="startDate">Start date</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <br>
            <div>
                <label for="endDate">End Date</label>
                <input type="date" id="endDate" name="endDate" required>
            </div><br>
            <div>
                <label for="type">Type</label>
                <input type="text" id="type" name="type" placeholder="Type" required> 
            </div><br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
                 
            </div><br>
            <div>
                <button type="submit" name="btnAbsence">Request Justify Absence</button>
            </div>
        </fieldset>
    </form>
    <?php
    if (!empty($absences)){?>

<div>
        <br><br><br>
        <h2>Requested Absences</h2>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>type</th>
                <th>Description</th>
            </tr>
            <?php 
                foreach($absences as $renglon){ ?>
            <tr>
                <td><?=$renglon['startDate']?></td>
                <td><?=$renglon['endDate']?></td>
                <td><?=$renglon['status']?></td>
                <td><?=$renglon['type']?></td>
                <td><?=$renglon['description']?></td>
            </tr><?php
                }   ?>
        </table>
    </div>
        <?php
    }
    ?>
</section>
<?php include "includes/footer.php" ?>