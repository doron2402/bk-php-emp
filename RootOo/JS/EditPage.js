$(document).ready(function(){
        //if submit button is clicked
	$('input#Contact_Submit').click(function () {		 
   var BizName = $('input.BizName').val();
   var BizTitle = $('input.BizTitle').val();
   var BizContactName = $('input.BizContactName').val();
   var BizContactAdd = $('input.BizContactAdd').val();
   var BizContactPhone = $('input.BizContactPhone').val();
   var BizContactEmail = $('input.BizContactEmail').val();
   var BizId = $('input.BizId').val();
   
   dataContact =  'BizName=' + BizName + '&BizTitle=' + BizTitle + '&BizContactName=' + BizContactName;
   dataContact += '&BizContactAdd=' + BizContactAdd + '&BizContactPhone=' + BizContactPhone;
   dataContact += '&BizContactEmail=' + BizContactEmail +'&BizId=' + BizId;


jQuery.ajax({
       url:"Ajax/Contact_Info.php?BizId=123",
       type: "GET",
       data: dataContact,
       timeout: 2000,
       //Error
           error: function(jqXHR, textStatus, errorThrown) {
                  console.log("Failed to submit");
                  console.log(dataContact);
                  console.log(errorThrown);
                },
           //Success
           success: function (html)
           {
               if(html == 1)
                   {
                       alert('עדכון בוצע בהצלחה');
                   }
                else
                    {
                        alert('נתונים לא נשמרו בהצלחה');
                    }
           }
        });


 });
});