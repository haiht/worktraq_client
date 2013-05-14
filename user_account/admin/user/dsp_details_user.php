<?php if(!isset($v_sval)) die();?>
<h3>User infomation </h3>
<p class="break"></p>
    <table cellpadding="2" cellspacing="3" class="list_table" width="100%">
        <tr>
            <td width="180px">Username</td>
            <td><b><?php echo $v_user_name;?></b></td>
        </tr>
        <tr>
            <td>User Type</td>
            <td><?php echo  $cls_settings->get_option_name_by_id('user_type',$v_user_type);?> </td>
        </tr>
        <tr>
            <td>Company</td>
            <td><?php echo $v_main_company_name; ?> </td>
        </tr>
        <tr>
            <td>Location </td>
            <td><?php echo $v_main_location_name;?> </td>
        </tr>
        <tr>
            <td>Contact</td>
            <td>
                <?php echo $v_main_contact_name;?>
            </td>
        </tr>
        <tr>
            <td>Last login</td>
            <td><?php echo $v_user_lastlog;?></td>
        </tr>
    </table>
