<?php include "../includes/headerAdmin.php" ?>
<section>

    <h2>Table for the promotions</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Publication Date</th>
            </tr>
            <tr>
                <td>0</td>
                <td>0000</td>
                <td>0000</td>
                <td>----</td>
                <td>----</td>
            </tr>
        </table>
    </div>
    <div>
    <h2>Make a promotion</h2>
        <form action="" class="formPage">
            <fieldset>
                <div class="firstInput">
                    <label for="code"></label>
                    <input type="text" id="code" name="code" placeholder="Write the code of the promotion">
                </div>
                <div>
                    <label for="name"></label>
                    <input type="text" id="name" name="name" placeholder="Name of the promotion">
                </div>
                <div>
                    <label for="description"></label>
                    <input type="text" id="description" name="description" placeholder="Description of the promotion">
                </div>
                <div>
                    <label for="status"></label>
                    <input type="text" id="status" name="status" placeholder="Status of the promotion">
                </div>
                <div>
                    <label for="publicationDate"></label>
                    <input type="date" id="publicationDate" name="publicationDate">
                </div>
                <div>
                    <button type="submit">Make a promotion</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

    

<?php include "../includes/footer.php" ?>