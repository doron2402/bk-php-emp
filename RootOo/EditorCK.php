<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
//Editing Text using CKEditor

class CKEditor
{
    private $_Id;
    private $_Text;
    private $_Field;
    private $_Table;
    
    public function __construct($id,$text,$table,$field) 
    {
        $this->_Id = mysql_real_escape_string($id);
        $this->_Text = $text;
        $this->_Table = mysql_real_escape_string($table);
        $this->_Field = mysql_real_escape_string($field);
        
        
    }
    
    public function GetId()
    {
        return $this->_Id;
    }
    
    public function GetText()
    {
        return $this->_Text;
    }
    
    public function GetField()
    {
        return $this->_Field;
    }
    
    public function GetTable()
    {
        return $this->_Table;
    }
    
    
    
    
}

$CK = new CKEditor($_POST['Id'], $_POST['Text'] , $_POST['Table'], $_POST['Field']);

define("CKTITLE", "CK-Editor" );
?>

    <head>
        <title><?=CKTITLE;?></title>
        <script type="text/javascript" src="JS/jquery-1.5.2.min.js"></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript">
	window.onload = function()
	{
		CKEDITOR.replace( 'editor1' );
	};
</script>
    </head>
    
    <body>
        <form class="CKEditor" method="POST">
        <textarea id="editor1" name="Text"><?=$CK->GetText();?></textarea>
        <input type="hidden" name="Id" value="<?=$CK->GetId();?>" />
        <input type="hidden" name="Table" value="<?=$CK->GetTable();?>" />
        <input type="hidden" name="Field" value="<?=$CK->GetField();?>" />
        <input type="submit" value="Save"></input>
        </form>
        
      <Button ONCLICK="history.go(-1)">Go Back</Button>
    </body>
    
</html>
