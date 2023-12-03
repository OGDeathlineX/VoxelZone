<?php
/********** Mostrar errores ***********/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/********** Librerías ****************/
require_once('/var/www/html/librerias/jwt/vendor/autoload.php');
use Firebase\JWT\JWT;
include 'function.php';

/********** Configuración ************/
session_start();
header('Content-Type: application/json; charset=utf-8');

if (empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['password1'])) {
    echo '{"status": 401, "message": "Todos los campos son obligatorios"}';
    exit();
}

// Validar el correo electrónico
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo '{"status": 400, "message": "El formato del correo electrónico es inválido"}';
    exit();
}


// Verificar que las contraseñas coincidan
if ($_POST['password'] !== $_POST['password1']) {
    echo '{"status": 402, "message": "Las contraseñas no coinciden"}';
    exit();
}

// Aquí puedes continuar con el procesamiento del formulario
// ...


//$imagen = $_FILES['photo'];
//$fotoAnterior = $_POST['imagenAnterior'];
//$carpetaFotoUser= '../img/';
//if(!$carpetaFotoUser){
//	mkdir($carpetaFotoUser);
//}
//$nombreImagen = md5(uniqid(rand(),true)).".jpg";
//move_uploaded_file($imagen['tmp_name'],$carpetaFotoUser.$nombreImagen);

//$_POST['nom'] = $nombreImagen;

/***************** JWT *************/
$secret_Key  	= '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
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
$url	=	'https://acadserv.upaep.mx/proyecto_final/equipo2/api/service/usuarios/';
$post	=	$_POST;
$metodo	=	"POST";
curl($url,$post,$auth,$metodo);
?>	