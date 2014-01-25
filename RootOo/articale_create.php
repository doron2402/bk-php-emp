<?php
/*
	Create articale
	
	AritcaleCreate
	articale_create.php
*/



?>
<form action="Ajax/Articale_Create.php" method="POST" class="Contact_Info">
		<table width="100%" cellpadding="0" cellspacing="0">
		 <tr>
		  <td align="right" valign="top">

		<table>
		 <tr>
		  <td>קישור למאמר (טקסט) שיופיע</td>
		  <td><textarea style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="Articale_Name" class="BizName" style="width:92%;" rows="1"></textarea></td>
		  <td style="color:black;">יופיע בעמוד מאמרים</td>
		 </tr>
		  <td>Link</td>
		  <td><textarea type="text" style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="Articale_Link" class="BizTitle" style="width:92%;" rows="1"></textarea></td>
		  <td style="color:red;">יופיע בשורת הURL כקישור</td>
		 </tr>
        </table>
         <div style="padding:10px;"><span style="color:blue;">תוכן המאמר</span></div>
         <textarea id="ckeditor1" name="Articale_Content" class="BizAdd" size="60" style="width:92%" ></textarea>
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