<?php
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$aplication = showAplicationID($id);


foreach($aplication as $row){
    $row['id'];
    $row['publicationDate'];
    $row['status'];
    $row['employee'];
    $row['promotion'];
}

?>

<section>
    <h2>Modifiy a aplication</h2>
    <form action="updateAplication.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
            </div>
            
            <div>
                <label for="id" >ID </label>
                <input type="text" id="id" name="id" value=<?php echo $row['id']?> readonly>
            </div>
            <br>
            <div>
                <label for="publicationDate">Date of the aplication</label>
                <input type="date" id="publicationDate" name="publicationDate" value="<?php echo $row['publicationDate']?>" readonly>
            </div>
            <br>
            <div>
                <label for="status">Status</label>
                <input type="text" id="status" name="status" placeholder="Write the status of the aplication" value=<?php echo $row['status']?> required>
            </div>
            <br>
            <div>
                <label for="employee">Employee</label>
                <input type="text" id="employee" name="employee" value=<?php echo $row['employee']?> readonly>
            </div>
            <br>
            <div>
                <label for="promotion">Promotion</label>
                <input type="text" id="promotion" name="promotion" value=<?php echo $row['promotion']?> readonly>
            </div>
            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>

        </fieldset>
    </form>
    <center>
    <a href="aplications.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>