<?php include "includes/header.php" ?>
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
<?php include "includes/footer.php" ?>