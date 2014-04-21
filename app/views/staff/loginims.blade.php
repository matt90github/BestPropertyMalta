<!-- IMS Staff Member Login Page -->

@section('title', 'Best Property Malta | IMS Login')

	@include('common.staff_errors')

	{{ Form::open(array('url'=>'ims/staff/signedin', 'class'=>'form-signin', 'id'=>'staff-login-details', 'role'=>'form', 'method' => 'POST')) }}
	{{ Form::token() }}

   <h2 class="form-signin-heading">IMS Login</h2>
   <br/>

   <div class="form-group"> 
      {{ Form::text('staff_emailAddress', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
      <br/>
      {{ Form::password('staff_password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
   </div>
   
   <a id="property-login" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Login</a>
   {{ Form::close() }}


 