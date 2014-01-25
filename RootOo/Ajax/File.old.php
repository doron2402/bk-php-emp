<?php
require_once 'DB.php';

function UpdatePhoto($img_name,$id)
{
    $query = "UPDATE Pages SET Img = '". $img_name ."' WHERE Id= '". $id ."';";
    $result = mysql_query($query);
            
            if($result)
            {   
                echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
                echo '<p>עדכון בוצע בהצלחה </p>';
                
            }
            else
            {
               echo mysql_error ();
               
            }
            
}


if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000))
  {
          if ($_FILES["file"]["error"] > 0)
            {
                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
          else
                {
                    $file_type = substr($_FILES["file"]["type"], -3);
                    $id = $_POST['Id'];
                    $_FILES["file"]["name"] = $id.'.'.$file_type;
                        echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                        echo "Type: " . $_FILES["file"]["type"] . "<br />";
                        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";


                  move_uploaded_file($_FILES["file"]["tmp_name"],
                  "images/pages/" . $_FILES["file"]["name"]);
                  echo "Stored in: " . "/images/pages/" . $_FILES["file"]["name"];
                  echo '<br /><br />';
                  UpdatePhoto($_FILES["file"]["name"],$_POST["Id"]);
                  echo 'קובץ נטען בהצלחה';
                  }
    }
  
else
  {
  echo "Invalid file";
  }
?> 