@php
use Illuminate\Support\Facades\Auth;
$role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'CMS Home page')
@section('content')

<!--breadcrumb -->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Home</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>
    </div>
</div>


<!--end breadcrumb -->
<div class="card">
    <div class="card-body">
        <h4 class="d-flex align-items-center mb-3">Home Information</h4>
        <br>
        <form id="cms_form" action="{{url('admin/home/update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $home->id ?? '' }}">
            <div class="border p-4 rounded label_color">
                {{-- section 1 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 1</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_1_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_1_title'] ?? '' }}" />
                        @if ($errors->has('section_1_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_1_title') }}</div>
                        @endif

                    </div>
                </div>
                {{-- section 2 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 2</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_2_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_2_title'] ?? '' }}" />
                        @if ($errors->has('section_2_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_2_title') }}</div>
                        @endif

                    </div>
                </div>

                {{-- section 3 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 3</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_3_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_3_title'] ?? '' }}" />
                        @if ($errors->has('section_3_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_3_title') }}</div>
                        @endif

                    </div>
                </div>
                {{-- section 4 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 4</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_4_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_4_title'] ?? '' }}" />
                        @if ($errors->has('section_4_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_4_title') }}</div>
                        @endif

                    </div>
                </div>
                {{-- section 5 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 5</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_5_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_5_title'] ?? '' }}" />
                        @if ($errors->has('section_5_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_5_title') }}</div>
                        @endif

                    </div>
                </div>
                {{-- section 6 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 6</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_6_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_6_title'] ?? '' }}" />
                        @if ($errors->has('section_6_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_6_title') }}</div>
                        @endif

                    </div>
                </div>


                {{-- section 7 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 7</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Image
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_7_image" id="image" class="form-control" type="file" value="{{$home['section_7_image']}}">
                        @if ($errors->has('section_7_image'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_7_image') }}</div>
                        @endif
                        {{-- <div>
                            <img class="card-img-top" src="{{ asset('images/' . $home['section_7_image'] ?? '') }}" style="max-width: 250px; margin-top: 20px" id="show_image">
                        </div> --}}
                        @if ($home['section_7_image'])
                        <div class="col-md-12 mb-3">
                            <label for="inputEnterYourName" class="col-form-label">View
                                Image </label>
                            <br>
                            <img src="{{ asset('images/' . $home['section_7_image'] ?? '') }}" alt="" class="card-img-top" style="max-width: 100px; margin-top: 20px;background: orange;">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_7_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_7_title'] ?? '' }}" />
                        @if ($errors->has('section_7_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_7_title') }}</div>
                        @endif

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Description
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="section_7_description" type="text" class="form-control" placeholder="Enter Description" id="section_7_description" value="" rows="3">{{ $home['section_7_description'] ?? '' }}</textarea>
                        @if ($errors->has('section_7_description'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_7_description') }}</div>
                        @endif
                    </div>
                </div>

                {{-- section 8 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 8</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Image
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_8_image" id="image" class="form-control" type="file" value="{{$home['section_8_image']}}">
                        @if ($errors->has('section_8_image'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_8_image') }}</div>
                        @endif
                        {{-- <div>
                            <img class="card-img-top" src="{{ asset('images/' . $home['section_8_image'] ?? '') }}" style="max-width: 250px; margin-top: 20px" id="show_image">
                        </div> --}}
                        @if ($home['section_8_image'])
                        <div class="col-md-12 mb-3">
                            <label for="inputEnterYourName" class="col-form-label">View
                                Image </label>
                            <br>
                            <img src="{{ asset('images/' . $home['section_8_image'] ?? '') }}" alt="" class="card-img-top" style="max-width: 100px; margin-top: 20px;background: orange;">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_8_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_8_title'] ?? '' }}" />
                        @if ($errors->has('section_8_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_8_title') }}</div>
                        @endif

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Description
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="section_8_description" type="text" class="form-control" placeholder="Enter Description" id="section_8_description" value="" rows="3">{{ $home['section_8_description'] ?? '' }}</textarea>
                        @if ($errors->has('section_8_description'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_8_description') }}</div>
                        @endif
                    </div>
                </div>

                {{-- section 9 --}}
                <div class="col-md-12 mt-4 mb-2">
                    <h6 class="mb-0 text-uppercase">Section 9</h6>
                    <hr>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Image
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_9_image" id="image" class="form-control" type="file" value="{{$home['section_9_image']}}">
                        @if ($errors->has('section_9_image'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_9_image') }}</div>
                        @endif

                        @if ($home['section_9_image'])
                        <div class="col-md-12 mb-3">
                            <label for="inputEnterYourName" class="col-form-label">View
                                Image </label>
                            <br>
                            <img src="{{ asset('images/' . $home['section_9_image'] ?? '') }}" alt="" class="card-img-top" style="max-width: 100px; margin-top: 20px;background: orange;">
                        </div>
                        @endif
                        {{-- <img class="card-img-top" src="{{ asset('images/' . $home['section_9_image'] ?? '') }}" style="max-width: 250px; margin-top: 20px" id="show_image"> --}}

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Title
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input name="section_9_title" type="text" class="form-control" placeholder="Enter Title" value="{{ $home['section_9_title'] ?? '' }}" />
                        @if ($errors->has('section_9_title'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_9_title') }}</div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="inputEnterYourName" class="col-form-label"> Description
                            <span style="color: red;">*</span></label>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="section_9_description" type="text" class="form-control" placeholder="Enter Description" id="section_9_description" value="" rows="3">{{ $home['section_9_description'] ?? '' }}</textarea>
                        @if ($errors->has('section_9_description'))
                        <div class="error" style="color:red;">
                            {{ $errors->first('section_9_description') }}</div>
                        @endif
                    </div>
                </div>





                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>



@section('AjaxScript')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


<script src="assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/custom.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#section_7_description'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#section_8_description'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#section_9_description'))
        .catch(error => {
            console.error(error);
        });

</script>

@endsection

@section('js')

@endsection
@endsection
