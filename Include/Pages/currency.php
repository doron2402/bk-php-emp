<div style="padding:15px">
 <span style="font-size:14px; font-weight:bold;">שערי חליפין יציגים</span>
</div>
<div class="split_big"></div>

<?
     $query = "SELECT * FROM footer WHERE Id = 3;";
     $result = mysql_query($query);
     $currency = mysql_result($result, 0, "text");
	 echo $currency;
?>