<?php include "includes/header.php" ?>
<section>
    <h2>Request Vacation</h2>
    <form action="" class="formPage">
        <fieldset>
            <div class="firstInput">
                <label for="name"></label> <!-- This information should be entered automatically -->
                <input type="text" id="name" name="name" placeholder="Name">
            </div>
            <div>
                <br>
                <label for="startDate">Start date</label>
                <input type="date" id="startDate" name="startDate">
            </div>
            <div>
                <br>
                <label for="endDate">End Date</label>
                <input type="date" id="endDate" name="endDate">
            </div>
            <div>
                <button type="submit">Request vacation</button>
            </div>
        </fieldset>
    </form>
    <div>
        <br><br><br>
        <h2>Requested Vacations</h2>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>---</td>
                <td>---</td>
                <td>---</td>
            </tr>
        </table>
    </div>
</section>

<?php include "includes/footer.php" ?>