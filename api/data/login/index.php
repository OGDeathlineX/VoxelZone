<?php
	function login($data,$mysqli)
	{
		$sql 	= "SELECT user FROM 
								users 
							WHERE 
								email ='".$data["correo"] ."' 
							AND 
								pass='".$data["pass"]."'";
		$result = $mysqli -> query($sql);

		if($result->num_rows>0)
		{
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		else
		{
			return false;
		}
	}
