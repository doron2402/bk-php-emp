<?php
/*
	IN10.co.il
	
	Date September 2012
	
	Owners:
	Shai Zelekta 
	Snir Toledo
	
	Developer 	:		Doron Segal
	
	Design 		:		Ofer Gonen

*/

//error_reporting(-1);
error_reporting(0);
//Require Class
require_once 'Class/Main.class.php'; //Loading Class Main

$SiteObj = new Main();
$PageHeight = '1800';
if(isset($_GET['url']))
{
	$GetPageUrl = $_GET['url']; //Clear un wanted security issue
	$Urlower = strtolower($GetPageUrl );
	switch($Urlower)
		{
			case 'bizindex':
				$Text = 'למצוא את בעל העסק זאת כבר לא משימה קשה';
				$Title = 'אינטן - IN10 - אינדקס האתרים העסקים המוביל בישראל';
				$Description = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
				$Keyword = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
				break;
			case "index":
				$Text= 'Index';
				$Title = 'אינטן - IN10 - אינדקס האתרים המוביל בישראל';
				$Description = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
				$Keyword = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
				break;
			case "page":
			{
				if($_GET['Id'] != null)
					{
						$GetPageId = (int)$_GET['Id'];	//checking for Id only integer
						//Get The page Title,Keyword,Description...
						$BizData = $SiteObj->getPageRow($GetPageId);
						$Text= $BizData['Name'];
						$Title = $BizData['Title'];
						$Description = $BizData['Meta_Description'];
						$Keyword = $BizData['Meta_Keywords'];
					}
				else
				{
					//Error not exsist
					$Title = "DD";
				}
			}
				break;
			case "biz":
				/*
					Get specific biz
				*/
				$PageHeight = '3000';
				$BizBiz = mysql_real_escape_string($_GET['Biz']);
				$BizHEader = $SiteObj->getBizHeader($BizBiz);
				$Text= $BizHEader['Name'];
				$Title = $BizHEader['Name'];
				$Description = $BizHEader['Description'];
				$Keyword = $BizHEader['Keyword'];
				break;
			default:
				$Text= 'למצוא את בעל העסק זאת כבר לא משימה קשה';
				$Title = 'אינטן - IN10 - אינדקס האתרים העסקים המוביל בישראל';
				$Description = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
				$Keyword = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
		}
}
else
{
	$GetPageUrl = false;
	$Text= 'למצוא את בעל העסק זאת כבר לא משימה קשה';
	$Title = 'אינטן - IN10 - אינדקס האתרים העסקים המוביל בישראל';
	$Description = 'אינטן - IN10 - אינדקס אתרים ישראלי נוח לשימוש, דף הבית החדש שלכםם. מגוון רחב של קישורים ופרסום עסקים.';
	$Keyword = 'אינטן, אין 10, אינטן - IN10, inten, פורטל עסקים, פורטל';
}



	
	$Site = array(
		'Description'=>$Description,
		'Title'=>$Title,
		'Keyword'=>$Keyword,
		'Text'=>$Text,
	);
	
	$Facebook = array(
							'url' => 'http://www.in10.co.il',
							'title' => 'אינטן - רשת חברתית למציאת בעלי מקצוע הטובים ביותר - '.$Title,
							'type' => 'website',
						);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="logo.png" />
 <title><?php echo $Site['Title'];?></title>
 <meta property="og:title" content="<?php echo $Facebook['title'];?>" />
<meta property="og:type" content="<?php echo $Facebook['type'];?>" />       
<meta property="og:url" content="<?php echo $Facebook['url'];?>" />
 <meta name="description" content="<?php echo $Site['Description'];?>">
 <meta  name="keywords" content="<?php echo $Site['Keyword'];?>">
 <meta name="robots" content="index,follow">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="google-site-verification" content="8gpcJ0YagiwfDk4efXgkO3himxCpTmf9Fb9GFLMAJpY" />
 <script type="text/javascript" src="JS/rss.js"></script>
 <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css">
 <script type="text/javascript">
$(document).ready(function() {		
	
	//Execute the slideShow
	slideShow();
	getRss('news');
	});

function getRss(str)
{

if (str.length==0)
  {
  document.getElementById("ShowRssFeed").innerHTML="Empty";
  return false;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("News").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","Include/Rss/rss_proxy.php?rss="+str,true);
xmlhttp.send();
}

function SearchBiz()
{
	var Biz = $('#SelectBiz').val();
	var Code = $('#SelectAreaCode').val();
	if (Biz != '00'	&& Code != '00')
	{
		var Link = "http://qa.in10.co.il/Biz&Biz=" + Biz + "#" + Code;
		window.location.replace(Link);

	}
	else if(Code == '00')
	{
		alert('בחר איזור');
	}
	else if(Biz == '00')
	{
		alert('בחר עסק');
	}
}
function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);	
}
</script>
</head>
<body>
<script type="text/javascript">
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=185750004847455";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div id="Content">
	<!-- in.co.il - Header -->
	<div id="Header">
		<div id="Logo">
			<a href="http://www.in10.co.il" title="אינטן בחירת עסקים המשתלמים ביותר">
				<img src="images/Main/logo.png" alt="אינטן - מציאת 10 העסקים המשתלמים ביותר" width="175" height="125"/></a>
		</div>
		<div id="SearchTop">
			<p>שלום אורח</p>
			<div id="SearchTopBox">
			<?php
			$OptionCat = $SiteObj->getOptionCategory();
			?>
			<script type="text/javascript">
			function SearchTopBox()
			{
				var String = $('#srch').val();
		var Link = 0;
		switch(String)
		{
			 <?php
		
		foreach ($OptionCat as $Key => $Val)
		{
			echo 'case "'.$Val.'":';
			echo 'Link = '.'"'.$Key.'";';
			echo 'break;';
		}
		?>
			default:
				Link = 0;
				break;
		}
		if (Link != 0)
		{
			document.location.href = '/Biz&Biz=' + Link;
		}
	
			}

    $(function() {
        var availableTags = [
            "ActionScript",
 <?php
		
		foreach ($OptionCat as $Key => $Val)
		{
			echo '"'.$Val.'",';
		}
?>
        ];
        $( "#srch" ).autocomplete({
            source: availableTags
        });
    });
    </script>
				<input type="text" id="srch" onFocus="if($(this).val() == 'חפש איש מקצוע'){$(this).val('');}" onBlur="if($(this).val() == ''){$(this).val('חפש איש מקצוע');}" name="SearchBiz" value="חפש איש מקצוע" />
				<a onClick="SearchTopBox();" alt="חפש איש מקצוע" >חפש</a>

			</div>
		</div>
	</div>
	<!-- in10.co.il - Menu Bar -->
	<div id="MenuBarTop">
		<ul>
		<?php
			$MenuLi = $SiteObj->getMainMenu($GetPageUrl);
			foreach($MenuLi as $Li)
			{
				echo $Li;
			}
		?>
		</ul>
	</div>
		<?php
		//Show Slider Only first Page
		switch($Urlower)
		{
			case 'index':
				include_once 'Include/Header/Main.php';
				break;
			case 'about':
				include_once 'Include/Content/about.php';
				break;
			case 'contact':
					include_once 'JS/ContactForm.js';
					include_once 'Include/Content/Contact.php';
				break;
			case 'articales':
					echo '<div id="HeaderContent">
					<div id="ContactUs">
						<div id="HeadLine">
						<h1>מאמרים</h1>
						</div>
						<div id="ContactText" style="width:90%;margin-right:auto;margin-left:auto;">';
						if (isset($_GET['ArticaleName']))
						{
							$Articales = $SiteObj->getSpecificArticale($_GET['ArticaleName']);
							echo '<div id="AricaleText">';
							echo $Articales['Content'];
							echo '</div>';
						}
						else
						{
							$Articales = $SiteObj->getArticalesPage();
							foreach($Articales as $key => $val)
							{
								echo '<a href="articales&ArticaleName='.$val['Link'].'" name="'.$val['Name'].'">'.$val['Name'].'</a><br />';
							}
						}
						echo '</div></div></div>';
				break;
			case "signup":
				include_once 'Include/Content/Signup.php';
				break;
			default:
				include_once 'Include/Header/Main.php';
				break;
		}
	?>
	<div id="MainContent" style="height:<?php echo $PageHeight;?>px">
		<div id="RightCol">
			<div id="RightBar">
			<a href="http://www.in10.co.il" alt="בעלי מקצוע של אינטן">חיפוש עסקים</a>
			</div>
			<div id="ChooseBusiness">
				<p alt="">בחרו מקצוע</p>
				<select id="SelectBiz">
					<option value="00">בחרו בעל מקצוע</option>
					<?php
						//List of Business Category
						$OptionCat = $SiteObj->getOptionCategory();
						//$OptionCat['key'] => $OptionCat['value']
						foreach ($OptionCat as $Key => $Val)
						{
							echo '<option value="'.$Key.'">'.$Val.'</option>';
						}
					?>
				</select>
				<br />
				<br />
				<select id="SelectAreaCode">
					<option value="00">בחר אזור</option>
					<option value="03">מרכז</option>
					<option value="04">צפון</option>
					<option value="08">דרום</option>
					<option value="02">ירושלים</option>
					<option value="09">שרון</option>
				</select>
				<br /><br />
				<a onClick="SearchBiz();">חפש</a>
			</div>
			<br /><br />
			<div id="RightBar">
			<a href="http://www.in10.co.il" alt="בעלי מקצוע של אינטן">המקצועות המבוקשים</a>
			</div>
			<div id="WantedBusinss">
			<ul>
			<?php
				//Get Most Wanted Business
				$BizTopSide = $SiteObj->getTopSideBiz();
				while($RowBizTopSide = mysql_fetch_assoc($BizTopSide))
				{
					echo '<li><a href="Biz&Biz='.$RowBizTopSide['Link'].'" alt="'.$RowBizTopSide['Alt'].'">'.$RowBizTopSide['Name'].'</a></li>';
				}
			?>
			</ul>

			</div>
			<br /><br />
			<?php
			/*
			<div id="RightBar">
				<a href="http://www.in10.co.il" alt="בעלי מקצוע של אינטן">פרסומת</a>
			</div>
			*/
			?>
			<div id="Commercial">
				<script type="text/javascript"><!--
			google_ad_client = "ca-pub-3047806037494965";
			/* Squre */
			google_ad_slot = "9275964832";
			google_ad_width = 250;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
			</div>
			<br /><br />
			<div id="RightBar">
				<a href="http://www.in10.co.il" alt="בעלי מקצוע של אינטן">מבזקי חדשות</a>
				<div class="SubNews"> 
					<a  onclick="getRss('news');">כללי</a>
					<a onclick="getRss('sport');">ספורט</a>
					<a onclick="getRss('gossip');">רכילות</a>
				</div>
			</div>
			<div id="News">
				
			</div>
			<br /><br />
			<div id="RightBar" style="padding-top:0px;height:50px;">
<a style="float: left; padding-left: 25px;" href="http://www.in10.co.il" alt="בעלי מקצוע של אינטן">
<img src="images/Main/facebook2.png" style="height: 40px;">
</a>
			</div>
			<div id="Facebook">
			<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		 <div class="fb-like-box" data-href="https://www.facebook.com/pages/IN10coil/291861117526359" data-width="239" data-height="254" data-show-faces="true" data-border-color="200" data-stream="false" data-header="false"></div>

			</div>
		</div>
		<div id="LeftCol">
			<div id="LeftBar">
			<?php
			if($_GET['Biz'] != null)
			{
					$BizTitle = mysql_real_escape_string($_GET['Biz']);
					$BizCat = $SiteObj->getCategoryBiz($BizTitle);
					$BizId = (int)$BizCat['Id'];
					$BizArea = $SiteObj->getBizAreaTable($BizId);
					echo '<a href="http://www.in10.co.il/Biz&Biz='.$BizCat['Title'].'" alt="בעלי מקצוע של אינטן">אנשי המקצוע שלנו
					-
					'.$BizCat['Name'].'
					</a>';
					?>
					<script type="text/javascript">
					function SearchArea()
					{
						var Code = $('#SearchArea').val();
						//alert(Code);
						if(Code != '00')
						{
							document.location.href = "#" + Code;
						}
						else
						{
							alert('בחר איזור');
						}
					}
					</script>
					<span style="margin-left:10px;float:left;cursor:pointer;background-color: #FC7905;color: white;font-size: 13px;font-weight: bold;padding: 4px 8px;" onClick="SearchArea();">חפש אזור</span>
					<select id="SearchArea" style="float: left;height: 18pt;margin-left: 10px;padding: 3px;">
					<option value="00">בחר איזור</option>
					<?php
						//$SiteObj->ShowAreaLinks();
						$SiteObj->getCityAndCode()
					?>
					</select>
					
					<?php
			}
			else if($GetPageId > -1)
			{
				$PageRow = $SiteObj->getPageRow($GetPageId);
				echo '<a href="http://www.in10.co.il/Page&Id='.$PageRow['Id'].'" alt="בעלי מקצוע של אינטן">אנשי המקצוע שלנו
					-
					'.$PageRow['Title'].'
					</a>';
				
			}
			else
			{
				echo '<a href="http://www.in10.co.il" alt="בעלי מקצוע של אינטן">אנשי המקצוע שלנו</a>';
			}
			?>
			</div>
			<?php
		/*
			Get Page and Output different content
		*/
		switch($Urlower)
		{
			case "index":
				include_once 'Include/Content/Main.php';
				break;
			case "biz":
				if($_GET['Biz'] != null)
				{
					?>
					<script type="text/javascript">
					function GetBizPage(Id)
					{
						var Div = '.' + Id;
						var DivPage = '#BizPage' + Id;
						
						if($(Div).css('height') == '30px')
						{
							$("#MainContent").height($("#MainContent").height() + 720);
							$(Div).css('height','720px');
							if($(DivPage).length == 0 )
							{
								var Data = 'Id=' + Id;
								$.ajax({
									  url: 'Ajax/getBizPage.php',
									  data: Data,
									  type: 'POST',
									  success: function(dataReturn) 
									  {
										$(Div).append('<div id="BizPage' + Id +'">' + dataReturn + '</div>');
									  }
									});
							
							}
							else
							{
								$(DivPage).show();
							}
						}
						else
						{
							$("#MainContent").height($("#MainContent").height() - 720);
							$(Div).css('height','30px');
							$(DivPage).hide();
						}
					}
					
					</script>
					<?php
					//var_dump($BizCat);
					//var_dump($BizArea);
					//Prepare Area 02,03,04,08,09
					$Area02 = explode(",",$BizArea['T02']);
					$Area03 = explode(",",$BizArea['T03']);
					$Area04 = explode(",",$BizArea['T04']);
					$Area08 = explode(",",$BizArea['T08']);
					$Area09 = explode(",",$BizArea['T09']);
					//Call ShowAreaJob(Area)
					$SiteObj->ShowAreaJob($Area02,'02',$BizId);
					$SiteObj->ShowAreaJob($Area03,'03',$BizId);
					$SiteObj->ShowAreaJob($Area04,'04',$BizId);
					$SiteObj->ShowAreaJob($Area08,'08',$BizId);
					$SiteObj->ShowAreaJob($Area09,'09',$BizId);
				}
				else
				{
					echo 'Error - Not found...';
				}
				break;
			case "page":
				if($GetPageId > -1)
				{
					?>
					<div id="PersonalPage">
						<img src="" alt="">
						<h1></h1>
						<p>
						<b>תיאור העסק</b>
						<?php echo $PageRow['Meta_Description'];?>
						</p>
						<p>
						</b>צור קשר עם בעל העסק</b>
						<?php echo $PageRow['ContactModule'];?>
						</p>
					</div>
					
					
					<?php
					echo $GetPageId;
					echo '<h1>'. $PageRow['Name'].'</h1>';
					var_dump($PageRow);
				}
			   break;
			default:
				include_once 'Include/Content/Main.php';
				break;
		}
				
			?>
		</div>
	</div>
	<div id="Footer">
		<div id="Line">
		<hr>
		</div>
		<div id="FooterText">
		<?php
		/*
			Get All business names
		*/
		$j = 0;
		$BizFooter = $SiteObj->getAllBiz();
		while ($BizFooter[$j] != null)
		{
			echo '<a href="Biz&Biz='.$BizFooter[$j]['Title'].'" alt="'.$BizFooter[$j]['Name'].'">'.$BizFooter[$j]['Name'].'</a>, ';
			$j++;
		}
		?>
		</div>
		<div id="Line">
		<hr>
		</div>
		<div id="FooterText">
			<p>כל הזכויות שמורות לצוות אינטן</p>
		</div>
	</div>
</div>

</body>
</html>