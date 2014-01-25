<?php
/*
	File 	:	CountClientViewers.php
*/
error_reporting(0);

if ($_POST['BizId'] > 0 )
{
		$Id = (int)$_POST['BizId']; //Security
		/*
			Mysql
		*/
		require_once '../Config/Config.php';
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
		mysql_query("SET NAMES 'utf8'");

		$Query = "UPDATE `buycoil_In10`.`Pages` SET `View` = `View` + 1  WHERE `Pages`.`Id` =".$Id.";";
		$Result = mysql_query($Query);
		if ($Result)
		{
			echo 'Success!';
			exit();
		}
		else
		{
			echo $Query;
			die("אירעה שגיאה - ClientStatusAjax3");
		}
}
else
{
	die("Error1 - CountClientViewers");
}
?>