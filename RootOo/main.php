<?php

class Main
{
private $_mysqlServer = 'localhost';
private $_mysqlUser = 'root';
private $_mysqlPass = 'root';


    public function __construct()
    {
        $this->connectMysql();
    }
    
    public function insertClient($name,$phone,$email,$body,$id,$compTitle)
    {
        $query = "INSERT INTO Clients (Name,Cell,Email,Message,Date,CompanyTitle,CompanyId) 
            VALUES ('".$name."','". $phone ."','". $email ."','". $body."',CURDATE(),'". $compTitle ."','". $id ."');";

    }
    
    protected function conntectMysql()
    {
        $link = mysql_connect($this->_mysqlServer, $this->_mysqlUser, $this->_mysqlPass);  
          if (!$link) {
                die('Could not connect: ' . mysql_error());
          }

          $db_select = mysql_select_db($this->_mysqlDB, $link);
          if (!$db_select)
          {
              die("Cant use ". $this->_mysqlDB .'  '. mysql_error());
          }
    }
}

?>
