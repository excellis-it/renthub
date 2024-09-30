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
                            <div class="card border-0 shadow py-4">
                                <div class="text-center">

                                    <img src="{{asset('frontend_assets/assets/images/logo.png')}}" class="card-img-top rounded-circle w-50 shadow"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{$user->first_name}} {{$user->last_name}}</b></h5>
                                    </div>
                                </div>

                                <div class="list-group ">
                                    <a href="{{URL::to('/user/profile')}}" class="list-group-item list-group-item-action "
                                        aria-current="true">
                                        <i class="fa-solid fa-home"></i> Dashboard
                                    </a>
                                    <a href="{{URL::to('/user/edit/'.$user->id)}}" class="list-group-item list-group-item-action"> <i class="fa-solid fa-car"></i> Update Profile</a>
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
                            <form id="change_pass" action="{{url('/user/update-password')}}" method="post">
                                <!-- Step 1 -->
                                <div class="step" id="step1-2">
                                @csrf
                                  <div class="row">
                                                 
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                          <label>Current Password</label>
                                          <input type="password" class="form-control" placeholder="Current Password" name="password"  id="password" value="{{old('password')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                          <label>New Password</label>
                                          <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" value="{{old('new_password')}}"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-3">
                                          <label>Confirm Password</label>
                                          <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password"  id="confirm_password" value="{{old('confirm_password')}}"/>
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


    <script src="{{ asset('frontend_assets/assets/css/lightbox.min.css') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
           $(document).ready(function() {
                $('#change_pass').on('submit', function(e) {
                    e.preventDefault();
                    
                    var data = $(this).serialize();
                    var type = "POST";
                    var url = $(this).attr('action');
                   
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: data,
                        success: function(resp) {
           
                            toastr.success('Password changed successfully!', 'Success', {
                                closeButton: true,
                                progressBar: true
                            });
                            $("#change_pass")[0].reset();
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



    /*function change(){
        var formData = $('#change_pass').serialize();

        $.ajax({
                   url: "{{ url('/user/update-password') }}", 
                    type: 'POST',
                    data: formData,
                    dataType: 'json', 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  success: function(res) {
                          var res = JSON.parse(res);
                          $('#propertyList').html(res.result);
                          
                        }
                  
              });
    }*/
    </script>


@endsection