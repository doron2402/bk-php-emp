<header><h3 class="tabs_involved">סידור תמנות לקטגוריות</h3></header>

<?

	if ($_POST['set'] == "1")
	{
		$t = $_POST['total'];
		for ($i=0;$i<$t;$i++)
		{
			$id			= $_POST['id'.$i.''];
			$image		= $_POST['image'.$i.''];
			mysql_query("UPDATE `impala_in10`.`IndexPages` SET `image` = '".$image."' WHERE `IndexPages`.`Id` ='".$id."';");
		}
	echo 'עודכן בהצלחה!';
	}

?>

<form method="post">
<input type="hidden" name="set" value="1">
<table><tr><td valign="top">
   <table>
<?

	$result		= mysql_query("SELECT * FROM IndexPages ORDER BY Id ASC;");
	$total		= mysql_num_rows($result);

	echo '<input type="hidden" name="total" value="'.$total.'">';
	for ($i=0;$i<$total;$i++)
	{
		$id = mysql_result($result, $i, "id");
		$name = mysql_result($result, $i, "Name");
		$image = mysql_result($result, $i, "image");
		$title = mysql_result($result, $i, "title");


		echo '
		<tr>
		 <td>'.$name.'</td>
		 <td>
		  <input type="hidden" name="id'.$i.'" value="'.$id.'">
		  <input name="image'.$i.'" value="'.$image.'">
		 </td>
	    </td>
		';
		$l = $i+1;
		if ($l%30 == 0) echo '</table></td><td valign="top"><table>';
	}

?>
</table>

<br><br>
<input type="submit" value="עדכן תמונות!">
</td></tr></table>
</form>