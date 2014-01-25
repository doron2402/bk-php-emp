<?php
/*
	articale_edit
	
	Edit Aritcale
*/

	if($_GET['ArticaleId'] != '')
	{
		//User want to edit an aritcale
		$ArticaleId = (int)$_GET['ArticaleId'];
		$QueryGetAricales = "SELECT * FROM `Articales` WHERE Id =".$ArticaleId." LIMIT 1";
		$Result = mysql_query($QueryGetAricales);
		$Row = mysql_fetch_assoc($Result);
		?>
		<form action="Ajax/Articale_Edit.php" method="POST" class="Contact_Info">
		<input type="hidden" name="Articale_Id" value="<?php echo $ArticaleId;?>" />
		<table width="100%" cellpadding="0" cellspacing="0">
		 <tr>
		  <td align="right" valign="top">

		<table>
		 <tr>
		  <td>קישור למאמר (טקסט) שיופיע</td>
		  <td><textarea style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="Articale_Name" class="BizName" style="width:92%;" rows="1"><?php echo $Row['Name'];?></textarea></td>
		  <td style="color:black;">יופיע בעמוד מאמרים</td>
		 </tr>
		  <td>Link</td>
		  <td><textarea type="text" style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="Articale_Link" class="BizTitle" style="width:92%;" rows="1"><?php echo $Row['Link'];?></textarea></td>
		  <td style="color:red;">יופיע בשורת הURL כקישור</td>
		 </tr>
        </table>
         <div style="padding:10px;"><span style="color:blue;">תוכן המאמר</span></div>
         <textarea id="ckeditor1" name="Articale_Content" class="BizAdd" size="60" style="width:92%" ><?php echo $Row['Content'];?></textarea>
	  <script>
	  	CKEDITOR.replace( 'ckeditor1', { language: 'he' });
	  </script>

	</div></td></td></table>
	 <div class="submit_link">
      <input style="color:black;font-size:14px;" id="Articale_Submit" type="submit" value="שמור שינויים" />
     </div>
    </form>
</article>

</div>
</td></tr></table>
		<?php
	}
	else
	{
	?>
	<article class="module width_full">
<header><h3>תמונה לעסק</h3></header>
<div class="module_content">
<table>
 <tr>
  <td valign="top" align="right">
  רשימת מאמרים
  </td>
 </tr>

	<?php
		//Show list of aricales
		$QueryGetAricales = "SELECT * FROM `Articales`;";
		$Result = mysql_query($QueryGetAricales);
		while ($row = mysql_fetch_assoc($Result))
		{
			?>
			<tr>
			  <td valign="top" align="right">
			  <a href="AritcaleEdit&ArticaleId=<?php echo $row['Id'];?>"><?php echo $row['Name'];?></a>
			  </td>
			</tr>		
			<?php
		}
		?>
		</table></div></article>
		<?php
	}
?>
<br />
<br />
