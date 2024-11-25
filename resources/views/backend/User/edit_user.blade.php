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
                    <li class="breadcrumb-item active" aria-current="page">Edit Listing User</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- End Breadcrumb -->
    <div class="card">
        <div class="card-body">
            <h4 class="d-flex align-items-center mb-3">Edit Listing User</h4>
            <form id="subcription_form" action="{{route('admin-update-user')}}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $data->id ?? '' }}" />

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Profile Picture<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <label for="profile_image_input">Upload Image</label>
                        <div class="mt-1">
                            <input type="file" name="photo" class="form-control" id="profile_image_input" onchange="previewImage(event)">
                        </div>
                        <div class="col-md-auto mt-3">
                            <img src="{{ $data->photo ? asset('uploads/images/profile/'.$data->photo) : asset('frontend_assets/assets/images/admin-logo.jpg') }}"
                                alt="Profile Image" class="rounded-circle" width="120" height="120"
                                id="profile_image_preview">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Title<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                            <select name="title" class="form-select" aria-label="Default select example">
                                <option value="" >Select Title</option>
                                <option value="Mr" {{ $data->title == 'Mr' ? 'selected' : '' }}>Mr</option>
                                <option value="Mrs" {{ $data->title == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                            </select>
                            <span style="color: #e20000" class="error" id="title-error"></span>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">First Name<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="first_name" type="text" class="form-control"
                            placeholder="Enter First Name" value="{{ $data->first_name ?? '' }}" />
                        <span style="color: #e20000" class="error" id="first_name-error"></span>
                    </div>
                </div>

                 {{-- last name --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Last Name<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="last_name" type="text" class="form-control "
                            placeholder="Enter Last Name" value="{{ $data->last_name ?? '' }}" />
                        <span style="color: #e20000" class="error" id="last_name-error"></span>
                    </div>
                </div>

                {{-- gender --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- <input name="last_name" type="text" class="form-control"
                            placeholder="Enter Last Name" value="{{ $data->gender ?? '' }}" /> --}}
                            {{-- gender dropdown --}}
                            <select name="gender" class="form-select" aria-label="Default select example">
                                <option value="" >Select Gender</option>
                                <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="others" {{ $data->gender == 'others' ? 'selected' : '' }}>Other</option>
                            </select>

                        <span style="color: #e20000" class="error" id="last_name-error"></span>
                    </div>
                </div>

                {{-- phone --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="phone_number" type="text" class="form-control"
                            placeholder="Enter Phone" value="{{ $data->phone_number ?? '' }}" />
                        <span style="color: #e20000" class="error" id="phone_number-error"></span>
                    </div>
                </div>

                {{-- country --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="country" type="text" class="form-control"
                            placeholder="Enter Country" value="{{ $data->country ?? '' }}" />
                        <span style="color: #e20000" class="error" id="country-error"></span>
                    </div>
                </div>

                {{-- state --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">State</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="state" type="text" class="form-control"
                            placeholder="Enter State" value="{{ $data->state ?? '' }}" />
                        <span style="color: #e20000" class="error" id="state-error"></span>
                    </div>
                </div>

                {{-- city --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="city" type="text" class="form-control"
                            placeholder="Enter City" value="{{ $data->city ?? '' }}" />
                        <span style="color: #e20000" class="error" id="city-error"></span>
                    </div>
                </div>

                {{-- zipcode --}}

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Zipcode</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="zip_code" type="text" class="form-control"
                            placeholder="Enter Zipcode" value="{{ $data->zip_code ?? '' }}" />
                        <span style="color: #e20000" class="error" id="zip_code-error"></span>
                    </div>
                </div>
{{--
                street address --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Street Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="address" type="text" class="form-control"
                            placeholder="Enter Street Address" value="{{ $data->address ?? '' }}" />
                        <span style="color: #e20000" class="error" id="address-error"></span>
                    </div>
                </div>

                {{-- user name --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">User Name<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="username" type="text" class="form-control"
                            placeholder="Enter User Name" value="{{ $data->username ?? '' }}" />
                        <span style="color: #e20000" class="error" id="username-error"></span>
                    </div>
                </div>

                {{-- emailid --}}

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email Id<span style="color:red;">*</span></h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="email" type="email" class="form-control"
                            placeholder="Enter Email Id" value="{{ $data->email ?? '' }}" />
                        <span style="color: #e20000" class="error" id="email-error"></span>
                    </div>
                </div>

                {{-- id type --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Id Type</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{-- <input name="id_type" type="text" class="form-control"
                            placeholder="Enter Id Type" value="{{ $data->id_type ?? '' }}" /> --}}
                            <select name="govt_id_type" class="form-select" aria-label="Default select example">
                                <option value="" >Select ID Type</option>
                                <option value="Driving License" {{ $data->govt_id_type == 'Driving License' ? 'selected' : '' }}>Driving License</option>
                                <option value="Non Driving ID" {{ $data->govt_id_type == 'Non Driving ID' ? 'selected' : '' }}>Non Driving ID</option>
                                <option value="Passport" {{ $data->govt_id_type == 'Passport' ? 'selected' : '' }}>Passport</option>
                            </select>
                        <span style="color: #e20000" class="error" id="govt_id_type-error"></span>
                    </div>
                </div>

                {{-- company name --}}

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Company Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="company_name" type="text" class="form-control"
                            placeholder="Enter Company Name" value="{{ $data->company_name ?? '' }}" />
                        <span style="color: #e20000" class="error" id="company_name-error"></span>
                    </div>
                </div>

                {{-- corporate id --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Corporate Id</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="corporate_id" type="text" class="form-control"
                            placeholder="Enter Corporate Id" value="{{ $data->corporate_id ?? '' }}" />
                        <span style="color: #e20000" class="error" id="corporate_id-error"></span>
                    </div>
                </div>

                {{-- tax id --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Tax Id</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="tax_id" type="text" class="form-control"
                            placeholder="Enter Tax Id" value="{{ $data->tax_id ?? '' }}" />
                        <span style="color: #e20000" class="error" id="tax_id-error"></span>
                    </div>
                </div>

                {{-- image --}}
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Govt id file</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="govt_id_file" type="file" class="form-control"
                            placeholder="Enter Image" value="{{ $data->govt_id_file ?? '' }}" />
                        <span style="color: #e20000" class="error" id="govt_id_file-error"></span>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <!-- Inline Radio Buttons -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="1" {{ $data->status == '1' ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="0" {{ $data->status == '0' ? 'checked' : '' }}>
                            <label class="form-check-label">Inactive</label>
                        </div>
                        <span style="color: #e20000" class="error" id="status-error"></span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Update" />
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
                    url: "{{ route('admin-update-user') }}",  // Laravel route URL
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log(response); // Log the response for debugging

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
