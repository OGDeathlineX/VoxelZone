<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	'QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG';
	$key		=	"contents";
	
	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/contents/index.php';

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