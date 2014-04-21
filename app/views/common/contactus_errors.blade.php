<!-- Server side validation error messages for the contact us form -->

@if( $errors->count() > 0 )

<div class="alert alert-danger alert-block">
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('customer_title', '<li>:message</li>') }}
        {{ $errors->first('customer_firstName', '<li>:message</li>') }}
        {{ $errors->first('customer_lastName', '<li>:message</li>') }}
        {{ $errors->first('customer_emailAddress', '<li>:message</li>') }}
        {{ $errors->first('contactus_query', '<li>:message</li>') }}
    </ul>   
</div>

@endif