<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    
    <br>
    <section class="form1">
    <h2>Welcome the Mark Attendance or Exit</h2>
        <form action="addAttendance.php" class="form_login" method="POST">
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
        <br>
        <center>
        <a href="index.php"><button class="mainButton">Main menu</button></a>
        </center>        
        
    </section>
</body>
