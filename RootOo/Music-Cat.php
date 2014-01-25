<header><h3 class="tabs_involved">עדכן שמות לקטגוריות מוזיקה</h3></header>

<?

	if ($_POST['update'] == "1")
	{
		for ($i=0;$i<$_POST['total'];$i++)
		{
			$z = $i+1;
			mysql_query("UPDATE `impala_in10`.`Music_cat` SET `Name` = '".$_POST['name'.$i.'']."' WHERE `Music_cat`.`Position` =".$z.";");
		}
		echo 'עודכן בהצלחה!';
	}
?>

<form method="post">
 <input type="hidden" name="update" value="1">
<?
// mysql_query("INSERT INTO `impala_in10`.`Music_cat` (Position,Name) VALUES (NULL,'1');");

     $query = "SELECT * FROM Music_cat ORDER BY Position;";
     $result = mysql_query($query);
	 $total = mysql_num_rows($result);
	 echo '<input type="hidden" name="total" value="'.$total.'">';
	 for ($i=0;$i<$total;$i++)
	 {
			$name = mysql_result($result, $i, "name");
			echo '<input name="name'.$i.'" value="'.$name.'" size="60"><br>';
	 }

?>
<div style="padding-top:10px;"></div>
<input type="submit" value="עדכן שמות!">
</form>