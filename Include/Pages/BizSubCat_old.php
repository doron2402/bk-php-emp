
	/*
	// ------------------------------------
		old code - when more than 1 child
	// ------------------------------------
	else 
    {
        $child ='0'.$row_biz['Child'];
        $query = "SELECT * FROM IndexTables WHERE Id > ". $row_biz['Id']."00 AND Id < ".($row_biz['Id']+1)."00;";
        $result = mysql_query($query);
        $i = 1;
        while ($row = mysql_fetch_object($result) )
                {
                       $Zip_Text_02 = explode(',', $row->T02);
                       $Zip_Text_03 = explode(',', $row->T03);
                       $Zip_Text_04 = explode(',', $row->T04);
                       $Zip_Text_08 = explode(',', $row->T08);
                       $Zip_Text_09 = explode(',', $row->T09);
                       echo '<div class="subcat_main_heading_small"><!-- Child Bussiness Page -->'.$row->Title.'</div>';
                       GetIndexTables($row_biz['Id'], "0$i","02",$Zip_Text_02);
                       GetIndexTables($row_biz['Id'], "0$i","03",$Zip_Text_03);
                       GetIndexTables($row_biz['Id'], "0$i","04",$Zip_Text_04);
                       GetIndexTables($row_biz['Id'], "0$i","08",$Zip_Text_08);
                       GetIndexTables($row_biz['Id'], "0$i","09",$Zip_Text_09);
                       $i++;
                }      
    } */
