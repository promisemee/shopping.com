// https://www.webslesson.info/2018/08/how-to-make-product-filter-in-php-using-ajax.html

$(document).ready(function(){

    function filter_data()
    {   //filter list
        var type = $('.type').text();
        var title = $('.title').text();
        var action = 'fetch_data';
        var sortby = $('.sortby:checked').val();
        var sub = get_filter('sub');
        var colour = get_filter('colour');
        $.ajax({
            url:"reload.php?"+type+"="+title,
            method:"POST",
            data:{action:action, sortby:sortby, sub:sub, colour:colour},
            success:function(data){
            	$(".album").html(data);
            }
        });
    }

    function deletecart($v){
        //delete from cart
        var action = 'deletecart';
        var ca_id = $v;
        $.ajax({
            url:"deleteCart.php",
            method:"POST",
            data:{action:action, ca_id:ca_id},
            success:function(data){
                $(".reloadcart").html(data);
            }
        });
    }

    function addcart(){
        var action = 'addcart';
        var q = $('.p-quantity').val();
        var p_id = $('#p-id').text();
        $.ajax({
            url:"addCart.php",
            method:"POST",
            data:{action:action, q:q, p_id:p_id},
            success:function(data){
                window.alert("Item Added");
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.sortby').click(function(){
        filter_data();
    });

    $('input[type="radio"]').click(function(){
        filter_data();
    });

    $('.filterselector').click(function(){
        filter_data();
    });

    function update_data()
    {

        $.ajax({
            url:"checkupdate.php",
            method:"POST",
            data:{action:action, sortby:sortby, sub:sub, colour:colour},
            success:function(data){
                $(document).html(data);
            }
        });
    }

    $('.filterselector').click(function(){
        filter_data();
    });

    $(document).on('click', '.addcart', function(){
        addcart();
    });

    $(document).on('click', '.addcart-notlogin', function(){
        window.alert("Please Login!");
    });

    $(document).on('click', '.deletecart', function(){
        var v= $(this).val();
        deletecart(v);
    });

    $('.count').prop('disabled', true);
            $(document).on('click','.plus',function(){
                $('.count').val(parseInt($('.count').val()) + 1 );
            });
            $(document).on('click','.minus',function(){
                $('.count').val(parseInt($('.count').val()) - 1 );
                    if ($('.count').val() == 0) {
                        $('.count').val(1);
                    }
                });


});