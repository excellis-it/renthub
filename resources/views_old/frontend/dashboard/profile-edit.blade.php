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
                            <div class="card border-0 shadow py-4">
                                <div class="text-center">

                                    <img src="{{asset('frontend_assets/assets/images/logo.png')}}" class="card-img-top rounded-circle w-50 shadow"
                                        alt="...">
                                        
                                    <div class="card-body">
                                        <h5 class="card-title"> <b>{{ $user->first_name }} {{ $user->last_name }}</b></h5>
                                    </div>
                                </div>

                                <div class="list-group ">
                                     <a href="{{URL::to('/user/profile')}}" class="list-group-item list-group-item-action "
                                        aria-current="true">
                                        <i class="fa-solid fa-home"></i> Dashboard
                                    </a>
                                    <a href="{{URL::to('/user/edit/.$user->id')}}" class="list-group-item list-group-item-action"> <i class="fa-solid fa-car"></i> Update Profile</a>
                                    <a href="{{URL::to('/user/change-password/'.$user->id)}}" class="list-group-item list-group-item-action"><i class="fa-solid fa-screwdriver-wrench"></i> Change Password</a>
                                    <a href="{{URL::to('/user/payment-history')}}" class="list-group-item list-group-item-action "> <i class="fa-solid fa-screwdriver-wrench"></i> Payment History</a>
                                    <a href="{{URL::to('/user/subscription-history')}}" class="list-group-item list-group-item-action active"> <i class="fa-solid fa-screwdriver-wrench"></i> Subscription History</a>
                                    <a href="{{URL::to('/logout')}}" class="list-group-item list-group-item-action"> <i class="fa-solid fa-right-from-bracket" onclick="event.preventDefault(); this.closest
                                            ('form').submit();"></i> Logout</a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="updateprofile_sec">
                                <div class="title mb-3">
                                    <h2>Update Profile</h2>
                                </div>
                                <div class="card p-3 shadow border-0">
                             @if(isset($user))
                            <form id="profile_update" action="{{url('/user/update')}}" method="post">
                           
                                <!-- Step 1 -->
                                <div class="step" id="step1-2">
                                  @csrf
                                   <input name="id" value="{{ $user->id }}" hidden />
                                  <div class="row">

                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>First Name</label>
                                              <input type="text" name="first_name" class="form-control" id="first_name"
                                                  placeholder="First Name" value="{{old('first_name', $user->first_name)}}"/>
                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Last Name</label>
                                              <input type="text" name="last_name" class="form-control" id="last_name"
                                                  placeholder="Last Name" value="{{old ('last_name',$user->last_name)}}"/>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Gender</label>
                                              <select class="form-control" id="gender" name="gender" aria-label="Default select example" >
                                                  <option value="" selected>Choose</option>
                                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                    <option value="others" {{ $user->gender == 'others' ? 'selected' : '' }}>Others</option>
                                              </select>
                                          </div>
                                      </div>  
                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Phone No</label>
                                              <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone No" value="{{old ('phone_number',$user->phone_number)}}"/>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Username</label>
                                              <input type="text" name="username" class="form-control"  id="username" placeholder="User Name" value="{{old ('username', $user->username)}}"/>

                                          </div>
                                      </div>
                                       <div class="col-md-3">
                                            <div class="form-group mb-3">
                                                <label>Email ID</label>
                                                <input type="text" name="email" class="form-control" id="email" placeholder="Email ID" value="{{ old('email', $user->email) }}"/>
                                            </div>
                                        </div>
                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Country</label>
                                              <input type="text" name="country" class="form-control" id="country" placeholder="Country" value="{{ old('country', $user->country)}}"/>
                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>State / Province</label>
                                              <input type="text" name="state" class="form-control" id="state" placeholder="State" value="{{ old('state', $user->state)}}"/>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>City</label>
                                              <input type="text" name="city" class="form-control" id="city" placeholder="City" value="{{ old('city', $user->city)}}"/>

                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>ZIP Code</label>
                                              <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="ZIP Code" value="{{ old('zip_code', $user->zip_code)}}"/>
                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Street Address</label>
                                              <input type="text" name="address" class="form-control" id="address" placeholder="Street Address" value="{{ old('address', $user->address)}}"/>
                                          </div>
                                      </div>

                                      <div class="col-md-3">
                                          <div class="form-group mb-3">
                                              <label>Select Industry</label>
                                              <select class="form-control" id="industry" aria-label="Default select example" name="industry">
                                                  <option value="" selected>Real Estate</option>
                                                  <option value="Car" {{ $user->industry == 'Car' ? 'selected' : '' }}>Car</option>
                                                <option value="Equipments" {{ $user->industry == 'Equipments' ? 'selected' : '' }}>Equipments</option>
                                               
                                              </select>
                                          </div>
                                      </div>
                                      
                                      

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
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg_f7f7f7">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="propety-type mb-div">
                        <div class="tour-form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">First & last name</label>
                                            <input type="text" class="form-control" id="" value=""
                                                placeholder="First & last name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" class="form-control" id="" value="" placeholder="Phone"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" id="" value="" placeholder="Email"
                                                required="">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Message</label>
                                            <textarea class="form-control form-control-1" id="" placeholder="Message"
                                                rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Interested In</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Request a tour
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Apply
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault3" checked>
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    Enquire
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Select a preferred date for tour
                                                <span>(optional)</span></label>
                                            <input type="date" class="form-control" id="" value="" placeholder="Email"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <div class="request-btn text-center">
                                                <a href="#" class="">Inquire Now</a>
                                            </div>
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

@include('frontend.includes.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
           $(document).ready(function() {
                $('#profile_update').on('submit', function(e) {
                    e.preventDefault();
                    
                    var data = $(this).serialize();
                    var type = "POST";
                    var url = $(this).attr('action');
                   
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(resp) {
           
                            toastr.success('Profile updated successfully!', 'Success', {
                                closeButton: true,
                                progressBar: true
                            });
                            $("#profile_update")[0].reset();
                        },
                        error: function(xhr, status, error) {
                           
                            toastr.error('An error occurred while changing the password. Please try again.', 'Error', {
                                closeButton: true,
                                progressBar: true
                            });
                        }
                    });
                });
            });
    </script>
@endsection