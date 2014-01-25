<script type="text/javascript">
function SaveStatus(Id,J)
{
	var Div = '.ClientStatus' + J + ' option:selected';
	var StatusVal = $(Div).val();
	alert(StatusVal);
	var CompId = Id;
	//alert(CompId);
	$.ajax({
		  url: 'Ajax/ClientStatusHandler.php',
		  data: 'StatusVal=' + StatusVal + '&CompId=' + CompId,
		  type: 'POST',
		  success: function(data) {
			alert(data);
		  }
		});
}
</script>
<header><h3 class="tabs_involved">פניות</h3></header>
<div class="tab_container"><div id="tab1" class="tab_content"><table class="tablesorter" cellspacing="0">
<thead><tr><th width="10%" align="right">שם הלקוח</th>
 <th width="10%" align="right">סלולרי</th>
 <th width="11%" align="right">אי מייל</th>
 <th width="50%" align="right">הודעה</th>
 <th width="5%" align="right">תאריך</th>
 <th width="5%" align="right">שעה</th>
 <th width="19%" align="right">מספר לקוח</th>
 <th align="right">סטטוס</th>
 <th align="right">טיפול</th>
 </tr></thead><tbody>

<?
	//0 - Nothing, 1-Lead Used, 2-waiting, 4-Delete
	$Status = array(0 => 'לא טופל',
					1 => 'ליד טופל',
					2 => 'המתנה',
					4 => 'למחוק');
	$result		= mysql_query("SELECT * FROM Clients WHERE Status <> 4 ORDER BY Id DESC;");
	$total		= mysql_num_rows($result);

	for ($i=0;$i<$total;$i++)
	{
		$CompanyId = mysql_result($result, $i, "CompanyId");
			if ($CompanyId == "0")	
				{
					$CompanyIdLink = 'עמוד צור קשר';
				}
			else
				{
					$CompanyIdLink = '<a href="http://in10.co.il/Page&Id='.$CompanyId.'" target="_blank">'.$CompanyId.'</a>';
				}

		echo '
		<tr>
		 <td>'.mysql_result($result, $i, "Name").'</td>
		 <td>'.mysql_result($result, $i, "Cell").'</td>
		 <td>'.mysql_result($result, $i, "Email").'</td>
		 <td>'.mysql_result($result, $i, "Message").'</td>
		 <td>'.mysql_result($result, $i, "Date").'</td>
		 <td>'.mysql_result($result, $i, "Hour").'</td>
		 <td>'.$CompanyIdLink.'</td>
		 <td>'.$Status[mysql_result($result, $i, "Status")].'</td>
		 <td>
			<select class="ClientStatus'.$i.'">
				<option value="10">יש לבחור סטטוס</option>
				<option value="0">לא טופל</option>
				<option value="1">טופל</option>
				<option value="2">המתנה</option>
				<option value="4">למחוק</option>
			</select>
			<p style="cursor:pointer;font-weight:bold;" onClick="SaveStatus(\''.mysql_result($result, $i, "Id").'\','.$i.');">שמור</p>
		 </td>
		</tr>
		';
	}    
?>

</table></div></div>