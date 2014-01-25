<header><h3>בחר קטגוריה לעדכון</h3></header>
<div class="module_content"><ul>

<table cellpadding="4"><tr><td valign="top">
<?

        $query = "SELECT * FROM IndexPages ORDER BY Name ASC;";
        $result = mysql_query($query);

		$count = 1;
        while ($row = mysql_fetch_object($result))
        {
           echo ''. $row->Id .' <a href="Cat_Pages_Edit&Id='. $row->Id .'">'.$row->Name.'</a><br>';
           if ($count%30 == 0) echo '</td><td valign="top">';
        
			$count++;
		}
?>

</td></tr></table>
<br><br>
</ul></div>