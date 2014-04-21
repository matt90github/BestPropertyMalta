<!-- CMS Layout Template -->

<!DOCTYPE html>
<html>
<head>
   <title>@yield('title')</title>
   {{ HTML::script('js/jquery-1.11.0.min.js') }}
   {{ HTML::script('js/jquery.validate.min.js') }}
   {{ HTML::script('js/lightbox-2.6.min.js') }}
   {{ HTML::script('js/customer-form-validator.js') }}
   {{ HTML::script('js/property-form-validator.js') }}
   {{ HTML::script('js/offer-form-validator.js') }}
   {{ HTML::script('js/staff-form-validator.js') }}
   {{ HTML::script('js/page-form-validator.js') }}
   {{ HTML::script('js/bootstrap-datepicker.js') }}
   {{ HTML::script('js/bootstrap.js') }}
   {{ HTML::script('js/infinitescroll.js') }}
   {{ HTML::style('css/backend_bootstrap.css') }}
   {{ HTML::style('css/bootstrap.min.css') }}
   {{ HTML::style('css/datepicker.css') }}
   {{ HTML::style('css/main.css')}}
   {{ HTML::style('css/basic.css')}}
   {{ HTML::style('css/lightbox.css')}}


</head>
<body>
   <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::route('cmshome')}}">Best Property Malta | CMS</a>
         </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               @if(Auth::check())

               	  @if(Auth::user()->getRole()=="Administrator" || Auth::user()->getRole()=="Estate Agent")
	                  <li class="dropdown">
	                     <a href="#" class="c disabled" data-toggle="dropdown">Properties<b class="caret"></b></a>
	                     <ul class="dropdown-menu" role="menu">
	                        <li><a href="{{URL::route('properties')}}">List of Properties</a></li>
	                        <li><a href="{{URL::route('propertiesforsale')}}">Properties for Sale</a></li>
	                        <li><a href="{{URL::route('stcproperties')}}">Properties Sold STC</a></li>
	                        <li><a href="{{URL::route('soldproperties')}}">Properties Sold</a></li>
	                     </ul>
	                  </li>
                  @endif

               	  @if(Auth::user()->getRole()=="Administrator" || Auth::user()->getRole()=="Content Editor")
	                  <li class="dropdown">
	                     <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Property Images<b class="caret"></b></a>
	                     <ul class="dropdown-menu" role="menu">
	                        <li><a href="{{URL::route('images')}}">List of Images</a></li>
	                        <li><a href="{{URL::route('new_images')}}">Upload New Images</a></li>
	                     </ul>
	                  </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Banner Images<b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="{{URL::route('banner_images')}}">List of Images</a></li>
                           <li><a href="{{URL::route('new_banner_images')}}">Upload New Images</a></li>
                        </ul>
                     </li>
	                  <li class="dropdown">
	                     <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Pages<b class="caret"></b></a>
	                     <ul class="dropdown-menu" role="menu">
	                        <li><a href="{{URL::route('pages')}}">List of Pages</a></li>
	                     </ul>
	                  </li>
                  @endif
                      
               @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
               <li><a href="{{URL::route('home')}}" target="_blank">Website</a></li>


 				@if(Auth::guest())
	               		<li><a href="{{URL::route('imshome')}}" target="_blank">IMS</a></li>
				@elseif(Auth::check())
	               	@if (Auth::user()->getRole()!="Content Editor")
	               		<li><a href="{{URL::route('imshome')}}" target="_blank">IMS</a></li>
	    			@endif
	    		@endif

                @if(Auth::check())
                  <li><a href="#">Welcome {{Auth::user()->getName()}}</a></li>
                  <li><a href="{{URL::route('cmsloggedout')}}">Logout</a></li>
                @else
                  <li><a href="{{URL::route('cmslogin')}}">Login</a></li>
                @endif
            </ul>
         </div>
      </div>
   </nav>   
 
   <div class="container">
      @if(Session::has('message'))
         <div class="alert alert-success alert-block">
            {{ Session::get('message') }}
         </div>
      @endif

      @if(Session::has('error-message'))
         <div class="alert alert-danger alert-block">
            {{ Session::get('error-message') }}
         </div>
      @endif
      
      {{ $content }}
   </div>

   <div class="footer">
      <div class="footer-bar">
         <div id="copyright-text">© Copyright 2014 Best Property Malta</div>
      </div>
   </div>
   
</body>
</html>