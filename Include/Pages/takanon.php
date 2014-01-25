<?

/*
	 takanon page from db.
*/

	$query = "SELECT * FROM footer WHERE id=2;";
	$result = mysql_query($query);
	$takanon =  mysql_result($result, 0, "text");
	echo $takanon;
?>