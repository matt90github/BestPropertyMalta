<!-- IMS Edit Property Status Page -->

@section('title', 'Best Property Malta | Edit Property Status')

@include('common.property_errors')

{{ Form::open(array('url'=>'ims/property_statuses/update', 'class'=>'form-horizontal', 'id'=>'property-status-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit Property Status</h3>

	<div class="form-group">
   		{{ Form::label('property_status_name', 'Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('property_status_name', $property_status->property_status_name, array('class'=>'form-control', 'placeholder'=>'Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('property_status_description', 'Description', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::textarea('property_status_description', $property_status->property_status_description, array('class'=>'form-control', 'placeholder'=>'Description')) }} 
   		</div>
   </div>

   {{ Form::hidden('property_status_id', $property_status->property_status_id) }}

   <div class="form-custom-buttons">
      <a id="property-status" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('property_statuses', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>


   {{ Form::close() }}

   <br/><br/>