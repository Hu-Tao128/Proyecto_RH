<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../funciones.php"; 

$employ = getInfoEmploy($IDUsuario);
?>
<section>
    <h2>Table for the Employees</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Second Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
                <th>CellPhone number</th>
                <th>Password</th>
                <th>Contract Date</th>
                <th>Workstation</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach($employ as $renglon) {?>
            <tr>
                <tr>
                <td><?= $renglon['numero']?></td>
                <td><?= $renglon['nombre']?></td>
                <td><?= $renglon['apelPaterno']?></td>
                <td><?= $renglon['apelMaterno']?></td>
                <td><?= $renglon['email']?></td>
                <td><?= ($renglon['sexo'] ?? '') === 'F' ? 'Female' : 'Male';?></td>
                <td><?= $renglon['edad']?></td>
                <td><?= $renglon['celular']?></td>
                <td><?= $renglon['contrasena']?></td>
                <td><?= $renglon['fechaContrato']?></td>
                <?php $workspace = workspace($renglon['numero']); ?>
                <td><?php echo $workspace; ?></td>
                <td><a href="">Modify</a></td>
                <td><a href="">Delete</a></td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <div>
        <br>
        <h2>Add a employee</h2>
        <form action="" class="formPage">
            <fieldset>
                <div class="firstInput">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" placeholder="Write the name of the employee">
                </div>
                <div>
                    <label for="lastName"></label>
                    <input type="text" id="lastName" name="lastName" placeholder="First Lastname">
                </div>
                <div>
                    <label for="secondLastName"></label>
                    <input type="text" id="secondLastName" name="secondLastName" placeholder="Second Lastname">
                </div>
                <div>
                    <label for="email"></label>
                    <input type="text" id="email" name="email" placeholder="Email">
                </div>
                <div>
                    <label for="gender"></label>
                    <input type="text" id="gender" name="gender" placeholder="Gender">
                </div>
                <div>
                    <label for="phone"></label>
                    <input type="text" id="phone" name="phone" placeholder="Phone number 555 555 55 55">
                </div>
                <div>
                    <label for="password"></label>
                    <input type="text" id="password" name="password" placeholder="Password">
                </div>
                <div>
                    <label for="contractDate"></label>
                    <input type="date" id="contractDate" name="contractDate">
                </div>
                <div>
                    <label for="workstation"></label>
                    <input type="text" id="workstation" name="workstation" placeholder="The Workstation">
                </div>
                <div>
                    <label for="supervisor"></label>
                    <input type="number" id="supervisor" name="supervisor" placeholder="Number of the supervisor">
                </div>
                <div>
                    <button type="submit">Add a employee</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php include "../includes/footer.php" ?>