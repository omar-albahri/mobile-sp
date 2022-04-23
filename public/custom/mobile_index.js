$(document).on('click', 'a.nav_ff', function () {
    //get the category from market
    var id = $(this).attr('id');
     $.ajax({url: window.base_url+'/mobile/category?market='+id, success: function(data){
            $('#product_list_category').html(data);
        }});
     //get the product list based on category only
    $.ajax({url: window.base_url+'/mobile/product?market='+id, success: function(data){
            $('#product_list_mobile').html(data);
        }});
});

$(document).on('click', 'a.tab_product', function () {
    var market = $('#tab-market .active').attr('id');
    var type = $('#tab-cat .active').attr('id');
    console.log(market);
    console.log(type);

    if (type != ''){
        if (market != '') {
            $.ajax({url: window.base_url+'/mobile/product?category='+type+'&&market='+market, success: function(data){
                    $('#product_list_mobile').html(data);
                }});
        }else {
            $.ajax({url: window.base_url+'/mobile/product?category='+type, success: function(data){
                    $('#product_list_mobile').html(data);
                }});
        }
    }else {
        $.ajax({url: window.base_url+'/mobile/product?market='+market, success: function(data){
                $('#product_list_mobile').html(data);
            }});
    }
});
