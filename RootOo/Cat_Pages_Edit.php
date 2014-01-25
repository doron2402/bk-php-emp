<?
        $query = "SELECT * FROM IndexPages WHERE Id='".$_GET['Id']."';";
        $result = mysql_query($query);
		$name = mysql_result($result, 0, "Name");
?>

<header><h3 class="tabs_involved">עדכן תכנים לקטגוריה #<? echo $_GET['Id']; ?> - <? echo $name; ?></h3></header>

<?
	if ($_POST['update'] == "1")
	{
		$text1 = $_POST['text1'];
		$text1 = str_replace("\'", "'", $text1);
		$text1 = str_replace('\"', '"', $text1);

		$text2 = $_POST['text2'];
		$text2 = str_replace("\'", "'", $text2);
		$text2 = str_replace('\"', '"', $text2);

		$text3 = $_POST['text3'];
		$text3 = str_replace("\'", "'", $text3);
		$text3 = str_replace('\"', '"', $text3);

		mysql_query("UPDATE `impala_in10`.`Cat_Pages` SET `text1` = '".$text1."', `text2` = '".$text2."', `text3` = '".$text3."' WHERE `Cat_Pages`.`id` =".$_GET['Id'].";");
	}
	else
	{
     $query = "SELECT * FROM Cat_Pages WHERE id='".$_GET['Id']."';";
     $result = mysql_query($query);
     $text1 = mysql_result($result, 0, "text1");
     $text2 = mysql_result($result, 0, "text2");
     $text3 = mysql_result($result, 0, "text3");
	}
?>

<div class="tab_container">
 <div id="tab1" class="tab_content">
  <form method="post">
   <input type="hidden" name="update" value="1">
  המלצות<br><textarea id="text1" name="text1" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $text1; ?></textarea>  
  טיפים<br><textarea id="text2" name="text2" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $text2; ?></textarea>  
  מחירון<br><textarea id="text3" name="text3" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $text3; ?></textarea>  
	<script>
	CKEDITOR.replace( 'text1', { language: 'he' });
	CKEDITOR.replace( 'text2', { language: 'he' });
	CKEDITOR.replace( 'text3', { language: 'he' });
	</script>
	<div style="padding:10px; align:left; width:100%;">
	 <input type="submit" value="עדכן תכנים!">
	</div>
  </form>
 </div>
</div>