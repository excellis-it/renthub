@if (isset($property))
    @foreach ($property as $val)
        <div class="mb-3 col-lg-6">
            <div class="feature_box">
                <div class="for_rent">{{ $val->product_type }}</div>
                <a href="" class="wishlist_rent"><i class="fa-solid fa-heart"></i></a>
                <div class="feature_img">
                    <a href="{{ URL::to('property-details/' . Crypt::encrypt($val->product_id)) }}"><img
                            src="{{ asset('images/' . $val->product_thumbnail) }}" /></a>
                </div>
                <div class="feature_text">
                    <div class="d-block d-md-flex justify-content-between">
                        <div class="commercial_propety">
                            {{ $val->tag_line }}
                        </div>
                        @if (isset($data))
                            <div class="star-div mb-div">
                                <a href="{{ URL::to('/user/review/' .  Crypt::encrypt($data->product_id)) }}">
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
                    <a
                        href="{{ URL::to('property-details/' . Crypt::encrypt($val->product_id)) }}">{{ strip_tags($val->product_name) }}</a>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center pe-2"><span class="me-1"><img
                                    src="{{ asset('frontend_assets/assets/images/bed.svg') }}" alt="" /></span>
                            {{ $val->property_bed }}</div>
                        <div class="d-flex align-items-center pe-2"><span class="me-1"><img
                                    src="{{ asset('frontend_assets/assets/images/bath.svg') }}"
                                    alt="" /></span> {{ $val->property_bathroom }}</div>
                        <div class="d-flex align-items-center pe-2"><span class="me-1"><img
                                    src="{{ asset('frontend_assets/assets/images/sqft.svg') }}"
                                    alt="" /></span> {{ $val->property_size }}</div>
                        {{-- <div class="d-flex align-items-center pe-2"><span class="me-1"><img src="assets/images/pet.svg" alt=""/></span> Pet: Allowed</div> --}}
                    </div>
                    <div class="d-flex"><span class="me-1"><img
                                src="{{ asset('frontend_assets/assets/images/map.svg') }}"
                                alt="" /></span>{{ $val->location }}</div>
                    <div class="agent_text">{{ $val->vendor_type }}</div>
                </div>
                <div class="addtocart">
                    @if(Auth::user())
                        <a href="{{ url('/property-details/' . Crypt::encrypt($val->product_id)) }}"><span>Inquire Now</span></a>
                    @else
                    <a href="{{ url('login/') }}"><span>Inquire Now</span></a>
                    @endif

                </div>
            </div>
        </div>
    @endforeach
@endif
