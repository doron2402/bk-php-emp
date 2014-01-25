<?php
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
?>
