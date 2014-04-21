<!-- CMS New Property Page -->

@section('title', 'Best Property Malta | New Property')
@include('common.property_errors')

{{ Form::open(array('url'=>'cms/properties/create', 'files' => true, 'class'=>'form-horizontal', 'id'=>'property-details',  'role'=>'form')) }}
   
   <h3 class="form-signup-heading">New Property</h3>
 
	<div class="form-group">
   		{{ Form::label('property_typeId', 'Type', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::select('property_typeId', $property_typeId, Input::old('property_typeId'), array('class'=>'form-control', 'placeholder'=>'Type')) }}
   		</div>
   </div>

   <div class="form-group">
         {{ Form::label('property_statusId', 'Status', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('property_statusId', $property_statusId, Input::old('property_statusId'), array('class'=>'form-control', 'placeholder'=>'Status')) }}
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('property_vendorId', 'Vendor', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('property_vendorId', $property_vendorId, Input::old('property_vendorId'), array('class'=>'form-control', 'placeholder'=>'Vendor')) }}
         </div>
   </div>

   <div class="form-group">
   		{{ Form::label('property_name', 'Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('property_name', Input::old('property_name'), array('class'=>'form-control', 'placeholder'=>'Name')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('property_description', 'Description', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-4">
   			{{ Form::textarea('property_description', Input::old('property_description'), array('class'=>'form-control', 'placeholder'=>'Description')) }} 
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('property_locationId', 'Location', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
            {{ Form::select('property_locationId', $property_locationId, Input::old('property_locationId'), array('class'=>'form-control', 'placeholder'=>'Location')) }}
   		</div>
   </div>

   <div class="form-group">
   		{{ Form::label('property_squareMetres', 'Square Metres', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-2">
   			{{ Form::text('property_squareMetres', Input::old('property_squareMetres'), array('class'=>'form-control', 'placeholder'=>'Square Metres')) }} 
   		</div>
   </div>

   <div class="form-group">
         {{ Form::label('property_bathrooms', 'No. of Bathrooms', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-2">
            {{ Form::text('property_bathrooms', Input::old('property_bathrooms'), array('class'=>'form-control', 'placeholder'=>'No. of Bathrooms')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('property_bedrooms', 'No. of Bedrooms', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-2">
            {{ Form::text('property_bedrooms', Input::old('property_bedrooms'), array('class'=>'form-control', 'placeholder'=>'No. of Bedrooms')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('property_hasGarage', 'Has Garage?', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-1">
            {{ Form::checkbox('property_hasGarage', Input::old('property_hasGarage'), false, array('class'=>'form-control', 'placeholder'=>'Has Garage?')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('property_hasGarden', 'Has Garden?', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-1">
            {{ Form::checkbox('property_hasGarden', Input::old('property_hasGarden'), false, array('class'=>'form-control', 'placeholder'=>'Has Garden?')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('property_price', 'Price (€)', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-2">
            {{ Form::text('property_price', Input::old('property_price'), array('class'=>'form-control', 'placeholder'=>'Price (€)')) }} 
         </div>
   </div>
   
   <div class="form-group">
   		{{ Form::label('property_isActive', 'Active?', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-1">
   			{{ Form::checkbox('property_isActive', Input::old('property_isActive'), true, array('class'=>'form-control', 'placeholder'=>'Active?')) }} 
   		</div>
   </div>

   <div class="form-custom-buttons">
         <a id="property" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Add Property</a>
         {{link_to_route('properties', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   <br/><br/>
{{ Form::close() }}

