@extends('frontend.includes.master')
@section('content')
@include('frontend.includes.header')


    <div class="filter_map">
      <div class="row align-items-center m-0 gx-2">
        <div class="col-xxl-2 col-xl-3">
          <div class="filter_search">
            
                <input type="text" id="search" class="form-control"  placeholder="Search for electronics" />
                <a href="javascript:void(0);" onclick="search_data()"><i class="fa-solid fa-magnifying-glass"></i></a>
        
          </div>
        </div>
        <div class="col-xxl-9 col-xl-9">
          <div class="save_search">
            <div class="funel_box me-2">
              <div class="btn-group">
                <button type="button" class="btn btn_filter dropdown-toggle btn_all_open" onclick="openModal('box1')">New / Used </button>
                <div class="box_slae openbox" id="box1">
                  <div class="form__group">
                    <div class="form__radio-group">
                      <input id="forsale" type="radio" class="form__radio-input" name="size" value="new"/>
                      <label for="forsale" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        <span class="form__radio-label-text">New<span></label>
                    </div>                  
                    <div class="form__radio-group">
                      <input id="forrent" type="radio" class="form__radio-input" name="size" value="used"/>
                      <label for="forrent" class="form__radio-label">
                        <span class="form__radio-button"></span>
                        Used</label>
                    </div>
                  </div>  
                  <a class="filter_aplly" href="javascript:void(0);" onclick="search_data()">Apply</a>
                </div>
              </div>
            </div>
            <div class="funel_box me-2">
              <div class="btn-group">
                <button type="button" class="btn btn_filter dropdown-toggle btn_all_open" onclick="openModal('box2')">Price</button>
                <div class="box_slae openbox" id="box2">
                  <div class="form__group">
                   <div class="row">
                    <div class="col-lg-6">
                      <select class="form-select" aria-label="Default select example" id="min" onchange="search_data()">
                        <option selected value="">Minimum</option>
                        <option value="10">$10</option>
                        <option value="100">$100</option>
                        <option value="200">$200</option>
                      </select>
                    </div>
                    <div class="col-lg-6">
                      <select class="form-select" aria-label="Default select example" id="max" onchange="search_data()">
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
            
           
          </div>
        </div>
      </div>
    </div>
    <div class="filter_view">
      <div class="row m-0">
        <div class="col-lg-12 p-0">
          <div class="filter_view_room">
            <div class="">Rental Listings</div>
            @if(isset($total))
            <div class="d-flex justify-content-between">
              <div class="" id="resultCount">{{$total}} results</div>
              <div class="verified-div">
                <div class="dropdown">
                  Sort:
                  <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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


            <div class="row" id="electronicList">
                @include('frontend.electronics-home-appliances-search')
              
          
            </div>
          </div>
        </div>
      </div>
    </div>


    @include('frontend.includes.footer')

    <script>
        function openModal(getVal) {
            if($("#"+getVal).hasClass('active')) {
                $("#"+getVal).removeClass('active');
                $("#"+getVal).hide();
            } else {
                $(".openbox").removeClass('active');
                $(".openbox").hide();
                $("#"+getVal).show();
                $("#"+getVal).addClass('active');
            }
        }




         function search_data() {
            var search = $('#search').val();
           // alert(search);
            var size = $('input[name="size"]:checked').val();
            var min = $('#min').val(); 
            var max = $('#max').val(); 

            $.ajax({
                url: "{{URL::to('/electronics-home-appliances-search')}}",
                type: 'GET',
                dataType: 'text',
                data: {
                    search: search,
                    size: size,
                    min: min,
                    max: max
                },
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(res) {
                        var res = JSON.parse(res);
                        $('#electronicList').html(res.result);
                        $('#resultCount').text(`Results found: ${res.count}`);
                      }
                
            });
        }
  
    </script>  
    
    @endsection
    
    

    

