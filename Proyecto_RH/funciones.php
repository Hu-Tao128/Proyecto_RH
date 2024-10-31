<?php
function callEmpleados($usuario) {
    // Uso de PDO para la conexión
    require("MySQL_ConexionDB.php");
    $Nombre = "";

    try {
        // Uso de consulta preparada para evitar inyecciones SQL
        $query = "SELECT nombre, apelPaterno, apelMaterno FROM empleado WHERE numero = :usuario";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_INT); // Asume que 'numero' es un entero
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $Nombre = $row['nombre'] . " " . $row['apelPaterno'] . " " . $row['apelMaterno'];
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $Nombre;
}

function verPagos($usuario) {
	include('MySqli_conexionDB.php');
	
	$query = "SELECT IDUsuario,Nombre,APaterno,AMaterno,FotoPerfil,Telefono,Correo,NombreUsuarioCliente,ContrasenaCliente FROM usuario_cliente";
	
	if(!$resultado = mysqli_query($miConexion, $query)){
		exit(mysqli_error($miConexion));
	}

	$lista = array();

	if(mysqli_num_rows($resultado) > 0)
	{
		while($renglon =mysqli_fetch_assoc($resultado) )
		{
			if($renglon['FotoPerfil']=="")
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
}
?>
