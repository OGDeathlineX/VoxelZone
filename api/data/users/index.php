<?php

    function add($data, $mysqli)
    {
        $email = $data['email'];
        $user = $data["usuario"];
        $password = $data["password"];
        $name = 'hi';
        $perfil = 'hi';

        if(isset($data["rol"]))
            $rol = $data["rol"];
        else
            $rol = 2;

        // Insertar datos en la base de datos
        $sql = 'INSERT INTO users (email, user, name , pass, rol, profilepic) 
                VALUES ("'.$email.'", "'.$user.'", "'.$name.'", "'.$password.'",'.$rol.', "'.$perfil.'")';
        $result = $mysqli->query($sql);
        
        if ($result) 
        {
            return true;
        } else 
        {
            return false;
        }
    }

    function getUsers($data, $mysqli)
    {
        $sql = "SELECT * FROM users WHERE email='".$data["email"]."'";
	    $result = $mysqli -> query($sql);

        if ($result->num_rows > 0) 
        {
            return $result->fetch_all(MYSQLI_ASSOC);
        } 
        else 
        {
            return false;
        }
    }

    function modify($data, $mysqli)
    {
        $email = $data['email'];
        $user = $data["usuario"];
        $password = $data["password"];
        $rol= $data["rol"];
        $name = '';
        $perfil = '';

        $sql = 'UPDATE users 
        SET email = "'.$email.'", 
            user = "'.$user.'", 
            name = "'.$name.'", 
            pass = "'.$password.'", 
            rol = '.$rol.', 
            profilepic = "'.$perfil.'"
        WHERE email = "'.$email.'"';
        $result = $mysqli->query($sql);
        
        if ($result) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

function delete($data, $mysqli)
{
    $sql = "DELETE FROM users WHERE email ='".$data["email"]."'";
    $result = $mysqli->query($sql);

    if($result)
    {
        if ($mysqli->affected_rows > 0) 
        {
            return true; // Eliminación exitosa
        } 
        else 
        {
            return false; // No se encontró ningún usuario con ese correo electrónico
        }
    }
    else
    {
        return false;
    }

}