<?php 
include "includes/header.php";

require_once 'includes/config/MySQL_ConexionDB.php';
require_once 'functions.php';

$info = getUserInfo($IDUsuario)[0] ?? [];
?>
<section class="position"><br>
    <div class="container">
        <h1 class="tittlePerfil">Profile Settings about Employe <?php echo $IDUsuario?></h1><br><br>
        
        <div class="profile-section">
            <div class="profile-image">
                <div class="avatar">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' fill='%23AFD488'/%3E%3Ccircle cx='50' cy='35' r='20' fill='%23FFF'/%3E%3Cpath d='M50 60 C20 60 10 90 10 100 L90 100 C90 90 80 60 50 60Z' fill='%23FFF'/%3E%3C/svg%3E" alt="Profile Picture">
                </div>
                <div class="email-display"></div>
                <button class="update-button">Update Profile Image</button>
            </div>
            <div>
            <form class="form-grid">
                <div class="form-field">
                    <label for="firstName" class="labelPerfil">First Name</label>
                    <input type="text" class="inputs" id="firstName" value="<?php echo $info['nombre']?>" disabled>
                </div>
                
                <div class="form-field">
                    <label for="lastName" class="labelPerfil">Last Name</label>
                    <input type="text" class="inputs" id="lastName" value="<?php echo $info['apelPaterno']. " " .$info['apelMaterno'] ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="mobile" class="labelPerfil">Mobile</label>
                    <input type="text"class="inputs" id="mobile" value="<?php echo $info['celular'] ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="password" class="labelPerfil">Password</label>
                    <div class="password-field">
                        <input type="password" class="inputs" id="password" value="<?php echo $info['contrasena']?>" disabled>
                        <button type="button" class="password-toggle"></button>
                    </div>
                </div>
                
                <div class="form-field full-width">
                    <label for="email" class="labelPerfil">Email</label>
                    <input type="email" class="inputs" id="email" value="<?php echo $info['email']?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="registeredDate" class="labelPerfil">Registered Date</label>
                    <input type="text" class="inputs" id="registeredDate" value="<?php echo $info['fechaContrato']?>" disabled>
                </div>
            </form>
            <br><br>
            <div class="form-field full-width">
                <a href="changeInformation.php">
                    <button class="update-button">Change information</button>
                </a>
            </div>

            </div>
            
            
            
        </div>
    </div>
</section>

<?php include "includes/footer.php" ?>
