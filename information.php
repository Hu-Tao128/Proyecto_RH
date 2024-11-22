<?php 
include "includes/header.php";

require_once 'includes/config/MySQL_ConexionDB.php';
require_once 'functions.php';

$info = getUserInfo($IDUsuario)[0] ?? [];
$image = $info['image'];
?>
<section class="position"><br>
    <div class="container">
        <h1 class="tittlePerfil">Profile Settings about Employe <?php echo $IDUsuario?></h1><br><br>
        
        <div class="profile-section">
            <div class="profile-image">
                <div class="avatar">
                    <?php if(empty($image)){?>
                        <img src="images/Perfil.svg" alt="Profile Picture"><?php
                    }else{  ?>
                        <img src="imageUser/<?=$image?>" alt=""><?php
                    } ?>
                </div>
                <div class="email-display"></div>
                <button class="update-button">Update Profile Image</button>
            </div>
            <div>
            <form class="form-grid" action="changeInformation.php" method="POST">
                <input type="hidden" name="code" id="code" value="<?php echo $info['code']?>">
                <div class="form-field">
                    <label for="firstName" class="labelPerfil">First Name</label>
                    <input type="text" class="inputs" id="firstName" value="<?php echo $info['firstName']?>" disabled>
                </div>
                
                <div class="form-field">
                    <label for="lastName" class="labelPerfil">Last Name</label>
                    <input type="text" class="inputs" id="lastName" value="<?php echo $info['lastName']. " " .$info['middleName'] ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="mobile" class="labelPerfil">Mobile</label>
                    <input type="text"class="inputs" name="mobile" id="mobile" value="<?php echo $info['mobile'] ?>">
                </div>
                
                <div class="form-field full-width">
                    <label for="password" class="labelPerfil">Password</label>
                    <div class="password-field">
                        <input type="password" class="inputs" name="password" id="password" value="<?php echo $info['password']?>">
                        <button type="button" class="password-toggle"></button>
                    </div>
                </div>
                
                <div class="form-field full-width">
                    <label for="email" class="labelPerfil">Email</label>
                    <input type="email" class="inputs" id="email" value="<?php echo $info['email']?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="registeredDate" class="labelPerfil">Registered Date</label>
                    <input type="text" class="inputs" id="registeredDate" value="<?php echo $info['contractDate']?>" disabled>
                </div>
                <div class="form-field full-width">
                    <button class="update-button" type="submit" name="btnChangeInfo">Change Information</button>
            </div>
            </form>
            <br><br>
            

            </div>
            
            
            
        </div>
    </div>
</section>

<?php include "includes/footer.php" ?>
