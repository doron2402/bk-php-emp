<?php
    
	   $target_path = "pages/";

		$type = $_FILES['userfile']['type'];
		$name = $_FILES['userfile']['name'];
		$name_now = explode(".", $name);
		$name_to_change = "".$_POST['Id'].".".$name_now[1]."";
        $target_path = "".$target_path."".$name_to_change.""; 

		if( move_uploaded_file($_FILES['userfile']['tmp_name'], $target_path))
		{
			$redirect=1;
		}
		else
		{
			$redirect=9;
		}

      require_once 'DB.php';    
      $sql = "UPDATE Pages SET Img = '".$name_to_change."', ImgType = '".$type."' Where Id = '".$_POST['Id']."';";
      $result = mysql_query($sql);        
 

echo '<SCRIPT LANGUAGE="JavaScript">
window.location="http://in10.co.il/Admin/Edit&Id='.$_POST['Id'].'&result='.$redirect.'";
</script>';

?>