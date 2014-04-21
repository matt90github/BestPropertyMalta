<!-- Server side validation error messages for the offer forms -->

@if( $errors->count() > 0 )

<div class="alert alert-danger alert-block">
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('offer_status_name', '<li>:message</li>') }}
        {{ $errors->first('offer_status_description', '<li>:message</li>') }}
		{{ $errors->first('offer_value', '<li>:message</li>') }}
		{{ $errors->first('offer_propertyId', '<li>:message</li>') }}
		{{ $errors->first('offer_buyerId', '<li>:message</li>') }}
		{{ $errors->first('offer_statusId', '<li>:message</li>') }}
    </ul>   
</div>

@endif