<?php //include_once("../headerlogin.php"); ?>

<body>
    <section>
        <div>
            <h2>Bienvenido al Inicio de sesion</h2>
            <h3>Ingresa tu datos para poder entrar</h3>
        </div>
    </section>
    <section>
        <div>
            <form name="formLogin" id="formLogin" action="<?=ROOTURL?>?accion=sesion" method="POST">
            <input type="hidden" name="accion" id="accion" value="login" />
                <div>
                    <label for="">No. Control:</label>
                    <input type="text" name="txtNoControl" id="txtNoControl">
                </div>
                <div>
                    <label for="">Contrase&ntilde;a</label>
                    <input type="password" name="txtContrasena" id="txtContrasena">
                    <label class="form-relink-02" >
					<input class="f-r-checkbox" type="checkbox" onclick="showPassword()" >    
                </div>
                <div>
                    <label><p>Mostrar contrase&ntilde;a</p>
                        <script>
                            function showPassword(){
                                var passW = document.getElementById("txtContrasena");

                                if(passW.type === "password"){
                                    passW.type = "text";
                                }else{
                                    passW.type = "password";
                                }
                            }
                        </script>
				    </label>
                </div>
                <input type="submit" class="" name="btnLogin" id="btnLogin" value="Iniciar sesi&oacute;n" />
            </form>
        </div>
    </section>
</body>