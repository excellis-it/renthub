@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
    use App\Helpers\Product;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Listing User')
@section('content')
    <!--breadcrumb -->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">Listing User</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route($role . '-profile') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Listing User</li>
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
                            <th>Profile Picture</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>username</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                        @foreach ($data as $index => $val)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('public/uploads/images/profile/' . $val->photo) }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;"/></td>
                                <td>{{ strtoupper($val->first_name) }} {{ strtoupper($val->last_name) }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ strtoupper($val->username) }}</td>
                                
                                <td>
                                    <form method="POST" action="" class="activate_form">
                                        @csrf
                                        <input name="product_id" value="{{ $val->id }}" hidden />
                                        <input name="current_status" value="{{ $val->status }}" hidden />

                                        <div class="form-check form-switch">
                                            @if ($val->is_delete==0) 
                                                <span style="color: red; font-weight: bold;">In-Active</span>
                                            @elseif ($val->status == 1)
                                                <span style="color: green; font-weight: bold;">Active</span>
                                            @else
                                                <span style="color: red; font-weight: bold;">In-Active</span>
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
                        
                                    <a href="{{ route('admin-edit-user', $val->id) }}" class="ms-3" >
                                        <i class='fa fa-pen'></i>
                                    </a>

                                    <a href="{{ route('admin-change-password-list', $val->id) }}" class="ms-3" >
                                        <i class='fa fa-key'></i>
                                    </a>

                                    <a href="{{ route('admin-remove-listing-user', $val->id) }}" class="ms-3" data-bs-toggle="modal" data-bs-target="#deletePageModal-{{ $val->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>



                                    {{-- <button type="button" class="btn btn-primary btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#exampleVerticallycenteredModal-{{ $val->id }}">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                    
                                    <a href="{{ route('admin-edit-user', $val->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit "></i> Edit
                                    </a> --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleVerticallycenteredModal-{{ $val->id }}"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Listing User Details</h5>
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
                                                                <th>Profile Picture</th>
                                                                <td><img src="{{ asset('public/uploads/images/profile/' . $val->photo) }}" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;"/></td>
                                                            </tr>
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
                                                                <th>Govt Id</th>
                                                                <td>{{ $val->govt_id_type }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Govt File</th>
                                                                <td><img src="{{ asset('public/images/' . $val->govt_id_file) }}"
                                                                        alt="" height="100"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Company Name</th>
                                                                <td>{{ $val->company_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Corporate Id</th>
                                                                <td>{{ $val->corporate_id }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tax Id</th>
                                                                <td>{{ $val->tax_id }}</td>
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


                                    <!-- Delete User Modal -->
                                        <div class="modal fade" id="deletePageModal-{{ $val->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-white">Are you sure?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                        <button 
                                                            onclick="window.location.replace('{{ URL::to('admin/user/remove-listing-user/' . $val->id) }}');"
                                                            class="btn btn-dark">
                                                            Confirm
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/custom.js"></script>
@endsection
