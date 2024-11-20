@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Pages')
@section('content')

<!-- Breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Pages</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Pages List</li>
            </ol>
        </nav>
    </div>
</div>
<!-- End Breadcrumb -->

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div class="ms-auto mb-3">
                @if(Auth::user()->role == "admin")
                    <a href="{{ URL::to('admin/pages/add') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                        <i class="bx bxs-plus-square"></i> Add New Page
                    </a>
                @endif
            </div>

            <table id="data_table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key=>$page)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $page->title }}</td>
                        <td>{!! \Illuminate\Support\Str::limit($page->description, 50) !!}</td>

                        <td>
                            <form method="POST" action="" class="activate_form">
                                @csrf
                                <input name="product_id" value="{{ $page->id }}" hidden/>
                                <input name="current_status" value="{{ $page->status }}" hidden/>

                                <div class="form-check form-switch">
                                            @if ($page->status == 1)
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
                                    <a href="{{url('admin/pages/edit/'.$page->id)}}" class="ms-4" data-bs-toggle="modal"
                                        data-bs-target="#editPageModal-{{ $page->id }}">
                                        <i class='bx bxs-edit'></i>
                                    </a>

                                    <div class="modal fade" id="editPageModal-{{ $page->id }}"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Page</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="" action="{{url('admin/pages/update')}}" method="POST">
                                                        @csrf
                                                        <input name="id" value="{{ $page->id }}" hidden />
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Page Name</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input name="title" type="text" class="form-control"
                                                                    value="{{ $page->title }}" />
                                                            </div>
                                                        </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Description</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="description" type="text"
                                                                class="form-control @error('description') is-invalid @enderror"
                                                                value="{{ $page->description }}" />
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
                                                                           @if($page->status == 1) checked @endif>
                                                                    <label class="form-check-label" for="status-active">
                                                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Active
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="status" id="status-inactive" value="0"
                                                                           @if($page->status == 0) checked @endif>
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
                                <a href="{{url('admin/pages/remove/'.$page->id)}}" class="ms-3" data-bs-toggle="modal"
                                    data-bs-target="#deletePageModal-{{ $page->id }}">
                                    <i class='bx bxs-trash '></i>
                                </a>

                                <div class="modal fade" id="deletePageModal-{{ $page->id }}"
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
                                                    onclick="window.location.replace('{{URL::to('admin/pages/remove/'. $page->id)}}');"
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
<link href="{{ asset('backend_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection

@section('AjaxScript')
        <script src="{{ asset('backend_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script>
            $(document).ready(function() {
                $('#page_form').on('submit', function(e) {
                    e.preventDefault();
                    var data = $(this).serialize();
                    var type = "POST";
                    var url = $(this).attr('action');
                    $.ajax({
                        type: type,
                        data: data,
                        url: url,
                        _token: $("input[name=_token]").val(),
                        success: function(resp) {
                            toastr.success("Page has been submitted successfully.");
                            $("#page_form")[0].reset();
                        },

                        });
                    })

                });
        </script>
@endsection
