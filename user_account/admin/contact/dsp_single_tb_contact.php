<?php if(!isset($v_sval)) die();?>
<?php echo js_tooltip(); ?>
<?php echo js_tabas();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt<a href="<?php echo URL .'admin/user/contact'; ?>">  Contact </a>  </p>
<p class="highlightNavTitle"><span> Contact  </span></p>
<p class="break"></p>

<script type="text/javascript">
$(document).ready(function(){
    $(".with-tooltip").simpletooltip();
    $('#tab-container').easytabs();

    $("#btn_create_user").fancybox({
        'showNavArrows'        : false,
        'width'                : '75%',
        'autoScale'            :  true,
        'type'                 : 'iframe',
        onClosed: (function(){
            $.ajax({
                url:'<?php echo URL.'admin/user/user/details/user/'.$v_contact_id; ?>',
                dataType: 'html',
                type: "GET",
                beforeSend: function(){
                    $("#result_user").html('<b> Checking Username !..........</b>');
                },
                success: function(html){
                    $("#result_user").html('<b> '+html+'</b>');
                }
            });
        })
    });

    $("#txt_address_type").change(function(){
        p_option = $(this).val();
        if(p_option==2 || p_option==3)
        {
            $('tr[rel="address"]').css("display","");
        }
        if(p_option==1 ||p_option==0)
        {
            $('tr[rel="address"]').css("display","none");
        }
    });
    <?php if($v_address_type <2){ ?>
    $('tr[rel="address"]').css("display","none");
    <?php }else{?>
    $('tr[rel="address"]').css("display","");
    <?php } ?>

	$("form#frm_tb_contact").submit(function(){
        if($.trim($("#txt_first_name").val())=="")
        {
            alert("<?php echo $cls_tb_message->select_value('invalid_first_name'); ?>");
            $("#txt_first_name").focus();
            $("#txt_first_name").addClass('invalid');
            return false;
        }
        if($.trim($("#txt_last_name").val())=="")
        {
            alert("<?php echo $cls_tb_message->select_value('invalid_last_name'); ?>");
            $("#txt_last_name").focus();
            $("#txt_last_name").addClass('invalid');
            return false;
        }
        if($.trim($("#txt_contact_type").val())=="")
        {
            alert("<?php echo $cls_tb_message->select_value('invalid_contact_type'); ?>");
            $("#txt_contact_type").focus();
            $("#txt_contact_type").addClass('invalid');
            return false;
        }

        if($.trim($("#txt_direct_phone").val())=="")
        {
            alert("<?php echo $cls_tb_message->select_value('invalid_direct_phone'); ?>");
            $("#txt_direct_phone").focus();
            $("#txt_direct_phone").addClass('invalid');
            return false;
        }
        return true;
	});

    $('input#txt_birth_date').datepicker({
        dateFormat: 'dd-M-yy',
        changeMonth:true,
        changeYear:true,
        showOn:'both',
        buttonImage:"http://worktraq.anvy.net/images/_calendar.gif",
        buttonImageOnly:true
    });
});
</script>
<form id="frm_tb_contact" action="<?php echo URL.$v_admin_key.'/'.$v_contact_id.'/update';?>" method="POST">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input  size="50" type="hidden" id="txt_contact_id" name="txt_contact_id" value="<?php echo $v_contact_id;?>" />
<input  size="50" type="hidden" id="txt_page" name="txt_page" value="<?php echo $v_page;?>" />
<?php if($v_error_message!=''){?>
<div class="msgbox_error">
    <?php echo $v_error_message;?>
</div>
<?php } ?>
<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_company">Company </a></li>
        <li class='tab'><a href="#tab_account">Account </a></li>
        <li class='tab'><a href="#tab_contact">Contact</a></li>
        <li class='tab'><a href="#tab_address">Address</a></li>
    </ul>
    <div class='panel-container'>
        <div id="tab_company">
            <br>
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr>
                    <td width="180px" align="right">Company </td>
                    <td><b><?php echo $cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id )); ?></b>
                    <input type="hidden" name="txt_company_id" id="txt_company_id" value="<?php echo $v_company_id; ?>"/>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Location </td>
                    <td align="left">
                        <select id="txt_location_id" name="txt_location_id">
                            <?php
                            echo $cls_tb_location->draw_option('location_id','location_name',$v_location_id,array('company_id'=>(int)$v_company_id));
                            ?>
                        </select>
                        <span class="madatory">*</span>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Contact Type</td>
                    <td align="left">
                        <select id="txt_contact_type" name="txt_contact_type">
                            <?php echo $cls_settings->draw_option_by_id('contact_type',0,$v_contact_type); ?>
                        </select>
                        <span class="madatory">*</span>
                    </td>
                </tr>
            </table>
        </div>
        <div id="tab_account">
            <br>
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top" >
                    <td  width="180px">First Name</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_first_name" name="txt_first_name" value="<?php echo $v_first_name;?>" />
                        <span class="madatory">*</span>
                    </td>

                </tr>
                <tr align="right" valign="top">
                    <td>Last Name</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_last_name" name="txt_last_name" value="<?php echo $v_last_name;?>" />
                        <span class="madatory">*</span>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Middle Name</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_middle_name" name="txt_middle_name" value="<?php echo $v_middle_name;?>" />
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Birth Date</td>
                    <td align="left">
                        <input class="" size="20" type="text" id="txt_birth_date" name="txt_birth_date" value="<?php echo fdate($v_birth_date);?>" />
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Main Contact</td>
                    <td align="left">
                        <?php if($v_check_main_contact==$v_contact_id){ ?>
                        <input type="checkbox" id="chk_main_contact" name="chk_main_contact" value="1" <?php echo $v_check_main_contact!=0?'checked':''; ?> />
                        <?php }else { ?>
                        <?php $v_num_contact = $cls_tb_location->select_scalar('main_contact',array('location_id'=>(int)$v_location_id));
                        if($v_num_contact==''){ ?>
                        <input type="checkbox" id="chk_main_contact" name="chk_main_contact" value="1" <?php echo $v_check_main_contact!=0?'checked':''; ?> />
                        <?php } else { ?>
                            <b> The location has main contact </b>
                        <?php }}  ?>
                        <a class="with-tooltip" title="Check is main contact for location">  <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Email</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_email" name="txt_email" value="<?php echo $v_email;?>" />
                        <span class="madatory">*</span>
                    </td>
                </tr>
                <?php if(($cls_tb_user->count(array('contact_id'=>$v_contact_id))==0) && $v_contact_id!=0){ ?>
                <tr align="right" valign="top">
                    <td>Username & Password</td>
                    <td align="left">
                <span id="result_user">
                <a href="<?php echo URL . 'admin/user/user/'.$v_contact_id.'/'.$v_company_id.'/'.$v_location_id.'/cuser'; ?>"  id="btn_create_user" name="btn_submit_create_user" > Create Username and Password </a>
                <input class="" size="50" type="hidden" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" />
                </span>
                    </td>
                </tr>
                <?php }else { ?>
                <tr align="right" valign="top">
                    <td>Username & Password</td>
                    <td align="left">
                        <b>
                            <?php
                            if($v_contact_id==0)
                                echo 'Create after submit this contact!...';
                            else
                                echo $v_user_name; ?>
                        </b>
                    </td>
                </tr>
                <?php } ?>
                <tr align="right" valign="top">
                    <td>Receive Email Notification</td>
                    <td align="left">
                        <input type="checkbox" id="chk_receive_email_notification" name="chk_receive_email_notification" value="1" <?php echo $v_receive_email_flag!=0?'checked':''; ?> />
                    </td>
                </tr>
            </table>
        </div>
        <div id="tab_contact">
            <br>
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td width="180px">Direct Phone</td>
                    <td align="left">
                        <input class="" size="22" type="text" id="txt_direct_phone" name="txt_direct_phone" value="<?php echo $v_direct_phone;?>" />
                        <span class="madatory">*</span>
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Mobile Phone</td>
                    <td align="left">
                        <input class="" size="18" type="text" id="txt_mobile_phone" name="txt_mobile_phone" value="<?php echo $v_mobile_phone;?>" />
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Fax Number</td>
                    <td align="left">
                        <input class="" size="24" type="text" id="txt_fax_number" name="txt_fax_number" value="<?php echo $v_fax_number;?>" />
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Home Phone</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_home_phone" name="txt_home_phone" value="<?php echo $v_home_phone;?>" />
                    </td>
                </tr>
            </table>
        </div>
        <div id="tab_address">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="2">
                <tr align="right" valign="top">
                    <td width="180px">Address Type</td>
                    <td align="left">
                        <select id="txt_address_type" name="txt_address_type">
                            <?php echo $cls_settings->draw_option_by_id('address_type',0,$v_address_type);?>
                        </select>
                        <span class="madatory">*</span>
                        <a class="with-tooltip" title="Select 'User default:' ">  <img src="<? echo URL .'images/icons/question_icon.gif'; ?>"> </a>
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Unit</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_unit" name="txt_address_unit" value="<?php echo $v_address_unit;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Line 1</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_line_1" name="txt_address_line_1" value="<?php echo $v_address_line_1;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Line 2</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_line_2" name="txt_address_line_2" value="<?php echo $v_address_line_2;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Line 3</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_line_3" name="txt_address_line_3" value="<?php echo $v_address_line_3;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address City</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_city" name="txt_address_city" value="<?php echo $v_address_city;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Province</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_province" name="txt_address_province" value="<?php echo $v_address_province;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Postal</td>
                    <td align="left">
                        <input class="" size="50" type="text" id="txt_address_postal" name="txt_address_postal" value="<?php echo $v_address_postal;?>" />
                    </td>
                </tr>
                <tr width="100%" align="right" valign="top" rel="address" >
                    <td>Address Country</td>
                    <td align="left">
                        <select id="txt_address_country" name="txt_address_country">
                        <?php
                            echo $cls_tb_country->draw_option('country_id','country_name',$v_address_country)
                        ?>
                        </select>
                    </td>
                </tr>
            </table>


        </div>
    </div>
</div>
<span class="madatory">* Madatory </span>
<div class="toolbar">
    <input type="submit" id="btn_submit_tb_contact" name="btn_submit_tb_contact" value="Update Contact" class="button" />
</div>
</form>