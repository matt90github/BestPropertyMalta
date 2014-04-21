<!-- Official Website Contact Us Page -->

@section('title', 'Best Property Malta | Contact Us')
@include('common.contactus_errors')

{{ Form::open(array('url'=>'query/create', 'class'=>'form-horizontal', 'id'=>'contactus-details',  'role'=>'form')) }}
   
   <h3 class="form-signup-heading">Contact Us</h3>

   <div id="address">
      <p>Head Office:<br/>
         102, Main Street,<br/>
         Fgura, FGR1000,<br/>
         Malta<br/>
         <br/>
         Phone Number: +356 20930178<br/>
         Email Address: info@bestpropertymalta.com<br/>
      </p>
   </div>

   <br/>
   
   <div class="form-group">
         {{ Form::label('customer_title', 'Title', array('class'=>'col-sm-2 control-label')) }} 

         @if (Auth::check())
            <div class="col-sm-2">
               {{ Form::text('customer_title', $customer->customer_title, array('class'=>'form-control', 'placeholder'=>'Title', 'readOnly'=>'true')) }}
            </div>
         @else
            <div class="col-sm-2">
               {{ Form::select('customer_title', $customer_title, Input::old('customer_title'), array('class'=>'form-control', 'placeholder'=>'Title')) }}
            </div>
         @endif
   </div>

   <div class="form-group">
         {{ Form::label('customer_firstName', 'First Name', array('class'=>'col-sm-2 control-label')) }} 

         @if (Auth::check())
            <div class="col-sm-3">
               {{ Form::text('customer_firstName', $customer->customer_firstName, array('class'=>'form-control', 'placeholder'=>'First Name', 'readOnly'=>'true')) }} 
            </div>
         @else
            <div class="col-sm-3">
               {{ Form::text('customer_firstName', Input::old('customer_firstName'), array('class'=>'form-control', 'placeholder'=>'First Name')) }} 
            </div>
         @endif
   </div>

   <div class="form-group">
         {{ Form::label('customer_lastName', 'Last Name', array('class'=>'col-sm-2 control-label')) }} 

         @if (Auth::check())
            <div class="col-sm-3">
               {{ Form::text('customer_lastName', $customer->customer_lastName, array('class'=>'form-control', 'placeholder'=>'Last Name', 'readOnly'=>'true')) }} 
            </div>
         @else
            <div class="col-sm-3">
               {{ Form::text('customer_lastName', Input::old('customer_lastName'), array('class'=>'form-control', 'placeholder'=>'Last Name')) }} 
            </div>
         @endif
   </div>

   <div class="form-group">
         {{ Form::label('customer_emailAddress', 'Email Address', array('class'=>'col-sm-2 control-label')) }} 

         @if (Auth::check())
            <div class="col-sm-3">
               {{ Form::text('customer_emailAddress', $customer->customer_emailAddress, array('class'=>'form-control', 'placeholder'=>'Email Address', 'readOnly'=>'true')) }} 
            </div>
         @else
            <div class="col-sm-3">
               {{ Form::text('customer_emailAddress', Input::old('customer_emailAddress'), array('class'=>'form-control', 'placeholder'=>'Email Address')) }} 
            </div>
         @endif
   </div>

   <div class="form-group">
         {{ Form::label('contactus_query', 'Query', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-5">
            {{ Form::textarea('contactus_query', Input::old('contactus_query'), array('class'=>'form-control', 'placeholder'=>'Query')) }} 
         </div>
   </div>

   <div class="form-custom-buttons">
      <a id="query" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Submit Query</a>
      {{link_to_route('home', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   <br/><br/>
{{ Form::close() }}

