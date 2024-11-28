<?php
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$rating = showRatingID($id);


foreach($rating as $row){
    $row['code'];
    $row['score'];
    $row['evaluationDate'];
    $row['comments'];
    $row['employee'];
}

?>

<section>
    <h2>Modify a performance</h2>
    <form action="updateRating.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
        </div>
            
            <div>
                <label for="id" >Code: <?php echo $row['code']?> </label>
                <input class="inputID" type="text" id="id" name="id" value=<?php echo $row['code']?>>
            </div>
            <div>
                <label for="evaluationDate">Evaluation Date: <?php echo $row['evaluationDate']?></label>
            </div>
            <div>
                <label for="employee" >Code's employee: <?php echo $row['employee']?></label>
            </div>
            <br>
            <div>
                <label for="score">Score</label>
                <input type="text" id="score" name="score" placeholder="Score of the employee" value=<?php echo $row['score']?> required>
            </div>
            
            <br>
            <div>
                <label for="comments">Comentarys</label>
                <textarea name="comments" id="comments" required placeholder="Write the comments about the score"><?php echo $row['comments']?></textarea>
            </div>

            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>
        </fieldset>
    </form>
    <center>
    <a href="rating.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>