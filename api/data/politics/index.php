<?php

    function getPolitics($mysqli)
    {
        $sql = "SELECT * FROM politics";
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