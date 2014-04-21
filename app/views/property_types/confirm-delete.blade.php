<!-- IMS Confirm Property Type Delete Page -->

@section('title', 'Best Property Malta | Confirm Delete')

{{ Form::open(array('url' => 'ims/property_types/delete', 'method' => 'DELETE', 'style'=>'display: inline;')) }}﻿
    {{ Form::hidden('_method', 'DELETE') }}

    <div class="alert alert-warning">
        <div class="pull-left">Are you sure you want to delete property type<b>
                    {{{ $property_type->property_type_name }}} </b> ?
        </div>
        <div class="pull-right">
            <a id="confirm-remove" href="#" class="btn btn-danger" onclick="$(this).closest('form').submit();return false;">Yes</a>
            {{ link_to( URL::previous(), 'No', array( 'class' => 'btn btn-primary' ) ) }}
        </div>
        <div class="clearfix"></div>
    </div>
{{ Form::hidden('property_type_id', $property_type->property_type_id) }}
{{ Form::close() }}