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

error_reporting(0);
//Require Class
require_once 'Class/Main.class.php'; //Loading Class Main

$SiteObj = new Main();

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
					}
				else
				{
					//Error not exsist
				}
			}
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title><?=$Site['Title'];?></title>
 <meta name="description" content="<?=$Site['Description'];?>">
 <meta  name="keywords" content="<?=$Site['Keyword'];?>">
 <meta name="robots" content="index,follow">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="google-site-verification" content="8gpcJ0YagiwfDk4efXgkO3himxCpTmf9Fb9GFLMAJpY" />
 <script type="text/javascript" src="JS/rss.js"></script>
 <script type="text/javascript" src="JS/jquery.js"></script>
<style>
body
{
	background-color:#272727;
	direction:rtl;
}
p
{
	font-style:ariel;
}
#Content
{
	background-color:white;
	width:1024px;
	height:100%;
	margin-top:80px;
	margin-bottom:50px;
	margin-right:auto;
	margin-left:auto;
}
#Header
{
	height:150px;
}
#Logo
{
	float: left;
	margin-left:-50px;
    margin-top: -50px;
    width: 300px;
    z-index: 1111;
}
#MenuBarTop
{
	height:37px;
	margin-top:-50px;
}
#HeadSlider
{
	height:350px;
	margin-right:auto;
	margin-left:auto;
}
#MainContent
{
	padding:20px;
	height:1000px;
}
#RightCol
{
	width:245px;
	float:right;
}
#LeftCol
{
	width:670px;
	height:900px;
	margin-right:50px;
	float:right;
	border-style:none;
	border-right:solid black;
	border-width:2px;
}
#SearchTop
{
	padding-right: 40px;
    padding-top: 20px;
}
#SearchTop p
{
	color:#fc7905;
	font-weight:bold;
}
#SearchTopBox a
{
	background-color:#fc7905;
	padding-right:10px;
	padding-left:10px;
	padding-top:4px;
	padding-bottom:4px;
	color:white;
	text-decoration:none;
	font-weight:bold;
}
#SearchTopBox input
{
	height:21px;
	color:silver;
}

#MenuBarTop ul
{
	list-style-type: none;
}
#MenuBarTop li
{
	float:right;
	width:185px;
	color:white;
	font-weight:bold;
	text-align:center;
	padding-top:4px;
	cursor:pointer;
}
li.NoCurrent
{
	background-image:url(images/Main/MenuBlack.png);
	background-size:180px 37px;
	height:37px;
} 
li.Current 
{
	background-color:#fc7905;
	background-size:180px 34px;
	height:33px;
	border-bottom:solid #272727;
	border-width:4px;
}
#FlashHeader
{
	margin-right:auto;
	margin-left:auto;
	width:856px;
	height:156px;
}
</style>
</head>
<body>
<div id="Content">
<?php 

?>
	<!-- in.co.il - Header -->
	<div id="Header">
		<div id="Logo">
			<a href="http://www.in10.co.il" title="אינטן בחירת עסקים המשתלמים ביותר">
				<img src="images/Main/logo.png" alt="אינטן - מציאת 10 העסקים המשתלמים ביותר" /></a>
		</div>
		<div id="SearchTop">
			<p>שלום אורח</p>
			<div id="SearchTopBox">
				<input type="text" onFocus="if($(this).val() == 'חפש איש מקצוע'){$(this).val('');}" onBlur="if($(this).val() == ''){$(this).val('חפש איש מקצוע');}" name="SearchBiz" value="חפש איש מקצוע" />
				<a href="#" onClick="" alt="חפש איש מקצוע" >חפש</a>
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
	<div id="FlashHeader">
	FLASh HERE
	</div>
	<div id="HeadSlider">
		Slider here
	</div>
	<div id="MainContent">
		<div id="RightCol">
			ימין
		</div>
		<div id="LeftCol">
			<?php
		/*
			Get Page and Output different content
		*/
		switch($Urlower)
		{
			case "bizindex":
				$SiteObj->getAllBiz();
				break;
			case "contact":
				$SiteObj->getContactPage();
				include_once 'Include/Contact.php';
				break;
			case "about":
				$SiteObj->getAboutPage();
				break;
			 case "page":
				if($GetPageId > -1)
				{
					echo $GetPageId;
				}
				else
				{
					//Output - not found page...
				}
				$row = $SiteObj->getPageRow($GetPageId);
				echo '<h1>'. $row['Name'].'</h1>';
			   break;
			default:
				$Biz = $SiteObj->getAllBiz();
				//include_once 'Include/AllBiz.php';
				$i=0;
				while($Biz[$i] != null)
				{
					echo '<div id="BizCard" style="float:right;height:260px;background-repeat:no-repeat;width:128px;margin-right:10px;background-image:url(images/Cards/'.$Biz[$i]['image'].');">';
					echo '<div id="BizHeadlineCard" style="background-color: #FC7905;color: white;font-weight: bold;margin-right: 4px;padding-bottom: 4px;padding-top: 4px;text-align: center;width: 119px;">';	
					echo $Biz[$i]['Name'];
					echo '</div>';
					echo '<div id="BizTextCard">';
					echo '</div>';
					echo '<div id="BizLinkCard" style="padding-top: 200px;text-align: center;text-decoration: none;">';
					echo '<a href="Page&Id='.$Biz[$i]['link'].'" alt="'.$Biz[$i]['Name'].'">בחר</a>';
					echo '</div>';
					echo '</div>';
					$i++;
				}
				break;
		}
				
			?>
		</div>
	</div>
</div>

</body>
</html>