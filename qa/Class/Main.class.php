<?php	
//Site Variable
define("DOMAIN",'in10.co.il');


//mysql Cardential
define("MYSQL_USER","buycoil_In10User");
define("MYSQL_SERVER","localhost");
define("MYSQL_PASS", "1q2w3e4r!@");
define("MYSQL_DB", "buycoil_In10");

class Main
{
    public $Business = array();
    public $BusinessLink = array();
    public $BizPage = array();
    
    protected $BizId;
    protected $BizTitle;
    protected $weather;
    
    
    protected $AdminEmail = "admin@in10.co.il";
    protected $id;

	
	protected $City02 = array('אבו גוש','בית שמש','ביתר עלית','ירושלים','מעלה אדומים','נווה אילן');
	protected $City03 = array('אור יהודה','אזור','אריאל','בארות יצחק',
							'בני ברק','בת ים','גבעת שמואל','גבעתיים','גני תקווה','חולון','יהוד','יפו',
							'כפר קאסם','משמר השבעה','נחשונים','סביון','פתח תקווה','קרית אונו','ראש העין','ראשון לציון',
							'רמת אפעל','רמת גן','רמת השרון','שוהם','תל אביב');
	protected $City04 = array('אום אל פחם','אור עקיבא','בית שאן','זכרון יעקב','חדרה','חיפה','חצור הגלילית',
								'טבריה','טירת הכרמל','יקנעם','כפר גת','כפר קרע','כרמיאל','מגדל העמק','מגידו',
								'מעלות','נהריה','נצרת','נצרת עלית','נשר','עין גב','עכו','עפולה','עתלית','פרדס חנה-כרכור',
								'צפת','קצרין','קרית אתא','קרית ביאליק','קרית חיים','קרית טבעון','קרית ים','קרית מוצקין',
								'קרית שמונה','ראש פינה','רמת ישי','שפרעם');
	protected $City08 = array('אופקים','אילת','אשדוד','אשקלון','באר יעקב','באר שבע','בית עובד',
								'גבעת ברנר','גדרה','גן יבנה','דימונה','חצרים','יבנה','ירוחם','להבים','לוד','מודיעין',
								'מזכרת בתיה','מצפה רמון','נהורה','ניר צבי','נס ציונה','נתיבות','עין גדי','ערד',
								'קרית גת','קרית מלאכי','קרית עקרון','רהט','רחובות','רמלה','שדרות');
	protected $City09 = array('אבן יהודה','אלפי משנה','בצרה','בת חפר','הוד השרון','הרצליה','טייבה','טירה','כפר יונה','כפר סבא','מכמורת','ניצני עוז','נתניה','פרדסיה','צור משה',
								'צורן','קדימה','קלנסוואה','רמת פולג','רעננה','שפיים','תל יצחק','תל מונד');
	
    public function __construct() {
        $this->ConnectMysql();
        //$this->getBusinessName();
        
    }
	
	public function getMainMenu($CurrentPage)
	{
		$Menu = array(
		'<a href="http://www.in10.co.il"><li class="NoCurrent">עמוד הבית</li></a>',
		'<a href="About"><li class="NoCurrent">מי אנחנו?</li></a>',
		'<a href="SignUp"><li class="NoCurrent">הצטרפות בעלי מקצוע</li></a>',
		'<a href="Articales"><li class="NoCurrent">מאמרים</li></a>',
		'<a href="Contact"><li class="NoCurrent">צור קשר</li></a>',
		);
		$CurrentPage = strtolower($CurrentPage);
		switch($CurrentPage)
		{
			case 'index':
				$Menu[0] = '<a href="http://www.in10.co.il"><li class="Current">עמוד הבית</li></a>';
				break;
			case 'about':
				$Menu[1] = '<a href="About"><li class="Current">מי אנחנו?</li></a>';
				break;
			case 'signup':
				$Menu[2] = '<a href="SignUp"><li class="Current">הצטרפות בעלי מקצוע</li></a>';
				break;
			case 'articales':
				$Menu[3] = '<a href="Articales"><li class="Current">מאמרים</li></a>';
				break;
			case 'contact':
				$Menu[4] = '<a href="Contact"><li class="Current">צור קשר</li></a>';
				break;
			default:
				$Menu[0] = '<a href="http://www.in10.co.il"><a href="http://www.in10.co.il"><li class="Current">עמוד הבית</li></a>';
				break;
		}
		
		return $Menu;
	}

	
    //Mysql Connect
    protected function ConnectMysql()
    {
        $link = mysql_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS);  
          if (!$link) {
                die('Could not connect: ' . mysql_error());
          }

          $db_select = mysql_select_db(MYSQL_DB, $link);
          if (!$db_select)
          {
              die("Cant use ". MYSQL_DB .'  '. mysql_error());
          }
		  
		  mysql_query("SET NAMES 'utf8'");
    }     

    //Getting the Business ID
    public function SetTitlePage($name)
    {
      $this->BizTitle = (mysql_real_escape_string($name));
      return $this->GetRequestPageDB();
      
    }
    
    protected function GetRequestPageDB()
    {
        $query = "SELECT * FROM IndexPages WHERE Title = '". $this->BizTitle."';";
        $result = mysql_query($query);    
        $row = mysql_fetch_assoc($result);
        $this->BizId = $row['Id'];
        return $row;
    }

	/*
		return city and their code
	*/
	public function getCityAndCode()
	{
		foreach($this->City02 as $City)
		{
			echo '<option value="02">'.$City.'</option>';
		}
	
		foreach($this->City03 as $City)
		{
			echo '<option value="03">'.$City.'</option>';
		}
		
		foreach($this->City04 as $City)
		{
			echo '<option value="04">'.$City.'</option>';
		}
		
		foreach($this->City08 as $City)
		{
			echo '<option value="08">'.$City.'</option>';
		}
		
		foreach($this->City09 as $City)
		{
			echo '<option value="09">'.$City.'</option>';
		}
	}
	
	
    public function GetMetaPage($id)
    {
        $id = (int)$id;
        $query = "SELECT * FROM Pages WHERE Id = '". $id ."';";
        $result = mysql_query($query);
        $row = mysql_fetch_assoc($result);
        return $row;
    }
    
	/*
		getPageRow(Bussiness Id) , return the business row from the page table
		Get Page Information
	*/
	public function getPageRow($BizId)
	{
		$BizId = (int)$BizId;
		$query = "SELECT * FROM Pages WHERE Id = ". $BizId .";";
        $result = mysql_query($query);
		   if($result)
		   {
				$row = mysql_fetch_assoc($result);
		   }
		   else
		   {
				$row = $result;
		   }
	
        return $row;
	}
	
	
    public function GetWeather()
    {
        $this->weather();
        return $this->weather;
    }

        //Fetching Business Page into array
    public function GetBizPage($id)
    {

        $this->id = $id;
        $r = $this->FetchPageDB();
        return $r;       
    }
    
    protected function FetchPageDB()
    {
      $query = "SELECT * FROM Pages WHERE Id = '". $this->id ."';";
      $result = mysql_query($query);
      $row = mysql_fetch_object($result);
      return $row;
    }
    
    //Getting Index Pages According Index Requested
    
    
    public function getBusinessName()
    {

        $result		= mysql_query("SELECT * FROM IndexPages WHERE Name!='ממתין' ORDER BY Name ASC;");
		$total		= mysql_num_rows($result);
        
		for ($i=0;$i<$total;$i++)
		{
			$name = mysql_result($result, $i, "Name");
			$link = mysql_result($result, $i, "Link");
			$this->Business[] = array("Name" => $name, "Link" => $link); //Array that contains[biz_name => Link]
		}
       
    }
   
    //Save the user information from the contact us
   public function SaveClientRequest($name,$cell,$email,$body,$compTitle,$compId)
    {
       $query = "INSERT INTO Clients (Name,Cell,Email,Message,Date,CompanyTitle,CompanyId) 
                    VALUES ('$name','$cell','$email','$body',CURDATE(),'$compTitle','$compId');";
        $result = mysql_query($query);
         if (!$result){
             mail($this->AdminEmail, 'Error Enter Client to the System', 'Problem on entering user '. $name , ' email: '. $email . ' To the system!');
         } 
        return;
    }
    
    public function currency($from_Currency,$to_Currency,$amount)
        {
                $amount = urlencode($amount);
                $from_Currency = urlencode($from_Currency);
                $to_Currency = urlencode($to_Currency);
                $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
                $ch = curl_init();
                $timeout = 0;
                curl_setopt ($ch, CURLOPT_URL, $url);
                curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
                curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $rawdata = curl_exec($ch);
                curl_close($ch);
                $data = explode('"', $rawdata);
                $data = explode(' ', $data['3']);
                $var = $data['0'];
                return round($var,2);
        }

        
        public function weather()
        {
            $rss_link = "http://weather.yahooapis.com/forecastrss?p=ISXX0025&u=c";
            $weather_feed = file_get_contents($rss_link);
            $weather = simplexml_load_string($weather_feed);
            if(!$weather) 
            {
                return $this->weather = ('weather failed');
            }
            $copyright = $weather->channel->copyright;

            $channel_yweather = $weather->channel->children("http://xml.weather.yahoo.com/ns/rss/1.0");

            foreach($channel_yweather as $x => $channel_item) 
                    foreach($channel_item->attributes() as $k => $attr) 
                            $yw_channel[$x][$k] = $attr;

            $item_yweather = $weather->channel->item->children("http://xml.weather.yahoo.com/ns/rss/1.0");

            foreach($item_yweather as $x => $yw_item) 
            {
                    foreach($yw_item->attributes() as $k => $attr) {
                            if($k == 'day') $day = $attr;
                            if($x == 'forecast') { $yw_forecast[$x][$day . ''][$k] = $attr;	} 
                            else { $yw_forecast[$x][$k] = $attr; }
                    }
            }



            $this->weather = ' תל אביב, '.$yw_channel['wind']['chill'][0]. ' C';
        }

		/*
			Get All Business Category
		*/
        public function getAllBiz()
		{
			$query = "SELECT * FROM `IndexPages` WHERE Name!='ממתין' order by rand();";
            $result = mysql_query($query);
			$i=0;
			while ($row = mysql_fetch_assoc($result))
			{
				$Biz[$i] = $row;
				$i++;
			}		
			
			return $Biz;
		}
		
		/*
			getOptionCategory
		*/
		public function getOptionCategory()
		{
			$Sql = "SELECT Title,Name FROM IndexPages WHERE Name!='ממתין' ORDER BY Name ASC;";
			$Result = mysql_query($Sql);
			while($Row = mysql_fetch_assoc($Result))
			{
				$BizCatArr[$Row['Title']]=$Row['Name'];
			}
			return $BizCatArr;
		}
		
		/*
			Get List of Business according their title
		*/
		public function getCategoryBiz($Title)
		{
			$Title = mysql_real_escape_string($Title);
			$query = "SELECT * FROM IndexPages WHERE Title = '". $Title."';";
			$result = mysql_query($query);    
			$row = mysql_fetch_assoc($result);
			return $row;
		}
		
	
		/*
			Get Area Tables
		*/
		public function getBizAreaTable($Id)
		{
			$Id = (int)$Id;
			$Query = "SELECT * FROM `IndexTables` WHERE Id = ".$Id." LIMIT 1;";
			$result = mysql_query($Query);
			/*
			if(!$result)
			{
				echo mysql_error();
			}
			*/
			$row = mysql_fetch_assoc($result);
			return $row;
		}
		
		
        public function FetchBizIndexPages()
        {

            $query = "SELECT * FROM `IndexPages` WHERE Name!='ממתין' ORDER BY Name ASC";
            $result = mysql_query($query);
            $i = 1;
            $html = '';
            while ($row = mysql_fetch_assoc($result)) 
                    {
                        if($i == 1)
                        {
                            $html .= '<div class="main_inner_table_row"><div class="inner_row_tab"><ul>';                        
                        }
                        
                        $html .= '<li><a href="Biz&Biz='. $row['Title'] .'"><img src="images/Biz/'. $row['image'] .'" alt="logo" width="97" height="74" border="0" />';
                        $html .= '</a><a href="Biz&Biz='. $row['Title'] .'" target="_blank" style="text-align:center; margin:0; font-size:11px; color:#000; display:block; width:110px; height:18px; font-weight:bold;">'. $row['Name'] .'</a></li>';  
                        
                        if($i % 6 == 0 && $i != 0)
                        {
                           $html .= '</ul></div></div>';
                           $html .= '<div class="main_inner_table_row"><div class="inner_row_tab"><ul>';                        

                        }
                        $i++;
                     }
                 
                     return $html;
        }

        

        public function GetIndexTable()
        {
            //$this->BizId;
            $query = "SELECT * FROM IndexTables WHERE Id='". $this->BizId."';";
            $result = mysql_query($query);
             
            while ($row = mysql_fetch_assoc($result)) 
                {
                    $IndexTable =  array("Id" => $row['Id'], 
                        "Title" => $row['Title'],
                        "T02" => $row['T02'],
                        "T03" => $row['T03'],
                        "T04" => $row['T04'],
                        "T08" => $row['T08'],
                        "T09" => $row['T09'],
                        );
                }
           
            
                return $IndexTable;
        }
        
	public function SetTrafficPerBiz()
	{
		//$this->BizId - Business Id
		$QueryTraffic = "UPDATE IndexPages SET Traffic = Traffic +1 WHERE Id = ".$this->BizId.";";
		$ResultTraffic = mysql_query($QueryTraffic);
		if($ResultTraffic)
			return true;
		else
			return false;
	}
	
	public function getContactPage()
	{
		$QueryContactPage = "SELECT * FROM Posts WHERE Name = 'Contact'";
		$ResultContactPage = mysql_query($QueryContactPage);
		if($ResultContactPage)
			{
				$Row = mysql_fetch_assoc($ResultContactPage);
				return $Row;
			}
		else
			return false;
	}
	
	public function getArticalesPage()
	{
		
		$QueryArticalesPage = "SELECT * FROM Articales;";
		$ResultArticalesPage = mysql_query($QueryArticalesPage);
		if($ResultArticalesPage)
		{
			$i = 0;
			while($Row = mysql_fetch_assoc($ResultArticalesPage))
			{
				$Articales[$i]['Name'] = $Row['Name'];
				$Articales[$i]['Link'] = $Row['Link'];
				$Articales[$i]['Content'] = $Row['Content'];
				$i++;
			}
			return $Articales;
		}
		else
			return false;
	
	}
	
	public function getSpecificArticale($Link)
	{
		$Link = mysql_real_escape_string($Link);
		$QueryArticalesPage = "SELECT * FROM `Articales` WHERE `Link` = '".$Link."' LIMIT 1";
		$ResultArticalesPage = mysql_query($QueryArticalesPage);
		if($ResultArticalesPage)
		{
			$Row = mysql_fetch_assoc($ResultArticalesPage);
			return $Row;
		}
		else
			return false;
	}
      
	protected $AreaCode = array("02" => "ירושלים והסביבה",
								"03" => "מרכז",
								"04" => "צפון",
								"08" => "דרום",
								"09" => "שרון והסביבה");
	public function ShowAreaLinks()
	{
		foreach($this->AreaCode as $Num => $Val)
		{
			echo '<option value="'.$Num.'">'.$Val.'</option>';
			//echo '<a href="#'.$Num.'">'.$Val.'</a>';
		}
		
	}
	
	/*
		Print business according their location based
	*/	
	public function ShowAreaJob($Area,$Num,$BizId)
	{
		$BizId = (int)$BizId;
		if($BizId < 10)
		{
			$BizId = '0' . $BizId;
		}

		echo '<div id="AreaNumber">';
		echo '<div id="HeadlineAreaNumber"><a name="'.$Num.'">';
		echo 'אזור '. $this->AreaCode[$Num];
		echo '</a></div>';
		echo '<div id="BusinessAreaNumber">';
		$i = 0;
		$g = 0;
		echo '<ul>';
		foreach ($Area as $Biz)
		{
			if ($Area[$i] != '')
			{
				$BizData[$g] = '<li class="'.$BizId.'00'.$Num.'0'.$i.'">
					<p style="background-color: #f8cea8;padding:7px 8px;">
					<a onClick="GetBizPage(\''.$BizId.'00'.$Num.'0'.$i.'\');" >'.$Area[$i].'</a>
					<a style="float:left;margin-left:30px;" onClick="GetBizPage(\''.$BizId.'00'.$Num.'0'.$i.'\');" >לפרטים <img src="../images/Main/ArrowOrange.png"></a>
					</p>
					</li>';
				$i++;
				$g++;
			}
		}
		shuffle($BizData);
		foreach($BizData as $Val)
		{
			echo $Val;
		}
		echo '</ul>';
		echo '</div>';
		echo '<br />';
		echo '</div>';
	
	}
	
	public function getBizHeader($Biz)
	{
		$Biz = mysql_real_escape_string($Biz);
		$QueryHeader = "SELECT * FROM `IndexPages` WHERE Title ='".$Biz."' LIMIT 1";
		$ResultHeader = mysql_query($QueryHeader);
		if (!$ResultHeader)
		{
			echo mysql_error();
		}
		$RowHeader =  mysql_fetch_assoc($ResultHeader);
		return $RowHeader;
	}
	
	/*
		function will return an array with link and business name for each of the chosen ones
	*/
	public function getTopSideBiz()
	{
		$Query = "SELECT * FROM ChosenBusiness;";
		$Result = mysql_query($Query);
		return $Result;
	}
	
	
	
	/*
		$Seccuess = $ContactBiz->SaveContactDetails($Name,$Email,$Phone,$Msg,$BizId);
	*/
	public function SaveContactDetails($Name,$Email,$Phone,$Msg,$BizId)
	{
	
	  $Query = "INSERT INTO Clients (Name,Cell,Email,Message,Date,CompanyId) VALUES ('$Name','$Phone','$Email','$Msg',CURDATE(),'$BizId');";
	  $Result = mysql_query($Query);
	  return $Result;
	}
	
}

?>