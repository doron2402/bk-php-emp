<header><h3 class="tabs_involved">צפייה בתמונות של קטגוריות עסקים</h3></header>

<div style="margin:20px;">
<table>
 <tr>

<?

	$up_directory = "../images/Biz/";

	if($HTTP_GET_VARS['dir'] != NULL) {	$up_directory = ".".$HTTP_GET_VARS['dir'].""; $up_directory = str_replace("//", "/", $up_directory); }

		$myDirectory = opendir($up_directory);
		while($entryName = readdir($myDirectory)) {	$dirArray[] = $entryName; } closedir($myDirectory);

		$indexCount	= count($dirArray); sort($dirArray);

		$files = ''; $dirs = '';
		for($index=0; $index < $indexCount; $index++) {
		 if (substr($dirArray[$index], 0, 1) != ".")
		  {

			$type = filetype("".$up_directory."/".$dirArray[$index]."");
			$name = $dirArray[$index];

			if ($name != "edit.php")
			{
				if ($type == "file") $files[] = $name;
				else $dirs[] = $name;
			}
		  }
		}

$count = 0;
foreach ($files as $f)
{
	echo '<td align="center" valign="top" style="font-weight:bold; font-size:12px; direction:ltr;">
	<img src="'.$up_directory.''.$f.'" width="94" height="74" border="0"><br>'.$f.'</td>';
	$count++;
	if($count%8 == 0)
		echo '</tr><tr>';
}

?>

 </tr>
</table>
</div>