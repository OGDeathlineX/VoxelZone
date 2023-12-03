<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	'QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG';
	$key		=	"users";
	
	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/users/index.php';

	// Cuerpo del API 
	if($method=='POST')
	{
		$resultSql = add($data, $mysqli);
		echo $resultSql; 
		/*if ($resultSql) 
		{
			$data["status"] = 200;
			$data["mensaje"] = "Registro Exitoso";

			echo json_encode($data);
			die();
		} 
		else 
		{
			echo '{"status":500,"description":"Error al insertar datos: ' . $mysqli->error . '"}';
			die();
		}*/
	}
	if($method=='GET')
	{
	
	}	
	if($method=='PUT')
	{
		
	}	
	if($method=='DELETE')
	{
		$resultSql = delete($data, $mysqli);

		if ($resultSql) 
		{
			$result["status"] = 200;
			$result["email"] = $data["email"];
			$result["mensaje"] = "Eliminación Exitosa!";

			echo json_encode($result);
			die();
		} 
		else 
		{
			echo '{"status":500,"description":"Error al eliminar datos: ' . $mysqli->error . '"}';
			die();
		}
	}
?>