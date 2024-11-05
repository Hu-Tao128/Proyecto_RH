<?php include "../includes/headerAdmin.php" ?>
<section>
    <h2>Table for the rating</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Score</th>
                <th>Evaluation Date</th>
                <th>Comments</th>
                <th>Employee</th>
                <th colspan="2">Options</th>
            </tr>
            <tr>
                <td>0</td>
                <td>0000</td>
                <td>0000</td>
                <td>----</td>
                <td>----</td>
                <td><a href="">Modify</a></td>
                <td><a href="">Delete</a></td>
            </tr>
        </table>
    </div>
    <div>
    <h2>Make a score</h2>
        <form action="" class="formPage">
            <fieldset>
                <div class="firstInput">
                    <label for="code"></label>
                    <input type="text" id="code" name="code" placeholder="Write the code of the rating">
                </div>
                <div>
                    <label for="score"></label>
                    <input type="number" id="score" name="score" placeholder="Score of the employee">
                </div>
                <div>
                    <label for="evaluationDate"></label>
                    <input type="date" id="evaluationDate" name="evaluationDate" >
                </div>
                <div>
                    <label for="comments"></label>
                    <input type="text" id="comments" name="comments" placeholder="Employee performance feedback">
                </div>
                <div>
                    <label for="employee"></label>
                    <input type="number" id="employee" name="employee" placeholder="Number of the employee">
                </div>
                <div>
                    <button type="submit">Make a score</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<?php include "../includes/footer.php" ?>