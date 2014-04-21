<!-- IMS Property Type Index Page -->

@section('title', 'Best Property Malta | Property Types')

<h3 class="form-signup-heading">Property Types</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_property_type') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Property Type
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($property_types->count())
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
                    @foreach( $property_types as $property_type )
                    <tr>
                        <td><span class="index-data-link"> {{ link_to_route( 'property_type', $property_type->property_type_name, $property_type->property_type_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($property_type->created_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($property_type->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('property_type', array($property_type->property_type_id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Property Type
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('edit_property_type', array($property_type->property_type_id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Property Type
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('confirm_property_type_delete', array($property_type->property_type_id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Property Type
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
            <div class="alert alert-danger">No Property Types found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $property_types->links() }}
        </ul>
    </div>