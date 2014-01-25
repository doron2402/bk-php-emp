<?php
if($_POST['Id'] != null)
{

	
	//Check that Id is Numeric
	$BizId = $_POST['Id'];
	//Require class
	require_once '../Class/Main.class.php';
	//Get Data from Class
	$PageObj = new Main();
	$Page = $PageObj->GetBizPage($BizId);
	//var_dump($Page);
	echo '<div id="BizPageAjax">';
	echo '<div id="BizPageAjaxImg"><p style="text-align:center;vertical-align:middle;">הלוגו שלך כאן</p></div>';
	echo '<h1>'.$Page->Title.'</h1>';
	echo '<p><b>תיאור העסק</b></p>';
	echo '<p style="height:80px;">'.$Page->Text_Body.'</p>';
	echo '<table style="width: 630px;border:none;">';
	echo '<tr>';
	echo '<td>';
	echo '<p><b>צור קשר:</b></p>';
	echo '<p>'.$Page->ContactModule.'</p>';
	?>
<div class="fb-like" data-href="http://www.in10.co.il/Page&amp;Id=<?php echo $BizId;?>" data-send="false" data-width="200" data-show-faces="false" data-action="recommend" data-font="arial"></div>
	</td>
	<script type="text/javascript">
	function SubmitForm()
	{
		var Name = $('input[name$="FullName<?php echo $BizId;?>"]').val();
		var Phone = $('input[name$="Phone<?php echo $BizId;?>"]').val();
		var Email = $('input[name$="Email<?php echo $BizId;?>"]').val();
		var Msg = $('#Msg<?php echo $BizId;?>').val();
		var Id = <?php echo $BizId;?>;

		if(Name.length < 3 || Phone.length < 7 || Email.length < 8)
		{
			alert('יש צורך למלא את כל השדות');
		}
		else
		{
			var Data = "Id=" + Id + "&Name=" + Name + "&Phone=" + Phone + "&Email=" + Email + "&Msg=" + Msg;
			//alert(Data);
			$.ajax({
					  url: 'Ajax/ContactBiz.php',
					  data: Data,
					  type: 'POST',
					  success: function(dataReturn) 
					  {
							alert('פרטייך נשלחו בהצלחה');
							$('input[name$="FullName<?php echo $BizId;?>"]').val('');
							$('input[name$="Phone<?php echo $BizId;?>"]').val('');
							$('input[name$="Email<?php echo $BizId;?>"]').val('');
							$('#Msg<?php echo $BizId;?>').val('');
					  }
					});
		}
		
		
	}
	</script>
	<td style="border-right: 2px solid black; padding-right: 15px;">
	<p><b>פניה לבעל העסק:</b></p>
	<table style="border:none;">
	<form id="ContactFormBiz">
		<tr>
			<td>שם מלא:</td>
			<td><input name="FullName<?php echo $BizId;?>" type="text" /></td>
		</tr>
		<tr>
			<td>טלפון:</td>
			<td><input type="text" name="Phone<?php echo $BizId;?>" /></td>
		</tr>
		<tr>
			<td>דוא"ל:</td>
			<td><input type="text" name="Email<?php echo $BizId;?>" /></td>
		</tr>
		<tr>
			<td>תיאור:</td>
			<td><textarea id="Msg<?php echo $BizId;?>"></textarea></td>
		</tr>
	</form>
	</table>
	<br/><br /><a onClick="SubmitForm();" style="font-size:18pt;margin-right:230px;color:white;background-color:#FC7905;padding-right:10px;padding-left:10px;padding-top:3px;padding-bottom:3px;">שלח</a>
	</td>
	</tr>
	</table>
	<h2>התגובות שלך לבעל העסק:</h2>
		<div id="FacebookBizComments" style="text-align:center;margin-top:10px;">
		<div class="fb-comments" data-href="http://www.in10.co.il/Page&amp;Id=<?php echo $BizId;?>" data-num-posts="4" data-width="470"></div>
		</div>
	</div>
	
	<script type="text/javascript">
	 FB.XFBML.parse();
	</script>
	<?php
}
else
{
	die();
}

?>