<?php
require_once 'DB.php';


if(isset($_POST['Articale_Name']))
        {$Name = $_POST['Articale_Name'];}
else{echo 'Missing Data! Articale_Name';}

if(isset($_POST['Articale_Link']))
        {$Link = $_POST['Articale_Link'];}
else{echo 'Missing Data! Articale_Link';}

if(isset($_POST['Articale_Content']))
        {$Content = $_POST['Articale_Content'];}
else{echo 'Missing Data! Articale_Content';}


function InsertArticale($Name,$Link,$Content)
{
	$Query = "INSERT INTO `buycoil_In10`.`Articales` (`Id` ,`Link` ,`Name` ,`Content`) VALUES (NULL , '".$Link."', '".$Name."','".$Content."');";
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

InsertArticale(htmlspecialchars($Name),htmlspecialchars($Link),$Content);

?>
