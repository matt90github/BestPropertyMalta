<!-- IMS Staff Role Index Page -->

@section('title', 'Best Property Malta | Staff Roles')

<h3 class="form-signup-heading">Staff Roles</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_staff_role') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Staff Role
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($staff_roles->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $staff_roles as $staff_role )
                    <tr>
                        <td><span class="index-data-link"> {{ link_to_route( 'staff_role', $staff_role->staff_role_name, $staff_role->staff_role_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($staff_role->created_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td><span class="index-data">{{{ date_format(new DateTime($staff_role->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                    Action
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ URL::route('staff_role', array($staff_role->staff_role_id)) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Staff Role
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('edit_staff_role', array($staff_role->staff_role_id)) }}">
                                            <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Staff Role
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::route('confirm_staff_role_delete', array($staff_role->staff_role_id)) }}">
                                            <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Staff Role
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-danger">No Staff Roles found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $staff_roles->links() }}
        </ul>
    </div>