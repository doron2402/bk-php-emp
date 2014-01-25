<?php 
	
	
	/* Send an Email Alert when user reach to this page */
	$to = "snir55@yahoo.com";
	$subject = "כניסה לממשק אדמין";

	$message = "
	<html>
	<head>
	<title>כניסה לממשק אדמין</title>
	</head>
	<body>
	<p>User Try Enter to Admin Panel</p>
	<table>
	<tr>
	<th>IP	:</th>
	<th>Date:</th>
	<th>Time:</th>
	</tr>
	<tr>
	<td>".$_SERVER['REMOTE_ADDR']."</td>
	<td>".date('Y-m-d')."</td>
	<td>".date('H:i:s')."</td>
	</tr>
	</table>
	</body>
	</html>
	";

	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";

	// More headers
	$headers .= 'From: <info@in10.co.il>' . "\r\n";
	$headers .= 'Cc: in10coil@gmail.com' . "\r\n";

	mail($to,$subject,$message,$headers);
	
	//error_reporting(0);
	
	require_once("Protector.class.php");
	session_unset();
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta name="robots" content="noindex, nofollow" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script type="text/javascript" src="JS/jquery.js"></script>
  <title>N 10 - Administration - אם אינך מורשה להיכנס צא מדף זה</title>
  <link href="style/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="style/layout.css" type="text/css" media="screen" />
  <script src="JS/jquery-1.5.2.min.js" type="text/javascript"></script>
  <script src="JS/hideshow.js" type="text/javascript"></script>
  <script src="JS/jquery.tablesorter.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="JS/jquery.equalHeight.js"></script>
  <script type="text/javascript" src="ckeditor/ckeditor_basic.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {
	$(".tab_content").hide(); 
	$("ul.tabs li:first").addClass("active").show(); 
	$(".tab_content:first").show(); 
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active");
		$(this).addClass("active"); 
		$(".tab_content").hide(); 

		var activeTab = $(this).find("a").attr("href"); 
		$(activeTab).fadeIn(); 
		return false;
	});
	});
    </script>

    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
	</script>
   <meta name="robots" content="noindex, nofollow" />
   <?php
   if($_GET['req'] == "Edit")
       echo ' <script src="JS/EditPage.js" type="text/javascript"></script> ';
   ?>
 <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body dir="rtl">
<!-- 
	Your Ip is Recoreded, think twice before trying login...
	<?php echo $_SERVER['REMOTE_ADDR'];?>
-->
<?php
 $protector = new Admin();
 $protector->login();
    
 if(isset($_GET['req']))
 {
  $CurrentPage = $_GET['req'];
 }
 else 
  $CurrentPage = 'Admin Panel - IN10';
 ?>
 <header id="header">
  <hgroup>
  <h1 class="site_title">
   <a href="Index" style="margin-right:5px;">Website Admin</a><a style=" margin-left:33px; float: left; display: block; margin-top:6px;">
    <img src="style/images/inten_log.png" width="67" height="40" alt="logo">
   </a>
  </h1>
  <h2 class="section_title"><?=$CurrentPage;?> </h2>
  </hgroup>
 </header> 

 <section id="secondary_bar">
  <div class="user">
   <p>Welcome Admin</p>
  </div>
  <div class="breadcrumbs_container"></div>
 </section>
        
 <aside id="sidebar" class="column">
 <hr/>

 <h3>עמוד ראשי</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="IndexIcons">ניהול עמוד ראשי</a></li>
  </ul>
 <h3>פרסומות</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="Adv">פרסומות</a></li>
  </ul>
   <h3>עסקים נבחרים</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="ChoosenBiz">עסקים נבחרים</a></li>
  </ul>
 <h3>טקסטים לקטגוריות</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="IndexPagesNames">טקסט לקטגוריות</a></li>
   <li class="icn_new_article"><a href="IndexTablesNames">טקטס בתוך הלוגו</a></li>
   <li class="icn_new_article"><a href="IndexPages">עדכון שורות לקטגוריות</a></li>
  </ul>
 <h3>תמונות לקטגוריות</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="UploadBiz">העלת תמונות</a></li>
   <li class="icn_new_article"><a href="ViewBiz">צפייה בתמונות</a></li>
   <li class="icn_new_article"><a href="OrganizeBiz">שיוך תמונות לקטגוריה</a></li>
  </ul>
 <h3>עסקים</h3>
  <ul class="toggle">
   <li class="icn_add_user"><a href="Business">עדכון עסקים</a></li>
   <li class="icn_add_user"><a href="Cat_Pages_List">המלצות, טיפים, מחירון</a></li>
   <li class="icn_add_user"><a href="Traffic_And_Converstion">צפיות ויחסי המרות</a></li>
   <li class="icn_add_user"><a href="Traffic_And_Converstion_Per_Biz">צפיות ויחסי המרות - לפי עסקים</a></li>
 </ul>
 <h3>תמונות לעסקים</h3>
  <ul class="toggle">
   <li class="icn_view_users"><a href="UploadThumbs">העלאת תמונות</a></li>
   <li class="icn_view_users"><a href="ViewThumbs">צפייה בתמונות</a></li>
 </ul>
 <h3>מדיה</h3>
  <ul class="toggle">
   <li class="icn_photo"><a href="Radio">רדיו</a></li>
   <li class="icn_audio"><a href="Music">מוזיקה</a></li>
   <li class="icn_audio"><a href="Music-Cat">מוזיקה - קטגוריות</a></li>
  </ul>
 <h3>שונות</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="footer">חלק תחתון</a></li>
   <li class="icn_new_article"><a href="takanon">תקנון</a></li>
  </ul>
  <h3>מאמרים</h3>
  <ul class="toggle">
   <li class="icn_new_article"><a href="AritcaleEdit">עריכת מאמרים קיימים</a></li>
   <li class="icn_new_article"><a href="AritcaleCreate">כתיבת מאמר</a></li>
  </ul>
 <h3>פניות</h3>
  <ul class="toggle">
   <li class="icn_view_users"><a href="Clients">פניות</a></li>
  </ul>


  </ul>
  <h3>Admin</h3>
  <ul class="toggle">
   <li class="icn_jump_back"><a href="logout.php">יציאה מהמערכת</a></li>
  </ul>

 </aside>    
 <section id="main" class="column">
<div class="clear"></div>


        <?php
        if(isset ($_GET['req']))
        {
            $request = $_GET['req'];        
            switch ($request)
            {
            case "Adv":
                echo '<article class="module width_full">';
                 include "Adv.php";
                echo '</article>';
				break;
			case "ChoosenBiz":
                echo '<article class="module width_full">';
                 include "ChoosenBiz.php";
                echo '</article>';
				break;
            case "UploadBiz":
                echo '<article class="module width_full">';
                 include "UploadBiz.php";
                echo '</article>';
				break;
            case "ViewBiz":
                echo '<article class="module width_full">';
                 include "ViewBiz.php";
                echo '</article>';
				break;
            case "OrganizeBiz":
                echo '<article class="module width_full">';
                 include "OrganizeBiz.php";
                echo '</article>';
				break;
            case "Cat_Pages_Edit":
                echo '<article class="module width_full">';
                 include "Cat_Pages_Edit.php";
                echo '</article>';
				break;
            case "Cat_Pages_List":
                echo '<article class="module width_full">';
                 include "Cat_Pages_List.php";
                echo '</article>';
				break;
			case "Traffic_And_Converstion":
                echo '<article class="module width_full">';
                 include "Traffic_And_Converstion.php";
                echo '</article>';
				break;
			case "Traffic_And_Converstion_Per_Biz":
                echo '<article class="module width_full">';
                 include "Traffic_And_Converstion_Per_Biz.php";
                echo '</article>';
				break;
            case "IndexPagesNames":
                echo '<article class="module width_full">';
                 include "IndexPagesNames.php";
                echo '</article>';
				break;
            case "IndexTablesNames":
                echo '<article class="module width_full">';
                 include "IndexTablesNames.php";
                echo '</article>';
				break;
            case "UploadThumbs":
                echo '<article class="module width_full">';
                 include "UploadThumbs.php";
                echo '</article>';
				break;
            case "ViewThumbs":
                echo '<article class="module width_full">';
                 include "ViewThumbs.php";
                echo '</article>';
				break;
            case "IndexIcons":
                echo '<article class="module width_full">';
                 include "IndexIcons.php";
                echo '</article>';
				break;
            case "EditIcons":
                echo '<article class="module width_full">';
                 include "EditIcons.php";
                echo '</article>';
				break;
            case "footer":
                echo '<article class="module width_full">';
                 include "footer.php";
                echo '</article>';
				break;
            case "takanon":
                echo '<article class="module width_full">';
                 include "takanon.php";
                echo '</article>';
				break;
			case "AritcaleEdit":
                echo '<article class="module width_full">';
                 include "articale_edit.php";
                echo '</article>';
				break;
			case "AritcaleCreate":
                echo '<article class="module width_full">';
                 include "articale_create.php";
                echo '</article>';
				break;
            case "Music-Cat":
                echo '<article class="module width_full">';
                 include "Music-Cat.php";
                echo '</article>';
				break;
            case "Clients":
                echo '<article class="module width_full">';
                 include "Clients.php";
                echo '</article>';
                break;
            case "Music":
                echo '<article class="module width_full">';
                include "Music.php";
                echo '</article>';
                break;
            case "Business":
                echo '<article class="module width_full">';
                 if (isset ($_GET['Type']))
                {
                    $type = $_GET['Type'];
                    $html = $protector->GetBussinessType($type);
                    echo $html;
                }
                else
                {
                    $html = $protector->MainBusinessPages();
                    echo $html;
                }  
                echo '</article>';
                break;
            case "Edit":
                if (isset($_GET['Id']))
                {
                  require_once 'Edit.php';
                    $edit = new Edit($_GET['Id']);
                    $edit->EditPage();
                }
                else
                {
                 $protector-> FetchBusiness();  
                }
                break;
             case "IndexPages":
                  echo '<article class="module width_full">';
                 echo $protector->FetchIndexPages();
                 echo '</article>';
                 break;
             case "IndexEdit":
                 require_once 'Edit.php';
                 $IndexBiz = new Edit($_GET['Id']);
                 $IndexBiz->EditIndexPages();
                 break;
           case "Radio":
                echo '<article class="module width_full">';
                require_once 'Edit.php';
                $radio = new Edit();
                if (isset ($_GET['Edit']))
                {$radio->EditRadioStation($_GET['Edit']);}
                else{echo $radio->GetRadioStation();}
                echo '<article>';
                break;
           case "Index":
                echo '<article class="module width_full">';
                 include "Clients.php";
                echo '</article>';
               break;
           default :
                echo '<article class="module width_full">';
                 include "Clients.php";
                echo '</article>';
                break;
            }
        }
        else
        { 
                echo '<article class="module width_full">';
                 include "Clients.php";
                echo '</article>';
		}
            
        ?>     
                
 </section>
    
</body>   
</html>