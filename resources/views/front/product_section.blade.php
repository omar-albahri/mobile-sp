<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h2 class="text-center"> الاجهزة المتوفرة</h2>
        </div>
        <hr class="display-4 padding"/>
    </div>
</div>

<!--- Cards -->
<div class="container-fluid padding" >

    <ul class="nav nav-tabs nav-fill"  role="tablist"  id="tab-market">
        <li class="nav-item">
            <a class="nav-link  nav_ff" id="1" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false">ايماتيل</a>
        </li>
        <li class="nav-item" >
            <a class="nav-link nav_ff" id="2" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false">سماتيل</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav_ff" id="3" data-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false">مابكو</a>
        </li>
    </ul>
    <div id="product_list_category">
        @include('front.tab_category')
    </div>
    <div id="product_list_mobile">
        @include('front.product')
    </div>
</div>
