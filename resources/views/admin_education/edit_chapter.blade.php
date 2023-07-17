@section('admin_title', 'Edit Chapter')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Chapter</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="justify-content-around row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editing Chapter - <b>{{ $edit_chapter->chapter_name }}</b></h4><br><br>
                        <div class="basic-form">
                            <form action="{{ Route('post_edit_chapter') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Chapter Name</label>
                                    <input type="text" name="chapter_name" class="form-control input-rounded"
                                        placeholder="Input Rounded" value="{{ $edit_chapter->chapter_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Chapter Description</label>
                                    <textarea class="form-control input-rounded" name="chapter_desc">{{ $edit_chapter->chapter_desc }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="subject_id">Subject Name</label>
                                    <select class="form-control input-rounded" name="subject_id" id="subject_id">
                                        @foreach ($subject as $subjects)
                                            <option value="{{ $subjects->id }}" {{ $edit_chapter->subject_id == $subjects->id ? 'selected' : '' }}>
                                                {{ $subjects->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="unit_id">Unit Name</label>
                                    <select class="form-control input-rounded" name="unit_id" id="unit_id">
                                        @foreach ($unit as $units)
                                            <option value="{{ $units->id }}" {{ $edit_chapter->unit_id == $units->id ? 'selected' : '' }}>
                                                {{ $units->unit_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="chapter_status">Chapter Status</label>
                                    <select class="form-control input-rounded" name="chapter_status" id="chapter_status">
                                        <option value="1" {{ $edit_chapter->chapter_status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $edit_chapter->chapter_status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <input type="hidden" name="id" value="{{ $edit_chapter->id }}">

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
