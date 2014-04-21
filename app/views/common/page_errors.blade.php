<!-- Server side validation error messages for the page forms -->

@if( $errors->count() > 0 )

<div class="alert alert-danger alert-block">
    <p>The following errors have occurred:</p>

    <ul id="form-errors">
        {{ $errors->first('page_title', '<li>:message</li>') }}
        {{ $errors->first('page_content', '<li>:message</li>') }}
    </ul>   
</div>

@endif