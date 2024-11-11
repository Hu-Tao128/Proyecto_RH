<?php
require("includes/config/MySQL_ConexionDB.php");
function firstname($usuario) {
	global $db_con;
    $Nombre = "";

    try {
        $query = "SELECT nombre FROM empleado WHERE numero = :usuario";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT); // Si numero es entero, param_int
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $Nombre = $row['nombre'];
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $Nombre;
}

function lastname($usuario) {
	global $db_con;
    $lastname = "";

    try {
        $query = "SELECT apelPaterno, apelMaterno FROM empleado WHERE numero = :usuario";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT); // Si numero es entero, param_int
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lastname = $row['apelPaterno'] . " " . $row['apelMaterno'];
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $lastname;
}

function getIDSupervisor($usuario) {
	global $db_con;
    $IDSupervisor = 0;

    try {
        $query = "SELECT supervisor FROM empleado WHERE numero = :usuario";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT); // Si numero es entero, param_int
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $IDSupervisor = $row['supervisor'];
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $IDSupervisor;
}

function workspace($usuario){
	global $db_con;
	$workspace = "";

	try{
		$query = "SELECT p.nombre FROM puesto as p INNER JOIN empleado as e on e.puesto = p.numero WHERE e.numero = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_INT);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$workspace = $row["nombre"];
		}
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $workspace;
}

function salary($usuario){
	global $db_con;
	$salary = "";

	try{
		$query = "SELECT p.salario FROM puesto as p INNER JOIN empleado as e on e.puesto = p.numero WHERE e.numero = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_INT);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$salary = $row["salario"];
		}
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $salary;
}

function contract($usuario){
	global $db_con;
	$contract = "";

	try{
		$query = "SELECT fechaContrato FROM empleado WHERE numero = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_INT);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$contract = $row["fechaContrato"];
		}
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $contract;
}

function showBenefits() {
    global $db_con;
    $benefits = [];

    try {
        $query = "SELECT codigo, nombre, tipo, descripcion FROM beneficios";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $benefits[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $benefits;
}

function getUserInfo($usuario) {
    global $db_con;
    $infoUser = [];

    try {
        $query = "SELECT * FROM empleado WHERE numero = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_INT);
		$stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $infoUser[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $infoUser;
}

function vacactions($usuario){
	global $db_con;
	$vacactions = [];

	try{
		$query = "SELECT * FROM vacaciones WHERE empleado = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_INT);
		$stm->execute();

		$vacactions = $stm->fetchAll(PDO::FETCH_ASSOC);
		
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $vacactions;
}

/*
function verPagos($usuario) {
	
	
	$query = "SELECT IDUsuario,Nombre,APaterno,AMaterno,FotoPerfil,Telefono,Correo,NombreUsuarioCliente,ContrasenaCliente FROM usuario_cliente";
	
	if(!$resultado = mysqli_query($miConexion, $query)){
		exit(mysqli_error($miConexion));
	}

	$lista = array();

	if(mysqli_num_rows($resultado) > 0)
	{
		while($renglon =mysqli_fetch_assoc($resultado) )
		{
		/*	if($renglon['FotoPerfil']=="")
        		$foto = IMAGES_ORIGEN.'UsuariosClientes/fotos/dft-perfil-v2.svg';
        	else
        		$foto = IMAGES_ORIGEN.'UsuariosClientes/fotos/'.$renglon['FotoPerfil'];
		
			$lista[] = array(
						'IDUsuario' => $renglon['IDUsuario'],
						'Nombre' => $renglon['Nombre'],
						'APaterno' => $renglon['APaterno'],
						'AMaterno' => $renglon['AMaterno'],
						'mostrarPerfil' => $foto,
						'FotoPerfil' => $renglon['FotoPerfil'],
						'Telefono' => $renglon['Telefono'],
						'Correo' => $renglon['Correo'],
						'NombreUsuarioCliente' => $renglon['NombreUsuarioCliente'],
						'ContrasenaCliente' => $renglon['ContrasenaCliente'] 
						
						);			
		}
	
	}
	return $lista;
}*/
?>
