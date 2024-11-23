<?php 
include "../includes/headerAdmin.php";
require_once '../includes/config/MySQL_ConexionDB.php';
require_once '../functions.php';

$info = getUserInfo($IDUsuario)[0] ?? [];
$image = $info['image'];
?>
<section class="position"><br>
    <div class="container">
        <h1 class="tittlePerfil">Profile Settings about Employe <?php echo $IDUsuario?></h1><br><br>
        
        <div class="profile-section">
            <div class="profile-image">
                <div class="avatar">
                    <?php if(empty($image)) { ?>
                        <img src="../images/Perfil.svg" alt="Profile Picture">
                    <?php } else { ?>
                        <img src="../imageUser/<?=$image?>" alt="Profile Picture">
                    <?php } ?>
                </div>
                <div class="email-display"></div>
                <button type="button" class="open-modal update-button" data-open="modal1">Update Profile Image</button>
            </div>

            <!-- Modal para cambiar la foto de perfil -->
            <div class="modal" id="modal1">
                <div class="modal-dialog">
                    <header class="modal-header">
                        <p class="f-p-moreActions-txtmodal">
                            <img class="icons perfil-ico" src="images/editar-2.svg"/> Cambiar foto de perfil
                        </p>
                        <button class="close-modal" aria-label="close modal" data-close>
                            <img class="icons perfil-ico" src="images/close-icon.svg"/>
                        </button>
                    </header>
                    <section class="modal-content">
                        <form name="frmAgregarFoto" id="frmAgregarFoto" action="addImageUser.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" id="IDCambioFoto" name="IDCambioFoto" value="<?php echo $IDUsuario; ?>" />
                            <div class="drop-zone">
                                <span class="soltar-img-perfil__modal">Suelte el archivo aquí o haga clic para subirlo</span>
                                <input type="file" id="changeFotoPerfil" name="changeFotoPerfil" class="drop-zone__input" accept="image/*">
                            </div>
                            <input type="submit" name="btnChangeImg" id="btnChangeImg" value="Guardar" />
                            <button type="button" class="close-modal" data-close>Cancelar</button>
                        </form>
                    </section>
                </div>
            </div>

            <form class="form-grid" action="changeInformation.php" method="POST">
                <input type="hidden" name="code" id="code" value="<?php echo $info['code']; ?>">
                <div class="form-field">
                    <label for="firstName" class="labelPerfil">First Name</label>
                    <input type="text" class="inputs" id="firstName" value="<?php echo $info['firstName']; ?>" disabled>
                </div>
                
                <div class="form-field">
                    <label for="lastName" class="labelPerfil">Last Name</label>
                    <input type="text" class="inputs" id="lastName" value="<?php echo $info['lastName'] . " " . $info['middleName']; ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="mobile" class="labelPerfil">Mobile</label>
                    <input type="text" class="inputs" name="mobile" id="mobile" value="<?php echo $info['mobile']; ?>">
                </div>
                
                <div class="form-field full-width">
                    <label for="password" class="labelPerfil">Password</label>
                    <div class="password-field" style="display: flex; align-items: center;">
                        <input type="password" class="inputs" name="password" id="password" value="<?php echo $info['password']; ?>" style="flex: 1;">
                        <button type="button" class="password-toggle" id="togglePassword" style="background: none; border: none; cursor: pointer; padding: 0 10px;">
                            <img src="images/eye-icon.svg" alt="Show Password" id="eyeIcon" style="width: 20px; height: 20px;">
                        </button>
                    </div>
                </div>
                
                <div class="form-field full-width">
                    <label for="email" class="labelPerfil">Email</label>
                    <input type="email" class="inputs" id="email" value="<?php echo $info['email']; ?>" disabled>
                </div>
                
                <div class="form-field full-width">
                    <label for="registeredDate" class="labelPerfil">Registered Date</label>
                    <input type="text" class="inputs" id="registeredDate" value="<?php echo $info['contractDate']; ?>" disabled>
                </div>
                <div class="form-field full-width">
                    <button class="update-button" type="submit" name="btnChangeInfo">Change Information</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    const openEls = document.querySelectorAll("[data-open]");
    const closeEls = document.querySelectorAll("[data-close]");
    const isVisible = "is-visible";

    openEls.forEach((el) => {
        el.addEventListener("click", function() {
            const modalId = this.dataset.open;
            document.getElementById(modalId).classList.add(isVisible);
        });
    });

    closeEls.forEach((el) => {
        el.addEventListener("click", function() {
            this.closest(".modal").classList.remove(isVisible);
        });
    });

    document.addEventListener("click", (e) => {
        if (e.target.matches(".modal.is-visible")) {
            e.target.classList.remove(isVisible);
        }
    });

    document.addEventListener("keyup", (e) => {
        if (e.key === "Escape" && document.querySelector(".modal.is-visible")) {
            document.querySelector(".modal.is-visible").classList.remove(isVisible);
        }
    });



    document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.src = 'images/eye-slash-icon.svg';
    } else {
        passwordInput.type = 'password';
        eyeIcon.src = 'images/eye-icon.svg';
    }
});

</script>

<?php include "../includes/footer.php"; ?>
