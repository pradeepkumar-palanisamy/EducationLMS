@section('admin_title', 'Edit Unit')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Unit</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="justify-content-around row">
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editing Unit - <b>{{ $edit_unit->unit_name }}</b></h4><br><br>
                        <div class="basic-form">
                            <form action="{{ Route('post_edit_unit') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Unit Name</label>
                                    <input type="text" name="unit_name" class="form-control input-rounded"
                                        placeholder="Input Rounded" value="{{ $edit_unit->unit_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Unit Description</label>
                                    <textarea class="form-control input-rounded" name="unit_desc">{{ $edit_unit->unit_desc }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="subject_name">Subject Name</label>
                                    <select class="form-control input-rounded" name="subject_id" id="subject_id">
                                        @foreach ($subject as $subjects)
                                            <option value="{{ $subjects->id }}" {{ $edit_unit->subject_id == $subjects->id ? 'selected' : '' }}>
                                                {{ $subjects->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control input-rounded" name="unit_status" id="status">
                                        <option value="1" {{ $edit_unit->unit_status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $edit_unit->unit_status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                

                                <input type="hidden" name="id" value="{{ $edit_unit->id }}">

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
