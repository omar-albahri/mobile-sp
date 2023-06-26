<!DOCTYPE html>
<html lang='ar'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','اسعار ومواصفات الموبايلات في سوريا')</title>
    <meta property="og:title" content="اسعار ومواصفات الموبايلات في سوريا"/>
    <meta property="og:type" content="" />
    <meta property="og:url" content="<?= URL::to('/'); ?>" />
    <meta property="og:image" content="{{asset('frontend/img/logo.png') }}" />
    <meta content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1' name='viewport'/>
    <meta content=',أسعار الجوالات في سوريا, البراق, سماتيل, مابكو, أسعار البراق, أسعار سماتيل , أسعار برج دمشق, أسعار مابكو , أسعار ايماتيل, ايماتيل , أسعار الجوالات, مواصفات الجوالات , اسعار الموبايلات في سوريا, موبايلات 2020' name='keywords' />
     <meta content='اسعار ومواصفات الموبايلات في سوريا صفحة متخصصة بعرض آخر اسعار ومواصفات الموبايلات بالسوق السورية وبشكل خاص اسعار صالات ايماتيل &#1548;سماتيل مابكو وبرج دمشق ' name='description'/> 
    <!-- Social Media meta tag need customer customization -->
<meta content='https://www.facebook.com/mobilesp' property='fb:app_id'/>
<meta content='https://www.facebook.com/omar.bahri.it' property='fb:admins'/>

<meta name="google-site-verification" content="D21Ma0wWcA8cNvOYqCEOZU4OcFKYDAr9XMt1ugsYJG4" />

    <!-- favicons -->
    <link rel="shortcut icon" href="{{asset('favicon.ico') }}">
    <!--
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    -->
    <!--
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    -->
    <!-- jQuery and JS bundle w/ Popper.js -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
    -->
    {{--<link rel="stylesheet" href="{{ secure_asset('css/AdminLTE.min.css') }}">--}}
    <script src="{{asset('frontend/lib/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('frontend/lib/bootstrap.min.css') }}">
    <script src="{{asset('frontend/lib/bootstrap.min.js') }}"></script>
    <script src="{{asset('frontend/lib/popper.min.js') }}"></script>
    <script src="{{asset('frontend/lib/all.js') }}"></script>
    <link href="{{asset('frontend/style-rtl.css') }}" rel="stylesheet"/>
     <link href="{{asset('frontend/css/animate.css') }}" rel="stylesheet"/>
</head>
<body>
<!-- Navigation -->
@include('front.menu')
<!-- Image Slider -->
@yield('slider')

<!-- Jumbotron  -->
@yield('welcome')
<!-- Fixed Background-->
<!--
        <figure>
          <div id="fixed-wrap">
            <div id="fixed">
            </div>
          </div>
        </figure>
-->

<!-- content -->
@yield('content')
<!-- Connect-->
<div class="container-fluid padding text-center">
    <div class="row text-center padding">
        <div class="col-12">
            <h2 class="text-center">أتصل بنا</h2>
        </div>
    </div>
    <div class="social text-center padding">
        <a href="http://fb.com/mobilesp" target="_blank"><i class="fab fa-facebook"></i></a>
        <!--
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        -->
    </div>
</div>
<!-- Footer -->
<footer>
    <div class="container-fluid padding text-center">
        <div class="row padding">
            <div class="col-md-6">
                <hr class="light"/>
                <a class="navbar-brand"> <img class="" src="{{asset('frontend/img/logo.png') }}"/></a>
                <hr class="light"/>

                <p>omarbahriite@gmail.com</p>
                <p>سوريا, دمشق</p>
            </div>


            <div class="col-md-6">
                <hr class="light"/>
                <h5>روابط هامة</h5>
                <hr class="light"/>
                <a href="{{route('about')}}"> عن الموقع</a>

            </div>
            <div class="col-12">
                <hr class="light-100"/>
            </div>
            <div class="col-12">
                <h5>&copy اسعار الموبايلات في سوريا</h5>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('custom/mobile_index.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script > 
		new WOW().init();
	</script>
<script>
    window.base_url = "<?= URL::to('/'); ?>";
</script>
</body>
</html>
