<?php
require_once 'DB.php';

if(isset ($_POST['station_link']))
{
    $link = $_POST['station_link'];
}
 else 
     {echo '<script type="text/javascript">alert("חסר נתונים");</script>';
exit ();}
if(isset ($_POST['station_name']))
{
 $name = $_POST['station_name'];   
}
else 
     {echo '<script type="text/javascript">alert("חסר נתונים");</script>';
     exit();
     }
    
    
    
if($_POST['Id'] == 0)
{
    //Entering new data
    $query = "INSERT INTO Radio (Link,Name) VALUES ('".$link ."','".$name ."');";
}
else
{
    $id = $_POST['Id'];
    $query = "UPDATE Radio SET Link='". $link ."', Name='". $name ."' WHERE Id=". $id .";";
}


$result = mysql_query($query);
if($result)
{
    //Success!
           echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
         echo '<p>עדכון בוצע בהצלחה </p>';
}
else
{
    //Abort
     echo mysql_error ();
}
?>
