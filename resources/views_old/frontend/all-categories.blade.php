@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')




    <section class="product_type">
      <div class="container">
        <div class="row">

          <div class="col-lg-3">

            <div class="product_car">
              <span><img src="{{asset('public/uploads/images/category/' . $property->category_image)}}" alt="" /></span>
              <h4>{{$property->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/property-for-rent')}}">Browse Properties</a>
            </div>

          </div>

          <div class="col-lg-3">
            <div class="product_car">
              <span><img src="{{asset('public/uploads/images/category/' . $vehicle->category_image)}}" alt="" /></span>
              <h4>{{$vehicle->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/vehicles')}}">Browse Car</a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="product_car">
              <span><img src="{{asset('public/uploads/images/category/' . $machinery->category_image)}}" alt="" /></span>
              <h4>{{$machinery->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/equipment-and-machineries')}}">Browse Equipment</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="product_car">
              <span><img src="{{asset('public/uploads/images/category/' . $electronics->category_image)}}" alt="" /></span>
              <h4>{{$electronics->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/electronics-home-appliances')}}">Browse Trucks</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('frontend.includes.footer')


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
                      <input type="text" class="form-control" id="" value="" placeholder="First & last name"
                        required="">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Phone</label>
                      <input type="text" class="form-control" id="" value="" placeholder="Phone" required="">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" class="form-control" id="" value="" placeholder="Email" required="">
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Message</label>
                      <textarea class="form-control form-control-1" id="" placeholder="Message" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Interested In</label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Request a tour
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                          checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Apply
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3"
                          checked>
                        <label class="form-check-label" for="flexRadioDefault3">
                          Enquire
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Select a preferred date for tour <span>(optional)</span></label>
                      <input type="date" class="form-control" id="" value="" placeholder="Email" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-12">
                      <div class="text-center request-btn">
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

    @endsection


