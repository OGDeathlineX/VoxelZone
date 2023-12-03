<?php
    function getUsers($mysqli)
    {
        $sql = "SELECT * FROM users";
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

    function getRols($mysqli)
    {
        $sql = "SELECT * FROM rols";
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

    function getContent($mysqli)
    {
        $sql = "SELECT * FROM content";
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

    function getCategory($mysqli)
    {
        $sql = "SELECT * FROM category";
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

    function getAboutUs($mysqli)
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

    function getConfig($mysqli)
    {
        $sql = "SELECT * FROM category";
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

    function getFooter($mysqli)
    {
        $sql = "SELECT * FROM footer";
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

    function getSocialMedia($mysqli)
    {
        $sql = "SELECT * FROM social_media";
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

    function getHeader($mysqli)
    {
        $sql = "SELECT * FROM header";
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