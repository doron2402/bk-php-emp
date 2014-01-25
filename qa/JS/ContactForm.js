<script type="text/javascript">
	function ContactForm()
	{
		var Name = $('input[name$="ContactFullName"]').val();
		var Phone = $('input[name$="ContactPhone"]').val();
		var Cell = $('input[name$="ContactCell"]').val();
		Phone = Phone + '/' + Cell;
		var Email = $('input[name$="ContactEmail"]').val();
		var Msg = $('input[name$="ContactSubject"]').val() + $('#ContactMsg').val();
		var Id = 0;

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
							alert('תודה שפנית אלינו, צוות אינטן');
							$('input[name$="ContactFullName"]').val('');
							$('input[name$="ContactPhone"]').val('');
							$('input[name$="ContactCell"]').val('');
							$('input[name$="ContactEmail"]').val('');
							$('input[name$="ContactSubject"]').val('');
							$('#ContactMsg').val('');
					  }
					});
		}
		
		
	}
	</script>