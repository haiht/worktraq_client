<?php if(!isset($v_sval)) die(); ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("select#txt_search_company_id").change(function(){
                var company_id = $("select#txt_search_company_id").val();
                company_id = parseInt(company_id, 10);

                $.ajax({
                    url : '<?php echo URL .'/admin/product/product-group/ajax';?>',
                    type    : 'POST',
                    data    :   {txt_company_id: company_id},
                    beforeSend: function(){
                        $("select#txt_search_company_id").attr('disabled', true);
                    },
                    success: function(data){
                        var ret = $.parseJSON(data);
                        if(ret.error==0){
                            $('select#txt_search_product_group_id').html(ret.data);
                        }else{
                            alert(ret.message);
                        }
                        $("select#txt_search_company_id").attr('disabled', false);
                    }
                });
            });
            $("#kwd_search").keyup(function(){
                if( $(this).val() != "")
                {
                    $("#search_table tbody>tr").hide();
                    $("#search_table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
                }
                else
                {
                    $("#search_table tbody>tr").show();
                }
            });
            // jQuery expression for case-insensitive filter
            $.extend($.expr[":"],
            {
                "contains-ci": function(elem, i, match, array)
                {
                    return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
        });
    </script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt &gt  <a href="<?php echo URL.'/admin/product/products'; ?>"> Product </a> &gt; &gt; Threshold for Product Group and Location   </p>
<p class="highlightNavTitle"><span> Threshold for Product Group and Location   </span></p>
<p class="break"></p>
<form action="" method="POST" >
<table class="list_table" align="center" width="100%" cellspacing="0" cellpadding="3" border="0" >
    <tr>
        <td width="80px">Company</td>
        <td width="250px">
            <select name="txt_search_company_id" id="txt_search_company_id">

                <option value="0" <?php echo ($v_search_company_id==0?'selected':''); ?>> -- Select -- </option>
                <?php echo $cls_tb_company->draw_option('company_id','company_name',$v_search_company_id);
                ?>
            </select>
        </td>
        <td width="350px"> Product's Group
            <select id="txt_search_product_group_id" name="txt_search_product_group_id">
                <?php echo $cls_tb_product_group->draw_all_product_option($v_search_company_id,0,$v_search_group_product_id); ?>
            </select>
        </td>
        <td>
            <input id="btn_search" name="btn_search" type="submit" class="small_button" value="Search">
        </td>
    </tr>
</table>
</form>
<p class="break"></p>

<?php if($v_message!='') { ?>
    <p class="msgbox_success">
        <?php echo $v_message; ?>
    </p>
<?php } ?>

<?php if($v_dsp!='') { ?>
<p class="msgbox_info" >
    Search: <input id="kwd_search" type="text" size="50px" value="">
</p>

<form action="" method="POST" >
    <input type="hidden" name="txt_search_company_id" id="txt_search_company_id" value="<?php echo $v_search_company_id; ?>">
    <input type="hidden" name="txt_search_product_group_id" id="txt_search_product_group_id" value="<?php echo $v_search_group_product_id; ?>">
    <table class="sortable" align="center" width="100%" cellspacing="0" cellpadding="3" border="0" id="search_table">
        <tr>
            <th> </th>
            <th> Location number</th>
            <th> Main Contact </th>
            <th> Location name </th>
            <th> Location phone </th>
            <th> Product's Group : <?php echo $v_group_name; ?></th>
        </tr>
        <?php echo $v_dsp; ?>
    </table>
    <p class="msgbox_success" >
        <input id="btn_update_threshold" name="btn_update_threshold" type="submit" class="small_button" value="Update <?php echo  $v_group_name?>">
    </p>
</form>
<?php } ?>

