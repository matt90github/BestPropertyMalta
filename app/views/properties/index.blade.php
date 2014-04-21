<!-- CMS Property Index Page -->

@section('title', 'Best Property Malta | Properties')
<h3 class="form-signup-heading">Properties</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_property') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Property
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($properties->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Vendor</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php $property_typeName = '' ?>
                    <?php $property_statusName = '' ?>
                    <?php $property_vendorName = '' ?>

                    @foreach( $properties as $property )

                        @foreach( $propertytypes as $propertytype )
                            @if ($property->property_typeId == $propertytype->property_type_id)
                                <?php $property_typeName = $propertytype->property_type_name; ?>
                            @endif
                        @endforeach

                        @foreach( $propertystatuses as $propertystatus )
                            @if ($property->property_statusId == $propertystatus->property_status_id)
                                <?php $property_statusName = $propertystatus->property_status_name; ?>
                            @endif
                        @endforeach

                        @foreach( $propertyvendors as $propertyvendor )
                            @if ($property->property_vendorId == $propertyvendor->customer_id)
                                <?php $property_vendorName = $propertyvendor->customer_firstName.' '. $propertyvendor->customer_lastName; ?>
                            @endif
                        @endforeach

                        <tr>
                            <td><span class="index-data-link"> {{ link_to_route( 'property', $property->property_name, $property->property_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                            <td><span class="index-data">{{{ $property_vendorName }}}</span></td>
                            <td><span class="index-data">{{{ '€ '.str_replace(".00","",number_format($property->property_price, 2, '.', ',')) }}}</span></td>
                            <td><span class="index-data">{{{ $property_statusName }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($property->created_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($property->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                        Action
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ URL::route('property', array($property->property_id)) }}">
                                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Property
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('edit_property', array($property->property_id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Property
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ URL::route('confirm_property_delete', array($property->property_id)) }}">
                                                <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Property
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
            <div class="alert alert-danger">No Properties found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $properties->links() }}
        </ul>
    </div>