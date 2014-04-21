<!-- IMS Property Status Details Page -->

@section('title', 'Best Property Malta | '.e($property_status->property_status_name))

   <h3 class="form-signup-heading">{{ e($property_status->property_status_name) }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('property_statuses') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     <span>
                        {{link_to_route('edit_property_status', 'Edit', array($property_status->property_status_id), array('class'=>'btn btn-primary'))}}
                        {{link_to_route('confirm_property_status_delete', 'Delete', array($property_status->property_status_id), array('class'=>'btn btn-danger'))}}
                     </span>
                     {{ Form::token() }}
                     {{ Form::hidden('property_status_id', $property_status->property_status_id) }}
                        
                     {{ Form::close() }}
                     
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><span class="view-data">{{ $property_status->property_status_name }}</span></td>
                </tr>
                <tr>
                    <td><strong>Description</strong></td>
                    <td><span class="view-data">{{ $property_status->property_status_description }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($property_status->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($property_status->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>