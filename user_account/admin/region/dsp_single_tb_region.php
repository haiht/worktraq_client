<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
	$("input#btn_submit_tb_region").click(function(e){
        var company_id = $('input#txt_company_id').val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id)) company_id = 0;
        if(company_id<=0){
            e.preventDefault();
            alert('Please select Company first!');
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            return false;
        }
        var location = [];
        $.each(grid_region_location.dataSource.data(), function(){
            if(this.location_region==1){
                location.push(this.location_id);
            }
        });
        $('input#txt_list_location').val(JSON.stringify(location));
		return true;
	});

    var combo_region_contact = $('select#txt_region_contact').width(300).kendoComboBox({
        filter:"startswith",
        dataValueField:"contact_id",
        dataTextField:'contact_name',
        template: '<h3>#= contact_name #</h3>' +
            '<p>#= contact_info #</p>',
        dataSource: {
            transport: {
                read: {
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type:"POST",
                    data:{txt_json_type:'load_contact', txt_company_id: <?php echo $v_company_id;?>}
                },
                type: "json"
            }
        }

    }).data("kendoComboBox");
    combo_region_contact.value(<?php echo $v_region_contact;?>);

    $('select#txt_region_contact').change(function(e){
        var contact_id = $(this).val();
        contact_id = parseInt(contact_id, 10);
        if(isNaN(contact_id)) contact_id = 0;

        $('input#txt_hidden_region_contact').val(contact_id>0?'Y':'');
        validator.validate();
    });

    /*
    var region_location = <?php //echo json_encode($arr_all_region_location);?>;
    var region_location_data = new kendo.data.DataSource({
        data: region_location,
        pageSize: region_location.length
    });
    region_location_data.read();
    */
    var page_size = 20;
    var grid_region_location = $("#location_grid").kendoGrid({
        //dataSource: region_location_data,

        dataSource: {
            transport: {
                read: {
                    //dataType: "jsonp",
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type: 'POST',
                    complete: function(xhr, textStatus){
                        if(textStatus=='success'){
                            <?php if($v_region_id>0){?>
                            grid_region_location.dataSource.pageSize(page_size);
                            <?php }?>
                            if(grid_height){
                                $('div.k-grid-content').css('height', grid_height);
                            }
                            grid_region_location.tbody.find('tr').find('td:last').delegate('#chk_one_location_region', 'click', function(){
                                var chk = $(this).prop("checked");
                                var location = $(this).attr('data-location');
                                //location = parseInt(location, 10);
                                $.each(grid_region_location.dataSource.view(), function(){
                                    if(this.location_id==location){
                                        this.location_region = chk?1:0;
                                    }
                                });

                            });
                        }
                    },
                    data: {txt_company_id: <?php echo $v_company_id;?>,txt_region_id: <?php echo $v_region_id;?>, txt_json_type:'load_location'}
                }
            },
            schema:{
                data: "location"
                ,total: function(data){
                    page_size = data.total_rows;
                    return data.total_rows;
                }
            },
            type:"json"
            ,pageSize: page_size
        },

        height: 310,
        scrollable: true,
        sortable: false,
        filterable: true,
        pageable:true,
        columns: [
            {field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false,filterable: false, template: '<span style="float:right">#= row_order #</span>'},
            {field: "location_number", title: "Loc. Number", type:"string", width:"50px", sortable: false},
            {field: "location_name", title: "Location Name", type:"string", width:"100px", sortable: false },
            {field: "location_type", title: "Location Type", type:"string", width:"60px", sortable: false },
            {field: "main_contact", title: "Main Contact", type:"string", width:"70px", sortable: false },
            {field: "location_banner", title: "Loc. Banner", type:"string", width:"50px", sortable: true,filterable: false},
            {field: "location_address", title: "Location Address", type:"string", width:"150px", sortable: false,filterable: false},
            {field: "location_region", title: "<label><input type='checkbox' id='chk_all_location_region' />Select All</label>", type:"int", width:"50px", sortable: false,filterable: false, template:'<p style="text-align: center; margin: 5px"><input type="checkbox" id="chk_one_location_region" name="chk_one_location_region" data-location="#= location_id #" #= location_region==1?checked="checked":"" # /></p>'}
        ]
    }).data("kendoGrid");
    var grid_height = $('#location_grid div.k-grid-content').css('height');


    var grid_region_log = $("#log_grid").kendoGrid({
        dataSource: {
            transport: {
                read: {
                    url: "<?php echo URL.$v_admin_key;?>/json",
                    type: 'POST',
                    complete: function(xhr, textStatus){
                        if(textStatus=='success'){
                            if(grid_log_height){
                                $('#log_grid div.k-grid-content').css('height', grid_log_height);
                            }
                        }
                    },
                    data: {txt_company_id: <?php echo $v_company_id;?>,txt_region_id: <?php echo $v_region_id;?>, txt_json_type:'load_location_log'}
                }
            },
            schema:{
                data: "location_log"
                ,total: function(data){
                    return data.total_rows;
                }
            },
            type:"json"
            ,pageSize: 20
        },

        height: 310,
        scrollable: true,
        sortable: false,
        filterable: true,
        pageable:true,
        columns: [
            {field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false,filterable: false, template: '<span style="float:right">#= row_order #</span>'},
            {field: "location_number", title: "Loc. Number", type:"string", width:"50px", sortable: false},
            {field: "location_name", title: "Location Name", type:"string", width:"100px", sortable: false },
            {field: "region_contact", title: "Region Contact", type:"string", width:"80px", sortable: false },
            {field: "open_date", title: "Open Time", type:"string", width:"60px", sortable: false, filterable: false, template:'<span style="float: right">#= open_date #</span>' },
            {field: "close_date", title: "Close Time", type:"string", width:"60px", sortable: false, filterable: false, template:'<span style="float: right">#= close_date #</span>' },
            {field: "complete", title: "Complete", type:"int", width:"50px", sortable: true,filterable: false, template:'<span style="float: right">#= complete==1?"Yes":"No" #</span>' }
        ]
    }).data("kendoGrid");
    var grid_log_height = $('#log_grid div.k-grid-content').css('height');

    $('input#chk_all_location_region').click(function(e){
        var chk = $(this).prop("checked");
        $.each(grid_region_location.dataSource.view(), function(){
            this.location_region = chk?1:0;
        });
        $.each($("input#chk_one_location_region"),function(){
            $(this).prop("checked", chk);
        });
    });

	var tab_strip = $("#data_single_tab").kendoTabStrip({
		animation:  {
			open: {
				effects: "fadeIn"
			}
		}
	}).data("kendoTabStrip");
    var tooltip = $("span.tooltips").kendoTooltip({
        filter:"a",
        width: 120,
        position: "top"
    }).data("kendoTooltip");

    $('input#txt_region_key').focusout(function(e){
        var key = $.trim($(this).val());
        if(key==''){
            $(this).val('');
            $('input#txt_hidden_region_key').val('N');
            validator.validate();
            return false;
        }
        var company_id = $('input#txt_company_id').val();
        var region_id = $('input#txt_region_id').val();
        $.ajax({
            url : '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id: '<?php echo session_id();?>', txt_ajax_type: 'check_region_key', txt_company_id: company_id, txt_region_id: region_id, txt_region_key:key},
            beforeSend: function(){
                $('span#sp_region_key').html('Checking...');
            },
            success: function(data, status){
                $('span#sp_region_key').html('');
                var ret = $.parseJSON(data);
                $('input#txt_hidden_region_key').val(ret.error==0?'Y':'');
                validator.validate();
            }
        });
    });
	var validator = $("div.information").kendoValidator().data("kendoValidator");
	var combo_company = $('select#txt_company_id').data('kendoComboBox');
	<?php if($v_company_id <= 0){;?>
	$('select#txt_company_id').change(function(e){
		var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id <0) company_id = 0;
        var region_id = $('input#txt_region_id').val();
        region_id = parseInt(region_id, 'int');
        var $this = $(this);
        $.ajax({
            url :   '<?php echo URL.$v_admin_key;?>/ajax',
            type:   'POST',
            data:   {txt_session_id:'<?php echo session_id();?>', txt_ajax_type: 'load_region_info', txt_company_id: company_id, txt_region_id: region_id},
            beforeSend: function(){
                combo_company.enable(false);
                $this.prop("disabled", true);
            },
            success: function(data, status){
                var ret = $.parseJSON(data);
                var contact_data = ret.contact;
                var location_data = ret.location;
                combo_region_contact.setDataSource(contact_data);
                combo_region_contact.value(0);
                grid_region_location.dataSource.data(location_data);
                grid_region_location.dataSource.pageSize(location_data.length);

                grid_region_location.tbody.find('tr').find('td:last').delegate('#chk_one_location_region', 'click', function(){
                    var chk = $(this).prop("checked");
                    var location = $(this).attr('data-location');
                    //location = parseInt(location, 10);
                    $.each(grid_region_location.dataSource.view(), function(){
                        if(this.location_id==location){
                            this.location_region = chk?1:0;
                        }
                    });

                });


                $('div.k-grid-content').css('height', grid_height);
                $('form#frm_tb_region').find('#txt_company_id').val(company_id);
                combo_company.enable();
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
                        <h3>Region<?php echo $v_region_id>0?': '.$v_region_name:'';?></h3>
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

<form id="frm_tb_region" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_region_id.'/edit';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_region_id" name="txt_region_id" value="<?php echo $v_region_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
<input type="hidden" id="txt_list_location" name="txt_list_location" value="" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Location</li>
                        <?php if($v_region_id>0){?>
                        <li>Log</li>
                        <?php }?>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width: 200px">Region Name</td>
		<td style="width: 1px">&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_region_name" name="txt_region_name" value="<?php echo $v_region_name;?>" required data-required-msg="Please input Region Name" /> <label id="lbl_region_name" class="k-required">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Region Key</td>
        <td>&nbsp;</td>
        <td align="left">
            <input class="k-textbox" size="50" type="text" id="txt_region_key" name="txt_region_key" value="<?php echo $v_region_key;?>" required data-required-msg="Please input Region Key" />
            <input type="hidden" id="txt_hiden_region_key" name="txt_hidden_region_key" value="<?php echo $v_region_key!=''?'Y':'N';?>" required data-required-msg="Duplicate Region Key" />
            <span id="sp_region_key"></span>
            <span class="tooltips"><a title="Region Key is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_region_name" class="k-required">(*)</label></td>
    </tr>

<tr align="right" valign="top">
		<td>Region Contact</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_region_contact" name="txt_region_contact">

            </select>
            <input type="hidden" id="txt_hidden_region_contact" name="txt_hidden_region_contact" value="<?php echo $v_region_contact>0?'Y':'';?>" required data-required-msg="Please select Region Contact" />
            <label id="lbl_region_contact" class="k-required">(*)</label>
            <input type="hidden" name="txt_old_region_contact" value="<?php echo $v_region_contact;?>" />
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left"><label><input type="checkbox" id="txt_status" name="txt_status" value="<?php echo $v_status;?>"<?php echo $v_status==0?' checked="checked"':'';?> /> Active?</label></td>
	</tr>
</table>
        </div>
        <div class="location div_details">
            <div id="location_grid"></div>
        </div>
        <div class="log div_details">
            <div id="log_grid"></div>
        </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_region" name="btn_submit_tb_region" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
