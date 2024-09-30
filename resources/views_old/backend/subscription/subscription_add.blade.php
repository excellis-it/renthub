@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@section('SubscriptonTitle', 'Add New Subscription')
@section('content')

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Subscripton</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Subscription</li>
                </ol>
            </nav>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- End Breadcrumb -->
    <div class="card">
        <div class="card-body">
            <h4 class="d-flex align-items-center mb-3">Add Subscription</h4>
            <form id="subcription_form" action="{{url('admin/subscription/create') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter Title" value="{{ old('title') }}" />
                       
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Sub-Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror"
                            placeholder="Enter Subtitle" value="{{ old('subtitle') }}" />
                       
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="description" type="text"
                            class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" rows="3" value="{{ old('description') }}"></textarea>
                           
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Days</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="days" type="number" class="form-control @error('days') is-invalid @enderror"
                            placeholder="Enter Days" value="{{ old('days') }}" />
                       
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Price</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="price" type="number" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Enter price" value="{{ old('price') }}" />
                       
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Number of Product</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="no_of_product" type="number" class="form-control @error('no_of_product') is-invalid @enderror"
                            placeholder="Enter Products" value="{{ old('no_of_product') }}" />
                       
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <!-- Inline Radio Buttons -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="active" {{ old('status') == 'active' ? 'checked' : '' }}>
                            <label class="form-check-label">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" value="inactive" {{ old('status') == 'inactive' ? 'checked' : '' }}>
                            <label class="form-check-label">Inactive</label>
                        </div>
                        <small style="color: #e20000" class="error" id="status-error"></small>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#subcription_form').on('submit', function(e) {
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
                        toastr.success('Subscription added successfully.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000'
                        });

                        form[0].reset();
                    },
                    error: function(resp) {
                            toastr.error('There was an issue submitting the form.', 'Error', {
                                closeButton: true,
                                progressBar: true,
                                positionClass: 'toast-top-right',
                                timeOut: '3000'
                            });

                    }
                });
            });
        });
    </script>
@endsection
