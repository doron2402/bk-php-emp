<?

	// SQL
	define("Dbhost", "localhost");
	define("Dbuser", "impala_in10");
	define("Dbpass", "19191919");
	define("Dbname", Dbuser);

	// Connect/Discconnect to SQL
	function opensql() { mysql_connect(Dbhost,Dbuser,Dbpass); mysql_select_db(Dbname); mysql_query("SET NAMES 'utf8'"); }
	function closesql() { mysql_close(); }
		  
	opensql();

		for ($i=0;$i<70;$i++)
		{
			// insert into Adv
		    mysql_query ("INSERT INTO `impala_in10`.`Adv` ( `id` ) VALUES ( '".$i."');");
		}

	closesql();

?>