<?php
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
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
                <label for="code" >Code: <?php echo $row['code']?></label>
                <input class="inputID" type="text" id="code" name="code" value=<?php echo $row['code']?> readonly>
            </div>
            <div>
                <label for="publicationDate">Publication date: <?php echo $row['publicationDate']?> </label>
            </div>
            <br>
            <div>
                <label for="name">Name of the promotion</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']?>" required placeholder="Write the name of the promotion">
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description"><?php echo $row['description']?></textarea>
            </div>
            <br>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <br>
            
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