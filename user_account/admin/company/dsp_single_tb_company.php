<?php if(!isset($v_sval)) die();?>
<?php echo js_tooltip(); ?>
<?php echo js_tabas();?>
<?php echo js_color();?>

<script type="text/javascript">
$(document).ready(function(){
    $('.color_code').simpleColor({
        cellWidth: 20,
        cellHeight: 20,
        border: '1px solid #660033',
        buttonClass: 'button',
        displayColorCode: true,
        livePreview: true
    });
    $(".with-tooltip").simpletooltip();
    $('#tab-container').easytabs();
	
	$("form#frm_tb_company").submit(function(){
        if($("#txt_company_name").val()=="")
        {
            alert("<?php echo $cls_tb_message->select_value('invalid_select_company'); ?>");
            $("#txt_company_name").addClass('invalid');
            $("#txt_company_name").focus();
            return false;
        }
        if($("#txt_company_code").val()=="")
        {
            alert("<?php echo $cls_tb_message->select_value('invalid_input_company_code'); ?>");
            $("#txt_company_code").addClass('invalid');
            $("#txt_company_code").focus();
            return false;
        }
        return true;
	});
});
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/company'; ?>">  Companys  </a> &gt&gt Insert - Update Company</p>
<p class="highlightNavTitle"><span> Insert - Update Company  </span></p>
<p class="break"></p>
<?php if(isset($_REQUEST['txt_error'])){ ?>
    <div class="msgbox_error">
        <?php echo (isset($_SESSION['error_company']) ? $_SESSION['error_company'] : '' );  ?>
    </div>
<?php } ?>
<p class="break"></p>
<form id="frm_tb_company"  action="<?php echo URL.'admin/company/'.$v_company_id.'/update'; ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>">
    <input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>">
    <input type="hidden" id="txt_template_id" name="txt_template_id" value="<?php echo $v_company_template_id;?>">
<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_company">Company </a></li>
        <li class='tab'><a href="#tab_template">Template </a></li>
    </ul>
    <div class='panel-container'>
        <div id="tab_company">

                <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                    <tr  valign="top">
                        <td align="right" width="180px">Company Name </td>
                        <td align="left">
                            <input  size="50" type="text" id="txt_company_name" name="txt_company_name" value="<?php echo $v_company_name;?>" />
                            <a class="with-tooltip" title="Input Company Name">  <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Company Code </td>
                        <td align="left">
                            <?php if($v_company_id ==0) { ?>
                                <input  size="5" maxlength="3" type="text" id="txt_company_code"<?php echo $v_company_id>0?' readonly="readonly"':''?> name="txt_company_code" value="<?php echo $v_company_code;?>" title="Must be at least 3 characters."/ />
                <a class="with-tooltip" title="Input Company Code, 3 chars & Remember that, company's code is only edited by adding new!!!, not change after submit.">  <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
            <?php }else{ ?>
                                <input  size="5" maxlength="3" type="hidden" id="txt_company_code"<?php echo $v_company_id>0?' readonly="readonly"':''?> name="txt_company_code" value="<?php echo $v_company_code;?>" title="Must be at least 3 characters."/ />
                <b><?php echo $v_company_code;?></b>
            <?php } ?>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Relationship</td>
                        <td align="left">
                            <select name="txt_relationship">
                                <?php echo $cls_settings->draw_option_by_id('relationship',0,$v_relationship); ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Bussines Type</td>
                        <td align="left">
                            <select name="txt_bussines_type">
                                <?php echo $cls_settings->draw_option_by_id('bussiness_type',0,$v_bussines_type); ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Industry</td>
                        <td align="left">
                            <select name="txt_industry">
                                <?php echo $cls_settings->draw_option_by_id('industry',0,$v_industry); ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Website</td>
                        <td align="left">
                            <input  size="50" type="text" id="txt_website" name="txt_website" value="<?php echo $v_website;?>" />
                            <a class="with-tooltip" title="Input Website ,http://? ">  <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Sales Rep</td>
                        <td align="left">
                            <select name="txt_sales_rep" id="txt_sales_rep">
                                <option value="0" <?php  echo ($v_sales_rep==0?'selected':''); ?>>-- Select --</option>
                                <?php echo $cls_tb_contact->draw_option_contact($v_sales_rep, array('location_id'=>(int)10000)); ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>CSR</td>
                        <td align="left">
                            <select name="txt_csr" id="txt_csr">
                                <option value="0" <?php echo ($v_csr==0?'selected':''); ?>>-- Select --</option>
                                <?php echo $cls_tb_contact->draw_option_contact($v_csr, array('location_id'=>(int)10000)); ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Email </td>
                        <td align="left">
                            <input type="text" size="50" name="txt_email_head_office" id="txt_email_head_office" value="<?php echo $v_head_office_email; ?>">
                            <a class="with-tooltip" title="All order will send to email by CC"> <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                        </td>

                    </tr>
                    <tr align="right" valign="top">
                        <td>Status</td>
                        <td align="left">
                            <select name="txt_status">
                                <?php echo $cls_settings->draw_option_by_id('status',0,$v_status); ?>
                            </select>
                        </td>
                    </tr>
                    <tr align="right" valign="top">
                        <td>Logo File </td>
                        <td align="left">
                            <input  size="50" type="file" id="txt_logo_file" name="txt_logo_file" value="<?php echo $v_logo_file;?>" />
                            <a class="with-tooltip" title="Logo File : PNG, JPEG ...">  <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                        </td>
                    </tr>
                    <tr align="right" valign="top">

                    </tr>
                    <?php if(file_exists('resources/'.$v_company_code.'/'.$v_logo_file)){ ?>
                        <tr valign="top">
                            <td align="right">Resources File </td>
                            <td align="left">
                                <img src="<?php echo URL.'resources/'.$v_company_code.'/'.$v_logo_file; ?>" alt="">
                            </td>
                        </tr>
                    <?php } ?>
                    <tr align="center" valign="middle">
                        <td colspan="3"></td>
                    </tr>
                </table>

        </div>
        <div id="tab_template">
            <input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>">
            <input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <td align="right" width="250px">Company Template</td>
                <td align="left">
                    <select id="txt_template_company_id" name = "txt_template_company_id">
                        <option value="0" <?php  echo ($v_company_template_id==0?'selected':'');?> > --  Select --  </option>
                        <?php echo $cls_tb_template->draw_option('template_id','template_name',$v_company_template_id); ?>
                    </select>
                </td>
                <?php if(isset($v_company_template_id) && $v_company_template_id!=''){ ?>
                <?php
                    $v_total= count($arr_company_log);
                    $v_selected = 0;
                    for($i=0;$i<$v_total;$i++){
                        $v_temp_template_id = isset($arr_company_log[$i]['template_id']) ? $arr_company_log[$i]['template_id'] : 0;
                        if($v_company_template_id ==$v_temp_template_id ){
                            $v_selected= $i;
                            $i==$v_total;
                        }
                    }
                    if(is_array($arr_company_log[$v_selected]['element'])){
                        foreach($arr_company_log[$v_selected]['element'] as $v_key=>$v_value){
                            echo ' <tr  valign="top">
                                        <td align="right" >'. str_format($v_key) .'</td>
                                        <td align="left">
                                            <input size="7" class="color_code" type="text" value="'. $v_value .'" id="txt_element_'.$v_key.'" name="txt_element_'.$v_key.'"  />
                                       </td>
                                </tr>';
                        }
                    }
                ?>
                <?php }?>
            </table>
        </div>
    </div>
</div>
<div class="toolbar">
    <input type="submit" id="btn_submit_tb_company" name="btn_submit_tb_company" value="Save" class="button" />
</div>
</form>