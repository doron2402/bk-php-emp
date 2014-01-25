<?

	$db_name = 'Radio';

// ------------------------

	define("Dbhost", "localhost");
	define("Dbuser", "impala_in10");
	define("Dbpass", "19191919");
	define("Dbname", "impala_in10");
	function opensql() { mysql_connect(Dbhost,Dbuser,Dbpass); mysql_select_db(Dbname); }
	function closesql() { mysql_close(); }

	opensql();

	$result = mysql_query("SELECT * FROM `".$db_name."`");

	$flag = 0;
	$zzz = 0;
	while ($row = mysql_fetch_array($result, MYSQL_BOTH))
	{
		$string[$flag] = 'INSERT INTO `impala_inten`.`'.$db_name.'` VALUES (';
		
		//print_r($row);
		//echo "<Br><Br>";
		foreach ($row as $r)
		{
			if ($zzz == 0)
			{
				$string[$flag] = "".$string[$flag]."'".$r."', ";
				$zzz++;
			}
			else
			{
				$zzz = 0;
			}
		}
		$string[$flag] = substr($string[$flag], 0, -2);
		$string[$flag] = ''.$string[$flag].');';
		
		//echo $string[$flag];
		//echo "<br><br>";

		$flag++;
	}

	closesql();

// ------------------------

	define("Dbhost2", "localhost");
	define("Dbuser2", "impala_in10");
	define("Dbpass2", "19191919");
	define("Dbname2", "impala_inten");
	function opensql2() { mysql_connect(Dbhost2,Dbuser2,Dbpass2); mysql_select_db(Dbname2); mysql_query("SET NAMES 'utf8'"); }
	function closesql2() { mysql_close(); }

//print_r($string);

	opensql2();
		foreach ($string as $s)
		{
			echo "$s<br>";
			mysql_query($s);
		}
	closesql2();

?>