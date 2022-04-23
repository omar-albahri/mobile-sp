@extends('front.layout')

@section('meta_data')
    {{--we but this in header for google seo--}}

@endsection('meta_data')


@section('slider')

@endsection('slider')

@section('content')
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h2 class="text-center"> الاجهزة المتوفرة في السوق السورية</h2>
            </div>
            <hr class="display-4 padding"/>
        </div>
    </div>

    <!--- Cards -->
    <div class="container-fluid padding" >
        <div id="product_list_mobile">
            @include('front.product')
        </div>
    </div>
@endsection('content')