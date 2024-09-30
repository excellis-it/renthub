@if (isset($vehicle))
    @foreach ($vehicle as $val)
        <div class="mb-3 col-lg-3">

            <div class="feature_box">
                <div class="for_rent">{{ strtoupper($val->product_type) }}</div>
                <a href="javascript:void(0);" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                <div class="feature_img">
                    <a href="{{ url('/vehicle-details/' . $val->product_id) }}"><img
                            src="{{ asset('public/images/' . $val->product_thumbnail) }}" /></a>
                </div>
                <div class="feature_text">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="commercial_propety">
                            {{ $val->tag_line }}
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
                    <span class="price_text">${{ $val->product_price }} <span>${{ $val->marked_price }}</span></span>
                    <a href="{{ url('/vehicle-details/' . $val->product_id) }}">{{ strip_tags($val->product_name) }}</a>
                    <div class="d-flex align-items-center">
                        {{-- <div class="d-flex align-items-center pe-2"><span class="me-1"><img
            src="assets/images/mfg_date.svg" alt="" /></span> MFG Date: {{  date('jS F, Y',strtotime($val->created_at))  }}</div> --}}
                        <div class="d-flex align-items-center pe-2"><span class="me-1"><img
                                    src="{{ asset('frontend_assets/assets/images/kmpl.svg') }}"
                                    alt="" /></span>{{ $val->vehicle_km }} kmpl</div>
                    </div>
                    <div class="d-flex"><span class="me-1"><img src="asset('public/images/' . $val->product_thumbnail)"
                                alt="" /></span>{{ $val->location }}</div>
                    <div class="agent_text">{{ strtoupper($val->vendor_type) }}</div>
                </div>
                <div class="addtocart">
                    <a href="{{ url('/vehicle-details/' . $val->product_id) }}"><span>Inquire Now</span></a>
                </div>
            </div>

        </div>
    @endforeach
@endif
