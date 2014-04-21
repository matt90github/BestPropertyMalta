<!-- IMS New Property Type Page -->

@section('title', 'Best Property Malta | New Property Type')

@include('common.property_errors')

{{ Form::open(array('url'=>'ims/property_types/create', 'class'=>'form-horizontal', 'id'=>'property-type-details',  'role'=>'form')) }}
   
   <h3 class="form-signup-heading">New Property Type</h3>
 
   <div class="form-group">
         {{ Form::label('property_type_name', 'Name', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::text('property_type_name', Input::old('property_type_name'), array('class'=>'form-control', 'placeholder'=>'Name')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('property_type_description', 'Description', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::textarea('property_type_description', Input::old('property_type_description'), array('class'=>'form-control', 'placeholder'=>'Description')) }} 
         </div>
   </div>

   <div class="form-custom-buttons">
      <a id="property-type" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Add Property Type</a>
      {{link_to_route('property_types', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   <br/><br/>
{{ Form::close() }}

