<?
/*
	IN10.co.il
	Client Page.
*/

/*
	Count Traffic
*/

if ($row->Id > 0)
{	
		$BizId = (int)$row->Id;
		$Query = "UPDATE `buycoil_In10`.`Pages` SET `Traffic` = `Traffic` + 1  WHERE `Pages`.`Id` =".$BizId.";";
		$Result = mysql_query($Query);
		if (!$Result)
		{
			Die('Error Traffic!');
		}
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/he_IL/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript" src="JS/Contact/contact.js"></script>
 <script type="text/javascript">
	function DiscoverElement()
	{
		$('.ContactInfoIntro').hide();
		$('.ContactInfo').fadeIn('slow');
		$('.ContactInfo').show();
		<?php
		/*
			Count View for each business in order to know 
			how many leads came from the page
		*/
		?>
		$.ajax({
		  url: 'Ajax/CountClientViewers.php',
		  data: 'BizId=<?=$row->Id;?>',
		  type: 'POST',
		   success: function(data) 
		   {
			console.log(data);
		  }
		});
	}
 </script>
 
	<?php
		if	($_GET['Id'] != '')
		{
			echo '<div class="inner_main_heading" style="float: right;height: 70px;width: 100%;margin-top: -5px;text-align: right;direction: rtl;margin-right:20px;">';
			echo '<h1 STYLE="padding-bottom: 20px; font-weight: bold; color: black; font-size: 30px;">'.$row->Title.'</h1>';
		}
		else
		{
			echo '<div class="inner_main_heading" style="float: right;height: 18px;width: 100%;margin-top: 10px;text-align: right;direction: rtl;">';
		}
	?>
</div>
  <div class="main_inner_business_row" style="padding:0px; margin:0px;">
   <div class="business_gallery_inner" style="padding:0px;">
    <div class="business_gallery_big_image">
              <?php
              if ($row->Img != NULL)
              {
				    echo '<img src="images/pages/'.$row->Img.'" width="515" height="276">';
              }
              else
              {
                    echo '<img src="images/pages/in10.png" width="515" height="276">';
              }
              ?>
			  <div style="margin-top:10px;"></div>
          </div>
        </div>
      </div>
     

	  <!-- contact esek -->
      <div class="main_inner_business_small">
       <div class="business_main_heading_small_cat"><img src="images/business_but_02.png"></div>
       <div class="split_small_inner" style="padding:0px; margin:4px 0px 4px 0px;"></div>
       <div class="business_small_inner_area">
        <div class="ContactInfo" style="display:none;"><p><?=$row->ContactModule;?></p></div>
		<div class="ContactInfoIntro" style="display:block;cursor:pointer;" onClick="DiscoverElement();">לחץ כאן להצגת פרטי הלקוח</div>
       </div>
	   <br />
	   <br />
	   <div class="FacebookRecommandBusiness" style="margin-top:50px;">
		<div class="fb-like" data-href="http://www.in10.co.il/Page&Id=<?=$row->Id;?>" data-send="true" data-width="320" data-show-faces="true" data-action="recommend" data-font="arial"></div>
	   </div>
       <div class="business_small_inner_area"></div>
      </div>
      
	  <!-- contact esek -->
      <div class="main_inner_business_small">
       <div class="business_main_heading_small_cat"><img src="images/business_but_03.png"></div>
       <div class="split_small_inner" style="padding:0px; margin:4px 0px 4px 0px;"></div>

<?
$name = $_POST['name'];
$msg = $_POST['msg'];
if (($_POST['contact_esek'] == "1") && ($name != NULL) && ($msg != NULL))
{
	$headers = 'MIME-Version: 1.0'."\r\n";
	$headers .= 'Content-type: text/html; charset=utf8'."\r\n";
	$headers .= "From: admin@in10.co.il\r\n";

	$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
	שם: '.$_POST['name'].'<br>
	טלפון: '.$_POST['phone'].'<br>
	אימייל: '.$_POST['mail'].'<br>
	הודעה: '.$_POST['msg'].'<br>
	</body>
	</html>';

	// send mails
	mail("index@in10.co.il", "פנייה לבעל עסק דרך אתר in10 - #".$_POST['id']." - ".$_POST['title']."", $body, $headers);
	
	// add to db
	mysql_query ("INSERT INTO `buycoil_In10`.`Clients` ( `Id`,`Name`,`Cell`,`Email`,`Message`,`Date`,`Hour`,`CompanyId` ) 
	VALUES ( NULL, '".mysql_real_escape_string($_POST['name'])."','".mysql_real_escape_string($_POST['phone'])."','".mysql_real_escape_string($_POST['mail'])."','".mysql_real_escape_string($_POST['msg'])."','".date("d/m/Y")."','".date("G:i:s")."','".(int)$_POST['id']."');");

	echo "<script>alert('הפנייה לבעל העסק התקבלה בהצלחה!');</script>";


}
?>

<script>
function checkform ( form )
{
	if (form.name.value == '') { alert( "חובה להזין שם מלא." ); form.name.focus(); return false ; }
	if (form.msg.value == '') { alert( "חובה להזין תוכן הודעה." ); form.msg.focus(); return false ; }
  return true ;
}
</script>


        <div id="ContactForm">
        <form method="post" onsubmit="return checkform(this);">
		 <input type="hidden" name="contact_esek" value="1">
        <div class="business_small_inner_area">
       	  <div class="business_contact_row">
          	<div class="business_contact_field_text">שם מלא</div>
            <div class="business_contact_field">
            	<input type="text"   class="input"				name="name">
                <input type="hidden" value="<?=$row->Id;?>"		name="id"></input>
              <input type="Hidden"   value="<?=$row->Title;?>"	name="title"></input>
            </div>
       	  </div>
        </div>
        <div class="business_small_inner_area">
       	  <div class="business_contact_row">
          	<div class="business_contact_field_text">טלפון</div>
            <div class="business_contact_field">
            	<input type="text" class="input"				name="phone">
            </div>
       	  </div>
        </div>
        <div class="business_small_inner_area">
       	  <div class="business_contact_row">
          	<div class="business_contact_field_text">דוא"ל</div>
            <div class="business_contact_field">
            	<input type="text" class="input"				name="mail">
            </div>
       	  </div>
        </div>
        <div class="business_small_inner_area">
       	  <div class="business_contact_row">
          	<div class="business_contact_field_text">תיאור</div>
            <div class="business_contact_field">
              <textarea class="input_big"						name="msg"></textarea>
            </div>
       	  </div>
        </div>
        <div class="business_small_inner_area">
       	  <div class="business_contact_row">
            <div class="business_contact_field" style="text-align:left;">
              <input type="submit" value="שלח טופס!" name="submit_btn" style="font-size:13px; padding:3px;" >
            </div>
       	  </div>
        </div>
          </form>
          </div>
      </div>
      
	  <!-- Text For Business -->
      <div class="main_inner_business_row">
        <div class="business_main_heading_small"><img src="images/business_but_04.png"></div>
        <div class="split_big" style="padding:0px; margin:4px 0px 4px 0px;"></div>
        <div class="business_gallery_inner">
               <?=$row->Text_Body;?>
        </div>
      </div>
	  
	 <!-- Facebook Comment for Each Business -->
      <div class="main_inner_business_row">
        <div class="business_main_heading_small"><h2 style=""><?=$row->Title;?> - התגובות שלכם לבעלי העסקים</h2></div>
        <div class="split_big" style="padding:0px; margin:4px 0px 4px 0px;"></div>
        <div class="business_gallery_inner">
            <div class="fb-comments" data-href="http://www.in10.co.il/Page&Id=<?=$row->Id;?>" data-num-posts="4" data-width="600"></div>
        </div>
      </div>
