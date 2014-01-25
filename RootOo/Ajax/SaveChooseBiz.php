<?php

/*

	SaveChooseBiz.php
		var Data = 'Id=' + Id + '&Name=' + Name + '&Link=' + Link + '&Alt=' + Alt;

*/

if($_POST['Id'] > -1 && $_POST['Id'] < 10)
{
	require_once 'DB.php';
	$Id = $_POST['Id'];
	$Name = mysql_real_escape_string($_POST['Name']);
	$Link = mysql_real_escape_string($_POST['Link']);
	$Alt = mysql_real_escape_string($_POST['Alt']);

	$Query = "UPDATE `ChosenBusiness` SET `Alt` = '".$Alt."',`Name` = '".$Name."', `Link`='".$Link."' WHERE `ChosenBusiness`.`Id` = ".$Id.";";
	$Result = mysql_query($Query);
	if($Result)
	{
		die("נשמר בהצלחה");
	}
	else
	{
		die("error 2");
	}
	
}
else
{
	die("Error 1");
}


?>