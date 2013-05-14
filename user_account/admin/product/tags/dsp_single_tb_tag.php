<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_tag").click(function(e){
		var company_id = $("input#txt_company_id").val();
		company_id = parseInt(company_id, 10);
        if(isNaN(company_id)||company_id<0) company_id=0;
        if(company_id==0){
            e.preventDefault();
            alert("Please select Company first!");
            combo_company.focus();
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
		return true;
	});
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
    var location_data = <?php echo json_encode($arr_all_location);?>;
    var combo_location = $('select#txt_location_id').width(200).kendoComboBox({
        dataSource: location_data,
        dataTextField: "location_name",
        dataValueField: "location_id"
    }).data("kendoComboBox");
    combo_location.value(<?php echo $v_location_id;?>);
    $('input#txt_tag_order').kendoNumericTextBox({
        format: "n0",
        step: 1
    });

	<?php if($v_company_id <= 0){;?>
	$('select#txt_company_id').change(function(e){
		var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id <0) company_id = 0;
        var $this = $(this);
        $.ajax({
            url     : '<?php echo URL.$v_admin_key;?>/ajax',
            type    :   'POST',
            data    :   {txt_session_id:'<?php echo session_id();?>', txt_company_id: company_id, txt_ajax_type: 'load_location'},
            beforeSend: function(){
                combo_company.enable(false);
                $this.prop("disabled", true);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var location_data = ret.location;
                    combo_location.setDataSource(location_data);
                    combo_location.value(0);
                    $('form#frm_tb_tag').find('#txt_company_id').val(company_id);
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
                        <h3>Tag<?php echo (isset($v_tag_id) && $v_tag_id>0)?': '.$v_tag_name:'';?></h3>
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

<form id="frm_tb_tag" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_tag_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_tag_id" name="txt_tag_id" value="<?php echo $v_tag_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
    <tr align="right" valign="top">
        <td style="width: 200px">Location</td>
        <td style="width: 1px">&nbsp;</td>
        <td align="left">
            <select id="txt_location_id" name="txt_location_id">

            </select>
        </td>
    </tr>
<tr align="right" valign="top">
		<td style="width: 200px">Tag Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="k-textbox" type="text" id="txt_tag_name" name="txt_tag_name" value="<?php echo $v_tag_name;?>" required validationMessage="Please input Tag Name" /> <label id="lbl_tag_name" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tag Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_tag_status" name="txt_tag_status"<?php echo $v_tag_status==0?' checked="checked"':'';?> /> Active?</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Tag Order</td>
		<td>&nbsp;</td>
		<td align="left"><input type="number" id="txt_tag_order" name="txt_tag_order" value="<?php echo $v_tag_order;?>" /></td>
	</tr>
</table>
                    </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_tag" name="btn_submit_tb_tag" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
