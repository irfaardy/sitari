<script src="{{asset('assets/landing/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/landing/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/landing/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/landing/js/bg_particle.js')}}"></script>

     <script type="text/javascript">
        function fixnavbaronScroll() {
            if ($('.fixed-on-scroll').length) {
                if ($(this).scrollTop() >= $('.fixed-on-scroll').height()) {
                    $('.fixed-on-scroll').addClass('fixed-on-top');
                    $('.fixed-on-scroll .navbar-brand img').prop('src','{{asset('assets/logo/sitari.png')}}')
                } else {
                    $('.fixed-on-scroll').removeClass('fixed-on-top');
                    $('.fixed-on-scroll .navbar-brand img').prop('src','{{asset('assets/logo/sitari.png')}}')
                }
            }
        }
    </script>
    <script src="{{asset('assets/landing/js/miri-ui-kit.js')}}"></script>