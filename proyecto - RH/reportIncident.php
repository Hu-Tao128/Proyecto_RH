<?php include "includes/header.php" ?>
<section>
    <h2>Report a incident</h2>
    <form action="" class="formPage">
        <fieldset>
            <div class="firstInput">
                <label for="name"></label> <!-- This information should be entered automatically -->
                <input type="text" id="name" name="name" placeholder="Name">
            </div>
            <div>
                <input type="text" id="type" name="type" placeholder="Type of the incident">
            </div>
            <div>
                <br>
                <label for="dateIncident">Date of the incident</label>
                <input type="date" id="dateIncident" name="dateIncident">
            </div>
            <div>
                <input type="text" id="description" name="description" placeholder="Description of the incident">
            </div>
            <div>
                <button type="submit">Report a incident</button>
            </div>
        </fieldset>
    </form>
</section>


<?php include "includes/footer.php" ?>