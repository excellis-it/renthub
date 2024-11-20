@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">
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
                        <h1>Machine</h1>
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
                                    <a href="{{ asset('images/' . $data->product_thumbnail) }}"
                                        data-lightbox="homePortfolio">
                                        <img src="{{ asset('images/' . $data->product_thumbnail) }}" />
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
                                                <a href="{{ asset('images/' . $val->product_image) }}"
                                                    data-lightbox="homePortfolio">
                                                    <img src="{{ asset('images/' . $val->product_image) }}" />
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
                                                    @if (isset($data->tag_line))
                                                        {{ $data->tag_line }}
                                                    @endif
                                                </div>


                                            @if (isset($data))
                                                <div class="star-div mb-div">
                                                    @if (Auth::check())
                                                        <a href="{{ URL::to('/user/review/' . Crypt::encrypt($data->product_id)) }}">
                                                            <ul class="star_ul">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><span>(5)</span></li>
                                                            </ul>
                                                        </a>
                                                    @else
                                                        <a href="{{ URL::to('/login') }}">
                                                            <ul class="star_ul">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><span>(5)</span></li>
                                                            </ul>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>

                                <div class="propety-price mb-div">${{ $data->product_price }}
                                    <span>${{ $data->marked_price }}</span>
                                </div>
                                <a href="javascript:void(0)" tabindex="0"
                                    style="color:#1E1E1E">{{ $data->product_name }}</a>
                            </div>
                            <div class="room-details-div-wrap mb-div">
                                <div class="room-details-div d-flex align-items-center">

                                    {{-- <div class="room-details d-flex align-items-center">

                                    <div class="room-d-img">
                                        <img src="assets/images/mfg_date.svg" alt="">
                                    </div>
                                    <div class="room-details-text">
                                        <h3>MFG Date: Jan.2022</h3>
                                    </div>

                                </div> --}}


                                    <div class="room-details d-flex align-items-center">
                                        <div class="room-d-img">
                                            <img src="{{ asset('frontend_assets/assets/images/mfg_date.svg') }}"
                                                alt="">
                                        </div>
                                        <div class="room-details-text">
                                            <h3> MFG Date: {{ date('jS F, Y', strtotime($data->manufacture_date)) }}</h3>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="propety-type mb-div"> <span> <span><img
                                            src="{{ asset('frontend_assets/assets/images/map.svg') }}"
                                            alt="" /></span> {{ $data->location }} </span>
                            </div>
                            <div class="agent_text">{{ strtoupper($data->vendor_type) }}</div>
                            <div class="mb-3">
                                <div class="addtocart">
                                    @if(Auth::user() && Auth::user()->hasRole('user'))
                                        <a href="javascript:void();" class="inquire-modal"><span>Inquire Now</span></a>
                                    @elseif(Auth::user() && !Auth::user()->hasRole('user'))
                                        <a href="#"><span>Inquire Now</span></a>
                                    @else
                                        <a href="{{ url('login/') }}"><span>Inquire Now</span></a>
                                    @endif
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
                                        type="button" role="tab" aria-controls="home" aria-selected="true">Facts and
                                        Features / Amenities</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="description-div">{!! $data->product_short_description !!}</div>
                                </div>
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    {!! $data->product_long_description !!}
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
                    @if (isset($machinery))
                        @foreach ($machinery as $val)
                            <div class="it  p-2">

                                <div class="feature_box">

                                    <div class="for_rent">{{ strtoupper($val->product_type) }}</div>
                                    <a href="javascript:void(0);" class="wishlist_rent"><i
                                            class="fa-solid fa-heart"></i></a>
                                    <div class="feature_img">
                                        <a href="{{ URL::to('equipment-and-machineries-details/' . Crypt::encrypt($val->product_id)) }}"><img
                                                src="{{ asset('images/' . $val->product_thumbnail) }}" /></a>
                                    </div>
                                    <div class="feature_text">
                                        <div class="d-block d-md-flex justify-content-between">
                                            <div class="propety-title mb-div">
                                                @if (isset($data->tag_line))
                                                    {{ $data->tag_line }}
                                                @endif
                                            </div>
                                            @if (isset($data))
                                                <div class="star-div mb-div">
                                                    @if (Auth::check())
                                                        <a href="{{ URL::to('/user/review/' . Crypt::encrypt($data->product_id)) }}">
                                                            <ul class="star_ul">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><span>(5)</span></li>
                                                            </ul>
                                                        </a>
                                                    @else
                                                        <a href="{{ URL::to('/login') }}">
                                                            <ul class="star_ul">
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><i class="fa-solid fa-star"></i></li>
                                                                <li><span>(5)</span></li>
                                                            </ul>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>
                                        <span class="price_text">${{ $val->product_price }}
                                            <span>${{ $val->marked_price }}</span>
                                            <a href="javascript:void(0);">{{ $val->product_name }}</a>

                                            <div class="d-flex">
                                                <span class="me-1">
                                                    <img src="{{ asset('frontend_assets/assets/images/map.svg') }}"
                                                        alt="" /></span>{{ $val->location }}
                                            </div>
                                            <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                                    </div>
                                    <div class="addtocart">
                                        @if(Auth::user())
                                        <a href="javascript:void();" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><span>Inquire Now</span></a>
                                        @else
                                        <a href="{{ url('login/') }}"><span>Inquire Now</span></a>
                                        @endif
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


@endsection
