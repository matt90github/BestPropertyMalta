<!-- IMS Offer Status Index Page -->

@section('title', 'Best Property Malta | Offer Statuses')
<h3 class="form-signup-heading">Offer Statuses</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_offer_status') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Offer Status
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br> 
            @if($offer_statuses->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $offer_statuses as $offer_status )
                    <tr>
                        <td><span class="index-data-link"> {{ link_to_route( 'offer_status', $offer_status->offer_status_name, $offer_status->offer_status_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($offer_status->created_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($offer_status->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('offer_status', array($offer_status->offer_status_id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Offer Status
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('edit_offer_status', array($offer_status->offer_status_id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Offer Status
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('confirm_offer_status_delete', array($offer_status->offer_status_id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Offer Status
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
            <div class="alert alert-danger">No Offer Statuses found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $offer_statuses->links() }}
        </ul>
    </div>