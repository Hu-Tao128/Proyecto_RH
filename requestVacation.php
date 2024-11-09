<?php include "includes/header.php";
require_once "includes/config/MySQL_ConexionDB.php";
require_once "functions.php";


$vacations = vacactions($IDUsuario);
?>
<section>
    <h2>Request Vacation</h2>
    <form action="addVacation.php" class="formPage" method="post">
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
            </div>
            <div>
                <button type="submit" name="btnaddVacation">Request vacation</button>
            </div>
        </fieldset>
    </form>
    <?php
    if (!empty($vacations)){?>

<div>
        <br><br><br>
        <h2>Requested Vacations</h2>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
            <?php 
                foreach($vacations as $renglon){ ?>
            <tr>
                <td><?=$renglon['fechaInicio']?></td>
                <td><?=$renglon['fechaFin']?></td>
                <td><?=$renglon['estado']?></td>
            </tr><?php
                }   ?>
        </table>
    </div>
        <?php
    }
    ?>
</section>

<?php include "includes/footer.php" ?>