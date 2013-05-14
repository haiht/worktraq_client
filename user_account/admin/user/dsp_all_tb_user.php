<?php if(!isset($v_sval)) die();?>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt User  </p>
<p class="highlightNavTitle"><span> User  </span></p>
<p class="break"></p>
<script type="text/javascript">
    var rule_change = false;
    $(document).ready(function(){
        $("#btn_create_user,a[rel=showdetails]").fancybox({
            'showNavArrows'        : false,
            'width'                : '85%',
            'height'               : '75%',
            'autoScale'            :  true,
            'type'                 : 'iframe'
        });
        $("a[rel=rules_user]").fancybox({
            'showNavArrows'         : false,
            'width'                 : '700',
            'height'                : '600',
            'transitionIn'          :   'elastic',
            'transitionOut'         :   'elastic',
            'overlayShow'           :   true,
            'type'                 : 'iframe',
            'hideOnOverlayClick'    : false,
            onCleanup   :   function(){
                if(rule_change){
                    return confirm('You have changed rules for this user. Do you want to close without to save them?');
                }
            },
            onClosed : function(){
                rule_change = false;
            }
        });
        $('select#txt_company_id').change(function(e) {
            var $this = $(this);
            var company_id = $(this).val();
            company_id = parseInt(company_id, 10);
            if(isNaN(company_id) || company_id<0) company_id = 0;
            $.ajax({
                url : '<?php echo URL;?>admin/company/location/ajax',
                type    : 'POST',
                data    :   {txt_company_id: company_id},
                beforeSend: function(){
                    $this.attr('disabled', true);
                },
                success: function(data, type){
                    var ret = $.parseJSON(data);
                    if(ret.error==0){
                        $('select#txt_location_id').html(ret.data);
                    }else{
                        alert(ret.message);
                    }
                    $this.attr('disabled', false);
                }
            });

        });
    });
</script>
<div class="insert" align="right">
    <a href="<?php echo URL.'admin/user/user/5/10000/10000/';?>cuser"> Insert new Anvy User ; </a>
</div>
<p class="break"></p>
<div class="form">
    <form method="POST">
    <table cellpadding="2" cellspacing="2" class="list_table" width="100%">
        <tr><td colspan="2"><b>Search User!..</b></td></tr>
        <tr>
            <td width="180px" align="right">Company</td>
            <td>
                <select name="txt_company_id" id="txt_company_id">
                    <option value="0" <?php echo ($v_search_company_id==0?'selected':''); ?>> -- Select -- </option>
                    <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_search_company_id); ?>
                </select>
                &nbsp&nbsp
                Location
                <select name="txt_location_id" id="txt_location_id">
                    <option value="0" <?php echo ($v_search_company_id==0?'selected':''); ?>> ----- </option>
                    <?php echo $cls_tb_location->draw_option('location_id','location_name',$v_search_company_id,array('company_id'=>(int)$v_search_company_id)); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">User type </td>
            <td>
                <select name="txt_search_user_type">
                    <option value="" <?php echo ($v_search_user_type==''?'selected':''); ?>> -- Select -- </option>
                    <?php echo $cls_settings->draw_option_by_id('user_type',0,$v_search_user_type); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">Username</td>
            <td>
                <input type="text" size="50px" name="txt_search_username" value="<?php echo $v_search_username;?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input class="button" name="btn_search_user" value="Search" type="submit">
                <input class="button" name="btn_search_cancel" value="Cancel" type="submit">
            </td>
        </tr>
    </table>
    </form>
</div>

<p class="break"></p>
<?php
echo $v_dsp_tb_user;
?>