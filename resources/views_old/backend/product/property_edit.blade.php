@php
    use Illuminate\Support\Facades\Auth;
    $role = Auth::user()->role;
@endphp
@extends('backend.layouts.app')
@section('PageTitle', 'Add New Property')
@section('plugins')
    <link href="{{asset('backend_assets')}}/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
    <link href="{{asset('backend_assets')}}/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{asset('backend_assets')}}/css/jquery-te-1.4.0.css">
@endsection
@section('content')

    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route($role . '-profile')}}"><i class="bx
                    bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Property</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Edit Product</h5>
            <hr/>
            <form action="{{url('vendor/property/update')}}" method="POST"  enctype="multipart/form-data">
                <input name="product_id" type="hidden" value="{{  $item->product_id }}">
                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Tag Name<span style="color:red;">*</span></label>
                                    <input name="tag_line" type="text" class="form-control" id="inputProductTitle"
                                           placeholder="Enter tag title" required value="{{ old('tag_line', $item->tag_line) }}">
                                    <span style="color: #e20000" class="error" id="tag_line-error"></span>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Product Name/Title<span style="color:red;">*</span></label>
                                    <input name="product_name" type="text" class="form-control" id="inputProductTitle"
                                           placeholder="Enter product title" required value="{{ old('product_name', $item->product_name) }}">
                                    <span style="color: #e20000" class="error" id="product_name-error"></span>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Location<span style="color:red;">*</span></label>
                                    <input name="location" type="text" class="form-control" id="inputProductTitle"
                                           placeholder="Enter Address..." value="{{ old('location', $item->location) }}">
                                    <span style="color: #e20000" class="error" id="product_code-error"></span>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">Short Description<span style="color:red;">*</span></label>
                                    <textarea name="product_short_description" id="product_short_description" class="form-control" rows="3">{{ old('product_short_description', $item->product_short_description) }}</textarea>

                                    <span style="color: #e20000" class="error"
                                           id="product_short_description-error"></span>

                                </div>
                                <div class="mb-3">
                                    <label for="inputProductLongDescription" class="form-label">Detailed Description</label>
                                    <textarea  name="product_long_description" id="product_long_description" class="form-control" rows="3">{{ old('product_long_description', $item->product_long_description) }}</textarea>
                                    <span style="color: #e20000" class="error"
                                           id="product_long_description-error"></span>

                                </div>

                                

                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Property Size</label>
                                    <input name="property_size" type="text" class="form-control" id="inputProductTitle"
                                           placeholder="00.00" value="{{ old('property_size', $item->property_size) }}" >
                                    <span style="color: #e20000" class="error" id="product_name-error"></span>

                                </div>

                               <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Number of Beds</label>
                                    <input name="property_bed" type="number" class="form-control" id="inputProductTitle"
                                           placeholder="Enter property bed" value="{{ old('property_bed', $item->property_bed) }}">
                                    <span style="color: #e20000" class="error" id="product_name-error"></span>

                                </div>

                                <div class="mb-3">
                                    <label for="inputProductQuantity" class="form-label">Number of Bathrooms</label>
                                    <input name="property_bathroom" type="number" min="0" class="form-control"
                                           id="inputProductQuantity" value="{{ old('property_bathroom', $item->property_bathroom) }}">
                                    <span style="color: #e20000" class="error" id="property_bathroom-error"></span>

                                </div>

                                <div class="row mb-3">
                                    <label class="form-label">Product Thumbnail</label>
                                    <div class="col-sm-12 text-secondary">
                                        <input name="product_thumbnail" id="product_thumbnail" class="form-control"
                                               type="file">
                                        <span style="color: #e20000" class="error" id="product_thumbnail-error"></span>

                                        <div>
                                            <img class="card-img-top" style="max-width: 250px; margin-top: 20px" id="show_image" src="{{ asset('images/' . $item->product_thumbnail) }}">
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <label  class="form-label">Product Images</label>
                                    <input name="product_images[]" class="form-control" type="file"
                                           id="multi_image"
                                           multiple="">
                                    <div class="row" id="preview_img" style="padding: 20px">
                                        @if($images)
                                            @foreach($images as $val)
                                            <div class="col-md-2">
                                                <img class="thumb" src="{{asset('/images/'.$val->product_image)}}" style="width: 130px; height: 120px;"/>
                                                <i class="bx bxs-trash"></i>
                                            </div>    
                                            
                                            @endforeach
                                        @endif    
                                    </div>
                                    <span style="color: #e20000" class="error" id="product_images-error"></span>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">

                                    <!-- Original Price -->
                                    <div class="col-md-12">
                                        <label for="inputMarkedPrice" class="form-label">Original Price<span style="color:red;">*</span></label>
                                        <input name="marked_price" type="text" class="form-control" id="inputMarkedPrice"
                                            value="{{ old('marked_price', $item->marked_price) }}" placeholder="00.00">
                                        <span style="color: #e20000" class="error" id="marked_price-error"></span>
                                    </div>

                                    <!-- Sale Price -->
                                    <div class="col-md-12">
                                        <label for="inputProductPrice" class="form-label">Sale Price<span style="color:red;">*</span></label>
                                        <input name="product_price" type="text" class="form-control" id="inputProductPrice"
                                            value="{{ old('product_price', $item->product_price) }}" placeholder="00.00">
                                        <span style="color: #e20000" class="error" id="product_price-error"></span>
                                    </div>

                           
                                {{--  <div class="col-12">
                                    <label for="inputBrand" class="form-label">Property Brand</label>
                                    <select name="brand_id" class="form-select" id="inputBrand">
                                        <option value="">Choose a brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->brand_id }}" {{ old('brand_id', $item->brand_id) == $brand->brand_id ? 'selected' : '' }}>
                                                {{ $brand->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span style="color: #e20000" class="error" id="brand_id-error"></span>
                                </div>  --}}

                              
                                <div class="col-12">
                                    <label for="inputSubCategory" class="form-label">Property Category<span style="color:red;">*</span></label>
                                    <select class="form-select" id="inputSubCategory" name="sub_category_id">
                                        <option value="">Choose a category</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->sub_category_id }}" {{ (old('sub_category_id', $item->sub_category_id) == $subCategory->sub_category_id) ? 'selected' : '' }}>
                                                {{ $subCategory->sub_category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span style="color: #e20000" class="error" id="sub_category_id-error"></span>
                                </div>

                               
                                <div class="col-12">
                                    <label for="inputVendorType" class="form-label">Ownership Type</label>
                                    <select class="form-select" id="inputVendorType" name="vendor_type">
                                        <option value="">--Select--</option>
                                        <option value="agent" {{ old('vendor_type', $item->vendor_type) == 'agent' ? 'selected' : '' }}>Owner</option>
                                        <option value="owner" {{ old('vendor_type', $item->vendor_type) == 'owner' ? 'selected' : '' }}>Dealer</option>
                                    </select>
                                    <span style="color: #e20000" class="error" id="vendor_type-error"></span>
                                </div>

                             
                                <div class="col-12">
                                    <label for="inputProductType" class="form-label">Property For</label>
                                    <select class="form-select" id="inputProductType" name="product_type">
                                        <option value="">--Select--</option>
                                        <option value="rent" {{ old('product_type', $item->product_type) == 'rent' ? 'selected' : '' }}>Used</option>
                                        <option value="sell" {{ old('product_type', $item->product_type) == 'sell' ? 'selected' : '' }}>New</option>
                                    </select>
                                    <span style="color: #e20000" class="error" id="product_type-error"></span>
                                </div>

                                <div class="col-12">
                                    <label class="form-check-label">Availability</label><br>
                                    <label>
                                        <input type="radio" name="is_available" value="1" {{ old('is_available', $item->is_available) == 1 ? 'checked' : '' }}> Available
                                    </label>
                                    <label>
                                        <input type="radio" name="is_available" value="0" {{ old('is_available', $item->is_available) == 0 ? 'checked' : '' }}> Not Available
                                    </label>
                                    <span style="color: #e20000" class="error" id="is_available-error"></span>
                                </div>

                                <!-- Product Status -->
                                <div class="col-12">
                                    <label class="form-check-label">Status</label><br>
                                    <label>
                                        <input type="radio" name="product_status" value="1" {{ old('product_status', $item->product_status) == 1 ? 'checked' : '' }}> Active
                                    </label>
                                    <label>
                                        <input type="radio" name="product_status" value="0" {{ old('product_status', $item->product_status) == 0 ? 'checked' : '' }}> Inactive
                                    </label>
                                    <span style="color: #e20000" class="error" id="product_status-error"></span>
                                </div>
                                {{-- <div class="col-12">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Save Product" />
                                </div> --}}
                                </div>
                            </div>
                            <div class="sub-btn mt-3">
                                <input type="submit" name="submit" class="btn me-2" value="Update">
                               <button class="btn btn-2" type="reset">Cancel</button>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            @csrf
            </form>
        </div>
    </div>
    </div>
@endsection


@section('AjaxScript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script-->
    <script type="text/javascript" src="{{asset('backend_assets')}}/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#product_form').on('submit', function(event){
                event.preventDefault();
                // remove errors if the conditions are true
                $('#product_form *').filter(':input.is-invalid').each(function(){
                    this.classList.remove('is-invalid');
                });
                $('#product_form *').filter('.error').each(function(){
                    this.innerHTML = '';
                });
                $.ajax({
                    url: " ",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success : function(response)
                    {
                        // remove errors if the conditions are true
                        $('#product_form *').filter(':input.is-invalid').each(function(){
                            this.classList.remove('is-invalid');
                        });
                        $('#product_form *').filter('.error').each(function(){
                            this.innerHTML = '';
                        });
                        Swal.fire({
                            icon: 'success',
                            title: response.msg,
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.reload();
                        });
                    },
                    error: function(response) {
                        var res = $.parseJSON(response.responseText);
                        $.each(res.errors, function (key, err){
                            $('#' + key + '-error').text(err[0]);
                            $('#' + key ).addClass('is-invalid');
                        });
                    }
                });
            });
        });
    </script>
@endsection


@section('js')
    <script type="text/javascript">
      $(document).ready(function(){
            $('#product_thumbnail').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

        <!--script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
                referrerpolicy="origin">
        </script-->
        <script>
            /*tinymce.init({
                selector: '#mytextarea'
            });*/
        </script>
    <script src="{{asset('backend_assets')}}/plugins/input-tags/js/tagsinput.js"></script>

    <script>

        $(document).ready(function(){
            $('#multi_image').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(130)
                                        .height(120); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>



    <script>
         ClassicEditor
            .create(document.querySelector('#product_short_description'))
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#product_long_description'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection