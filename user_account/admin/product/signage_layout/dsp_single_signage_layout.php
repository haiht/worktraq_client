<?php if(!isset($v_sval)) die();?>
<script type="text/javascript " src="<?php echo URL."lib/js/maphilight.js";?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.map').maphilight({
        strokeColor:'C0C0C0',
        fillColor:'C2C2C2',
        fillOpacity: 0.3
    });
});



</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/company/location'; ?>">  Location  </a> &gt; &gt;  Insert - Update Signage Layout </p>
<p class="highlightNavTitle"><span> Insert - Update Signage Layout </span></p>
<p class="break"></p>

<form id="frm_tb_product_packages" action="<?php echo URL. $v_admin_key.'/mapping-image/'.$v_location_id.'/id/'.$v_image_id.'/area_id/'.$v_area_id; ?>" method="POST" >
<input type="hidden" name="txt_location_id" value="<?php echo $v_location_id; ?>">
<input type="hidden" name="txt_image_id" value="<?php echo $v_image_id ; ?>">
<input type="hidden" name="txt_area_id" value="<?php echo $v_area_id ; ?>">

<?php echo $v_dsp_tb_location_area;?>

</form>