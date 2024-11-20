@extends('frontend.includes.master')

@section('content')
@include('frontend.includes.header')

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">


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
                    <h1>User Update Profile</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="dash-board_wrapper dashboard_sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')


                </div>
                <div class="col-lg-9">
                    <div class="updateprofile_sec">
                        <div class="title mb-3">
                            <h2>Update Profile</h2>
                        </div>
                        <div class="card p-3 shadow border-0">
                            @if(isset($user))
                            <form id="profile_update" action="{{ route('user-update') }}" method="post"
                                enctype="multipart/form-data">

                                @csrf

                                <input name="id" value="{{ $user->id }}" hidden />
                                <!-- Step 1 -->
                                <div class="row align-items-center mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Upload Image</label>
                                            <div class="mt-1">
                                                <input type="file" name="profile_image" class="form-control"
                                                    id="profile_image_input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <img src="{{ $user->photo ? asset('uploads/images/profile/'.$user->photo) : asset('frontend_assets/assets/images/admin-logo.jpg') }}"
                                            alt="Profile Image" class="rounded-circle" width="120" height="120"
                                            id="profile_image_preview">
                                    </div>
                                </div>

                                <div class="step" id="step1-2">


                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>First Name<span style="color:red;">*</span></label>
                                                <input type="text" name="first_name" class="form-control"
                                                    id="first_name" placeholder="First Name"
                                                    value="{{old('first_name', $user->first_name)}}" />
                                                    <span id="first_name-error" style="color: red;"></span>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Last Name<span style="color:red;">*</span></label>
                                                <input type="text" name="last_name" class="form-control" id="last_name"
                                                    placeholder="Last Name"
                                                    value="{{old ('last_name',$user->last_name)}}" />
                                                    <span id="last_name-error" style="color: red;"></span>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Gender<span style="color:red;">*</span></label>
                                                <select class="form-control" id="gender" name="gender"
                                                    aria-label="Default select example">
                                                    <option value="" selected>Choose</option>
                                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : ''
                                                        }}>Male</option>
                                                    <option value="female" {{ $user->gender == 'female' ? 'selected' :
                                                        '' }}>Female</option>
                                                    <option value="others" {{ $user->gender == 'others' ? 'selected' :
                                                        '' }}>Others</option>
                                                </select>
                                                <span id="gender-error" style="color: red;"></span>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Phone No<span style="color:red;">*</span></label>
                                                <input type="text" name="phone_number" class="form-control"
                                                    id="phone_number" placeholder="Phone No"
                                                    value="{{old ('phone_number',$user->phone_number)}}" />
                                                    <span id="phone_number-error" style="color: red;"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Username<span style="color:red;">*</span></label>
                                                <input type="text" name="username" class="form-control" id="username"
                                                    placeholder="User Name"
                                                    value="{{old ('username', $user->username)}}" />
                                                    <span id="username-error" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Email ID</label>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    placeholder="Email ID" value="{{ old('email', $user->email) }}" />
                                                    <span id="email-error" style="color: red;"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Country</label>
                                                <input type="text" name="country" class="form-control" id="country"
                                                    placeholder="Country" value="{{ old('country', $user->country)}}" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>State / Province</label>
                                                <input type="text" name="state" class="form-control" id="state"
                                                    placeholder="State" value="{{ old('state', $user->state)}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" id="city"
                                                    placeholder="City" value="{{ old('city', $user->city)}}" />

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>ZIP Code</label>
                                                <input type="text" class="form-control" id="zip_code" name="zip_code"
                                                    placeholder="ZIP Code"
                                                    value="{{ old('zip_code', $user->zip_code)}}" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Street Address</label>
                                                <input type="text" name="address" class="form-control" id="address"
                                                    placeholder="Street Address"
                                                    value="{{ old('address', $user->address)}}" />
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Select Industry</label>
                                                <select class="form-control" id="industry"
                                                    aria-label="Default select example" name="industry">
                                                    <option value="" selected>Real Estate</option>
                                                    <option value="Car" {{ $user->industry == 'Car' ? 'selected' : ''
                                                        }}>Car</option>
                                                    <option value="Equipments" {{ $user->industry == 'Equipments' ?
                                                        'selected' : '' }}>Equipments</option>

                                                </select>
                                            </div>
                                        </div> --}}



                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" class="btn btn_green">Submit</button>
                                    </div>
                                </div>
                            </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@include('frontend.includes.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    document.getElementById('profile_image_input').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            document.getElementById('profile_image_preview').src = URL.createObjectURL(file);
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#profile_update').on('submit', function(e) {
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
