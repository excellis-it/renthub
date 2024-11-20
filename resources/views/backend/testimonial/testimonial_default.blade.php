@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Testimonials')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Testimonials</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Testimonials List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="ms-auto" style="margin-bottom: 20px">
                    <a href="{{ URL::to('admin/testimonial/add') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i>Add New Testimonials</a>
                </div>

                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $testimonials)
                            <tr>
                                <td>{{ $testimonials->name }}</td>
                                <td>
                                    <img src="{{ asset('images/' . $testimonials->image) }}" alt="Image" style="width: 100px; height: auto;">
                                </td>
                                <td>{{ $testimonials->description }}</td>

                                <td>
                                    <form method="POST" action="" class="activate_form">
                                        @csrf
                                        <input name="product_id" value="{{ $testimonials->id }}" hidden/>
                                        <input name="current_status" value="{{ $testimonials->status }}" hidden/>

                                        <div class="form-check form-switch">
                                           @if ($testimonials->status == 1)
                                                <span style="color: green;font-weight: bold;">Active</span>
                                            @else
                                                <span style="color: red;font-weight: bold;">In-Active</span>
                                            @endif
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                     @if(Auth::user()->role == "admin")
                                        <a href="{{url('admin/testimonial/edit/'.$testimonials->id)}}" class="ms-4" data-bs-toggle="modal"
                                            data-bs-target="#exampleFullScreenModal-{{ $testimonials->id }}">
                                            <i class='bx bxs-edit'></i>


                                        </a>
                                        <div class="modal fade" id="exampleFullScreenModal-{{ $testimonials->id }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Testimonials</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">

                                                            <div class="card-body">
                                                                <form id="testimonial_form" action="{{url('admin/testimonial/update')}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input name="id" value="{{ $testimonials->id }}" hidden />
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Name</h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <input name="name" type="text"
                                                                                class="form-control"
                                                                                value="{{ $testimonials->name }}" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Image</h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <input name="image" id="image"
                                                                                class="form-control" type="file">
                                                                            <div>
                                                                                <img class="card-img-top"
                                                                                    src="{{ asset('images/' . $testimonials->image) }}"
                                                                                    style="max-width: 250px; margin-top: 20px"
                                                                                    id="show_image">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Description</h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <input name="description" type="text"
                                                                                class="form-control @error('description') is-invalid @enderror"
                                                                                value="{{ $testimonials->description }}" />

                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Status</h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="form-check me-4">
                                                                                    <input class="form-check-input" type="radio" name="status" id="status-active" value="1"
                                                                                           @if($testimonials->status == 1) checked @endif>
                                                                                    <label class="form-check-label" for="status-active">
                                                                                         Active
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="radio" name="status" id="status-inactive" value="0"
                                                                                           @if($testimonials->status == 0) checked @endif>
                                                                                    <label class="form-check-label" for="status-inactive">
                                                                                         Inactive
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-sm-3"></div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <input type="submit"
                                                                                class="btn btn-primary px-4"
                                                                                value="Save Changes" />
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                                    <a href="{{url('admin/testimonial/remove/'.$testimonials->id)}}" class="ms-3" data-bs-toggle="modal"
                                                        data-bs-target="#exampleDangerModal-{{ $testimonials->id }}">
                                                        <i class='bx bxs-trash'></i>
                                                    </a>
                                            </div>

                                        <div class="modal fade" id="exampleDangerModal-{{ $testimonials->id }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white">Are you sure?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button
                                                            onclick="window.location.replace('{{URL::to('admin/testimonial/remove/'. $testimonials->id)}}');"
                                                            class="btn btn-dark">Confirm</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="8">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>{!! $data->links('vendor.pagination.bootstrap-4') !!}</div>
                                    <div>(Showing {{ $data->firstItem() }} – {{ $data->lastItem() }} of {{ $data->total() }} results)</div>
                                </div>
                            </td>
                        </tr>


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


                                setTimeout(function() {
                                    location.reload();
                                }, 2000);


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
