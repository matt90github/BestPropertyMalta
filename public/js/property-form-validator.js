//Property Validation Script 

$(document).ready(function(){

	$('#upload-image').validate({
	    rules: {
	      property_name: {
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

	  $('#upload-image').on('submit', function () { 
	       if ($('#upload-image').valid()) {                  
            	$("#upload").fadeTo("fast", .5).removeAttr("href");                 
            	$("#upload").addClass("disabled_anchor");       
	       }
	   });



	$('#property-type-details').validate({
	    rules: {
	      property_type_name: {
	        minlength: 2,
	        required: true
	      },
	      property_type_description: {
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

	  $('#property-type-details').on('submit', function () { 
          if ($('#property-type-details').valid()) {             
               $("#property-type").fadeTo("fast", .5).removeAttr("href");                 
               $("#property-type").addClass("disabled_anchor");    
          }
      });

	  $('#property-type-details').keypress(function(e){
	      if(e.which == 13){
           return false;
        }
      });

	$('#property-status-details').validate({
	    rules: {
	      property_status_name: {
	        minlength: 2,
	        required: true
	      },
	      property_status_description: {
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

	  $('#property-status-details').on('submit', function () { 
          if ($('#property-status-details').valid()) {             
               $("#property-status").fadeTo("fast", .5).removeAttr("href");                 
               $("#property-status").addClass("disabled_anchor");    
          }
      });

	  $('#property-status-details').keypress(function(e){
	      if(e.which == 13){
	          return false;
          }
      });

	$('#property-details').validate({
	    rules: {
		  property_typeId: {
	        required: true
	      },
	      property_statusId: {
	        required: true
	      },
	      property_vendorId: {
	        required: true
	      },
	      property_name: {
	      	minlength: 2,
	        required: true
	      },
	      property_description: {
	      	minlength: 20,
	        required: true
	      },
	      property_locationId: {
	        required: true
	      },
	      property_squareMetres: {
	      	number: true,
	        required: true
	      },
	      property_bathrooms: {
	      	digits: true,
	        required: true
	      },
	      property_bedrooms: {
	      	digits: true,
	        required: true
	      },
	      property_price: {
	      	number: true,
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

	  $('#property-details').on('submit', function () { 
          if ($('#property-details').valid()) {             
               $("#property").fadeTo("fast", .5).removeAttr("href");                 
               $("#property").addClass("disabled_anchor");    
          }
      });

	  $('#property-details').keypress(function(e){
	      if(e.which == 13){
	          return false;
          }
      });

	  $("#add-watch").click(function () { 
         $(this).fadeTo("fast", .5).removeAttr("href");
         $("#add-watch").addClass("disabled_anchor"); 
      });

	  $("#remove-watch").click(function () { 
         $(this).fadeTo("fast", .5).removeAttr("href");
         $("#remove-watch").addClass("disabled_anchor"); 
      });

    $("#confirm-remove").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#confirm-remove").addClass("disabled_anchor"); 
    });

    $("#send-newsletter").click(function () { 
      $(this).fadeTo("fast", .5).removeAttr("href"); 
      $("#send-newsletter").addClass("disabled_anchor"); 
    });

}); // end document.ready