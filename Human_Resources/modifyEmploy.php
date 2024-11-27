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
                <label for="code" >Code </label>
                <input type="text" id="code" name="code" value=<?php echo $row['code']?> readonly>
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
                <label for="gender" >Gender's employee </label>
                <input type="text" id="gender" name="gender" value=<?php echo $row['gender']?> readonly>
            </div>
            <br>
            <div>
                <label for="age">Age of the employee</label>
                <input type="text" id="age" name="age" value=<?php echo $row['age']?> readonly>
            </div>
            <br>
            <div>
                <label for="image">Image of the employee</label>
                <input type="text" id="image" name="image" value=<?php echo $row['image'] ?? 'NULL'?> readonly>
            </div>
            <br>
            <div>
                <label for="mobile">Mobile of the employee</label>
                <input type="number" id="mobile" name="mobile" value=<?php echo $row['mobile']?> required>
            </div>
            <br>
            <div>
                <label for="password">Password of the employee</label>
                <input type="text" id="password" name="password" value=<?php echo $row['password']?> readonly>
            </div>
            <br>
            <div>
                <label for="contractDate">Contract date of the employee</label>
                <input type="date" id="contractDate" name="contractDate" value=<?php echo $row['contractDate']?> readonly>
            </div>
            <br>
            <div>
                <label for="status">Status of the employee</label>
                <input type="text" id="status" name="status" value=<?php echo $row['status']?> required>
            </div>
            <br>
            <div>
                <label for="positionCode">Position Code of the employee</label>
                <input type="text" id="positionCode" name="positionCode" value=<?php echo $row['positionCode']?> readonly>
            </div>
            <br>
            <div>
                <label for="supervisorId">Supervisor Id Code of the employee</label>
                <input type="text" id="supervisorId" name="supervisorId" value=<?php echo $row['supervisorId'] ?? "NULL"?> readonly>
            </div>
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