@php 

use Illuminate\Support\Facades\Auth; 
$role = Auth::user()->role;

@endphp

@extends('backend.layouts.app')
@section('PageTitle', 'Products')
@section('content')
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Electronics List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="ms-auto" style="margin-bottom: 20px">
                    @if(Auth::user()->role == "vendor")
                        <a href="{{URL::to('/vendor/electronics/add')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                            <i class="bx bxs-plus-square"></i>Add New Electronics</a></div>
                @endif
                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Tag Name</th>
                        <th>Product Name</th>
                        <th>Listing User Type</th>
                        <th>Product Type</th>
                        <th>Product Price</th>
                        <th>Product Status</th>
                  
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{strtoupper($item->tag_line)}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{strtoupper($item->vendor_type)}}</td>
                            <td>{{strtoupper($item->product_type)}}</td>
                            <td>${{$item->product_price}}</td>
                            <td >
                                @if($item->product_status==1)
                                    <span style="padding: 8px; background-color:green; color:white; "> Active</span>
                                @else                                
                                    <span style="padding: 8px; background-color:red; color:white; "> In-Active</span>
                                @endif
                            </td>
                           
                            <td>
                               <div class="d-flex order-actions">
                                    @if(Auth::user()->role == "vendor")
                                       
                                        <a href="{{URL::to('vendor/electronics/edit/'.$item->product_id)}}" data-bs-target="#editProductModal-{{ $item->product_id }}">
                                            <i class='bx bxs-edit'></i>
                                        </a>

                                        <a href="#" class="ms-3" data-bs-toggle="modal"
                                            data-bs-target="#exampleDangerModal-{{ $item->product_id }}">
                                            <i class='bx bxs-trash'></i>
                                        </a>

                                            <div class="modal fade" id="exampleDangerModal-{{ $item->product_id }}"
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
                                                                onclick="window.location.replace('{{URL::to('vendor/electronics/remove/'.$item->product_id)}}');"
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

                </table>
            </div>
        </div>
    </div>
@endsection
@section('plugins')
    <link href="{{asset('backend_assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
@endsection
@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
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
    @endsection
@endsection
