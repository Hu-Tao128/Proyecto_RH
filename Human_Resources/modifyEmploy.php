<?php
include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
include "../admin/functionsAdmin.php";
require_once "../functions.php"; 
require_once "../includes/config/connectdb.php";

$id = $_GET["id"];

$users = showEmployeeID($id);


foreach($users as $row){
    $row['code'];
    $row['firstName'];
    $row['lastName'];
    $row['middleName'];
    $row['gender'];
    $row['age'];
    $row['image'];
    $row['mobile'];
    $row['password'];
    $row['contractDate'];
    $row['status'];
    $row['positionCode'];
    $row['supervisorId'];
}

?>

<section>
    <h2>Modify a Employee</h2>
    <form action="updateEmployee.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
            </div>
            
            <div>
                <label for="code" >Code: <?php echo $row['code']?></label>
                <input class="inputID"type="text" id="code" name="code" value=<?php echo $row['code']?> readonly>
            </div>
            <div>
                <label for="gender" >Gender's employee: <?php echo $row['gender']?></label>
            </div>
            
            <div>
                <label for="age">Age of the employee: <?php echo $row['age']?> </label>
            </div>
            <div>
                <label for="image">Image of the employee: <?php echo $row['image'] ?? 'NULL'?> </label>
            </div>
            <div>
                <label for="password">Password of the employee: <?php echo $row['password']?></label>

            </div>
            <div>
                <label for="contractDate">Contract date of the employee: <?php echo $row['contractDate']?></label>
            </div>
            <div>
                <label for="positionCode">Position Code of the employee: <?php echo $row['positionCode']?></label>
            </div>
            <div>
                <label for="supervisorId">Supervisor Id Code of the employee: <?php echo $row['supervisorId'] ?? "NULL"?></label>
            </div>
            <br>
            <div>
                <label for="firstName">FirstName</label>
                <input type="text" id="firstName" name="firstName" placeholder="Write the firstName of the employee" value=<?php echo $row['firstName']?> required>
            </div>
            <br>
            <div>
                <label for="lastName">LastName</label>
                <input type="text" id="lastName" name="lastName" value=<?php echo $row['lastName']?> required>
            </div>
            <br>
            <div>
                <label for="middleName">Second LastName</label>
                <input type="text" id="middleName" name="middleName" placeholder="Write the Second lastname of the employee" value=<?php echo $row['middleName']?> required>
            </div>
            <br>
            <div>
                <label for="mobile">Mobile of the employee</label>
                <input type="number" id="mobile" name="mobile" value=<?php echo $row['mobile']?> required>
            </div>
            <br>
            <div>
                <label for="status">Status of the employee</label>
                <select name="status" id="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Unlinked">Unlinked</option>
                </select>
            </div>
            <br>

            <div>
                <button type="submit" name="btnReport">Update</button>
            </div>
        </fieldset>
    </form>
    <center>
    <a href="employee.php"><button class="buttonCancel">Cancel</button></a>
    </center>
    
    
</section>

<?php include "../includes/footer.php" ?>