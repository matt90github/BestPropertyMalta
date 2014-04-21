<!-- Official Website Home Page -->

@section('title', 'Best Property Malta | Home')

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

    @if(Auth::check())
    	<h1><?php echo $welcome; ?>{{Auth::user()->getFirstName()}}</h1>
	    <p>Welcome to Best Property Malta's Official Website. 
	    	You are currently logged in as a {{Auth::user()->getType()}}. </p>
	    		<a class="btn btn-primary btn-large" href="{{URL::route('customer_profile')}}">My Profile &raquo;</a>
	    <a class="btn btn-success btn-large" href="{{URL::route('cmshome')}}" target="_blank">CMS &raquo;</a>
		<a class="btn btn-success btn-large" href="{{URL::route('imshome')}}" target="_blank">IMS &raquo;</a>
	    <a class="btn btn-danger btn-large" href="{{URL::route('customerloggedout')}}">Logout</a>
    @else
    	<h1><?php echo $welcome; ?>Guest</h1>
	    <p>Welcome to Best Property Malta's Official Website.</p>
	    <a class="btn btn-success btn-large" href="{{URL::route('customerlogin')}}">Login</a>
	    <a class="btn btn-success btn-large" href="{{URL::route('newcustomer')}}">Register</a>
    @endif
</div>

@if($banner_images!=null)
	<ul class="bxslider">
	    @foreach($banner_images as $banner_image)
	     	<li>
	     		<?php $bannerImageUrl = 'uploads/bannerImages/'.$banner_image->banner_image_name; ?>
	      		{{ HTML::image($bannerImageUrl, $banner_image->banner_image_name) }}
	      	</li>
	    @endforeach
	</ul>
@endif

<div class="row">
    <div class="span4">
    	<h2>Properties for Sale</h2>

		<?php  $imageUrl = '/img/for-sale.jpg' ?>
                    
        <a href="{{URL::route('webproperties')}}">
           {{ HTML::image($imageUrl) }}
        </a>

    	<p>Here you can browse through the list of all the properties that are currently for sale.
    	You can filter the properties by type and/or location.</p>
    	<a class="btn btn-primary btn-large" href="{{URL::route('webproperties')}}">View Details &raquo;</a>
	</div>

	@if(Auth::check() AND Auth::user()->getType()=='Buyer')
		<div class="span4">
		    <h2>My Properties</h2>

			<?php  $imageUrl = '/img/my-property.jpg' ?>
	                    
	        <a href="{{URL::route('mywebproperties')}}">
	           {{ HTML::image($imageUrl) }}
	        </a>

		    <p>In this section you can find a list of active properties added to your wishlist or 
		    for which you have made an offer, as well as those properties sold to you.</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('mywebproperties')}}">View Details &raquo;</a>
		</div>

	@elseif(Auth::check() AND Auth::user()->getType()=='Vendor')
		<div class="span4">
		    <h2>My Properties</h2>

		    <?php  $imageUrl = '/img/my-property.jpg' ?>
                    
	        <a href="{{URL::route('mywebproperties')}}">
	           {{ HTML::image($imageUrl) }}
	        </a>

		    <p>In this section a list of properties which you are selling can be found.</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('mywebproperties')}}">View Details &raquo;</a>
		</div>
	@endif

	@if(Auth::check())
		<div class="row">
			<div class="span4">
			    <h2>Contact Us</h2>

				<?php  $imageUrl = '/img/contact-us.jpg' ?>
		                    
			    <a href="{{URL::route('newquery')}}">
			        {{ HTML::image($imageUrl) }}
			    </a>

			    <p>Let us know if you have any questions. We will be happy to assist you!</p>
			    <a class="btn btn-primary btn-large" href="{{URL::route('newquery')}}">View Details &raquo;</a>
			</div>
		</div>
	@else
		<div class="span4">
		    <h2>Contact Us</h2>

			<?php  $imageUrl = '/img/contact-us.jpg' ?>
		                    
			<a href="{{URL::route('newquery')}}">
			    {{ HTML::image($imageUrl) }}
			</a>

		    <p>Let us know if you have any questions. We will be happy to assist you!</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('newquery')}}">View Details &raquo;</a>
		</div>
	@endif

	@if($aboutus!=null)
		<div class="span4">
		    <h2>About Us</h2>

			<?php  $imageUrl = '/img/bestproperty.png' ?>
	                    
		    <a href="{{URL::route('aboutus')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

		    <p>We are one of the leading estate agencies in Malta. Find out why!</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('aboutus')}}">View Details &raquo;</a>
		</div>
	@endif
</div>

<script type="text/javascript">
	$('.bxslider').bxSlider({
	  auto: true,
	  mode: 'fade',
	  stopAuto: false,
	  speed: 1500
	});
</script>