<?
/*
	update weather
*/

	// SQL
	define("Dbhost", "localhost");
	define("Dbuser","buycoil_In10User");
	define("Dbpass", "1q2w3e4r!@");
	define("Dbname", "buycoil_In10");

	// Connect/Discconnect to SQL
	function opensql() { mysql_connect(Dbhost,Dbuser,Dbpass); mysql_select_db(Dbname); mysql_query("SET NAMES 'utf8'"); }
	function closesql() { mysql_close(); }
		  
$string = '
<div style="padding:20px;">
<a name="israel" style="color:#000000; font-weight:bold;">מזג אוויר בארץ</a><br>
<table width="100%">
 <tr height="20"></tr>
 <tr style="font-size:13px; font-weight:bold;"><td>עיר</td><td>היום</td><td>מחר</td><td>מחרתיים</td></tr>';

$city[1] = '';		$city[2] = 'בת ים';			$city[3] = '';				$city[4] = 'בני ברק';		$city[5] = 'אילת'; 
$city[6] = 'חדרה';	$city[7] = 'חיפה';			$city[8] = 'הרצליה';		$city[9] = 'חולון';			$city[10] = 'ירושלים';
$city[11] = 'לוד';	$city[12] = 'נהריה';		$city[13] = 'נצרת';			$city[14] = '';				$city[15] = 'נתניה';
$city[16] = '';		$city[17] = 'פתח תקווה';	$city[18] = 'קריית אונו';	$city[19] = 'קריית ביאליק';	$city[20] = 'קריית מוצקין';
$city[21] = 'קריית ים';	$city[22] = 'רמת גן';	$city[23] = 'רמלה';			$city[24] = 'רחובות';		$city[25] = 'ראשון לציון';
$city[26] = 'תל אביב-יפו';	$city[27] = '';	$city[28] = '';	$city[29] = '';	$city[30] = 'באר שבע';		$city[31] = 'קריית שמונה';
$city[32] = 'טבריה';	

$flag = 0;
for ($i=1;$i<33;$i++)
{
	if ($city[$i] != NULL)
	{
		$flag++;
		if ($i<10) $data = file_get_contents("http://weather.yahooapis.com/forecastrss?p=ISXX000".$i."&u=c");
		else $data = file_get_contents("http://weather.yahooapis.com/forecastrss?p=ISXX00".$i."&u=c");

		// Temp
		$data_exp = explode('temp="', $data);
		$data_exp2 = explode('"', $data_exp[1]);
		$mezeg = $data_exp2[0];

		// Image
		$data_exp = explode('<img src="', $data);
		$data_exp2 = explode('"', $data_exp[1]);
		$img = $data_exp2[0];

		// low1
		$data_exp = explode('low="', $data);
		$data_exp2 = explode('"', $data_exp[1]);
		$low1 = $data_exp2[0];

		// low2
		$data_exp = explode('low="', $data);
		$data_exp2 = explode('"', $data_exp[2]);
		$low2 = $data_exp2[0];

		// high1
		$data_exp = explode('high="', $data);
		$data_exp2 = explode('"', $data_exp[1]);
		$high1 = $data_exp2[0];

		// high2
		$data_exp = explode('high="', $data);
		$data_exp2 = explode('"', $data_exp[2]);
		$high2 = $data_exp2[0];


		if ($flag%2==0) $bg_color=e3e3e3;
		else		 $bg_color=b7b7b7;
		$string = ''.$string.'
		<tr style="font-size:13px; font-weight:bold; background-color:#'.$bg_color.'">
		<td>'.$city[$i].'</td>
		<td><img src="'.$img.'" width="25" height="25"> '.$mezeg.'°</td>
		<td>'.$high1.'°-'.$low1.'°</td>
		<td>'.$high2.'°-'.$low2.'°</td>
		</tr>';
	}
}

$string = ''.$string.'</table>
</div>';


/* --------------------
		Abroad
   -------------------- */

$string = ''.$string.'
<div style="padding:20px;">
<a name="abroad" style="color:#000000; font-weight:bold;">מזג אוויר בעולם</a><br>
<table width="100%">
 <tr height="20"></tr>
 <tr style="font-size:13px; font-weight:bold;"><td>עיר</td><td>היום</td><td>מחר</td><td>מחרתיים</td></tr>';

$abroad[0] = 'אנטליה<>http://weather.yahooapis.com/forecastrss?p=TUXX0004&u=c';
$abroad[1] = 'אתונה<>http://weather.yahooapis.com/forecastrss?p=GRXX0004&u=c';
$abroad[2] = 'בנגקוק<>http://weather.yahooapis.com/forecastrss?p=THXX0002&u=c';
$abroad[3] = 'בוסטון<>http://weather.yahooapis.com/forecastrss?p=USMA0046&u=c';
$abroad[4] = 'ברלין<>http://weather.yahooapis.com/forecastrss?p=GMXX1273&u=c';
$abroad[5] = 'ברצלונה<>http://weather.yahooapis.com/forecastrss?p=SPXX0015&u=c';
$abroad[6] = 'בוקרשט<>http://weather.yahooapis.com/forecastrss?p=ROXX0003&u=c';
$abroad[7] = 'בודפשט<>http://weather.yahooapis.com/forecastrss?p=HUXX0002&u=c';
$abroad[8] = 'גנבה<>http://weather.yahooapis.com/forecastrss?p=SZXX0013&u=c';
$abroad[9] = 'וינה<>http://weather.yahooapis.com/forecastrss?p=USCA1201&u=c';
$abroad[10] = 'וושינגטון<>http://weather.yahooapis.com/forecastrss?p=USDC0001&u=c';
$abroad[11] = 'טוקיו<>http://weather.yahooapis.com/forecastrss?p=JAXX0085&u=c';
$abroad[12] = 'טורונטו<>http://weather.yahooapis.com/forecastrss?p=CAXX0504&u=c';
$abroad[13] = 'לוס אנגלס<>http://weather.yahooapis.com/forecastrss?p=USCA0638&u=c';
$abroad[14] = 'לונדון<>http://weather.yahooapis.com/forecastrss?p=UKXX0085&u=c';
$abroad[15] = 'מדריד<>http://weather.yahooapis.com/forecastrss?p=SPXX0050&u=c';
$abroad[16] = 'מוסקבה<>http://weather.yahooapis.com/forecastrss?p=RSXX0063&u=c';
$abroad[17] = 'מלבורן<>http://weather.yahooapis.com/forecastrss?p=ASXX0075&u=c';
$abroad[18] = 'מיאמי<>http://weather.yahooapis.com/forecastrss?p=USFL0316&u=c';
$abroad[19] = 'ניו דלהי<>http://weather.yahooapis.com/forecastrss?p=INXX0096&u=c';
$abroad[20] = 'ניו יורק<>http://weather.yahooapis.com/forecastrss?p=USNY0996&u=c';
$abroad[21] = 'סידני<>http://weather.yahooapis.com/forecastrss?p=ASXX0112&u=c';
$abroad[22] = 'פראג<>http://weather.yahooapis.com/forecastrss?p=EZXX0012&u=c';
$abroad[23] = 'פריז<>http://weather.yahooapis.com/forecastrss?p=EZXX0012&u=c';
$abroad[24] = 'קייב<>http://weather.yahooapis.com/forecastrss?p=UPXX0016&u=c';
$abroad[25] = 'קייפטאון<>http://weather.yahooapis.com/forecastrss?p=SFXX0010&u=c';
$abroad[26] = 'רומא<>http://weather.yahooapis.com/forecastrss?p=ITXX0067&u=c';
$abroad[27] = 'שיקאגו<>http://weather.yahooapis.com/forecastrss?p=USIL0228&u=c';


$flag = 0;
for ($i=1;$i<28;$i++)
{
	$flag++;
	$exppp = explode("<>", $abroad[$i]);
	$data = file_get_contents($exppp[1]);

	// Temp
	$data_exp = explode('temp="', $data);
	$data_exp2 = explode('"', $data_exp[1]);
	$mezeg = $data_exp2[0];

	// Image
	$data_exp = explode('<img src="', $data);
	$data_exp2 = explode('"', $data_exp[1]);
	$img = $data_exp2[0];

	// low1
	$data_exp = explode('low="', $data);
	$data_exp2 = explode('"', $data_exp[1]);
	$low1 = $data_exp2[0];

	// low2
	$data_exp = explode('low="', $data);
	$data_exp2 = explode('"', $data_exp[2]);
	$low2 = $data_exp2[0];

	// high1
	$data_exp = explode('high="', $data);
	$data_exp2 = explode('"', $data_exp[1]);
	$high1 = $data_exp2[0];

	// high2
	$data_exp = explode('high="', $data);
	$data_exp2 = explode('"', $data_exp[2]);
	$high2 = $data_exp2[0];


	if ($flag%2==0) $bg_color=e3e3e3;
	else		 $bg_color=b7b7b7;
	$string = ''.$string.'
	<tr style="font-size:13px; font-weight:bold; background-color:#'.$bg_color.'; direction:ltr; text-align:right;">
	<td>'.$exppp[0].'</td>
	<td>'.$mezeg.'° <img src="'.$img.'" width="25" height="25"></td>
	<td>{'.$high1.'°}-{'.$low1.'°}</td>
	<td>{'.$high2.'°}-{'.$low2.'°}</td>
	</tr>';
}

$string = ''.$string.'</table>
</div>';

opensql();
mysql_query("UPDATE `footer` SET `text` = '".$string."' WHERE `footer`.`id` =4;");
closesql();

?>
