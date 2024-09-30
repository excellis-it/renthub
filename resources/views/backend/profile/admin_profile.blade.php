@php
    use Illuminate\Support\Facades\Auth;
    $data = Auth::user();
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Profile')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">

                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <form id="profile_image" method="POST" action="{{route('admin-profile-image-update')
                                }}" enctype="multipart/form-data">
                                    @csrf
                                            <img id="show_image" src="{{!empty($data->photo) ?
                                            url('public/uploads/images/profile/' . $data->photo):
                                            url('public/uploads/images/user_default_image.png')}}"
                                        alt="User Image"
                                        class="" width="110">
                                    <div class="mt-3">
                                        <h4>{{$data->first_name}}</h4>
                                        <label for="file-upload" class="btn btn-outline-primary"
                                                style="border: 1px solid #ccc;display: inline-block;padding: 6px 12px;cursor: pointer;">
                                            <i class="bx bxs-cloud-upload"></i> upload photo
                                        </label>
                                        <input name="image" id="file-upload" type="file" style="display: none"/>
                                        <input class="btn btn-primary" type="submit" value="Save"/>
                                        @if ($errors->has('image'))
                                        <div class="error" style="color:red;">
                                            {{ $errors->first('image') }}</div>
                                    @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="d-flex align-items-center mb-3">User Info</h4>
                            <br>
                            <form id="info_form" action="{{route('admin-profile-info-update')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name<span style="color:red;">*</span></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="name" type="text" class="form-control" value="{{$data->first_name}} {{$data->last_name}}"
                                                autofocus placeholder="Your name"/>
                                        <span style="color: #e20000" class="error" id="name-error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email<span style="color:red;">*</span></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" type="email" class="form-control" value="{{$data->email}}" placeholder="Your email"/>
                                        <span style="color: #e20000" class="error" id="email-error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Username<span style="color:red;">*</span></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="username" type="text" class="form-control"
                                               value="{{$data->username}}" placeholder="Your user name" />
                                        <span style="color: #e20000" class="error" id="username-error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone_number" type="text" class="form-control"
                                               value="{{$data->phone_number}}" placeholder="Your phone number" />
                                        <span style="color: #e20000" class="error" id="phone_number-error"></span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="address" type="text"
                                               class="form-control"
                                               value="{{$data->address}}" placeholder="Your address"/>
                                        <span style="color: #e20000" class="error" id="address-error"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes"
                                        />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="d-flex align-items-center mb-3">Change Password</h4>
                                    <br>
                                    <form id="password_form" action="{{route('admin-profile-password-update')}}"
                                          method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Current Password<span style="color:red;">*</span></h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="password" type="password" class="form-control" placeholder="current password" />
                                                <span style="color: #e20000" class="error" id="password-error"></span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">New Password<span style="color:red;">*</span></h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="new_password" type="password" class="form-control" placeholder="new password" autofocus/>
                                                <span style="color: #e20000" class="error"
                                                       id="new_password-error"></span>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Confirm Password<span style="color:red;">*</span></h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input name="confirm_password" type="password" class="form-control" placeholder="confirm password"
                                                       autofocus/>
                                                <span style="color: #e20000" class="error" id="confirm_password-error"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Update"/>
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
    </div>
@endsection

@section('AjaxScript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //profile update
            $('#info_form').on('submit', function (event) {
                event.preventDefault();
                $('#info_form *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#info_form *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('admin-profile-info-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#info_form *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#info_form *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                      
                        // toaster message show with toastr
                        window.location.reload();
                        toastr.success(response.msg, 'Success', {timeOut: 4000});
                        
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });

        //password change
        $(document).ready(function () {
            $('#password_form').on('submit', function (event) {
                event.preventDefault();
                $('#password_form *').filter(':input.is-invalid').each(function () {
                    this.classList.remove('is-invalid');
                });
                $('#password_form *').filter('.error').each(function () {
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('admin-profile-password-update')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        // remove errors if the conditions are true
                        $('#password_form *').filter(':input.is-invalid').each(function () {
                            this.classList.remove('is-invalid');
                        });
                        $('#password_form *').filter('.error').each(function () {
                            this.innerHTML = '';
                        });
                        window.location.reload();
                        toastr.success(response.msg, 'Success', {timeOut: 3000});
                    },
                    error: function (response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err) {
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key).addClass('is-invalid');
                        });
                    }
                });
            });
        });

     
    </script>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#profile_image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
