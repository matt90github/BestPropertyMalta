<!-- IMS Staff Role Details Page -->

@section('title', 'Best Property Malta | '.e($staff_role->staff_role_name))

   <h3 class="form-signup-heading">{{ e($staff_role->staff_role_name) }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('staff_roles') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     <span>
                        {{link_to_route('edit_staff_role', 'Edit', array($staff_role->staff_role_id), array('class'=>'btn btn-primary'))}}
                        {{link_to_route('confirm_staff_role_delete', 'Delete', array($staff_role->staff_role_id), array('class'=>'btn btn-danger'))}}
                     </span>
                     {{ Form::token() }}
                     {{ Form::hidden('staff_role_id', $staff_role->staff_role_id) }}
                        
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
                    <td><span class="view-data">{{ $staff_role->staff_role_name }}</span></td>
                </tr>
                <tr>
                    <td><strong>Description</strong></td>
                    <td><span class="view-data">{{ $staff_role->staff_role_description }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($staff_role->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($staff_role->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>