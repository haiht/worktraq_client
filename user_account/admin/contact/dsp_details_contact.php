<?php if(!isset($v_sval)) die();?>
<?php echo js_tooltip(); ?>
<?php echo js_tabas();?>
<h3>Contact Infomation </h3>
<p class="break"></p>
<script type="text/javascript">
    $(document).ready(function(){
        $(".with-tooltip").simpletooltip();
        $('#tab-container').easytabs();
    });
</script>

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
            <td><b><?php echo $cls_tb_company->select_scalar('company_name',array('company_id'=>(int)$v_company_id )); ?></b> </td>
        </tr>
        <tr align="right" valign="top">
            <td>Location </td>
            <td align="left">
                <?php echo $cls_tb_location->select_scalar('location_name',array('location_id'=>(int)$v_location_id)); ?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Location number </td>
            <td align="left">
                <?php echo $cls_tb_location->select_scalar('location_number',array('location_id'=>(int)$v_location_id)); ?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Contact Type</td>
            <td align="left">
                <?php echo $cls_settings->get_option_name_by_id('contact_type',$v_contact_type); ?>
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
                <?php echo $v_first_name;?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Last Name</td>
            <td align="left">
                <?php echo $v_last_name;?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Middle Name</td>
            <td align="left">
                <?php echo $v_middle_name;?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Birth Date</td>
            <td align="left">
                <?php echo fdate($v_birth_date);?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Email</td>
            <td align="left">
                <?php echo $v_email;?>
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
                <?php echo $v_direct_phone;?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Mobile Phone</td>
            <td align="left">
                <?php echo $v_mobile_phone;?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Fax Number</td>
            <td align="left">
                <?php echo $v_fax_number;?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Home Phone</td>
            <td align="left">
                <?php echo $v_home_phone;?>
            </td>
        </tr>
    </table>
</div>
<div id="tab_address">
    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="2">
        <tr align="right" valign="top">
            <td width="180px">Address Type</td>
            <td align="left">
                <?php echo $cls_settings->get_option_name_by_id('address_type',$v_address_type); ?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Unit</td>
            <td align="left">
                <?php echo $v_address_unit;?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Line 1</td>
            <td align="left">
                <?php echo $v_address_line_1;?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Line 2</td>
            <td align="left">
                <?php echo $v_address_line_2;?>

            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Line 3</td>
            <td align="left">
                <?php echo $v_address_line_3;?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address City</td>
            <td align="left">
                <?php echo $v_address_city;?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Province</td>
            <td align="left">
                <?php echo $v_address_province;?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Postal</td>
            <td align="left">
                <?php echo $v_address_postal;?>
            </td>
        </tr>
        <tr width="100%" align="right" valign="top" rel="address" >
            <td>Address Country</td>
            <td align="left">
                <?php echo $cls_tb_country->select_scalar('country_name',array('country_id'=>(int)$v_address_country));?>
            </td>
        </tr>
    </table>
</div>
</div>
</div>