<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>RH</title>
</head>
<body>
    <section class="form1">
        <h2>Human Resources Login System</h2>
            <div>
            <form name="formLogin" id="formLogin" action="loginProcess.php" method="POST" class="form_login">
                <input type="hidden" name="accion" id="accion" value="login" />
                    <fieldset>
                        <div>
                            <label for="code" ></label>
                            <input type="text" id="code" name="code" placeholder="Code">
                        </div>
                        <div>
                            <label for="password" ></label>
                            <input type="password" id="password" name="password" placeholder="Password">
                            <input class="f-r-checkbox" type="checkbox" onclick="showPassword()" >   
                        </div>
                        <div>
                            <label><p>Mostrar contrase&ntilde;a</p>
                                <script>
                                    function showPassword(){
                                        var passW = document.getElementById("password");

                                        if(passW.type === "password"){
                                            passW.type = "text";
                                        }else{
                                            passW.type = "password";
                                        }
                                    }
                                </script>
                            </label>
                        </div>
                        <div>
                            <button type="submit" id="btnLogin" name="btnLogin">Login</button>
                        </div>
                    </fieldset>
            </form>
        </div>
    </section>
</body>