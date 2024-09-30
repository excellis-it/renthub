<div class="float_filter">
    <ul>
        <li><a href="" class=""><i class="fa-solid fa-house"></i></a></li>
        <li><a href="" class=""><i class="fa-solid fa-cart-shopping"></i></a></li>
        <li><a href="" class="add_cart_active"><i class="fa-solid fa-heart"></i></a></li>
        <li><a href="" class="add_cart_active"><i class="fa-solid fa-star"></i></a></li>
        <li><a href="" class="add_cart_active"><i class="fa-solid fa-magnifying-glass"></i></a></li>
    </ul>
</div>


<div class="main_menu_hdr">
    <div class="container-fluid">
        <div class="main_menu">
            <div class="navigation navbar">
                <div class="left_top">
                    <div class="logo">
                        <a href="{{ URL::to('/') }}" class="">
                            <img src="{{ asset('frontend_assets/assets/images/logo.png') }}" alt="" />
                        </a>

                    </div>
                </div>
                <div class="right_hdr">
                    <div class="right_top">
                        <div class="search_top">
                            <form>
                                <div class="d-block d-md-flex align-items-center">
                                    <div class="">
                                        <div class="dropdown">
                                            <a class="btn new_york_city dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('frontend_assets/assets/images/map.svg') }}"
                                                    alt="" /> New York City, USA
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="text" class="form-control" id=""
                                            placeholder="Find property, Cars and more...">
                                        <button type="submit" class="btn btn_magnifing"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="right_login">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="login d-flex align-items-center justify-content-between">
                                    <span><a href="" class="me-2"><i class="fa-solid fa-phone"></i> +1 (201)
                                            324-1353</a></span>
                                    <span><a href="" class="me-2"><i class="fa-solid fa-envelope"></i>
                                            info@rentishhub.com</a></span>
                                </div>
                                <div class="ms-2">
                                    @if (Auth::check())
                                        <form action="{{ URL::to('/logout') }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link">Logout</button>
                                        </form>
                                    @else
                                        <a href="{{ URL::to('/login') }}" class="btn btn-link">Sign In</a>
                                        / <a href="{{ URL::to('/signup') }}" class="btn btn-link">Sign Up</a>
                                    @endif
                                </div>



                                <div class="icon_c ms-2">
                                    <a href="{{ URL::to('/signup') }}" class="add_cart_active"><i
                                            class="fa-solid fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right_btm">
                        <div id="cssmenu">
                            <ul>
                                <li class="active">
                                    <a href="{{ URL::to('/all-categories') }}">ALL CATEGORIES</a>
                                    @php
                                        $category = App\Models\CategoryModel::get();
                                    @endphp


                                    <ul>

                                        @if ($category)
                                            @foreach ($category as $val)
                                                <li><a
                                                        href="{{ url('/' . $val->category_slug) }}">{{ $val->category_name }}</a>
                                                    @php
                                                        $subcategory = App\Models\SubCategoryModel::where(
                                                            'category_id',
                                                            $val->category_id,
                                                        )->get();

                                                    @endphp
                                                    <ul>
                                                        @if ($subcategory)
                                                            @foreach ($subcategory as $subval)
                                                                <li><a
                                                                        href="{{ url('/' . $val->category_slug . '/' . $subval->sub_category_slug) }}">{{ $subval->sub_category_name }}</a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('property-for-rent') }}">Property for Rent</a></li>
                                <li><a href="{{ URL::to('property-for-sell') }}">Property for Sell</a></li>
                                <li><a href="{{ URL::to('equipment-and-machineries') }}">Equipments & Machinery</a>
                                </li>
                                <li><a href="{{ URL::to('vehicles') }}">Vehicle</a></li>
                                <li><a href="{{ URL::to('electronics-home-appliances') }}">Electronics & Home
                                        Appliances</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
