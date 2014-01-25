<?

/*
                                                                 
        #####  #                               ###               
     ######  /                                  ###              
    /#   /  /                                    ##              
   /    /  /                                     ##              
       /  /                                      ##              
      ## ## ### /### /###       /###     /###    ##      /###    
      ## ##  ##/ ###/ /##  /   / ###  / / ###  / ##     / ###  / 
    /### ##   ##  ###/ ###/   /   ###/ /   ###/  ##    /   ###/  
   / ### ##   ##   ##   ##   ##    ## ##    ##   ##   ##    ##   
      ## ##   ##   ##   ##   ##    ## ##    ##   ##   ##    ##   
 ##   ## ##   ##   ##   ##   ##    ## ##    ##   ##   ##    ##   
###   #  /    ##   ##   ##   ##    ## ##    ##   ##   ##    ##   
 ###    /     ##   ##   ##   ##    ## ##    /#   ##   ##    /#   
  #####/      ###  ###  ###  #######   ####/ ##  ### / ####/ ##  
    ###        ###  ###  ### ######     ###   ##  ##/   ###   ## 
                             ##                                  
                             ##                                  
                             ##                          Made by: impala.co.il 
                              ##                         Php code: RtB
														 add new esek - only RtB
*/

	// SQL
	define("Dbhost", "localhost");
	define("Dbuser", "impala_in10");
	define("Dbpass", "19191919");
	define("Dbname", Dbuser);

	// Connect/Discconnect to SQL
	function opensql() { mysql_connect(Dbhost,Dbuser,Dbpass); mysql_select_db(Dbname); mysql_query("SET NAMES 'utf8'"); }
	function closesql() { mysql_close(); }
		  
	opensql();

		
		// Get last row
		$result	= mysql_query("SELECT * FROM IndexPages ORDER BY Id DESC;");
			$last_row = mysql_result($result, 0, "Id");
				$last_row++;

		// insert into IndexPages
		mysql_query ("INSERT INTO `impala_in10`.`IndexPages` ( `Id` , `Title` , `Name` , `Link` ,`Child` , `Main`, `image` ) 
		VALUES ( '".$last_row."', '".$last_row."', 'ממתין', 'Biz&Biz=".$last_row."', '0', '0', '');");

		// insert into IndexTables
		mysql_query ("INSERT INTO `impala_in10`.`IndexTables` ( `Id`,`Title`,`T02`,`T03`,`T04`,`T08`,`T09`,`Child` ) 
		VALUES ( '".$last_row."', '', '', '','','','','0');");

		// insert into Cat_Pages
		mysql_query ("INSERT INTO `impala_in10`.`Cat_Pages` ( `id`,`text1`,`text2`,`text3` ) 
		VALUES ( '".$last_row."', '', '', '');");

		// insert into Adv
		mysql_query ("INSERT INTO `impala_in10`.`Adv` ( `id` ) VALUES ( '".$last_row."');");

		// add to pages
		$area[0] = '02';
		$area[1] = '03';
		$area[2] = '04';
		$area[3] = '08';
		$area[4] = '09';

		for ($z=0;$z<5;$z++)
		{
			for ($i=0;$i<10;$i++)
			{
				$string = ''.$last_row.'00'.$area[$z].'0'.$i.'';
					$result	= mysql_query("SELECT * FROM `Pages` WHERE ID='".$string."' LIMIT 1;");
						$check = mysql_num_rows($result);

						if ($check == 0)
						{
							mysql_query ("INSERT INTO `impala_in10`.`Pages` ( `Id` ) VALUES ( '".$string."');");
						}
			}
		}

	closesql();

?>