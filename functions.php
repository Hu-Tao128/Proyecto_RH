<?php
require("includes/config/MySQL_ConexionDB.php");
require 'vendor/autoload.php';

use GuzzleHttp\Client as GuzzleCliente;


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

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
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
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
        $stmt->bindParam(':user', $usuario, PDO::PARAM_STR);
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
		$stm->bindParam("user", $User, PDO::PARAM_STR);
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
		$stm->bindParam("user", $User, PDO::PARAM_STR);
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
		$stm->bindParam("user", $User, PDO::PARAM_STR);
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

function showWorkSpace() {
    global $db_con;
    $position = [];

    try {
        $query = "SELECT * FROM position";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $position[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $position;
}

function showPromotions(){
    global $db_con;
    $promotions = [];

    try {
        $query = "SELECT * FROM promotion WHERE status = 'Active'";
        $stm = $db_con->prepare($query);
        $stm->execute();

        while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
            $promotions[] = $row;
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $promotions;
}

function promotionName($code) {
	global $db_con;
    $name = "";

    try {
        $query = "SELECT name FROM promotion WHERE code = :code";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['name'];
        }
    } catch (PDOException $e) {
        exit("Error en la consulta: " . $e->getMessage());
    }

    return $name;
}

function showPromotionsEmploy($User){
    global $db_con;
    $promotions = [];

    try {
        $query = "SELECT * FROM application WHERE employee = :user";
        $stm = $db_con->prepare($query);
		$stm->bindParam("user", $User, PDO::PARAM_STR);
		$stm->execute();

		$promotions = $stm->fetchAll(PDO::FETCH_ASSOC);

	}catch (PDOException $e){
		exit("Error: ".$e->getMessage());
	}

    return $promotions;
}

function traducirTexto($texto, $idiomaOrigen = 'ES', $idiomaDestino = 'EN') {
    $apiKey = $_ENV['DEEPL_API_KEY'];
    $url = 'https://api-free.deepl.com/v2/translate';

    $client = new GuzzleCliente();

    try {
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'DeepL-Auth-Key ' . $apiKey,
            ],
            'form_params' => [
                'text' => $texto,
                'source_lang' => $idiomaOrigen,
                'target_lang' => $idiomaDestino,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['translations'][0]['text'])) {
            return $data['translations'][0]['text'];
        } else {
            return 'Error: No se obtuvo traducción.';
        }
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
}

// Función para guardar el código en la base de datos
function saveVerificationCode($email, $code) {
    global $db_con;

    // Calcular el tiempo de expiración (una hora después de la creación)
    $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

    try {
        // Insertar el correo, el código y el tiempo de expiración
        $query = "INSERT INTO password_reset (email, verification_code, expires_at) 
                  VALUES (:email, :code, :expires_at)";
        $stmt = $db_con->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':expires_at', $expires_at); // Enlace del tiempo de expiración
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Error al guardar el código: ' . $e->getMessage();
    }
}
/*
// Función para enviar el correo con Mailjet
function sendVerificationEmail($email, $verificationCode) {
    // Importar la clase Mailjet

    // Tu API Key y API Secret de Mailjet
    $mj = new MailjetCliente('06592f754b3565129d2140913caa9c8d', '09f149e2046a15c13591b7c66bbe0490');

    // Crear el cuerpo del mensaje
    $subject = "Password Reset Verification Code";
    $body = "Your verification code is: $verificationCode\n\nUse this code to reset your password.";

    // Crear los parámetros para el correo
    $bodyParams = [
        'Messages' => [
            [
                'From' => [
                    'Email' => "0323106045@ut-tijuana.edu.mx",  // Correo de envío registrado en Mailjet
                    'Name' => "Integra Amigos"
                ],
                'To' => [
                    [
                        'Email' => $email,  // Correo del destinatario
                        'Name' => "User"
                    ]
                ],
                'Subject' => $subject,
                'TextPart' => $body,  // Cuerpo del mensaje en texto plano
                'HTMLPart' => "<h3>$body</h3>"  // Opcional, puedes enviar también el mensaje en HTML
            ]
        ]
    ];

    try {
        // Enviar el correo utilizando la API de Mailjet
        $response = $mj->post(Resources::$Email, ['body' => $bodyParams]);

        // Verificar si la respuesta tiene éxito
        if ($response->getStatus() === 200) {
            echo "Verification code sent to your email.";
        } else {
            // Si hubo un error
            echo "Error: Unable to send email. Error code: " . $response->getStatus() . "\n";
            echo "Error details: " . json_encode($response->getData()) . "\n";  // Mostrar detalles del error
        }
    } catch (Exception $e) {
        // Captura cualquier error y muestra el mensaje
        echo "Error al enviar el correo: " . $e->getMessage();
    }
}*/

?>