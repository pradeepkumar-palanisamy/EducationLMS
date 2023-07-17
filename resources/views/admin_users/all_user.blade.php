@section('admin_title', 'All Users')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::TO('admin-dashboad') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">All User</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#registrationModal">Add User</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>username</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>User type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $user as  $users)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $users->username }}</td>
                                        <td>{{ $users->email }}</td>
                                        <td>{{ $users->phone_number }}</td>
                                        <td>{{ $users->city }}</td>
                                        <td>{{ $users->state }}</td>
                                        <td>
                                            @if ($users->user_type ==1)
                                            <span class="label label-secondary">Normal user</span>
                                            @else
                                            <span class="label label-secondary">Paid user</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($users->user_status == 1)
                                            <span class="label label-pill label-success">Active</span>
                                            @else
                                            <span class="label label-pill label-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-all-users') }}/{{ $users->username }}"><button class="btn mb-1 btn-warning btn-sm">Edit</button></a>
                                            <button class="btn mb-1 btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $users->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-sm" id="deleteModal{{ $users->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Deletion Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">Are you sure you want to delete this chapter?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ url('admin_delete_user') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $users->id }}">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrationModalLabel">User Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Registration Form -->
                <form action="{{ route('post_user_registration') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Phone Number</label>
                        <input type="number" class="form-control" id="email" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">City</label>
                        <input type="text" class="form-control" id="password" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="password">State</label>
                        <input type="text" class="form-control" id="password" name="state" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit Form -->
                <form id="editUserForm" method="POST">
                    @csrf
                    @method('PUT') <!-- Use 'PUT' method for updating user data -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('admin_includes.admin_footer')
