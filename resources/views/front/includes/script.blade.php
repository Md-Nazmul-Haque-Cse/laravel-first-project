<!-- Plugins JS File -->
<script src="{{asset('/')}}assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}assets/js/superfish.min.js"></script>
<script src="{{asset('/')}}assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/js/bootstrap-input-spinner.js"></script>
<script src="{{asset('/')}}assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.plugin.min.js"></script>
<script src="{{asset('/')}}assets/js/jquery.countdown.min.js"></script>
<!-- Main JS File -->
<script src="{{asset('/')}}assets/js/main.js"></script>
<script src="{{asset('/')}}assets/js/demos/demo-13.js"></script>
<script src="{{asset('/')}}assets/js/jquery.elevateZoom.min.js"></script>

<script>
    $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsive: {
                0:{items:1},
                720:{items:2},
                980:{items: 3},
                1200:{ items: 4}
            }
        });
    })
</script>
