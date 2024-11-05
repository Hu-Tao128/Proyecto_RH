<?php 
include "includes/header.php";

require_once 'includes/config/MySQL_ConexionDB.php';
require_once 'funciones.php';
?>
<section class="position">
    <div class="info">
        <h2>Your information</h2>
        
        <?php
            $info = getUserInfo($IDUsuario);
            //llamamos la funcion getUserInfo del archivo funciones.php y que coincida con el id de nuestro user
            //desplega toda la informacion de un mismo usuario
            foreach ($info as $infos) {
                $number = $infos['numero'];
                //$nombreVariable = $info['nombreColumna']; la sintaxis
                $name = $infos['nombre'];
                $lastname = $infos['apelPaterno']." ".$infos['apelMaterno'];
                $email = $infos['email'];
                $gender = $infos['sexo'];
                $age = $infos['edad'];
                $phone = $infos['celular'];
                $password = $infos['contrasena'];
                $contract = $infos['fechaContrato'];
                $supervisor = $infos['supervisor'];
                //usamos for each para cada row o columna del array y asignamos los valores a las variables par usarlas con echo
            }

            $workspace = workspace($IDUsuario);
            //funcion para obtener el nombre del puesto del usuario
            $nameS = firstname($supervisor);
            $SupLastNames = lastname($supervisor);
            //obtenemos los apellidos y nombre del supervisor desde su id_supervisor de nuestro usuario
        ?>

        <p>
            Number: <?php echo $number; ?> <br>
            <!--usamos el echo para imprimir la variable-->
            Firstname: <?php echo $name; ?> <br>
            Lastname: <?php echo $lastname; ?> <br>
            Email: <?php echo $email; ?> <br>
            Gender: <?php echo ($gender == 'F') ? 'Female' : 'Male'; ?> <br>
            <!--usamos ? para reducir el if a una sola linea, donde si es verdad ? Sera lo que reemplazaremos si es verdad y : sino, todo esto en parentesis-->
            Age: <?php echo $age; ?> <br>
            Phone number: <?php echo $phone; ?> <br>
            Password: <?php echo $password; ?> <br>
            Contract date: <?php echo $contract; ?> <br>
            Workstation: <?php echo $workspace; ?> <br>
            <?php 
            //Aqui si id_supervisor es nulo o simplemente esta vacio significa que el user es supervisor, 
            //si tiene un valor el usuario tiene un supervisor a cargo de el
                if ($supervisor != "" && $supervisor != null) { ?>
                    Supervisor: <?php echo $nameS." ".$SupLastNames; ?> <br> 
            <?php } ?>
        </p>

        <!--
        <a href="changeInformation.php">
            <button>Change data</button>
        </a>
        -->
        
    </div>
</section>

<?php include "includes/footer.php" ?>
