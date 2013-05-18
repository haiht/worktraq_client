<script type="text/javascript" src="[@URL]/lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="[@URL]/lib/js/json-min.js"></script>
<script> 
    $(document).ready(function(){
        var product = $("#data-product-id").val();
        var order = $("#data-order-id").val();
        var order_item = $("#data-order-item-id").val();
        var loc = new Array();
        loc = load_allocation(product, order, order_item);
        $("#btn_caner").click(function(){
            window.location = '[@URL]'+'order/'+order+'/edit';
        });
        $('input#btn_right').click(function(e) {
            var $l = $('select#txt_all_locations option:selected');
            if($l.length==1)
            {
                var location_id = $('select#txt_all_locations option:selected').val();
                var pos = find_location(location_id,loc);
                if(pos>=0){
                    add_row_table_new(pos,loc);
                }
            }
            else{
                alert("Please choose a location");
            }
        });
        $("#btn_save_allocation").click(function(){
            allocation_order(product, order, order_item,loc);
        });


    });
</script>
<script type="text/javascript">
function keyPhone(e)
{
    var keyword=null;
    if(window.event){
        keyword=window.event.keyCode;
    }else{
        keyword= e.which; //NON IE;
    }
    if( (keyword >= 48 && keyword <=57) )
        if(keyword==8 || keyword==0)
            return 0;
        else
            return ;
    else
        return false;
}
function find_location(location_id,loc){
    var pos = -1;
    var i = 0;
    var val = location_id;
    val = parseInt(val,10);
    while(i<loc.length && pos<0){
        if(loc[i].location_id==location_id) pos = i;
        i++;
    }
    return pos;
}

function calculator_allocation(p_value,p_location_id){
    var v_total_products = $("span#product_quanlity").html();
    var v_item_was_allocation = 0;
    v_item_was_allocation =parseInt(v_item_was_allocation,10);
    p_value = parseInt(p_value,10);
    var v_reamning_item =  $("input#total_reamning_items").html();
    v_reamning_item =parseInt(v_reamning_item,10);
    if((v_reamning_item - p_value)<=-1){
        return -2;
    }
    $("input[rel=allocation]").each(function(){
        var v_items = $(this).val();
        v_items =  parseInt(v_items,10);
        v_item_was_allocation = v_item_was_allocation + v_items;
    });
    v_total_products  =parseInt(v_total_products,10);

    if(v_item_was_allocation > v_total_products)
        return -1;
    else
        return v_total_products - v_item_was_allocation;
}
function add_row_table_new(pos,loc)
{
    var remain = $('span#location_quanlity').html();
    remain = parseInt(remain,10);
    var location_id = loc[pos].location_id;
    var location_name = loc[pos].location_name;
    var location_number = loc[pos].location_number;
    var location_threshold = loc[pos].location_threshold;
    var location_threshold_over = loc[pos].location_threshold_over;

    var quantity = loc[pos].quantity;
    if(quantity==0) quantity = 0;
    loc[pos].quantity = quantity;

    var tr = document.createElement('div');
    var ck =  document.createElement('input');

    var table_name = (pos%2==0?'td_2':'td_3');
    var $tr = $('<div class='+table_name+'></div>');
    var $c2 = $('<div class="table_yourpro float_left">'+location_number+'</div>');
    var $c3 = $('<div class="table_quali1 float_left">'+location_name+'</div>');
    $tr.append($c2);
    $tr.append($c3);
    var $div_btn = $('<div class="table_unitprice float_left"></div>');
    var $input_show = $('<input type="text" rel="allocation"  class="quantity bg float_left" data-location="'+location_id+'"  value="'+quantity+ '" />');
    var $input_hidden = $('<input type="hidden" data-location="'+location_id+'" id="thrshold_location_'+location_id+'"  value="'+quantity+ '" />');
    $input_show.bind('keypress',function(e){
        return keyPhone(e);
    });
    $input_show.bind('keyup',function(){
        var p_value = $(this).val();
        p_value = parseInt(p_value,10);

        var v_total_products = $("span#product_quanlity").html();
        var v_item_was_allocation = 0;
        v_item_was_allocation =parseInt(v_item_was_allocation,10);

        var v_reamning_item =  $("input#total_reamning_items").html();
        v_reamning_item =parseInt(v_reamning_item,10);
        if((v_reamning_item - p_value)<=-1){
            alert("Please insert a number from 0 to " + v_reamning_item);
        }
        $("input[rel=allocation]").each(function(){
            var v_items = $(this).val();
            v_items =  parseInt(v_items,10);
            v_item_was_allocation = v_item_was_allocation + v_items;
        });
        v_total_products  =parseInt(v_total_products,10);
        if(v_item_was_allocation > v_total_products){
            if($("span#location_quanlity").html()==0)
                alert("There are no item left to ship");
            else
                alert("Please insert a number from 0 to " + $("span#location_quanlity").html());
            $(this).val(0);
            return false;
        }
        else{
            var v_product_in_reamning =  v_total_products - v_item_was_allocation;
            $("span#location_quanlity").html(v_product_in_reamning);
            if(v_product_in_reamning<0){
                alert("There are no item left to ship");
                $(this).val(0);
            }
            else{
                $("span#location_quanlity").html(v_product_in_reamning);
            }
        }
    });
    $div_btn.append($input_show);
    $div_btn.append($input_hidden);
    $tr.append($div_btn);
    var chk_thresold_over = 'disabled';
    if(location_threshold_over==1) var chk_thresold_over = 'checked';
    var $div_chk = $('<div class="table_allow2 float_left"></div>');
    var $chk = $('<input data-location="'+location_id+'" type="checkbox" '+ chk_thresold_over + ' value="1">');
    $div_chk.append($chk);
    $tr.append($div_chk);
    var $div_delete  = $('<div class="table_extended float_left"></div>');
    var $btn_delete = $('<input class="btn_delete" type="button" value="Delete" data-location="'+location_id+'">');
    $btn_delete.bind('click',function(){
        var s_location_id = $(this).attr('data-location');
        var p = find_location(s_location_id,loc);
        if(p>=0){
            $(this).parent().parent().remove();
            var c_remain = $('span#location_quanlity').html();
            c_remain = parseInt(c_remain, 10);
            c_remain += loc[p].quantity;
            $('span#location_quanlity').html(c_remain);
        }
    });
    $div_delete.append($btn_delete);
    $tr.append($div_delete);
    $('div.table5').append($tr);
    $('div.table5').append('<p class="clear"></p>');
    $('select#txt_all_locations option:selected').remove();
    loc[pos].status = 1;
}
function pad_left(str, len, char){
    var ret = '';
    var pad = 0;
    str+='';
    ret = str;
    if(str.length > len){
        //pad = str.length - len;
        //ret = str.substring(pad, str.length);
    }else{
        pad = len - str.length;
        for(var i=0; i<pad; i++)
            ret = char + ret;
    }
    return ret;
}
function create_location_text(location_name, location_number, len){
    return pad_left(location_number, len, '&nbsp;')+' | '+location_name;
}
function Location(location_id, location_name, location_number, quantity){
    var value = 0;
    value = location_id;
    value = parseInt(value, 10);
    if(isNaN(value) || value <0) value = 0;
    this.location_id = location_id;
    this.location_name = location_name;
    this.location_number = location_number;
    value = quantity;
    value = parseInt(value, 10);
    if(isNaN(value) || value <0) value = 0;
    this.quantity = quantity;
    this.status = quantity>0?1:0;
}

function setup_list_(obj){
    $('select#txt_all_locations option').remove();

    for(var i = 0; i<obj.length; i++){
        if(obj[i].status==1) continue;
        var $opt = $('<option asd value="'+obj[i].location_id+'">'+create_location_text(obj[i].location_name, obj[i].location_number, 8)+'</option>');
        $('select#txt_all_locations').append($opt);
    }
}

function load_allocation(pid, oid, otid){
    var loc = new Array();
    $.ajax({
        url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
        type	:	'POST',
        data	:	{txt_product_id: pid, txt_order_id:oid, txt_order_item_id:otid,
                            txt_session_id:'[@SESSION_ID]', txt_order_ajax:102},
        beforeSend: function(){

        },
        success	: function(data, type){
            var err= readKey('error', data, 'int');
            var msg = readKey('message', data);
            if(err==0){
                count_location = 0;
                msg = replaceText(msg,'&ldquo;',' { ');
                msg = replaceText(msg,'&rdquo;',' } ');

                var location = jQuery.parseJSON(msg);
                var total = location.product_quantity;
                var allocation = location.allocation;
                var location_id = 0;
                var location_number = 0;
                var location_name = '';
                var quantity = 0;
                var location_threshold = 0;
                var location_threshold_over = 0;
                var total_reamning_product = 0;
                var total_allocation = 0;
                product_id = location.product_id;

                for(var i=0;i<allocation.length;i++){
                    location_id = allocation[i].location_id;
                    location_number = allocation[i].location_number;
                    location_name = allocation[i].location_name;
                    quantity = allocation[i].quantity;
                    location_threshold = allocation[i].location_threshold;
                    location_threshold_over = allocation[i].location_threshold_over;
                    loc[i] = new Location(location_id, location_name, location_number, quantity,location_threshold,location_threshold_over);
                    total_allocation = total_allocation + quantity;
                }
                total_reamning_product = total - total_allocation;
                $('span#product_quanlity').html(total);
                $('span#location_quanlity').html(total_reamning_product);
                $('input#total_reamning_items').val(total_reamning_product);

                setup_list_(loc);
                for(var i=0; i<loc.length;i++){
                    if(loc[i].status==1)
                    {
                        var table_name = i%2==0?'td_2':'td_3';
                        add_row_table_new(i,loc);
                    }
                }
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert("Sorry, Error in loading allocation!..., please try agian.");
        }
    });
    return loc;
}

function allocation_order(pid, oid, otid,loc)
{
    var total = $('span#product_quanlity').html();
    total = parseInt(total, 10);
    if(isNaN(total)) {
        return false;
    }
    var flag = true;
    var allocation = [];

    $("input[rel=allocation]").each(function(){
        var location_id = $(this).attr("data-location");
        var quantity = $(this).val();
        quantity = parseInt(quantity,10);
        if(quantity > 0 || !isNaN(quantity) ){
            allocation.push(new Array(pid,location_id, quantity));
            total -= quantity;
        }
    });

    flag = total==0;
    var ask = false;
    if(!flag){
        if(total>0){
            ask = confirm('Some quantity (exactly '+total+') has not allocated. Do you want to continue saving without allocating?');
            flag = ask;
        }else{
            alert("Total remaining quantity to allocate is negative. This prevents saved. \nIf you don't want to change, please click 'Cancel' button");
        }
    }

    if(flag){
        $.ajax({
            url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
            type	:	'POST',
            data	:	{txt_product_id:pid, txt_order_id:oid, txt_order_item_id:otid, txt_session_id:'[@SESSION_ID]',
                             txt_allocation:YAHOO.lang.JSON.stringify(allocation),txt_order_ajax:103},
            beforeSend: function(){
            },
            success	: function(data, type){
                var err = readKey('error', data, 'int');
                var msg = readKey('message', data);
                if(err==0){
                    alert(msg);
                }
            }
        });
    }
    return flag;
}
</script>