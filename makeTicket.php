<?php include "includes/header.php" ?>
<section>
    <h2>Make a ticket</h2>
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