<?php
    function getCarrousel($mysqli)
    {
        $sql = "SELECT front_image, name, title FROM content INNER JOIN category ON content.category = category.id";
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