<script type="text/javascript">
function SignUpBiz()
{
	var error = 0;
	var Name = $('input[name$="FullName"]').val();
	if(Name == '')
	{
		error = 1;
		alert('אנא מלא שם מלא');
		exit();
	}
	
	var JobField = $('input[name$="JobField"]').val();
	var BizName = $('input[name$="BizName"]').val();
	if (BizName == '')
	{
		error += 2;
		alert('אנא מלא את שם העסק');
		exit();
	}
	var SiteLink = $('input[name$="SiteLink"]').val();
	var BizAreaCode = $('#BizAreaCode').val();
	if (BizAreaCode == '00')
	{
		error += 2;
		alert('יש צורך לבחור איזור');
		exit();
	}
	var Email = $('input[name$="Email"]').val();
	if (Email == '' || Email.length < 5)
	{
		error += 4;
		alert('אנא מלא את כתובת המייל שלך');
		exit();
	}
	var Phone = $('input[name$="Phone"]').val();
	var Cell = $('input[name$="Cell"]').val();
	if (Phone == '' && Cell == '')
	{
		error += 8;
		alert('יש צורך למלא לפחות מספר טלפון או סלולרי');
		exit();
	}
	
	if(error == 0)
	{
		var Data = "Id=" + <?php echo rand(11,19);?> + "&BizName=" + BizName + "&JobField=" + JobField + "&Name=" + Name + "&BizAreaCode=" + BizAreaCode + "&Email=" + Email  + "&Phone=" + Phone  + "&SiteLink=" + SiteLink + "&Cell=" + Cell;
			//alert(Data);
			$.ajax({
					  url: 'Ajax/SignupBiz.php',
					  data: Data,
					  type: 'POST',
					  success: function(dataReturn) 
					  {
							alert(dataReturn);
							$('input[name$="Cell"]').val('');
							$('input[name$="Phone"]').val('');
							$('input[name$="SiteLink"]').val('');
							$('input[name$="Email"]').val('');
							$('input[name$="BizName"]').val('');
							$('input[name$="JobField"]').val('');
							$('input[name$="Name"]').val('');
							$('#BizAreaCode').val('');
					  }
					});
	}

}
</script>
<div id="HeaderContent" style="height:428px;">
					<div id="ContactUs">
						<div id="HeaderPage" style="margin-right:40px;">
<h1>הצטרפות בעלי מקצוע</h1>
<p>
						<b>
						בעל מקצוע יקר, שלום רב
						<br />
						אם אתה נותן שירותים אמין ומקצועי בלבד וגם יכול להוכיח לנו את זה אנחנו מזמינים אותך להנות מחוג לקוחות חדש ולאורך זמן.
						</b>
						</p>
						</div><div id="SignupImg" style="background-image: url(images/Main/ContactWoman.png);height: 333px;margin-right: 700px;position: absolute;width: 222px;"></div>
						<div id="ContactText" style="width:90%;margin-right:auto;margin-left:auto;">
						<table style="border:none;">
						<tr>
						<td>שם מלא</td>
						<td><input type="text" name="FullName" /></td>
						<td>אזורי עבודה</td>
						<td><select id="BizAreaCode">
					<option value="00">בחר אזור</option>
					<option value="03">מרכז</option>
					<option value="04">צפון</option>
					<option value="08">דרום</option>
					<option value="02">ירושלים</option>
					<option value="09">שרון</option>
				</select></td>
						</tr>
						<tr>
						<td>תחום מקצועי</td>
						<td><input type="text" name="JobField" /></td>
						<td>דוא"ל</td>
						<td><input type="text" name="Email" /></td>
						</tr>
						<tr>
						<td>שם העסק</td>
						<td><input type="text" name="BizName" /></td>
						<td>טלפון</td>
						<td><input type="text" name="Phone" /></td>
						</tr>
						<tr>
						<td>אתר אינטרנט</td>
						<td><input type="text" name="SiteLink" /></td>
						<td>סלולרי</td>
						<td><input type="text" name="Cell" /></td>
						</tr>						
						</table>
						<br />
		<a onClick="SignUpBiz();" style="cursor:pointer;background-color: #FC7905;color: white;font-size: 13px;font-weight: bold;padding: 8px 12px;">שלח</a>
		</div>
		</div>
		</div>