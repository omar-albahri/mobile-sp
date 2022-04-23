@extends('front.layout')

@section('meta_data')
    {{--we but this in header for google seo--}}

@endsection('meta_data')

@section('welcome')
    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead"> موقع متخصص بعرض اسعار الموبايلات المتوفر بالسوق السورية من خلال عرض الاجهزة المتوفرة في وكالات ايماتيل وسماتيل ومابكو
                    جميع الاسعار الموجودة بالموقع  يتم نقلها يومياً من المواقع الالكترونية الرسمية للوكالات باستخدام احدث التقنيات لتتم مواكبة  اسعار الأجهزة المتوفرة</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                <a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">عرض المزيد</button></a>
            </div>
        </div>
    </div>
@endsection('welcome')

@section('slider')
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('frontend/img/background1.jpg') }}" />
                <div class="carousel-caption">
                    <h1 class="display-2">bootstrap</h1>
                    <h3>Complete Website Layout</h3>
                    <button type="button" class="btn btn-outline-light btn-lg">View Demo</button>
                    <button type="button" class="btn btn-primary btn-lg">Get Started</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/img/background2.jpg') }}" />
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/img/background3.jpg') }}" />
            </div>
        </div>
    </div>
@endsection('slider')

@section('content')
    @include('front.product_section')
@endsection('content')