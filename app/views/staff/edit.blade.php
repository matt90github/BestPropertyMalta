<!-- IMS Edit Staff Member Page -->

@section('title', 'Best Property Malta | Edit Staff Member')
@include('common.staff_errors')

{{ Form::open(array('url'=>'ims/staff/update', 'class'=>'form-horizontal', 'id'=>'staff-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit Staff Member</h3>

	<div class="form-group">
   		{{ Form::label('staff_title', 'Title', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::select('staff_title', $staff_title, $staff->staff_title, array('class'=>'form-control', 'placeholder'=>'Title')) }}
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_firstName', 'First Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_firstName', $staff->staff_firstName, array('class'=>'form-control', 'placeholder'=>'First Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_lastName', 'Last Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_lastName', $staff->staff_lastName, array('class'=>'form-control', 'placeholder'=>'Last Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_emailAddress', 'Email Address', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_emailAddress', $staff->staff_emailAddress, array('class'=>'form-control', 'placeholder'=>'Email Address')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_username', 'Username', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_username', $staff->staff_username, array('class'=>'form-control', 'placeholder'=>'Username')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_roleId', 'Role', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::select('staff_roleId', $staff_roleId, $staff->staff_roleId, array('class'=>'form-control', 'placeholder'=>'Role', 'default'=>'Choose One')) }}
   		</div>
   </div>

 	<div class="form-group">
   		{{ Form::label('staff_idCardNumber', 'ID Card Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_idCardNumber', $staff->staff_idCardNumber, array('class'=>'form-control', 'placeholder'=>'ID Card Number')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_dateOfBirth', 'Date of Birth', array('class'=>'col-sm-2 control-label')) }} 

		<div class="col-sm-3">
   		   	<div class='input-group date' id="dobdatepicker" data-date-format="mm-dd-yyyy">
   				{{ Form::text('staff_dateOfBirth', date_format(new DateTime($staff->staff_dateOfBirth), 'd/m/Y'), array('class'=>'date-picker form-control', 'placeholder'=>'Date of Birth')) }}
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
               {{ Form::text('staff_employmentDate', date_format(new DateTime($staff->staff_employmentDate), 'd/m/Y'), array('class'=>'date-picker form-control', 'placeholder'=>'Employment Date')) }}
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
   			{{ Form::text('staff_addressLine1', $staff->staff_addressLine1, array('class'=>'form-control', 'placeholder'=>'Address Line 1')) }} 
   		</div>
   </div>

    <div class="form-group">
   		{{ Form::label('staff_addressLine2', 'Address Line 2', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-4">
   			{{ Form::text('staff_addressLine2', $staff->staff_addressLine2, array('class'=>'form-control', 'placeholder'=>'Address Line 2')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_countryId', 'Country', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::select('staff_countryId', $staff_countryId, $staff->staff_countryId, array('class'=>'form-control', 'placeholder'=>'Country')) }}
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_phoneNumber', 'Phone Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_phoneNumber', $staff->staff_phoneNumber, array('class'=>'form-control', 'placeholder'=>'Phone Number')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_mobileNumber', 'Mobile Number', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_mobileNumber', $staff->staff_mobileNumber, array('class'=>'form-control', 'placeholder'=>'Mobile Number')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('staff_isActive', 'Active?', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-1">
   			{{ Form::checkbox('staff_isActive', $staff->staff_isActive, $checkbox_enabled, array('class'=>'form-control', 'placeholder'=>'Active?')) }} 
   		</div>
   </div>

   {{ Form::hidden('staff_id', $staff->staff_id) }}

   <div class="form-custom-buttons">
      <a id="staff" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('stafflist', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   {{ Form::close() }}

   <br/><br/>