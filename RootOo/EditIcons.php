<header>
 <h3 class="tabs_involved">עדכן אייקונים וקישורים - <b>תמונות חייבות להיות בפורמט PNG</b> - אם החלפת תמונה והיא לא מתעדכנת אנא עשה ריפרש.</h3> 
 <a href="javascript: history.go(-1)" style="line-height:32px;">» חזור אחורה</a>
</header>

<?
	
	$id = $HTTP_GET_VARS['id'];

// Update form
	if ($_POST['set'] == 1)
	{
		for ($z=1;$z<8;$z++)
		{
			$url[$z]		= $_POST['url'.$z.''];
			$image[$z]		= $_FILES['file'.$z.''];
			$image_path[$z] = $_POST['file_path'.$z.''];

			if($image[$z]['type'] == "image/X-PNG" || $image[$z]['type'] == "image/PNG" || $image[$z]['type'] == "image/png" || $image[$z]['type'] == "image/x-png")
			{
				$target_path = "../images/icons2/";
				$target_path = $target_path . $image_path[$z]; 
				move_uploaded_file($_FILES['file'.$z.'']['tmp_name'], $target_path);
			}
		}

		mysql_query("UPDATE `impala_in10`.`Index` SET `url1` = '".$url[1]."' WHERE `Index`.`id` =".$id.";");
		mysql_query("UPDATE `impala_in10`.`Index` SET `url2` = '".$url[2]."' WHERE `Index`.`id` =".$id.";");
		mysql_query("UPDATE `impala_in10`.`Index` SET `url3` = '".$url[3]."' WHERE `Index`.`id` =".$id.";");
		mysql_query("UPDATE `impala_in10`.`Index` SET `url4` = '".$url[4]."' WHERE `Index`.`id` =".$id.";");
		mysql_query("UPDATE `impala_in10`.`Index` SET `url5` = '".$url[5]."' WHERE `Index`.`id` =".$id.";");
		mysql_query("UPDATE `impala_in10`.`Index` SET `url6` = '".$url[6]."' WHERE `Index`.`id` =".$id.";");
		mysql_query("UPDATE `impala_in10`.`Index` SET `url7` = '".$url[7]."' WHERE `Index`.`id` =".$id.";");

		echo '
		<div style="padding:10px 20px 10px 20px; width:250px; background-color:#dddddd;">עודכן בהצלחה!!!!</div>
		<div style="padding-top:5px;"></div>';
	}
	
// Show Pages
	 $query		= "SELECT * FROM `Index` WHERE `id`='".$id."' LIMIT 1;";
     $result	= mysql_query($query);
	 $total		= mysql_num_rows($result);
	 if ($total == 1)
	 {
	    $name = mysql_result($result, 0, "name");
		echo '<div style="padding:10px 20px 10px 20px; width:250px; background-color:#dddddd;">'.$name.'</div>';
		echo '
		<form method="post" enctype="multipart/form-data">
		 <input type="hidden" name="set" value="1">
		 <table cellpadding="2">';
			for ($z=1;$z<8;$z++)
			{
				$pic[$z] = mysql_result($result, $i, "pic".$z."");
				$link[$z] = mysql_result($result, $i, "url".$z."");
				echo '
				 <tr>
				  <td><img src="../images/icons2/'.$pic[$z].'" width="65" height="29" border="0" style="border:1px solid #000000;"></td>
				  <td>
				   <input type="file" name="file'.$z.'">
				   <input type="hidden" name="file_path'.$z.'" value="'.$pic[$z].'">
				  </td>
				 </tr><tr>
				 <td>לינק:</td>
				 <td><input name="url'.$z.'" value="'.$link[$z].'" style="direction:ltr; text-align:left; width:500px;" dir="ltr"></td>
				 </tr>';
			}
		echo '</table>
		<div style="margin:20px 380px 20px 0px;">
		 <input type="submit" value="עדכן קישורים ותמונות">
		</div>
		</form>';
	 }

?>