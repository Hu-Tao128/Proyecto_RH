<?php include "../includes/headerAdmin.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "functionsAdmin.php"; 
require_once "../functions.php"; 

$employ = getInfoEmploy($IDUsuario);
?>
<section>
    <h2>Table for the Employees</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Name</th>
                <th>Last Names</th>
                <th>Email</th>
                <th>CellPhone number</th>
                <th>Workstation</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach($employ as $renglon) {?>
            <tr>
                <tr>
                <td><?= $renglon['numero']?></td>
                <td><?= $renglon['nombre']?></td>
                <td><?= $renglon['apelPaterno']." ".$renglon['apelMaterno']?></td>
                <td><?= $renglon['email']?></td>
                <td><?= $renglon['celular']?></td>
                <?php $workspace = workspace($renglon['numero']); ?>
                <td><?php echo $workspace; ?></td>
                <td><a href="" class="action-modify">Modify</a></td>
                <td><a href="" class="action-delete">Delete</a></td>
            </tr>
        <?php } ?>
        </table>
    </div>
    <div class="ContainerXD">
    <br>
    <h2 class="h2formX">Add a employee</h2>
    <form action="addEmploy.php" class="form-empleadoX" method="POST">
        <fieldset>
            <div class="divformX">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Write the name of the employee" required>
            </div>
            <div class="divformX">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="First Lastname" required>
            </div>
            <div class="divformX">
                <label for="secondLastName">Second Lastname</label>
                <input type="text" id="secondLastName" name="secondLastName" placeholder="Second Lastname">
            </div>
            <div class="divformX">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="containerformX bottonformX">
                <label>Gender:</label>
                <div>
                    <input type="radio" id="male" name="gender" value="M" required>
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="F" required>
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="divformX">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Phone number 555 555 55 55" required>
            </div>
            <div class="divformX">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="divformX">
                <label for="birthDate">Fecha de Nacimiento:</label>
                <input type="date" id="birthDate" name="birthDate" required>
            </div>
            <div class="divformX">
                <label for="seltWorkspace">Select a workspace:</label>
                <select name="seltWorkspace" id="seltWorkspace" required>
                    <option value="">-- workspaces --</option>
                    <?php 
                        $workspace = listWorkstation();
                        foreach ($workspace as $renglon) { ?>
                        <option value="<?= $renglon['codigo'] ?>"><?= $renglon['nombre'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="bottonformX">
                <button type="submit" name="btnAddEmploy" class="Botton-envioX">Add a employee</button>
            </div>
        </fieldset>
    </form>
</div>
</section>

<?php include "../includes/footer.php" ?>