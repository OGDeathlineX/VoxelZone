<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	'QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG';
	$key		=	"rols";
	
	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/rols/index.php';

	if($method=='POST')
	{
		if(isset($data))
		{
			$resultSql = add($data, $mysqli);
			if ($resultSql) 
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
			}
		}
	}
	if($method=='GET')
	{
		if(isset($data))
		{
			$result = getRols($data, $mysqli);       
			if($result != false)
			{
				$result["status"]	= 200; 
				echo json_encode($result);
				die();
			}
			else
			{
				echo '{"status":502,"description":"Error de elementos"}';
				die();
			}
		}			
	}	
	if($method=='PUT')
	{
		if(isset($data))
		{
			$resultSql = modify($data, $mysqli);
			if ($resultSql) 
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
			}
		}
	}	
	if($method=='DELETE')
	{
		$resultSql = delete($data, $mysqli);

		if ($resultSql) 
		{
			$result["status"] = 200;
			$result["id"] = $data["id"];
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