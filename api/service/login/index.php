<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	"QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG";
	$key		=	"login";
	
	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/login/index.php';

	/* Cuerpo del API */
	if($method=='POST')
	{
		if(isset($data))
		{
			$result = login($data,$mysqli);
			if($result != false)
			{
				$response = $result["0"];
				$response["status"]	= 200; 
				$response["mensaje"] = "conexión exitosa";
				echo json_encode($response);
				die();
			}
			else
			{
				echo '{"status":502,"description":"Error de usuario o contraseña"}';
				die();
			}
		}
	}
	if($method=='GET'){
	
	}	
	if($method=='PUT'){
	
	}	
	if($method=='DELETE'){
	
	}
?>