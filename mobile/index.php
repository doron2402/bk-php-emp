<?php

//index.php - mobile.in10.co.il

require 'Config/init.php';



?>
<!DOCTYPE html>
<html lang="he-IL">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>אינטן - אינדקס העסקים הגדול ביותר בישראל</title>
	<link rel="stylesheet" href="docs/_assets/css/jqm-docs.css" />
	<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.2.0.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.2.0.js"></script>
	<style>
	body
	{
		text-align:right;
		direction:rtl;
	}
	</style>
</head>
<body>
<div data-role="page">
	<div data-role="header" data-theme="b">
			<p><strong>אינטן - רשת חברתית למצוא בתי עסקים</strong></p>
			<div data-role="controlgroup">
			<a href="http://mobile.in10.co.il" data-role="button">דף הבית</a>
			</div>	
	</div><!-- /header -->
<div data-role="content">

<?php
if($_GET['Business'] != '' && !isset($_GET['Biz']))
{
	$Id = (int)$_GET['Business'];
	$Query_get_Biz_Page = "SELECT * FROM `IndexTables` WHERE Id = ".$Id." LIMIT 1";
	$result = mysql_query($Query_get_Biz_Page);
	$row = mysql_fetch_assoc($result);
	?>
	<div id="BusinessPageAreaCode">
	<h1><?php echo $row['Title'];?></h1>
	<nav>
	<?php
	$Area02 = explode(",",$row['T02']);
	$Area03 = explode(",",$row['T03']);
	$Area04 = explode(",",$row['T04']);
	$Area08 = explode(",",$row['T08']);
	$Area09 = explode(",",$row['T09']);
	
	//Jerusalem - center area
	echo '<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">ירושלים והסביבה</li>';	
	$i = 0;
	foreach ($Area02 as $val)
	{
		if ($val != '')
		{
			echo '<li><a href="?Business='.$Id.'&Biz=020'.$i.'">'.$val.'</a></li>';
		}
		$i++;
	}
	echo '</ul>';
	
	//Center 03
	echo '<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">מרכז וגוש דן</li>';	
	$i = 0;
	foreach ($Area03 as $val)
	{
		if ($val != '')
		{
			echo '<li><a href="?Business='.$Id.'&Biz=030'.$i.'">'.$val.'</a></li>';
		}
		$i++;
	}
	echo '</ul>';
	
	//North - 04
	echo '<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">אזור הצפון</li>';	
	$i = 0;
	foreach ($Area04 as $val)
	{
		if ($val != '')
		{
			echo '<li><a href="?Business='.$Id.'&Biz=040'.$i.'">'.$val.'</a></li>';
		}
		$i++;
	}
	echo '</ul>';
	
	//South - 08
	echo '<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">אזור הצפון</li>';	
	$i = 0;
	foreach ($Area08 as $val)
	{
		if ($val != '')
		{
			echo '<li><a href="?Business='.$Id.'&Biz=080'.$i.'">'.$val.'</a></li>';
		}
		$i++;
	}
	echo '</ul>';
	
	//Sharon - 09
	echo '<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
	<li data-role="list-divider">אזור הצפון</li>';	
	$i = 0;
	foreach ($Area09 as $val)
	{
		if ($val != '')
		{
			echo '<li><a href="?Business='.$Id.'&Biz=090'.$i.'">'.$val.'</a></li>';
		}
		$i++;
	}
	echo '</ul>';	
	?>	
	</nav>
	
	
	</div>
	
	<?php
}
else if (isset($_GET['Business']) && isset($_GET['Biz']))
{
?>
	<div data-role="controlgroup">
		<a href="http://mobile.in10.co.il/?Business=<?php echo $_GET['Business'];?>" data-role="button">אחורה</a>
	</div>
	<?php
	$BizNum = (int)$_GET['Business'].'00'.$_GET['Biz'];
	$QueryBiz = "SELECT * FROM Pages WHERE Id = ".$BizNum.";";
	$Result = mysql_query($QueryBiz);
	$Row = mysql_fetch_assoc($Result);
	//var_dump($Row);
	?>
	<div data-role="controlgroup">
		<a data-role="button"><?php echo $Row['Name'];?></a>
		<a data-role="button"><?php echo $Row['ContactModule'];?></a>
	</div>
	<?php
}
else
{
	?>
	<div id="BusinessList">
			<nav>
				<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
					<li data-role="list-divider">בחירת בעל עסק</li>
					<?php
						//Get list of business
						$query_get_all_biz = "SELECT * FROM IndexPages WHERE Name!='ממתין' ORDER BY Name ASC;";
						$result		= mysql_query($query_get_all_biz);
						while($row = mysql_fetch_assoc($result))
						{
							echo '<li><a href="?Business='.$row['Id'].'">'.$row['Name'].'</a></li>';
						}
					?>
				</ul>
			</nav>
	</div>
	<?php
}
?>
<div data-role="footer" class="footer-docs" data-theme="c">
            <p class="jqm-version"></p>
			<p>&copy; 2012 in10.co.il by Doron Segal</p>
	</div>
</div>
</body>
</html>
