<!-- IMS Cancelled Offer Index Page -->

@section('title', 'Best Property Malta | Inactive Offers')
   <h3 class="form-signup-heading">Inactive Offers</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <br>
            @if($offers->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Property</th>
                        <th>Buyer</th> 
                        <th>Value</th>                        
                        <th>Status</th> 
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php $offer_propertyName = '' ?>
                    <?php $offer_buyerName = '' ?>
                    <?php $offer_statusName = '' ?>

                    @foreach( $offers as $offer )

                        @foreach( $properties as $property )
                            @if ($offer->offer_propertyId == $property->property_id)
                                <?php $offer_propertyName = $property->property_name; ?>
                            @endif
                        @endforeach

                        @foreach( $offerstatuses as $offerstatus )
                            @if ($offer->offer_statusId == $offerstatus->offer_status_id)
                                <?php $offer_statusName = $offerstatus->offer_status_name; ?>
                            @endif
                        @endforeach

                        @foreach( $buyers as $buyer )
                            @if ($offer->offer_buyerId == $buyer->customer_id)
                                <?php $offer_buyerName = $buyer->customer_firstName.' '.$buyer->customer_lastName; ?>
                            @endif
                        @endforeach

                        <tr>
                            <td><span class="index-data">{{ $offer_propertyName }}</span></td>
                            <td><span class="index-data">{{{ $offer_buyerName  }}}</span></td>
                            <td><span class="index-data">{{{ '€ '.$offer->offer_value }}}</span></td>
                            <td><span class="index-data">{{{ $offer_statusName  }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($offer->created_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($offer->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-danger">No Offers found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $offers->links() }}
        </ul>
    </div>