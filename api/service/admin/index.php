<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	"QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG";
	$key		=	"admin";

	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/admin/index.php';

	/* Cuerpo del API */
	if($method=='POST')
    {
		
	}
	if($method=='GET')
	{
        $result["Users"] = getUsers($mysqli);
        $result["Rols"] = getRols($mysqli);
        $result["Content"] = getContent($mysqli);
        $result["Category"] = getCategory($mysqli);
		$result["AboutUs"] = getAboutUs($mysqli);
		$result["Config"] = getConfig($mysqli);
		$result["Politics"] = getPolitics($mysqli);
		$result["Footer"] = getFooter($mysqli);
		$result["SocialMedia"] = getSocialMedia($mysqli);
		$result["Header"] = getHeader($mysqli);


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