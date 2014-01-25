<?php
require_once 'DB.php';

function setIndexTableText($id,$T2,$T3,$T4,$T8,$T9)
{
    
    $query = "UPDATE IndexTables SET T02='".$T2."', T03='".$T3 ."',  T04='".$T4 ."',
        T08='".$T8 ."', T09='".$T9 ."'  WHERE Id='".$id."';";
//    echo $query;
    $result = mysql_query($query);
   
    if ($result)
    {
         echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
         echo '<p>עדכון בוצע בהצלחה </p>';
         mysql_close();
    }
    else
    {    
        echo mysql_error ();
        mysql_close();
    }
}


$Id = $_POST['Id'];
$T02 = '';
$T03 = '';
$T04 = '';
$T08 = '';
$T09 = '';
for ($i=0;$i<10;$i++)
	$T02 = "".$T02."".$_POST['field02'.$i.''].",";
for ($i=0;$i<10;$i++)
	$T03 = "".$T03."".$_POST['field03'.$i.''].",";
for ($i=0;$i<10;$i++)
	$T04 = "".$T04."".$_POST['field04'.$i.''].",";
for ($i=0;$i<10;$i++)
	$T08 = "".$T08."".$_POST['field08'.$i.''].",";
for ($i=0;$i<10;$i++)
	$T09 = "".$T09."".$_POST['field09'.$i.''].",";


setIndexTableText($Id,htmlspecialchars($T02),htmlspecialchars($T03),htmlspecialchars($T04),htmlspecialchars($T08),htmlspecialchars($T09));

?>
