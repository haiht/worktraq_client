<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt <a href="<?php echo URL .'admin/system/settings'; ?>"> System </a>  &gt &gt Settings </p>
<p class="highlightNavTitle"><span> Edit Settings  </span></p>
<p class="break"></p>
<script type="text/javascript ">
    $(document).ready(function(){
        $('img[rel=add_option]').click(function(){
            var v_count_option =$("#txt_count_setting").val();

            $.ajax({
                url:"<?php echo URL.$v_admin_key;?>/ajax",
                type:"POST",
                data:{txt_setting_id:<?php echo $v_setting_id; ?>,txt_count_option:v_count_option, txt_action:'add'},
                success:function(data){
                    var ret = $.parseJSON(data);
                    if(ret.error==1)
                        location.reload();
                }
            });

        });
        $('img[rel=change_dps]').click(function(){
            var option_id = $(this).attr("data");
            $("#tbar_"+option_id).css('display','none');
            $("#sp_option_"+option_id).css('display','block');
        });
        $('input[rel=btn_update]').click(function()
        {
            var option_id = $(this).attr("data");
            var v_name_option = $("#txt_option_name_"+option_id).val();
            var v_name_key = $("#txt_option_key_"+option_id).val();
            v_name_option = $.trim(v_name_option);
            v_name_key = $.trim(v_name_key);

            if(v_name_option==''||v_name_key =='')
            {
                alert('The name and key are blank,Please insert new data to update!');
            }
            else
            {
                if(confirm("Do you want update new data!...")){
                    $.ajax({
                        url:"<?php echo URL.$v_admin_key;?>/ajax",
                        type:"POST",
                        data:{txt_setting_id:<?php echo $v_setting_id; ?>,txt_option_id:option_id,txt_name_option:v_name_option,txt_name_key:v_name_key,txt_action:'update'},
                        success:function(data){
                            var ret = $.parseJSON(data);
                            if(ret.error!=1) alert(ret.message);
                            if(ret.error==1){
                                $("#tbar_"+option_id).html(ret.data);
                            }
                            $("#tbar_"+option_id).css('display','block');
                            $("#sp_option_"+option_id).css('display','none');
                        }
                    });
                }
            }
        });
    });
</script>
<form action="<?php echo URL.$v_admin_key.'/'.$v_setting_id.'/edit'; ?>" method="POST" >
    <input type="hidden" name="txt_setting_id" id="txt_setting_id" value="<?php echo $v_setting_id; ?>">
    <table cellpadding="2" width="100%" cellspacing="2" class="list_table">
    <tr>
        <td colspan="3" class="error">Please, Don't change anything because the code program depends them. Exclusion of description  </td>
    </tr>
    <tr>
        <td width="180px">Settings Name</td>
        <td width="10px"></td>
        <td>
            <?php if($v_setting_id==0){ ?>
                <input type="text" name="txt_setting_name" id="txt_setting_name" value="<?php echo $v_setting_name;?>">
            <?php }else{ ?>
                <?php echo '<b>'.  $v_setting_name .'</b>'; ?>
                <input type="hidden" name="txt_setting_name" id="txt_setting_name" value="<?php echo $v_setting_name;?>">
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td>Description</td>
        <td width="10px"></td>
        <td>
            <input type="text" size="50" name="txt_setting_description" id="txt_setting_description" value="<?php echo $v_setting_description;?>"> </td>
        </td>
    </tr>
    <tr>
        <td>Setting type</td>
        <td width="10px"></td>
        <td>
            <select name="txt_setting_type">
                <?php echo draw_option($arr_setting_type,$v_setting_type);?>
            </select>
            </td>
        </td>
    </tr>
    <tr class="no_backgound">
        <td>Option</td>
        <td width="10px">
            <img  title="Add Option" rel="add_option" style="cursor:pointer" src="<?php echo URL;?>images/icons/add.png">
        </td>
        <td>
            <?php
                $v_dsp_option = "";
                $v_count = 0;
                foreach ($arr_option as $arr) {
                    $v_option_id = isset($arr['id']) ? $arr['id'] : 0;
                    $v_option_name = isset($arr['name']) ? $arr['name'] : '';
                    $v_option_key = isset($arr['key']) ? $arr['key'] : '';
                    $v_option_status = isset($arr['status']) ? $arr['status'] : 0;
                    $v_count++;
                    $v_dsp_option .='<p class="tbar"  >
                                        <span id="tbar_'.$v_option_id.'">
                                            <b>'.$v_option_name.'</b>
                                            <img data="'.$v_option_id.'" rel="change_dps" src="'. URL .'images/icons/gtk-edit.png">
                                            <p>
                                        </span>
                                        <span style="display:none" id="sp_option_'.$v_option_id.'">
                                            Name: <input type="text" name="txt_option_name_'.$v_option_id.'" id="txt_option_name_'.$v_option_id.'" value="'.$v_option_name.'"> &nbsp&nbsp
                                            Key : <input type="text" name="txt_option_key_'.$v_option_id.'" id="txt_option_key_'.$v_option_id.'" value="'.$v_option_key.'">&nbsp&nbsp
                                            <input class="small_button" type="button" value="Update" rel="btn_update" data="'.$v_option_id.'">
                                        </span>
                                     </p>';
                }
                echo $v_dsp_option;
                echo '<input type="hidden" name="txt_count_setting" id="txt_count_setting" value="'.$v_count.'">';
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="3" align="center"><input type="submit" name="btn_update_settings" class="button" value="Update Settings" >  </td>
    </tr>
</table>
    </form>
<p class="break"></p>

