@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')

<div class="filter_view">
    <div class="row m-0">
        <div class="col-lg-12 p-0">
            <div class="filter_view_room">
                <div class="row">
                    @if (isset($results))
                        @foreach ($results as $val)
                            <div class="mb-3 col-lg-3">
                                <div class="feature_box">
                                    <div class="for_rent">{{ $val->product_type }}</div>
                                    <a href="" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                                    <div class="feature_text">
                                        <div class="d-block d-md-flex justify-content-between">
                                            <div class="commercial_property">{{ $val->tag_line }}</div>
                                            @if (isset($data))
                                                <div class="star-div mb-div">
                                                    <a href="{{ URL::to('/user/review/' .  Crypt::encrypt($data->product_id)) }}">
                                                        <ul class="star_ul">
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                            <li><span>(5)</span></li>
                                                        </ul>
                                                        Review
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <span class="price_text">${{ $val->product_price }} <span>${{ $val->marked_price }}</span></span>
                                        <a href="{{ URL::to($category . '-details/' . Crypt::encrypt($val->product_id)) }}">{{ $val->product_name }}</a>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center pe-2">
                                                <span class="me-1"><img src="{{ asset('frontend_assets/assets/images/mfg_date.svg') }}" alt="" /></span>
                                                MFG Date: {{ date('jS F, Y', strtotime($val->manufacture_date)) }}
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <span class="me-1"><img src="{{ asset('frontend_assets/assets/images/map.svg') }}" alt="" /></span>
                                            {{ $val->location }}
                                        </div>
                                        <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                                    </div>
                                    <div class="addtocart">
                                        {{-- Add cart or inquiry functionality here if needed --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No products found for your search criteria.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.includes.footer')

<script>
    function openModal(getVal) {
        if ($("#" + getVal).hasClass('active')) {
            $("#" + getVal).removeClass('active');
            $("#" + getVal).hide();
        } else {
            $(".openbox").removeClass('active');
            $(".openbox").hide();
            $("#" + getVal).show();
            $("#" + getVal).addClass('active');
        }
    }
</script>

@endsection
