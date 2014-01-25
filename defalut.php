<?php
/*
	IN10.co.il
	
	Owners:
	
	Shai Zelekta 
	Snir Toledo

*/
	 error_reporting(1); //No Error
	 session_unset();

	 include 'Config/Config.php'; //Loading Class Main
	 include "functions1.php";	 //Loading function for HTML
	
	$m_RtB = '';

	$GetPageUrl = $_GET['url']; //Clear un wanted security issue
	$GetPageId = $_GET['id'];	//checking for Id only integer
	
	 // Meta Title, Description & Keywords.
	 $obj		= new Main();
	 $meta		= load_meta($obj, $GetPageUrl, $GetPageId);
	 $url		= $meta[3];
	 
	 if ($_GET['Biz'] == NULL) 
	 {
		define('biz_id', '0');
	 }
	 else
	 {
		 /*
			Business Pages - such as Security,Real estate, etc....
			Description and Keyword - for Business Pages
		 */
		 $Biz = mysql_real_escape_string($_GET['Biz']);
		 $query = "SELECT * FROM IndexPages WHERE Title='".$Biz."' LIMIT 1;";
		 $result = mysql_query($query);
		 $id_biz = mysql_result($result, 0, "id");
		 define('biz_id', $id_biz);
		$Biz_Keyword = mysql_result($result, 0, "Keyword");
		$Biz_Description = mysql_result($result, 0, "Description");
		 $m_RtB = mysql_result($result, 0, "name");
		 $m_Cate[0] = 'in10.co.il - '.$m_RtB.'';//Title
		 $m_Cate[2] = $Biz_Keyword;	//Keyword
		 $m_Cate[1] = $Biz_Description;	//Description

	 }
	 if ($_GET['Id'] != NULL)
	 {
		 $m_RtB = '111';
		 $BizId = (int)$_GET['Id'];
		 $query = "SELECT * FROM Pages WHERE Id='".$BizId."' LIMIT 1;";
		 $result = mysql_query($query);
		 $m_Cate[0] = mysql_result($result, 0, "Title");
		 $m_Cate[1] = mysql_result($result, 0, "Meta_Description");
		 $m_Cate[2] = mysql_result($result, 0, "Meta_Keywords");
	 }

	 // type of pages
	 $GetPageUrl = strtolower($GetPageUrl);
     switch ($GetPageUrl) 
     {
	  case "index":
	   $text_in_top = '';
	   $url_to_read = 'Include/Pages/main.php';
	  break;
 	  case "adv":
	   $text_in_top = 'פרסם אצלנו';
	   $url_to_read = 'Include/Pages/Adv.php';
	  break;
 	  case "contact":
	   $text_in_top = 'צור קשר';
	   $url_to_read = 'Include/Pages/Contact.php';
	  break;
 	  case "takanon":
	   $text_in_top = '';
	   $url_to_read = 'Include/Pages/takanon.php';
	  break;
      case "bizindex":
	   $text_in_top = 'עסקים';
	   $html = $obj->FetchBizIndexPages();
	   $url_to_read = 'Include/Pages/BizIndex.php';
	  break;
	  case "music":
	    $text_in_top = 'מוזיקה';
	  	$cat = $HTTP_GET_VARS['Cat'];
		if ($cat == NULL) $cat = 1;
	    $url_to_read = 'Include/Pages/Music.php';
	  break;
	  case "biz":
	   $Biz = $_GET['Biz']; 
	   $row_biz = $obj->SetTitlePage($Biz);
	   $row_name_child = $obj->GetIndexTable();
	   $text_in_top = ''.$row_name_child['Title'].' באיזור החיוג שלי';
	   $url_to_read = 'Include/Pages/BizSubCat.php';
	   $obj->SetTrafficPerBiz();
	   break;
	  case "page":
	   $id = $_GET['Id'];
	   $row = $obj->GetBizPage($id);
		 // find business using id
		 $idstr = strlen($id);
		 $check_id = "".$id[0]."".$id[1]."";
		 $query = mysql_query("SELECT * FROM IndexPages WHERE id=".$check_id.";");
		 $li	= mysql_result($query, 0, "name");
	   $text_in_top = ''.$li.' באיזור החיוג שלי';
	   $url_to_read = 'Include/Pages/page.php';
	   break;
	  case "weather":
	   $text_in_top = 'מזג אוויר';
	   $url_to_read = 'Include/Pages/Weather.php';
	   break;
	  case "currency":
	   $text_in_top = 'שערי חליפין יציגים';
	   $url_to_read = 'Include/Pages/currency.php';
	   break;
	  default:
	   $text_in_top = 'עסקים';
	   $html = $obj->FetchBizIndexPages();
	   $url_to_read = 'Include/Pages/BizIndex.php';
	  /*
		//Default Page - the index page
	   $text_in_top = '';
	   $url_to_read = 'Include/Pages/main.html';
	   */
	   break;
	 }

	  if ($m_RtB != NULL)	
		start_html($m_Cate);
	  else					
		start_html($meta);
	  top_area();
	  second_area($text_in_top, $obj);
	  third_area($obj)
?>

     <div class="main_area">
  	  <div class="main_right">
       <? include $url_to_read; ?>
       

		<?
		 $result = mysql_query("SELECT * FROM Adv WHERE id='".biz_id."' LIMIT 1;");
		 echo mysql_result($result, 0, "space3");
		?>
	  </div>

<?
	  main_left($obj);
	  footer();
?>