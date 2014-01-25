<?php
require_once 'DB.php';


if (isset($_POST['SongPosition']))
{$SongPosition = $_POST['SongPosition'];}
else
{echo '<script>alert("מיקום השיר לא ידוע");</script>';}

if (isset($_POST['SongName']))
{$SongName = $_POST['SongName'];}
else
{echo '<script>alert("שם השיר  לא ידוע");</script>';}


if (isset($_POST['SongLink']))
{$SongLink = $_POST['SongLink'];}
else
{echo '<script>alert("אין קישור לשיר");</script>';}

$query = "UPDATE Music SET Name = '". $SongName ."', Link= '". $SongLink ."' WHERE Position=".$SongPosition.";";
$result = mysql_query($query);

if ($result)
    {
         echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
         echo '<p>עדכון בוצע בהצלחה </p>';

    }
    else
    {    
        echo mysql_error ();

    }




?>
