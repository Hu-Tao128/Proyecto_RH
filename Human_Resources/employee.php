<?php 
include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../admin/functionsAdmin.php"; 
require_once "../functions.php"; 

$employ = getInfoEmploy($IDUsuario);
?>

<section class="container">
      <header>Registration employee</header>
      <form action="../admin/addEmploy.php" class="form" method="POST">
<!---------------------------------------------------------------------------------------->
        <div class="column">
          <div class="input-box">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter the employee's name" required />
          </div>
          <div class="input-box">
            <label for="lastName">Firts Last Name</label>
            <input type="text" id="lastName" name="lastName" placeholder="Firts Last Name" required />
          </div>
        </div>
        
        <div class="column">
          <div class="input-box">
            <label for="secondLastName">Second Last Name</label>
            <input type="text" id="secondLastName" name="secondLastName" placeholder="Second Last Name" required />
          </div>

          <div class="input-box">
            <label for="birthDate">Fecha de nacimiento</label>
            <input type="date" id="birthDate" name="birthDate"  required />
          </div>
        </div>
<!---------------------------------------------------------------------------------------->
        <div class="column">
          <div class="input-box">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email address" required />
          </div>
          <div class="input-box">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="Phone number 555 555 55 55" required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="male" name="gender" value="M" checked required>
              <label for="male">Male</label>
            </div>
            <div class="gender">
              <input type="radio" id="female" name="gender" value="F" required />
              <label for="female">Female</label>
            </div>
          </div>
        </div>
<!-------------------------------------------------------------------------------->
        <div class="column">
          <div class="input-box">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required />
          </div>
          <div class="input-box">
            <label for="seltWorkspace">Select a workspace:</label>
            <select name="seltWorkspace" id="seltWorkspace" required>
            <option value="" class="workspace-option">Workspaces</option>
              <?php 
                  $workspace = listWorkstation();
                  foreach ($workspace as $renglon) { ?>
                  <option value="<?= $renglon['numero'] ?>"><?= $renglon['nombre'] ?></option>
              <?php } ?>
          </select>            
          </div>
        </div>
        <button type="submit" name="btnAddEmploy" class="">Add a employee</button>
      </form>
    </section>

<?php include "../includes/footer.php" ?>
