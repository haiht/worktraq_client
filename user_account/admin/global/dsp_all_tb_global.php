<?php if(!isset($v_sval)) die();?>

<script type="text/javascript">
    $(document).ready(function() {
        $('img[rel=change_value]').click(function(){
            var global_id = $(this).attr("data");
            $("#div_global_status_"+global_id).css('display','none');
            $("#sel_global_status_"+global_id).css('display','block');
        });
        $("select[rel=global_status]").change(function(){
            var global_id = $(this).attr("global_id");
            var global_stauts  =$(this).select("option:selected").val();

            if(global_id==0){
                alert("Select chooice global varriable...")
                $(this).focus();
            }
            else
            {
                if(confirm("Do you want change!...")){
                    $.ajax({
                        url:"<?php echo URL . $v_admin_key.'/ajax';?>",
                        type:"POST",
                        data:{txt_global_id:global_id,txt_status:global_stauts},
                        beforeSend:function(){
                            $("#div_global_status_"+global_id).css('display','block');
                            $("#sel_global_status_"+global_id).css('display','none');
                        },
                        success:function(data){
                            var ret = $.parseJSON(data);
                            if(ret.error==0){
                                $("#div_global_status_"+global_id).html(ret.data);
                                $("div[class=msgbox_success]").css('display','block');
                                $("div[class=msgbox_success]").html(ret.message);
                            }
                            else
                            {
                                $("div[class=msgbox_error]").css('display','block');
                                $("div[class=msgbox_error]").html(ret.message);
                            }

                        }
                    });
                }
            }
        });

    });



</script>
<p class="navTitle"><a href="?a=ACC"> Account  </a> &gt &gt Global  </p>
<p class="highlightNavTitle"><span> Global  </span></p>
<p class="break"></p>
<div class="msgbox_error" style="display: none"></div>
<div class="msgbox_success" style="display: none"></div>
<?php
echo $v_dsp_tb_global;
?>
<script type="text/javascript">
$(document).ready(function(e){
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
});
</script>