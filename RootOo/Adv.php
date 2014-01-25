<?

	// Select Category
	if ($HTTP_GET_VARS['id'] == NULL)
	{
		echo '<header><h3 class="tabs_involved">בחרה קטגוריה לעדכון</h3></header>';

		echo '
		<div style="padding:20px;">בחר קטגוריה<br><br>
		<table><tr><td valign="top">
		<a href="Adv&id=0" style="font-weight:bold; font-size:20px;">» מבנה כללי</a><br>';
		 $query = "SELECT * FROM IndexPages ORDER BY Name ASC;";
		 $result = mysql_query($query);
		 $total = mysql_num_rows($result);
		 for ($i=0;$i<$total;$i++)
		 {
			$position	= mysql_result($result, $i, "id");
			$name		= mysql_result($result, $i, "Name");
			echo '<a href="Adv&id='.$position.'">» '.$name.'</a><br>';

			$l = $i+1;
			if ($l%30 == 0) echo '</td><td valign="top">';
		 }
		 echo '</td></tr></table>';
		 echo '</div>';
	}

	// Show category music now
	else
	{
		$cat_id = $HTTP_GET_VARS['id'];
		
		// Update
		if ($_POST['set'] == "1")
		{
			 $left			= $_POST['left'];
			 $left_width	= $_POST['left_width'];
			 $left_height	= $_POST['left_height'];
			 $right			= $_POST['right'];
			 $right_width	= $_POST['right_width'];
			 $right_height	= $_POST['right_height'];
			 $space1		= $_POST['space1'];
			 $space2		= $_POST['space2'];
			 $space3		= $_POST['space3'];

				mysql_query("UPDATE `impala_in10`.`Adv` SET 
				`left` = '".$left."', 
				`left_width` = '".$left_width."', 
				`left_height` = '".$left_height."', 
				`right` = '".$right."', 
				`right_width` = '".$right_width."', 
				`right_height` = '".$right_height."', 
				`space1` = '".$space1."', 
				`space2` = '".$space2."', 
				`space3` = '".$space3."' 
				WHERE `Adv`.`id` =".$cat_id.";");

			echo 'עודכן בהצלחה!';
		}

		// get name for top text
		if ($cat_id == 0) $cat_id_text = 'עמודים כללים באתר';
		else
		{
		 $query			= "SELECT * FROM IndexPages WHERE id='".$cat_id."';";
		 $result		= mysql_query($query);
		 $cat_id_text	= mysql_result($result, $i, "Name");
		}

		// get values
         $query			= "SELECT * FROM Adv WHERE id='".$cat_id."' LIMIT 1;";
         $result		= mysql_query($query);
			 $left			= mysql_result($result, $i, "left");
			 $left_width	= mysql_result($result, $i, "left_width");
			 $left_height	= mysql_result($result, $i, "left_height");
			 $right			= mysql_result($result, $i, "right");
			 $right_width	= mysql_result($result, $i, "right_width");
			 $right_height	= mysql_result($result, $i, "right_height");
			 $space1		= mysql_result($result, $i, "space1");
			 $space2		= mysql_result($result, $i, "space2");
			 $space3		= mysql_result($result, $i, "space3");
			 $space4		= mysql_result($result, $i, "space4");
?>


<header><h3 class="tabs_involved">עדכן פרסומות עבור <b><? echo $cat_id_text; ?></b></h3></header>
 <form action="" method="post">
  <input type="hidden" name="set" value="1">

	<table>
	 <tr>
	  <td>צד ימין - אורך</td><td><input name="right_width" value="<? echo $right_width; ?>" style="width:50px;">
	  <td>צד ימין - גובה</td><td><input name="right_height" value="<? echo $right_height; ?>" style="width:50px;">
      <td>צד שמאל - אורך</td><td><input name="left_width" value="<? echo $left_width; ?>" style="width:50px;">
      <td>צד שמאל - גובה</td><td><input name="left_height" value="<? echo $left_height; ?>" style="width:50px;">
     </tr>
    </table>

    צד ימין - תוכן <textarea id="right" name="right" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $right; ?></textarea>  
    צד שמאל - תוכן <textarea id="left" name="left" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $left; ?></textarea>  
    פרסומת - חלק #1 <textarea id="space1" name="space1" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $space1; ?></textarea>  
    פרסומת - חלק #2	<textarea id="space2" name="space2" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $space2; ?></textarea>  
    מעל הפוטר <textarea id="space3" name="space3" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $space3; ?></textarea>  

	<script>
	CKEDITOR.replace( 'left', { language: 'he' });
	CKEDITOR.replace( 'right', { language: 'he' });
	CKEDITOR.replace( 'space1', { language: 'he' });
	CKEDITOR.replace( 'space2', { language: 'he' });
	CKEDITOR.replace( 'space3', { language: 'he' });
	CKEDITOR.replace( 'space4', { language: 'he' });
	</script>
  <div style="padding-top:20px;"></div>
  <input type="submit" value="עדכן פרסומות!">
  <div style="padding-top:20px;"></div>
 </form>
</div>

<? } ?>