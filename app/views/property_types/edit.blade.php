<!-- IMS Edit Property Type Page -->

@section('title', 'Best Property Malta | Edit Property Type')

@include('common.property_errors')

{{ Form::open(array('url'=>'ims/property_types/update', 'class'=>'form-horizontal', 'id'=>'property-type-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit Property Type</h3>

	<div class="form-group">
   		{{ Form::label('property_type_name', 'Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('property_type_name', $property_type->property_type_name, array('class'=>'form-control', 'placeholder'=>'Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('property_type_description', 'Description', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::textarea('property_type_description', $property_type->property_type_description, array('class'=>'form-control', 'placeholder'=>'Description')) }} 
   		</div>
   </div>

   {{ Form::hidden('property_type_id', $property_type->property_type_id) }}

   <div class="form-custom-buttons">
      <a id="property-type" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('property_types', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   {{ Form::close() }}

   <br/><br/>