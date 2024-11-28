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
                <label for="id" >ID: <?php echo $row['id']?></label>
                <input class="inputID" type="text" id="id" name="id" value=<?php echo $row['id']?> readonly>
            </div>
            <div>
                <label for="publicationDate">Date of the aplication: <?php echo $row['publicationDate']?></label>
            </div>
            
            <div>
                <label for="employee">Employee: <?php echo $row['employee']?></label>
            
            </div>
            <div>
                <label for="promotion">Promotion: <?php echo $row['promotion']?></label>
            </div>
            <br>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="Approved">Approved</option>
                    <option value="Declined">Declined</option>
                </select>

            </div>

            <br>
            
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