<?php

    function getAboutUs($data, $mysqli)
    {
        $sql = "SELECT * FROM about_us";
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