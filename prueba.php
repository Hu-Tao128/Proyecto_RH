<?php
include "includes/config/MySQL_ConexionDB.php";
$workspace = [];

try {
    $query = "SELECT * FROM puesto";
    $stm = $db_con->prepare($query);
    $stm->execute();

    while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
        $workspace[] = $row;
    }
} catch (PDOException $e) {
    exit("Error en la consulta: " . $e->getMessage());
}
?>

<!-- HTML -->
<div>
    <label for="seltWorkspace">Select a workspace:</label>
    <select name="seltWorkspace" id="seltWorkspace">
        <option value="">-- workspaces --</option>
        <?php foreach ($workspace as $renglon) { ?>
            <option value="<?= $renglon['numero'] ?>"><?= $renglon['nombre'] ?></option>
        <?php } ?>
    </select>
</div>
