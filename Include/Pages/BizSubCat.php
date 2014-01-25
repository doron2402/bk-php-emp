<?php

/*
	Biz Category
*/


		// -----------------------
		// index pages
		// -----------------------
        function GetIndexTables($id, $child,$zip,$text)
            {
				switch($zip)
				{
					case "02": $zip_text = 'ירושלים והסביבה'; break;
					case "03": $zip_text = 'אזור המרכז'; break;
					case "04": $zip_text = 'חיפה והצפון'; break;
					case "08": $zip_text = 'השפלה והדרום'; break;
					case "09": $zip_text = 'אזור השרון'; break;
				}
                echo '<div class="main_inner_table_row">';
                echo '<div class="row_heading_sub_'.$zip.'"><a href="#">'.$zip.'</a> <span style="width:95px; float:right; display:block; margin-top:30px;">'.$zip_text.'</span></div>';
                echo '<div class="row_tab_sub_'.$zip.'"><ul>';
                for ($i = 0; $i < 5; $i++) 
				{
					$imgpos1 = strpos($text[$i], "jpg");
					$imgpos2 = strpos($text[$i], "JPG");
					if (($imgpos1 != 0) || ($imgpos2!= 0))
						echo '<li><a href="Page&Id='.$id.$child.$zip.'0'.$i.'"><img src="images/asakim/'.$text[$i].'" width="102" height="40" border="0"></a></li>';
					else
						echo '<li><a href="Page&Id='.$id.$child.$zip.'0'.$i.'">'.$text[$i] .'</a></li>';
                }
				echo '</ul></div><div class="row_tab_sub_'.$zip.'"><ul>';
                for ($i = 5; $i < 10; $i++) 
				{
					$imgpos1 = strpos($text[$i], "jpg");
					$imgpos2 = strpos($text[$i], "JPG");
					if (($imgpos1 != 0) || ($imgpos2!= 0))
						echo '<li><a href="Page&Id='.$id.$child.$zip.'0'.$i.'"><img src="images/asakim/'.$text[$i].'" width="102" height="40" border="0"></a></li>';
					else
						echo '<li><a href="Page&Id='.$id.$child.$zip.'0'.$i.'">'.$text[$i] .'</a></li>';
				}
                echo '</ul></div></div>';
            }

		// -----------------------
		// pages texts
		// -----------------------
		$my_result = mysql_query("SELECT * FROM Cat_Pages WHERE Id='".$row_biz['Id']."'");
			$text[1] = mysql_result($my_result, 0, "text1");
			$text[2] = mysql_result($my_result, 0, "text2");
			$text[3] = mysql_result($my_result, 0, "text3");
?>


<script>
function selected(elementID)
{
	var object = document.getElementById('content' + elementID);	object.style.display = 'block';
	object = document.getElementById('contentm' + elementID);	object.style.display = 'none'

	for (x = 0; x <= 30; x++) {
		if (x.toString() != elementID) {
			var obj2 = document.getElementById('content' + x.toString());
			if (obj2 != null) {
				obj2.style.display = 'none';
				obj2 = document.getElementById('contentm' + x.toString());
				obj2.style.display = 'block'; }	} } return; }
</script>

<div class="inner_main_heading">
 <table width="100%" cellpadding="0" cellspacing="0"><Tr>
  <td align="right">
   <img src="images/inner_main_heading_conlist.png" alt="heading" />
   <a href="javascript:selected('0');" style="color:#000000; font-size:17px; font-weight:bold;"><? echo $row_biz['Name']; ?></a>
  </td>
  <td align="left" style="color:#000000; font-size:13px; font-weight:bold;">
   <? if ($text[1] != NULL) { ?><a href="javascript:selected('1');" style="color:#000000; font-size:13px; font-weight:bold;">המלצות</a> | <? } ?>
   <? if ($text[2] != NULL) { ?><a href="javascript:selected('2');" style="color:#000000; font-size:13px; font-weight:bold;">טיפים</a> | <? } ?>
   <? if ($text[3] != NULL) { ?><a href="javascript:selected('3');" style="color:#000000; font-size:13px; font-weight:bold;">מחירון</a> <? } ?>
  </td>
  <td width="10"></td>
 </tr>
</table>
</div>
<div class="split_big"></div>


<div id=contentm0 style="DISPLAY: block"></div>
<div id=content0 style="DISPLAY: block">
<?
    if ($row_biz['Id'] < 10) $row_biz['Id'] = '0'.$row_biz['Id'];
	if ($row_biz['Child'] == 0)
    {
        $child = '00';
        $Zip_Code_Text_02 = explode(',', $row_name_child['T02']); 
        $Zip_Code_Text_03 = explode(',', $row_name_child['T03']); 
        $Zip_Code_Text_04 = explode(',', $row_name_child['T04']); 
        $Zip_Code_Text_08 = explode(',', $row_name_child['T08']); 
        $Zip_Code_Text_09 = explode(',', $row_name_child['T09']);
        // echo '<div class="subcat_main_heading_small"><!-- Child Bussiness Page -->'.$row_biz['Name'].'</div>';             
        GetIndexTables($row_biz['Id'], $child, '02', $Zip_Code_Text_02);
        GetIndexTables($row_biz['Id'], $child, '03', $Zip_Code_Text_03);
        GetIndexTables($row_biz['Id'], $child, '04', $Zip_Code_Text_04);
        GetIndexTables($row_biz['Id'], $child, '08', $Zip_Code_Text_08);
        GetIndexTables($row_biz['Id'], $child, '09', $Zip_Code_Text_09);
        
    }
?>
</div>

<? if ($text[1] != NULL) { ?>
<div id=contentm1 style="DISPLAY: block"></div><div id=content1 style="DISPLAY: none">
 <div style="margin:20px; margin-bottom:0px;"><br><br>
 <? echo $text[1]; ?>
 <br><br><br><a href="javascript:selected('0');" style="color:#000000; font-size:14px; font-weight:bold;">» חזור לקטגוריה <? echo $row_biz['Name']; ?></a>
 </div>
</div>
<? } ?>

<? if ($text[2] != NULL) { ?>
<div id=contentm2 style="DISPLAY: block"></div><div id=content2 style="DISPLAY: none">
 <div style="margin:20px; margin-bottom:0px;"><br><br>
 <? echo $text[2]; ?>
 <br><br><br><a href="javascript:selected('0');" style="color:#000000; font-size:14px; font-weight:bold;">» חזור לקטגוריה <? echo $row_biz['Name']; ?></a>
 </div>
</div>
<? } ?>

<? if ($text[3] != NULL) { ?>
<div id=contentm3 style="DISPLAY: block"></div><div id=content3 style="DISPLAY: none">
 <div style="margin:20px; margin-bottom:0px;"><br><br>
 <? echo $text[3]; ?>
 <br><br><br><a href="javascript:selected('0');" style="color:#000000; font-size:14px; font-weight:bold;">» חזור לקטגוריה <? echo $row_biz['Name']; ?></a>
 </div>
</div>
<? } ?>


<!--  Footer Page -->
<div style="margin-bottom: 0px;height: 10px;background-color: white;"></div>