@include('admin_includes.admin_scripts')
@include('admin_includes.admin_nav')
@include('admin_includes.admin_header')
@include('admin_includes.admin_sidebar')

<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Subjects</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $subject }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="text-center">
                        <a href="{{ URL('admin-subject') }}" class="text-white mb-0">More Info</a> &nbsp;<i class="fa fa-arrow-right text-white mb-0" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Units</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $unit }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="text-center">
                        <a href="{{ URL('admin-unit') }}" class="text-white mb-0">More Info</a> &nbsp;<i class="fa fa-arrow-right text-white mb-0" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Toatl Chapters</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $chapter }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="text-center">
                        <a href="{{ URL('admin-chapter') }}" class="text-white mb-0">More Info</a> &nbsp;<i class="fa fa-arrow-right text-white mb-0" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Videos</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $video }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="text-center">
                        <a href="{{ URL('admin-content') }}" class="text-white mb-0">More Info</a> &nbsp;<i class="fa fa-arrow-right text-white mb-0" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Users</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $user }}</h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="text-center">
                        <a href="{{ URL('all-user') }}" class="text-white mb-0">More Info</a> &nbsp;<i class="fa fa-arrow-right text-white mb-0" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Dismissing</h4>
                        <div class="card-content">
                            <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong>Holy guacamole!</strong> You should check in on some of those fields below.</div>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong>Holy guacamole!</strong> You should check in on some of those fields below.</div>
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong>Holy guacamole!</strong> You should check in on some of those fields below.</div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>





@include('admin_includes.admin_footer')
