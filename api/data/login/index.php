<?php
function login($data,$mysqli){
	$sql 	= "SELECT * FROM 
							usuarios 
						WHERE 
							email	='".$data["Correo"] ."' 
						AND 
							pass ='".$data["Pass"]."'";
	$result = $mysqli -> query($sql);
	if($result->num_rows>0){
		return true;
	}else{
		return false;
	}
}