$(function() {
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
		
	  var name = $("input#Contactname").val();
		if (name == "") {
      alert("אנא ציין את שמך");
      $("input#Contactname").focus();
      return false;
    }
		var email = $("input#Contactemail").val();
		if (email == "") {
      alert("אנא הכנס את כתובת האי מייל שלך")
      $("input#Contactemail").focus();
      return false;
    }
		var phone = $("input#Contactphone").val();
		if (phone == "") {
      $("label#error").show();
      alert("אנא הכנס את מספר הטלפון לחזרה")
      $("input#Contactphone").focus();
      return false;
    }
    
    		var message = $("textarea#Contactmessage").val();
		if (message == "") {
      alert("אנא פרט על פנייתך");
      $("textarea#Contactmessage").focus();
      return false;
    }
	
	var CompTitle = $("input:hidden#CompanyTitle").val();
        var CompId = $("input:hidden#CompanyId").val();
        
		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&message=' + message + '&CompTitle='+ CompTitle + '&CompId='+ CompId;
		
                //alert (dataString);return false;
		
		$.ajax({
      type: "POST",
      url: "Include/Bin/process.php",
      data: dataString,
      success: function() {
          $("#ContactForm").hide();
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
