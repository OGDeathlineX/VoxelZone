<?php
	/********** Mostrar errores ***********/
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/********** Librerías *****************/
	require_once('/var/www/html/german/api/libraries/jwt/vendor/autoload.php');
	use Firebase\JWT\JWT;
	include 'functions.php';

	/********** Configuración *************/
	session_start();
	header('Content-Type: application/json; charset=utf-8');

    /********** Validacion de datos ****************/
	if(!isset($_POST["email"]) || !isset($_POST["usuario"]) || !isset($_POST["password"]) || !isset($_POST["rol"]) )
	{
		echo '{"status":502,"description":"Error de parametros"}';
		exit();	
	}

	/***************** JWT **************/
	$secret_Key  	= 'QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG';
	$date   		= new DateTimeImmutable();
	$expire_at     	= $date->modify('+1 minutes')->getTimestamp();      
	$domainName 	= "acadserv.upaep.mx";
	$key		   	= "users";                                          
	$request_data = [
		'iat'  		=> $date->getTimestamp(),        
		'iss'  		=> $domainName,                  
		'nbf'  		=> $date->getTimestamp(),        
		'exp'  		=> $expire_at,                      
		'key' 		=> $key                
	];
	$auth	=	JWT::encode($request_data,$secret_Key,'HS256');
	$url	=	'https://acadserv.upaep.mx/proyecto_final/equipo2/api/service/users/';
	$post	=	$_POST;
	$metodo	=	"POST";
	curl($url,$post,$auth,$metodo);
	$_SESSION["session"]=true;
?>