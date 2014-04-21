<!-- IMS Property Status Index Page -->

@section('title', 'Best Property Malta | Property Statuses')

<h3 class="form-signup-heading">Property Statuses</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_property_status') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Property Status
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($property_statuses->count())
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
                    @foreach( $property_statuses as $property_status )
                    <tr>
                        <td><span class="index-data-link"> {{ link_to_route( 'property_status', $property_status->property_status_name, $property_status->property_status_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($property_status->created_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($property_status->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('property_status', array($property_status->property_status_id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Property Status
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('edit_property_status', array($property_status->property_status_id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Property Status
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('confirm_property_status_delete', array($property_status->property_status_id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Property Status
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
            <div class="alert alert-danger">No Property Statuses found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $property_statuses->links() }}
        </ul>
    </div>