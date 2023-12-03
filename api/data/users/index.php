<?php

    function add($data, $mysqli)
    {
        $email = $data['email'];
        $user = $data["usuario"];
        $password = $data["password"];
        $rol= 1;
        $name = 'hi';
        $perfil = 'hi';


        // Insertar datos en la base de datos
        $sql = 'INSERT INTO users (email, user, name , pass, rol, profilepic) 
                VALUES ("'.$email.'", "'.$user.'", "'.$name.'", "'.$password.'",'.$rol.', "'.$email.'")';
        $result = $mysqli->query($sql);

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