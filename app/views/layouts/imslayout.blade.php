<!-- IMS Layout Template -->

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
            <a class="navbar-brand" href="{{URL::route('imshome')}}">Best Property Malta | IMS</a>
         </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
               @if(Auth::check())

               	   @if(Auth::user()->getRole()=="Administrator")
	                  <li class="dropdown">
	                     <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Staff<b class="caret"></b></a>
	                     <ul class="dropdown-menu" role="menu">
	                        <li><a href="{{URL::route('stafflist')}}">List of Staff Members</a></li>
	                        <li><a href="{{URL::route('staff_roles')}}">List of Staff Roles</a></li>
	                     </ul>
	                  </li>
	                  <li class="dropdown">
	                     <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Customers<b class="caret"></b></a>
	                     <ul class="dropdown-menu" role="menu">
	                        <li><a href="{{URL::route('customers')}}">All Customers</a></li>
	                        <li><a href="{{URL::route('buyers')}}">Buyers</a></li>
	                        <li><a href="{{URL::route('vendors')}}">Vendors</a></li>
	                     </ul>
	                  </li>
	                  <li class="dropdown">
	                     <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Properties<b class="caret"></b></a>
	                     <ul class="dropdown-menu" role="menu">
	                        <li><a href="{{URL::route('property_types')}}">Property Types</a></li>
	                        <li><a href="{{URL::route('property_statuses')}}">Property Statuses</a></li>
	                     </ul>
	                  </li>
                  @endif

                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Offers<b class="caret"></b></a>
                     <ul class="dropdown-menu" role="menu">


                        <li><a href="{{URL::route('offers')}}">Active Offers</a></li>
                        <li><a href="{{URL::route('cancelledoffers')}}">Inactive Offers</a></li>

                     	@if(Auth::user()->getRole()=="Administrator")                      
                        	<li><a href="{{URL::route('offer_statuses')}}">Offer Statuses</a></li>
                        @endif

                     </ul>
                  </li>
               @endif
            </ul>
      
            <ul class="nav navbar-nav navbar-right">
               <li><a href="{{URL::route('home')}}" target="_blank">Website</a></li>
               <li><a href="{{URL::route('cmshome')}}" target="_blank">CMS</a></li>
               @if(Auth::check())
                  <li><a href="{{URL::route('staff', Auth::user()->getStaffId())}}">Welcome {{Auth::user()->getName()}}</a></li>
                  <li><a href="{{URL::route('imsloggedout')}}">Logout</a></li>
               @else
                  <li><a href="{{URL::route('imslogin')}}">Login</a></li>
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