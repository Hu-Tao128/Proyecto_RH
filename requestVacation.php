<?php include "includes/header.php";
require_once "includes/config/MySQL_ConexionDB.php";
require_once "functions.php";


$vacations = vacactions($IDUsuario);
?>
<section>
    <center>
        <div class="questions">
        <h2>Request Vacation</h2>
        <p>In this section you can request your vacation, indicating the start and end date. You can also see your history of requests made and their status.</p>
        </div>
    </center>

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
        <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
            <?php 
                foreach($vacations as $renglon){ ?>
            <tr>
                <td><?=$renglon['startDate']?></td>
                <td><?=$renglon['endDate']?></td>
                <td><?=$renglon['status']?></td>
            </tr><?php
                }   ?>
        </table>
        </div>
        
    </div>
        <?php
    }
    ?>
</section>
