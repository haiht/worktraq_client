<?php
if(!isset($v_sval)) die();
?>
<div id="div_close">
<input type="button" value="Get them" id="btn_get" class="button" />
</div>
<div id="div_form">
<form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>">
    <input type="hidden" name="txt_company_id" value="<?php echo $v_company_id;?>">
<label style="color:blue"> [Company: <?php echo $v_company_name;?>]</label> &nbsp;&nbsp;&nbsp;&nbsp;
    <!--
<select id="txt_company_id" name="txt_company_id" onChange="this.form.submit()">
<option value="0" selected="selected">------</option>
<?php //echo $v_dsp_company_draw;?>
</select>-->
Location
<select id="txt_location_id" name="txt_location_id" onChange="this.form.submit()">
<option value="0" selected="selected">------</option>
<?php echo $v_dsp_location_draw;?>
</select>
</form>
</div>
<div id="div_pagination">
<?php echo $v_dsp_pagination;?>
</div>

<div id="div_content">
<?php echo $v_dsp_content;?>
</div>

<style type="text/css">
#div_close{
	height:40px;
	text-align:right;
	padding-right:10px;
}
#div_pagination{	
	height:50px;
	width:100%;
}
</style>
<script type="text/javascript">
$(document).ready(function(e) {
    $('input#btn_get').click(function(e) {
		//alert(parent.arr_package.length);
		var count = 0;
		var total = 0;
		var is_check = false;
		$('input[type="checkbox"]').each(function(index, element) {
            if($(this).attr('checked')){
				var idx = parent.arr_package.length;
				var name = $(this).attr('data-name');
				var type = $(this).attr('data-type');
				var id = $(this).attr('data-id');
				var price = $(this).attr('data-price');
				var image = $(this).attr('data-image');
				var dir = $(this).attr('data-dir');
				var location = $(this).attr('data-location');
				var quantity = $(this).parent().parent().find('input[type="text"]').val();
				quantity = parseInt(quantity, 10);
				if(isNaN(quantity) || quantity < 1) quantity = 1;
				id = parseInt(id, 10);
				if(isNaN(id) || id<0) id = 0;
				price = parseFloat(price);
				if(isNaN(price) || price<0) price = 0;
				type = parseInt(type, 10);
				location = parseInt(location, 10);
				if(isNaN(location) || location <0) location = 0;
				var found = false;
				var tmp; 
				var pos = 0;
				
				for(var i=0; i<parent.arr_package.length && !found; i++){
					tmp = parent.arr_package[i];
					if(tmp.refer_id==id && tmp.package_type == type && tmp.status==0){
						found = true;
						pos = i;
					}
				}
				if(!found){
					parent.arr_package[idx] = new parent.Package(name, type, id, quantity, price, image, dir, location);
				}else{
					parent.arr_package[pos].quantity = /*parent.arr_package[pos].quantity +*/ quantity;
				}
				count++;
				if(!is_check) is_check = true;
			}
        });
		if(count==0){
			alert('Please choose any item to continue. If you simple want to close, click sign \'Close\' at right-top corner!');
			return false;
		}
		if(is_check){
			for(var i=0; i< parent.arr_package.length; i++){
				total += parent.arr_package[i].total();
			}
			parent.$('input#txt_package_price').val(total);
		}
		//alert(parent.arr_package.length);
		parent.update_package();
        parent.$.fancybox.close();
    });
	$('input[type="text"]').each(function(index, element) {
        $(this).attr('disabled', true);
    });
	$('input[type="text"]').each(function(index, element) {
		$(this).blur(function(e) {
            var val = $(this).val();
			val = parseInt(val, 10);
			if(isNaN(val) || val <1) $(this).val('1');
        });
    });
	$('input[type="checkbox"]').each(function(index, element) {
        $(this).click(function(e) {
			var $parent = $(this).parent().parent();
            if($(this).attr('checked')){
				$parent.find('input[type="text"]').attr('disabled', false);
				$parent.find('input[type="text"]').focus();
				$parent.find('input[type="text"]').select();
			}else{
				$parent.find('input[type="text"]').attr('disabled', true);
			}
        });
    });
});

function Package(name, type, refer, quantity, price, image, dir, location){
	this.package_name = name;
	this.package_type = type;
	this.quantity = quantity;
	this.price = price;
	this.referred_id = refer;
	this.package_image = image;
	this.saved_dir = dir;
	this.location_id = location;
	this.status = 0;
}
Package.prototype.total = function(){
	return this.quantity * this.price;
}
</script>