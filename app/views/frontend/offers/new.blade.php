<!-- Official Website New Offer Page -->

@section('title', 'Best Property Malta | New Offer')
@include('common.offer_errors')

{{ Form::open(array('url'=>'offers/create', 'class'=>'form-horizontal', 'id'=>'offer-details',  'role'=>'form')) }}
   
   <h3 class="form-signup-heading">New Offer</h3>
 
  <div class="form-group">
         {{ Form::label('offer_value', 'Offer Value', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::text('offer_value', $offer_price, array('class'=>'form-control', 'placeholder'=>'Offer Value')) }} 
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('offer_propertyId', 'Property', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('offer_propertyId', $offer_property, Input::old('offer_propertyId'), array('class'=>'form-control', 'readOnly'=>'true', 'placeholder'=>'Property')) }}
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('offer_buyerId', 'Buyer', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('offer_buyerId', $offer_buyer, Input::old('offer_buyerId'), array('class'=>'form-control', 'readOnly'=>'true', 'placeholder'=>'Buyer')) }}
         </div>
   </div>

   <div class="form-group">
         {{ Form::label('offer_statusId', 'Status', array('class'=>'col-sm-2 control-label')) }} 

         <div class="col-sm-3">
            {{ Form::select('offer_statusId', $offer_status, Input::old('offer_statusId'), array('class'=>'form-control', 'readOnly'=>'true', 'placeholder'=>'Status')) }}
         </div>
   </div>

   {{ Form::hidden('offer_price', $offer_price) }}

   <div class="form-custom-buttons">
         <a id="offer" href="#" class="btn btn-primary" onclick="$(this).closest('form').submit();return false;">Make Offer</a>
         {{link_to_route('webproperty', 'Cancel', $offer_propertyId, array('class'=>'btn btn-default'))}}
   </div>
   
   <br/><br/>
{{ Form::close() }}