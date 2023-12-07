<?php

    function add($data, $mysqli)
    {

        $sql = 'INSERT INTO rols (nombre) 
                VALUES ("'.$data["rol_name"].'")';
        $result = $mysqli->query($sql);
        
        if ($result) 
        {
            return true;
        } else 
        {
            return false;
        }
    }

    function getRols($data, $mysqli)
    {
        $sql = "SELECT * FROM rols WHERE id=".$data["id"];
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
        $sql = 'UPDATE rols 
        SET nombre = "'.$data["rol_name"].'"
        WHERE id = '. $data["id"];
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
    $sql = "DELETE FROM rols WHERE id ='".$data["id"]."'";
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