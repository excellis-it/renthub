@extends('frontend.includes.master')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">
    @include('frontend.includes.header')


    <section class="inner_banner_sec"
        style="
    background-image: url({{ asset('frontend_assets/assets/images/inr-bnr.jpg') }});
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-banner-text">
                        <h1>{{ $data->product_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="property-details-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="property-img">
                        <div class="for_rent">{{ strtoupper($data->product_type) }}</div>
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <div class="property-img-main">
                                    <a href="{{ asset('public/images/' . $data->product_thumbnail) }}"
                                        data-lightbox="homePortfolio">
                                        <img src="{{ asset('public/images/' . $data->product_thumbnail) }}" />
                                    </a>
                                    <!-- <img src="assets/images/feature_car.jpg" alt=""> -->
                                </div>
                            </div>
                        </div>
                        <div class="property-img-others-div">
                            <div class="row">


                                @if ($images)
                                    @foreach ($images as $val)
                                        <div class="mb-3 col-lg-6">
                                            <div class="property-img-others">
                                                <a href="{{ asset('public/images/' . $val->product_image) }}"
                                                    data-lightbox="homePortfolio">
                                                    <img src="{{ asset('public/images/' . $val->product_image) }}" />
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="property-details-div">
                        <div class="property-details">
                            <div class="">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="propety-title mb-div">
                                        {{ $data->tag_line }}
                                    </div>
                                    @if (isset($data))
                                        <div class="star-div mb-div">
                                            <a href="{{ URL::to('/user/review/' . $data->product_id) }}">
                                                <ul class="star_ul ">
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                    <li><span>(5)</span></li>
                                                </ul>

                                            </a>
                                        </div>
                                    @endif
                                </div>

                                <div class="propety-price mb-div">${{ $data->product_price }}
                                    <span>${{ $data->marked_price }}</span>
                                </div>
                                <a href="javascript:void(0)" tabindex="0"
                                    style="color:#1E1E1E">{{ $data->product_name }}</a>

                                {{-- <div class="propety-type mb-div">Property Type: <span> Apartments</span>
                  </div> --}}

                                <div class="room-details-div-wrap mb-div">
                                    <div class="room-details-div d-flex align-items-center">
                                        <div class="room-details d-flex align-items-center">
                                            <div class="room-d-img">
                                                <img src="{{ asset('frontend_assets/assets/images/bed.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="room-details-text">
                                                <h3>{{ $data->property_bed }}</h3>
                                            </div>
                                        </div>
                                        <div class="room-details d-flex align-items-center">
                                            <div class="room-d-img">
                                                <img src="{{ asset('frontend_assets/assets/images/bath.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="room-details-text">
                                                <h3>{{ $data->property_bathroom }}</h3>
                                            </div>
                                        </div>
                                        <div class="room-details d-flex align-items-center">
                                            <div class="room-d-img">
                                                <img src="{{ asset('frontend_assets/assets/images/sqft.svg') }}"
                                                    alt="">
                                            </div>
                                            <div class="room-details-text">
                                                <h3>{{ $data->property_size }}</h3>
                                            </div>
                                        </div>

                                        {{-- <div class="room-details d-flex align-items-center">
                        <div class="room-d-img">
                          <img src="assets/images/pet.svg" alt="">
                        </div>
                        <div class="room-details-text">
                          <h3>Pet: Allowed</h3>
                        </div>
                      </div> --}}

                                    </div>
                                </div>
                                <div class="propety-type mb-div"> <span> <span><img src="assets/images/map.svg"
                                                alt="" /></span>{{ $data->location }}</span>
                                </div>
                                <div class="agent_text">{{ strtoupper($data->vendor_type) }}</div>
                                <div class="mb-3">
                                    <div class="addtocart">
                                        <a href="javascript:void();" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><span>Inquire Now</span></a>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs fact_features" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                            type="button" role="tab" aria-controls="home" aria-selected="true">Facts
                                            and Features / Amenities</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="description-div">{!! $data->product_short_description !!}</div>
                                    </div>
                                    <div class="tab-pane fade" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        {!! $data->product_long_description !!}
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row gy-3">
                <div class="mt-4 col-12">
                    <h2 class="mb-0 title">Related Products</h2>
                </div>

                <div class="related">
                    @if (isset($property))
                        @foreach ($property as $val)
                            <div class="p-2 it">

                                <div class="feature_box">

                                    <div class="for_rent">{{ strtoupper($val->product_type) }}</div>
                                    <a href="javascript:void(0);" class="wishlist_rent"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <div class="feature_img">
                                        <a href="{{ URL::to('property-details/' . $val->product_id) }}"><img
                                                src="{{ asset('public/images/' . $val->product_thumbnail) }}" /></a>
                                    </div>
                                    <div class="feature_text">
                                        <div class="d-block d-md-flex justify-content-between">
                                            <div class="commercial_propety">
                                                Type
                                            </div>
                                            <ul class="star_ul">
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><i class="fa-solid fa-star"></i></li>
                                                <li><span>(5)</span></li>
                                            </ul>
                                        </div>
                                        <span class="price_text">${{ $val->product_price }}
                                            <span>${{ $val->marked_price }}</span>
                                            <a href="javascript:void(0);">{{ $val->product_name }}</a>

                                            <div class="d-flex"><span class="me-1"><img
                                                        src="{{ asset('frontend_assets/assets/images/map.svg') }}"
                                                        alt="" /></span>{{ $val->location }}</div>
                                            <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                                    </div>
                                    <div class="addtocart">
                                        <a href="javascript:void(0);"><span>Inquire Now</span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="mb-3 col-12">
                <h2 class="mb-0 title">Reviews</h2>
            </div>
            <div class="col-lg-12">
                @if ($review && $review->isNotEmpty())
                    <div class="row">
                        @foreach ($review as $val)
                            <div class="col-lg-6">
                                <div class="mb-3 border-0 shadow card">
                                    <div class="px-3 row g-0">
                                        <div class="col-md-3">
                                            <img src="{{ asset('frontend_assets/assets/images/logo.png') }}"
                                                 class="pt-2 img-fluid rounded-start" alt="...">
                                        </div>
            
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <h5 class="mb-0 card-title">
                                                    {{ $val->user->first_name }} {{ $val->user->last_name }}
                                                </h5>
            
                                                @php
                                                    $rating_point = $val->rating_point;
                                                @endphp
                                                <ul class="star_ul">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $rating_point)
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa-regular fa-star"></i></li>
                                                        @endif
                                                    @endfor
                                                    <li><span>({{ $rating_point }})</span></li>
                                                </ul>
                                                <p class="card-text">{{ $val->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h4>No data found</h4>
                @endif
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
                            @php
                                $productId = request()->route('id'); // Get the product ID from the URL
                            @endphp
                            <form action="enquiry_store" method="POST" id="user-enquiry-form">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $productId }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">First & last name</label>
                                            <input type="text" class="form-control" id="" value=""
                                                placeholder="First & last name" name="name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" class="form-control" id="" value=""
                                                placeholder="Phone" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" id="" value=""
                                                placeholder="Email" name="email" required="">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Message</label>
                                            <textarea class="form-control form-control-1" id="" name="message" placeholder="Message" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Interested In</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="interested_in"
                                                    id="flexRadioDefault1" value="1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Request a tour
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="interested_in"
                                                    id="flexRadioDefault2" value="2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Apply
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="interested_in"
                                                    id="flexRadioDefault3" value="0" checked>
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
                                            <input type="date" class="form-control" id="" value=""
                                                placeholder="Email" name="tour_date" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <div class="text-center request-btn">
                                                <input type="submit" class="btn btn-primary px-4" value="Inquire Now" />
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#user-enquiry-form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#user-enquiry-form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#user-enquiry-form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: "{{route('user-enquiry-store')}}",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#user-enquiry-form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#user-enquiry-form *').filter('.error').each(function(){
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err){
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key ).addClass('is-invalid');
                        });
                    }
                });
            });
        });
    </script>
@endsection