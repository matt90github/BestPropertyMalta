<!-- Official Website Customer Login Page -->

	@section('title', 'Best Property Malta | Login')
   @include('common.customer_errors')

	{{ Form::open(array('url'=>'customer/signedin', 'class'=>'form-signin', 'id'=>'login-details', 'role'=>'form', 'method' => 'POST')) }}
	{{ Form::token() }}
   
   <h2 class="form-signin-heading">Customer Login</h2>
   <br/>

   <div class="form-group"> 
      {{ Form::text('customer_emailAddress', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
      <br/>
      {{ Form::password('customer_password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
   </div>

   <a id="customer-login" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Login</a>
   {{link_to_route('home', 'Cancel', null, array('class'=>'btn btn-default'))}}

   {{ Form::close() }}