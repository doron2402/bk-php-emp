<header><h3 class="tabs_involved">עדכן תקנון אתר</h3></header>

<?

	if ($_POST['footer'] != NULL)
	{
		$footer_text = $_POST['footer'];
		$footer_text = str_replace("\'", "'", $footer_text);
		$footer_text = str_replace('\"', '"', $footer_text);
		mysql_query("UPDATE `impala_in10`.`footer` SET `text` = '".$footer_text."' WHERE `footer`.`id` =2;");
	}
	else
	{
     $query = "SELECT * FROM footer WHERE Id = 2;";
     $result = mysql_query($query);
     $footer_text = mysql_result($result, 0, "text");
	}
?>

<div class="tab_container">
 <div id="tab1" class="tab_content">
  <form method="post">
  <textarea id="footer" name="footer" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $footer_text; ?></textarea>  
	<script>
	CKEDITOR.replace( 'footer', { language: 'he' });
	</script>
	<div style="padding:10px; align:left; width:100%;">
	 <input type="submit" value="עדכן תקנון אתר!">
	</div>
  </form>
 </div>
</div>