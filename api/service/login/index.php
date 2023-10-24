<?php
	/* Variables */
	$debug		=	true;
	$secret_Key	=	"eyJhbGciOiJIUzI1NiJ9.eyJSb2xlIjoiQWRtaW4iLCJJc3N1ZXIiOiJJc3N1ZXIiLCJVc2VybmFtZSI6IkphdmFJblVzZSIsImV4cCI6MTY5NzQzMjczOSwiaWF0IjoxNjk3NDMyNzM5fQ.8Cs7C3YHqFPr4I1zsUjiKx6JiG4Q41EtDqD2AMuYQMo";
	$key		=	"login";
	
	/* Archivos base */
	include '../../helper/helper.php';
	include '../../data/login/index.php';

	/* Cuerpo del API */
	if($method=='POST'){
		if(isset($data)){
			if(login($data,$mysqli)){
				$data["status"]	= 200; 
				echo json_encode($data);
				die();
			}else{
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