<!-- IMS Offer Index Page -->

@section('title', 'Best Property Malta | Active Offers')
   <h3 class="form-signup-heading">Active Offers</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_offer') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Offer
                    </a>
                </div>
            </div>
            <br>
            <br> 
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
                        <th>Action</th>
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
                            <td><span class="index-data-link">{{ link_to_route( 'offer', $offer_propertyName, $offer->offer_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                            <td><span class="index-data">{{{ $offer_buyerName  }}}</span></td>
                            <td><span class="index-data">{{{ '€ '.str_replace(".00","",number_format($offer->offer_value, '2', '.', ',')) }}}</span></td>
                            <td><span class="index-data">{{{ $offer_statusName  }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($offer->created_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                        Action
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ URL::route('offer', array($offer->offer_id)) }}">
                                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Offer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('edit_offer', array($offer->offer_id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Offer
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ URL::route('confirm_offer_delete', array($offer->offer_id)) }}">
                                                <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Offer
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
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