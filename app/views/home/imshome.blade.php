<!-- IMS Home Page -->

@section('title', 'Best Property Malta | IMS Home')

<?php  
	$welcome = 'Hi ';
	if (date("H") < 12) {
	    $welcome = 'Good Morning ';
	} else if (date('H') > 11 && date("H") < 18) {
	    $welcome = 'Good Afternoon ';
	} else if(date('H') > 17) {
	    $welcome = 'Good Evening ';
	}
?>

<div class="hero-unit">
    <h1><?php echo $welcome; ?>{{Auth::user()->getFirstName()}}</h1>
    <p>Welcome to Best Property Malta's IMS. 
    	You are currently logged in as {{Auth::user()->getRole()}}. </p>
	<a class="btn btn-primary btn-large" href="{{URL::route('staff', Auth::user()->getStaffId())}}">My Profile &raquo;</a>
	
    @if (Auth::user()->getRole()=="Administrator")
	    {{ Form::open(array('id' => 'newsletter-details', 'url' => 'ims/newsletter/create', 'method' => 'POST', 'style'=>'display: inline;')) }}﻿
	    <a id="send-newsletter" href="#" class="btn btn-success" onclick="$(this).closest('form').submit();return false;">Send Newsletter</a>
	    {{ Form::close() }}
    @endif

	<a class="btn btn-success btn-large" href="{{URL::route('home')}}" target="_blank">Official Website &raquo;</a>
	<a class="btn btn-success btn-large" href="{{URL::route('cmshome')}}" target="_blank">CMS &raquo;</a>

	<a class="btn btn-danger btn-large" href="{{URL::route('imsloggedout')}}">Logout</a>
</div>

<div class="row">

	@if (Auth::user()->getRole()=="Administrator")
	    <div class="span4">
	    	<h2>Staff</h2>

			<?php  $imageUrl = '/img/staff.jpg' ?>
	                    
		    <a href="{{URL::route('stafflist')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

	    	<p>This section lists all the currently active staff members and roles. You can add, edit and remove staff members and roles. </p>
	    	<a class="btn btn-primary btn-large" href="{{URL::route('stafflist')}}">View Details &raquo;</a>
	    	<a class="btn btn-primary btn-large" href="{{URL::route('staff_roles')}}">Roles &raquo;</a>
		</div>


		<div class="span4">
		    <h2>Customers</h2>

			<?php  $imageUrl = '/img/customers.jpg' ?>
	                    
		    <a href="{{URL::route('customers')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

	    	<p>This section lists all the currently active website customers. You can add, edit and remove customers. </p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('customers')}}">View Details &raquo;</a>
		</div>


		<div class="span4">
		    <h2>Property Types</h2>

			<?php  $imageUrl = '/img/my-property.jpg' ?>
	                    
		    <a href="{{URL::route('property_types')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

		    <p>A list of property types and statuses is shown in this section. You can add, edit and remove property types and statuses.</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('property_types')}}">View Details &raquo;</a>
		    <a class="btn btn-primary btn-large" href="{{URL::route('property_statuses')}}">Property Statuses &raquo;</a>
		</div>
	@endif

</div>

<div class="row">
	<div class="span4">
	    <h2>Offers</h2>

		<?php  $imageUrl = '/img/offer.jpg' ?>
                    
	    <a href="{{URL::route('offers')}}">
	        {{ HTML::image($imageUrl) }}
	    </a>

	   	@if (Auth::user()->getRole()=="Administrator")
	    	<p>Here you can find a list of offers made by customers, and their corresponding statuses. You can add, edit and remove offers and offer statuses.</p>
	    @elseif (Auth::user()->getRole()=="Estate Agent")
	    	<p>Here you can find a list of offers made by customers. You can add, edit and remove offers.</p>
	    @endif

	    <a class="btn btn-primary btn-large" href="{{URL::route('offers')}}">View Details &raquo;</a>
	    
	    @if (Auth::user()->getRole()=="Administrator")
	    	<a class="btn btn-primary btn-large" href="{{URL::route('offer_statuses')}}">Offer Statuses &raquo;</a>
	    @endif

	</div>
</div>
