<?php

error_reporting(1);

//mysql Cardential
define("MYSQL_USER","buycoil_In10User");
define("MYSQL_SERVER","localhost");
define("MYSQL_PASS", "1q2w3e4r!@");
define("MYSQL_DB", "buycoil_In10");

/* Connecting to mysql DB */
	$link = mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS);  
    if (!$link) {die('Could not connect: ' . mysql_error());}
	$db_select = mysql_select_db(MYSQL_DB, $link);
	if (!$db_select){die("Cant use ". MYSQL_DB .'  '. mysql_error());}
	mysql_query("SET NAMES 'utf8'");

?>
