<!-- Official Website Edit Customer Page -->

@section('title', 'Best Property Malta | Edit My Profile')
@include('common.customer_errors')

{{ Form::open(array('url'=>'customerprofile/update', 'class'=>'form-horizontal', 'id'=>'customer-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit My Profile</h3>

	<div class="form-group">
   		{{ Form::label('customer_title', 'Title', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::select('customer_title', $customer_title, $customer->customer_title, array('class'=>'form-control', 'placeholder'=>'Title')) }}
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_firstName', 'First Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_firstName', $customer->customer_firstName, array('class'=>'form-control', 'placeholder'=>'First Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_lastName', 'Last Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_lastName', $customer->customer_lastName, array('class'=>'form-control', 'placeholder'=>'Last Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_emailAddress', 'Email Address', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_emailAddress', $customer->customer_emailAddress, array('class'=>'form-control', 'placeholder'=>'Email Address')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_username', 'Username', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_username', $customer->customer_username, array('class'=>'form-control', 'placeholder'=>'Username')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_type', 'Customer Type', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::select('customer_type', $customer_type, $customer->customer_type, array('class'=>'form-control', 'placeholder'=>'Customer Type', 'default'=>'Choose One')) }}
   		</div>
   </div>

 	<div class="form-group">
   		{{ Form::label('customer_idCardNumber', 'ID Card Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_idCardNumber', $customer->customer_idCardNumber, array('class'=>'form-control', 'placeholder'=>'ID Card Number')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('customer_dateOfBirth', 'Date of Birth', array('class'=>'col-sm-2 control-label')) }} 

		<div class="col-sm-3">
   		   	<div class='input-group date' id="dobdatepicker" data-date-format="mm-dd-yyyy">
   				{{ Form::text('customer_dateOfBirth', date_format(new DateTime($customer->customer_dateOfBirth), 'd/m/Y'), array('class'=>'date-picker form-control', 'placeholder'=>'Date of Birth')) }}
   				<span class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></span>
   			</div>	

   			<script type="text/javascript">
   				var dp_now = new Date();

				$('#dobdatepicker').datepicker({
				    format: 'dd/mm/yyyy',
				    startDate: "01/01/1900",
				    endDate: dp_now
				})
            </script>
		</div>
	</div>

	<div class="form-group">
   		{{ Form::label('customer_addressLine1', 'Address Line 1', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-4">
   			{{ Form::text('customer_addressLine1', $customer->customer_addressLine1, array('class'=>'form-control', 'placeholder'=>'Address Line 1')) }} 
   		</div>
   </div>

    <div class="form-group">
   		{{ Form::label('customer_addressLine2', 'Address Line 2', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-4">
   			{{ Form::text('customer_addressLine2', $customer->customer_addressLine2, array('class'=>'form-control', 'placeholder'=>'Address Line 2')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_countryId', 'Country', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::select('customer_countryId', $customer_countryId, $customer->customer_countryId, array('class'=>'form-control', 'placeholder'=>'Country')) }}
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_phoneNumber', 'Phone Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_phoneNumber', $customer->customer_phoneNumber, array('class'=>'form-control', 'placeholder'=>'Phone Number')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('customer_mobileNumber', 'Mobile Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('customer_mobileNumber', $customer->customer_mobileNumber, array('class'=>'form-control', 'placeholder'=>'Mobile Number')) }} 
   		</div>
   </div>

   {{ Form::hidden('customer_id', $customer->customer_id) }}

   <div class="form-custom-buttons">
      <a id="customer" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('customer_profile', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   {{ Form::close() }}

   <br/><br/>