<?php if(!isset($v_sval)) die();?>
<?php echo js_tooltip(); ?>
<?php echo js_tabas();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/company/location'; ?>">  Location  </a> &gt&gt Insert - Update Location</p>
<p class="highlightNavTitle"><span> Insert - Update Location  </span></p>
<p class="break"></p>

<script type="text/javascript">
    $(document).ready(function(){
    $(".with-tooltip").simpletooltip();
    $('#tab-container').easytabs();

    var v_ship_address = <?php echo $v_chk_shipped_address ?>;
    if(v_ship_address==1)
        $('tr[rel=tab_shiped_address]').css('display', 'none');

    $("#txt_address_country").change(function(){
        var v_country_id = $("#txt_address_country").val();
        $.ajax({
                url: "<?php echo URL. $v_admin_key; ?>/"+v_country_id + "/province",
                data: {txt_country_id:v_country_id,txt_type:"mailling"},
                type : "POST",
                beforeSend : function() {
                    $("#td_province").html('Loading Province!.........');
                },
                success : function(data){
                    $("#td_province").html(data);
                }
        });
    });

    $("#txt_shipped_address_country").change(function(){
        var v_country_id = $("#txt_shipped_address_country").val();
        $.ajax({
            url: "<?php echo URL. $v_admin_key; ?>/"+v_country_id + "/province",
            data: {txt_country_id:v_country_id,txt_type:"shipping"},
            type : "POST",
            beforeSend : function() {
                $("#txt_shipped_address_province").html('Loading Province!.........');
            },
            success : function(data){
                $("#td_shipped_province").html(data);
            }
        });
    });


    $('input#chk_shipped_address').click(function(e) {
        var c = $(this).attr('checked')?true:false;
        if(c==false){
            $('tr[rel=tab_shiped_address]').css('display', '');
        }else{
            $('tr[rel=tab_shiped_address]').css('display', 'none');
        }
    });

    $('input#chk_closedate').click(function(e) {
        var c = $(this).attr('checked')?true:false;
        if(c==true){
            $('span#sp_closedate').css('display', '');
        }else{
            $('span#sp_closedate').css('display', 'none');
        }
    });

	$("form#frm_tb_location").submit(function(){
        if($("#txt_location_name").val()==0){
            alert("<?php echo $cls_tb_message->select_value('invalid_input_location_name'); ?>");
            $("#txt_location_name").addClass('invalid');
            $("#txt_location_name").focus();
            return false;
        }
        if($("#txt_location_phone").val()==''){
            alert("<?php echo $cls_tb_message->select_value('invalid_location_phone'); ?>");
            $("#txt_location_phone").addClass('invalid');
            $("#txt_location_phone").focus();
            return false;
        }
        if($("#txt_location_type").val()==0){
            alert("<?php echo $cls_tb_message->select_value('invalid_location_type'); ?>");
            $("#txt_location_type").addClass('invalid');
            $("#txt_location_type").focus();
            return false;
        }
        if($("#txt_address_line_1").val()==''){
            alert("<?php echo $cls_tb_message->select_value('invalid_input_address_line_1'); ?>");
            $("#txt_address_line_1").addClass('invalid');
            $("#txt_address_line_1").focus();
            return false;
        }
        if($("#txt_address_city").val()==0){
            alert("<?php echo $cls_tb_message->select_value('invalid_input_address_city'); ?>");
            $("#txt_address_city").addClass('invalid');
            $("#txt_address_city").focus();
            return false;
        }
        if($("#txt_address_postal").val()==""){
            alert("<?php echo $cls_tb_message->select_value('invalid_input_address_postal'); ?>");
            $("#txt_address_postal").addClass('invalid');
            $("#txt_address_postal").focus();
            return false;
        }
        if($("#txt_location_number").val()==""){
            alert("<?php echo $cls_tb_message->select_value('invalid_input_location_number'); ?>");
            $("#txt_location_number").addClass('invalid');
            $("#txt_location_number").focus();
            return false;
        }
        if($("txt_error").val()==2){
            alert("<?php echo $cls_tb_message->select_value('exists_location_number'); ?>");
            $("#txt_location_number").addClass('invalid');
            $("#txt_location_number").focus();
            return false;
        }
        return true;

	});
    $('input#txt_open_date').datepicker({
        dateFormat: 'dd-M-yy',
        changeMonth:true,
        changeYear:true,
        showOn:'both',
        buttonImage:"http://worktraq.anvy.net/images/_calendar.gif",
        buttonImageOnly:true
    });
    $('input#txt_close_date').datepicker({
        dateFormat: 'dd-M-yy',
        changeMonth:true,
        changeYear:true,
        showOn:'both',
        buttonImage:"http://worktraq.anvy.net/images/_calendar.gif",
        buttonImageOnly:true
    });
    $('input#txt_location_number').focusout(function(){
        var v_old_location_number = <?php echo ($v_location_number!=''?$v_location_number:0);  ?>;
        var v_company_id = <?php echo $v_company_id ?>;
        if(v_company_id==0) v_company_id = $('input#txt_company_id').val();

        var v_location_number = $('input#txt_location_number').val();
        v_location_number = parseInt(v_location_number,10);
        if(!isNaN(v_location_number) && v_location_number!=0)
        {
            if(v_old_location_number!=v_location_number)
            {
                $.ajax({
                    url	: '<?php echo URL.$v_admin_key.'/check';?>',
                    type	: 'POST',
                    data	:{txt_location_number:v_location_number,txt_company_id:v_company_id},
                    beforeSend: function(){
                        $('#sp_location_number').removeClass();
                        $('#sp_location_number').html('Checking!....');
                    },
                    success: function(data, type){
                        var ret = $.parseJSON(data);
                        $('#sp_location_number').html(ret.message);
                        if(ret.error==2)
                            $('#sp_location_number').addClass('error');
                        else
                            $('#sp_location_number').addClass('success');

                        $('#txt_error').val(ret.error);
                    }
                });
            }
        }
    });
});
</script>

<?php if(isset($_REQUEST['txt_error'])){ ?>
<div class="msgbox_error">
    <?php echo (isset($_SESSION['error_location']) ? $_SESSION['error_location'] : '' );  ?>
</div>
<?php } ?>

<form id="frm_tb_location" action="<?php echo URL.$v_admin_key.'/'.$v_location_id.'/update';?>" method="POST">
    <input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>">
    <input type="hidden" id="txt_error" name="txt_error" value="<?php echo $v_error;?>">
    <input type="hidden" id="txt_page" name="txt_page" value="<?php echo $v_page;?>">
    <input type="hidden" id="txt_check_location_number" name="txt_check_location_number" value="<?php echo $v_check_location_number;?>">
    <input class="" size="50" type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />
    <div id="tab-container" class='tab-container'>
        <ul class='etabs'>
            <li class='tab'><a href="#tab_infomation">Infomation </a></li>
            <li class='tab'><a href="#tab_address">Mailing Address </a></li>
            <li class='tab'><a href="#tab_shiped_address">Shipping Address</a></li>
            <li class='tab'><a href="#tab_other">Other</a></li>
        </ul>
        <div class='panel-container'>
            <div id="tab_infomation">
                <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                    <tr align="right" valign="top">
                        <td width="180px">Company</td>
                        <td align="left">
                            <select name="txt_company_id" id="txt_company_id" >
                                <option value="0" <?php echo $v_company_id==0?'selected':''; ?>>-- Select -- </option>
                                <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_company_id); ?>
                            </select>
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Location Name</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_location_name" name="txt_location_name" value="<?php echo $v_location_name;?>" />
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td width="180px">Phone Number</td>
                        <td align="left">
                            <input class="" size="15" type="text" id="txt_location_phone" name="txt_location_phone" value="<?php echo $v_location_phone;?>" />
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Location Type </td>
                        <td align="left">
                            <select name="txt_location_type" id="txt_location_type">
                                <?php echo $cls_tb_settings->draw_option_by_id('location_type',0,$v_location_type); ?>
                            </select>
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Location Region</td>
                        <td align="left">
                            <input class="" size="25" type="text" id="txt_location_region" name="txt_location_region" value="<?php echo $v_location_region;?>" />

                            <a class="with-tooltip" title="This field is used when company group their locations by regions or area">  <img src="<?php echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Location Banner</td>
                        <td align="left">
                           <input class="" size="50" type="text" id="txt_location_banner" name="txt_location_banner" value="<?php echo $v_location_banner;?>" />
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Location Number</td>
                        <td align="left">
                            <input class="" size="5" type="text" id="txt_location_number" name="txt_location_number" value="<?php echo $v_location_number;?>" />
                            <span id="sp_location_number"></span>
                            <?php if($v_check_location_number==1){ ?>
                                <a class="with-tooltip" title="Must be unique within each company">  <img src="<?php echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                                <span class="madatory">*</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Main Contact</td>
                        <td >
                            <?php if($v_main_contact!=''){
                                echo $cls_tb_contact->get_infomation_contact($v_main_contact);
                            }?>
                        </td>

                    </tr>
                </table>
            </div>
            <div id="tab_address">
                <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">

                    <tr align="right" valign="top">
                        <td width="180px">Address Unit</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_address_unit" name="txt_address_unit" value="<?php echo $v_address_unit;?>" />
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Address line 1</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_address_line_1" name="txt_address_line_1" value="<?php echo $v_address_line_1;?>" /><span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Address line 2</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_address_line_2" name="txt_address_line_2" value="<?php echo $v_address_line_2;?>" />
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Address line 3</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_address_line_3" name="txt_address_line_3" value="<?php echo $v_address_line_3;?>" />
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>City</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_address_city" name="txt_address_city" value="<?php echo $v_address_city;?>" />
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Address Postal</td>
                        <td align="left">
                            <input class="" size="50" type="text" id="txt_address_postal" name="txt_address_postal" value="<?php echo $v_address_postal;?>" />
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Address Province</td>
                        <td align="left" id="td_province">
                            <?php
                            if($v_address_country_id==72 || $v_address_country_id==15)
                            {
                                echo "<select name='txt_address_province'>";
                                echo $cls_tb_province->draw_option('province_name','province_name',$v_address_province);
                                echo "</select>";
                            }else { ?>
                                <input class="" size="50" type="text" id="txt_address_province" name="txt_address_province" value="<?php echo $v_address_province;?>" />
                            <?php }?>
                            <a class="with-tooltip" title="Required for  Canada and  USA.">
                                <img src="<?php echo URL; ?>images/icons/question_icon.gif"> </a>
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Address Country</td>
                        <td align="left">
                            <select id="txt_address_country" name="txt_address_country">
                                <?php
                                if($v_location_id==0) $v_tmp_address_id = 15;
                                else $v_tmp_address_id = get_select_id_one($v_address_country,2);

                                $cls_tb_country = new cls_tb_conutry($db);
                                echo $cls_tb_country->draw_option('country_id','country_name',$v_tmp_address_id);
                                ?>
                            </select>
                            <span class="madatory">*</span>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="tab_shiped_address">
                    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                        <tr align="right" valign="top">
                            <td width="180px">Use default address</td>
                            <td align="left">
                                <input id="chk_shipped_address" type="checkbox" value="1" <?php  echo ($v_chk_shipped_address==0) ? "" : 'checked';?> name="chk_shipped_address">
                            </td>
                        </tr>

                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td width="180px">Address Unit</td>
                            <td align="left">
                                <input class="" size="50" type="text" id="txt_shipped_address_unit" name="txt_shipped_address_unit" value="<?php echo $v_shipped_address_unit;?>" />

                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>Address line 1</td>
                            <td align="left">
                                <input class="" size="50" type="text" id="txt_shipped_address_line_1" name="txt_shipped_address_line_1" value="<?php echo $v_shipped_address_line_1;?>" />
                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>Address line 2</td>
                            <td align="left">
                                <input class="" size="50" type="text" id="txt_shipped_address_line_2" name="txt_shipped_address_line_2" value="<?php echo $v_shipped_address_line_2;?>" />
                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>Address line 3</td>
                            <td align="left">
                                <input class="" size="50" type="text" id="txt_shipped_address_line_3" name="txt_shipped_address_line_3" value="<?php echo $v_shipped_address_line_3;?>" />
                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>City</td>
                            <td align="left">
                                <input class="" size="50" type="text" id="txt_shipped_address_city" name="txt_shipped_address_city" value="<?php echo $v_shipped_address_city;?>" />
                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>Address Postal</td>
                            <td align="left">
                                <input class="" size="50" type="text" id="txt_shipped_address_postal" name="txt_shipped_address_postal" value="<?php echo $v_shipped_address_postal;?>" />
                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>Address Province  </td>
                            <td align="left" id="td_shipped_province">
                            <?php if($v_shipped_address_country_id==72 || $v_shipped_address_country_id==15)
                            {
                                echo "<select name='txt_shipped_address_province'>";
                                echo $cls_tb_province->draw_option('province_name','province_name',$v_shipped_address_province);
                                echo "</select>";
                            }else { ?>
                                <input class="" size="50" type="text" id="txt_shipped_address_province" name="txt_shipped_address_province" value="<?php echo $v_shipped_address_province;?>" />
                                <?php }?>
                                <a class="with-tooltip" title="Required for  Canada and  USA.">
                                    <img src="<?php echo URL; ?>images/icons/question_icon.gif"> </a>
                            </td>
                        </tr>
                        <tr align="right" valign="top" rel="tab_shiped_address">
                            <td>Address Country</td>
                            <td align="left">
                                <select id="txt_shipped_address_country" name="txt_shipped_address_country">
                                    <?php
                                    if($v_location_id==0) $v_tmp_address_id = 15;
                                    else $v_tmp_address_id = get_select_id_one($v_address_country,2);

                                    $cls_tb_country = new cls_tb_conutry($db);
                                    echo $cls_tb_country->draw_option('country_id','country_name',$v_shipped_address_country_id);
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
            </div>
            <div id="tab_other">
                <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">

                    <tr align="right" valign="top">
                        <td width="180px">Open Date</td>
                        <td width="10px"></td>
                        <td align="left">
                            <input class="" size="20" type="text" id="txt_open_date" name="txt_open_date" value="<?php echo fdate($v_open_date);?>" />
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Close Date</td>
                        <td><input id="chk_closedate" type="checkbox" value="1" <?php echo ($v_chk_closedate==1) ? "" : 'checked';?> name="chk_closedate"></td>
                        <td align="left">
                            <span style="<?php echo ($v_chk_closedate==1) ? "display: none" : '';?>"  id="sp_closedate">
                                  <input class="" size="20" type="text" id="txt_close_date" name="txt_close_date" value="<?php echo fdate($v_close_date);?>" />
                            </span>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Status</td>
                        <td>&nbsp</td>
                        <td align="left">
                            <select  name="txt_status">
                                <?php echo $cls_settings->draw_option_by_id('location_status',0,$v_status);?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">Approving Contact</td>
                        <td>&nbsp</td>
                        <td >
                        	<select name="txt_approved_contact" id="txt_approved_contact">
                            <option value="" selected="selected">---- Select One ----</option>
                            <?php 
                                echo $v_dsp_approved_contact;
                            ?>
                            </select>
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="toolbar">
        <input type="submit" class="button" value="Update Location" name="btn_submit_tb_contact" id="btn_submit_tb_contact">
    </div>
</form>