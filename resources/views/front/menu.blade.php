<nav class=" navbar navbar-expand-md navbar-light stick-top">
    <div class="container-fluid" dir="rtl">
        <a class="navbar-brand" href="#"><img src="{{asset('frontend/img/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" >
                <li class="nav-item active">
                    <a class="nav-link dropdown-item" href="{{ route('index') }}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item" href="#">شروحات تقنية</a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">الانواع المتوفرة</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link dropdown-item " id="Samsung" href="{{route('mobile_list.index',['category'=>'Samsung'])}}">سامسونغ</a></li>
                        <li><a class="nav-link dropdown-item " id="" href="{{route('mobile_list.index',['category'=>'Xiaomi'])}}">شاومي</a></li>
                        <li><a class="nav-link dropdown-item " id="" href="{{route('mobile_list.index',['category'=>'Apple'])}}">آيفون</a></li>
                        <li><a class="nav-link dropdown-item " id="" href="{{route('mobile_list.index',['category'=>'Infinix'])}}">انفينيكس</a></li>
                        <li><a class="nav-link dropdown-item " id="" href="{{route('mobile_list.index',['category'=>'Realme'])}}">ريلمي</a></li>
                        <li><a class="nav-link dropdown-item " href="{{route('mobile_list.index',['category'=>'Oppo'])}}">اوبو</a></li>
                        <li><a class="nav-link dropdown-item " href="{{route('mobile_list.index',['category'=>'Nokia'])}}">نوكيا</a></li>
                        <li><a class="nav-link dropdown-item " href="{{route('mobile_list.index',['category'=>'Huawei'])}}">هواوي</a></li>
                        <li><a class="nav-link dropdown-item " href="{{route('mobile_list.index',['category'=>'Tecno'])}}">تكنو</a></li>
                        <li><a class="nav-link dropdown-item " href="{{route('mobile_list.index',['category'=>'One Plus'])}}">ون بلاس</a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="nav-label">أسعار الأجهزة</span><span class="caret"></span></a>
                    <ul class="dropdown-menu"><li><a class="nav-link dropdown-item nav_ff" id="1" href="{{route('mobile_list.index',['market'=>1])}}">ايماتيل</a></li>
                        <li><a class="nav-link dropdown-item nav_ff" id="2" href="{{route('mobile_list.index',['market'=>2])}}">سماتيل</a></li>
                        <li><a class="nav-link dropdown-item nav_ff" id="3"  href="{{route('mobile_list.index',['market'=>3])}}">مابكو</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item" href="#">قطع واكسسوارات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item" href="#">تطبيقات مهمة</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item" href="{{route('about')}}">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-item" href="#">اتصل بنا</a>
                </li>
            </ul>
        </div>
    </div>
</nav>