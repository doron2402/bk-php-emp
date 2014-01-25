<header><h3 class="tabs_involved">טקסט על הלוגו</h3></header>

<?

	// -----------------------------
	// update in db
	// -----------------------------

	if ($_POST['set'] == 1)
	{
		$total = $_POST['total'];
		for ($i=0;$i<$total;$i++)
		{
			mysql_query("UPDATE `impala_in10`.`IndexTables` SET `Title` = '".$_POST['value'.$i.'']."' WHERE `IndexTables`.`Id` ='".$_POST['id'.$i.'']."';");
			
			/*echo '<div style="direction:ltr;">';
			echo "UPDATE `impala_in10`.`IndexTables` SET `Title` = '".$_POST['value'.$i.'']."' WHERE `IndexTables`.`Id` ='".$_POST['id'.$i.'']."';";
			echo "<br>";
			echo '</div>';*/
		}
		echo 'עודכן בהצלחה!';
	}



	// -----------------------------
	// show form
	// -----------------------------

	$result		= mysql_query("SELECT * FROM IndexTables ORDER BY Id ASC;");
	$total		= mysql_num_rows($result);

	echo '
<div style="padding:20px;">
 <form method="post">
 <input type="hidden" name="set" value="1">
 <input type="hidden" name="total" value="'.$total.'">
 <table><tr><td valign="top">';

	for ($i=0;$i<$total;$i++)
	{
		$id = mysql_result($result, $i, "Id");		$name = mysql_result($result, $i, "Title");
		echo ''.$id.' <input type="hidden" name="id'.$i.'" value="'.$id.'"> <input name="value'.$i.'" value="'.$name.'" style="width:300px;"><br>';
		echo "\n";
		$l = $i+1;
		if ($l%30 == 0) echo "</td><td valign='top'>\n";
	}

?>
 </td></tr></table>
 <div style="padding-top:10px;"></div>
 <div style="padding-right:600px;"><input type="submit" value="עדכן"></div>
 </form>
</div>