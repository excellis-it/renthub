@extends('frontend.includes.master')
<link href="{{ asset('frontend_assets/assets/css/signup.css') }}" rel="stylesheet">
@section('content')
    @include('frontend.includes.header')
    <div class="registration_sec">
        <div class="main_bg_design">

            <div class="forms-container">
                <div class="signin-signup">

                    <form id="login_form" action="{{ route('login') }}" class="sign-in-form form" method="post">
                        @csrf
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" id="username" name="username" placeholder="Username" />

                        </div>

                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Password" />

                        </div>

                        <input type="submit" name="submit" value="Login" class="btn solid" />
                        <p class="mb-1 social-text">Don't' have an account <a href="{{ URL::to('/signup') }}">Sign Up</a>
                        </p>
                        <p class="social-text">Or Sign in with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-apple"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-yahoo"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.includes.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        };


        @if (session('login_success'))
            toastr.success('{{ session('login_success') }}');
        @endif

        @if (session('auth_error'))
            toastr.error('{{ session('auth_error') }}');
        @endif


        @if (session('username_error'))
            toastr.error('{{ session('username_error') }}');
        @endif


        @if (session('password_error'))
            toastr.error('{{ session('password_error') }}');
        @endif
    </script>
@endsection
