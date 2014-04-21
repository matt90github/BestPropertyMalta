<!-- IMS Change Staff Member Password Page -->

@section('title', 'Best Property Malta | Change Password')
@include('common.staff_errors')

{{ Form::open(array('url'=>'ims/staff/updatepassword', 'class'=>'form-horizontal', 'id'=>'staff-password-details',  'role'=>'form', 'method' => 'PUT')) }}
   
   <h3 class="form-signup-heading">Change Password</h3>
 
	<div class="form-group">
   		{{ Form::label('staff_old_password', 'Existing Password', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::password('staff_old_password', array('class'=>'form-control', 'placeholder'=>'Existing Password')) }} 
   		</div>
   </div>

   <div class="form-group">
         {{ Form::label('staff_new_password', 'New Password', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::password('staff_new_password', array('class'=>'form-control', 'placeholder'=>'New Password')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('staff_new_password_confirmation', 'Confirm New Password', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::password('staff_new_password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm New Password')) }} 
         </div>
   </div>

   {{ Form::hidden('staff_id', $staff->staff_id) }}

   <div class="form-custom-buttons">
      <a id="update-password" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update Password</a>
      {{link_to_route('stafflist', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   <br/><br/>
{{ Form::close() }}

