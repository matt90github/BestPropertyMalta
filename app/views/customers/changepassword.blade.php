<!-- IMS Change Customer Password Page -->

@section('title', 'Best Property Malta | Change Password')
@include('common.customer_errors')

{{ Form::open(array('url'=>'ims/customers/updatepassword', 'class'=>'form-horizontal', 'id'=>'customer-password-details',  'role'=>'form', 'method' => 'PUT')) }}
   
   <h3 class="form-signup-heading">Change Password</h3>
 
	<div class="form-group">
   		{{ Form::label('customer_old_password', 'Existing Password', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::password('customer_old_password', array('class'=>'form-control', 'placeholder'=>'Existing Password')) }} 
   		</div>
   </div>

   <div class="form-group">
         {{ Form::label('customer_new_password', 'New Password', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::password('customer_new_password', array('class'=>'form-control', 'placeholder'=>'New Password')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('customer_new_password_confirmation', 'Confirm New Password', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::password('customer_new_password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm New Password')) }} 
         </div>
   </div>

   {{ Form::hidden('customer_id', $customer->customer_id) }}

   <div class="form-custom-buttons">
      <a id="update-password" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update Password</a>
      {{link_to_route('customers', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   <br/><br/>
{{ Form::close() }}

