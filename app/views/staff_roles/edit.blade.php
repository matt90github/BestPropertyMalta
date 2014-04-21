<!-- IMS Edit Staff Role Page -->

@section('title', 'Best Property Malta | Edit Staff Role')

@include('common.staff_errors')

{{ Form::open(array('url'=>'ims/staff_roles/update', 'class'=>'form-horizontal', 'id'=>'staff-role-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit Staff Role</h3>

	<div class="form-group">
   		{{ Form::label('staff_role_name', 'Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('staff_role_name', $staff_role->staff_role_name, array('class'=>'form-control', 'placeholder'=>'Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('staff_role_description', 'Description', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::textarea('staff_role_description', $staff_role->staff_role_description, array('class'=>'form-control', 'placeholder'=>'Description')) }} 
   		</div>
   </div>

   {{ Form::hidden('staff_role_id', $staff_role->staff_role_id) }}

   <div class="form-custom-buttons">
      <a id="staff-role" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('staff_roles', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   {{ Form::close() }}

   <br/><br/>