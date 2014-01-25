<header><h3 class="tabs_involved">שינוי עמוד ראשי!</h3></header>

<?

	// update
	if ($_POST['total'] != NULL)
	{
		for ($i=0;$i<$_POST['total'];$i++)
		{
			$id			= $_POST['id'.$i.''];
			$pos		= $_POST['pos'.$i.''];
			$active		= $_POST['active'.$i.''];
			$name		= $_POST['name'.$i.''];

			mysql_query("UPDATE `impala_in10`.`Index` SET `pos` = '".$pos."' WHERE `Index`.`id` =".$id.";");
			mysql_query("UPDATE `impala_in10`.`Index` SET `active` = '".$active."' WHERE `Index`.`id` =".$id.";");
			mysql_query("UPDATE `impala_in10`.`Index` SET `name` = '".$name."' WHERE `Index`.`id` =".$id.";");
		}
		echo '<div style="margin:20px;">עודכן בהצלחה!</div>';
	}

?>

<style>input, select, option { font-size:11px; }</style>
<div style="margin:20px;">
<?

	 $query		= "SELECT * FROM `Index` ORDER BY `Index`.`pos` ASC";
     $result	= mysql_query($query);
	 $total		= mysql_num_rows($result);

	echo '
	<form method="post">
	 <input type="hidden" name="total" value="'.$total.'">

	<table cellpadding="1"><tr>
	  <td>מיקום</td>
	  <td>פעיל?</td>
	  <td>שם</td></tr>';

	 for ($i=0;$i<$total;$i++)
	 {
		$id		= mysql_result($result, $i, "id");
		$pos		= mysql_result($result, $i, "pos");
		$active		= mysql_result($result, $i, "active");
		$name		= mysql_result($result, $i, "name");

		echo '<tr><input type="hidden" name="id'.$i.'" value="'.$id.'">';

		// pos
	 	echo '<td><input name="pos'.$i.'" value="'.$pos.'" style="width:20px;"></td>';
		
		// active
		echo '<td><select name="active'.$i.'">';
		if ($active == 1) { echo '<option value="1" SELECTED>פעיל</option><option value="0">לא פעיל</option>'; }
		else			   { echo '<option value="1">פעיל</option><option value="0" SELECTED>לא פעיל</option>'; }
		echo '</select></td>';

		// name
	 	echo '<td><input name="name'.$i.'" value="'.$name.'"></td>';

			for ($z=1;$z<8;$z++)
			{
				$pic[$z] = mysql_result($result, $i, "pic".$z."");
				$link[$z] = mysql_result($result, $i, "url".$z."");
				if ($active == 1)
				{
					echo '<td><A href="'.$link[$z].'"><img src="../images/icons2/'.$pic[$z].'" width="65" height="29" border="0" style="border:1px solid #000000;"></a></td>';
				}
			}

		echo '<td><a href="EditIcons?id='.$id.'">עדכן</a></td>';

		echo '</tr>
		';
	 }

?>
</table>
<div style="padding-top:10px;"></div>
<input type="submit" value="עדכן!">
<div style="padding-top:30px;"></div>.
</form>
</div>