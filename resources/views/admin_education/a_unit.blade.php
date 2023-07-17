@section('admin_title','Add unit')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::TO('admin-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Unit</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#unitmodal">Add Unit</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>Unit Name</th>
                                        <th>Unit Description</th>
                                        <th>Subject Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unit as $units)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $units->unit_name }}</td>
                                        <td>{{ $units->unit_desc }}</td>
                                        <td>{{ $units->subject_name }}</td>
                                        <td>
                                            @if ($units->unit_status ==1)
                                            <span class="label label-pill label-success">Active</span>    
                                            @else
                                            <span class="label label-pill label-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-unit') }}/{{ $units->unit_slug }}"><button class="btn btn-warning">Edit</button></a>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $units->id }}">Delete</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-sm" id="deleteModal{{ $units->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Deletion Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body">Are you sure you want to delete this unit?</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ url('delete_unit') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $units->id }}">
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
    
    
    

    <form action="{{ Route('post_add_unit') }}" method="POST">
        @csrf
        <div class="modal fade" id="unitmodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Unit</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="subjectName">Subject Name</label>
                            <select class="form-control" name="subject_id" id="subject_name">
                                @foreach ( $subject as $subjects )
                                <option value="{{ $subjects->id }}">{{ $subjects->subject_name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unitName">Unit Name</label>
                            <input type="text" class="form-control" name="unit_name" id="unit_name" placeholder="Enter unit name">
                        </div>
                        <div class="form-group">
                            <label for="unitDescription">Unit Description</label>
                            <textarea class="form-control" name="unit_desc" id="unit_description" placeholder="Enter unit description"></textarea>
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