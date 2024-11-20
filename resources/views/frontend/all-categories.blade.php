@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')




    <section class="product_type">
      <div class="container">
        <div class="row">

          <div class="col-lg-3">

            <div class="product_car">
              <span><img src="{{asset('uploads/images/category/' . $property->category_image)}}" alt="" /></span>
              <h4>{{$property->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/property-for-rent')}}">Browse Properties</a>
            </div>

          </div>

          <div class="col-lg-3">
            <div class="product_car">
              <span><img src="{{asset('uploads/images/category/' . $vehicle->category_image)}}" alt="" /></span>
              <h4>{{$vehicle->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/vehicles')}}">Browse Car</a>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="product_car">
              <span><img src="{{asset('uploads/images/category/' . $machinery->category_image)}}" alt="" /></span>
              <h4>{{$machinery->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/equipment-and-machineries')}}">Browse Equipment</a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="product_car">
              <span><img src="{{asset('uploads/images/category/' . $electronics->category_image)}}" alt="" /></span>
              <h4>{{$electronics->category_name}}</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
              <a href="{{URL::to('/electronics-home-appliances')}}">Browse Trucks</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    @include('frontend.includes.footer')




    @endsection


