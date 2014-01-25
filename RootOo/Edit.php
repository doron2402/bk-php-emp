<?php


class Edit
{
    protected $BizId;
    
    public function __construct($id = null) 
    {
      if ($id == 0) return TRUE;
      else $this->BizId = mysql_real_escape_string($id);
    }

    public function EditPage()
     {
        
        $query = "SELECT * FROM Pages WHERE Id = ". $this->BizId .";";
        $result = mysql_query($query);
        $row = mysql_fetch_object($result);

	    echo '<article class="module width_full">';
        echo '<header><h3>כרטיס עסק #'. $this->BizId .'</h3></header>';
        echo '<form action="Ajax/Contact_Info.php" method="POST" class="Contact_Info">';
        echo '<input type="hidden" name="BizId" class="BizId" value="'. $this->BizId .'">';
?>

		<table width="100%" cellpadding="0" cellspacing="0">
		 <tr>
		  <td align="right" valign="top">

		<table>
		 <tr>
		  <td>שם העסק</td>
		  <td><textarea style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizName" class="BizName" style="width:92%;" rows="1"><? echo $row->Name; ?></textarea></td>
		  <td style="color:black;">מופיע בכותרת העמוד.</td>
		 </tr>
		  <td>Meta Title</td>
		  <td><textarea type="text" style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizTitle" class="BizTitle" style="width:92%;" rows="1"><? echo $row->Title; ?></textarea></td>
		  <td style="color:red;">עבור קידום - יופיע בכותרת העמוד - 10-60 תווים</td>
		 </tr>
		 <tr>
		  <td>Meta Description</td>
		  <td><textarea type="text" style="width:500px; height:38px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizMetaDescription" class="BizMetaDescription" style="width:92%;" rows="1"><? echo $row->Meta_Description; ?></textarea></td>
		  <td style="color:red;">עבור קידום - תיאור העמוד - עד 200 תווים.</td>
		 </tr>
		 <tr>
		  <td>Meta Keywords</td>
		  <td><textarea type="text" style="width:500px; height:38px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizMetaKeyword" class="BizMetaKeyword" style="width:92%;" rows="1"><? echo $row->Meta_Keywords; ?></textarea></td>
		  <td style="color:red;">עבור קידום - מילות חיפוש - מופרד בפסיקים - עד 5 מילות חיפוש</td>
		 </tr>
		 <tr>
		  <td>איש קשר</td>
		  <td><textarea type="text" style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizContactName" class="BizContactName" style="width:92%;" rows="1"><? echo $row->ContactName; ?></textarea></td>
		  <td style="color:green;">מידע פנימי</td>
		 </tr>
		 <tr>
		  <td>טלפון העסק</td>
		  <td><textarea type="text" style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizContactPhone" class="BizContactPhone" style="width:92%;" rows="1"><? echo $row->ContactPhone; ?></textarea></td>
		  <td style="color:green;">מידע פנימי</td>
		 </tr>
		 <tr>
		 <tr>
		  <td>דוא"ל</td>
		  <td><textarea type="text" style="width:500px; height:18px; font-weight:bold; font-size:13px; font-family: Arial, Helvetica, sans-serif; overflow: hidden;" name="BizContactEmail" class="BizContactEmail" style="width:92%;" rows="1"><? echo $row->ContactEmail; ?></textarea></td>
		  <td style="color:green;">מידע פנימי</td>
		 </tr>
        </table>
	
         <div style="padding:10px;">פרטי צור קשר - <span style="color:blue;">מופיע בעמוד העסק</span></div>
         <textarea id="ckeditor1" name="BizAdd" class="BizAdd" size="60" style="width:92%" ><? echo $row->ContactModule; ?></textarea>

		 <div style="padding:10px;">תיאור העסק - <span style="color:blue;">מופיע בעמוד העסק</span></div>
         <textarea id="ckeditor2" name="BizTextBody" size="60" style="width:92% direction:rtl; text-align:right;" ><? echo $row->Text_Body; ?></textarea>  
	  
	  <script>
		CKEDITOR.replace( 'ckeditor2', { language: 'he' });
	  	CKEDITOR.replace( 'ckeditor1', { language: 'he' });
	  </script>

	</div></td></td></table>
	 <div class="submit_link">
      <input style="color:black;font-size:14px;" id="Contact_Submit" type="submit" value="שמור שינויים" />
     </div>
    </form>
</article>

</div>
</td></tr></table>



<article class="module width_full">
<header><h3>תמונה לעסק</h3></header>
<div class="module_content">

<?
if ($_GET['result'] == "1") echo '<b>התמונה התעדכנה בהצלחה!</b>';
if ($_GET['result'] == "9") echo '<b>התמונה לךא התעדכנה בהצלחה. נסה שוב!</b>';
?>

<table>
 <tr>
  <td valign="top" align="right">
   עדכן תמונה
   <form enctype="multipart/form-data" action="../images/File.php" method="POST" >
    <input name="userfile" type="file" />
    <input type="hidden" name="Id" value="<? echo $this->BizId; ?>"/><br><br>
    <input type="submit" name="submit" value="החלף תמונה" />
   </form>
  </td>
  <td valign="top" align="right">
    <img src="../../images/pages/<? echo $row->Img; ?>">
  </td>
 </tr>
</table>
</div>
</article>

<?



     }
     
     
     public function EditIndexPages()
     {
         
		 //echo $this->BizId;
         $query = "SELECT * FROM IndexTables WHERE Id ='". $this->BizId ."';"; 
         $result = mysql_query($query);
         $row = mysql_fetch_assoc($result);
         
         echo '<article class="module width_full">';
         echo '<header><h3 class="tabs_involved">ID :'. $row['Id'] .' > <u>'.$row['Title'].'</u> > הזן שמות לעסקים - לתמונה הזן את שם התמונה. </h3> <a href="javascript: history.go(-1)" style="line-height:32px;">» חזור אחורה</a></header>
		 <div class="module_content">';
         echo '<form action="Ajax/SetIndexTables.php" METHOD="POST">';
         echo '<input type="hidden" name="Id" value="'. $row['Id'].'" />';
         $zip = array('02','03','04','08','09');
         $row_array = array($row['T02'],$row['T03'],$row['T04'],$row['T08'],$row['T09'] );
         
		$start = "".$row['Id']."000200";
		//if ($row['Id'] == 1) $start = '1000200';
		//else				 $start = 1000200+(50*$row['Id']);
		echo $start;

         for ($index = 0; $index < 5; $index++) 
         {
			echo '<div style="padding-top:10px;"></div>';
			$exp = explode(",", $row_array[$index]);
			echo '<table><tr><td valign="top">';
			echo '<div style="background-color:#cdcdcd;">איזור חיוג '. $zip[$index] .'</div><div style="padding-top:10px;"></div>';
			for ($z=0;$z<10;$z++)
			{
				$x = "'";
				echo '<input name="field'.$zip[$index].''.$z.'" value="'.$exp[$z].'" style="font-size:11px; width:200px;" maxlength=28><br>';
			}
			echo '</td><td valign="top">';
			echo '<div style="background-color:#cdcdcd;">נתונים מהDB</div><div style="padding-top:10px;"></div>';

			$start_now = $start; // echo $start_now;
			for ($z=0;$z<10;$z++)
			{
				//echo "SELECT * FROM Pages WHERE Id ='".$start."';";
				 $q = "SELECT * FROM Pages WHERE Id ='".$start_now."';"; 
				 $r = mysql_query($q);
				 $name = mysql_result($r, $i, "name");
				 if ($name == NULL) $name = 'ריק';

				echo '<div style="line-height:20px;"><a href="http://in10.co.il/Page&Id='.$start_now.'" target="_blank">'.$name.'</a></div>';
				
				$start_now++;
			}

			echo '</td></tr></table>';

			if ($index == 2)
				$start=$start+400;
			else
				$start=$start+100;
         }

         echo '<div style="padding-top:10px;"></div>
		 <input type="submit" value="שמור שינויים">';
 
     }
    
     
     //Currently not in use!
     protected function GetAllType()
     {
         $query = "SELECT Id,Name FROM IndexPages;";
         $reuslt = mysql_query($query);
         $option_form = '<p><select name="Type">';
         while ($row = mysql_fetch_object($reuslt)) 
             {
                $option_form .= '<option name="'.$row->Id .'">'.$row->Name .'</option>';
             }
             
         $option_form .= '</select></p>';
             return $option_form;
     }

     
     
     public function GetRadioStation()
     {
         $query = "SELECT * FROM Radio;";
         $result = mysql_query($query);
     
         $html = '<br .><a style ="margin-right:20px;font-size:22px;" href="Radio&Edit=0">הוסף תחנה </a>'; 
         while ($row = mysql_fetch_object($result)) 
             {
                $html .= '<article class="module width_full"><header><h3>'. $row->Name .'</h3></header>';
                $html .= '<div class="module_content">';
                $html .= '<fieldset><label> Station Name: '. $row->Name .'</label></fieldset>';
                $html .= '<fieldset><label> Station Link: '. $row->Link .'</label></fieldset>';
                $html .='<div class="clear"></div></div>';
                $html .= '<footer><div class="submit_link"><a href="Radio&Edit='.$row->Id.'"> ערוך </a> </div></footer></article>';        
                
             }
       return $html;
     }
     
     
     public function EditRadioStation($id)
     {
         echo '<div id="EditRadio">';
         echo '<fieldset>';
         
             if ($id == 0)
             {
                   echo '<legend>יצירת תחנה חדשה</legend>';
             }
             else
             {
                $query = "SELECT * FROM Radio WHERE Id ='".$id."';";
                $result = mysql_query($query);
                $row = mysql_fetch_object($result); 
                echo '<legend>'.$row->Name .'</legend>';
             }
         echo '<form action="Ajax/SetRadioStation.php" method="POST">';
         echo '<p><label>שם התחנה : </label>';
         echo '<input type="text" name="station_name" value="'. $row->Name .'" /> </p>';
         echo '<p><label>לינק לתחנה : </label>';
         echo '<input type="text" size="100" name="station_link" value="'. $row->Link .'" /> </p>';
            if ($id == 0)
                {echo '<input type="hidden" name="Id" value="0" />';}
            else
                {echo '<input type="hidden" name="Id" value="'.$row->Id.'" />';}
         echo '<input type="submit" value="שמור שינויים" />';
         echo '</fieldset>';
         echo '</div>';
		 echo '<br><br><br><br>';
         
     }
     
     public function GetEditButton($id,$table,$field,$text)
     {
        $query = "SELECT * FROM IndexPages;";
        $result = mysql_query($query);
        echo '<header><h3>עדכון שמות לעסקים בקטגוריות</h3></header>';
        echo '<div class="module_content">';
        echo '<ul>';

        while ($row = mysql_fetch_object($result))
        {
           
            echo '
			<li style="float:right;margin-bottom:60px;margin-left:10px;">
			 <a  href="IndexEdit&Id='. $row->Id .'"><img src="../images/Biz/'.$row->Title .'.png" width="97" height="74" border="0">';
            echo '<center><h3>עריכה</h3></center></a><br><br>';
            echo '<h3>שם: '. $row->Name . '</h3>';
            echo '</li>';
            
        }
        
         echo '</ul>';
         echo '</div>';
     }
}