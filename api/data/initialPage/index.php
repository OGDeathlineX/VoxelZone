<?php
    function getNews($mysqli)
    {
        $sql = "SELECT title, front_image, date , email_author FROM content WHERE category = 1";
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

    function getReviews($mysqli)
    {
        $sql = "SELECT title, front_image FROM content WHERE category = 2";
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