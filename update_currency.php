<?
/*
	Currecy
*/

	// SQL
	define("Dbhost", "localhost");
	define("Dbuser","buycoil_In10User");
	define("Dbpass", "1q2w3e4r!@");
	define("Dbname", "buycoil_In10");

	// Connect/Discconnect to SQL
	function opensql() { mysql_connect(Dbhost,Dbuser,Dbpass); mysql_select_db(Dbname); mysql_query("SET NAMES 'utf8'"); }
	function closesql() { mysql_close(); }
		  
	// string

$string = '
<div style="padding:20px;">
<table width="100%">
 <tr height="20"></tr>
 <tr style="font-size:13px; font-weight:bold;">
  <td>מטבע</td>
  <td>יחידה</td>
  <td>סימן</td>
  <td>המדינה</td>
  <td>השער</td>
 </tr>';

	$data = file_get_contents("http://www.bankisrael.gov.il/currency.xml");
	$d_exp = explode("<CURRENCY>", $data);

	$flag = 0;
	foreach ($d_exp as $l)
	{
		if ($flag != 0)
		{
			$data_exp = explode('<NAME>', $l);
			$data_exp2 = explode('</NAME>', $data_exp[1]);
			$NAME = $data_exp2[0];

			$data_exp = explode('<UNIT>', $l);
			$data_exp2 = explode('</UNIT>', $data_exp[1]);
			$UNIT = $data_exp2[0];

			$data_exp = explode('<CURRENCYCODE>', $l);
			$data_exp2 = explode('</CURRENCYCODE>', $data_exp[1]);
			$CURRENCYCODE = $data_exp2[0];

			$data_exp = explode('<COUNTRY>', $l);
			$data_exp2 = explode('</COUNTRY>', $data_exp[1]);
			$COUNTRY = $data_exp2[0];

			$data_exp = explode('<RATE>', $l);
			$data_exp2 = explode('</RATE>', $data_exp[1]);
			$RATE = $data_exp2[0];

			if ($flag%2==0) $bg_color=e3e3e3;
			else			$bg_color=b7b7b7;
			$string = ''.$string.'
			<tr style="font-size:13px; font-weight:bold; background-color:#'.$bg_color.'">
			<td>'.$NAME.'</td>
			<td>'.$UNIT.'</td>
			<td>'.$CURRENCYCODE.'</td>
			<td>'.$COUNTRY.'</td>
			<td>'.$RATE.'</td>
			</tr>';
		}
		$flag++;
	}

$string = ''.$string.'</table>
</div>';


opensql();
mysql_query("UPDATE `footer` SET `text` = '".$string."' WHERE `footer`.`id` =3;");
closesql();

 ?>