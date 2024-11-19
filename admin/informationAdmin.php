<?php 
include "../includes/headerAdmin.php";

require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../functions.php';

$info = getUserInfo($IDUsuario)[0] ?? [];
?>
<section class="position"><br>
    <div class="container">
        <h1>Profile Settings about Employe <?php echo $IDUsuario?></h1><br><br>
        
        <div class="profile-section">
            <div class="profile-image">
                <div class="avatar">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Crect width='100' height='100' fill='%23AFD488'/%3E%3Ccircle cx='50' cy='35' r='20' fill='%23FFF'/%3E%3Cpath d='M50 60 C20 60 10 90 10 100 L90 100 C90 90 80 60 50 60Z' fill='%23FFF'/%3E%3C/svg%3E" alt="Profile Picture">
                </div>
                <div class="email-display"></div>
                <button class="update-button">Update Profile Image</button>
            </div>
            
            <form class="form-grid">
                <div class="form-field">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" value="<?php echo $info['nombre']?>" disabled>
                </div>
                
                <div class="form-field">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" value="<?php echo $info['apelPaterno']. " " .$info['apelMaterno'] ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="mobile">Mobile</label>
                    <input type="text" id="mobile" value="<?php echo $info['celular'] ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="password">Password</label>
                    <div class="password-field">
                        <input type="password" id="password" value="<?php echo $info['contrasena']?>" disabled>
                        <button type="button" class="password-toggle"></button>
                    </div>
                </div>
                
                <div class="form-field full-width">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="<?php echo $info['email']?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="registeredDate">Registered Date</label>
                    <input type="text" id="registeredDate" value="<?php echo $info['fechaContrato']?>" disabled>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include "../includes/footer.php" ?>
