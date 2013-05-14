<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_product_group").click(function(e){
		var company_id = $("input#txt_company_id").val();
		company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0){
            e.preventDefault();
            alert('Please select Company first!');
            combo_company.focus();
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }
        var send = [];
        var data = grid.dataSource.data();
        if(data){
            for(var i=0; i<data.length; i++){
                if(data[i].enable){
                    var one = {'lg_threshold_id':data[i].lg_threshold_id, 'group_id': data[i].group_id, 'location_id': data[i].location_id, 'threshold_value':data[i].threshold_value, 'threshold_note':data[i].threshold_note, 'overflow':data[i].overflow, 'enable': data[i].enable };
                    send.push(one);
                }
            }
        }
        send = JSON.stringify(send);
        $('input#txt_data_threshold').val(send);
		return true;
	});
    $('input#txt_product_group_order').kendoNumericTextBox({
        format:'n0',
        step:1
    });
    var product_group_data = <?php echo json_encode($arr_all_product_group);?>;
    var combo_product_group = $('select#txt_product_group_parent').kendoDropDownList({
        dataSource: product_group_data,
        dataValueField:"product_group_id",
        dataTextField:"product_group_name"
    }).data("kendoDropDownList");

    $('select#txt_filter').kendoDropDownList({
        change: filter_product
    });

    //var products_data = <?php //echo json_encode($arr_all_product);?>;
    var products = $("select#txt_products").kendoMultiSelect({
        dataTextField: "product_sku",
        dataValueField: "product_id",
        // define custom template
        itemTemplate: '<img src=\"${data.product_image}\" alt=\"${data.short_description}\" />' +
            '<h3>${ data.product_sku }</h3>' +
            '<p>${ data.short_description }</p>',
        tagTemplate:  '<img class="tag-image" src=\"${data.product_image}\" alt=\"${data.short_description}\" />' +
            '#: data.product_sku #',
        //dataSource: products_data,
        height: 300,
        dataSource: {
            transport: {
                read: {
                    //dataType: "jsonp",
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type: 'POST',
                    data: {txt_company_id: <?php echo $v_company_id;?>, txt_json_type:'load_product'}
                }
            },
            schema:{
                data: "tb_product"
            },
            type:"json"
        }
    }).data("kendoMultiSelect");

    products.value(<?php echo json_encode($arr_list_product);?>);
    products.wrapper.attr("id", "products-wrapper");
    var set_search = function (e) {
        if (e.type != "keypress" || kendo.keys.ENTER == e.keyCode) {
            e.preventDefault();
            products.search($("#txt_word").val());
        }
    };
    products.enable(<?php echo @$v_act=='E'?'true':'false';?>);
    function filter_product(){
        products.options.filter = $("#txt_filter").val();
    }
    $("#btn_find").click(set_search);
    $("#txt_word").keypress(set_search);

    var grid = $('#grid').kendoGrid({
        dataSource: {
            transport: {
                read: {
                    //dataType: "jsonp",
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type: 'POST',
                    complete: function(xhr, textStatus){
                        if(textStatus=='success'){
                            if(grid_height){
                                $('div.k-grid-content').css('height', grid_height);
                            }
                        }
                    },
                    data: {txt_company_id: <?php echo $v_company_id;?>,txt_product_group_id: <?php echo $v_product_group_id;?>, txt_json_type:'load_location_group_threshold'}
                }
            },
            schema:{
                data: "tb_location_group_threshold"
                ,total: function(data){
                    return data.total_rows;
                },
                model: {
                    id: "location_id",
                    fields: {
                        location_id: { editable: false, nullable: false },
                        row_order: { editable: false, type: "int" },
                        location_name: {editable:false, type:"string" },
                        location_number: { editable:false, type:"string" },
                        threshold_value: { type: "number", validation: { required: true, min: 0}},
                        threshold_note: { type: "string"},
                        overflow: { type: "boolean" },
                        enable: { type: "boolean" }
                    }
                }
            },
            type:"json",
            pageSize: 20
        },
        toolbar: [{name:"cancel", text:"Cancel your changes"}],
        height: 310,
        scrollable: true,
        sortable: false,
        filterable: true,
        pageable:{
            input: true,
            pageSizes: [10, 20, 30, 40, 50],
            numeric: false
        },
        editable:<?php echo @$v_act=='E'?'true':'false'?>,
        columns: [
            {field: "row_order", title: "&nbsp;", type:"int", width:"20px", filterable: false, editable:false, template: '<span style="float:right;">#= row_order #</span>'},
            {field: "location_name", title: "Location Name", type:"string", width:"100px", editable:false },
            {field: "location_number", title: "Loc. Number", type:"string", width:"50px", editable:false },
            {field: "enable", title: "Enable", type:"boolean", width:"30px",filterable: false, template:'#= enable==1?"Yes":"No"#'},
            {field: "threshold_value", title: "Threshold", type:"number", width:"50px",filterable: false,validation: {min:0, step:1}},
            {field: "overflow", title: "Overflow", type:"boolean", width:"50px",filterable: false, template:'#= overflow==1?"On":"Off"#'},
            {field: "threshold_note", title: "Note", type:"string", width:"100px",filterable: false}
        ]
    }).data("kendoGrid");
    var grid_height = $('div.k-grid-content').css('height');
	var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
	var tooltip = $("#tooltip").kendoTooltip({
		width: 120,
		position: "top"
	}).data("kendoTooltip");
	if(tooltip) tooltip.show();
	var validator = $("div.information").kendoValidator().data("kendoValidator");
	var combo_company = $('select#txt_company_id').data('kendoComboBox');
	<?php if($v_company_id <= 0){;?>
	$('select#txt_company_id').change(function(e){
		var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id <0) company_id = 0;
        var $this = $(this);
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : 'POST',
            data    : {txt_session_id: '<?php echo session_id();?>', txt_company_id: company_id, txt_ajax_type: 'load_threshold_info'},
            beforeSend: function(){
                $this.prop("disabled", true);
                combo_company.enable(false);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var products_data = ret.product;
                    products.setDataSource(products_data);
                    products.value([]);
                    var groups_data = ret.group;
                    combo_product_group.setDataSource(groups_data);
                    combo_product_group.value(0);
                    var thresholds_data = ret.threshold;

                    grid.dataSource.data(thresholds_data);
                    grid.dataSource.total(thresholds_data.length);
                    $('div.k-grid-content').css('height', grid_height);
                    $('form#frm_tb_product_group').find('#txt_company_id').val(company_id);
                }
                combo_company.enable(true);
                $this.prop("disabled", false);
            }

        });
    });
	<?php }else{;?>
		combo_company.enable(false);
	<?php };?>
});
</script scoped>
<style>
    .tag-image {
        width: auto;
        height: 18px;
        margin-right: 5px;
        vertical-align: top;
    }
    #txt_products-list .k-item {
        overflow: hidden; /* clear floated images */
    }
    #txt_products-list img {
        -moz-box-shadow: 0 0 2px rgba(0,0,0,.4);
        -webkit-box-shadow: 0 0 2px rgba(0,0,0,.4);
        box-shadow: 0 0 2px rgba(0,0,0,.4);
        float: left;
        margin: 5px 20px 5px 0;
        width: 150px;
    }
    #txt_products-list h3 {
        margin: 30px 0 10px 0;
        font-size: 2em;
    }
    #txt_products-list p {
        margin: 0;
    }
</style>
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
                        <h3>Product Group<?php echo $v_product_group_id>0?': '.$v_product_group_name:'';?></h3>
                    </div>
                    <div id="div_quick">
                        <div id="div_quick_search">
                        &nbsp;
                        </div>
                        <div id="div_select">
                            <form id="frm_company_id" method="post">
                        Company: <select id="txt_company_id" name="txt_company_id">
                                    <option value="0" selected="selected">-------</option>
                                    <?php
                                    echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>

<form id="frm_tb_product_group" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_product_group_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_product_group_id" name="txt_product_group_id" value="<?php echo $v_product_group_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
<input type="hidden" id="txt_data_threshold" name="txt_data_threshold" value="" />

                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Product</li>
                        <li>Location Threshold</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Product Group Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_product_group_name" name="txt_product_group_name" value="<?php echo $v_product_group_name;?>" required validationMessage="Please input Product Group Name" /> <label id="lbl_product_group_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Product Group Order</td>
		<td>&nbsp;</td>
		<td align="left"><input type="number" id="txt_product_group_order" name="txt_product_group_order" value="<?php echo $v_product_group_order;?>" /></td>
	</tr>
<tr align="right" valign="top">
		<td>Product Group Parent</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_product_group_parent" name="txt_product_group_parent">
            </select>
        </td>
	</tr>
</table>
            </div>
            <div class="product div_details">
                <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                    <tr align="right" valign="top">
                        <td style="width: 200px">Filter</td>
                        <td style="width: 1px">&nbsp;</td>
                        <td align="left">
                            <select id="txt_filter">
                                <option value="startswith">Starts with</option>
                                <option value="contains">Contains</option>
                                <option value="eq">Equal</option>
                            </select>
                            <input id="txt_word" value="" class="k-textbox" />
                            <input type="button" id="btn_find" value="Find Product" class="k-button">
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Product</td>
                        <td>&nbsp;</td>
                        <td align="left">
                            <select id="txt_products" name="txt_products[]" multiple="multiple"data-placeholder="Select product...">

                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="threshold div_details">
                <h3>Directly edit on following columns: "Threshold", "Overflow" and "Note"</h3>
                <div id="grid"></div>
            </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_product_group" name="btn_submit_tb_product_group" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
