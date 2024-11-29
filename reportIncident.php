<?php include "includes/header.php" ?>
<section>
    <center>
        <div class="questions">
            <h2>Report a incident</h2>
            <p>In this section you can make a report of an incident that has happened in the company, fill out the form with the indicated information, the administrative staff will review the report.</p>
        </div>
    </center>
    
    <form action="addReport.php" class="formPage" method="post">
        <fieldset>
        <div class="firstInput">
                
            </div>
            <br>
            <div>
                <label for="type">Type of the incident</label><br>
                <input type="text" id="type" name="type" placeholder="Write the type of the incident" required>
            </div>
            <br>
            <div>
                <label for="dateIncident">Date of the incident</label>
                <input type="date" id="dateIncident" name="dateIncident" required>
            </div>
            <br>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            <div>
                <button type="submit" name="btnReport">Report a incident</button>
            </div>
        </fieldset>
    </form>
</section>


<?php include "includes/footer.php" ?>