<?php
    function getContent($mysqli)
    {
        $sql = "SELECT * FROM content WHERE category = ". $data["category"];
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