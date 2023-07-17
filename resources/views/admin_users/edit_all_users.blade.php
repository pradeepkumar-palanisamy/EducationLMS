@section('admin_title', 'Edit User')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="justify-content-around row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editing user - <b></b></h4><br><br>
                        <div class="basic-form">
                            <form action="{{ Route('admin_update_user') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" class="form-control input-rounded"
                                        placeholder="Input Rounded"  value="{{ $edit_user->username }}">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control input-rounded"  name="email" value="{{ $edit_user->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control input-rounded" name="phone_number" value="{{ $edit_user->phone_number }}" >
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control input-rounded" name="city" value="{{ $edit_user->city }}">
                                </div>

                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control input-rounded" name="state" value="{{ $edit_user->state }}" >
                                </div>


                                <div class="form-group">
                                    <label for="chapter_status">User Status</label>
                                    <select class="form-control input-rounded" name="user_status" id="chapter_status">
                                        <option value="1" {{ $edit_user->user_status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $edit_user->user_status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{ $edit_user->id }}">

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin_includes.admin_footer')
