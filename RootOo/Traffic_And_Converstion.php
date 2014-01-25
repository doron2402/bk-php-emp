<header><h3>BI - לעסקים המופיעים באתר</h3></header>
<div class="module_content">

<table border="0"  cellspacing="4">
	<th>Id</th>
	<th>שם העסק</th>
	<th>טלפון</th>
	<th>דוא"ל</th>
	<th>קישור לדף</th>	
	<th>צפיות</th>
	<th>המרות</th>
	<th>אחוז הצלחה</th>
</tr>
<?

        $query = "SELECT * FROM Pages WHERE Traffic > 0 ORDER BY Traffic DESC;";
        $result = mysql_query($query);
		$count = 1;
        while ($row = mysql_fetch_object($result))
        {
			echo '<tr>';
			echo '<td>'.$row->Id .'</td>';
			echo '<td>'.$row->Name.'</td>';
			echo '<td>'.$row->ContactPhone .'</td>';
			echo '<td>'.$row->ContactEmail.'</td>';
			echo '<td><a href="http://www.in10.co.il/Page&Id='.$row->Id.'" target="_BLANK">לחץ כאן</a></td>';
			echo '<td>'.$row->Traffic.'</td>';
			echo '<td>'.$row->View.'</td>';
			echo '<td>'.($row->View/$row->Traffic) * 100 .'%</td>';
			echo '</tr>';
        
			$count++;
		}
?>

</table>
<p>סה"כ רשומות <?php echo $count;?></p>
</div>