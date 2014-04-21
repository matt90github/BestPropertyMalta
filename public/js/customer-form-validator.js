//Customer Validation Script 

$(document).ready(function(){

	$('#login-details').validate({
	    rules: {
	      customer_password: {
	        minlength: 8,
	        required: true
	      },
	      customer_emailAddress: {
	      	minlength: 6,
	        required: true,
	        email: true
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
            if(element.parent('.form-control').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
	  });

    $('#login-details').on('submit', function () { 
         if ($('#login-details').valid()) {                  
            $("#customer-login").fadeTo("fast", .5).removeAttr("href");                 
            $("#customer-login").addClass("disabled_anchor");     
         }
     });

    $('#login-details').keypress(function(e){
        if(e.which == 13){
           if ($('#login-details').valid()) {
	           if (!$("#customer-login").hasClass("disabled_anchor")) {
	           		$("#customer-login").click();  
	           } 
           } 
        }
    });
    
	$('#customer-password-details').validate({
	    rules: {
	      customer_old_password: {
	        minlength: 8,
	        required: true
	      },
	      customer_new_password: {
	        minlength: 8,
	        required: true
	      },
	      customer_new_password_confirmation: {
	        minlength: 8,
	        required: true,
	        equalTo: "#customer_new_password"
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

    $('#customer-password-details').on('submit', function () { 
          if ($('#customer-password-details').valid()) {  
            $("#update-password").fadeTo("fast", .5).removeAttr("href");                 
            $("#update-password").addClass("disabled_anchor");   
          }
    });

    $('#customer-password-details').keypress(function(e){
        if(e.which == 13){
          if ($('#customer-password-details').valid()) {          
             if (!$("#update-password").hasClass("disabled_anchor")) {
                $("#update-password").click();  
             }   
          }
        }
    });

	$('#customer-details').validate({
	    rules: {
		  customer_type: {
	        required: true
	      },
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
	      customer_idCardNumber: {
	        minlength: 6,
	        required: true
	      },
	      customer_username: {
	        minlength: 6,
	        required: true
	      },
	      customer_password: {
	        minlength: 8,
	        required: true
	      },
	      customer_password_confirmation: {
	        minlength: 8,
	        required: true,
	        equalTo: "#customer_password"
	      },
	      customer_phoneNumber: {
	        minlength: 8,
	        digits: true
	      },
	      customer_mobileNumber: {
	        minlength: 8,
	        required: true,
	        digits: true
	      },
	      customer_emailAddress: {
	      	minlength: 6,
	        required: true,
	        email: true
	      },
	      customer_addressLine1: {
	      	minlength: 20,
	        required: true
	      },
	      customer_countryId: {
	        required: true
	      },
	      customer_dateOfBirth: {
	        date: true,
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
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }


	  });

    $('#customer-details').on('submit', function () { 
         if ($('#customer-details').valid()) {             
            $("#customer").fadeTo("fast", .5).removeAttr("href");                 
            $("#customer").addClass("disabled_anchor");    
         }
     });

    $('#customer-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });

    $("#confirm-remove").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#confirm-remove").addClass("disabled_anchor"); 
    });

}); // end document.ready