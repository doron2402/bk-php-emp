<header><h3 class="tabs_involved">כל השמות של הקטגוריות</h3></header>

<?

	// -----------------------------
	// update in db
	// -----------------------------
	
	if ($_POST['set'] == 1)
	{
		$total = $_POST['total'];
		for ($i=0;$i<$total;$i++)
		{
			
			$Query = "UPDATE `IndexPages` SET `Name` = '".$_POST['value'.$i]."', `Keyword` = '".mysql_real_escape_string($_POST['Keyword'.$i])."', `Description` = '".mysql_real_escape_string($_POST['Description'.$i])."' WHERE `Id` =".$_POST['id'.$i].";";
			$Result = mysql_query($Query);
		
		}
		echo mysql_error();
		echo 'עודכן בהצלחה!';
	}



	// -----------------------------
	// show form
	// -----------------------------

	$result		= mysql_query("SELECT * FROM IndexPages ORDER BY Id ASC;");
	$total		= mysql_num_rows($result);

	echo '
<div style="padding:10px;">
 <form method="post">
 <input type="hidden" name="set" value="1">
 <input type="hidden" name="total" value="'.$total.'">
 <table><tr><td>';

	for ($i=0;$i<$total;$i++)
	{
		$id = mysql_result($result, $i, "Id");		
		$name = mysql_result($result, $i, "Name");
		$Keyword = mysql_result($result, $i, "Keyword");
		$Description = mysql_result($result, $i, "Description");
		
		echo '<fieldset><legend>'.$name.'</legend>';
		echo '<p>'.$id.')שם: (Page Title)<input name="value'.$i.'" value="'.$name.'" style="width:300px;"></p>
		<p>מילות קישור:(Keywords 255 chars) <input type="text" name="Keyword'.$i.'" value="'.$Keyword.'" style="width:300px;"></p>
		<p>תיאור הדף (טקסט) <input type="text" name="Description'.$i.'" value="'.$Description.'" style="height:30px;width:300px;"></p>
		<input type="hidden" name="id'.$i.'" value="'.$id.'"></fieldset>';
		echo "\n";
		$l = $i+1;
		if ($l%30 == 0) echo "</td><td valign='top'>\n";
	}

?>
 </td></tr></table>
 <div style="padding-top:10px;"></div>
 <div style="padding-right:600px;">
 <input type="submit" value="עדכן"></div>
 </form>
</div>