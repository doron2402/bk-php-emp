<?php

mysql_connect('localhost','root','root');
mysql_select_db('in10');
$i = 1;
$end = 46;


for ($index = 0; $index < 46; $index++) 
    {
        for ($zip = 8; $zip < 10; $zip++)
        {
             for($place = 0; $place < 10; $place++)       
                {
                    $id = $i.'00'.'0'.$zip.'0'.$place;
                    $query = "INSERT INTO Pages (Id) Values('". $id ."');";
                    $result = mysql_query($query); 
                    if ($result)
                    {
                        print ('Id: '. $id);
                    }
                    else
                    {
                        die(mysql_error());
                    }
                }
        } 
        $i++;
    }
    mysql_close();
?>
