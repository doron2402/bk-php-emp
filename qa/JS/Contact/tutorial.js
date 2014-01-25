$(function() {
  $('.error').hide();
  $('input.text-input').css({backgroundColor:"#FFFFFF"});
  $('input.text-input').focus(function(){
    $(this).css({backgroundColor:"#FFDDAA"});
  });
  $('input.text-input').blur(function(){
    $(this).css({backgroundColor:"#FFFFFF"});
  });

  $(".Contactbutton").click(function() {
		// validate and process form
		// first hide any error messages
    $('.error').hide();
		
	  var name = $("input#Clientname").val();
		if (name == "") {
      $("label#error").show();
      alert("אנא ציין את שמך");
      $("input#Clientname").focus();
      return false;
    }
		var email = $("input#Clientemail").val();
		if (email == "") {
      $("label#error").show();
      alert("אנא הכנס את כתובת האי מייל שלך")
      $("input#Clientemail").focus();
      return false;
    }
		var phone = $("input#Clientphone").val();
		if (phone == "") {
      $("label#error").show();
      alert("אנא הכנס את מספר הטלפון לחזרה")
      $("input#phone").focus();
      return false;
    }
    
    		var message = $("textarea#Clientmessage").val();
		if (message == "") {
      alert("אנא פרט על פנייתך");
      $("textarea#Clientmessage").focus();
      return false;
    }
	
	var CompTitle = $("input#CompanyTitle").val();
        var CompId = $("input#CompanyId").val();
        
		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&message=' + message + '&CompTitle='+ CompTitle + '&CompId=' + CompId;
		
                //alert (dataString);return false;
		
		$.ajax({
      type: "POST",
      url: "Include/Bin/process.php",
      data: dataString,
      success: function() {
        $('#contact_form').html("<div id='message'></div>");
        $('#message').html("<h2>פרטייך נשלחו</h2>")
        .append("<p>תודה שפנית אלינו, צוות אינטן.</p>")
        .hide()
        .fadeIn(1500, function() {
          $('#message').append("<img id='checkmark' src='images/check.png' />");
        });
      }
     });
    return false;
	});
});
runOnLoad(function(){
  $("input#Clientname").select().focus();
});
