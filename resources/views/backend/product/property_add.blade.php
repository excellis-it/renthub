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
                <li class="breadcrumb-item"><a href=""><i class="bx
                    bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::to('/vendor/property/list') }}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add New Property</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb -->
<div class="card">
    <div class="card-body p-4">
        <h5 class="card-title">Add New Product</h5>
        <hr />
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">

                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Tag Name<span style="color:red;">*</span></label>
                                <input name="tag_line" type="text" class="form-control" id="inputProductTitle"
                                    placeholder="Enter tag title" value="{{ old('tag_line') }}">
                                <span style="color: #e20000" class="error" id="tag_line-error"></span>

                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Product Name/Title<span style="color:red;">*</span></label>
                                <input name="product_name" type="text" class="form-control" id="inputProductTitle"
                                    placeholder="Enter product title" value="{{ old('product_name') }}">
                                <span style="color: #e20000" class="error" id="product_name-error"></span>

                            </div>
                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Location<span style="color:red;">*</span></label>
                                <input name="location" type="text" class="form-control" id="inputProductTitle"
                                    placeholder="Enter Address..." value="{{ old('location') }}">
                                <span style="color: #e20000" class="error" id="location-error"></span>

                            </div>
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Short Description<span style="color:red;">*</span></label>
                                <textarea name="product_short_description" id="product_short_description"
                                    class="form-control" style="height:100vh"  value="{{ old('product_short_description') }}"></textarea>

                                <span style="color: #e20000" class="error"
                                    id="product_short_description-error"></span>

                            </div>
                            <div class="mb-3">
                                <label for="inputProductLongDescription" class="form-label">Detailed Description</label>
                                <textarea name="product_long_description" id="product_long_description"
                                    class="form-control" style="height:100vh" value="{{ old('product_long_description') }}"></textarea>
                                <span style="color: #e20000" class="error" id="product_long_description-error"></span>

                            </div>

                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Property Size</label>
                                <input name="property_size" type="text" class="form-control" id="inputProductTitle"  value="{{ old('property_size') }}">
                                <span style="color: #e20000" class="error" id="property_size-error"></span>

                            </div>

                            <div class="mb-3">
                                <label for="inputProductTitle" class="form-label">Number of Beds</label>
                                <input name="property_bed" type="text" class="form-control" id="inputProductTitle"
                                    placeholder="Enter property bed" value="{{ old('property_bed') }}">
                                <span style="color: #e20000" class="error" id="property_bed-error"></span>

                            </div>

                            <div class="mb-3">
                                <label for="inputProductQuantity" class="form-label">Number of Bathrooms</label>
                                <input name="property_bathroom" type="text"  value="{{ old('property_bathroom') }}" class="form-control"
                                    id="inputProductQuantity">
                                <span style="color: #e20000" class="error" id="property_bathroom-error"></span>

                            </div>

                            <div class="row mb-3">
                                <label class="form-label">Product Thumbnail</label>
                                <div class="col-sm-12 text-secondary">
                                    <input name="product_thumbnail" id="product_thumbnail" class="form-control"
                                        type="file">
                                    <span style="color: #e20000" class="error" id="product_thumbnail-error"></span>

                                    <div>
                                        <img class="card-img-top" style="max-width: 250px; margin-top: 20px"
                                            id="show_image">
                                    </div>
                                </div>
                            </div>



                            <div class="mb-3">
                                <label class="form-label">Product Images</label>
                                <input name="product_images[]" class="form-control" type="file" id="multi_image"
                                    multiple="">
                                <div class="row" id="preview_img" style="padding: 20px"></div>
                                <span style="color: #e20000" class="error" id="product_images-error"></span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label for="inputPrice" class="form-label">Original Price<span style="color:red;">*</span></label>
                                    <input name="marked_price" value="{{ old('marked_price') }}"  type="text" class="form-control" id="inputPrice"
                                        placeholder="00.00">
                                    <span style="color: #e20000" class="error" id="marked_price-error"></span>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputPrice" class="form-label">Sale Price<span style="color:red;">*</span></label>
                                    <input name="product_price" value="{{ old('marked_price') }}"  type="text" class="form-control" id="inputPrice"
                                        placeholder="00.00">
                                    <span style="color: #e20000" class="error" id="product_price-error"></span>
                                </div>

                                <div class="col-12">
                                    <label for="inputVendor" class="form-label">Property Category<span style="color:red;">*</span></label>
                                    <select class="form-select" id="inputVendor" name="sub_category_id">
                                        <option value="">Choose a category</option>

                                        @foreach($subCategories as $item)
                                        <option value="{{$item->sub_category_id}}">{{$item->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: #e20000" class="error" id="sub_category_id-error"></span>

                                </div>

                                <div class="col-12">
                                    <label for="inputVendor" class="form-label">Ownership Type </label>
                                    <select class="form-select" id="inputVendor" name="vendor_type">
                                        <option value="">--Select--</option>
                                        <option value="agent">Agent</option>
                                        <option value="owner">Owner</option>
                                    </select>
                                    <span style="color: #e20000" class="error" id="vendor_type-error"></span>

                                </div>

                                <div class="col-12">
                                    <label for="inputVendor" class="form-label">Property For </label>
                                    <select class="form-select" id="inputVendor" name="product_type">
                                        <option value="">--Select--</option>
                                        <option value="rent">Rent</option>
                                        <option value="sell">Sell</option>
                                    </select>
                                    <span style="color: #e20000" class="error" id="product_type-error"></span>

                                </div>


                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="is_available" value="1" checked> Available
                                    </label>

                                    <label>
                                        <input type="radio" name="is_available" value="0"> Not Available
                                    </label>
                                </div>


                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="product_status" value="1" checked> Active
                                    </label>

                                    <label>
                                        <input type="radio" name="product_status" value="0"> Inactive
                                    </label>
                                </div>

{{-- 
                                <div class="col-12">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Save Product" />
                                </div> --}}
                            </div>
                        </div>

                        <div class="sub-btn mt-3">
                            <input type="submit" name="submit" class="btn me-2" value="Submit">
                           <button class="btn btn-2" type="reset">Cancel</button>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>

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
<script>
    $(document).ready(function () {
        // Prevent form submission on submit
        $('form').on('submit', function (e) {
            e.preventDefault();

            // Clear previous error messages
            $('.error').text('');

            // Create a FormData object for file uploads and other inputs
            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "{{ url('vendor/property/create') }}",  // Laravel route URL
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response); // Log the response for debugging

                    if(response.status == true){
                        //message show in toaster
                        window.location.replace("{{ URL::to('/vendor/property/list') }}");
                        toastr.success(response.message, {timeout: 1000});
                    } else {
                        console.error("Response status is not true");
                    }
                },
                error: function (response) {
                    let errors = response.responseJSON.errors;
                    // Loop through the errors and display them
                    $.each(errors, function (key, value) {
                        $('#' + key + '-error').text(value[0]);
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
@endsection