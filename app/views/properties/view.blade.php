<!-- CMS Property Details Page -->

@section('title', 'Best Property Malta | '.e($property->property_name))

<h3 class="form-signup-heading">{{ e($property->property_name)  }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('properties') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     @if ($property->property_isDeleted != '1')
                        <span>
                           {{link_to_route('edit_property', 'Edit', array($property->property_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('confirm_property_delete', 'Delete', array($property->property_id), array('class'=>'btn btn-danger'))}}
                        </span>
                        {{ Form::token() }}
                        {{ Form::hidden('property_id', $property->property_id) }}
                        
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
                    <td><strong>Type</strong></td>
                    <td><span class="view-data">{{ $property_type }}</td></span>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td><span class="view-data">{{ $property_status }}</span></td></span>
                </tr>
                <tr>
                    <td><strong>Vendor</strong></td>
                    <td><span class="view-data">{{ $property_vendor }}</span></td></span>
                </tr>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><span class="view-data">{{ $property->property_name }}</span></td>
                </tr>
                <tr>
                    <td><strong>Description</strong></td>
                    <td><span class="view-data">{{ $property->property_description }}</span></td>
                </tr>
                <tr>
                    <td><strong>Location</strong></td>
                    <td><span class="view-data">{{ $property_location }}</span></td>
                </tr>
                <tr>
                    <td><strong>Square Metres</strong></td>
                    <td><span class="view-data">{{  str_replace(".00","",number_format($property->property_squareMetres, 2, '.', ',')) }}</span></td>
                </tr>  
                <tr>
                    <td><strong>No. of Bathrooms</strong></td>
                    <td><span class="view-data">{{ $property->property_bathrooms }}</span></td>
                </tr> 
                <tr>
                    <td><strong>No. of Bedrooms</strong></td>
                    <td><span class="view-data">{{ $property->property_bedrooms }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Has Garage?</strong></td>
                    <td><span class="view-data">{{ $property_hasGarage }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Has Garden?</strong></td>
                    <td><span class="view-data">{{ $property_hasGarden }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Price</strong></td>
                    <td><span class="view-data">{{ '€ '.str_replace(".00","",number_format($property->property_price, 2, '.', ','))  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Active</strong></td>
                    <td><span class="view-data">{{ $property_active }}</span></td>
                </tr>                    
                <tr>
                    <td><strong>Deleted</strong></td>
                    <td><span class="view-data">{{ $property_deleted }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($property->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($property->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>