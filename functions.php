<?php
require("includes/config/MySQL_ConexionDB.php");
function firstname($usuario) {
	global $db_con;
    $Nombre = "";

    try {
        $query = "SELECT firstName FROM employee WHERE code = :usuario";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR); // Si numero es entero, param_int
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $Nombre = $row['firstName'];
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
        $query = "SELECT lastName, middleName FROM employee WHERE code = :usuario";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR); // Si numero es entero, param_int
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lastname = $row['lastName'] . " " . $row['middleName'];
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
        $query = "SELECT supervisorId FROM employee WHERE code = :user";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':user', $usuario, PDO::PARAM_INT); // Si numero es entero, param_int
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $IDSupervisor = $row['supervisorId'];
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $IDSupervisor;
}

function workspace($User){
	global $db_con;
	$workspace = "";

	try{
		$query = "SELECT p.name FROM position as p INNER JOIN employee as e on e.positionCode = p.code WHERE e.code = :user";
		$stm = $db_con->prepare($query);
		$stm->bindParam("user", $User, PDO::PARAM_INT);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$workspace = $row["name"];
		}
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $workspace;
}

function department($User){
	global $db_con;
	$department = "";

	try{
		$query = "SELECT d.code FROM department as d INNER JOIN position as p on p.departmentCode = d.code INNER JOIN employee as e ON e.positionCode = p.code WHERE e.code = :user";
		$stm = $db_con->prepare($query);
		$stm->bindParam("user", $User, PDO::PARAM_INT);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$department = $row["code"];
		}
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $department;
}

function salary($usuario){
	global $db_con;
	$salary = "";

	try{
		$query = "SELECT p.salary FROM position as p INNER JOIN employee as e on e.positionCode = p.code WHERE e.code = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_STR);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$salary = $row["salary"];
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
		$query = "SELECT contractDate FROM employee WHERE code = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_STR);
		$stm->execute();

		if ($row = $stm->fetch(PDO::FETCH_ASSOC)){
			$contract = $row["contractDate"];
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
        $query = "SELECT code, name, type, description FROM benefits";
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

function getUserInfo($User) {
    global $db_con;
    $infoUser = [];

    try {
        $query = "SELECT * FROM employee WHERE code = :user";
		$stm = $db_con->prepare($query);
		$stm->bindParam("user", $User, PDO::PARAM_INT);
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
		$query = "SELECT * FROM vacations WHERE employee = :usuario";
		$stm = $db_con->prepare($query);
		$stm->bindParam("usuario", $usuario, PDO::PARAM_STR);
		$stm->execute();

		$vacactions = $stm->fetchAll(PDO::FETCH_ASSOC);
		
	} catch (PDOException $e) {
		exit("Error en la consulta: " . $e->getMessage());
	}

	return $vacactions;
}

function Absences($Usuario){
	global $db_con;
	$Absences = [];

	try{
		$query = "SELECT * FROM absence WHERE employee = :user";
		$stm = $db_con->prepare($query);
		$stm->bindParam("user", $Usuario, PDO::PARAM_STR);
		$stm->execute();

		$Absences = $stm->fetchAll(PDO::FETCH_ASSOC);
	}catch (PDOException $e){
		exit("Error: ".$e->getMessage());
	}

	return $Absences;
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
