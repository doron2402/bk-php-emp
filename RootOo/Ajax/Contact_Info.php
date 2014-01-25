<?php
require_once 'DB.php';


if(isset($_POST['BizName']))
        {$biz_name = $_POST['BizName'];}
else{echo 'Missing Data! Biz name';}

if(isset($_POST['BizTitle']))
        {$biz_title = $_POST['BizTitle'];}
else{echo 'Missing Data! biz title';}

if(isset($_POST['BizContactName']))
        {$biz_contact_name = $_POST['BizContactName'];}
else{echo 'Missing Data! BizContactName';}

$biz_contact_add = '1';


if(isset($_POST['BizContactPhone']))
        {$biz_contact_phone = $_POST['BizContactPhone'];}
else{echo 'Missing Data! BizContactPhone';}

if(isset($_POST['BizContactEmail']))
        {$biz_contact_email = $_POST['BizContactEmail'];}
else{echo 'Missing Data!BizContactEmail ';}

if(isset($_POST['BizId']))
        {$id = $_POST['BizId'];}
else{die('Missing Data! BizId');}

$biz_description = '1';


if(isset($_POST['BizTextBody']))
        {$biz_text_body = addslashes($_POST['BizTextBody']);}
else{die('Missing Data! BizTextBody');}

$biz_text_header = '1';
$biz_type = '1';


if(isset($_POST['BizAdd']))
        {$biz_add = addslashes($_POST['BizAdd']);}
else{die('Missing Data! BizAdd');}
$biz_add = str_replace("\'", "'", $biz_add);
$biz_add = str_replace('\"', '"', $biz_add);


if(isset($_POST['BizMetaKeyword']))
        {$biz_meta_keyword = $_POST['BizMetaKeyword'];}
else{die('Missing Data! BizMetaKeyword');}

if(isset($_POST['BizMetaDescription']))
        {$biz_meta_description = $_POST['BizMetaDescription'];}
else{die('Missing Data! BizMetaDescription');}



	function UpdateContact($id,$name,$title,$contact,$address, $phone,$email,$description,$body,$header,$bizadd,$biztype, $biz_meta_k, $biz_meta_d)
    {  
            $query  = "UPDATE Pages SET Name='".$name."',";
            $query .= "Title= '".$title."', ContactName='". $contact."',ContactPhone='". $phone;
            $query .= "', ContactAddress='".$address."',ContactEmail='".$email."',Description='". $description."'";
            $query .= ",Text_Body ='".$body."',Text_Header ='". $header ."', ContactModule='". $bizadd."',Type='". $biztype."',Meta_Keywords='" . $biz_meta_k ."', Meta_Description='" .$biz_meta_d . "' ";
            $query .= "WHERE Id='".$id."';";
            $result = mysql_query($query);
            
            if($result)
            {   
                echo '<a href="#" ONCLICK="history.go(-1);return false;">חזרה לדף </a>';
                echo '<p>עדכון בוצע בהצלחה </p>';
            }
            else
            {
               echo mysql_error ();
            
            }
    }


/*
		$biz_meta_keyword		= str_replace('\\','', $biz_meta_keyword);
		$biz_title				= str_replace('\\','', $biz_title);
		$biz_meta_description	= str_replace('\\','', $biz_meta_description);
		$biz_name				= str_replace('\\','', $biz_name);

		$biz_meta_keyword		= str_replace('"','&quot;', $biz_meta_keyword);
		$biz_title				= str_replace('"','&quot;', $biz_title);
		$biz_meta_description	= str_replace('"','&quot;', $biz_meta_description);
		$biz_name				= str_replace('"','&quot;', $biz_name);
*/


	UpdateContact($id,
	htmlspecialchars($biz_name),
	htmlspecialchars($biz_title),
	htmlspecialchars($biz_contact_name),
	htmlspecialchars($biz_contact_add),
	htmlspecialchars($biz_contact_phone),
	htmlspecialchars($biz_contact_email),
	htmlspecialchars($biz_description),
	$biz_text_body,
	htmlspecialchars($biz_text_header),
	$biz_add,
	htmlspecialchars($biz_type),
	htmlspecialchars($biz_meta_keyword),
	htmlspecialchars($biz_meta_description));

?>
