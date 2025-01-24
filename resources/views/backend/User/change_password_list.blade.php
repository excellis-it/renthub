@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@section('SubscriptonTitle', 'Add New Subscription')
@section('content')

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Listing User Detail</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- End Breadcrumb -->
    <div class="card">
        <div class="card-body">
            <h4 class="d-flex align-items-center mb-3">Change Password</h4>
            <form id="subcription_form" action="{{route('admin-store-password-list')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$data}}">
                {{-- @dd($data); --}}

                {{-- New Password --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">New Password<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="new_password" type="password" class="form-control"
                            placeholder="Enter New Password" value="" />
                        <span style="color: #e20000" class="error" id="new_password-error"></span>
                    </div>
                </div>


               {{-- Confirm Password --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Confirm Password</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="confirm_password" type="password" class="form-control"
                            placeholder="Enter Confirm Password" value="" />
                        <span style="color: #e20000" class="error" id="confirm_password-error"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
            document.getElementById('profile_image_input').addEventListener('change', function(event) {
                const [file] = event.target.files;
                if (file) {
                document.getElementById('profile_image_preview').src = URL.createObjectURL(file);
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {

            // Prevent form submission on submit
            $('form').on('submit', function (e) {
                e.preventDefault();

                // Clear previous error messages
                $('.error').text('');

                // Create a FormData object for file uploads and other inputs
                let formData = new FormData(this);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin-store-password-list') }}",  // Laravel route URL
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        //console.log(response); // Log the response for debugging

                        if(response.status == true){

                            window.location.replace("{{ URL::to('admin/user/listing_user') }}");
                            toastr.success(response.message, {timeout: 1000});
                        } else {
                            console.error("Response status is not true");
                        }
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
