<?php

    function getAccount($data, $mysqli)
    {
        $sql = "SELECT * FROM users WHERE email = '" .$data["email"]."'";
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