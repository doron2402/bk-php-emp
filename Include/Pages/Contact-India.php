<?php

$a = rand(0,10);
$b = rand(0,10);
$sum = $a + $b;

$captcha = ' = ' . $a .' + '. $b ;


?>
<style>
.contact_box {
	width: 600px;
	float: right;
}
.contact_box .input {
	float: left;
	height: 25px;
	width: 100px;
}
.contact-inner {
	float: right;
	width: 280px;
	margin-top: 10px;
	margin-right: 140px;
}

.contact_lable {
	width: 60px;
	float: right;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	margin-top: 5px;
}
.contact_input {
	width: 200px;
	height: 20px;
	float: left;
	border:1px solid #c00000;
	resize:none;
	outline:none;
}
.button {
	height: 27px;
	background:url(images/sub_button.png);
	width:65px;
	border-width: 0px;
	cursor:pointer;
	font-size: 12px;
	font-weight: bold;
	color: #FFF;
	float: left;
}
.button-01:hover { background-image: url(images/sub_button.png); background-position: bottom; }
#Head_Contact_Page
{
    font-size: 22px;
    color: #c00000;
}


</style>

   	  <div class="Head_Contact_Page"> צרו איתנו קשר - צוות אינטן </div>
      <div class="split_big"></div>
      <div class="contact_box">
      <div class="contact-inner">
          		<div class="contact_lable">שם :</div>
                <input class="contact_input" name="Client_Name" type="text" />
          	</div> 
            <div class="contact-inner">
          		<div class="contact_lable">טלפון :</div>
                <input class="contact_input" name="Client_Phone" type="text" />
          	</div>
            <div class="contact-inner">
          		<div class="contact_lable">אימייל :</div>
                <input class="contact_input" name="Client_Email" type="text" />
          	</div>
            <div class="contact-inner">
          		<div class="contact_lable">הודעה :</div>
                <textarea name="Client_Message" class="contact_input" style=" height:70px;"></textarea>
          	</div>
            <div class="contact-inner">
                <span class="captcha" style="margin-right:20px; float:left; display:block; width:110px; background-color:#CCC; border-radius: 12px 12px 12px 12px; height:25px;text-align: left; "><span style="margin-left: 30px;margin-top: 5px;"><?=$captcha;?></span> </span>
              <input class="contact_input" name="Captcha"  style="width:100px; " type="text" />
              <input type="hidden" name="Captcha_Ans" value="<?=$sum;?>" />
          	</div>
            <div class="contact-inner">
           <input name="Submit" type="submit" class="button"  value="שלח" />
          	</div>
      </div>
  	
  