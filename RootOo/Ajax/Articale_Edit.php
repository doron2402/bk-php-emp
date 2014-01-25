<?php

/*
	Ajax/Articale_Edit.php
*/


require_once 'DB.php';

if(isset($_POST['Articale_Id']))
        {$Id = (int)$_POST['Articale_Id'];}
else{echo 'Missing Data! Articale_Id';}

if(isset($_POST['Articale_Name']))
        {$Name = $_POST['Articale_Name'];}
else{echo 'Missing Data! Articale_Name';}

if(isset($_POST['Articale_Link']))
        {$Link = $_POST['Articale_Link'];}
else{echo 'Missing Data! Articale_Link';}

if(isset($_POST['Articale_Content']))
        {$Content = $_POST['Articale_Content'];}
else{echo 'Missing Data! Articale_Content';}


function UpdateArticale($Id,$Name,$Link,$Content)
{
	$Query = "UPDATE `buycoil_In10`.`Articales` SET `Name` = '".$Name."', Link = '".$Link."', `Content` = '".$Content."' WHERE `Articales`.`Id` = ".$Id.";";
	$Result = mysql_query($Query);
	if($Result)
	{
		echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
        echo '<p>עדכון בוצע בהצלחה </p>';
	}
	else
	{
		echo mysql_error ();
	}
}

UpdateArticale($Id,htmlspecialchars($Name),htmlspecialchars($Link),$Content);

?>
