@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initializeMap"
        type="text/javascript"></script>

    {{-- <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places"></script> --}}

    <script type="text/javascript">
        let map, geocoder;

        function initializeMap() {
            const mapOptions = {
                center: {
                    lat: 51.508742,
                    lng: -0.120850
                },
                zoom: 5,
            };
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
            //console.log(map);
            geocoder = new google.maps.Geocoder();
            // console.log(geocoder);

        }

        function searchLocation() {
            const input = document.getElementById("search-input").value.trim();
            console.log(input);

            if (!input) {
                alert("Please enter a location.");
                return;
            }

            geocoder.geocode({
                address: input
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    const location = results[0].geometry.location;

                    map.setCenter(location);
                    map.setZoom(10);

                    new google.maps.Marker({
                        position: location,
                        map: map,
                        title: results[0].formatted_address,
                    });
                } else {
                    alert("Could not find the location. Please try again.");
                    console.error("Geocode error: ", status);
                }
            });
        }
    </script>



    <script>
        /*$(document).ready(function () {
        $('#search_text').on('keydown', function () {
            var search = $(this).val(); // Get the value of the input field
            var route = $(this).data('route'); // Route is stored in the input's data-route attribute

            if (search.length > 2) { // Trigger search only if input has more than 2 characters
                $.ajax({
                    url: route,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content') // Use meta tag for CSRF
                    },
                    data: { search: search },
                    success: function (response) {
                        // Assuming the response is already JSON
                        $('#vehicleList').html(response.vehicleList || '');
                        $('#propertyList').html(response.propertyList || '');
                        $('#electronicList').html(response.electronicList || '');
                        $('#machineList').html(response.machineList || '');
                        $('#resultCount').text(`Results found: ${response.count || 0}`);
                    },
                    error: function (xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            }
        });
    });*/

      /*  function product_search() {
                var search = $('#search_text').val();
                var url=url;
                console.log(url);
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'text',
                    data: {
                        search: search,
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(res) {

                        var res = JSON.parse(res);
                       console.log(res);
                        console.log(res.result);
                         $('#vehicleList').html(res.result);
                         $('#propertyList').html(res.result);
                         $('#electronicList').html(res.result);
                         $('#machineList').html(res.result);
                        $('#resultCount').text(`Results found: ${res.count}`);
                    }
                });
            }
*/


     /*function determineURL(search) {
        const urlMap = {
            'frontend.property-for-rent': "{{ URL::to('/property-for-rent') }}",
            'frontend.property-for-sell': "{{ URL::to('/property-for-sell') }}",
            'frontend.equipment-and-machineries': "{{ URL::to('/equipment-and-machineries') }}",
            'frontend.electronics-home-appliances': "{{ URL::to('/electronics-home-appliances') }}",
            'frontend.vehicle': "{{ URL::to('/vehicle') }}"
        };

        for (const key in urlMap) {
            if (search.includes(key)) {
                return urlMap[key];
            }
        }
        return "{{ URL::to('/') }}"; // Default or fallback URL
    }*/

    </script>
@endpush

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
                                        {{-- <div class="dropdown">
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
                                        </div> --}}
                                        {{-- <div class="dropdown">
                                            <input type="text" id="address-input" class="form-control" placeholder="Enter a location" onclick="add_search()">
                                            <ul class="dropdown-menu" id="suggestions"></ul>
                                        </div> --}}
                                        <div class="dropdown">
                                            <a class="btn new_york_city dropdown-toggle" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ asset('frontend_assets/assets/images/map.svg') }}"
                                                    alt="" />
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><input id="search-input" class="form-control" type="text"
                                                        placeholder="Search location..." onkeyup="searchLocation()" />
                                                </li>
                                                <li>
                                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="d-flex align-items-center">
                                        <form action="{{URL::to('search')}}" method="GET" role="search">

                                            <input type="search" class="form-control" id="search_text"
                                                name="search_product" value="{{Request::get('search_product')}}" placeholder="Find property, cars, and more...">
                                            <button type="submit" class="btn btn_magnifing">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </form>
                                    </div>


                                </div>
                            </form>
                        </div>
                        <div class="right_login">
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="login d-flex align-items-center justify-content-between">
                                    <span><a href="tel:+12013241353" class="me-2"><i class="fa-solid fa-phone"></i> +1
                                            (201)
                                            324-1353</a></span>
                                    <span><a href="mailto:info@rentishhub.com" class="me-2"><i
                                                class="fa-solid fa-envelope"></i>
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
                                @if (Auth::check())
                                    @if (Auth::user()->role == 'vendor')
                                        <li><a href="{{ URL::to('/vendor/profile') }}">Vendor Dashboard</a></li>
                                    @else
                                        <li><a href="{{ URL::to('/user/profile') }}">Dashboard</a></li>
                                    @endif
                                @endif


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
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
        /* function search_data() {
                var search = $('#search').val();

                console.log("Search Value:", search);
            }*/


        // Determine which URL to use based on conditions (example conditions provided)
        // var url = determineURL(search);

        /*$.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: {
                search: search,
            },
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(res) {
                var res = JSON.parse(res);
                console.log(res);
                $('#propertyList').html(res.result);
                $('#resultCount').text(`Results found: ${res.count}`);
            }
        });*/


        // Example function to determine URL based on some conditions
        /*function determineURL(search) {
            if (search) {
                return "{{ URL::to('/property-for-rent-search') }}";
            } else if (search) {
                return "{{ URL::to('/property-for-sell-search') }}";
            } else if (search) {
                return "{{ URL::to('/equipment-and-machineries-search') }}";
            } else if (search) {
                return "{{ URL::to('/electronics-home-appliances-search') }}";
            } else {
                return "{{ URL::to('/vehicle-search') }}";
            }
        }*/
    </script>
@endsection
