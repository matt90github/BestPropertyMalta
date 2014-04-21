<!-- IMS Offer Status Details Page -->

@section('title', 'Best Property Malta | '.e($offer_status->offer_status_name))

   <h3 class="form-signup-heading">{{ e($offer_status->offer_status_name) }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('offer_statuses') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     <span>
                        {{link_to_route('edit_offer_status', 'Edit', array($offer_status->offer_status_id), array('class'=>'btn btn-primary'))}}
                        {{link_to_route('confirm_offer_status_delete', 'Delete', array($offer_status->offer_status_id), array('class'=>'btn btn-danger'))}}
                     </span>
                     {{ Form::token() }}
                     {{ Form::hidden('offer_status_id', $offer_status->offer_status_id) }}
                        
                     {{ Form::close() }}
                     
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><span class="view-data">{{ $offer_status->offer_status_name }}</span></td>
                </tr>
                <tr>
                    <td><strong>Description</strong></td>
                    <td><span class="view-data">{{ $offer_status->offer_status_description }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($offer_status->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($offer_status->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>