<?php
/*
	ContactBiz.php
*/

if($_POST['Id'] != null && $_POST['Name'] != '' && $_POST['Email'] != '' && $_POST['Phone'] != '')
{

	
	//Check that Id is Numeric
	$BizId = $_POST['Id'];
	

	//Require class
	require_once '../Class/Main.class.php';
	//Get Data from Class
	$ContactBiz = new Main();
	
	/*
		Name, Email, Phone, Message
	*/
	$Name = mysql_real_escape_string($_POST['Name']);
	$Email = mysql_real_escape_string($_POST['Email']);
	$Phone = mysql_real_escape_string($_POST['Phone']);
	$Msg = mysql_real_escape_string($_POST['Msg']);
	
	$Seccuess = $ContactBiz->SaveContactDetails($Name,$Email,$Phone,$Msg,$BizId);
	if($Seccuess)
	{
		echo 'פרטייך נשמרו בהצלחה';
	}
	else
	{
		echo 'אירעה שגיאה';
	}
	
}	
else
{
	die("Error!");
}
?>