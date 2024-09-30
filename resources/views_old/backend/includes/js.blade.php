<!-- Bootstrap JS -->
<script src="{{asset('backend_assets')}}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('backend_assets')}}/js/jquery.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{asset('backend_assets')}}/plugins/chartjs/js/Chart.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('backend_assets')}}/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="{{asset('backend_assets')}}/plugins/jquery-knob/excanvas.js"></script>
<script src="{{asset('backend_assets')}}/plugins/jquery-knob/jquery.knob.js"></script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>
<script src="{{asset('backend_assets')}}/js/index.js"></script>
<!--app JS-->
<script src="{{asset('backend_assets')}}/js/app.js"></script>

<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>  --}}
    <script src="assets/js/custom.js"></script>


{{-- toaster message js    --}}
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

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $('.has-arrow').on('click', function () {
            var $submenu = $(this).next('ul');
            $submenu.slideToggle();
            $(this).toggleClass('open');
        });

        $('.submenu-item').on('click', function () {
            // Remove active class from all submenu items
            $('.submenu-item').removeClass('active');
            // Add active class to the clicked item
            $(this).addClass('active');
            // Open the parent menu if it's not already open
            $(this).closest('ul').slideDown();
            $(this).closest('ul').prev('.has-arrow').addClass('open');
        });
    });


    
</script>