<?php
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$incidents = showIncidentsID($id);


foreach($incidents as $row){
    $row['id'];
    $row['incidentType'];
    $row['incidentDate'];
    $row['description'];
    $row['employee'];
}

?>

<section>
    <h2>Modifiy a incident</h2>
    <form action="updateIncident.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
        </div>
            
            <div>
                <label for="id" >ID: <?php echo $row['id']?></label>
                <input class="inputID" type="text" id="id" name="id" value=<?php echo $row['id']?>>
            </div>
            <div>
                <label for="employee" >Code's employee: <?php echo $row['employee']?></label>
            </div>
            <div>
                <label for="dateIncident">Date of the incident: <?php echo $row['incidentDate']?></label>
            </div>
            <br>
            <div>
                <label for="type">Type of the incident</label>
                <input type="text" id="type" name="type" placeholder="Write the type of the incident" value="<?php echo $row['incidentType']?>" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required placeholder="Write the description"><?php echo $row['description']?></textarea>
            </div>
            <br>
            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>
        </fieldset>
    </form>
    <center>
    <a href="complaints.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>