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
                    <h1>User Electronic Inquiries </h1>
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
                    <h3>Electronic Inquiries </h3>

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
                                        <th scope="col">Model</th>
                                        <th scope="col">Price($)</th>
                                        <th scope="col">Listing by</th>
                                        <th scope="col">Manufacture Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tableBodyContents">
                                    @include('frontend.dashboard.electronics-enquiry-filter')
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
            url: "{{ route('user-enquiry-electronics-filter') }}?page=" + page + "&query=" + query,
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