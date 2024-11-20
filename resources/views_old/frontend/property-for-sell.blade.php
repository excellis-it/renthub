@extends('frontend.includes.master')
@section('content')
    @include('frontend.includes.header')


    <div class="filter_map">
        <div class="m-0 row align-items-center gx-2">
            <div class="col-xxl-2 col-xl-3">
                <div class="filter_search">

                    <input type="text" id="search" class="form-control" placeholder="Search for property sell" />
                    <a href="javascript:void(0);" onclick="search_data()"><i class="fa-solid fa-magnifying-glass"></i></a>

                </div>
            </div>
            <div class="col-xxl-9 col-xl-9">
                <div class="save_search">

                    <div class="funel_box me-2">
                        <div class="btn-group">
                            <button type="button" class="btn btn_filter dropdown-toggle btn_all_open"
                                onclick="openModal('box2')">Price</button>
                            <div class="box_slae openbox" id="box2">
                                <div class="form__group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <select class="form-select" aria-label="Default select example" id="min"
                                                onchange="search_data()">
                                                <option selected value="">Minimum</option>
                                                <option value="10">$10</option>
                                                <option value="100">$100</option>
                                                <option value="200">$200</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-select" aria-label="Default select example" id="max"
                                                onchange="search_data()">
                                                <option selected value="">Maximum</option>
                                                <option value="90">$90</option>
                                                <option value="600">$600</option>
                                                <option value="1400">$1400</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  <div class="funel_box me-2">
              <div class="btn-group">
                <button type="button" class="btn btn_filter dropdown-toggle btn_all_open" onclick="openModal('box3')">5+ bd, 0+ ba</button>
                <div class="box_slae openbox" id="box3">
                  <h4>Number of Bedrooms</h4>
                  <div class="form__group">
                    <div class="form__radio-group">
                      <input id="forsale" type="radio" class="form__radio-input" name="size" />
                      <label for="forsale" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        <span class="form__radio-label-text">For Sale<span></label>
                    </div>
                    <div class="form__radio-group">
                      <input id="forrent" type="radio" class="form__radio-input" name="size" />
                      <label for="forrent" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        For Rent</label>
                    </div>
                    <div class="form__radio-group">
                      <input id="sold" type="radio" class="form__radio-input" name="size" />
                      <label for="sold" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        Sold</label>
                    </div>
                  </div>
                  <a class="filter_aplly" href="">Apply</a>
                </div>
              </div>
            </div>  --}}
                    {{--  <div class="funel_box me-2">
              <div class="btn-group">
                <button type="button" class="btn btn_filter dropdown-toggle btn_all_open" onclick="openModal('box4')"> Type of Property</button>
                <div class="box_slae openbox" id="box4">
                  <div class="form__group">
                    <div class="form__radio-group">
                      <input id="forsale" type="radio" class="form__radio-input" name="size" />
                      <label for="forsale" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        <span class="form__radio-label-text">For Sale<span></label>
                    </div>
                    <div class="form__radio-group">
                      <input id="forrent" type="radio" class="form__radio-input" name="size" />
                      <label for="forrent" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        For Rent</label>
                    </div>
                    <div class="form__radio-group">
                      <input id="sold" type="radio" class="form__radio-input" name="size" />
                      <label for="sold" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        Sold</label>
                    </div>
                  </div>
                  <a class="filter_aplly" href="">Apply</a>
                </div>
              </div>
            </div>  --}}
                </div>
            </div>
        </div>
    </div>
    <div class="filter_view">
        <div class="m-0 row">
            <div class="p-0 col-lg-6">
                <div class="ifreame_map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d19780265.354188915!2d-95.89479048693913!3d43.97096007946946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1715935127794!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="p-0 col-lg-6">
                <div class="filter_view_room">
                    <div class="">Rental Listings</div>
                    @if (isset($total))
                        <div class="d-flex justify-content-between">
                            <div class="" id="resultCount">{{ $total }} results</div>
                            <div class="verified-div">
                                <div class="dropdown">
                                    Sort:
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Verified Source
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Verified Source</a></li>
                                        <li><a class="dropdown-item" href="#">Payment (High to Low)</a></li>
                                        <li><a class="dropdown-item" href="#">Payment (Low to High)</a></li>
                                        <li><a class="dropdown-item" href="#">Payment (Low to High)</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row" id="propertyList">
                        @include('frontend.property-for-sell-search')




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

        function search_data() {
            var search = $('#search').val();
            var size = $('input[name="size"]:checked').val();
            var min = $('#min').val();
            var max = $('#max').val();

            $.ajax({
                url: "{{ URL::to('/property-for-sell-search') }}",
                type: 'GET',
                dataType: 'text',
                data: {
                    search: search,
                    size: size,
                    min: min,
                    max: max
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    // console.log(res.result);
                    var res = JSON.parse(res);
                    $('#propertyList').html(res.result);
                    $('#resultCount').text(`Results found: ${res.count}`);
                }

            });
        }
    </script>
@endsection
