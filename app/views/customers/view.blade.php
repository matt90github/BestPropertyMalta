<!-- IMS Customer Details Page -->

@section('title', 'Best Property Malta | '.e($customer->customer_firstName).' '.e($customer->customer_lastName))

   <h3 class="form-signup-heading">{{ e($customer->customer_firstName).' '.e($customer->customer_lastName).' - Profile'  }}</h3>

   <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('customers') }}"
                       class="btn btn-primary">
                        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                    </a>

                     @if ($customer->customer_isDeleted != '1')
                        <span>
                           {{link_to_route('edit_customer', 'Edit', array($customer->customer_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('change_customer_password', 'Change Password', array($customer->customer_id), array('class'=>'btn btn-primary'))}}
                           {{link_to_route('confirm_customer_delete', 'Delete', array($customer->customer_id), array('class'=>'btn btn-danger'))}}
                        </span>
                        {{ Form::token() }}
                        {{ Form::hidden('customer_id', $customer->customer_id) }}
                        
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
                    <td><span class="view-data">{{ $customer->customer_title }}</span></td>
                </tr>
                <tr>
                    <td><strong>First Name</strong></td>
                    <td><span class="view-data">{{ $customer->customer_firstName }}</span></td>
                </tr>
                <tr>
                    <td><strong>Last Name</strong></td>
                    <td><span class="view-data">{{ $customer->customer_lastName }}</span></td>
                </tr>
                <tr>
                    <td><strong>Email Address</strong></td>
                    <td><span class="view-data">{{ $customer->customer_emailAddress }}</span></td>
                </tr>
                <tr>
                    <td><strong>Username</strong></td>
                    <td><span class="view-data">{{ $customer->customer_username }}</span></td>
                </tr>
                <tr>
                    <td><strong>Customer Type</strong></td>
                    <td><span class="view-data">{{ $customer->customer_type }}</span></td>
                </tr>                
                <tr>
                    <td><strong>ID Card Number</strong></td>
                    <td><span class="view-data">{{ $customer->customer_idCardNumber }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Date of Birth</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($customer->customer_dateOfBirth), 'd/m/Y') }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Address Line 1</strong></td>
                    <td><span class="view-data">{{ $customer->customer_addressLine1 }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Address Line 2</strong></td>
                    <td><span class="view-data">{{ $customer_addressLine2 }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Country</strong></td>
                    <td><span class="view-data">{{ $customer_country }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Phone Number</strong></td>
                    <td><span class="view-data">{{ $customer_phoneNumber }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Mobile Number</strong></td>
                    <td><span class="view-data">{{ $customer->customer_mobileNumber }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Active</strong></td>
                    <td><span class="view-data">{{ $customer_active }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Deleted</strong></td>
                    <td><span class="view-data">{{ $customer_deleted }}</span></td>
                </tr> 
                <tr>
                    <td><strong>Date Created</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($customer->created_at), 'd/m/Y H:m:s')  }}</span></td>
                </tr>
                <tr>
                    <td><strong>Date Updated</strong></td>
                    <td><span class="view-data">{{ date_format(new DateTime($customer->updated_at), 'd/m/Y H:m:s') }}</span></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>