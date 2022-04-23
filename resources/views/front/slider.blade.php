<!-- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('frontend/lib/img/background1.jpg') }}" />
            {{--<div class="carousel-caption">--}}
                {{--<h1 class="display-2">bootstrap</h1>--}}
                {{--<h3>Complete Website Layout</h3>--}}
                {{--<button type="button" class="btn btn-outline-light btn-lg">View Demo</button>--}}
                {{--<button type="button" class="btn btn-primary btn-lg">Get Started</button>--}}
            {{--</div>--}}
        </div>
        <div class="carousel-item">
            <img src="{{asset('frontend/lib/img/background2.jpg') }}" />
        </div>
        <div class="carousel-item">
            <img src="{{asset('frontend/lib/img/background3.jpg') }}" />
        </div>
    </div>
</div>