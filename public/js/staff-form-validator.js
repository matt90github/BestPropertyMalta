//Staff Validation Script 

$(document).ready(function(){

    $('#staff-login-details').validate({
        rules: {
          staff_password: {
            minlength: 8,
            required: true
          },
          staff_emailAddress: {
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

    $('#staff-login-details').on('submit', function () { 
         if ($('#staff-login-details').valid()) {                  
            $("#property-login").fadeTo("fast", .5).removeAttr("href");                 
            $("#property-login").addClass("disabled_anchor");     
         }
     });

    $('#staff-login-details').keypress(function(e){
        if(e.which == 13){
           if ($('#staff-login-details').valid()) {          
             if (!$("#property-login").hasClass("disabled_anchor")) {
                $("#property-login").click();  
             }   
           }
        }
    });

	$('#staff-role-details').validate({
	    rules: {
	      staff_role_name: {
	        minlength: 2,
	        required: true
	      },
	      staff_role_description: {
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

    $('#staff-role-details').on('submit', function () { 
         if ($('#staff-role-details').valid()) {             
            $("#staff-role").fadeTo("fast", .5).removeAttr("href");                 
            $("#staff-role").addClass("disabled_anchor");    
         }
     });

    $('#staff-role-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });


    $('#staff-password-details').validate({
        rules: {
          staff_old_password: {
            minlength: 8,
            required: true
          },
          staff_new_password: {
            minlength: 8,
            required: true
          },
          staff_new_password_confirmation: {
            minlength: 8,
            required: true,
            equalTo: "#staff_new_password"
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

    $('#staff-password-details').on('submit', function () { 
          if ($('#staff-password-details').valid()) {  
            $("#update-password").fadeTo("fast", .5).removeAttr("href");                 
            $("#update-password").addClass("disabled_anchor");   
          }
    });

    $('#staff-password-details').keypress(function(e){
        if(e.which == 13){
          if ($('#staff-password-details').valid()) {          
             if (!$("#update-password").hasClass("disabled_anchor")) {
                $("#update-password").click();  
             }   
          }
        }
    });

    $('#staff-details').validate({
        rules: {
          staff_roleId: {
            required: true
          },
          staff_title: {
            required: true
          },
          staff_firstName: {
            minlength: 2,
            required: true
          },
          staff_lastName: {
            minlength: 2,
            required: true
          },
          staff_idCardNumber: {
            minlength: 6,
            required: true
          }, 
          staff_username: {
            minlength: 6,
            required: true
          },
          staff_password: {
            minlength: 8,
            required: true
          },
          staff_password_confirmation: {
            minlength: 8,
            required: true,
            equalTo: "#staff_password"
          },
          staff_phoneNumber: {
            minlength: 8,
            digits: true
          },
          staff_mobileNumber: {
            minlength: 8,
            required: true,
            digits: true
          },
          staff_emailAddress: {
            minlength: 6,
            required: true,
            email: true
          },
          staff_addressLine1: {
            minlength: 20,
            required: true
          },
          staff_countryId: {
            required: true
          },
          staff_dateOfBirth: {
            date: true,
            required: true
          },
          staff_employmentDate: {
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

    $('#staff-details').on('submit', function () { 
         if ($('#staff-details').valid()) {             
            $("#staff").fadeTo("fast", .5).removeAttr("href");                 
            $("#staff").addClass("disabled_anchor");    
         }
     });

    $('#staff-details').keypress(function(e){
        if(e.which == 13){
           return false;
        }
    });

    $("#confirm-remove").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#confirm-remove").addClass("disabled_anchor"); 
    });

}); // end document.ready