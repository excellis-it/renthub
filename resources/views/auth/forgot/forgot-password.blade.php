@extends('frontend.includes.master')
<link href="{{ asset('frontend_assets/assets/css/signup.css') }}" rel="stylesheet">
@section('content')
    @include('frontend.includes.header')
   

    <div class="registration_sec">
        <div class="main_bg_design">

            <div class="forms-container">
                <div class="signin-signup">

                    <form id="login_form" action="{{ route('forgot_password') }}" class="sign-in-form form" method="post">
                        @csrf
                        <h2 class="title">Forget Password</h2>
                        
                            <div class="input-field">
                                <i class="fas fa-user"></i>
                                <input type="email" id="email" name="email" placeholder="Email" />
                            </div>
                                @if($errors->has('email'))
                                    <span class="error-message" style="color: red;">{{ $errors->first('email') }}</span>
                                @endif

                        

                       


                        <input type="submit" name="submit" value="Reset" class="btn solid w-15 p-2" />
                        
                        <p class="social-text">Or Sign in with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
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
 


@endsection

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
