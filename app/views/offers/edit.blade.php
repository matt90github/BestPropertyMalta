<!-- IMS Edit Offer Page -->

@section('title', 'Best Property Malta | Edit Offer')
@include('common.offer_errors')

{{ Form::open(array('url'=>'ims/offers/update', 'class'=>'form-horizontal', 'id'=>'offer-details',  'role'=>'form', 'method' => 'PUT')) }}

   <h3 class="form-signup-heading">Edit Offer</h3>

   <div class="form-group">
         {{ Form::label('offer_value', 'Offer Value', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::text('offer_value', $offer->offer_value, array('class'=>'form-control', 'placeholder'=>'Offer Value')) }} 
         </div>
   </div>

	<div class="form-group">
   		{{ Form::label('offer_propertyId', 'Property', array('class'=>'col-sm-2 control-label')) }} 

   		<div class="col-sm-3">
   			{{ Form::select('offer_propertyId', $offer_property, $offer->offer_propertyId, array('class'=>'form-control', 'placeholder'=>'Property')) }}
   		</div>
   </div>

   <div class="form-group">
         {{ Form::label('offer_buyerId', 'Buyer', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('offer_buyerId', $offer_buyer, $offer->offer_buyerId, array('class'=>'form-control', 'placeholder'=>'Buyer')) }}
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('offer_statusId', 'Status', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('offer_statusId', $offer_status, $offer->offer_statusId, array('class'=>'form-control', 'placeholder'=>'Status')) }}
         </div>
   </div>

   {{ Form::hidden('offer_id', $offer->offer_id) }}

   <div class="form-custom-buttons">
      <a id="offer" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Update</a>
      {{link_to_route('offers', 'Cancel', null, array('class'=>'btn btn-default'))}}
   </div>

   {{ Form::close() }}

   <br/><br/>