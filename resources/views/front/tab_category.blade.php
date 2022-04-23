<ul class="nav nav-pills nav-fill" id="tab-cat" >
    <?php foreach ($models2 as $one2){ ?>
    <li class="nav-item">
        <a class="nav-link tab_product" id="{{$one2->category}}" data-toggle="pill" href="#home" aria-expanded="true">{{$one2->category}}</a>
    </li>
    <?php } ?>
</ul>