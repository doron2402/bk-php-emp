<?

/*
	Main Page
*/

?>


<Table width="100%" cellpadding="0" cellspacing="0">
 <tr>
  <td align="right"><img src="images/inner_main_heading.png" width="123" height="18" alt="heading" /></td>
  <td align="left"><img src="images/buy10_banner.png" width="548" height="31" alt="buy10" /></td>
 </tr>
</table>
<div class="split_big"></div>

<?
	$bla = "'";
	 $query		= "SELECT * FROM `Index` WHERE `active`=1 ORDER BY `Index`.`pos` ASC";
     $result	= mysql_query($query);
	 $total		= mysql_num_rows($result);
	 for ($i=0;$i<$total;$i++)
	 {
		$name		= mysql_result($result, $i, "name");
		 echo '<div class="main_inner_table_row">
      	<div class="row_heading">'.$name.'</div>
        <div class="row_tab">
       	 <ul>';

		for ($z=1;$z<8;$z++)
		{
			$pic[$z] = mysql_result($result, $i, "pic".$z."");
			$link[$z] = mysql_result($result, $i, "url".$z."");
			echo '<li><a href="'.$link[$z].'" target="_blank" onClick="SetVisited('.$bla.''.$pic[$z].'|'.$link[$z].''.$bla.')"><img src="images/icons2/'.$pic[$z].'" width="64" height="29" border="0" /></a></li>';
			echo "\n";
		}

         echo '</ul>
        </div>
      </div>';
	 }
?>