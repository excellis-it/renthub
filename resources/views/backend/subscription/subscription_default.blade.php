@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Subscription')
@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Subscripton</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Subscripton List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div class="ms-auto mb-3">
                <a href="{{ URL::to('admin/subscription/add') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                    <i class="bx bxs-plus-square"></i> Add New Subscription
                </a>
            </div>

            <table id="data_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Days</th>
                        <th>Price</th>
                        <th>Number Of Products</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $val)
                    <tr>
                        <td>{{ $val->title }}</td>
                        <td>{{ $val->subtitle }}</td>
                        <td>{{ $val->days }}</td>
                        <td>{{ $val->price }}</td>
                        <td>{{ $val->no_of_product }}</td>
                        <td>
                            <form method="POST" action="" class="activate_form">
                                @csrf
                                <input name="product_id" value="{{ $val->id }}" hidden/>
                                <input name="current_status" value="{{ $val->status }}" hidden/>

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
                            <div class="d-flex order-actions">
                             @if(Auth::user()->role == "admin")
                                <!-- Edit Button and Modal -->
                                <a href="{{url('admin/subscription/edit/'.$val->id)}}" class="ms-4" data-bs-toggle="modal"
                                    data-bs-target="#editPageModal-{{ $val->id }}">
                                    <i class='bx bxs-edit'></i>
                                </a>

                                <div class="modal fade" id="editPageModal-{{ $val->id }}"
                                    tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Subscription</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="page_form" action="{{url('admin/subscription/update')}}" method="POST">
                                                    @csrf
                                                    <input name="id" value="{{ $val->id }}" hidden />
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Title</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="title" type="text" class="form-control"
                                                                value="{{ $val->title }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Sub-Title</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="subtitle" type="text" class="form-control"
                                                                value="{{ $val->subtitle }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Description</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="description" type="text"
                                                                class="form-control @error('description') is-invalid @enderror"
                                                                value="{{ $val->description }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Days</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="days" type="number" class="form-control"
                                                                value="{{ $val->days }}" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Price</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="price" type="number" class="form-control"
                                                                value="{{ $val->price }}" />
                                                        </div>
                                                    </div>

                                                     <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Number of Product</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="no_of_product" type="number" class="form-control"
                                                                value="{{ $val->no_of_product }}" />
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
                                                                           @if($val->status == 1) checked @endif>
                                                                    <label class="form-check-label" for="status-active">
                                                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Active
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="status-inactive" value="0"
                                                                           @if($val->status == 0) checked @endif>
                                                                    <label class="form-check-label" for="status-inactive">
                                                                        <i class="fa fa-times-circle" aria-hidden="true"></i> Inactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="submit" class="btn btn-primary px-4"
                                                                value="Save Changes" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Button and Modal -->
                                <a href="{{url('admin/subscription/remove/'.$val->id)}}" class="ms-3" data-bs-toggle="modal"
                                    data-bs-target="#deletePageModal-{{ $val->id }}">
                                    <i class='bx bxs-trash '></i>
                                </a>

                                <div class="modal fade" id="deletePageModal-{{ $val->id }}"
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
                                                    onclick="window.location.replace('{{URL::to('admin/subscription/remove/'. $val->id)}}');"
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('plugins')
<link href="{{ asset('backend_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
@section('AjaxScript')
        <script src="{{ asset('backend_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@endsection