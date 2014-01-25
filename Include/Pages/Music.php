<?
/*
	 Music function
*/
?>

<script language="javascript">
var popupWindow = null;
function centeredPopup(url,winName,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w) : 0;
TopPosition = (screen.height) ? (screen.height-h) : 0;
settings =
'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
</script>


<table><tr>
 <!-- logo -->
 <td><img src="images/music_button01.png" alt="music" width="133" height="29" border="0" /></a></td><!-- end of logo -->
 <!-- categories -->
 <td><div style="padding:10px; margin-top:10px;">
	<?
		echo " | ";
		 $query = "SELECT * FROM Music_cat WHERE Name!= '' ORDER BY Position;";
		 $result = mysql_query($query);
		 $total = mysql_num_rows($result);
		 echo '<input type="hidden" name="total" value="'.$total.'">';
		 for ($i=0;$i<$total;$i++)
		 {
				$name = mysql_result($result, $i, "name");
				$position = mysql_result($result, $i, "Position");
				if ($cat == $position)  echo '<a href="Music&Cat='.$position.'" style="color:#000000; font-weight:bold; font-size:14px;">'.$name.'</a> | ';
				else					echo '<a href="Music&Cat='.$position.'" style="font-weight:bold; font-size:14px;">'.$name.'</a> | ';
				
		 }
	?>
 </div></td></tr></table><!-- end of categories -->

<div class="split_big"></div>

<br>
באדיבות Hai Djstroke Reyhanian

<?
        $query = "SELECT * FROM Music WHERE Link!='' AND cat='".$cat."' ORDER BY Position;";
        $result = mysql_query($query);
        while ($row = mysql_fetch_object($result)) 
            {
				$row->Link = 'http://www.youtube.com/embed/'.$row->Link.'?fs=1&autoplay=1&loop=1';

                ?>
				<div class="song_list">
				 <div class="song_name"><? echo $row->Name; ?></div>
				 <div class="play_button">

				  <a href="<? echo $row->Link; ?>" onclick="centeredPopup(this.href,'myWindow','220','150','yes');return false"><img src='images/play_button.png' alt='play_button' width='33' height='33' border='0' /></a>
				 </div>
				</div> <?
            }
?>

<div id="Music_Box">
</div>