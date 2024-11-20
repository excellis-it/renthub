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
                            <h1>User Payment History</h1>
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

                                <img src="{{asset('frontend_assets/assets/images/logo.png')}}" class="card-img-top rounded-circle w-50 shadow" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title"><b>{{$user->first_name}} {{$user->last_name}}</b></h5>
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
                            <div class="title mb-3">
                                <h2>Payment History</h2>
                            </div>
                            <div class="row g-3 mb-5">
                              
                              
                              </div>
                              <div class="card shadow border-0 mb-4">
                                <div class="card-header">
                                  <h5 class="mb-0">Payment History</h5>
                                </div>
                                <div class="table-responsive">
                                @if(isset($data))
                                 
                                  <table class="table table-hover table-nowrap mb-0">
                                    <thead class="thead-light">
                                      <tr>
                                       
                                        <th scope="col">Card Holder</th>
                                        <th scope="col">Card Number</th>
                                        <th scope="col">Expiry Date</th>
                                        <th scope="col">Cvv</th>
                                       
                                        <th></th>
                                      </tr>
                                    </thead>
                                     @foreach($data as $val)
                                    <tbody>
                                      <tr>
                                  
                                        <td>{{$val->card_holder}}</td>
                                        <td>{{$val->card_number}}</td>
                                        <td>{{date('jS F, Y',strtotime($val->expiry_date))}}</td>
                                        <td>{{$val->cvv}}</td>
                                        <td class="text-end">
                                          <a href="#" class="view_icon">
                                            <i class="fa-solid fa-eye"></i>
                                          </a>
                                          <a href="#" class="delete_icon">
                                            <i class="fa-solid fa-trash"></i>
                                          </a>
                                        </td>
                                      </tr>

                                    </tbody>
                                    @endforeach
                                  </table>
                                    
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
@endsection