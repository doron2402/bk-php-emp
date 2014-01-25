$(function() {
$(".button").click(function() {

    var name = $("input#full_name").val();
    var email = $("input#email").val();
    var phone = $("input#phone").val();
    var message = $("textarea#message").val();
    var id = $("input#CompId").val();
    var title = $("input#CompTitle").val();

    if (name == "")
        {
            alert("אנא רשום את שמך");
            return false;
        }
       if (email == "")
        {
            alert("אנא רשום את כתובת המייל");
            return false;
        } 
       if (phone == "")
        {
            alert("אנא רשום את מספר הטלפון שלך");
            return false;
        }
    if(message == "")
        {
            message = 'לקוח לא השאיר הודעה';
        }
        
    var dataString = 'name=' + name + '&email=' + email;
     dataString += '&phone=' + phone;
     dataString += '&message=' + message;
     dataString += '&CompId=' + id;
     dataString += '&CompTitle=' + title;

    alert('תודה פרטייך יועברו לבעל העסק');
    		$.ajax({
      type: "POST",
      url: "Include/Bin/process.php",
      data: dataString,
      success: function() {
        $('#contact').html("<div id='message'></div>");
        $('#message').html("<h2>Contact Form Submitted!</h2>")
        .append("<p>We will be in touch soon.</p>")
        .hide()
        .fadeIn(1500, function() {
          $('#message').append("<img id='checkmark' src='images/check.png' />");
        });
      }
     });
    return false;
	});
});
    
