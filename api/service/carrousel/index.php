<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	"QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG";
	$key		=	"carrousel";

	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/carrousel/index.php';

	/* Cuerpo del API */
	if($method=='POST')
    {
		
	}
	if($method=='GET')
	{
        $result = getCarrousel($mysqli);
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
	if($method=='PUT')
	{
		
	}	
	if($method=='DELETE')
	{
		
	}
?>