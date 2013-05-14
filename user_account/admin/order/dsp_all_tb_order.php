<?php if(!isset($v_sval)) die();?>
<script language="javascript">
    $(document).ready(function() {
        $("a[rel=changestatus]").fancybox({
            'showNavArrows'         : false,
            'width'                 : '65%',
            'height'                : '55%',
            'transitionIn'	        :	'elastic',
            'transitionOut'	        :	'elastic',
            'overlayShow'	        :	true,
            'type'                 : 'iframe'
        });
        $('img[rel=change_dps]').click(function(){
            var order_id = $(this).attr("data");
            $("#div_order_status_"+order_id).css('display','none');
            $("#sel_order_status_"+order_id).css('display','block');
        });
        $("select[rel=order_status]").change(function(){
            var order_id = $(this).attr("order_id");
            var order_stauts  =$(this).select("option:selected").val();

            if(order_stauts==0){
                alert("Select order status for order...")
                $(this).focus();
            }
            else
            {
                if(confirm("<?php echo $cls_tb_message->select_value('confirm_change_order_status'); ?>")){
                    $.ajax({
                        url:"<?php echo URL.$v_admin_key;?>/"+order_id+"/order_status/",
                        type:"POST",
                        data:{txt_order_id:order_id,txt_order_status:order_stauts},
                        beforeSend:function(){
                            $("#div_order_status_"+order_id).css('display','block');
                            $("#sel_order_status_"+order_id).css('display','none');
                            $("#div_order_status_"+order_id).html("Updating Order Status!....");
                        },
                        success:function(data){
                            var ret = $.parseJSON(data);
                            $("#div_order_status_"+order_id).html(ret.data);
                            $("div[class=msgbox_success]").css('display','block');
                            $("div[class=msgbox_success]").html(ret.message);
                            if(ret.error==4){
                                var v_td = $("#td_"+order_id).html();
                                var v_link = '<a href="<?php //echo URL.$v_admin_key;?>/' + order_id + '/shipping/">Shipping</a> |';
                                $("#td_"+order_id).html(v_link+v_td);
                            }
                        }
                    });
                }
            }
        });
    });

</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Order  </a> &gt &gt Order   </p>
<p class="highlightNavTitle"><span> Order   </span></p>
<p class="break"></p>
    <div class="msgbox_success" style="display: none"></div>
<p class="break"></p>

<div class="form">
    <form method="POST" >
        <table cellpadding="3" cellspacing="3" class="list_table" width="100%" border="0px">
            <tr>
                <td colspan="2">
                    <b>Search Order in database</b>
                </td>
            </tr>
            <tr>
                <td width="180px;">Company name</td>
                <td>
                    <select name="txt_company_id">
                        <option value="0" <?php echo ($v_search_company_id==0? 'selected' :''); ?>> -- Select -- </option>
                        <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_search_company_id); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Order Ref</td>
                <td><input type="text" name="txt_search_order_ref" value="<?php echo $v_search_order_ref; ?>" size="25">
                Order PO
                    <input type="text" name="txt_search_order_po" value="<?php echo $v_search_order_po; ?>" size="15">
                    Order Status
                    <select name="txt_search_order_status">
                        <option value="0" <?php ?>> -- Select -- </option>
                        <?php echo $cls_settings->draw_option_by_id('order_status',1,$v_search_order_status,array("5"));?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input name="btn_order_search" id="btn_order_search" type="submit" class="button" value="Search Order">
                    <input name="btn_order_cancel" id="btn_order_cancel" type="submit" class="button" value="Clear">
                </td>

            </tr>
        </table>
    </form>
</div>
<p class="break"></p>

<?php
echo $v_dsp_tb_order;
echo $v_dsp_paginition;
?>
<script type="text/javascript">
    $(document).ready(function(e){
        $('.confirm').live('click', function(){
            return confirm('<?php echo $cls_tb_message->select_value('confirm_delete'); ?>');
        });
    });
</script>
