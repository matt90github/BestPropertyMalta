<!-- IMS New Staff Member Page -->

@section('title', 'Best Property Malta | New Staff Member')
@include('common.staff_errors')

{{ Form::open(array('url'=>'ims/staff/create', 'class'=>'form-horizontal', 'id'=>'staff-details',  'role'=>'form')) }}
   
   <h3 class="form-signup-heading">New Staff Member</h3>
 
	<div class="form-group">
   		{{ Form::label('staff_title', 'Title', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::select('staff_title', $staff_title, Input::old('staff_title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_firstName', 'First Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_firstName', Input::old('staff_firstName'), array('class'=>'form-control', 'placeholder'=>'First Name')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_lastName', 'Last Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_lastName', Input::old('staff_lastName'), array('class'=>'form-control', 'placeholder'=>'Last Name')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_emailAddress', 'Email Address', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_emailAddress', Input::old('staff_emailAddress'), array('class'=>'form-control', 'placeholder'=>'Email Address')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_username', 'Username', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_username', Input::old('staff_username'), array('class'=>'form-control', 'placeholder'=>'Username')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_password', 'Password', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::password('staff_password', array('class'=>'form-control', 'placeholder'=>'Password')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_password_confirmation', 'Confirm Password', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::password('staff_password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_roleId', 'Role', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::select('staff_roleId', $staff_roleId, Input::old('staff_roleId'), array('class'=>'form-control', 'placeholder'=>'Role', 'default'=>'Choose One')) }}
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_idCardNumber', 'ID Card Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_idCardNumber', Input::old('staff_idCardNumber'), array('class'=>'form-control', 'placeholder'=>'ID Card Number')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_dateOfBirth', 'Date of Birth', array('class'=>'col-sm-2 control-label')) }} 

		<div class="col-sm-3">
   		   <div class='input-group date' id="dobdatepicker" data-date-format="mm-dd-yyyy">
   				{{ Form::text('staff_dateOfBirth', Input::old('staff_dateOfBirth'), array('class'=>'date-picker form-control', 'placeholder'=>'Date of Birth')) }}
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
         {{ Form::label('staff_employmentDate', 'Employment Date', array('class'=>'col-sm-2 control-label')) }} 

      <div class="col-sm-3">
            <div class='input-group date' id="doedatepicker" data-date-format="mm-dd-yyyy">
               {{ Form::text('staff_employmentDate', Input::old('staff_employmentDate'), array('class'=>'date-picker form-control', 'placeholder'=>'Employment Date')) }}
               <span class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>   

            <script type="text/javascript">
               var dp_now = new Date();

            $('#doedatepicker').datepicker({
                format: 'dd/mm/yyyy',
                startDate: "01/01/1900",
                endDate: dp_now
            })
            </script>
      </div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_addressLine1', 'Address Line 1', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-4">
   			{{ Form::text('staff_addressLine1', Input::old('staff_addressLine1'), array('class'=>'form-control', 'placeholder'=>'Address Line 1')) }} 
   		</div>
   </div>

    <div class="form-group">
   		{{ Form::label('staff_addressLine2', 'Address Line 2', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-4">
   			{{ Form::text('staff_addressLine2', Input::old('staff_addressLine2'), array('class'=>'form-control', 'placeholder'=>'Address Line 2')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_countryId', 'Country', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::select('staff_countryId', $staff_countryId, Input::old('staff_countryId'), array('class'=>'form-control', 'placeholder'=>'Country')) }}
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_phoneNumber', 'Phone Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_phoneNumber', Input::old('staff_phoneNumber'), array('class'=>'form-control', 'placeholder'=>'Phone Number')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_mobileNumber', 'Mobile Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_mobileNumber', Input::old('staff_mobileNumber'), array('class'=>'form-control', 'placeholder'=>'Mobile Number')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_isActive', 'Active?', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-1">
   			{{ Form::checkbox('staff_isActive', Input::old('staff_isActive'), true, array('class'=>'form-control', 'placeholder'=>'Active?')) }} 
   		</div>
   </div>

   <div class="form-custom-buttons">
      <a id="staff" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Add Staff Member</a>
      {{link_to_route('stafflist', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   <br/><br/>
{{ Form::close() }}

