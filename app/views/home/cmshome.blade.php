<!-- CMS Home Page -->

@section('title', 'Best Property Malta | CMS Home')

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
    <p>Welcome to Best Property Malta's CMS. 
    	You are currently logged in as {{Auth::user()->getRole()}}. </p>
    <a class="btn btn-success btn-large" href="{{URL::route('home')}}" target="_blank">Official Website &raquo;</a>
	
	@if (Auth::user()->getRole()!="Content Editor")
		<a class="btn btn-success btn-large" href="{{URL::route('imshome')}}" target="_blank">IMS &raquo;</a>
    @endif

    <a class="btn btn-danger btn-large" href="{{URL::route('cmsloggedout')}}">Logout</a>
</div>

<div class="row">

	@if (Auth::user()->getRole()=="Administrator" || Auth::user()->getRole()=="Estate Agent")
	    <div class="span4">
	    	<h2>Properties</h2>

			<?php  $imageUrl = '/img/my-property.jpg' ?>
	                    
		    <a href="{{URL::route('properties')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

	    	<p>This section lists all the currently active properties and their status. You can add, edit and remove properties. </p>
	    	<a class="btn btn-primary btn-large" href="{{URL::route('properties')}}">View Details &raquo;</a>
		</div>
	@endif

	@if (Auth::user()->getRole()=="Administrator" || Auth::user()->getRole()=="Content Editor")
		<div class="span4">
		    <h2>Property Images</h2>

			<?php  $imageUrl = '/img/images.jpg' ?>
	                    
		    <a href="{{URL::route('images')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

		    <p>Here you can see a list of uploaded property images and filter them by property. You can also upload new images associated with a particular property.</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('images')}}">View Details &raquo;</a>
		    <a class="btn btn-primary btn-large" href="{{URL::route('new_images')}}">Upload &raquo;</a>
		</div>

		<div class="span4">
		    <h2>Banner Images</h2>

			<?php  $imageUrl = '/img/banners.jpg' ?>
	                    
		    <a href="{{URL::route('banner_images')}}">
		        {{ HTML::image($imageUrl) }}
		    </a>

		    <p>Here you can see a list of uploaded banner images for the website. You can also upload new banner images.</p>
		    <a class="btn btn-primary btn-large" href="{{URL::route('banner_images')}}">View Details &raquo;</a>
		    <a class="btn btn-primary btn-large" href="{{URL::route('new_banner_images')}}">Upload &raquo;</a>
		</div>


		@if (Auth::user()->getRole()=="Administrator")
		</div>
			<div class="row">	
		@endif
				<div class="span4">
				    <h2>Pages</h2>

					<?php  $imageUrl = '/img/pages.jpg' ?>
			                    
				    <a href="{{URL::route('pages')}}">
				        {{ HTML::image($imageUrl) }}
				    </a>

				    <p>A list of website pages is shown in this section. You can add, edit and remove pages.</p>
				    <a class="btn btn-primary btn-large" href="{{URL::route('pages')}}">View Details &raquo;</a>
				</div>
		@if (Auth::user()->getRole()=="Administrator")
			</div>
		@endif
	
	@endif
</div>
