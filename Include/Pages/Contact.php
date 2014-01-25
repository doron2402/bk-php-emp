<?php
$error_message ='<fieldset>'.'חובה למלא שם, טלפון ודואר אלקטרוני' .'</fieldset>';
?>

<style>
input.Contactbutton					
{  
    padding:3px 6px;                        
    border:2px solid #fff; 
    margin:20px 0px 0px 0px; 
    color:#3D7169; 
    font-family:Verdana, Arial, Helvetica, sans-serif;
    background:#CCC; -moz-border-radius:5px; 
	font-weight:bold;
}

</style>

<div class="Head_Contact_Page"> צרו איתנו קשר - צוות אינטן</div>
 <div class="split_big"></div>
 <br/>
 <div id="contact_form" style="padding-right:30px; padding-top:20px;">
<?

$name = $_POST['name'];
$msg = $_POST['msg'];
if (($_POST['contact'] == "1") && ($name != NULL) && ($msg != NULL))
{
	$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=utf8'."\r\n";
	$headers .= "From: info@in10.co.il\r\n";

	$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
	שם: '.$_POST['name'].'<br>
	טלפון: '.$_POST['phone'].'<br>
	אימייל: '.$_POST['mail'].'<br>
	הודעה: '.$_POST['msg'].'<br>
	</body>
	</html>';

	// send mail
	mail("info@in10.co.il", "פנייה חדשה התקבלה דרך אתר in10", $body, $headers);

	// add to db
	mysql_query ("INSERT INTO `Clients` ( `Id`,`Name`,`Cell`,`Email`,`Message`,`Date`,`Hour`,`CompanyId` ) 
	VALUES ( NULL, '".$_POST['name']."','".$_POST['phone']."','".$_POST['mail']."','".$_POST['msg']."','".date("d/m/Y")."','".date("G:i:s")."', '');");


	echo 'פנייתך התקבלה בהצלחה ותטופל בהקדם האפשרי.<br>תודה רבה, צוות in10<br><br>';
}
else
{
?>

<script>
function checkform ( form )
{
	if (form.name.value == '') { alert( "חובה להזין שם מלא." ); form.name.focus(); return false ; }
	if (form.msg.value == '') { alert( "חובה להזין תוכן הודעה." ); form.msg.focus(); return false ; }
  return true ;
}
</script>

  <form method="post" onsubmit="return checkform(this);">
   <input type="hidden" name="contact" value="1">
   <table>
    <tr style="font-size:13px;">
	 <td>שם מלא:</td>
	 <td><input name="name" style="padding:4px; width:200px;"></td>
	</tr>
    <tr style="font-size:13px;">
	 <td>דוא"ל:</td>
	 <td><input name="mail" style="padding:4px; width:200px;"></td>
	</tr>
    <tr style="font-size:13px;">
	 <td>טלפון\פלאפון:</td>
	 <td><input name="phone" style="padding:4px; width:200px;"></td>
	</tr>
    <tr style="font-size:13px;">
	 <td>הודעה:</td>
	 <td><textarea name="msg" style="padding:4px; width:400px; height:200px;"></textarea></td>
	</tr>
	<tr>
	 <td></td>
	 <td align="left"><input type="submit" name="submit" class="Contactbutton" value="שלח טופס צור קשר!" /></td>
	</tr>
   </table>
  </form>

<? } ?>
</div>