<!-- Server side validation error messages for the staff member forms -->

@if( $errors->count() > 0 )

<div class="alert alert-danger alert-block">
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('staff_username', '<li>:message</li>') }}
        {{ $errors->first('staff_emailAddress', '<li>:message</li>') }}
        {{ $errors->first('staff_password', '<li>:message</li>') }}
        {{ $errors->first('staff_old_password', '<li>:message</li>') }}
        {{ $errors->first('staff_new_password', '<li>:message</li>') }}
        {{ $errors->first('staff_new_password_confirmation', '<li>:message</li>') }}
        {{ $errors->first('staff_role_name', '<li>:message</li>') }}
        {{ $errors->first('staff_role_description', '<li>:message</li>') }}
        {{ $errors->first('staff_roleId', '<li>:message</li>') }}
        {{ $errors->first('staff_title', '<li>:message</li>') }}
        {{ $errors->first('staff_firstName', '<li>:message</li>') }}
        {{ $errors->first('staff_lastName', '<li>:message</li>') }}
        {{ $errors->first('staff_idCardNumber', '<li>:message</li>') }}
        {{ $errors->first('staff_password_confirmation', '<li>:message</li>') }}
        {{ $errors->first('staff_phoneNumber', '<li>:message</li>') }}   
        {{ $errors->first('staff_mobileNumber', '<li>:message</li>') }}  
        {{ $errors->first('staff_addressLine1', '<li>:message</li>') }}  
        {{ $errors->first('staff_countryId', '<li>:message</li>') }}  
        {{ $errors->first('staff_dateOfBirth', '<li>:message</li>') }}  
        {{ $errors->first('staff_employmentDate', '<li>:message</li>') }}  
    </ul>  
</div>
 
@endif 