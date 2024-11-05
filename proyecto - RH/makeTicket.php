<?php include "includes/header.php" ?>
<section>
    <h2>Make a ticket</h2>
    <div>
        <form action="" class="formPage">
            <fieldset>
                <div class="firstInput">
                    <label for="name"></label> <!-- This information should be entered automatically -->
                    <input type="text" id="name" name="name" placeholder="Name">
                </div>
                <div>
                    <label for="date"></label> <!-- This information should be entered automatically -->
                    <input type="date" id="date" name="date">
                </div>
                <div>
                    <label for="description"></label>
                    <input type="text" id="description" name="description" placeholder="Write the information about the ticket">
                </div>
                <div>  
                    <button type="submit">Make a ticket</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<?php include "includes/footer.php" ?>