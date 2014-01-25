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
				$Menu[1] = '<a href="About"><li class="Current">מי אנחנו?</li>';
				break;
			case 'signup':
				$Menu[2] = '<a href="SignUp"><li class="Current">הצטרפות בעלי מקצוע</li>';
				break;
			case 'articales':
				$Menu[3] = '<a href="Articales"><li class="Current">מאמרים</li>';
				break;
			case 'contact':
				$Menu[4] = '<a href="Contact"><li class="Current">צור קשר</li>';
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

        $this->id = ((int)($id));
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
			$query = "SELECT * FROM `IndexPages` WHERE Name!='ממתין' ORDER BY Name ASC";
            $result = mysql_query($query);
			$i=0;
			while ($row = mysql_fetch_assoc($result))
			{
				$Biz[$i] = $row;
				$i++;
			}		
			
			return $Biz;
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
        
}

?>


