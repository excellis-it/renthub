@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
    use App\Helpers\Product;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Basic User')
@section('content')
    <!--breadcrumb -->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Basic User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route($role . '-profile') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Basic User</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">


                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>username</th>
                            <th>Number Of inquiries</th>
                            <th>Status</th>
                            <th>View Details</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $index => $val)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ strtoupper($val->first_name) }} {{ strtoupper($val->last_name) }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ strtoupper($val->username) }}</td>
                                <td>
                                    {{ Product::userTotalEnquiry($val->id) }}

                                </td>
                                <td>
                                    <form method="POST" action="" class="activate_form">
                                        @csrf
                                        <input name="product_id" value="{{ $val->id }}" hidden />
                                        <input name="current_status" value="{{ $val->status }}" hidden />

                                        <div class="form-check form-switch">
                                            @if ($val->status == 1)
                                            <span style="color: green;font-weight: bold;">Active</span>
                                            @else
                                            <span style="color: red;font-weight: bold;">In-Active</span>
                                            @endif
                                        </div>
                                    </form>
                                </td>

                                <td>

                                    <a 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleVerticallycenteredModal-{{ $val->id }}">
                                        <i class='fa fa-eye' style="color:#44c6a9"></i>
                                    </a>
                        
                                    <a href="{{ route('admin-basic-user', $val->id) }}" class="ms-3" >
                                        <i class='fa fa-pen'></i>
                                    </a>



                                    {{-- <button type="button" class="px-4 btn btn-primary btn-sm radius-30"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleVerticallycenteredModal-{{ $val->id }}">View
                                        Details
                                    </button> --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleVerticallycenteredModal-{{ $val->id }}"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Basic User Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{--  <img src="{{url('uploads/images/category/' . $val->category_image)}}"
                                                         class="card-img-top" style="max-width: 300px; margin-left:
                                                             10px">  --}}

                                                    <div class="card-body">

                                                        <table id="data_table" class="table table-striped table-bordered">

                                                            <tr>
                                                                <th>Name</th>
                                                                <td>{{ strtoupper($val->first_name) }}
                                                                    {{ strtoupper($val->last_name) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Email</th>
                                                                <td>{{ $val->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Username</th>
                                                                <td>{{ strtoupper($val->username) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone</th>
                                                                <td>{{ $val->phone_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Country</th>
                                                                <td>{{ $val->country }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>State</th>
                                                                <td>{{ $val->state }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>City</th>
                                                                <td>{{ $val->city }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Zip Code</th>
                                                                <td>{{ $val->zip_code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Created At</th>
                                                                <td>{{ date('jS F, Y', strtotime($val->created_at)) }}</td>
                                                            </tr>
                                                        </table>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <link href="{{ asset('backend_assets') }}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section('AjaxScript')
    <script src="{{ asset('backend_assets') }}/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend_assets') }}/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#data_table').DataTable({
                lengthChange: true,
                buttons: ['excel', 'pdf', 'print']
            });
            table.buttons().container()
                .appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/custom.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#testimonial_form').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var data = new FormData(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(resp) {
                        toastr.success('Testimonial Updated successfully.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000',
                        });

                    }
                });
            });
        });
    </script>

    <!-- Image Preview Script -->
    <script type="text/javascript">
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endsection
