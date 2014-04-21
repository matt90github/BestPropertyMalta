<!-- Server side validation error messages for the property forms -->

@if( $errors->count() > 0 )

<div class="alert alert-danger alert-block">
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('property_type_name', '<li>:message</li>') }}
        {{ $errors->first('property_type_description', '<li>:message</li>') }}
        {{ $errors->first('property_status_name', '<li>:message</li>') }}
        {{ $errors->first('property_status_description', '<li>:message</li>') }}
        {{ $errors->first('property_images', '<li>:message</li>') }}
        {{ $errors->first('property_name', '<li>:message</li>') }}
		{{ $errors->first('property_typeId', '<li>:message</li>') }}
		{{ $errors->first('property_statusId', '<li>:message</li>') }}
		{{ $errors->first('property_vendorId', '<li>:message</li>') }}
		{{ $errors->first('property_description', '<li>:message</li>') }}
		{{ $errors->first('property_locationId', '<li>:message</li>') }}
		{{ $errors->first('property_squareMetres', '<li>:message</li>') }}
		{{ $errors->first('property_bathrooms', '<li>:message</li>') }}
		{{ $errors->first('property_bedrooms', '<li>:message</li>') }}
		{{ $errors->first('property_price', '<li>:message</li>') }}
    </ul>   
</div>

@endif