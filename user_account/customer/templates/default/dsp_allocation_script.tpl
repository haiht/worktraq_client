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
                else{
                    alert(pos);
                }
            }
            else{
                alert("please choose a location");
            }
        });

        $("#btn_save_allocation").click(function(){
            allocation_order(product, order, order_item,loc);
        });

    });
</script>
<script type="text/javascript">
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

function add_row_table_new(pos,loc)
{
    var remain = $('span#location_quanlity').html();
    remain = parseInt(remain,10);
    if(remain<=0)
    {
        alert("there are no item left to ship");
        return false;
    }
    var location_id = loc[pos].location_id;
    var location_name = loc[pos].location_name;
    var location_number = loc[pos].location_number;

    var quantity = loc[pos].quantity;
    if(quantity==0) quantity = 1;
    loc[pos].quantity = quantity;

    var c1 = document.createElement('div');

    var ck =  document.createElement('input');
    ck.type ='checkbox';

    var table_name = remain%2==0?'td_2':'td_3';
    var $tr = $('<div class='+table_name+'></div>');
    var $c2 = $('<div class="table_yourpro float_left">'+location_number+'</div>');
    var $c3 = $('<div class="table_quali1 float_left">'+location_name+'</div>');

    $tr.append($c2);
    $tr.append($c3);

    var $d1 = $('<div class="table_unitprice float_left"></div>');
    var $d11 = $('<div class="dent float_right"></div>');

    var $b1 = $('<input />',
            {
                type:'image',
                src:'[@URL_TEMPLATE]/images/up.jpg',
                style:"display:'block';cursor:'pointer';width:'12px';height:'10px'; margin-top:2px; ",
                                id:'btn_up',
                click:function(){
                    var val=$(this).parent().parent().parent().parent().find('input[type="text"]').val();
                    val = parseInt(val, 10);
                    var s_location_id=$(this).parent().parent().parent().parent().find('input[type="text"]').attr('data-location');
                    var p = find_location(s_location_id,loc);
                    if(p>=0 && val>0){
                        var c_remain = $('span#location_quanlity').html();
                        c_remain = parseInt(c_remain,10);
                        if(!isNaN(c_remain) && c_remain>0){
                            val = val + 1;
                            c_remain--;
                            $(this).parent().parent().parent().parent().find('input[type="text"]').val(val);
                            loc[p].quantity = val;
                            $('span#location_quanlity').html(c_remain);
                        }
                    }
                }
            }
    );
    var $b2 = $('<input />',
            {
                type:'image',
                src:'[@URL_TEMPLATE]/images/down.jpg',
                style:"display:'block';cursor:'pointer';width:'12px';height:'10px'; margin-top:4px; ",
                id:'btn_down',
                click:function(){
                    var val=$(this).parent().parent().parent().parent().find('input[type="text"]').val();
                    val = parseInt(val, 10);
                    var s_location_id=$(this).parent().parent().parent().parent().find('input[type="text"]').attr('data-location');
                    var p = find_location(s_location_id,loc);
                    if(p>=0 && val>1){
                        var c_remain = $('span#location_quanlity').html();
                        c_remain = parseInt(c_remain,10);
                        val = val - 1;
                        c_remain++;
                        $(this).parent().parent().parent().parent().find('input[type="text"]').val(val);
                        loc[p].quantity = val;
                        $('span#location_quanlity').html(c_remain);
                    }
                }
            }
    );

    var $t = $('<input type="text" class="bg float_left location_id" data-location="'+location_id+'" readonly="readonly" value="'+quantity+'" />');
    var $d12 = $t;//$('<div class="allocation-text"></div>');
    $d11.append($d12);
    $d11.append($b1);
    $d11.append($b2);
    $d1.append($d11);
    remain-=quantity;
    $('span#location_quanlity').html(remain);

    var $c5 = $('<div class="table_extended float_left"></div>');
    var $b = $('<input />',
            {
                type:"button",
                value:'Delete',
                'data-location':location_id,
                'class':'btn_delete',
                id:'btn_delete',
                click:function(){
                    var s_location_id = $(this).attr('data-location');
                    var p = find_location(s_location_id,loc);
                    if(p>=0){
                        loc[p].status = 0;
                        setup_list_(loc);
                        $(this).parent().parent().remove();
                        var c_remain = $('span#location_quanlity').html();
                        c_remain = parseInt(c_remain, 10);
                        c_remain += loc[p].quantity;
                        $('span#location_quanlity').html(c_remain);
                        loc[p].quantity = 0;
                    }
                }
            }
    );

    $c5.append($b);
    $tr.append($d1);
    $tr.append($c5);
    var $clear = $("<p class='clear'></p>");

    $('div#table5').append($tr);
    $('div#table5').append($clear);

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
/*
 function readKey(key,data,type){
 if(data=='undefined' || data == null || data=="")
 return "";
 var k = "{"+key+"=";
	    var p = data.indexOf(k,0);
	    if(p==-1) return (type=="int")?-1:"";
	    var val = data.substring(p+k.length,data.length);
	    p = val.indexOf("}",0);
 val = (p>=0)?val.substring(0,p):val;
 switch(type){
 case "int":
 val = parseInt(val,10);
 return isNaN(val)?-1:val;
 break;
 default:
 return val;
 break;
 }
 }
 function replaceText(str,findText, replaceText){
 var found = true;
 var p=-1;
 do{
 p = str.indexOf(findText);
 if(p>=0)
 str = str.replace(findText, replaceText);
 else
 found = false;
 }while(found);
 return str;
 }
 */

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
                //$('table tr#tr_row').remove();
                product_id = location.product_id;
                $('span#product_quanlity').html(total);

                for(var i=0;i<allocation.length;i++){
                    location_id = allocation[i].location_id;
                    location_number = allocation[i].location_number;
                    location_name = allocation[i].location_name;
                    quantity = allocation[i].quantity;
                    loc[i] = new Location(location_id, location_name, location_number, quantity);
                }
                $('span#location_quanlity').html(total);

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
            alert("that bai");
        }
    });
    return loc;
}

function allocation_order(pid, oid, otid,loc)
{

    var total = $('span#product_quanlity').html();

    total = parseInt(total, 10);

    if(isNaN(total)) {
        alert("rong o total");
        return false;
    }

    var flag = true;
    var allocation = [];

    for(var i=0; i<loc.length;i++){
        if(loc[i].status==1){
            allocation.push(new Array(pid,loc[i].location_id, loc[i].quantity));
            total -= loc[i].quantity;
        }
    }
    flag = total==0;
    var ask = false;

    if(!flag){
        if(total>0){
            ask = confirm('Some quantity (exactly '+total+') has not allocated. Do you want to continue saving without allocating?');
            flag = ask;
        }else{
            alert("Remaining quantity to allocate is negative. This prevents saved. \nIf you don't want to change, please click 'Cancel' button");
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
                    document.location = '[@URL_REQUEST]';
                }
            },
            error : function(){
                alert("that bai o loar_order");
            }
        });
    }
    return flag;
}

</script>