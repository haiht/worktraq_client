<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    set_cookie('ck_package_company', <?php echo $v_company_id;?>,60,'/');
    $('select#txt_location_id').change(function(){
        var parent_location_id = $(this).val();
        var parent_location_id = parseInt(parent_location_id, 10);
        set_cookie('ck_package_location', parent_location_id, 60,'/');
    });
	$("form#frm_tb_product_packages").submit(function(){
		var css = '';

		var package_sku = $("input#txt_package_sku").val();
		package_sku = $.trim(package_sku);
		css = package_sku==''?'':'none';
		$("label#lbl_package_sku").css("display",css);
		if(css == '') return false;
		var package_type = $("select#txt_package_type").val();
		package_type = parseInt(package_type, 10);
		css = isNaN(package_type)||package_type<=0?'':'none';
		$("label#lbl_package_type").css("display",css);
		if(css == '') return false;
		var package_price = $("input#txt_package_price").val();
		package_price = parseFloat(package_price);
		css = isNaN(package_price) || package_price<0?'':'none';
		$("label#lbl_package_price").css("display",css);
		if(css == '') return false;

		//var location_id = $("select#txt_location_id").val();
		//location_id = parseInt(location_id, 10);
		//css = isNaN(location_id)?'':'none';
		//$("label#lbl_location_id").css("display",css);
		//if(css == '') return false;
		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = isNaN(company_id)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		
		var tmp = new Array();
		var j = 0;
		for(var i=0; i< arr_package.length; i++){
			if(arr_package[i].status==0 && arr_package[i].package_type < package_type){
				tmp[j] = new Package(arr_package[i].package_name, arr_package[i].package_type, arr_package[i].refer_id, arr_package[i].quantity, 
				arr_package[i].price, arr_package[i].package_image, arr_package[i].saved_dir , arr_package[i].location_id);
				j++;
			}
		}
		var content = YAHOO.lang.JSON.stringify(tmp);
		//alert(content)
		$('input#txt_hidden_package_content').val(content);
		return true;
	});
	$('select#txt_package_type').change(function(e) {
        var val = $(this).val();
		val = parseInt(val, 10);
		if(val==2){
            $('div.div_wrapper').css('display','');
			$('div#div_wrapper_single').css('display','');
			$('div#div_wrapper_multiple').css('display','');
            $('div#div_wrapper_set').css('display','none');
            $('div#div_wrapper_package').css('display','none');
            $('div#div_wrapper_kit').css('display','none');
		}else if(val==3){
            $('div.div_wrapper').css('display','');
            $('div#div_wrapper_single').css('display','');
            $('div#div_wrapper_multiple').css('display','');
            $('div#div_wrapper_set').css('display','');
            $('div#div_wrapper_package').css('display','none');
            $('div#div_wrapper_kit').css('display','none');
		}else if(val==4){
			$('div.div_wrapper').css('display','');
            $('div#div_wrapper').css('display','');
            $('div.div_wrapper_single').css('display','');
            $('div#div_wrapper_multiple').css('display','');
            $('div#div_wrapper_set').css('display','');
            $('div#div_wrapper_package').css('display','');
            $('div#div_wrapper_kit').css('display','none');
		}else{
			$('div.div_wrapper').css('display','none');
		}
    });
    $("a[rel=rel_package]").fancybox({
        'showNavArrows'         : false,
        'width'                 : '700',
        'height'                : '600',
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe',
		'hideOnOverlayClick'	: false,
		onClosed	:	function(){
			
		}
    });
    $("a[rel=product_images]").fancybox({
        'showNavArrows'         : false,
        'width'                 : '65%',
        'height'                : '85%',
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe'
    });

	$('img.img_action').each(function(index, element) {
        $(this).click(function(e) {
			var id = $(this).attr('data-id');
			var type = $(this).attr('data-type');
			
			if(set_remove(id, type)) $(this).parent().remove();
        });
    });
	$('select#txt_company_id').change(function(e) {
		var $this = $(this);
        var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
        delete_cookie('ck_package_company','/');
        set_cookie('ck_package_company', company_id,60,'/');

		if(isNaN(company_id) || company_id<0) company_id = 0;
		$.ajax({
			url	: '<?php echo URL;?>admin/company/location/ajax',
			type	: 'POST',
			data	:	{txt_company_id: company_id},
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
function Package(name, type, refer, quantity, price, image, saved_dir, location_id){
	this.package_name = name;
	this.package_type = type;
	this.quantity = quantity;
	this.price = price;
	this.refer_id = refer;
	this.package_image = image;
	this.saved_dir = saved_dir;
	this.location_id = location_id;
	this.status = 0;
	//alert('name: '+name+' -type: '+type+' -refer: '+refer+' -quantity: '+quantity+' -price: '+price+' -image: '+image+' -dir: '+saved_dir+' -location: '+location_id);
}
Package.prototype.total = function(){
	return this.quantity * this.price;
}

function set_remove(id, type){
	if(!confirm('Are you sure you want to remove this item?')) return false;
	for(var i=0; i<arr_package.length; i++){
		if(arr_package[i].refer_id==id && arr_package[i].package_type == type) arr_package[i].status = 1;
	}
	return true;
}
function update_package(){
	$('div.node').each(function(index, element) {
        $(this).remove();
    });
	var quantity=0;
	var name='';
	var type = 0;
	var id = 0;
	var $div;
	for(var i=0; i< arr_package.length; i++){
		if(arr_package[i].status == 0){
			name =  arr_package[i].package_name;
			quantity = arr_package[i].quantity;
			id = arr_package[i].refer_id;
			type = arr_package[i].package_type;
			var $label = $('<label>'+name+' ['+quantity+']</label>');
			var $node = $('<div class="node"><div>');
			
			//alert(arr_package[i].package_type);
			switch(type){
				case 0:
					$div = $('div#div_wrapper_multiple');
					break;
				case 1:
					$div = $('div#div_wrapper_package');
					break;
				case 2:
					$div = $('div#div_wrapper_kit');
					break;	
			}
			
			
			var $img = $('<img class="img_action" id="img_size_'+i+'" data-id="'+id+'" data-type="'+type+'" src="images/icons/delete.png" />');
			$img.bind('click', function(){
				var id = $(this).attr('data-id');
				var type = $(this).attr('data-type');
				if(set_remove(id, type)) $(this).parent().remove();
				
			});
			$node.append($label);
			$node.append($img);
			$div.append($node);
		}
	}
}
<?php 
echo $v_dsp_script;
?>
</script>
<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/product'; ?>">  Product  </a> &gt; &gt; <a href="<?php echo URL.$v_admin_key;?>">Packages</a> &gt; &gt; Insert - Update Package</p>
<p class="highlightNavTitle"><span> Insert - Update Package  </span></p>
<p class="break"></p>

<form id="frm_tb_product_packages" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_package_id.'/edit'?>" method="POST" enctype="multipart/form-data">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_package_id" name="txt_package_id" value="<?php echo $v_package_id;?>" />
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<?php if($v_error_message!=''){?>
	<tr align="left" valign="top">
		<td colspan="4"><?php echo $v_error_message;?>&nbsp;</td>
	</tr>
<?php }?>
<tr align="right" valign="top">
		<td>Company</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_company_id" name="txt_company_id">
        <option value="0" selected="selected">-----</option>
        <?php
		echo $v_dsp_company_draw;
		?>
        </select>
 		<label id="lbl_company_id" style="color:red;display:none;">(*)</label></td>
        <td width="500" rowspan="10">
        <?php echo isset($v_image_tag)?$v_image_tag:'&nbsp;';?>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Location</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_location_id" name="txt_location_id">
        <option value="0" selected="selected">-----</option>
        <?php
		echo $v_dsp_location_draw;
		?>
        </select>
        <label id="lbl_location_id" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Package Sku</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_package_sku" name="txt_package_sku" value="<?php echo $v_package_sku;?>" /> <label id="lbl_package_sku" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Short Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_short_description" name="txt_short_description" value='<?php echo $v_short_description;?>' /> <label id="lbl_short_description" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Long Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_long_description" name="txt_long_description" value='<?php echo $v_long_description;?>' /> <label id="lbl_long_description" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Package Detail</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css" size="50" type="text" id="txt_package_detail" name="txt_package_detail" value='<?php echo $v_package_detail;?>' /> <label id="lbl_package_detail" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Package Image</td>
		<td>&nbsp;</td>
		<td align="left">
        <input type="file" size="50" class="text_css" name="txt_package_image" value="" />
        <input type="hidden" id="txt_hidden_image_file" name="txt_hidden_image_file" value="<?php echo $v_package_image;?>" />
        <input type="hidden" id="txt_hidden_image_desc" name="txt_hidden_image_desc" value="<?php echo $v_package_image_desc;?>" />
        <input type="hidden" id="txt_hidden_saved_dir" name="txt_hidden_saved_dir" value="<?php echo $v_saved_dir;?>" />
         </td>
	</tr>
<tr align="right" valign="top">
		<td>Package Type</td>
		<td>&nbsp;</td>
		<td align="left">
        <select id="txt_package_type" name="txt_package_type">
        <option value="0" selected="selected">------</option>
        <?php
		echo $v_dsp_settings_draw;
		?>
        </select>
        <label id="lbl_package_type" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Package Content</td>
		<td>&nbsp;</td>
		<td align="left"><?php echo $v_dsp_package_content;?></td>
	</tr>
<tr align="right" valign="top">
		<td>Price</td>
		<td>&nbsp;</td>
		<td align="left"> <?php echo $v_sign_money;?> 
        <input type="text" size="20" value="<?php echo $v_package_price;?>" class="text_css" id="txt_package_price" name="txt_package_price" />
        <label id="lbl_package_price" style="color:red;display:none;">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Status</td>
		<td>&nbsp;</td>
		<td align="left">
        <label><input type="checkbox" value="1" id="txt_package_status" name="txt_package_status"<?php echo $v_package_status==0?' checked="checked"':'';?> /> Enable?</label></td>
        <td align="center">
            <?php if($v_package_id>0){?>
            <a rel="product_images" href="<?php echo URL.'admin/product/products/'.$v_package_id.'/images';?>">Upload more images</a>
            <?php }?>
            &nbsp;
        </td>
	</tr>
<tr align="right" valign="top">
    <td>Package Tag</td>
    <td>&nbsp;</td>
    <td align="left" colspan="2">
            <select id="txt_tag_id" name="txt_tag_id[]" multiple="multiple">
                <?php echo $v_dsp_tag_draw_multi;?>
            </select> <br />
        <span style="color:#00709F">Hold down "Control", or "Command" on a Mac, to select more than one.</span>
    </td>
</tr>
    <!--
    <tr align="right" valign="top">
        <td>Taxonomy</td>
        <td>&nbsp;</td>
        <td align="left" colspan="2">
            <select id="txt_taxonomy_id" name="txt_taxonomy_id[]" multiple="multiple">
                <?php //echo $v_dsp_taxonomy_draw_multi;?>
            </select> <br />
        <span style="color:#00709F">Hold down "Control", or "Command" on a Mac, to select more than one.</span>
        </td>
    </tr>
    -->
	<tr align="center" valign="middle">
		<td colspan="4">
        <input type="hidden" id="txt_hidden_package_content" name="txt_hidden_package_content" value="" />
        <input type="submit" id="btn_submit_tb_product_packages" name="btn_submit_tb_product_packages" value="Submit" class="button" /></td>
	</tr>
</table>
</form>
<style type="text/css">
div.div_wrapper{
	margin-left:5px;
	height:25px;
	text-align:left;
	margin-bottom:3px;
	padding-left:2px;
	padding-top:3px;
	width:100%;
	float:left;
}

div.div_package{
	margin-left:5px;
	width:80px;
	max-width:100px;
	border:#03C 1px solid;
	border-radius:3px;
	height:25px;
	text-align:left;
	margin-bottom:3px;
	padding-left:2px;
	padding-top:3px;
	float:left;
}
.img_action{
	margin-left:2px;
	vertical-align:bottom;
	cursor:pointer;
}
div.node{
	background-color:#FFF;
	border:1px outset #09C;
	border-radius:5px;
	box-shadow:0 1px 1px #FFFFFF inset;
	margin-right:5px;
	padding:5px;
	float:left;
	max-width:200px;
	overflow:hidden;
}
select{
    font-size: 12px;
}
</style>