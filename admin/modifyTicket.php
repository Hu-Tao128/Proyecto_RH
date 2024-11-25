<?php
include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$ticket = showTicketsID($id);


foreach($ticket as $row){
    $row['id'];
    $row['date'];
    $row['description'];
    $row['status'];
    $row['employee'];
}

?>

<section>
    <h2>Modifiy a ticket</h2>
    <form action="updateTicket.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
            </div>
            
            <div>
                <label for="id" >ID </label>
                <input type="text" id="id" name="id" value=<?php echo $row['id']?> readonly>
            </div>
            <br>
            <div>
                <label for="date">Date of the ticket</label>
                <input type="date" id="date" name="date" value=<?php echo $row['date']?> readonly>
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required placeholder="Write the description"><?php echo $row['description']?></textarea>
            </div>
            <br>
            <div>
                <label for="status">Status</label>
                <input type="text" id="status" name="status" required palceholder="The status of the ticket" value="<?php echo $row['status']?>">
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
    <a href="tickets.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>