<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Rent Hub</title>
  <link rel="icon" href="{{ asset('public/backend_assets/images/favicon-32x32.png')}}" type="image/png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend_assets/bootstrap-5.3.2/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/assets/css/slick.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/assets/css/animate.min.css') }}" />
  <link href="{{ asset('frontend_assets/assets/css/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend_assets/assets/css/menu.css') }}" rel="stylesheet" />
  <link href="{{ asset('frontend_assets/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend_assets/assets/css/responsive.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend_assets/assets/css/lightbox.min.css') }}" rel="stylesheet">
  <script src="{{ asset('frontend_assets/assets/js/jquery.min.js') }}"></script>

  {{-- toaster css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>
  <main>
    @yield('content')

    <!--Enquiry Modal -->
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

                <form action="user_enquiry" method="POST" id="user-enquiry-form">
                  @csrf

                  @php
                  $productId = request()->route('id'); // Get the product ID from the URL
                  @endphp

                  <input type="hidden" name="product_id" value="{{ $productId }}">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Full name<span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="name" placeholder="First & last name" name="name"
                          value="{{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name ?? '' }}">
                        <span style="color: red;" id="name-error"></span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Phone<span style="color:red;">*</span></label>
                        <input type="number" class="form-control" id="phone" placeholder="Phone" name="phone"
                          value="{{ Auth::user()->phone_number ?? '' }}">
                        <span style="color: red;" id="phone-error"></span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Email<span style="color:red;">*</span></label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                          value="{{ Auth::user()->email ?? '' }}">
                        <span style="color: red;" id="email-error"></span>
                      </div>
                    </div>


                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Message<span style="color:red;">*</span></label>
                        <textarea class="form-control form-control-1" id="message" name="message" placeholder="Message"
                          rows="4"></textarea>
                        <span style="color: red;" id="message-error"></span>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="">Interested In</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="interested_in" id="flexRadioDefault1"
                            value="1">
                          <label class="form-check-label" for="flexRadioDefault1">
                            Request a tour
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="interested_in" id="flexRadioDefault2"
                            value="2">
                          <label class="form-check-label" for="flexRadioDefault2">
                            Apply
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="interested_in" id="flexRadioDefault3"
                            value="0" checked>
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
                        <input type="date" class="form-control" id="" value="" placeholder="Email" name="tour_date">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-12">
                        <div class="text-center request-btn">
                          <input type="submit" class="btn btn-primary px-4" value="Inquire Now" />
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
    <!--Enquiry Modal -->
  </main>
  <script src="{{ asset('frontend_assets/assets/js/slick.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/bootstrap-5.3.2/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend_assets/assets/js/aos.js') }}"></script>
  <script src="{{ asset('frontend_assets/assets/js/custom.js') }}"></script>
  <script>
    $('.related').slick({
         dots: false,
         infinite: true,
         arrows: false,

         speed: 300,
         slidesToShow: 3,
         slidesToScroll: 3,
         responsive: [
           {
             breakpoint: 1024,
             settings: {
               slidesToShow: 3,
               slidesToScroll: 3,

             }
           },
           {
             breakpoint: 600,
             settings: {
               slidesToShow: 2,
               slidesToScroll: 2
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
           // You can unslick at a given breakpoint now by adding:
           // settings: "unslick"
           // instead of a settings object
         ]
       });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    $(document).ready(function() {
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    });
  </script>


<script>
    
    
  $(document).on('click', '.inquire-modal', function() {
    
      var product_id = $('#product_id').val();
      $.ajax({
          url: "{{ route('user-check-enquire') }}",
          type: "GET",
          data: {
              product_id: product_id
          },
          success: function(response) {
              if (response.status == true) {
                  // exampleModal will open
                  $('#exampleModal').modal('show');
              } else {
                  // exampleModal will not open
                  Swal.fire({
                      icon: 'error',
                      title: response.msg,
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: 'OK'
                  });
              }
          }
      });
  });
  </script>


  <script type="text/javascript">
    $(document).ready(function(){
      $('#user-enquiry-form').on('submit', function(event){
          event.preventDefault();
          $('#user-enquiry-form *').filter(':input.is-invalid').each(function(){
              this.classList.remove('is-invalid');
          });
          $('#user-enquiry-form *').filter('.error').each(function(){
              this.innerHTML = '';
          });
          $.ajax({
              url: "{{route('user-enquiry-store')}}",
              method: 'POST',
              data: new FormData(this),
              dataType: 'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success : function(response)
              {
                if(response.status == true){
                  // remove errors if the conditions are true
                  $('#user-enquiry-form *').filter(':input.is-invalid').each(function(){
                      this.classList.remove('is-invalid');
                  });
                  $('#user-enquiry-form *').filter('.error').each(function(){
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
                }else{
                  toaster.error(response.msg);
                }
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

</body>

</html>