<?php if(!isset($v_sval)) die();?>

<script type="text/javascript">
    $(document).ready(function(){
        $("form#frm_tb_user").submit(function(){
            if($("#txt_user_name").val()=='')
            {
                alert("<?php echo $cls_tb_message->select_value('invalid_user_name'); ?>");
                $("#txt_location_type").addClass('invalid');
                $("#txt_user_name").focus();
                return false;
            }
            if( $("#txt_paswd").val()==""  || $("#txt_repeat_paswd").val()=="" || $("#txt_paswd").val().length < 5 )
            {
                alert("<?php echo $cls_tb_message->select_value('invalid_input_password'); ?>");
                $("#txt_paswd").addClass('invalid');
                return false;
            }
            if(($("#txt_paswd").val()!=$("#txt_repeat_paswd").val()))
            {
                alert("<?php echo $cls_tb_message->select_value('correct_the_password'); ?>");
                $("#txt_paswd").addClass('invalid');
                $("#txt_repeat_paswd").addClass('invalid');
                return false;
            }
            return true;
        });
        $("#btn_check_user").click(function(){

            if($("#txt_user_name").val()=='')
            {
                $("#result").html('<b> Username is not blank  !..........</b>');
                $("#txt_user_name").addClass('invalid');
                $("#txt_user_name").focus();
                return false;
            }

            v_user_name = $("#txt_user_name").val();
            v_contact_id = <?php echo $v_contact_id; ?>;

            $.ajax({
                url:'<?php echo URL.'admin/user/user/'; ?>'+v_contact_id+'/check_user' ,
                data:{txt_user_name:v_user_name},
                dataType: 'html',
                type: "POST",
                beforeSend: function(){
                    $("#btn_check_user").css('display','none');
                    $("#result").html('<b> Checking Username !..........</b>');
                },
                success: function(html){
                    var v_error =  html;
                    if(v_error!=102)
                    {
                        if(v_error==101)
                            $("#result").html('<font color="Red">Username or Location is not blank!............</font>');
                        else
                            $("#result").html('<font color="Red">Username is exist</font>');

                        $("#btn_check_user").css('display','');
                    }
                    else
                    {
                        $("#result").html('<font color="008000">Username can use!..............</font>');
                    }
                }
            });
        });
    });
</script>

<p class="highlightNavTitle"><span> Create User and Password for Location  </span></p>
<p class="break"></p>
<form id="frm_tb_user" action="<?php echo URL .'admin/user/user/'.$v_user_id.'/update'; ?>" method="POST">
    <input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
    <input class="" size="50" type="hidden" id="txt_user_id" name="txt_user_id" value="<?php echo $v_user_id;?>" />
    <input class="" size="50" type="hidden" id="txt_contact_id" name="txt_contact_id" value="<?php echo $v_contact_id;?>" />
    <input class="" size="50" type="hidden" id="txt_user_lastlog" name="txt_user_lastlog" value="<?php echo $v_user_lastlog;?>" />
    <input class="" size="50" type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
    <input class="" size="50" type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_location_id;?>" />

    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <tr align="right" valign="top">
            <td>User Name</td>
            <td align="left">
                <input class=""  size="20" type="text" id="txt_user_name" name="txt_user_name" value="<?php echo $v_user_name;?>" />
                <input class="button" id="btn_check_user" name="btn_check_user" value="Check User" type="button"/>
                <span id="result"></span>

            </td>
        </tr>

        <tr align="right" valign="top">
            <td> Password </td>
            <td align="left" >
                <input class="" size="15" type="password" id="txt_paswd" name="txt_paswd" value="" />
                Repeat Passwod <input class="" size="15" type="password" id="txt_repeat_paswd" name="txt_repeat_paswd" value="" />
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>User Type</td>
            <td align="left" >
                <select  id="txt_user_type" name="txt_user_type">
                    <?php echo $cls_settings->draw_option_by_id('user_type',0,$v_user_type); ?>
                </select>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>User Status</td>
            <td align="left">
                <select id="txt_user_status" name="txt_user_status">
                    <?php echo $cls_settings->draw_option_by_id('status',0,$v_user_status); ?>
                </select>
            </td>
        </tr>
        <tr align="center" valign="middle">
            <td colspan="3"><input type="submit" id="btn_submit_tb_user" name="btn_submit_tb_user" value="Submit" class="button" /></td>
        </tr>
    </table>
</form>