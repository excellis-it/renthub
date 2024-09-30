@extends('frontend.includes.master')

@section('content')
    @include('frontend.includes.header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" rel="stylesheet">

    <section class="inner_banner_sec"
        style="
    background-image: url({{ asset('frontend_assets/assets/images/inr-bnr.jpg') }});
    background-position: center;
    background-repeat: no-repeat; 
    background-size: cover;
  ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-banner-text">
                        <h1>Review And Rating</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="property-details-sec">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="title">E11 daily basis furnished flat available for rent</h2>
                    <div class="property-img-main">
                        <a href="{{ asset('frontend_assets/assets/images/p-1.jpg') }}" data-lightbox="homePortfolio">
                            <img src="{{ asset('frontend_assets/assets/images/p-1.jpg') }}" />
                        </a>
                        <!-- <img src="assets/images/feature_car.jpg" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="title">Reviews</h2>

                    <div class="card p-3 shadow border-0 updateprofile_sec mt-4">
                        <form id="reviewForm" action="{{ url('/user/review-store') }}" method="post">
                            <!-- Step 1 -->
                            <div class="step" id="step1-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $data }}" />
                                <div class="row">

                                    <div class="rating-all d-flex align-items-center">
                                        <div class="rating-point me-3">
                                            <h4 class="mb-0">(4.4)</h4>
                                        </div>


                                        <div class="rating-all d-flex align-items-center">



                                            <div class="rating">
                                                <label for="star1" aria-label="Rating 1">
                                                    <input type="radio" id="star1" name="rating_point" value="1"
                                                        class="sr-only" onclick="star(1)">
                                                </label>
                                                <label for="star2" aria-label="Rating 2">
                                                    <input type="radio" id="star2" name="rating_point" value="2"
                                                        class="sr-only" onclick="star(2)">
                                                </label>
                                                <label for="star3" aria-label="Rating 3">
                                                    <input type="radio" id="star3" name="rating_point" value="3"
                                                        class="sr-only" onclick="star(3)">
                                                </label>
                                                <label for="star4" aria-label="Rating 4">
                                                    <input type="radio" id="star4" name="rating_point" value="4"
                                                        class="sr-only" onclick="star(4)">
                                                </label>
                                                <label for="star5" aria-label="Rating 5">
                                                    <input type="radio" id="star5" name="rating_point" value="5"
                                                        class="sr-only" onclick="star(5)">
                                                </label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label>Review</label>
                                            <textarea name="description" type="text" rows="6" placeholder="Write Your Comment Here" class="form-control"
                                                id=""></textarea>
                                        </div>
                                    </div>


                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="submit" class="btn btn_green">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg_f7f7f7">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="propety-type mb-div">
                        <div class="tour-form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">First & last name</label>
                                            <input type="text" class="form-control" id="" value=""
                                                placeholder="First & last name" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="text" class="form-control" id="" value=""
                                                placeholder="Phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" id="" value=""
                                                placeholder="Email" required="">
                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Message</label>
                                            <textarea class="form-control form-control-1" id="" placeholder="Message" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Interested In</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Request a tour
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault2" checked>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Apply
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault3" checked>
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    Enquire
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Select a preferred date for tour
                                                <span>(optional)</span></label>
                                            <input type="date" class="form-control" id="" value=""
                                                placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <div class="request-btn text-center">
                                                <a href="#" class="">Inquire Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    @include('frontend.includes.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const stars = document.getElementsByClassName("sr-only");


        function star(n) {
            remove();
            for (let i = 0; i < n; i++) {
                stars[i].className = "sr-only star-" + n;
            }

        }

        function remove() {
            for (let i = 0; i < stars.length; i++) {
                stars[i].className = "sr-only";
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#reviewForm').on('submit', function(e) {
                e.preventDefault();

                var form = $(this);
                var data = new FormData(form[0]);
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
                        toastr.success('User reviewed successfully.', 'Success', {
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right',
                            timeOut: '3000'
                        });

                        form[0].reset();
                    },
                    error: function(xhr) {
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
