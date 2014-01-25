<?php

/*
	File		:		Traffic_And_Converstion_Per_Biz.php
	
*/
?>
<header><h3>BI - לעסקים המופיעים באתר</h3></header>
<div class="module_content">

<table border="0"  cellspacing="4">
	<th>קטגוריה</th>	
	<th>קישור</th>	
	<th>צפיות</th>
</tr>
<?

        $query = "SELECT * FROM `IndexPages` WHERE Traffic >0 ORDER BY `IndexPages`.`Traffic` DESC";
        $result = mysql_query($query);
		$count = 1;
        while ($row = mysql_fetch_object($result))
        {
			echo '<tr>';
			echo '<td>'.$row->Name.'</td>';
			echo '<td><a href="http://in10.co.il/Biz&Biz='.$row->Title.'" target="_BLANK">לחץ כאן</a></td>';
			echo '<td>'.$row->Traffic.'</td>';
			echo '</tr>';
        
			$count++;
		}
		
?>

</table>
<p>סה"כ רשומות <?php echo $count;?></p>
</div>