<?php
/*
	SignupBiz.php
	
	Id=13&BizName=aaaa&JobField=&Name=aaa&BizAreaCode=03&Email=asdf@as&Phone=123&SiteLink=&Cell=

*/

if($_POST['Id'] != null && $_POST['Id'] > 10 && $_POST['Id'] < 20 && $_POST['BizName'] != '' && $_POST['Name'] != '')
{

	
	//Check that Id is Numeric
	$BizId = 0;
	

	//Require class
	require_once '../Class/Main.class.php';
	//Get Data from Class
	$ContactBiz = new Main();
	
	/*
		Business Details
	*/
	$BizName = mysql_real_escape_string($_POST['BizName']);
	$JobField = mysql_real_escape_string($_POST['JobField']);
	$Name = mysql_real_escape_string($_POST['Name']);
	$BizAreaCode = mysql_real_escape_string($_POST['BizAreaCode']);
	$Email = mysql_real_escape_string($_POST['Email']);
	$Phone = mysql_real_escape_string($_POST['Phone']);
	$Cell = mysql_real_escape_string($_POST['Cell']);
	$SiteLink = mysql_real_escape_string($_POST['SiteLink']);
	
	
	/*
		Send email
	*/
	$to      = 'snir55@yahoo.com,shaiparty@yahoo.com,infointen@gmail.com';
	$subject = 'לקוח חדש נרשם לאינטן';
	$message = '
<html>
<head>
  <title>לקוח חדש נרשם לאתר</title>
</head>
<body>
  <p>לקוח חדש נרשם </p>
  <table>
    <tr><th>שם העסק</th><th>סוג עבודה</th><th>אזור</th><th>שם</th><th>טלפון</th><th>סלולרי</th><th>דוא"ל</th><th>אתר אינטרנט</th></tr>
    <tr><td>'.$BizName.'</td><td>'.$JobField.'</td><td>'.$BizAreaCode.'</td><td>'.$Name.'</td><td>'.$Phone.'</td><td>'.$Cell.'</td><td>'.$Email.'</td><td>'.$SiteLink.'</td>
    </tr>
  </table>
</body>
</html>
';
	$headers = "From: in10@10in.co.il\r\n" . 
		'Reply-To: no-replay@in10.co.il' . "\r\n" .
        'X-Mailer: PHP/' . phpversion() . "\r\n" . 
        "MIME-Version: 1.0\r\n" . 
        "Content-Type: text/html; charset=utf-8\r\n" . 
        "Content-Transfer-Encoding: 8bit\r\n\r\n"; 
	

	mail($to, $subject, $message, $headers);
	
	$Name = $Name .' / עסק : '.$BizName;
	$Phone = $Phone .' / '. $Cell;
	$Msg = 'סוג :  '. $JobField .'  אזור : '. $BizAreaCode .'  אתר: '. $SiteLink;
	$Seccuess = $ContactBiz->SaveContactDetails($Name,$Email,$Phone,$Msg,$BizId);
	if($Seccuess)
	{
		echo "תודה רבה, נציגנו יחזרו אליך בהקדם";
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