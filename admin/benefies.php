<?php include "../includes/headerAdmin.php" ?>
<section>
    <h2>Table for the benefies</h2>
    <div>
        <table border="1" class="tableAdmin">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th colspan="2">Options</th>
            </tr>
            <tr>
                <td>000</td>
                <td>----</td>
                <td>----</td>
                <td>----</td>
                <td><a href="">Modify</a></td>
                <td><a href="">Delete</a></td>
            </tr>
        </table>
    </div>
    <div>
        <h2>Make a benefie</h2>
        <form action="" class="formPage">
            <fieldset>
                <div class="firstInput">
                    <label for="code"></label>
                    <input type="text" id="code" name="code" placeholder="Write the code of the benefie">
                </div>
                <div>
                    <label for="name"></label>
                    <input type="text" id="name" name="name" placeholder="Name of the benefie">
                </div>
                <div>
                    <label for="type"></label>
                    <input type="text" id="type" name="type" placeholder="Type of the benefie">
                </div>
                <div>
                    <label for="description"></label>
                    <input type="text" id="description" name="description" placeholder="Description of the benefie">
                </div>
                <div>
                    <button type="submit">Make a benefie</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<?php include "../includes/footer.php" ?>