<?
/*
	Weather function
*/
?>
<div style="padding:15px">
 <table width="100%" cellpadding="0" cellspacing="0"><tr>
 <td align="right"><span style="font-size:14px; font-weight:bold;">in10 מזג אוויר</span></td>
 <td align="left">
  <a href="#israel" style="font-size:14px; font-weight:bold;">מזג אוויר בארץ</a> | 
  <a href="#abroad" style="font-size:14px; font-weight:bold;">מזג אוויר בעולם</a>
 </td>
 </tr></table>
</div>
<div class="split_big"></div>
<?
     $query = "SELECT * FROM footer WHERE Id = 4;";
     $result = mysql_query($query);
     $currency = mysql_result($result, 0, "text");
	 echo $currency;
?>