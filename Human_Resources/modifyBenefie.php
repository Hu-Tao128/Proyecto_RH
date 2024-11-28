<?php
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$benefie = showBenefieID($id);


foreach($benefie as $row){
    $row['code'];
    $row['name'];
    $row['type'];
    $row['description'];
}

?>

<section>
    <h2>Modifiy a benefie</h2>
    <form action="updateBenefie.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
        </div>
            
            <div>
                <label for="code" >Code: <?php echo $row['code']?></label>
                <input class="inputID" type="text" id="code" name="code" value=<?php echo $row['code']?> readonly>
            </div>
            <div>
                <label for="name">Name of the benefie</label>
                <input type="text" id="name" name="name" placeholder="Write the name of the benefie" value="<?php echo $row['name']?>" required>
            </div>
            <br>
            <div>
                <label for="type">Type of the benefie</label>
                <input type="text" id="type" name="type" placeholder="Write the type of the benefie" value="<?php echo $row['type']?>" required>
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Write the description"><?php echo $row['description']?></textarea>
            </div>
            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>
        </fieldset>
    </form>
    <center>
    <a href="benefie.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>