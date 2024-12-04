@php use App\MyHelpers;use Illuminate\Support\Facades\Auth; @endphp
@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')

<section class="banner__slider banner_sec right_btm_arrow">
    <div class="slider stick-dots">

        @if (isset($slider))
        @foreach ($slider as $val)
        <div class="slide">

            <div class="slide__img">
                <img src="{{ asset('images/' . $val->image) }}" alt="" data-lazy="" class="full-image" />
            </div>

            <div class="slide__content slide__content__left">
                <div class="text-left slide__content--headings">
                    <h2 class="title">{{ $val->title }}</h2>
                    <p class="top-title">{{ $val->description }} </p>
                    <a class="red_btn slidebottomleft" href=""><span>Rent Now</span></a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</section>

<section class="services_sec right_btm_arrow">
    <div class="container">
        <div class="row justify-content-center">
            <div class="mb-4 col-xl-7">
                <div class="text-center heading_hp">
                    <h2>{{$home['section_1_title'] ?? ''}}</h2>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-12">

                    <div class="service_slid">
                        @if (isset($subcategories))
                        @foreach ($subcategories as $subval)
                        <div class="service_padding">

                            @if (isset($subval->category))
                            <a href="{{ url('/'.$subval->category->category_slug.'/'.$subval->sub_category_slug) }}">
                                @endif

                                <div class="img_box_card">
                                    <div class="img_servic">
                                        <span style="background:{{ $subval->color ?? '#FF4C37' }};">
                                            <img src="{{ asset('uploads/images/sub_category/' . $subval->sub_category_image) }}" alt="{{ $subval->sub_category_name }}" />
                                        </span>
                                    </div>
                                    <div class="ser_line">
                                        <h4>{{ strtoupper($subval->sub_category_name) }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>

                </div>
            </div>


        </div>
    </div>
</section>

<section class="feature_sec">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-8">
                <div class="mb-4 heading_hp">
                    <h2>{{$home['section_2_title'] ?? ''}}</h2>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <div>
                    <a href="{{URL::to('property-for-rent')}}" class="red_btn"><span>View all</span></a>
                </div>
            </div>
        </div>
        <div class="featured_slider right_middle_arrow">


            @if (count($property)>0)
            @foreach ($property as $val)
            <div class="feature_slid_padding">
                <div class="feature_box">
                    <div class="for_rent">{{ $val->product_type }}</div>
                    <a href="javascript:void(0);" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                    <div class="feature_img">
                        <a href="{{ URL::to('property-details/' . Crypt::encrypt($val->product_id)) }}"><img src="{{ asset('images/' . $val->product_thumbnail) }}" /></a>
                    </div>
                    <div class="feature_text">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="commercial_propety">
                                {{ strtoupper($val->tag_line) }}
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
                            <span>${{ $val->marked_price }}</span></span>
                        <a href="{{ URL::to('property-details/' . Crypt::encrypt($val->product_id)) }}">{{ $val->product_name }}</a>
                        <div class="d-flex"><span class="me-1"><img src="{{ asset('frontend_assets/assets/images/map.svg') }}" alt="" /></span> {{ $val->location }}
                        </div>
                        <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                    </div>
                    <div class="addtocart">
                        <a href="{{ URL::to('property-details/' . Crypt::encrypt($val->product_id)) }}"><span>Inquire
                                Now</span></a>


                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>NO RECORD FOUND</p>
            @endif
        </div>
    </div>
</section>

<section class="feature_sec gift_busket bg_services_bg">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-8">
                <div class="mb-4 heading_hp">
                    <h2>{{$home['section_3_title'] ?? ''}}</h2>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <div>
                    <a href="{{URL::to('equipment-and-machineries')}}" class="red_btn" id="viewAllBtn"><span>View all</span></a>
                </div>
            </div>
        </div>
        <div class="featured_slider_machinery right_middle_arrow">


            @if (count($machinery)>0)
            @foreach ($machinery as $val)
            <div class="feature_slid_padding">
                <div class="feature_box">
                    <div class="for_rent">{{ $val->product_type }}</div>
                    <a href="javascript:void(0)" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                    <div class="feature_img">
                        <a href="{{ URL::to('equipment-and-machineries-details/' . Crypt::encrypt($val->product_id)) }}"><img src="{{ asset('images/' . $val->product_thumbnail) }}" /></a>
                    </div>
                    <div class="feature_text">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="commercial_propety">
                                {{ strtoupper($val->tag_line) }}
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
                            <span>${{ $val->marked_price }}</span></span>
                        <a href="{{ URL::to('equipment-and-machineries-details/' . Crypt::encrypt($val->product_id)) }}">{{ $val->product_name }}</a>
                        <div class="d-flex"><span class="me-1"><img src="{{ asset('frontend_assets/assets/images/map.svg') }}" alt="" /></span> {{ $val->location }}
                        </div>
                        <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                    </div>
                    <div class="addtocart">
                        <a href="{{ URL::to('equipment-and-machineries-details/' . Crypt::encrypt($val->product_id)) }}"><span>Inquire
                                Now</span></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>NO RECORD FOUND</p>
            @endif






        </div>
    </div>
</section>

<section class="feature_sec">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-8">
                <div class="mb-4 heading_hp">
                    <h2>{{$home['section_4_title'] ?? ''}}</h2>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <div>
                    <a href="{{URL::to('vehicles')}}" class="red_btn"><span>View all</span></a>
                </div>
            </div>
        </div>
        <div class="featured_slider_cars right_middle_arrow">



            @if (count($vehicle)>0)
            @foreach ($vehicle as $val)
            <div class="feature_slid_padding">
                <div class="feature_box">
                    <div class="for_rent">{{ $val->product_type }}</div>
                    <a href="javascript:void(0);" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                    <div class="feature_img">
                        <a href="{{ URL::to('vehicle-details/' . Crypt::encrypt($val->product_id)) }}"><img src="{{ asset('images/' . $val->product_thumbnail) }}" /></a>
                    </div>
                    <div class="feature_text">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="commercial_propety">
                                {{ strtoupper($val->tag_line) }}
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
                            <span>${{ $val->marked_price }}</span></span>
                        <a href="{{ URL::to('vehicle-details/' . Crypt::encrypt($val->product_id)) }}">{{ $val->product_name }}</a>
                        <div class="d-flex"><span class="me-1"><img src="{{ asset('frontend_assets/assets/images/map.svg') }}" alt="" /></span>{{ $val->location }}
                        </div>
                        <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                    </div>
                    <div class="addtocart">
                        <a href="{{ URL::to('vehicle-details/' . Crypt::encrypt($val->product_id)) }}"><span>Inquire
                                Now</span></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>NO RECORD FOUND</p>
            @endif







        </div>
    </div>
</section>
<section class="feature_sec bg_services_bg">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-8">
                <div class="mb-4 heading_hp">
                    <h2>{{$home['section_5_title'] ?? ''}}</h2>
                </div>
            </div>
            <div class="col-md-4 text-end">
                <div>
                    <a href="{{URL::to('electronics-home-appliances')}}" class="red_btn"><span>View all</span></a>
                </div>
            </div>
        </div>
        <div class="featured_slider_truck right_middle_arrow">


            @if (count($electronics)>0)
            @foreach ($electronics as $val)
            <div class="feature_slid_padding">
                <div class="feature_box">
                    <div class="for_rent">{{ $val->product_type }}</div>
                    <a href="javascript:void(0)" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                    <div class="feature_img">
                        <a href="{{ URL::to('electronics-home-appliances-details/' . Crypt::encrypt($val->product_id)) }}"><img src="{{ asset('images/' . $val->product_thumbnail) }}" /></a>
                    </div>
                    <div class="feature_text">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="commercial_propety">
                                {{ strtoupper($val->tag_line) }}
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
                            <span>${{ $val->marked_price }}</span></span>
                        <a href="{{ URL::to('electronics-home-appliances-details/' . Crypt::encrypt($val->product_id)) }}">{{ $val->product_name }}</a>
                        <div class="d-flex"><span class="me-1"><img src="{{ asset('frontend_assets/assets/images/map.svg') }}" alt="" /></span> {{ $val->location }}
                        </div>
                        <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                    </div>
                    <div class="addtocart">
                        <a href="{{ URL::to('electronics-home-appliances-details/' . Crypt::encrypt($val->product_id)) }}"><span>Inquire
                                Now</span></a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>NO RECORD FOUND</p>
            @endif





        </div>
    </div>
</section>

<section class="testimonial_sec">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-12 col-12">
                <div class="heading_hp pe-4">
                    <h2>{{$home['section_6_title'] ?? ''}}</h2>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <div class="slideshow">
                    @if (isset($testimonial))
                    @foreach ($testimonial as $val)
                    <div class="slid_show_padding">
                        <div class="testi_box">
                            <div class="d-flex align-items-center">
                                <div class="testi_img">
                                    <span>
                                        <span class="quote_round"><i class="fa-solid fa-quote-left"></i></span>
                                        <img src="{{ asset('images/' . $val->image) }}" alt="" />
                                    </span>
                                </div>
                                <div class="testi_text">
                                    <h4>{{ $val->name }}</h4>
                                </div>
                            </div>
                            <p>{{ strip_tags($val->description) }}</p>
                            <span>{{ date('jS F, Y', strtotime($val->created_at)) }}</span>
                        </div>
                    </div>
                    @endforeach
                    @endif



                </div>
            </div>
        </div>
    </div>
</section>

<section class="before_ftr">
    <div class="container">
        <div class="back_bg_box">
            <div class="row justify-content-around">
                <div class="text-center col-xxl-3 col-md-4">
                    <span><img src="{{ asset('images/'.$home['section_7_image']) }}" alt="" /></span>
                    <h4>{{$home['section_7_title'] ?? ''}}</h4>
                    <p>{!!$home['section_7_description'] ?? ''!!}</p>
                </div>
                <div class="text-center col-xxl-3 col-md-4">
                    <span><img src="{{ asset('images/'.$home['section_8_image']) }}" alt="" /></span>
                    <h4>{{$home['section_8_title'] ?? ''}}</h4>
                    <p>{!!$home['section_8_description'] ?? ''!!}</p>
                </div>
                <div class="text-center col-xxl-3 col-md-4">
                    <span><img src="{{ asset('images/'.$home['section_9_image']) }}" alt="" /></span>
                    <h4>{{$home['section_9_title'] ?? ''}}</h4>
                    <p>{!!$home['section_9_description'] ?? ''!!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.includes.footer')
<script>
    document.getElementById('viewAllBtn').addEventListener('click', function() {
        // Redirect to another URL
        window.location.href = '/equipment-and-machineries'; // Change to your desired URL
    });

</script>



@endsection
