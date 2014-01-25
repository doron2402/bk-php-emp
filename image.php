<?php

if(isset ($_GET['Image_Id']))
{
    $image_id = $_GET['Image_Id'];
    
        //mysql Cardential
        define("Dbhost", "localhost");
	define("Dbuser","buycoil_In10User");
	define("Dbpass", "1q2w3e4r!@");
	define("Dbname", "buycoil_In10");

        $link =mysql_connect(MYSQL_SERVER,MYSQL_USER,MYSQL_PASS);
        if(!$link)
        {
            die(mysql_error());
        }
        $con = mysql_select_db(MYSQL_DB);
        if(!$con)
        {
            die(mysql_error());
        }

        $query = "SELECT * FROM Pages WHERE Id = '". $image_id ."';";
        
        $result = mysql_query($query);
        if(!$result)
        {
            die(mysql_error());
        }

        $row = mysql_fetch_object($result);
        header("Content-type:$row->ImgType");
        echo $row->Img;
        
}
else
{
        die("Wrong Image Id");
}

?>