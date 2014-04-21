<!-- Official Website Layout Template -->

<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	{{ HTML::script('js/jquery-1.11.0.min.js') }}
	{{ HTML::script('js/jquery.validate.min.js') }}
   {{ HTML::script('js/lightbox-2.6.min.js') }}
	{{ HTML::script('js/customer-form-validator.js') }}
   {{ HTML::script('js/property-form-validator.js') }}
   {{ HTML::script('js/staff-form-validator.js') }}
   {{ HTML::script('js/offer-form-validator.js') }}
   {{ HTML::script('js/jquery.bxslider.js') }}
   {{ HTML::script('js/contactus-form-validator.js') }}
	{{ HTML::script('js/bootstrap-datepicker.js') }}
   {{ HTML::script('js/bootstrap.js') }}
   {{ HTML::script('js/infinitescroll.js') }}
   {{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/datepicker.css') }}
	{{ HTML::style('css/main.css')}}
   {{ HTML::style('css/basic.css')}}
   {{ HTML::style('css/lightbox.css')}}
   {{ HTML::style('css/jquery.bxslider.css') }}

</head>
<body>
   <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::route('home')}}">Best Property Malta</a>
         </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               <li><a href="{{URL::route('aboutus')}}">About Us</a></li>
               <li><a href="{{URL::route('webproperties')}}">Properties for Sale</a></li>
               
               @if(Auth::check() AND Auth::user()->getType() == 'Vendor' )
                  <li><a href="{{URL::route('mywebproperties')}}">My Properties</a></li>
               @endif

               @if(Auth::check() AND Auth::user()->getType() == 'Buyer' )
                  <li><a href="{{URL::route('mywebproperties')}}">My Properties</a></li>
               @endif

               <li><a href="{{URL::route('newquery')}}">Contact Us</a></li>            
            </ul>
   
            {{ Form::open(array('url'=>'search', 'class'=>'navbar-form navbar-left', 'role'=>'search')) }}
               <div class="form-group">

                  <input type="search" id="search_box" name="searchterms" class="search_box form-control" placeholder="Search" style="width:200px;">
               </div>
                <button class="search_button btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            {{ Form::close() }}

            <ul class="nav navbar-nav navbar-right">
               <li><a href="{{URL::route('cmshome')}}" target="_blank">CMS</a></li>
               <li><a href="{{URL::route('imshome')}}" target="_blank">IMS</a></li>
               @if(Auth::check())
                  <li><a href="{{URL::route('customer_profile')}}">My Profile</a></li>
                  <li><a href="{{URL::route('customerloggedout')}}">Logout</a></li>
               @else
                  <li><a href="{{URL::route('customerlogin')}}">Login</a></li>
                  <li><a href="{{URL::route('newcustomer')}}">Register</a></li>
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
      <div class="footer-bar-main">
         <div id="copyright-text-main">© Copyright 2014 Best Property Malta</div>
      </div>

   </div>
	
</body>
</html>