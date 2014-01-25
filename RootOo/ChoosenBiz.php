<?php

//ChoosenBiz.php
$Query = "SELECT * FROM ChosenBusiness;";
$Result = mysql_query($Query);


?>
<script type="text/javascript">
function SaveChooseBiz(Id)
{
	var DivName = 'input[name$="Name' + Id + '"]';
	var Name = $(DivName).val();
	var DivLink = 'input[name$="Link' + Id + '"]';
	var Link = $(DivLink).val();
	var DivAlt = 'input[name$="Alt' + Id + '"]';
	var Alt = $(DivAlt).val();
	var Data = 'Id=' + Id + '&Name=' + Name + '&Link=' + Link + '&Alt=' + Alt;
	$.ajax({
									  url: 'Ajax/SaveChooseBiz.php',
									  data: Data,
									  type: 'POST',
									  success: function(dataReturn) 
									  {
										alert(dataReturn);
									  }
									});
}
</script>
<header>
<h3 class="tabs_involved">בחר אילו עסקים ברצונך שיופיעו</h3>
<h3 class="tabs_involved">זכור שישנה הגבלה עד חמישה עסקים</h3>
</header>
<div id="ChosenBusiness" style="padding:20px;">
<ul>
<?php
while($Row = mysql_fetch_assoc($Result))
{
	echo '<li>';
	echo '<p>שם : <input type="text" name="Name'.$Row['Id'].'" value="'.$Row['Name'].'"></p>';
	echo '<p>קישור : <input type="text" name="Link'.$Row['Id'].'" value="'.$Row['Link'].'"></p>';
	echo '<p>שם SEO : <input type="text" name="Alt'.$Row['Id'].'" value="'.$Row['Alt'].'"></p>';
	echo '<a style="cursor:pointer;" onClick="SaveChooseBiz('.$Row['Id'].');">שמור</a>';
	echo '</li>';
}

?>
</ul>
</div>