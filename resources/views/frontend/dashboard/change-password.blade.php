@extends('frontend.includes.master')
@section('content')

@include('frontend.includes.header')




<section class="inner_banner_sec" style="
    background-image: url({{asset('frontend_assets/assets/images/inr-bnr.jpg')}});
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-text">
                    <h1>User Change Password</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="dash-board_wrapper dashboard_sec">
        <div class="container">
            <div class="row ">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="updateprofile_sec">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="title mb-3">
                            <h2>Change Password</h2>
                        </div>
                        <div class="card p-3 shadow border-0">
                            <form id="change_pass" action="{{route('user-update-password')}}" method="post">
                                <!-- Step 1 -->
                                <div class="step" id="step1-2">
                                    @csrf
                                    <div class="row">

                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label>Current Password<span style="color:red;">*</span></label>
                                                <input type="password" class="form-control"
                                                    placeholder="Current Password" name="password" id="password"
                                                    value="{{old('password')}}" />
                                                    <span class="text-danger" id="password-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label>New Password<span style="color:red;">*</span></label>
                                                <input type="password" class="form-control" placeholder="New Password"
                                                    name="new_password" id="new_password"
                                                    value="{{old('new_password')}}" />
                                                    <span class="text-danger" id="new_password-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label>Confirm Password<span style="color:red;">*</span></label>
                                                <input type="password" class="form-control"
                                                    placeholder="Confirm Password" name="confirm_password"
                                                    id="confirm_password" value="{{old('confirm_password')}}" />
                                                    <span class="text-danger" id="confirm_password-error"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" class="btn btn_green">Submit</button>
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
</section>

@include('frontend.includes.footer')


<script src="{{ asset('frontend_assets/assets/css/lightbox.min.css') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#change_pass').on('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            var url = $(this).attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(resp) {
                        toastr.success('Profile updated successfully!', 'Success', {
                            closeButton: true,
                            progressBar: true
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        $("#profile_update")[0].reset();
                    
                    },
                    error: function (response) {
                        let errors = response.responseJSON.errors;
                        // Loop through the errors and display them
                        $.each(errors, function (key, value) {
                            $('#' + key + '-error').text(value[0]);
                        });
                    }
                });
            });
        });
</script>


@endsection