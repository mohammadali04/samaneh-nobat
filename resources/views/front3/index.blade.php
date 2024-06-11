<!DOCTYPE html>
<html lang="en">
<style>
@font-face {
    font-family: 'yekan';
    src: url('/fonts/yekan.ttf') format('truetype'),
        url('/fonts/yekan.eot?#iefix') format('embedded-opentype');
}

/* div,
ul,
li {
    direction: rtl !important;
    list-style: none;
} */

body {
    font-family: yekan !important;
}

h1,
h2,
h3,
h4,
h5,
p {
    font-family: yekan !important;
}
</style>
@include('front3.head')

<body>

    <!-- ======= Header ======= -->
    @include('front3.header')

    <!-- ======= Hero Section ======= -->
    @if(isset($index))
    @include('front3.hero')
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        @include('front3.about.about')
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        @include('front3.our-services.services')
        <!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <!-- @include('front3.why-us.why-us') -->
        <!-- End Why Us Section -->
        
        <!-- ======= Call To Action Section ======= -->
        <!-- @include('front3.call-to-action.call-to-action') -->
        <!--  End Call To Action Section -->
        
        <!-- ======= Features Section ======= -->
        <!-- @include('front3.features.features') -->
        <!-- End Features Section -->
        
        <!-- ======= Portfolio Section ======= -->
        <!-- @include('front3.portfolio.portfolio') -->
        <!-- End Portfolio Section -->
        @include('front3.best-servicers.best-servicers')

        <!-- ======= Testimonials Section ======= -->
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <!-- @include('front3.teams.teams') -->
        <!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <!-- @include('front3.our-prouds.our-prouds') -->
        <!-- End Clients Section -->

        <!-- ======= Pricing Section ======= -->

        <!-- ======= F.A.Q Section ======= -->
        @include('front3.faq.faq')
        <!-- End F.A.Q Section -->
        @else
        <main style="margin:120px auto;width:80%;direction:rtl">
            @yield('content')
            @endif
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        @include('front3.footer')
        <!-- End  Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{asset('/main-files/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
        <script src="{{asset('/main-files/assets/vendor/aos/aos.js')}}"></script>
        <script src="{{asset('/main-files/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('/main-files/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('/main-files/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('/main-files/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('/main-files/assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js">
</script>
<script>
function submitForm() {
    $('#form').submit();
}
$(document).ready(function() {

    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix :
            '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
            'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

                lfm({
                    type: 'image',
                    prefix: '/laravel-filemanager'
                }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem
                            .url);
                    });
                });

            }
        });
        return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['popovers', ['lfm']],
            ['style', ['style']],
            ['style', ['bold', 'italic', 'underline', 'strikethrough',
                'superscript', 'subscript', 'clear'
            ]],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video', 'hr', 'readmore']],
            ['genixcms', ['elfinder']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ],
        buttons: {
            lfm: LFMButton
        }
    });
});
$('#lfm').filemanager('image');
</script>