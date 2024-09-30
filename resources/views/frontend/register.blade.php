@extends('frontend.includes.master')
<link href="{{ asset('frontend_assets/assets/css/signup.css') }}" rel="stylesheet">


@section('content')
    @include('frontend.includes.header')
    <div class="registration_sec">
        <div class="container">
            <div class="sign-up-form">
                <h2 class="title mb-3 text-center">Sign up</h2>
                <div style="text-align:center">
                    <button class="tablinks btn" onclick="openTab(event, 'FirstForm')">Listing User</button>
                    <button class="tablinks btn btn_green" onclick="openTab(event, 'SecondForm')">Basic User</button>
                </div>
                <div class="tab" id="FirstForm">
                    <h4>Listing User</h4>
                    <div class="progress-bar mb-3">
                        <div id="progress1" class="progress"></div>
                    </div>

                    
                    <form id="listing_user" action="{{ url('listing-user-register') }}" method="post" enctype="multipart/form-data">
                        
                                    <div class="step" id="step1-1">
                                        
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <label>Title</label>
                                                              
                                                                <select class="form-control" name="title">
                                                                    <option value="" selected>Choose</option>
                                                                    <option value="Mr">Mr.</option>
                                                                    <option value="Mrs">Mrs.</option>
                                                                  
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <label>First Name</label>
                                                                
                                                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                                                    placeholder="First Name" value="{{old('first_name')}}" required/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <label>Last Name</label>
                                                             
                                                                <input type="text" name="last_name"   class="form-control @error('last_name') is-invalid @enderror"
                                                                    placeholder="Last Name" value="{{old('last_name')}}" />
                                                                   
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <label>Gender</label>
                                                              
                                                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                                                    <option selected>Choose</option>
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                    <option value="others">Others</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                        <div class="form-group mb-3">
                                                                            <label>Phone No</label>
                                                                        
                                                                            <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" name="phone_number"
                                                                                placeholder="Phone No" value="{{old('phone_number')}}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                    <div class="form-group mb-3">
                                                                        <label>Country</label>
                                                                        @error('country')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                        <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" value="{{old('country')}}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group mb-3">
                                                                        <label>State / Province</label>
                                                                        @error('state')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                        <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="State" value="{{old('state')}}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group mb-3">
                                                                        <label>City</label>
                                                                        @error('city')
                                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                                        @enderror
                                                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" value="{{old('city')}}"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                       
                                                    <div class="row">   
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <label>ZIP Code</label>
                                                                @error('zip_code')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="ZIP Code" value="{{old('zip_code')}}" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-3">
                                                                <label>Street Address</label>
                                                                @error('address')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                                                    placeholder="Street Address" value="{{old('address')}}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4>Authentication Details</h4>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Username</label>
                                                                @error('username')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="text" name="username"  class="form-control @error('username') is-invalid @enderror"
                                                                    placeholder="User Name" value="{{old('username')}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Email ID</label>
                                                                @error('email')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email ID" value="{{old('email')}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Password</label>
                                                                @error('password')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="password" class="form-control" name="password"
                                                                    placeholder="Password" />

                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Confirm Password</label>
                                                                @error('password_confirmation')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="password" class="form-control" name="password_confirmation"
                                                                    placeholder="Confirm Password"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4>Govt ID</h4>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>ID Type</label>
                                                                @error('govt_id_type')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <select class="form-control @error('govt_id_type') is-invalid @enderror" name="govt_id_type"
                                                                    aria-label="Default select example">
                                                                    <option value="Driving License">Driving License</option>
                                                                    <option value="Non Driving ID">Non Driving ID</option>
                                                                    <option value="Passport">Passport</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label></label>
                                                                @error('govt_id_file')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="file" class="form-control"   name="govt_id_file" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4>Company Info (If Applicable)</h4>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Company Name</label>
                                                                <input type="text" class="form-control" name="company_name"
                                                                    placeholder="Company Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Corporate ID</label>
                                                                <input type="text" class="form-control" name="corporate_id"
                                                                    placeholder="Corporate ID" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Tax ID</label>
                                                                <input type="text" class="form-control" name="tax_id"
                                                                    placeholder="Tax ID" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="checkbox" id="termcheckbox" class="form-check-input me-2" onclick="toggleSubmitButton()">
                
                                                            
                                                                        <label for="terms-checkbox" class="form-check-label">
                                                                        I accepted all the <a href="{{URL::to('/privacy-policy')}}" target="_blank">Terms & Conditions</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="submit" id="submit-button" name="submit" class="btn btn btn_green" disabled="true">Submit</button>
                                                    </div>
                                    </div>
                                    @csrf
                        </form>
                </div>
            </div>
       

    

   

            <div class="tab" id="SecondForm">
                <h4>Basic User</h4>
                <div class="progress-bar mb-3">
                    <div id="progress2" class="progress"></div>
                </div>
                <form id="basic_user" action="{{ url('basic-user-register') }}" method="post">
                    <!-- Step 1 -->

                    <div class="step" id="step1-2">
                        @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>Title</label>
                                                              
                                            <select class="form-control" name="title">
                                                <option value="" selected>Choose</option>
                                                <option value="Mr">Mr.</option>
                                                <option value="Mrs">Mrs.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                                                placeholder="First Name" required />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                                                placeholder="Last Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>Gender</label>
                                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" aria-label="Default select example" >
                                                <option selected>Choose</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>Phone No</label>
                                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone No" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>Country</label>
                                            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" placeholder="Country" />
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>State / Province</label>
                                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" placeholder="State" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mb-3">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="City" />

                                        </div>
                                    </div>
                                </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label>ZIP Code</label>
                                    <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" placeholder="ZIP Code" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label>Street Address</label>
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Street Address" />
                                </div>
                            </div>
                        </div>

                                                    <hr>
                                                    <h4>Authentication Details</h4>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Username</label>
                                                                @error('username')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="text" name="username"  class="form-control @error('username') is-invalid @enderror"
                                                                    placeholder="User Name" value="{{old('username')}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Email ID</label>
                                                                @error('email')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email ID" value="{{old('email')}}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Password</label>
                                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <label>Confirm Password</label>
                                                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group mb-3">
                                                                <div class="d-flex align-items-center">
                                                                    
                                                                       <i class="lni lni-check-box"><input type="checkbox" id="terms-checkbox" class="form-check-input me-2" onclick="toggleSubmitButton()"></i>
                                                            
                                                                        <label for="terms-checkbox" class="form-check-label">
                                                                        I accepted all the <a href="{{URL::to('/privacy-policy')}}" target="_blank">Terms & Conditions</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                      
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" id="submit" name="submit" class="btn btn_green" disabled="true">Submit</button>
                                            </div>
                    </div>
                    
                    
                </form>
            </div>
            <p class="social-text text-center">Or Sign up with social platforms</p>
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
        </div>
    </div>
    @include('frontend.includes.footer')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
            

    <script>
        $(document).ready(function() {
            function toggleSubmitButton() {
                var checkbox1 = $('#terms-checkbox').is(':checked');
                //alert(checkbox1);
                var checkbox2 = $('#termcheckbox').is(':checked');
               // alert(checkbox2);
                var btn1 = $('#submit');
                var btn2=$('#submit-button');

                btn1.prop('disabled', !checkbox1);

                btn2.prop('disabled', !checkbox2);
    
            }


            $('#terms-checkbox').on('change', toggleSubmitButton);
            $('#termcheckbox').on('change', toggleSubmitButton);
            toggleSubmitButton();
        });
    </script>

      <script type="text/javascript">
           $(document).ready(function() {
            $('#listing_user').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var data = new FormData(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        console.log('Success response:', resp);
                        toastr.success('Your profile is under verification!', 'Success', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000'
                        });

                        form[0].reset();
                    },
                    error: function(resp) {
                        console.log('Error response:', resp);
                        toastr.error('There was an issue submitting the form.', 'Error', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000'
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
           $(document).ready(function() {
            $('#basic_user').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var data = new FormData(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        console.log('Success response:', resp);
                        toastr.success('Basic User added successfully.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000'
                        });

                        form[0].reset();
                    },
                    error: function(resp) {
                        console.log('Error response:', resp);
                        toastr.error('There was an issue submitting the form.', 'Error', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000'
                        });
                    }
                });
            });
        });
    </script>

@endsection
