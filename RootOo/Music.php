<?

	// Select Category
	if ($HTTP_GET_VARS['id'] == NULL)
	{
		echo '<header><h3 class="tabs_involved">בחר קטגוריה לעדכון</h3></header>';

		echo '
		<div style="padding:20px;">בחר קטגוריה<br><br>';
		 $query = "SELECT * FROM Music_cat ORDER BY Position;";
		 $result = mysql_query($query);
		 $total = mysql_num_rows($result);
		 for ($i=0;$i<$total;$i++)
		 {
			$position = mysql_result($result, $i, "position");
			$name = mysql_result($result, $i, "name");
			echo '<a href="Music&id='.$position.'">» '.$name.'</a><br>';
		 }
		 echo '</div>';
	}

	// Show category music now
	else
	{
		
		$music_cat_id = $HTTP_GET_VARS['id'];

		echo '<header><h3 class="tabs_involved">עדכן שירים בקטגוריה '.$music_cat_id.'</h3></header>';

		// Update
		if ($_POST['set'] == "1")
		{
			for ($i=0;$i<10;$i++)
			{
				$id =	$_POST['pos'.$i.''];
				$name = $_POST['name'.$i.''];
				$link = $_POST['link'.$i.''];
				
				mysql_query("UPDATE `impala_in10`.`Music` SET `Link` = '".$link."', `Name` = '".$name."' WHERE `Music`.`Position` =".$id.";");
			}
			echo 'עודכן בהצלחה!';
		}
		
		echo '
		<form action="" method="post">
		 <input type="hidden" name="set" value="1">
		  <table cellpadding="2" cellspacing="2">
		   <tr><td>מיקום</td><td>שם השיר</td><td>קישור</td></tr>';

         $query		= "SELECT * FROM Music WHERE cat='".$music_cat_id."' ORDER BY Position;";
         $result	= mysql_query($query);
		 $total		= mysql_num_rows($result);
		 for ($i=0;$i<$total;$i++)
		 {
			 $pos		= mysql_result($result, $i, "Position");
			 $songName	= mysql_result($result, $i, "Name");
			 $songLink	= mysql_result($result, $i, "Link");

                echo '
                <tr>
                 <td>'.$pos.' » </td>
                 <td><input type="hidden" name="pos'.$i.'" value="'.$pos.'" /><input type="text" name="name'.$i.'" size="60" value="'.$songName.'" /></td>
                 <td><input type="text" name="link'.$i.'" size="20" value="'.$songLink.'"></td>
                </tr> ';
         }
		
		echo '</table>
		<div style="padding-top:10px;"></div>
		<div style="padding-right:450px;"><input type="submit" value="עדכן שירים"></div>
		<div style="padding-top:10px;"></div>
        </form>';

	}

?>
