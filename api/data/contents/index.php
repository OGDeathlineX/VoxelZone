<?php

    function add($data, $mysqli)
    {
        $email = $data['author'];
        $category = $data["category"];
        $title = $data["title"];
        $body = $data["body"];
        $image = $data["my-image"];

        if(isset($data["rol"]))
            $rol = 1;
        else
            $rol = 2;

        // Insertar datos en la base de datos
        $sql = 'INSERT INTO content (email_author, date , category, title, body, front_image) 
                VALUES ("'.$email.'", NOW(), '.$category.', "'.$title.'",'.$body.', "'.$image.'")';
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
    $sql = "DELETE FROM content WHERE id ='".$data["id"]."'";
    $result = $mysqli->query($sql);

    if($result)
    {
        if ($mysqli->affected_rows > 0) 
        {
            return true; 
        } 
        else 
        {
            return false;
        }
    }
    else
    {
        return false;
    }

}