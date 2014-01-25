<?php

/*
	Admin Class
	
	Mysql:
		user,password,in10db - Mysql cardential
	Administrator Cardential:
		in10admin, in10pass
	

*/


class Admin
{    
    private $password = '1q2w3e4r!@';
    private $user = 'buycoil_In10User';
    private $in10db = 'buycoil_In10';
    
    public $Title = 'IN 10 - Administration - אם אינך מורשה להיכנס צא מדף זה ';

    private $in10admin = 'SnirShi';
    private $in10pass = 'in10123456';

    protected $result;
   
    public function __construct() 
    {
        $this->DBconnect();
    }
    function showLoginForm(){
              ?>
            <body>
                   <div id="container">
                        <div id="header"><div id="header_left"></div>
                        <div id="header_main"></div><div id="header_right"></div></div>
                        <div id="content">
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                 <center>
								   <table>
								    <tr><td>User:</td><td><input name="name" type="text"  size="20"/></td>
								    <tr><td>Password:</td><td><input name="passwd" type="password"  size="20"/></td>
									<tr><td></td><td align="left"><input type="submit" name="submitBtn" class="sbtn" value="Login" /></td></tr>
 								   </table>
                                 </center>
                             </form>
                         </div>
                         <div id="footer">Powered By Impala System Ltd</div>
                     </div>
            </body>		 
        <?php
    }

    public function login()
    {
		$loggedin = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
        if ( (!isset($_POST['submitBtn'])) && (!($loggedin))){
            $_SESSION['loggedin'] = false;
			   $this->showLoginForm();
			   exit();
        } else if (isset($_POST['submitBtn'])) {
			   $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
      			$user = isset($_POST['name']) ? $_POST['name'] : '';
			   if ($pass != $this->in10pass || $user != $this->in10admin) {
				   $_SESSION['loggedin'] = false;
				   $this->showLoginForm();
				   exit();     
			   } else if ($pass == $this->in10pass && $user == $this->in10admin) {
				   $_SESSION['loggedin'] = true;
			   }
        }

    }
    
    public function Logout()
    {
        session_destroy();
    }
    
    public function DBconnect()
    {
        $link =  mysql_connect('localhost', $this->user, $this->password);
        if (!$link) {die('Could not connect: ' . mysql_error());}
        $db_selected = mysql_select_db($this->in10db, $link);
		mysql_query("SET NAMES 'utf8'");
    }
    protected function GetUsers()
    {
        $query = "SELECT * FROM Clients ORDER BY Id DESC";
        $this->result = mysql_query($query);
    }
    

    public function MainPage()
    {
        $html = '<article class="module width_full">
		<header><h3 class="tabs_involved">ברוך הבא למנערכת ניהול התוכן של אתר in10.co.il</h3></header>
		 
		<div style="padding:20px;">
		התפריט בצד ימין.. :)
		</div>
		</article>';
        return $html;
    }
    
    public function FetchBusiness()
    {
        $query = "SELECT * FROM Pages;";
        $result = mysql_query($query);
        echo '<ul><p> דפי עסק </p>';
        while ($row = mysql_fetch_object($result)) 
        {
         echo '<a href="Edit&Id='.$row->Id .'"><li> ID: '. $row->Id .'</a>,   Name: '. $row->Name .',    Title: '. $row->Title .',   Contact Name: '. $row->ContactName .', Contact Phone: '. $row->ContactPhone .'</li>';
        }
            echo '</ul>';
     }
     
     public function GetBussinessType($t)
     {

		 // -----------------------------------------
		 // http://in10.co.il/Admin/Business&Type=
		 // -----------------------------------------

         $t = $t;
         $q = "SELECT * FROM IndexTables WHERE Id = ". $t .";";
         $r = mysql_query($q);
         $row_category = mysql_fetch_assoc($r);
         
         $html .= '<header><h3 class="tabs_involved">
		  <table width="100%" cellpadding="0" cellspacing="0">
		   <tr>
		   <td align="right">עסקים לפי קידומות - '. $row_category['Title'] .' - בחר את העסק שברצונך לעדכן.</td>
		   <td align="left"> <a href="javascript: history.go(-1)">» חזור אחורה</a></td>
		   </tr></table>
		  </h3></header>';

         $html .= '<div class="tab_container"><div id="tab1" class="tab_content">';
         $query = "SELECT * FROM Pages WHERE Id >= ". $t."000000 AND Id < ".$t."999999 LIMIT 50;";
         $result = mysql_query($query);
		 $total = mysql_num_rows($result);
		
		 $i = 0;
         while ($row = mysql_fetch_object($result)) 
             {  
                if (substr($row->Id, -1,1) == 0)
                {
                    $html .= '<div class="main_inner_table_row"><div class="row_heading_sub"><a href="#">'. substr($row->Id, -4, -2).'</a></div>';
					$html .= '<div class="row_tab_sub"><ul><div style="padding-top:7px;"></div>';

                }
                
				if ($row->Name == NULL) $row->Name = 'ריק';
                $html .='
	
				<a style="display: block; height: 30px; width: 60px; float: right; text-align: center; background-color: #f6f6f7; border: 1px solid #c6c6c6; border-radius:1px; color: #414042; font-size: 10px; font-weight: bold;" href="Edit&Id='. $row->Id .'">'. $row->Name .'</a></li>';
							
                if (substr($row->Id, -1,1) == 9)
                {
                      $html .= '</ul></div></div>';
                }

             }
         
         
         $html .= '</div></div>';
         return $html;
     }

     public function GetMusic()
     {
		 echo '<header><h3>מוזיקה באתר in10</h3></header>';
         $query = "SELECT * FROM Music ORDER BY Position;";
         $result = mysql_query($query);
         while ($row = mysql_fetch_object($result)) 
             {

				echo '
				<form action="Ajax/SetMusic.php" METHOD="POST">
				מיקום #'. $row->Position .'
                <table>
				<tr>
				 <td>שם השיר</td>
                 <td><input type="hidden" name="SongPosition" value="'.$row->Position.'" /> 
                 <input type="text" name="SongName" size="60" value="'. $row->Name .'" /></td>
				</tr>
                <tr>
				 <td>קישור</td>
				 <td><input type="text/javascript" name="SongLink" size="60" value="' . $row->Link .'"></td>
				</tr>    
                <tr>
				 <td></td>
				 <td align="left"><input type="submit" value="שמור שינויים" ></td>
				</tr>
			    </table>
                </form>';
             }

     }


     public function MainBusinessPages()
     {

        echo '
		<header><h3>עדכון עסקים - לחץ על הקטגוריה המבוקשת.</h3></header>
		<div class="module_content"><ul>
		<table cellpadding="5" cellspacing="5"><tr><td valign="top">';

        $query = mysql_query("SELECT * FROM IndexPages ORDER BY Name ASC;");
		$total = mysql_num_rows($query);
		for ($i=0;$i<$total;$i++)
		{
			$id = mysql_result($query, $i, "Id");
			$name = mysql_result($query, $i, "Name");
			//$child = mysql_result($query, $i, "Child");
			
				echo ''.$id.' <a href="Business&Type='.$id.'">'.$name.'</a><br>';
				$l = $i+1;
				if ($l%20 == 0) echo '</td><td valign="top">';
		}
		echo '</td></tr></table><br><br></ul></div>';
     }


     public function FetchIndexPages()
     { 

        echo '
		<header><h3>עדכון שמות לעסקים בקטגוריות</h3></header>
		<div class="module_content"><ul>
		<table cellpadding="5" cellspacing="5"><tr><td valign="top">';

        $query = mysql_query("SELECT * FROM IndexTables ORDER BY Title ASC;");
		$total = mysql_num_rows($query);
		for ($i=0;$i<$total;$i++)
		{
			$id = mysql_result($query, $i, "Id");
			$name = mysql_result($query, $i, "Title");
			$child = mysql_result($query, $i, "Child");

				echo ''.$id.' <a href="IndexEdit&Id='.$id.'">'.$name.'</a><br>';

			$l = $i+1;
			if ($l%20 == 0) echo '</td><td valign="top">';
		}

		echo '</td></tr></table><br><br></ul></div>';

     }
     
     
}



?>
