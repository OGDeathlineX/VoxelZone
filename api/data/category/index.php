<?php

    function add($data, $mysqli)
    {
        $email = $data['email'];
        $user = $data["usuario"];
        $password = $data["password"];
        $name = 'hi';
        $perfil = 'hi';

        if(isset($data["rol"]))
            $rol = 1;
        else
            $rol = 2;

        // Insertar datos en la base de datos
        $sql = 'INSERT INTO users (email, user, name , pass, rol, profilepic) 
                VALUES ("'.$email.'", "'.$user.'", "'.$name.'", "'.$password.'",'.$rol.', "'.$email.'")';
        $result = $mysqli->query($sql);
        
        if ($result) 
        {
            return true;
        } else 
        {
            return false;
        }
    }

/*function modify($data, $mysqli)
{
    $email = $data['email'];
    $user = $data["usuario"];
    $password = $data["password"];
    $rol= 1;
    $name = '';
    $perfil = '';

    $sql = "INSERT INTO users (email, user, name , pass, rol, profilepic) 
            VALUES ('$email', '$user', '$name', '$password','$rol', '$perfil')";
    $result = $mysqli->query($sql)

    if($result->num_rows > 0)
    {
        return $data['usuario'];
    }
    else
    {
        return false;
    }

}*/

function delete($data, $mysqli)
{
    $sql = "DELETE FROM category WHERE id ='".$data["id"]."'";
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