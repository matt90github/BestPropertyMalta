<!-- IMS Offer Details Page -->

@section('title', 'Best Property Malta | Viewing Offer')
   <h3 class="form-signup-heading"> Viewing Offer </h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('offers') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     @if ($offer->offer_isDeleted != '1')
                        <span>
                           {{link_to_route('edit_offer', 'Edit', array($offer->offer_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('confirm_offer_delete', 'Delete', array($offer->offer_id), array('class'=>'btn btn-danger'))}}
                        </span>
                        {{ Form::token() }}
                        {{ Form::hidden('offer_id', $offer->offer_id) }}
                        
                        {{ Form::close() }}
                     @endif
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Property</strong></td>
                    <td><span class="view-data">{{ $offer_property }}</span></td>
                </tr>
                <tr>
                    <td><strong>Buyer</strong></td>
                    <td><span class="view-data">{{ $offer_buyer }}</span></td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td><span class="view-data">{{ $offer_status }}</span></td>
                </tr>
                <tr>
                    <td><strong>Value</strong></td>
                    <td><span class="view-data">{{ '€ '.str_replace(".00","",number_format($offer->offer_value, 2, '.', ',')) }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($offer->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($offer->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>