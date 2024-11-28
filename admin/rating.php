<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$rating = showRatings($IDUsuario);
?>

<section>
    <h2>Table for the rating</h2>
    <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Score</th>
                <th>Evaluation Date</th>
                <th>Comments</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach($rating as $renglon) {?>
            <tr>
                <td><?= $renglon['id'] ?></td>
                <td><?= $renglon['score']?></td>
                <td><?= $renglon['evaluationDate']?></td>
                <td><?= $renglon['comments']?></td>
                <td><?= $renglon['employee']?></td>
                <td><a href="modifiyRating.php?id=<?php echo $renglon['id']?>" class="action-modify">Modify</a></td>
                <td><a href="deleteRating.php?id=<?php echo $renglon['id']; ?>&action=delete" class="action-delete">Delete</a></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <div>
    <h2>Make a score</h2>
    <form action="addPerformance.php" class="formPage" method="POST">
            <fieldset><br>
            <div class="firstInput">
                    <label for="score">Score</label>
                    <input type="number" id="score" name="score" placeholder="Score of the employee">
                </div>
                <br>
                <div>
                    <label for="evaluationDate">Evaluation Date</label>
                    <input type="date" id="evaluationDate" name="evaluationDate" >
                </div>
                <br>
                <div>
                    <label for="comments">Comentarys</label>
                    <textarea name="comments" id="comments"></textarea>
                </div>
                <br>
                <div>
                    <label for="employee">Select a Employee:</label>
                    <select name="employee" id="employee" required>
                        <option value="">-- Employee --</option>
                        <?php 
                            $employees = getInfoEmploy($IDUsuario);
                            foreach ($employees as $renglon) { ?>
                            <option  value="<?= htmlspecialchars($renglon['code']) ?>"><?= htmlspecialchars($renglon['firstName']." ".$renglon['lastName']." ".$renglon['middleName']) ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div>
                    <button type="submit" name="btnAddPerformance">Make a score</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<?php include "../includes/footer.php" ?>
