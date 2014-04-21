//Property Validation Script 

$(document).ready(function(){

	$('#offer-status-details').validate({
	    rules: {
	      offer_status_name: {
	        minlength: 2,
	        required: true
	      },
	      offer_status_description: {
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

    $('#offer-status-details').on('submit', function () { 
         if ($('#offer-status-details').valid()) {             
            $("#offer-status").fadeTo("fast", .5).removeAttr("href");                 
            $("#offer-status").addClass("disabled_anchor");    
         }
     });

    $('#offer-status-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });

	$('#offer-details').validate({
	    rules: {
		  offer_value: {
            number: true,
            required: true
	      },
	      offer_propertyId: {
	        required: true
	      },
	      offer_buyerId: {
	        required: true
	      },
	      offer_statusId: {
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
            if(element.parent('.form-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
	  });

    $('#offer-details').on('submit', function () { 
         if ($('#offer-details').valid()) {             
            $("#offer").fadeTo("fast", .5).removeAttr("href");                 
            $("#offer").addClass("disabled_anchor");    
         }
     });

    $('#offer-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });

    $("#remove-offer").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#remove-offer").addClass("disabled_anchor"); 
    });

    $("#accept-offer").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#accept-offer").addClass("disabled_anchor"); 
    });

    $("#reject-offer").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#reject-offer").addClass("disabled_anchor"); 
    });

    $("#confirm-offer").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#confirm-offer").addClass("disabled_anchor"); 
    });

    $("#confirm-remove").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#confirm-remove").addClass("disabled_anchor"); 
    });


}); // end document.ready