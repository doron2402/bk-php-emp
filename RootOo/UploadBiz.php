<header><h3 class="tabs_involved">העלאת תמונות של קטגוריות עסקים</h3></header>

<?

	// update
	if ($_POST['set'] == "1")
	{
		for ($i=0;$i<30;$i++)
		{
			$image[$i] = $_FILES['file'.$i.''];

			if ($image[$i]['name'] != NULL)
			{
				$target_path = "../images/Biz/";
				$target_path = $target_path . $image[$i]['name']; 
				move_uploaded_file($_FILES['file'.$i.'']['tmp_name'], $target_path);
			}
		}

		echo '<div style="margin:20px;">עודכן בהצלחה!</div>';
	}

?>


<form method="post" enctype="multipart/form-data">
 <input type="hidden" name="set" value="1">
 <table><tr><td>
  <? for ($i=0;$i<30;$i++)
  {
	  if (($i == 10) || ($i == 20)) echo '</td><td>';
	  echo '<input type="file" name="file'.$i.'"><br>';
  }
  ?>
  </td></tr></table>
 <div style="padding-top:20px;"></div>
 <input type="submit" value="העלה תמונות!">
</form>