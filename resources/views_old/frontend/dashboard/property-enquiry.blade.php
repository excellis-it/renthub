@extends('frontend.includes.master')

@section('content')
@include('frontend.includes.header')

<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">



<section class="inner_banner_sec" style="
    background-image: url({{ asset('frontend_assets/assets/images/inr-bnr.jpg') }});
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
  ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-banner-text">
                    <h1>User Property Inquiries</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="dash-board_wrapper dashboard_sec">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    @include('frontend.dashboard.sidebar')  
                </div>
                <div class="col-lg-9">
                    <h3>Property Inquiries </h3>
                    {{-- <div class="row g-3 mb-5">
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Properties</span>
                                            <span class="h3 font-bold mb-0">00</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-main text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-home"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>0%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Car</span>
                                            <span class="h3 font-bold mb-0">00</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-car"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>0%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span
                                                class="h6 font-semibold text-muted text-sm d-block mb-2">Equipments</span>
                                            <span class="h3 font-bold mb-0">00</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                            <i class="bi bi-arrow-down me-1"></i>0%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last month</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                
                    <div class="card shadow border-0 mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">List</h5>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Property Type</th>
                                        <th scope="col">Price($)</th>
                                        <th scope="col">Listing by</th>
                                        <th scope="col">Sq Ft</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tableBodyContents">
                                    @include('frontend.dashboard.property-enquiry-filter')
                                </tbody>
                            </table>

                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</section>


@include('frontend.includes.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
    $(document).ready(function () {

    function fetch_data(page, query = '') {
        $.ajax({
            url: "{{ route('user-enquiry-product-filter') }}?page=" + page + "&query=" + query,
            success: function (data) {
                $('#tableBodyContents').html(data.data);
                $('#pagination_links').html(data.pagination);
            }
        });
    }
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);
        let query = $('#search').val(); 
        fetch_data(page, query);
    });

    $('#search').on('keyup', function () {
        let query = $(this).val();
        let page = $('#hidden_page').val();
        fetch_data(page, query);
    });
});

</script>

<script>
    // enquiry delete
    $(document).on('click', '.delete_icon', function (e) {
        e.preventDefault();

        var id = $(this).data('id');
        var url = $(this).data('url');
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this enquiry!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function (response) {
                        if (response.status == true) {
                            toastr.success(response.msg);
                            location.reload();
                        }else{
                            toastr.error(response.msg);
                        }
                    }
                });
            }
        })
    });
</script>
@endsection