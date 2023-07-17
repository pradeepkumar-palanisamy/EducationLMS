@section('admin_title', 'Edit Subject')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::TO('admin-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Subject</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="justify-content-around row">
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editing Subject - <b>{{ $edit_subject->subject_name }}</b></h4><br><br>
                        <div class="basic-form">
                            <form action="{{ Route('post_edit_subject') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Subject Name</label>
                                    <input type="text" name="subject_name" class="form-control input-rounded"
                                        placeholder="Input Rounded" value="{{ $edit_subject->subject_name }}">
                                </div>

                                    <div class="form-group">
                                        <label>Subject Description</label>
                                        <textarea class="form-control input-rounded" name="subject_desc" >{{ $edit_subject->subject_desc }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control input-rounded" name="status" id="status">
                                            <option value="1" {{ $edit_subject->status == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $edit_subject->status == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    
                                    <input type="hidden" name="id" value="{{ $edit_subject->id }}">
                                    

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
