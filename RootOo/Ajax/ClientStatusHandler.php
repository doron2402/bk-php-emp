<?php

/*
	Client Handler
	Filename :	ClientStatusHandler.php
	Author	 :	Doron2402 A T Gmail yup its dot com
	Get(Company Id , Status 0,1,2,4)

*/

if ($_POST['CompId'] > -1 && $_POST['StatusVal'] > -1)
{
	$CompId = (int)$_POST['CompId'];
	$StatusVal = (int)$_POST['StatusVal'];
	
	$Status = array(0 => 'לא טופל',
					1 => 'ליד טופל',
					2 => 'המתנה',
					4 => 'למחוק');
					
	if ($StatusVal == 0 ||$StatusVal == 1 ||$StatusVal == 2 ||$StatusVal == 4)
	{
		//Connect To SQL
		include_once 'DB.php';
		$Query = "UPDATE `buycoil_In10`.`Clients` SET `Status` = '".$StatusVal."' WHERE `Clients`.`Id` =".$CompId.";";
		$Result = mysql_query($Query);
		if ($Result)
		{
			echo 'נשמר בהצלחה';
			exit();
		}
		else
		{
			die("אירעה שגיאה - ClientStatusAjax3");
		}
	}
	else
	{
		die("אירעה שגיאה - ClientStatusAjax2");
	}
}
else
{
	die("אירעה שגיאה - ClientStatusAjax1");
}