<?php

mysql_connect('localhost','root','root');
mysql_select_db('in10');
$i = 1;
$fater = 41;
$num_of_child =2;

while($i < ($num_of_child+1)) // Num of Child
{
        for ($zip = 2; $zip < 5; $zip++) // The Different Zip Code
        {
             for($place = 0; $place < 10; $place++)       
                {
                    $id = $fater.'0'.$i.'0'.$zip.'0'.$place;
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
        
        for ($zip = 8; $zip < 10; $zip++) // The Different Zip Code
        {
             for($place = 0; $place < 10; $place++)       
                {
                    $id = $fater.'0'.$i.'0'.$zip.'0'.$place;
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
