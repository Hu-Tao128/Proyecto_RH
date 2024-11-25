<?php
include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "functionsAdmin.php";
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
                <label for="id" >ID </label>
                <input type="text" id="id" name="id" value=<?php echo $row['id']?> readonly>
            </div>
            <br>
            <div>
                <label for="type">Type of the incident</label>
                <input type="text" id="type" name="type" placeholder="Write the type of the incident" value=<?php echo $row['incidentType']?> required>
            </div>
            <br>
            <div>
                <label for="dateIncident">Date of the incident</label>
                <input type="date" id="dateIncident" name="dateIncident" value=<?php echo $row['incidentDate']?> required>
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required><?php echo $row['description']?></textarea>
            </div>
            <div>
                <label for="employee" >Code's employee </label>
                <input type="text" id="employee" name="employee" value=<?php echo $row['employee']?> readonly>
            </div>
            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>
        </fieldset>
    </form>
    <center>
    <a href="incidents.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>