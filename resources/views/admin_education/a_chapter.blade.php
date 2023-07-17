@section('admin_title','Add Chapters')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Chapters</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success float-right" data-toggle="modal" data-target="#chaptermodal">Add Chapter</button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>SI.No</th>
                                        <th>Chapter Name</th>
                                        <th>Chapter Description</th>
                                        <th>Subject Name</th>
                                        <th>UNit Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                @endphp
                                    @foreach ($chapter as $chapters )
                                    <tr>
                                        <td><?php echo $i ; ?></td>
                                        <td>{{ $chapters->chapter_name }}</td>
                                        <td>{{ $chapters->chapter_desc }}</td>
                                        <td>{{ $chapters->subject_name }}</td>
                                        <td>{{ $chapters->unit_name }}</td>
                                        <td>
                                            @if ($chapters->chapter_status == 1)
                                            <span class="label label-pill label-success">Active</span></td>
                                            @else
                                            <span class="label label-pill label-danger">InActive</span></td>
                                            @endif
                                            
                                        <td>
                                            <a href="{{ url('edit-chapter') }}/{{ $chapters->chapter_slug }}"><button class="btn btn-warning">Edit</button></a><br>   
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $chapters->id }}">Delete</button>
                                        </td>
                                    </tr>

                                    @php
                                        $i ++;
                                    @endphp


<div class="modal fade bd-example-modal-sm" id="deleteModal{{ $chapters->id }}" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Deletion Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">Are you sure you want to delete this chapter?</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="{{ url('delete_chapter') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $chapters->id }}">
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
<form action="{{ Route('post_add_chapter') }}" method="POST">
    @csrf
    <div class="modal fade" id="chaptermodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Chapter</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subjectName">Subject Name</label>
                        <select class="form-control" name="subject_id" id="subject_name" required>
                            @foreach ($subject as $subjects)
                            <option value="{{ $subjects->id }}">{{ $subjects->subject_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subjectName">Unit Name</label>
                        <select class="form-control" name="unit_id" id="subject_name" required>
                            @foreach ($unit as $units)
                            <option value="{{ $units->id }}">{{ $units->unit_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="chapterName">Chapter Name</label>
                        <input type="text" class="form-control" name="chapter_name" id="chapter_name" placeholder="Enter chapter name" required>
                    </div>
                    <div class="form-group">
                        <label for="chapterDescription">Chapter Description</label>
                        <textarea class="form-control" name="chapter_desc" id="chapter_description" placeholder="Enter chapter description" required></textarea>
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


@include('admin_includes.admin_footer')
