@section('admin_title', 'About')
@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')
<div class="content-body">
<div class="container-fluid">
    <div class="justify-content-around row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5>About the LMS</h5><br>
                        <h6><b>Laravel Version :</b>8.6.0</h6>
                        <h6><b>PHP Version :</b>7.4.3</h6>
                        <h6><b>Developed by :</b>PG softwares</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('admin_includes.admin_footer')
