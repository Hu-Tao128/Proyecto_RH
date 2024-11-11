<?php  include "includes/headerProcess.php" ?>
<body>
    <h2>Welcome the Mark Attendance or Exit</h2>

    <section>
        <form action="addAttendance.php" class="formPage" method="POST">
            <fieldset>
            <div class="firstInput">
                </div>
            <div>
                <label for="code">Enter your Employ Code</label>
                <input type="text" name="code" placeholder="Employ Code" required>
                <button type="submit" name="btnAddAttendance">Mark</button>
                
            </div>
            </fieldset>
            
        </form>

        <center>
        <a href="principal.php"><button class="loginButton20">Main menu</button></a>
        </center>        
        
    </section>
</body>
