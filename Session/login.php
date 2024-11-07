<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/login.css">
    <title>RH Login</title>
</head>
<body>
    <section class="form1">
        <h2>Human Resources Login System</h2>
        <form name="formLogin" id="formLogin" action="loginProcess.php" method="POST" class="form_login">
            <input type="hidden" name="accion" id="accion" value="login" />
            <fieldset>
                <div>
                    <input type="text" id="code" name="code" placeholder="Code" required>
                </div>
                <div class="password-container">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class="fas fa-eye-slash" onclick="showPassword()"></i>
                </div>
                <div>
                    <button type="submit" id="btnLogin" name="btnLogin">Login</button>
                </div>
            </fieldset>
        </form>
    </section>

    <script>
        function showPassword() {
            var passW = document.getElementById("password");
            var eyeIcon = document.querySelector(".password-container i");
            if (passW.type === "password") {
                passW.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passW.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>
</html>