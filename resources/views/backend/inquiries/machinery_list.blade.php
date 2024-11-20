@php

use Illuminate\Support\Facades\Auth;
$role = Auth::user()->role;

@endphp

@extends('backend.layouts.app')
@section('PageTitle', 'Products')

@section('content')
<!--breadcrumb -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Inquiries</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                        bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Machinery Inquiry</li>
                </ol>
            </nav>
        </div>
    </div>
<!--end breadcrumb -->
</div>


<div class="card">
    <div class="card-body">
        <div class="row justify-content-between align-items-center mb-2">
            <div class="col-md-6">
                <div>
                    <h4>User's Machinery Inquiry</h4>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="row g-1 justify-content-end">
                    <div class="col-md-6 pr-0">
                        <div class="search-field prod-search">
                            <input type="text" name="search" id="search" placeholder="search..." required
                                class="form-control">
                            <a href="javascript:void(0)" class="prod-search-icon"><i class="ti ti-search"></i></a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="table-responsive">
           
            <table id="myTable" class="table table-striped table-bordered cusrsor-pointer">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>   
                        <th>Message</th>
                        <th>Property Name</th>
                        <th>Property Price</th>
                        @if($role=='admin')
                        <th>Vendor of the Property</th>
                        @endif
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody id="tableBodyContents">
                    @include('backend.inquiries.machinery_filter')
                </tbody>
            </table>

            <!-- Hidden fields for pagination -->
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />


        </div>
    </div>
</div>
@endsection
@section('plugins')
<link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('AjaxScript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@endsection

@section('js')
<script src="{{asset('backend_assets')}}/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>



<script>
    $(document).ready(function () {
            var table = $('#data_table').DataTable({
                lengthChange: true,
                buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });
</script>

<script src="sweetalert2.all.min.js"></script>

@section('js')
<script type="text/javascript">
    $(document).ready(function () {
                $('#product_image').change(function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
</script>

<script>
    $(document).ready(function () {

    function fetch_data(page, query = '') {
        $.ajax({
            url: "{{ route('admin-inquiries-machinery-filter') }}?page=" + page + "&query=" + query,
            success: function (data) {
                // Update the table body with new data
                $('#tableBodyContents').html(data.data);
                $('#pagination_links').html(data.pagination);
            }
        });
    }

    // Handle pagination click event
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        $('#hidden_page').val(page);

        // Fetch new data for the selected page
        let query = $('#search').val(); // Optional search query
        fetch_data(page, query);
    });

    // Optional: If you have a search field
    $('#search').on('keyup', function () {
        let query = $(this).val();
        let page = $('#hidden_page').val();
        fetch_data(page, query);
    });
});

</script>


@endsection
@endsection