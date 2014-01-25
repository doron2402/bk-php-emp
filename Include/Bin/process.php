<?
//This Function get an ajax POST insert into Client DB and send an email

function InsertClient($ClientName,$ClientEmail,$ClientPhone,$ClientMessage,$CompTitle,$CompId)
{
    require_once '../../Admin/Ajax/DB.php';
    $date = date("Y-m-d");
    $query = "INSERT INTO Clients (Name,Cell,Email,Message,Date,CompanyTitle,CompanyId) 
        VALUES('".$ClientName."','".$ClientPhone."','".$ClientEmail."','".$ClientMessage."',
            '".$date."','". $CompTitle ."','". $CompId ."');";
    $result = mysql_query($query);
    if($result)
    {
        Return True;
    }
    else
    {
        die(mysql_error());
    }
}

if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['phone'])) && (strlen(trim($_POST['phone'])) > 0)) {
	$phone = stripslashes(strip_tags($_POST['phone']));
} else {$phone = 'No phone entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message= 'No message entered';}


$name = ($name);
$email = ($email);
$phone = ($phone);
$message = ($message);
$Title = $_POST['CompTitle'];
$Id =$_POST['CompId'];
InsertClient($name, $email, $phone, $message, $Title, $Id);

ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Phone</td>
    <td><?=$phone;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Phone</td>
    <td><?=$message;?></td>
  </tr>  
    <tr bgcolor="#eeffee">
    <td>Title</td>
    <td><?=$Title;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Id</td>
    <td><?=$Id;?></td>
  </tr>  
</table>
</body>
</html>
<?


$body = ob_get_contents();

$to = 'infointen@gmail.com';
$email = 'infointen@gmail.com';
$fromaddress = $email;
$fromname = "Online Contact - " . $name;

require("phpmailer.php");

$mail = new PHPMailer();

$mail->From     = "info@in10.co.il";
$mail->FromName = "Contact Form";
$mail->AddAddress("info@in10.co.il","Info-IN10");
$mail->AddAddress("infointen@gmail.com","IN10 - Gmail");

$mail->WordWrap = 50;
$mail->IsHTML(true);

$mail->Subject  =  "You Got A New Client";
$mail->Body     =  $body;
$mail->AltBody  =  "לקוח מילא פרטי משוב";

if(!$mail->Send()) {
	$recipient = 'info@in10.co.il';
	$subject = 'Contact form failed';
	$content = $body;	
  mail($recipient, $subject, $content, "From: info@in10.co.il\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
  exit;
}
?>
