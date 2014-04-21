<!-- IMS Edit Offer Status Page -->

@section('title', 'Best Property Malta | Edit Offer Status')
@include('common.offer_errors')

{{ Form::open(array('url'=>'ims/offer_statuses/update', 'class'=>'form-horizontal', 'id'=>'offer-status-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit Offer Status</h3>

	<div class="form-group">
   		{{ Form::label('offer_status_name', 'Name', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::text('offer_status_name', $offer_status->offer_status_name, array('class'=>'form-control', 'placeholder'=>'Name')) }} 
   		</div>
   </div>

	<div class="form-group">
   		{{ Form::label('offer_status_description', 'Description', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::textarea('offer_status_description', $offer_status->offer_status_description, array('class'=>'form-control', 'placeholder'=>'Description')) }} 
   		</div>
   </div>

   {{ Form::hidden('offer_status_id', $offer_status->offer_status_id) }}

   <div class="form-custom-buttons">
      <a id="offer-status" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('offer_statuses', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>


   {{ Form::close() }}

   <br/><br/>