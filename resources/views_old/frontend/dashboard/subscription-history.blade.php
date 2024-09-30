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
                                <h2>Subscription History</h2>
                            </div>
                            <div class="row g-3 mb-5">
                              
                              
                              </div>
                              <div class="card shadow border-0 mb-4">
                                <div class="card-header">
                                  <h5 class="mb-0">Subscription History</h5>
                                </div>
                                <div class="table-responsive">
                                @if(isset($history))
                                  <table class="table table-hover table-nowrap mb-0">
                                    <thead class="thead-light">
                                      <tr>
                                        
                                        <th scope="col">Title</th>
                                        <th scope="col">Sub Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Days</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">No. of product</th>
                                      </tr>
                                    </thead>
                                    @foreach($history as $val)
                                    <tbody>
                                      <tr>
                                        <td>{{strtoupper($val->subscription->title)}}</td>
                                        <td>{{strtoupper($val->subscription->subtitle)}}</td>
                                        <td>${{$val->price}}</td>
                                        <td>{{$val->days}}</td>
                                        <td>{{$val->end_date}}</td>
                                        <td>{{date('jS F, Y',strtotime($val->subscription->no_of_product))}}</td>
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
@endsection