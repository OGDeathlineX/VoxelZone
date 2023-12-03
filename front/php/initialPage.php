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

	/*if(!isset($_GET["date"]))
	{
		echo '{"status":500,"description":"Error de parametros"}';
		exit();
	}*/
	
	/***************** JWT **************/
	$secret_Key  	= 'QNjYhAxOlf0G6Iav1I53WJqTGGK8BatIuBKg5ArbPBUG';
	$date   		= new DateTimeImmutable();
	$expire_at     	= $date->modify('+1 minutes')->getTimestamp();      
	$domainName 	= "acadserv.upaep.mx";
	$key		   	= "initialPage";                                          
	$request_data = [
		'iat'  		=> $date->getTimestamp(),        
		'iss'  		=> $domainName,                  
		'nbf'  		=> $date->getTimestamp(),        
		'exp'  		=> $expire_at,                      
		'key' 		=> $key                
	];
	$auth	=	JWT::encode($request_data,$secret_Key,'HS256');
	$url	=	'https://acadserv.upaep.mx/proyecto_final/equipo2/api/service/initialPage/';
	$post	=	$_GET;
	$metodo	=	"GET";
	curl($url,$post,$auth,$metodo);
	$_SESSION["session"]=true;
?>