<!-- IMS Staff Member Index Page -->

@section('title', 'Best Property Malta | Staff Members')
   <h3 class="form-signup-heading">Staff Members</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_staff') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Staff Member
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($staff->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email Address</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $staff_roleName = '' ?>

                    @foreach( $staff as $staffmember )

                         @foreach( $staffroles as $staffrole )
                            @if ($staffmember->staff_roleId == $staffrole->staff_role_id)
                                <?php $staff_roleName = $staffrole->staff_role_name; ?>
                            @endif
                        @endforeach
                        <tr>
                            <td><span class="index-data-link"> {{ link_to_route( 'staff', $staffmember->staff_firstName.' '.$staffmember->staff_lastName, $staffmember->staff_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                            <td><span class="index-data">{{{ $staff_roleName }}}</span></td>
                            <td><span class="index-data">{{{ $staffmember->staff_emailAddress }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($staffmember->created_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($staffmember->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                        Action
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ URL::route('staff', array($staffmember->staff_id)) }}">
                                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Staff Member
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('edit_staff', array($staffmember->staff_id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Staff Member
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('change_staff_password', array($staffmember->staff_id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Change Password
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ URL::route('confirm_staff_delete', array($staffmember->staff_id)) }}">
                                                <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Staff Member
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
            <div class="alert alert-danger">No Staff Members found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $staff->links() }}
        </ul>
    </div>