<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../functions.php"; 
require_once "../admin/functionsAdmin.php"; 

$Application = getInfoAplication();
$Promotions = showPromotions();
$ApplicationDel = getAplicationDel();
?>
<section>
<center>
        <div class="questions">
        <h2>Table for the aplications</h2>
        <p>In this section you can see the applications for promotions made by the employees you supervise. Here you can modify the applications to change their status or delete them if necessary.</p>
        </div>
    </center>
<br>
    <div class="scroll">
        <table border="1" class="tableAdmin">
            <tr>
                <th>Number</th>
                <th>Publication Date</th>
                <th>Status</th>
                <th>Employee</th>
                <th>Promotion</th>
                <th colspan="2">Options</th>
            </tr>
            <?php foreach ($Application as $renglon){ ?>
            <tr>
                <td><?=$renglon['id']?></td>
                <td><?=$renglon['publicationDate']?></td>
                <td><?=$renglon['statusA']?></td>
                <?php $name = firstname($renglon['employee']);?>
                <?php $lastname = lastname($renglon['employee']);?>
                <td><?=$name." ".$lastname?></td>
                <?php $Promotion = getInfoPromotion($renglon['promotion']);?>
                <td><?= $Promotion ?></td>
                <td><a href="modifyAplication.php?id=<?php echo $renglon['id']?>" class="action-modify" >Modify</a></td>
                <td><a href="deleteAplications.php?id=<?= $renglon['id'] ?>&action=delete&user=<?php echo $IDUsuario?>" class="action-delete">Delete</a></td>
            </tr><?php
            }   ?>
        </table>
    </div>
</section>

<?php
    if(!empty($ApplicationDel)){    ?>
        <section><br><br><br>
        <center>
            <h2>Table for the aplications Delected</h2>
        </center>
        <br>
            <div class="scroll">
                <table border="1" class="tableAdmin">
                    <tr>
                        <th>Number</th>
                        <th>Publication Date</th>
                        <th>Status</th>
                        <th>Employee</th>
                        <th>Promotion</th>
                        <th>Elimation Date</th>
                        <th>User who deleted</th>
                        <th colspan="2">Options</th>
                    </tr>
                    <?php foreach ($ApplicationDel as $renglon){ ?>
                    <tr>
                        <td><?=$renglon['idAp']?></td>
                        <td><?=$renglon['publicationDate']?></td>
                        <td><?=$renglon['status']?></td>
                        <?php $name = firstname($renglon['employee']);?>
                        <?php $lastname = lastname($renglon['employee']);?>
                        <td><?=$name." ".$lastname?></td>
                        <?php $Promotion = getInfoPromotion($renglon['promotion']);?>
                        <td><?= $Promotion ?></td>
                        <td><?=$renglon['eliminationDate']?></td>
                        <?php $employeeDel = firstname($renglon['employeeDel'])." ".lastname($renglon['employeeDel']) ?>
                        <td><?=$employeeDel?></td>
                        <td><a href="deleteAplications.php?id=<?php echo $renglon['id']?>&action=restore" class="action-modify" >Restore</a></td>
                        <td><a href="deleteAplications.php?id=<?php echo $renglon['id']?>&action=deletedef" class="action-delete">Permanently Delete</a></td>
                    </tr><?php
                    }   ?>
                </table>
            </div>
        </section><?php 
    }
?>

<?php foreach ($Promotions as $renglon) { ?>
    <div class="modal" id="modal<?= htmlspecialchars($renglon['codigo']); ?>">
        <div class="modal-dialog">
            <header class="modal-header">
                <p>Promotion Information</p>
                <button class="close-modal" data-close="modal<?= htmlspecialchars($renglon['codigo']); ?>">X</button>
            </header>
            <section class="modal-content">
                <p><strong>Code:</strong> <?= htmlspecialchars($renglon['codigo']) ?></p>
                <p><strong>Name:</strong> <?= htmlspecialchars($renglon['nombre']) ?></p>
                <p><strong>Description:</strong> <?= htmlspecialchars($renglon['descripcion']) ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($renglon['estado']) ?></p>
                <p><strong>Publication Date:</strong> <?= htmlspecialchars($renglon['fechaPub']) ?></p>
            </section>
        </div>
    </div>
<?php } ?>


<script>
    document.querySelectorAll("[data-open]").forEach(el => {
        el.addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById(this.getAttribute("data-open")).classList.add("is-visible");
        });
    });

    document.querySelectorAll("[data-close]").forEach(el => {
        el.addEventListener("click", function() {
            document.getElementById(this.getAttribute("data-close")).classList.remove("is-visible");
        });
    });

    document.addEventListener("click", (e) => {
        if (e.target.classList.contains("modal") && e.target.classList.contains("is-visible")) {
            e.target.classList.remove("is-visible");
        }
    });

    document.addEventListener("keyup", (e) => {
        if (e.key === "Escape") {
            document.querySelectorAll(".modal.is-visible").forEach(modal => modal.classList.remove("is-visible"));
        }
    });
</script>

<?php include "../includes/footer.php" ?>