<!-- Official Website Properties Details Page -->

@section('title', 'Best Property Malta | '.e($property->property_name))

<a href="{{ URL::route('webproperties') }}"
    class="btn btn-primary">
    <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Properties
</a>

@if(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == false 
                  AND $property_offerRejected == false AND $property_status == 'For Sale' 
                  AND $property_interested == false)

    {{ Form::open(array('id' => 'interest-details', 'url' => 'interests/create', 'method' => 'POST', 'style'=>'display: inline;')) }}﻿
    
    <a id="add-watch" href="#" class="btn btn-success" onclick="$(this).closest('form').submit();return false;">
                                <span class="glyphicon glyphicon-plus"></span> Wishlist</a>
    {{ Form::hidden('property_id', $property->property_id) }}
    {{ Form::close() }}

@endif

@if(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == false 
                  AND $property_offerRejected == false AND $property_status == 'For Sale' 
                  AND $property_interested == true)

    {{ Form::open(array('id' => 'interest-details', 'url' => 'interests/delete', 'method' => 'DELETE', 'style'=>'display: inline;')) }}﻿
     <a id="remove-watch" href="#" class="btn btn-danger" onclick="$(this).closest('form').submit();return false;">
                                <span class="glyphicon glyphicon-minus"></span> Wishlist</a>
    {{ Form::hidden('property_id', $property->property_id) }}
    {{ Form::close() }}

@endif

@if(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == false 
                  AND $property_offerRejected == false AND $property_offerAccepted == false 
                  AND $property_sold == false AND $property_status != 'Sold Subject to Contract')
    <a href="{{ URL::route('new_buyer_offer', $property->property_id)}}"
        class="btn btn-success">Make Offer
    </a>

@elseif(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == true AND $property_offerRejected == false AND $property_offerAccepted == false AND $property_sold == false)
    <a href="#" class="btn btn-success disabled">Offer Awaiting Approval</a>
    <a href="{{ URL::route('edit_buyer_offer', $property_offer)}}"
        class="btn btn-primary">Edit Offer
    </a>

    {{ Form::open(array('id' => 'offer-details', 'url' => 'offers/delete', 'method' => 'DELETE', 'style'=>'display: inline;')) }}﻿
     <a id="remove-offer" href="#" class="btn btn-danger" onclick="$(this).closest('form').submit();return false;">Cancel Offer</a>
    {{ Form::hidden('offer_id', implode($property_offer)) }}
    {{ Form::close() }}

@elseif(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == false AND $property_offerRejected == true AND $property_offerAccepted == false AND $property_sold == false)
    <a href="#" class="btn btn-danger disabled">Offer Rejected</a>
        <a id="add-offer" href="{{ URL::route('new_buyer_offer', $property->property_id)}}"
        class="btn btn-success">Make New Offer
    </a>

@elseif(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == false AND $property_offerRejected == false AND $property_offerAccepted == true AND $property_sold == false)
    <a href="#" class="btn btn-success disabled">Offer Accepted Subject to Contract</a>

@elseif(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerMade == false AND $property_offerRejected == false AND $property_offerAccepted == false AND $property_sold == true)
    <a href="#" class="btn btn-success disabled">Property Sold</a>

@endif

<h3 class="form-signup-heading">{{$property->property_name}}</h3>

    <div id="top-section">
        <?php  $imageUrl = 'img/bestproperty.png';?>

        <div id="property-price">
            {{ Form::label('property_price', '€ '.str_replace(".00","",number_format($property->property_price, 2, '.', ',')), array('class'=>'price-label')) }} 
        </div>

        @if(Auth::check() AND Auth::user()->getType() == 'Buyer' AND $property_offerAvailable == true)
            
            @foreach($property_mainoffer as $mainoffer)

                <div id="property-offer">
                    {{ Form::label('property_offer', 'Your Offer: € '.str_replace(".00","",number_format($mainoffer->offer_value, 2, '.', ',')), array('class'=>'offer-label')) }} 
                </div>
            @endforeach
        @endif


        <div id="primary-image">

            @if($primaryimages->count())
                @foreach($primaryimages as $primaryimage)
                    <?php  $imageUrl = 'uploads/' . $primaryimage->image_propertyId . '/' . $primaryimage->image_name;?>
                    
                    <a href="../../public/<?php echo $imageUrl; ?>" data-lightbox="primary-image">
                        {{ HTML::image($imageUrl, $primaryimage->image_name, array('class' => 'primary-img-thumbnail', 
                                                  'style' => 'display: block; margin: 0 auto;')) }}
                    </a>

                @endforeach
            @else
                 <?php  $imageUrl = 'img/bestproperty.png';?>

                 <a href="../../public/<?php echo $imageUrl; ?>" data-lightbox="primary-image">
                {{ HTML::image($imageUrl, null, array('class' => 'primary-img-thumbnail', 
                                              'style' => 'display: block; margin: 0 auto;')) }}
                 </a>
            @endif

        </div>

        <div id="modal-info">
            <header><h3>Property Information</h3></header>

            <div id="property-info">
                {{ Form::label('property_name', 'Name: '.$property->property_name, array('class'=>'property-label')) }} 
                {{ Form::label('property_vendor', 'Vendor: '.$property_vendor, array('class'=>'property-label')) }} 
                {{ Form::label('property_type', 'Type: '.$property_type, array('class'=>'property-label')) }} 
                {{ Form::label('property_status', 'Status: '.$property_status, array('class'=>'property-label')) }}             
                {{ Form::label('property_location', 'Location: '.$property_location, array('class'=>'property-label')) }} 
                {{ Form::label('property_squareMetres', 'Square Metres: '.str_replace(".00","",number_format($property->property_squareMetres, 2, '.', ',')), array('class'=>'property-label')) }}
                {{ Form::label('property_bathrooms', 'Bathrooms: '.$property->property_bathrooms, array('class'=>'property-label')) }}  
                {{ Form::label('property_bedrooms', 'Bedrooms: '.$property->property_bedrooms, array('class'=>'property-label')) }}       
                {{ Form::label('property_hasGarage', 'Garage: '.$property_hasGarage, array('class'=>'property-label')) }} 
                {{ Form::label('property_hasGarden', 'Garden: '.$property_hasGarden, array('class'=>'property-label')) }} 
            </div>
        </div>
    </div>
    <br/><br/>
    <div id="modal">
        <header><h3>Description</h3></header>
        {{ Form::label('property_description', $property->property_description, array('class'=>'property-desc-label')) }} 
    </div>

    @if($propertyimages->count())
        <div id="modal">
            <header><h3>Other Images</h3></header>
            @foreach($propertyimages as $propertyimage)
                <div class="other-image">
                    <?php $otherImageUrl = '../../public/uploads/'.$propertyimage->image_propertyId.'/'.$propertyimage->image_name; ?>

                    <a href="<?php echo $otherImageUrl; ?>" data-lightbox="other-images">
                        {{ HTML::image('uploads/' . $propertyimage->image_propertyId . '/' . $propertyimage->image_name, 
                                                    $propertyimage->image_name, array('class' => 'other-images-thumbnail', 
                                                   'style' => 'display: block; margin: 0 auto;')) }}
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    @if(Auth::check() AND Auth::user()->getType() == 'Vendor'
        AND $property_sold == false AND $property_vendorId == Auth::user()->getCustomerId())
        
        <div id="modal">
            <header><h3>Offers</h3></header>
                @if (!$property_offerVendorAccepted AND $offers!=null)
                    @if($offers->count())
                    <div class="table-responsive">
                        <table id="offers-table" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Buyer</th>
                                <th>Value</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Accept</th>
                                <th>Reject</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $offer_buyerName = '' ?>

                            @foreach( $offers as $offer )

                                @foreach( $buyers as $buyer )
                                    @if ($buyer->customer_id == $offer->offer_buyerId)
                                        <?php $offer_buyerName = $buyer->customer_firstName.' '.$buyer->customer_lastName; ?>
                                    @endif
                                @endforeach

                                <tr>
                                    <td><span class="index-data">{{{ $offer_buyerName }}}</span></td>
                                    <td><span class="index-data">{{{ '€ '. str_replace(".00","",number_format($offer->offer_value, 2, '.', ',')) }}}</span></td>
                                    <td><span class="index-data">{{{ date_format(new DateTime($offer->created_at), 'd/m/Y H:m:s') }}}</span></td>
                                    <td><span class="index-data">{{{ date_format(new DateTime($offer->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                                    
                                    {{ Form::open(array('id' => 'offer-accept','url' => 'offers/accept', 'method' => 'PUT', 'style'=>'display: inline;')) }}﻿
                                    <td><a id="accept-offer" href="#" class="btn btn-success" onclick="document.forms[1].submit();return false;">Accept</a></td>
                                    {{ Form::hidden('offer_id', $offer->offer_id) }}
                                    {{ Form::close() }}

                                    {{ Form::open(array('id' => 'offer-reject','url' => 'offers/reject', 'method' => 'PUT', 'style'=>'display: inline;')) }}﻿
                                    <td><a id="reject-offer" href="#" class="btn btn-danger" onclick="document.forms[2].submit();return false;">Reject</a></td>                                    
                                    {{ Form::hidden('offer_id', $offer->offer_id) }}
                                    {{ Form::close() }}
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div id="no-offers" class="alert alert-danger">No Offers for this Property</div>
                    @endif
                
                @elseif ($property_offerVendorAccepted)
                    <div class="table-responsive">
                        <table id="offers-table" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Buyer</th>
                                <th>Value</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Confirm</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                                <?php $offer_buyerName = '' ?>

                                @foreach( $offers as $offer )
                                    @foreach( $buyers as $buyer )
                                        @if ($buyer->customer_id == $offer->offer_buyerId)
                                            <?php $offer_buyerName = $buyer->customer_firstName.' '.$buyer->customer_lastName; ?>
                                        @endif
                                    @endforeach

                                    <tr>
                                        <td><span class="index-data">{{{ $offer_buyerName }}}</span></td>
                                        <td><span class="index-data">{{{ '€ '. str_replace(".00","",number_format($offer->offer_value, 2, '.', ',')) }}}</span></td>
                                        <td><span class="index-data">{{{ date_format(new DateTime($offer->created_at), 'd/m/Y H:m:s') }}}</span></td>
                                        <td><span class="index-data">{{{ date_format(new DateTime($offer->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                                        
                                        {{ Form::open(array('url' => 'offers/confirm', 'method' => 'PUT', 'style'=>'display: inline;')) }}﻿
                                        <td><a id="confirm-offer" href="#" class="btn btn-success" onclick="document.forms[1].submit();return false;">Confirm Sale</a></td>                                    
                                        {{ Form::hidden('offer_id', $offer->offer_id) }}
                                        {{ Form::close() }}
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

    @elseif(Auth::check() AND Auth::user()->getType() =='Vendor' AND $property_sold == true
                                    AND $property_vendorId == Auth::user()->getCustomerId())
      <div id="modal">
            <header><h3>Sold To</h3></header>
                    @if($property_vendorOffer->count())
                        <div class="table-responsive">
                            <table id="offers-table" class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Buyer</th>
                                    <th>Value</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php $offer_buyerName = '' ?>

                                @foreach( $property_vendorOffer as $offer )

                                    @foreach( $buyers as $buyer )
                                        @if ($buyer->customer_id == $offer->offer_buyerId)
                                            <?php $offer_buyerName = $buyer->customer_firstName.' '.$buyer->customer_lastName; ?>
                                        @endif
                                    @endforeach

                                    <tr>
                                        <td><span class="index-data">{{{ $offer_buyerName }}}</span></td>
                                        <td><span class="index-data">{{{ '€ '. str_replace(".00","",number_format($offer->offer_value, 2, '.', ',')) }}}</span></td>
                                        <td><span class="index-data">{{{ date_format(new DateTime($offer->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                        </div>
                    @endif
            </div>
        </div>
    @endif
