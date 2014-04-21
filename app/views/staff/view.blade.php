<!-- IMS Staff Member Details Page -->

@section('title', 'Best Property Malta | '.e($staff->staff_firstName).' '.e($staff->staff_lastName))

   <h3 class="form-signup-heading">{{ e($staff->staff_firstName).' '.e($staff->staff_lastName).' - Profile'  }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('stafflist') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     @if ($staff->staff_isDeleted != '1')
                        <span>
                           {{link_to_route('edit_staff', 'Edit', array($staff->staff_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('change_staff_password', 'Change Password', array($staff->staff_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('confirm_staff_delete', 'Delete', array($staff->staff_id), array('class'=>'btn btn-danger'))}}
                        </span>
                        {{ Form::token() }}
                        {{ Form::hidden('staff_id', $staff->staff_id) }}
                        
                        {{ Form::close() }}
                     @endif
                </div>
            </div>
            <br>
            <br>
            <br>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td><strong>Title</strong></td>
                    <td><span class="view-data">{{ $staff->staff_title }}</span></td>
                </tr>
                <tr>
                    <td><strong>First Name</strong></td>
                    <td><span class="view-data">{{ $staff->staff_firstName }}</span></td>
                </tr>
                <tr>
                    <td><strong>Last Name</strong></td>
                    <td><span class="view-data">{{ $staff->staff_lastName }}</span></td>
                </tr>
                <tr>
                    <td><strong>Email Address</strong></td>
                    <td><span class="view-data">{{ $staff->staff_emailAddress }}</span></td>
                </tr>
                <tr>
                    <td><strong>Username</strong></td>
                    <td><span class="view-data">{{ $staff->staff_username }}</span></td>
                </tr>
                <tr>
                    <td><strong>Staff Role</strong></td>
                    <td><span class="view-data">{{ $staff_role }}</span></td>
                </tr>                
                <tr>
                    <td><strong>ID Card Number</strong></td>
                    <td><span class="view-data">{{ $staff->staff_idCardNumber }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Date of Birth</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($staff->staff_dateOfBirth), 'd/m/Y') }}</span></td>
                </tr>
                <tr>
                    <td><strong>Employment Date</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($staff->staff_employmentDate), 'd/m/Y') }}</span></td>
                </tr>  
                <tr>
                    <td><strong>Address Line 1</strong></td>
                    <td><span class="view-data">{{ $staff->staff_addressLine1 }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Address Line 2</strong></td>
                    <td><span class="view-data">{{ $staff_addressLine2 }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Country</strong></td>
                    <td><span class="view-data">{{ $staff_country }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Phone Number</strong></td>
                    <td><span class="view-data">{{ $staff_phoneNumber }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Mobile Number</strong></td>
                    <td><span class="view-data">{{ $staff->staff_mobileNumber }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Active</strong></td>
                    <td><span class="view-data">{{ $staff_active }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Deleted</strong></td>
                    <td><span class="view-data">{{ $staff_deleted }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($staff->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($staff->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>