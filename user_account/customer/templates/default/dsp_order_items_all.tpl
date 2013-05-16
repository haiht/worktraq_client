<script>
    $(document).ready(function(e){
        var control_popup = false;
        $('.td_5').find('.select_edit').each(function(){
            $(this).find('select').change(function(event){
                var valueSelect = $(this).find('option:selected').val();
                var product = $(this).attr('data-product-id');
                var order = $(this).attr('data-order-id');
                var order_item = $(this).attr('data-order-item-id');
                var type = $(this).attr('date-order-type');
                var image_id = $(this).attr('data-image-id');
                image_id = parseInt(image_id, 10);
                if(isNaN(image_id) || image_id<0) image_id = 0;
                var image_url = $(this).attr('data-image-url');
                var that = this;
                product = parseInt(product,10);
                if(isNaN(product)||product<0) product = 0;
                order = parseInt(order, 10);
                if(isNaN(order)||order<0) order = 0;
                order_item = parseInt(order_item, 10);
                if(isNaN(order_item)||order_item<0) order_item = 0;
                switch(valueSelect){
                    case 'delete_item':
                            $('.popup-confirm').showPopup({
                                onHide: function(){
                                    //$('.td_5').find('.select_edit').find('select').find('option').eq(0).attr('selected', 'selected');
                                },
                                onConfirm:function(){
                                    var $parent = $(that).parents('div');
                                    control_popup = delete_item($parent, product, order, order_item);
                                }
                            });
                        break;
                    case 'edit_item':
                        window.location = 'item/'+order_item
                        break;
                    case 'allocation':
                        window.location = 'allocation/'+order_item+'/'+product+'/'
                        break;
                }
            });
        });
    });
</script>
<script>
    function delete_item($parent, pid, oid, otid){
        $.ajax({
            url	:   '[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
            type	:	'POST',
            data	:	{txt_product_id: pid, txt_order_id:oid, txt_order_item_id:otid, txt_session_id:'[@SESSION_ID]', txt_order_ajax:104},
            beforeSend: function(){
            },
            success	: function(data, type){
                alert("delete item success");
                window.location.reload();
            },
            error: function(xhr, status, error){
                alert("Error!" +'[@AJAX_LOAD_ORDER_ALLOCATION_URL]');
            }
        });
        return true;
    }
</script>

<div class="[@TABLE_CLASS] td_5">
    <div class="table_youritem float_left">
        <img src="[@PRODUCT_IMAGE]" width="98" />
    </div>
    <div class="table_name float_left">
        [@PRODUCT_MATERIAL]
    </div>
    <div class="table_Quantity float_left">
        [@PRODUCT_QUANTITY]
    </div>
    <div class="table_to float_left">
        [@PRODUCT_PRICE]
    </div>
    <div class="table_sta float_left">
        [@PRODUCT_AMOUNT]
    </div>
    <div class="table_ac float_left select_edit">
        <select  rel="act_order_item_id" class="text_color" data-order-id="[@ORDER_ID]" data-order-item-id="[@ORDER_ITEM_ID]" data-product-id="[@PRODUCT_ID]" date-order-type="order_edit" [@SELECT_DISABLED] >
        <option  value="" selected>Select...</option>
        [@ORDER_OPTION_ACTION]
        </select>
    </div>
</div>
<div class="clear"></div>