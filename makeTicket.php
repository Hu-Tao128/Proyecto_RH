<?php 
    include "includes/header.php";
    require_once "functions.php";

    $tickets = tickets($IDUsuario);
?>
<section>
    <center>
    <div class="questions">
    <h2>Make a ticket</h2>
    <p>In this section you can write the description of a complaint, it will be reviewed by administrative staff.</p>
    </div>
    </center>
    
    
    <div>
        <form action="addTicket.php" class="formPage" method="post">
            <fieldset>
            <div class="firstInput">
                </div>
                <br>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" required></textarea>
                <div>  
                    <button type="submit" name="btnaddTicket">Make a ticket</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php if (!empty($tickets)){ ?>
        <div>
            <br><br><br>
            <h2>My Tickets</h2>
            <div class="scroll">
            <table border="1" class="tableAdmin">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
                <?php 
                    foreach($tickets as $renglon){ ?>
                <tr>
                    <td><?=$renglon['id']?></td>
                    <td><?=$renglon['date']?></td>
                    <td><?=$renglon['description']?></td>
                    <td><?=$renglon['status']?></td>
                </tr><?php
                    }   ?>
            </table>
            </div>
            
        </div><?php
    }?>

<?php include "includes/footer.php" ?>