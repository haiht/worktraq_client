<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    var combo_data = <?php echo json_encode($arr_all_tracking);?>;
$(document).ready(function(){
    $("input#btn_submit_tb_create_dispatch").click(function(e){
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
        var data = [];
        $.each($('div#one_tracking table'), function(index, element){
            var kendo_date = $(this).find('input#txt_date_ship').data("kendoDateTimePicker");
            var date_value = kendo.toString(kendo_date.value(),'yyyy-MM-dd HH:mm:ss');
            var product = [];
            $.each($(this).find('input#txt_quantity'), function(index, element){
                var p = {
                    'allocation': $(this).attr('data-allocation'),
                    'product': $(this).attr('data-product'),
                    'quantity': $(this).val()
                };
                product.push(p);
            });
            var one = {
                'tracking_company': $(this).find('input#txt_tracking_company').val()
                ,'date_shipping': date_value
                ,'tracking_number': $(this).find('input#txt_tracking_number').val()
                ,'ship_status': $(this).find('select#ship_status').val()
                ,'tracking_url': $(this).find('input#txt_tracking_url').val()
                ,'allocation_id': $(this).find('input#txt_tmp_allocation_id').val()
                ,'location_id': $(this).find('input#txt_tmp_location_id').val()
                ,'location_name': $(this).find('input#txt_tmp_location_name').val()
                ,'location_address': $(this).find('input#txt_tmp_location_address').val()
                ,'allocation': product
            };
            data.push(one);
        });
        var send_data = JSON.stringify(data);
        $('input#txt_data_allocation').val(send_data);
        return true;
    });
    $.each($('div#one_tracking div p img'), function(index, element){
        $(this).click(function(e){
            if(confirm("Do you want to remove this tracking?")){
                $(this).parent().parent().parent().remove();
            }
        });
    });
    var validator = $('form#frm_tb_tracking_number').kendoValidator().data("kendoValidator");
    var tooltip = $("#tooltip").kendoTooltip({
        width: 120,
        position: "top"
    }).data("kendoTooltip");
    if(tooltip) tooltip.show();
    var data_grid = <?php echo json_encode($arr_grid_data);?>;
    $("#grid").kendoGrid({
        dataSource: {
            data: data_grid,
            pageSize: 50
        },
        height:400,
        columns: [
            {field:"row_order", title:"&nbsp;", width:"20px", template:'<span style="float: right">#= row_order#</span>'},
            {field:"location_address", title:"Location Address", width:"120px", encoded: false},
            {field:"product_name", title:"Product", width:"120px", encoded: false},
            {field:"quantity", title:"Quantity", width:"50px", type: "int",template:'<span style="float: right">#= kendo.toString(quantity, "n0")#</span>'},
            {field:"shipper", title:"Shipper", width:"50px"},
            {field:"tracking_number", title:"Tracking", width:"50px"},
            {field:"tracking_url", title:"Tracking URL", width:"120px", encoded: false},
            {field:"ship_status", title:"Status", width:"50px"},
            {field:"date_shipping", title:"Date Shipping", width:"80px", template:'<span style="float:right">#= date_shipping#</span>'}
        ]
    });
    var tab_strip = $("#data_single_tab").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");
});
</script>
<div id="div_body">
<div id="div_splitter_content" style="height: 100%; width: 100%;">
<div id="div_left_pane">
    <div class="pane-content">
        <div id="div_treeview"></div>
    </div>
</div>
<div id="div_right_pane">
<div class="pane-content">
<div id="div_title" class="k-block k-widget">
    <h3>Create Dispatch<?php ?></h3>
</div>
<div id="div_quick">
    <div id="div_quick_search">
        &nbsp;
    </div>
    <div id="div_select"><!--
        <form id="frm_company_id" method="post">
            Company: <select id="txt_company_id" name="txt_company_id">
                <option value="0" selected="selected">-------</option>
                <?php
//                /echo $v_dsp_company_option;
                ?>
            </select>
        </form>
    --></div>
</div>
<script type="text/x-kendo-tmpl" id="dropdownTemplate">
    # if(tracking_id>0){#<h3><strong>#= tracking_name #</strong></h3>Website: #= website # <br />Phone: #= phone # Email: #= email # #}else{# <h3><strong>--------</strong></h3> #}#
</script>
<form id="frm_tb_tracking_number" action="<?php echo URL.$v_admin_key;?>/<?php echo isset($v_order_id)?$v_order_id:'0';?>/tracking" method="POST">
<div id="data_single_tab">
    <ul>
        <li class="k-state-active">Dispatch</li>
        <li>Locations</li>
    </ul>

    <div class="dispatch div_details">
        <input type="hidden" name="txt_order_id" id="txt_order_id" value="<?php echo $v_order_id; ?>" />
        <input type="hidden" name="txt_list_allocation" id="txt_list_allocation" value="<?php echo $v_tmp_list_allocation;?>" >
        <input type="hidden" name="txt_company_id" id="txt_company_id" value="<?php echo $v_company_id; ?>" />
        <input type="hidden" name="txt_location_from" id="txt_location_from" value="<?php echo $v_location_from; ?>" />
        <input type="hidden" name="txt_data_allocation" id="txt_data_allocation" value="" />
        <?php
        foreach($arr_tmp_location as $v_location_id=>$arr ){
            $v_date_shipping = strtotime($arr['date_shipping']);
            $v_date_shipping = $v_date_shipping?date('d-M-Y H:i:s', $v_date_shipping):'';
            ?>
            <div id="one_tracking">
            <div class="k-block k-widget" style="margin-top:5px">
                <p style="float: left; width: 30px; ; padding: 5px"><img src="<?php echo URL;?>images/icons/delete.png" style="cursor: pointer;" /></p><p style="margin-left: 40px"></p> <strong>To: <?php echo $arr['location_name'].' (' .$arr['location_address'].')' ; ?></strong></p>
            </div>
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr  valign="top" style="display:none">
                    <th colspan="4">
                        <input type="hidden" name="txt_tmp_location_id" id="txt_tmp_location_id" value="<?php echo $arr['location_id'];?>" />
                        <input type="hidden" name="txt_tmp_allocation_id" id="txt_tmp_allocation_id" value="<?php echo $arr['allocation_id'];?>" />
                        <input type="hidden" name="txt_tmp_location_name" id="txt_tmp_location_name" value="<?php echo $arr['location_name'];?>" />
                        <input type="hidden" name="txt_tmp_location_address" id="txt_tmp_location_address" value="<?php echo $arr['location_address'];?>" />
                    </th>
                </tr>
                <tr  valign="middle">
                    <td align="right" width="150">Shipping Company </td>
                    <td >
                        <select id="txt_select_tracking_company" name="txt_select_tracking_company_<?php echo $arr['location_id'];?>" required data-required-msg="Please select Tracking Company">

                        </select>
                        <span class="k-invalid-msg" data-for="time"></span>
                        <input type="hidden" class="k-textbox" id="txt_tracking_company" name="txt_tracking_company_<?php echo $arr['location_id'];?>" value="<?php echo $arr['tracking_company'];?>" />
                    </td>
                    <td align="right" width="150">Date Shipping</td>
                    <td><input name="txt_date_ship_<?php echo $arr['location_id'];?>" size="20" id="txt_date_ship" value="<?php echo $v_date_shipping;?>" />
                    </td>
                </tr>
                <tr>
                    <td align="right">Tracking Number</td>
                    <td><input type="text" class="k-textbox" id="txt_tracking_number" name="txt_tracking_number_<?php echo $arr['location_id'];?>" value="<?php echo $arr['tracking_number']; ?>" required validationMessage="Please input Tracking Number" />
                    <td align="right">Ship Status</td>
                    <td>
                        <select name="ship_status_<?php echo $arr['location_id'];?>" id="ship_status">
                            <?php echo $cls_settings->draw_option_by_id('ship_status',0,$arr['ship_status']); ?>
                        </select>
                        <script type="text/javascript">
                            $(document).ready(function(e) {

                                var combo_<?php echo $arr['location_id'];?> = $('select[name="txt_select_tracking_company_<?php echo $arr['location_id'];?>"]').width(200).kendoDropDownList({
                                    dataSource:combo_data,
                                    dataTextField: "tracking_name",
                                    dataValueField:"tracking_id",
                                    //template:'<h3>${data.tracking_name}</h3>Website: ${data.website}<br />Phone: ${data.phone}<br />Email: ${data.email}'
                                    template:kendo.template($("#dropdownTemplate").html())
                                }).data("kendoDropDownList");
                                combo_<?php echo $arr['location_id'];?>.value(<?php echo $arr['tracking_id']>0?$arr['tracking_id']:'';?>);

                                $('input[name="txt_date_ship_<?php echo $arr['location_id'];?>"]').kendoDateTimePicker({
                                    format: 'dd-MMM-yyyy HH:mm:ss'
                                });
                                $('input[name="txt_date_ship_<?php echo $arr['location_id'];?>"]').prop("readonly", true);
                                $('select[name="ship_status_<?php echo $arr['location_id'];?>"]').width(150).kendoDropDownList();
                            });
                        </script>
                    </td>
                </tr>
                <tr>
                    <td align="right">Tracking URL</td>
                    <td colspan="3"><input type="url" class="text_css k-textbox" id="txt_tracking_url" name="txt_tracking_url_<?php echo $arr['location_id'];?>" value="<?php echo $arr['tracking_url']; ?>" required data-required-msg="Please input Tracking URL" data-url-msg="Invalid Tracking URL" /></td>

                </tr>
                <tr>
                    <td align="right">Product's Detail</td>
                    <td colspan="3">
                        <?php
                        $arr_product = $arr['product'];
                        for($k=0; $k<count($arr_product);$k++){
                            $v_quantity = $arr_product[$k]['quantity'];
                            $v_product = $arr_product[$k]['product_id'];
                            $v_allocation = $arr_product[$k]['allocation'];
                            $v_shipped_quantity = $arr_product[$k]['shipped_quantity'];
                            $v_max = $v_quantity - $v_shipped_quantity;
                        ?>
                            <p style="clear: both; border-bottom: inherit">
                                <span id="sp_product_action" style="width: 30px"><img src="<?php echo URL;?>images/icons/delete.png" style="cursor: pointer;" /></span>
                                <span style="width: 150px; clear: both"><?php echo $arr_product[$k]['product_name'];?></span>
                                <span style="margin-left: 205px"> <input id="txt_quantity" type="number" value="<?php echo $v_max;?>" min="1" max="<?php echo $v_max;?>" step="1" data-location="<?php echo $arr['location_id'];?>" data-product="<?php echo $v_product;?>" data-allocation="<?php echo $v_allocation;?>" />
                                </span>
                                <script type="text/javascript">
                                    $(document).ready(function(e){
                                       $('input[data-location="<?php echo $arr['location_id'];?>"][data-product="<?php echo $v_product;?>"][data-allocation="<?php echo $v_allocation;?>"]').kendoNumericTextBox({
                                           format:"n0"
                                       });
                                    });
                                </script>
                            </p>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            </table>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="location div_details">
        <div id="grid"></div>

    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $.each($('span#sp_product_action img'), function(index, element){
        $(this).click(function(e){
            if(confirm('Do you want to remove this product from the current dispatch?')){
                var len = $(this).closest('td').find('p').length;
                var $parent = $(this).closest('div');
                $(this).closest('p').remove();
                if(len==1) $parent.remove();
            }
        });
    });
    $.each($('select#txt_select_tracking_company'), function(index, element){
       $(this).change(function(){
           var val = $(this).val();
           val = parseInt(val, 10);
           if(isNaN(val) || val<0) val=0;
           var tracking = '';
           var url = '';
           var i= 0, found = false;
           while(i<combo_data.length && !found){
               if(val==combo_data[i].tracking_id){
                   tracking = combo_data[i].tracking_name;
                   url = combo_data[i].tracking_url;
                   found = true;
               }
               i++;
           }
           $(this).closest('td').find('input#txt_tracking_company').val(tracking);
           $(this).closest('table').find('input#txt_tracking_url').val(url);
       });
    });
});
$('select#txt_select_tracking_company')
</script>
<?php //if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
    <?php if(isset($v_error_message) && $v_error_message!=''){?>
        <div class="k-block k-widget k-error-colored div_errors">
            <?php echo $v_error_message;?>
        </div>
    <?php }?>
    <div class="k-block k-widget div_buttons">
        <input type="submit" id="btn_submit_tb_create_dispatch" name="btn_submit_tb_create_dispatch" value="Create Dispatch" class="k-button button_css" />
    </div>
<?php //}?>

</form>
</div>
</div>
</div>
</div>