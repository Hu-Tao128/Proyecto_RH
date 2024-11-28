<?php
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
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
                <label for="id" >ID: <?php echo $row['id']?></label>
                <input class="inputID"type="text" id="id" name="id" value=<?php echo $row['id']?> readonly>
            </div>
            <div>
                <label for="date">Date of the ticket: <?php echo $row['date']?></label>
            </div>
            <div>
                <label for="employee" >Code's employee: <?php echo $row['employee']?></label>
            </div>
            <div>
                <label for="description">Description: <?php echo $row['description']?></label>
            </div>
            <br>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="resolved">resolved</option>
                    <option value="unsolved">unsolved</option>
                </select>
            </div>
            <br>
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