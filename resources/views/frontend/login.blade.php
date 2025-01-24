@extends('frontend.includes.master')
<link href="{{ asset('frontend_assets/assets/css/signup.css') }}" rel="stylesheet">
@section('content')
    @include('frontend.includes.header')

        <style>
            .input-field {
                position: relative;
                display: flex;
                align-items: center;
            }

            .input-field input {
                padding-right: 40px;
            }

            .input-group-text {
                position: absolute;
                right: 10px;
                top: 50%;
                transform: translateY(-50%);
                background: transparent;
                border: none;
                cursor: pointer;
            }

            .mt-20 {
                margin-top: 15px;
            }

            .label-bold {
                font-size: 14px;
                font-weight: bold;
            }

            .mr-15 {
                margin-right: 15px;
            }

        </style>

    <div class="registration_sec">
        <div class="main_bg_design">

            <div class="forms-container">
                <div class="signin-signup">

                    <form id="login_form" action="{{ route('login') }}" class="sign-in-form form" method="post">
                        @csrf
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" id="username" name="username" placeholder="Username"/>

                        </div>
                        @if ($errors->has('username'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('username') }}</div>
                        @endif

                        <div class="input-field">
                            <i class="fas fa-lock"></i>

                            <input type="password" id="password" name="password" placeholder="Password" />
                                <span id="toggle-password" class="input-group-text" style="cursor: pointer;">
                                    <i id="eye-icon" class="fa fa-eye"></i>
                                </span>
                        </div>
                        @if ($errors->has('password'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('password') }}</div>
                        @endif

                        <div class="user-type mt-20">
                            <label for="vendor" class="mr-15">
                                <input type="radio" name="user_type" value="vendor" id="vendor">
                                Listing User
                            </label>
                            <label for="user" class="mr-15">
                                <input type="radio" name="user_type" value="user" id="user">
                                Basic User
                            </label>
                        </div>
                        
                        @if ($errors->has('user_type'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('user_type') }}
                        </div>
                        @endif

                        <div class="mt-2">
                            <a href="{{ URL::to('/forgot-password') }}">Forgot Password</a>
                        </div>
                        


                        <input type="submit" name="submit" value="Login" class="btn solid" />
                        <p class="mb-1 social-text">Don't have an account <a href="{{ URL::to('/signup') }}">Sign Up</a>
                        </p>
                        
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

        @if (session('user_type_error'))
            toastr.error('{{ session('user_type_error') }}');
        @endif

    </script>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    // Toggle the type attribute
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
});

    </script>
@endsection
