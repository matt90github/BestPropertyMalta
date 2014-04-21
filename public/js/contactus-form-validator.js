//Staff Validation Script 

$(document).ready(function(){

    $('#contactus-details').validate({
        rules: {
          customer_title: {
            required: true
          },
          customer_firstName: {
            minlength: 2,
            required: true
          },
          customer_lastName: {
            minlength: 2,
            required: true
          },
          customer_emailAddress: {
            minlength: 6,
            required: true,
            email: true
          },
          contactus_query: {
            minlength: 20,
            required: true
          },
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }

      });

    $('#contactus-details').on('submit', function () { 
         if ($('#contactus-details').valid()) {             
            $("#query").fadeTo("fast", .5).removeAttr("href");                 
            $("#query").addClass("disabled_anchor");    
         }
     });

    $('#contactus-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });

}); // end document.ready