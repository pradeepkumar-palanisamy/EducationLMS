@section('admin_title','Add Subject')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::TO('admin-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title"> --}}
                            <button class="btn btn-success float-right" data-toggle="modal" data-target="#basicModal">Add Subject</button>
                        {{-- </h4> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>Subject Name</th>
                                        <th>Subject Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subject as $subjects )
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $subjects->subject_name }}</td>
                                        <td>{{ $subjects->subject_desc }}</td>
                                        <td>
                                            @if($subjects->status == 1)
                                                <span class="label label-pill label-success">Active</span>
                                            @else
                                                <span class="label label-pill label-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('edit_subject') }}/{{ $subjects->subject_slug }}"><button class="btn btn-warning">Edit</button></a>
                                            <button class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{ $subjects->id }}">Delete</button>
                                        </td> 
                            
                                    </tr>
                                       
                                    <div class="modal fade bd-example-modal-sm" id="deleteModal{{ $subjects->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Deletion Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ Route('delete_subject') }}" method="POST">
                                                    @csrf
                                                <input type="hidden" name="id" value="{{ $subjects->id }}">
                                                <div class="modal-body">Are you sure do you want to delete this subject</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                               
                                  
                                    @endforeach
                                  
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<form action="{{ Route('add_subject') }}" method="POST">
    @csrf
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subjectName">Subject Name</label>
                        <input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Enter subject name" >
                    </div>
                    <div class="form-group">
                        <label for="subjectDescription">Subject Description</label>
                        <textarea class="form-control" name="subject_desc" id="subject_description" placeholder="Enter subject description" ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    

</div>
@include('admin_includes.admin_footer')

