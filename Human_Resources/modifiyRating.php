<?php
include "../includes/headerRH.php";
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

<section class="container py-5">
    <h2 class="text-center mb-4">Modify a Performance</h2>
    <form action="updateRating.php" method="post" class="bg-light p-4 rounded shadow" style="max-width: 600px; margin: 0 auto;">
        <fieldset>
            <div class="mb-3">
                <label for="id" class="form-label">Code</label>
                <input type="text" id="id" name="id" class="form-control" value="<?php echo $row['code']?>" readonly>
            </div>

            <div class="mb-3">
                <label for="evaluationDate" class="form-label">Evaluation Date</label>
                <input type="text" class="form-control" id="evaluationDate" value="<?php echo $row['evaluationDate']?>" readonly>
            </div>

            <div class="mb-3">
                <label for="employee" class="form-label">Code's Employee</label>
                <input type="text" class="form-control" id="employee" value="<?php echo $row['employee']?>" readonly>
            </div>

            <div class="mb-3">
                <label for="score" class="form-label">Score</label>
                <input type="number" id="score" name="score" class="form-control" min="1" max="100" placeholder="Score of the employee" value="<?php echo $row['score']?>" required>
            </div>

            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea name="comments" id="comments" class="form-control" placeholder="Write the comments about the score" rows="4" style="resize: none;" required><?php echo $row['comments']?></textarea>
            </div>

            <div class="text-center">
                <button type="submit" name="btnReport" class="btn btn-primary px-4">Update</button>
                <a href="rating.php" class="btn btn-secondary px-4 ms-2">Cancel</a>
            </div>
        </fieldset>
    </form>
</section>


<?php include "../includes/footer.php" ?>