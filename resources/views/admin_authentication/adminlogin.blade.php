
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Geojii</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .error{
            color: red !important;
        }
    </style>
</head>
<body class="h-100">
    
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="{{ URL::CURRENT() }}"><h4>Geojii Admin Login</h4></a>
                                <form class="mt-5 mb-5 login-input" action="{{ Route('admin_post_login') }}" id="loginform" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/gleek.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
</body>
</html>

<script>
    $(document).ready(function () {
    $('#loginform').validate({ 
        rules: {
            password: {
                required: true,
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            password: {
                required: "Please provide a password",
               
            },
            email: "Please enter a valid email address"
        }
    });
});
</script>
<script type="text/javascript">
    @if (session('success'))
        toastr.success('{{ session('success') }}', 'Success', {
            timeOut: 2000
        });
    @endif

    @if (session('warning'))
        toastr.warning('{{ session('warning') }}', {
            timeOut: 2000
        });
    @endif

    @if (session('fail'))
        toastr.error('{{ session('fail') }}', {
            timeOut: 2000
        });
    @endif

    @if (session('primary'))
        toastr.primary('{{ session('primary') }}', {
            timeOut: 2000
        });
    @endif

    @if (session('message'))
        toastr.message('{{ session('message') }}', {
            timeOut: 2000
        });
    @endif

    @if (session('info'))
        toastr.info('{{ session('info') }}', {
            timeOut: 2000
        });
    @endif
</script>



