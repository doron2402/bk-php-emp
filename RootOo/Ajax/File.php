<?php
    
	   $target_path = "../../images/pages";
       $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
		{
			echo "The file ".  basename( $_FILES['uploadedfile']['name']). " has been uploaded";
		}
		else
		{
			echo "There was an error uploading the file, please try again!";
		}

      require_once 'DB.php';    
      $sql = "UPDATE Pages SET Img = '". $imgData ."', ImgType = '" .$type . "' Where Id = ' ".$_POST['Id'] ."';";
      $result = mysql_query($sql);        
 
      if(!$result) 
      {
          echo 'Unable to upload file';
          echo 'בעיה בהלעאת התמונה';
      }
      else
      {
		  echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
          echo '<p>עדכון בוצע בהצלחה </p>';
      }

?>