<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
    $(document).ready(function(){
        $("form#frm_tb_user").submit(function(){
            var v_new_password = $("#txt_new_password").val();
            var v_repeat_new_password = $("#txt_repeat_new_password").val();
            v_new_password = $.trim(v_new_password);
            v_repeat_new_password = $.trim(v_repeat_new_password);

            if(v_new_password.length < 6 || v_repeat_new_password.length <6)
            {
                alert("<?php echo $cls_tb_message->select_value('invalid_input_password'); ?>");
                return false;
            }

            if(v_new_password != v_repeat_new_password)
            {
                alert("<?php echo $cls_tb_message->select_value('correct_the_password'); ?>");
                return false;
            }

            if(confirm("<?php echo $cls_tb_message->select_value('confirm_change_password'); ?> <?php echo  $v_user_name; ?>"))
                return true;
        });
    });
</script>
<p class="navTitle"><a href="?a=ACC"> Account  </a> &gt&gt<a href="<?php echo URL.'/admin/user/user/';?>">  User  </a> &gt&gt Change Pasword User</p>
<p class="highlightNavTitle"><span> Change Pasword User  </span></p>
<p class="break"></p>
<?php if($v_error_message!=''){ ?>
<div class="msgbox_error"> <?php echo $v_error_message; ?></div>
<?php } ?>
<form id="frm_tb_user" action="<?php echo URL.'admin/user/user/'.$v_user_id.'/cpasswd';?>" method="POST">

    <input class="" size="50" type="hidden" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" />
    <input class="" size="50" type="hidden" id="txt_user_lastlog" name="txt_user_lastlog" value="<?php echo $v_user_lastlog;?>" />
    <input class="" size="50" type="hidden" id="txt_user_name" name="txt_user_name" value="<?php echo $v_user_name;?>" />

    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <tr align="right" valign="top">
            <td>User Name</td>
            <td align="left"><b><?php echo $v_user_name ?></b></td>
        </tr>
        <tr align="right" valign="top">
            <td>New Password</td>
            <td align="left">
                <input class="" size="50" type="password" id="txt_new_password" name="txt_new_password" value="" />
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Repeat New Password </td>
            <td align="left">
                <input class="" size="50" type="password" id="txt_repeat_new_password" name="txt_repeat_new_password" value="" />
            </td>
        </tr>
        <tr align="center" valign="middle">
            <td colspan="3"><input type="submit" id="btn_submit_tb_user" name="btn_submit_tb_user" value="Submit" class="button" /></td>
        </tr>
    </table>
</form>