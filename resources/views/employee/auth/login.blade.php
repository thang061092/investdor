<!DOCTYPE html>
<html>
<head>
    <title>InvestDor - {{__('auth.login')}}</title>
    <link type=”image/x-icon” href="{{asset('frontend/images/logo.png')}}" rel="shortcut icon"/>
    <script src="{{ asset('js/tabler.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="antialiased border-primary d-flex flex-column bg-login">

<div id="thelogin" class="body">
    <div id="particles-js" class="main_container">
        <div class="container">
            <div class="row flex">
                <div class="col-xs-12 col-md-12 col-lg-12">

                    <div class="page page-center">

                        <div class="container-tight py-4">
                            <div class="text-center mb-4">
                                <a href="."><img src="{{ asset('frontend/images/logo.png') }}" height="80" alt=""></a>
                            </div>
                            <form class="card card-md login-form" action="{{route('admin.login')}}" method="post"
                                  autocomplete="off">
                                @csrf
                                <div class="card-body">
                                    <h2 class="card-title text-center mb-4 login-head">{{__('auth.login')}}</h2>
                                    @if( isset($error) && $error )
                                        <div class="mb-3">
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-title">{{ $error }}</h4>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <div class="mb-3">
                                            <input type="email"
                                                   class="form-control @if($errors->has('email'))is-invalid @endif"
                                                   placeholder="{{__('auth.enter_email')}}" name="email"
                                                   value="{{old('email')}}">
                                            @if($errors->has('email'))
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-2">
                                            <input type="password"
                                                   class="form-control @if($errors->has('password'))is-invalid @endif"
                                                   placeholder="{{__('auth.enter_password')}}" name="password" value="{{old('password')}}">
                                            @if($errors->has('password'))
                                                <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-check float-left d-inline-block">
                                                <input type="checkbox" class="form-check-input" name="remember">
                                                <span class="form-check-label">{{__('auth.save_login')}}</span>
                                            </label>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary login-btn">{{__('auth.login')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
