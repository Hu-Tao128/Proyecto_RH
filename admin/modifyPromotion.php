<?php
include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$promotion = showPromotionID($id);


foreach($promotion as $row){
    $row['code'];
    $row['name'];
    $row['description'];
    $row['status'];
    $row['publicationDate'];
}

?>

<section>
    <h2>Modifiy a promotion</h2>
    <form action="updatePromotion.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
            </div>
            
            <div>
                <label for="code" >Code </label>
                <input type="text" id="code" name="code" value=<?php echo $row['code']?> readonly>
            </div>
            <br>
            <div>
                <label for="name">Name of the benefie</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']?>" required placeholder="Write the name of the benefie">
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"><?php echo $row['description']?></textarea>
            </div>
            <br>
            <div>
                <label for="status">Status</label>
                <input type="text" id="status" name="status" required value="<?php echo $row['status']?>" placeholder="Write the status of the promotion">
            </div>
            <br>
            <div>
                <label for="publicationDate">Publication date</label>
                <input type="date" id="publicationDate" name="publicationDate" value=<?php echo $row['publicationDate']?> readonly>
            </div>
            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>
        </fieldset>
    </form>
    <center>
    <a href="promotions.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>