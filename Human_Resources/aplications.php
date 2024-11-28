<?php include "../includes/headerHR.php";
require_once "../includes/config/MySQL_ConexionDB.php";
require_once "../functions.php"; 
require_once "../admin/functionsAdmin.php"; 

$Application = getInfoAplication();
$Promotions = showPromotions();
?>
<section>
    <h2>Table for the aplications</h2>
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
                <td><a href="deleteAplications.php?id=<?= $renglon['id'] ?>&action=delete" class="action-delete">Delete</a></td>
            </tr><?php
            }   ?>
        </table>
    </div>
</section>

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

</section>

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