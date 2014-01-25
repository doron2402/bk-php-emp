<?


	// -------------------------------------
	// Meta title, description & keywords
	// -------------------------------------
	function load_meta($obj, $get_url, $get_id)
	{
	 if(isset ($get_url))
	  {
		$Urlower = strtolower($get_url);
		
		switch($Urlower)
		{
			case 'bizindex':
				$meta[3] = 'למצוא את בעל העסק זאת כבר לא משימה קשה';
				$meta[0] = 'אינטן - IN10 - אינדקס האתרים העסקים המוביל בישראל';
				$meta[1] = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
				$meta[2] = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
				break;
			case "index":
				$meta[3] = 'Index';
				$meta[0] = 'אינטן - IN10 - אינדקס האתרים המוביל בישראל';
				$meta[1] = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
				$meta[2] = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
				break;
		}
	   $meta[3] = $get_url;
	   if (isset ($get_id))
	   {
		$get_id = (int)$get_id;
		$Meta_arr = $obj->GetMetaPage($get_id);
		$meta[0] = '';
		$meta[1] = '';
		$meta[2] = '';
	   }
	   else
	   {
		$meta[3] = 'למצוא את בעל העסק זאת כבר לא משימה קשה';
		$meta[0] = 'אינטן - IN10 - אינדקס האתרים העסקים המוביל בישראל';
		$meta[1] = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
		$meta[2] = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
	   }
	  }
	  else //Default Page
	  {
		$meta[3] = 'למצוא את בעל העסק זאת כבר לא משימה קשה';
		$meta[0] = 'אינטן - IN10 - אינדקס האתרים העסקים המוביל בישראל';
		$meta[1] = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
		$meta[2] = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
	  }
	  return $meta;
	}

	// -------------------------------------
	// Start html
	// -------------------------------------
	function start_html($meta)
	{ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title><?=$meta[0];?></title>
 <meta name="description" content="<?=$meta[1];?>">
 <meta  name="keywords" content="<?=$meta[2];?>">
 <meta name="robots" content="index,follow">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link href="css/inten.css" rel="stylesheet" type="text/css" />
 <meta name="google-site-verification" content="8gpcJ0YagiwfDk4efXgkO3himxCpTmf9Fb9GFLMAJpY" />
 <script type="text/javascript" src="JS/rss.js"></script>
 <script type="text/javascript" src="JS/jquery.js"></script>
 
<script>
function SetVisited(link)
{
  if( $.cookie('VisitedLink') == null ) 
  { 
     $.cookie( 'VisitedLink', link ,  { expires: 7, path: '/' } );
  }
  else
  {
     var data = link;   
     data += ' ' +  $.cookie('VisitedLink');
     $.cookie( 'VisitedLink', data ,  { expires: 7, path: '/' } );
  }
}

function NavigatorPage(link) { window.location = link; }

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=185750004847455";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
<script type="text/javascript" src="JS/jquery.cookie.js"></script>

<script language="JavaScript">
function RadioPopUp(form) {
    var url=(form.dir.options[form.dir.selectedIndex].value);
    myWindow = window.open(url, 'אינטן - IN10 - לשמוע רדיו ישראלי', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no,width=600,height=300');
}
</script>

<!-- old radio script -->
<!-- <script type="text/javascript">
<?php 
$query = "SELECT * FROM Radio;"; 
$result = mysql_query($query); ?>
function getStation(station)
{	
 switch(station)
 { <?php while ($row = mysql_fetch_object($result)) {?>
 case '<?=$row->Name;?>': window.open("<?=$row->Link;?>",station, 'width=300,height=200'); break;
 <?php } ?>
  defualt: window.open("http://locator.3dcdn.com/glz/glglzradio/300/200/radio.html","<?=$row->Name;?>", 'width=300,height=200'); break;
 }
}
</script> -->
<!-- end of old radio script -->

<script type="text/javascript">
$(document).ready(function() 
{
; 
 getRss('news');
 $('#Radio_Station').change(function() 
 {
  var str = $("#Radio_Station option:selected").text();
  getStation(str);
 });
});
 </script>


</head>
<body>
 <div id="fb-root"></div>
  <div class="container" dir="rtl">

	<? }

	// -------------------------------------
	// Top Area
	// -------------------------------------
	function top_area()
	{ ?>

   <div id="top_area">
  	<div class="top_menu_area">
     <table width="100%" cellpadding="0" cellspacing="0">
	  <tr style="height:28px; line-height:28px; font-size:14px; vertical-text:center;">
	   <td align="right" width="60">
	    <a href="Contact"><img src="images/Contact-Us.png" alt="menu" width="50" height="14" border="0" /></a>
	   </td>
	   <td align="right" width="90">
	    <div class="fb-like" data-href="https://www.facebook.com/pages/IN10coil/291861117526359" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false"></div>
	   </td>
	   <td align="right" width="50">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.in10.co.il" data-text="IN10 - אתר האינדקסים הגדול של ישראל">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	  </td>
	  <td width="134"></td>
	  <td align="right"><a href="BizIndex"><img src="images/top_banner.png" alt="banner" width="251" height="24" border="0" /></a></td>
	  <td align="left">
       <a style="cursor:hand;font-weight:bold;color:#004080;font-family:Verdana" HREF="Index">אינדקס האתרים של IN10</a>
	  </td>
	  </tr>
	 </table>
	</div>

	<? }

	// -------------------------------------
	// Second area
	// -------------------------------------
	function second_area($text_in_top, $obj)
	{ ?>
	<!-- 
		Flash Movie Will Be Here
	-->
     <div class="top_second_row">
   	  <?php
	  /*
	  <div class="top_icons">
       <div class="top_icon_heading">
		<img src="images/top_icon_heading.png" width="192" height="15" alt="heading" />
	   </div>
		<!-- Last Visited Link -->
		<?php
         $Visited = explode(" ", $_COOKIE['VisitedLink']);
         for ($i=0; $i<6; $i++) 
		 { if ($Visited[$i] != null) 
			{ 
				$exp2 = explode("|", $Visited[$i]); 
				echo '<div class="topicon"><a href="'.$exp2[1].'" target="_blank"><img src="images/icons2/'.$exp2[0].'" width="61" height=35" border="0" /></a></div>'; 
			} 
		}
        ?>
        <!-- End Of Visited Link -->
   	   </div>

       <!-- Logo with text -->
       <div class="logo">
	    <div class="on_image">
		 <a href="/"><img src="images/logo.png" alt="logo" width="269" height="155" border="0" /></a>
		 <div class="text"><?php echo $text_in_top; ?></div>
		 </div>
	   </div>
       <!-- end of Logo -->

       <!-- Radio Module -->
       <div class="radio">
        <div class="radio_field">
		 <form name="myform">
		 <table width="100%" cellpadding="0" cellspacing="0"><tr>
		  <td align="right">
		 <select id="Radio_Station" dir="rtl" lang="he" class="ralist" name="dir">
          <option value="">בחר תחנת רדיו</option>
		  <?
            $query ="SELECT * FROM Radio;";
            $result = mysql_query($query);
            while ($row = mysql_fetch_object($result)) 
                {
                    echo '<option value="'. $row->Link.'">'. $row->Name .'</option>
						';
                }      
		 ?>
		 </select>
		  </td>
		  <td align="left"><input type="button" name="button" value="נגן" onclick="RadioPopUp(this.form);"></td>
		  <td width="43"></td>
		  </tr></table>
		 </form>
        </div>
       </div>
      <!-- End Radio -->

	  <!-- date -->
	   <?
		$hebrew_names = 'שני,שלישי,רביעי,חמישי,שישי,שבת,ראשון'; $hebrew_names_exp = explode(",", $hebrew_names);
	    $date_name = date("N");
	   ?>
	   <div style="float:left; padding-left:15px; padding-top:20px; font-weight:bold; font-size:14px;">
	    יום <? echo $hebrew_names_exp[$date_name-1]; ?> &nbsp|&nbsp 
		<span class="time_date">
		 <span class="date"></span> &nbsp|&nbsp 
		 <span class="time"></span>
		</span>
		<? 
		$pppz = "'";	
		echo '
		<script>
		var _serverTime = "'.date("Y-m-d-G-i-s").'".split('.$pppz.'-'.$pppz.');
		_serverTime = new Date(_serverTime[0], parseInt(_serverTime[1]-1), _serverTime[2], _serverTime[3], _serverTime[4], _serverTime[5], 0);

		var padlength = function(what){
			var output=(what.toString().length==1)? "0"+what : what;
			return output
		};

		var _updateTime = function() {
			date = _serverTime.getDate()+'.$pppz.'/'.$pppz.'+parseInt(_serverTime.getMonth()+1)+'.$pppz.'/'.$pppz.'+_serverTime.getFullYear();
			$(".time_date .date").html(date);
			time = padlength(_serverTime.getHours())+'.$pppz.':'.$pppz.'+padlength(_serverTime.getMinutes())+'.$pppz.':'.$pppz.'+padlength(_serverTime.getSeconds());
			$(".time_date .time").html(time);
			_serverTime.setSeconds(parseInt(_serverTime.getSeconds()+1));
		};
		setInterval("_updateTime()", 1000);
		</script>'; ?>
	   </div>
	  <!-- end of date -->
	*/
	?><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="1000" height="168" id="flashContent">
  <param name="movie" value="images/MainFlash.swf" />
  <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="images/MainFlash.swf" width="1000" height="168">
  <!--<![endif]-->
      <img src="images/flash.jpg" alt="אינטן - IN10 - אינדקס העסקים המוביל בישראל" />
  <!--[if !IE]>-->
    </object>
  <!--<![endif]-->
</object>

	
	 </div>

	<? }

	// -------------------------------------
	// Third area
	// -------------------------------------
	function third_area($obj)
	{ ?>

     <div class="top_third_row">
   	  <div class="music_button">
	   <a href="Music"><img src="images/music_button.png" alt="music" width="133" height="29" border="0" /></a>
	  </div>

	   <!-- Google -->
       <div class="google_search">
		<script src="http://www.google.com/jsapi" type="text/javascript"></script>
		<script type="text/javascript"> 
		  google.load('search', '1', {language : 'he'});
		  google.setOnLoadCallback(function()
		  {
		  var customSearchControl = new google.search.CustomSearchControl('3381500774346873:0902292181');
			customSearchControl.draw('cse');
			$('.gsc-search-button').click(function (){
				//alert('fasdfsad');
				$('#cse').css('zIndex', 99999);
				 $('.main_right').prepend($('.gsc-wrapper'));
				 $('.main_inner_table_row').hide();
			})
			
		  }, true);
		</script>
        <div id="cse" style="width: 100%;"></div>
       </div>
      <!-- end Google -->

       <div class="weather">
	    <table cellpadding="0" cellspacing="0" dir="rtl" style="padding:0px; margin:0px;"><tr style="padding:0px; margin:0px;">
		  
		  <td style="padding:0px; margin:0px;">
           <a href="/currency" style="color:#000000; margin-top:5px; font-size:12px; margin-left:2px;">
		     <b>דולר</b> = <b>₪</b><?=$obj->currency("USD","ILS",1);?> |
		     <b>יורו</b> = <b>₪</b><?=$obj->currency("EUR","ILS",1);?> | 
		   </a>
           <A href="Weather" style="font-weight:bold; font-size:12px; color:#000;">מזג אוויר
		  </td>

          <td width="2"></td>
		  <td valign="top" style="padding:0px; margin:0px;">
		   <A href="Weather"><img src="http://l.yimg.com/a/i/us/we/52/34.gif" height="25px" width="25px" xml:base="http://weather.yahooapis.com/forecastrss?p=ISXX0025&u=c" border="0"/></a>
		  </td>

		</tr></table>
       </div>
      </div>
     </div>

	<? }

	// -------------------------------------
	// Main left
	// -------------------------------------
	function main_left($obj)
	{  ?>


    <div class="main_left">
   	 <div class="main_left_box">
      <div class="left_heading"><img src="images/business_search_heading.png" width="82" height="17" alt="heading" /></div>
      <div class="split_small"></div>
      <div class="main_left_inner">

<div style="padding:4px;">
<table width="100%" cellpadding="0" cellspacing="0"><tr>
 <td valign="top">בחרו מקצוע</td>
 <td valign="top" align="left">
  <form method="post" style="padding:0px; margin:0px;" method="post" action="redirect.php";>
   <select name="url" dir="rtl" lang="he" class="ralist">
   <option>בחר בעל מקצוע</option>
   <?php 
	$select_biz = $_GET['Biz'];
	if ($select_biz != NULL) $select_biz = 'Biz&Biz='.$select_biz.'';
   $i =0;
   while ($obj->Business[$i]['Name'] != NULL)
   { 
	   if ($select_biz == $obj->Business[$i]['Link']) { ?> <option value="<?=$obj->Business[$i]['Link'];?>" SELECTED><?=$obj->Business[$i]['Name'];?></option> <? }
	   else { ?> <option value="<?=$obj->Business[$i]['Link'];?>"><?=$obj->Business[$i]['Name'];?></option> <? }
	 ?>
   <?php $i++; } ?>
   </select><br><div style="padding-top:5px;"></div>
   <div style="text-align:left;"><input type="submit" value="הצג"></div>
  </form>
 </td>
</tr></table>
</div>
        
	  </div>
   	 </div>
	 <!-- Start Google Ads -->
	 <div class="main_left_box" style="height:80px;">
		<script type="text/javascript"><!--
			google_ad_client = "ca-pub-3047806037494965";
			/* Left_Corner */
			google_ad_slot = "0591037534";
			google_ad_width = 234;
			google_ad_height = 60;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
	 </div>
	 <!-- End Google Ads -->
      <div class="main_left_box">
      	<div class="left_heading"><img src="images/news_flash_heading.png" width="82" height="17" alt="heading" /></div>
        <div class="split_small"></div>
        <div class="left_heading">
          <div class="news_sub_headings"><a href="#" onclick="getRss('news');"><img src="images/news_sub1_heading.png" alt="news" width="45" height="17" border="0" /></a></div>
          <div class="news_sub_headings"><a href="#" onclick="getRss('sport');"><img src="images/news_spots_heading.png" alt="news" width="45" height="17" border="0" /></a></div>
          <div class="news_sub_headings"><a href="#" onclick="getRss('gossip');"><img src="images/news_gossip_heading.png" alt="news" width="45" height="17" border="0" /></a></div>
        </div>
        <div class="split_small"></div>
        <div class="main_left_inner">
         <div id="rss">
                <!-- Here Will output the RSS feed -->
         </div>
        </div>
   	  </div>
      
      <div class="main_left_box">
      	<div class="left_heading">
   	     <img src="images/facebook_heading.png" width="239" height="44" alt="facebook" /></div>
         <div class="split_small"></div>
         <div class="main_left_inner">
          <div id="fb-root"></div>
		   <script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/he_IL/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		 <div class="fb-like-box" data-href="https://www.facebook.com/pages/IN10coil/291861117526359" data-width="239" data-height="254" data-show-faces="true" data-border-color="200" data-stream="false" data-header="false"></div>

    </div>
   	 </div>

	 <!-- buy10 -->
     <div class="main_left_box">
		<?
		 $result = mysql_query("SELECT * FROM Adv WHERE id='".biz_id."' LIMIT 1;");
		 echo mysql_result($result, 0, "space1");
		?>
     </div>
	 <!-- end of buy10 -->

<?
	 /* old
     <div class="left_heading"><img src="images/buy10_heading.png" width="45" height="17" alt="heading" /></div>
      <div class="split_small"></div>
      <div class="main_left_inner">
       <div class="buy10_deal_image"><a href="#"><img src="images/buy10_deal_image.png" alt="image" width="106" height="150" border="0" /></a></div>
       <div class="buy10_rate_box">64 ₪</div>
       <div class="buy10_text"><img src="images/buy10_text.png" width="112" height="16" alt="text" /></div>
       <div class="buy10_button"><a href="#"><img src="images/sendmenu_small.png" alt="menu" width="73" height="28" border="0" /></a></div>
      </div>
   	 </div> --> */
?>

	 <!-- banner -->
     <div class="main_left_box">
		<?
		 $result = mysql_query("SELECT * FROM Adv WHERE id='".biz_id."' LIMIT 1;");
		 echo mysql_result($result, 0, "space2");
		?>
     </div>
	 <!-- end of banner -->

 </div>
</div>
	<? }
	

	// -------------------------------------
	// Footer
	// -------------------------------------
	function footer()
	{ ?>

  <!-- footer -->
  <div class="footer_area">
   <div style="padding:10px 10px 0px 10px;">
    <table width="100%" cellpadding="0" cellspacing="0">
	 <tr>
	  <td align="right" valign="top">
	   <a href="Contact"><img src="images/Contact-Us.png" alt="menu" width="50" height="14" border="0" /></a><br><div style="padding-top:10px;"></div>
       <div class="comm_icon"><a href="http://twitter.com/in10_" target="_blank"><img src="images/community_icon3.png" alt="icon" width="24" height="24" border="0" /></a></div>
       <div class="comm_icon"><a href="http://www.facebook.com/pages/IN10coil/291861117526359" target="_blank"><img src="images/community_icon4.png" alt="icon" width="24" height="24" border="0" /></a></div>
	  </td>
	  <td align="center" valign="top">
	   <!-- free text by admin -->
        <?php 
		$query = "SELECT * FROM footer WHERE id=1;"; 
		$result = mysql_query($query); 
		$footer_text =  mysql_result($result, 0, "text"); ?>
		<? echo $footer_text; ?>
	   <!-- end of free text by admin -->
	  </td>
	  <td align="left" valign="top">
	  </td>
	 </tr>
	</table>
   </div>
  </div>
  <!-- end of footer -->

</div>


<?
	// right Adv
	$result			= mysql_query("SELECT * FROM Adv WHERE id='".biz_id."' LIMIT 1;");
	$right			= mysql_result($result, 0, "right");
	$right_width	= mysql_result($result, 0, "right_width");
	$right_height	= mysql_result($result, 0, "right_height");
	$right_text = str_replace("<p>", "", $right);
	$right_text = str_replace("</p>", "", $right_text);

	if ($right != NULL)
	{
		echo '<style>#right_holder { text-align:right; display: block; right: 2px; width:'.$right_width.'px; height:'.$right_height.'px; overflow: hidden; z-index: 15000; position: fixed; top:2px; }</style>
		<!--[if IE 6]>
		<style>#right_holder { text-align:right; display: block; right: 2px; width:'.$right_width.'px; height:'.$right_height.'px; overflow: hidden; z-index: 0; position: absolute; top:expression(eval(document.compatMode && document.compatMode=="CSS1Compat") ? documentElement.scrollTop+(documentElement.clientHeight-this.clientHeight) : document.body.scrollTop+(document.body.clientHeight-this.clientHeight) ); }</style>
		<![endif]-->
		<div id="right_holder">'.$right_text.'</div>';
	}
?>

<?
	// left Adv
	$result			= mysql_query("SELECT * FROM Adv WHERE id='".biz_id."' LIMIT 1;");
	$left			= mysql_result($result, 0, "left");
	$left_width		= mysql_result($result, 0, "left_width");
	$left_height	= mysql_result($result, 0, "left_height");
	$left_text = str_replace("<p>", "", $left);
	$left_text = str_replace("</p>", "", $left_text);

	if ($left != NULL)
	{
		echo '<style>#left_holder { display: block; left: 2px; width:'.$left_width.'px; height:'.$left_height.'px; overflow: hidden; z-index: 15000; position: fixed; top:2px; }</style>
		<!--[if IE 6]>
		<style>#left_holder { display: block; left: 2px; width:'.$left_width.'px; height:'.$left_height.'px; overflow: hidden; z-index: 0; position: absolute; top:expression(eval(document.compatMode && document.compatMode=="CSS1Compat") ? documentElement.scrollTop+(documentElement.clientHeight-this.clientHeight) : document.body.scrollTop+(document.body.clientHeight-this.clientHeight) ); }</style>
		<![endif]-->
		<div id="left_holder">'.$left_text.'</div>';
	}
?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28556788-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<? } ?>