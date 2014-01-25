<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
<?php
require_once 'DB.php';

if($_POST['Id'] != null &&
        $_POST['Title'] != null &&
        $_POST['Name'] != null &&
        $_POST['Link'] != null)
{
    $id = $_POST['Id'];
    $title = $_POST['Title'];
    $name = $_POST['Name'];
    $link = $_POST['Link'];
    
    $query = "INSERT INTO IndexPages (Id,Title,Name,Link) VALUES ('".$id."','".$title."','".$name."','".$link."');";
    $result = mysql_query($query);
    if(!$result)
    {
        echo mysql_error();
    }
    else
    {
        echo '<script>alert("Data Enter!");</script>';
    }
}
else
{
    ?>
    <script type="text/javascript">alert('מלא את כל השדות');</script>
    <?
}   
    
    
    ?>

<form action="<?=$_SERVER["PHP_SELF"];?>" method="POST">

    <label>ID</label>
    <input type="text" name="Id"></input>
    <label>Title</label>
    <input type="text" name="Title"></input>
    <label>Name - עברית</label>
    <input type="text" name="Name"></input>
    <label>Link</label>
    <input type="text" name="Link"></input>
    <input type="submit" name="submit"></input>
</form>
    
</html>
