<!-- IMS Customer Index Page -->

@section('title', 'Best Property Malta | Customers')
   <h3 class="form-signup-heading">Customers</h3>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="pull-left">
                <div class="btn-toolbar">
                    <a href="{{ URL::route('new_customer') }}" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span>&nbsp;New Customer
                    </a>
                </div>
            </div>
            <br>
            <br>
            <br>
            @if($customers->count())
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Email Address</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $customers as $customer )

                        <tr>
                            <td><span class="index-data-link">{{ link_to_route( 'customer', $customer->customer_firstName.' '.$customer->customer_lastName, $customer->customer_id, array( 'class' => 'btn btn-link btn-s' )) }}</span></td>
                            <td><span class="index-data">{{{ $customer->customer_type }}}</span></td>
                            <td><span class="index-data">{{{ $customer->customer_emailAddress }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($customer->created_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td><span class="index-data">{{{ date_format(new DateTime($customer->updated_at), 'd/m/Y H:m:s') }}}</span></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" href="#">
                                        Action
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ URL::route('customer', array($customer->customer_id)) }}">
                                                <span class="glyphicon glyphicon-eye-open"></span>&nbsp;Show Customer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('edit_customer', array($customer->customer_id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Customer
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('change_customer_password', array($customer->customer_id)) }}">
                                                <span class="glyphicon glyphicon-edit"></span>&nbsp;Change Password
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="{{ URL::route('confirm_customer_delete', array($customer->customer_id)) }}">
                                                <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;Delete Customer
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
            <div class="alert alert-danger">No Customers found</div>
            @endif
        </div>
    </div>


    <div class="pull-right">
        <ul class="pagination">
            {{ $customers->links() }}
        </ul>
    </div>
