<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.meta')
    <title>Molla | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    @include('admin.includes.style')
    <!-- PAGE LEVEL STYLES-->
    <link rel="stylesheet" href="{{asset('/admin-assets')}}/assets/css/auth-light.css"/>
</head>

<body class="bg-silver-300">
<div class="content">
    <div class="brandl">
        <a class="link" href="{{ route('/') }}">
            <img src="{{ asset('/') }}assets/logo.png" alt="" height="" width=""/>
        </a>
    </div>
    <div class="card card-body">
        @if ($errors->any())
            <div>
                <div class="text-danger">
                    <h5 class="text-center font-bold">Sorry email address or passwords are wrong.</h5>
                  </div>
{{--                <ul class="mt-3 text-center text-danger">--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
            </div>
        @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h2 class="login-title font-strong">Login</h2>
                <div class="form-group">
                    <div class="input-group-icon right">
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                        <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="on">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group-icon right">
                        <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                        <input class="form-control" type="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-between">
                    <label class="ui-checkbox ui-checkbox-info">
                        <input type="checkbox" name="remember">
                        <span class="input-span"></span>Remember me</label>
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block" type="submit">Login</button>
                </div>

                        <div class="social-auth-hr">
                            <span>Or login with</span>
                        </div>
                        <div class="text-center social-auth m-b-20">
                            <a class="btn btn-social-icon btn-twitter m-r-5" href="javascript:;"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social-icon btn-facebook m-r-5" href="javascript:;"><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-social-icon btn-google m-r-5" href="javascript:;"><i class="fa fa-google-plus"></i></a>
                            <a class="btn btn-social-icon btn-linkedin m-r-5" href="javascript:;"><i class="fa fa-linkedin"></i></a>
                            <a class="btn btn-social-icon btn-vk" href="javascript:;"><i class="fa fa-vk"></i></a>
                        </div>
                <div class="text-center">Not a member?
                    <a class="color-blue" href="{{ route('register') }}">Create Account</a>
                </div>
            </form>
    </div>
</div>
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
@include('admin.includes.script')
<!-- PAGE LEVEL PLUGINS -->
<script src="{{asset('/admin-assets')}}/assets/vendors/jquery-validation/dist/jquery.validate.min.js"
        type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('#login-form').validate({
            errorClass: "help-block",
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            highlight: function (e) {
                $(e).closest(".form-group").addClass("has-error")
            },
            unhighlight: function (e) {
                $(e).closest(".form-group").removeClass("has-error")
            },
        });
    });
</script>
</body>

</html>
