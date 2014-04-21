//Page Validation Script 

$(document).ready(function(){
  
      $('#page-details').validate({
        rules: {
          page_title: {
            minlength: 2,
            required: true
          },
          page_content: {
            minlength: 20,
            required: true
          }
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
            if(element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }

      });

    $('#page-details').on('submit', function () { 
         if ($('#page-details').valid()) {             
            $("#modify-page").fadeTo("fast", .5).removeAttr("href");                 
            $("#modify-page").addClass("disabled_anchor");    
         }
     });

    $('#page-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });

    $("#confirm-remove").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#confirm-remove").addClass("disabled_anchor"); 
    });


}); // end document.ready