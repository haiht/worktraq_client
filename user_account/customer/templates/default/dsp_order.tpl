<script src="[@URL]lib/js/jquery.tooltip.v.1.1.js"></script>
<script>
    $(document).ready(function(){
        $(".with-tooltip").simpletooltip();
        $("input[name=order_create_new]").click(function(){
            if (confirm('Are you sure you want to create a new order? \n' +
                                 'After creating a new order, you can add items to your order from the Catalogue! \n '
                                 +'Create a new order?'
                   ))
            {
                var url = '[@URL]/catalogue/order';
                $(location).attr('href',url);
                return false;
            }
        });
        $("input[id=btn_search_order]").click(function(){
            if($("div#order_search_form").is(":visible")==false)
                $("div#order_search_form").removeClass('hidden');
            else
                $("div#order_search_form").addClass('hidden');
        });
        $('.td_4').find('.table_ac1').each(function(){
            $(this).find('select').change(function(event){
                var valueSelect = $(this).find('option:selected').val();
                var order = $(this).attr('data-order-id');
                switch(valueSelect){
                    case 'delete':
                         if(confirm("Do you want to delete this order ?")){
                             if(order>=0) document.location = '[@URL]'+ 'order/'+order+'/delete';

                              /*
                              if(confirm("Do you want to delete this order ?")){
                              $.ajax({
                              url	:	'[@URL]'+ 'order/' + order + '/delete' ,
                              type	:	'POST',
                              data	:	{txt_order_id:order, txt_session_id:'[@SESSION_ID]'},
                              beforeSend: function(){
                              },
                              success	: function(data, type){
                              },
                              error : function(err){
                              }
                              });
                              }
                              */
                         }

                        break;
                    case 'edit':
                        if(!isNaN(order)){
                            if(order>0)
                                document.location = '[@URL]'+'order/'+order+'/edit';
                            else
                                document.location = '[@URL]'+'order/create';
                        }
                        break;
                    case 'view':
                        if(!isNaN(order)){
                            if(order>0) document.location = '[@URL]'+'order/'+order+'/view';
                        }
                        break;
                    case 'reorder':
                        if(!isNaN(order)){
                            if(order>0) document.location = '[@URL]'+'order/'+order+'/reorder';
                        }else{
                            $(this).find('option').eq(0).attr('selected', 'selected');
                        }
                        break;
                }
            });
        });
    });
</script>
<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]order" >ORDER</a>
</div>
</div>
</div>
<div class="content">
    <div class="title_r">order History</div>
    <div class="clear_btn float_right" [@STYLE]>
    <form method="post">
        <input type="button" class="btn_1" value="Search Order" name="btn_search_order" id="btn_search_order" />
            <input type="button" class="btn_1" value="Create New Order" name="order_create_new" />
        </form>
    </div>
    [@FORM_SEARCH]
    <div class="clear">
    </div>
    <div class="table">
        <div class="td_1">
            <div class="table_no float_left">No</div>
            <div class="table_date float_left">Date</div>
            <div class="table_po float_left txt_center" >PO Number</div>
            <div class="table_lo float_left txt_center"  >Location Name</div>
            <div class="table_to float_left txt_center">Total ($)</div>
            <div class="table_sta float_left txt_center">Status</div>
            <div class="table_ac float_left">Action</div>
        </div>
        [@ORDER_ITEM_LIST]
    </div>
    <div class="device_page" [@STYLE]>
        [@ORDER_PAGING]
    </div>
</div>
<div class="popup popup-confirm hidden" >
    <a href="#" title="Close" class="btn-close close-popup">X</a>
    <div class="confirm-message"><span class="confirm-text">Do you want to delete?</span></div>
    <div class="confirm-buttons"><button class="btn btn-primary" style="margin-left: 0px;">Ok</button><button class="btn btn-danger close-popup" style="margin-left: 5px;">Cancel</button></div>
</div>