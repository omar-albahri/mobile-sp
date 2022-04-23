<div class="row" >
<?php foreach ($models as $one){ ?>
<div class="col-xs-6 col-md-3 col-lg-3">
    <div class="mobile-product-parent " >
        <div class="card mobile-product-child">
            <img class="card-img-top" src="{{$one->image?asset('../storage/app/'. $one->image):asset('../storage/app/no-image.jpg')}}"/>
            <div class="card-body">
                <h4 class="card-title">{{$one->mobile_name}}
                </h4>
                <p class="card-text"> متوفر بصالات:   {{$one->Market->name}}</p>
                <p class="card-text"> السعر{{$one->price}} ل.س </p>
                {{--<a class="btn btn-outline-secondary" href="#"> عرض المواصفات</a>--}}
            </div>
        </div>
    </div>
</div>
<?php } ?>
</div>
<div class=" pagination justify-content-center pagination-info mt-2"> {{$models->withQueryString()->onEachSide(2)->links()}}</div>


