<?php
    function getIcons($mysqli)
    {
        $sql = "SELECT social_media.icon, social_media.name FROM footer INNER JOIN social_media ON footer.social_medias=social_media.id";
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

    function getLastText($mysqli)
    {
        $sql = "SELECT foot_text FROM footer ORDER BY id DESC LIMIT 1";
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