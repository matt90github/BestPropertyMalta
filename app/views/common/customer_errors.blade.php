<!-- Server side validation error messages for the customer forms -->

@if( $errors->count() > 0 )

<div class="alert alert-danger alert-block">
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('customer_username', '<li>:message</li>') }}
        {{ $errors->first('customer_emailAddress', '<li>:message</li>') }}
        {{ $errors->first('customer_password', '<li>:message</li>') }}
        {{ $errors->first('customer_old_password', '<li>:message</li>') }}
        {{ $errors->first('customer_new_password', '<li>:message</li>') }}
        {{ $errors->first('customer_new_password_confirmation', '<li>:message</li>') }}
        {{ $errors->first('customer_type_name', '<li>:message</li>') }}
        {{ $errors->first('customer_type', '<li>:message</li>') }}
        {{ $errors->first('customer_title', '<li>:message</li>') }}
        {{ $errors->first('customer_firstName', '<li>:message</li>') }}
        {{ $errors->first('customer_lastName', '<li>:message</li>') }}
        {{ $errors->first('customer_idCardNumber', '<li>:message</li>') }}
        {{ $errors->first('customer_password_confirmation', '<li>:message</li>') }}
        {{ $errors->first('customer_phoneNumber', '<li>:message</li>') }}   
        {{ $errors->first('customer_mobileNumber', '<li>:message</li>') }}  
        {{ $errors->first('customer_addressLine1', '<li>:message</li>') }}  
        {{ $errors->first('customer_countryId', '<li>:message</li>') }}  
        {{ $errors->first('customer_dateOfBirth', '<li>:message</li>') }}  
    </ul>   
</div>

@endif