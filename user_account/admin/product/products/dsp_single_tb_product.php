<?php if(!isset($v_sval)) die();?>
<?php echo js_tabas();?>

<script type="text/javascript">
$(document).ready(function(){
    $('#tab-container').easytabs();
	$("form#frm_tb_product").submit(function(){
		var css = '';
		var product_sku = $("input#txt_product_sku").val();
		product_sku = $.trim(product_sku);
		css = product_sku==''?'':'none';
		$("label#lbl_product_sku").css("display",css);
		if(css == '') return false;

		var size_unit = $("input#txt_size_unit").val();
		css = size_unit==''?'':'none';
		$("label#lbl_size_unit").css("display",css);
		if(css == '') return false;

		var c = $('input#txt_package_type').attr('checked')?true:false;
		if(c){
			var package_quantity = $('input#txt_package_quantity').val();
			package_quantity = parseInt(package_quantity,10);
			css = isNaN(package_quantity) || package_quantity<=1?'':'none';
		}
		
		var default_price = $("input#txt_default_price").val();
		default_price = parseFloat(default_price);
		css = isNaN(default_price) || default_price < 0?'':'none';
		$("label#lbl_default_price").css("display",css);
		if(css == '') return false;
		var status = $("select#txt_product_status").val();
		status = parseInt(status, 10);
		css = (isNaN(status)||status<=0)?'':'none';
		$("label#lbl_product_status").css("display",css);
		if(css == '') return false;
		var company_id = $("select#txt_company_id").val();
		company_id = parseInt(company_id, 10);
		css = (isNaN(company_id)||company_id<=0)?'':'none';
		$("label#lbl_company_id").css("display",css);
		if(css == '') return false;
		
		var a_material = [];
		for(var i=0; i<material.length; i++){
			if(material[i].status==0){
				var t = new Material(material[i].id, material[i].name, material[i].color, material[i].width, material[i].length, material[i].usize, material[i].thick, material[i].uthick, material[i].price, material[i].size);
				a_material.push(t);
			}
		}

		$('input#txt_product_material').val(YAHOO.lang.JSON.stringify(a_material));

        var v_sku = $('#txt_error').val();
        if(v_sku!=0)
        {
            alert('<?php echo $cls_tb_message->select_value('invalid_product_sku'); ?>');
            $("#txt_product_sku").addClass('invalid');
            $("#txt_product_sku").focus();
            return false;
        }

        var threshold = '';
        if(list_threshold.length>0){
            $('select#txt_location_threshold option').each(function(index, element){
                if($(this).attr('selected')){
                    list_threshold[index].overflow = 1;
                }else{
                    list_threshold[index].overflow = 0;
                }
            });
            threshold = YAHOO.lang.JSON.stringify(list_threshold);
        }
        $('input#txt_hidden_location_threshold').val(threshold);
		return true;
	});
	$('input#txt_package_type').click(function(e) {
        var c = $(this).attr('checked')?true:false;
		if(c){
			$('span#sp_multiple').css('display', '');
			var q = $('input#txt_package_quantity').val();
			q = parseInt(q, 10);
			if(isNaN(q) || q<=1) q = 10;
			$('input#txt_package_quantity').val(q);
		}else{
			$('span#sp_multiple').css('display', 'none');
		}
    });
	$('input#txt_is_threshold').click(function(e) {
        var chk = $(this).attr('checked')=='checked'?true:false;
		if(chk){
			var old = $('input#txt_hidden_threshold').val();
			old = parseInt(old, 10);
			if(isNaN(old) || old<0) old = 0;
			$('input#txt_product_threshold').val(old);
			$('input#txt_product_threshold').attr('disabled', false);
		}else{
			$('input#txt_product_threshold').val('');
			$('input#txt_product_threshold').attr('disabled', true);
		}
    });

	$('img.img_action').each(function(index, element) {
        $(this).click(function(e) {
            var flag = $(this).attr('data-flag');
            if(flag=='material'){
                var i = $(this).attr('data-id');
                var t = $(this).attr('data-thick');
                var c = $(this).attr('data-color');
                var us = $(this).attr('data-unit-size');
                var ut = $(this).attr('data-unit-thick');
                var w = $(this).attr('data-width');
                var l = $(this).attr('data-length');
                var p = $(this).attr('data-price');
                i = parseInt(i, 10);
                if(isNaN(i) || i<0) i = 0;
                t = parseFloat(t);
                if(isNaN(t) || t<0) t=0;
                p = parseFloat(p);
                if(isNaN(p) || p<0) p=0;
                w = parseFloat(w);
                l = parseFloat(l);

                if(remove_material(i, c, w, l, us, t, ut)) $(this).parent().remove();
            }else if(flag=='text'){
                $(this).parent().remove();
            }
        });
    });
	$('select#txt_company_id').change(function(e) {
		var $this = $(this);
        var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
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

    $("a[rel=product_images]").fancybox({
        'showNavArrows'         : false,
        'width'                 : 1000,
        'height'                : 600,
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe'
    });

    $("a[rel=excluded_location]").fancybox({
        'showNavArrows'         : false,
        'width'                 : 800,
        'height'                : 400,
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe',
		'hideOnOverlayClick'	: false,
		onClosed	:	function(){
		    if(list_excluded.length>0){
                $('select#txt_excluded_location option').remove();
                for(var i=0; i<list_excluded.length; i++){
                    var $opt = $('<option value="'+list_excluded[i][0]+'" selected="selected">'+list_excluded[i][1]+'</option>');
                    $('select#txt_excluded_location').append($opt);
                }
                $('div#excluded_location').css('display','');
            }
		}
    });
    $("a[rel=location_threshold]").fancybox({
        'showNavArrows'         : false,
        'width'                 : 620,
        'height'                : 400,
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe',
        'hideOnOverlayClick'	: false,
        onClosed	:	function(){
            $('select#txt_location_threshold option').remove();

            for(var i=0; i<list_threshold.length; i++){
                var $opt = $('<option value="'+list_threshold[i].location_id+'"'+(list_threshold[i].overflow==1?' selected="selected"':'')+'>['+list_threshold[i].threshold+'] '+list_threshold[i].location_name+'</option>');
                $('select#txt_location_threshold').append($opt);
            }
            $('div#location_threshold').css('display',$('select#txt_location_threshold option').length>0?'':'none');
        }
    });

    $('select#txt_company_id').change(function(e) {
        var $this = $(this);
        var company_id = $(this).val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        $.ajax({
            url : '<?php echo URL;?>admin/product/tags/ajax',
            type    : 'POST',
            data    :   {txt_company_id: company_id},
            beforeSend: function(){
                $this.attr('disabled', true);
            },
            success: function(data, type){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    $('select#txt_tag_id').html(ret.data);
                }else{
                    alert(ret.message);
                }
                $this.attr('disabled', false);
            }
        });

        $.ajax({
            url : '<?php echo URL .'/admin/product/product-group/ajax';?>',
            type    : 'POST',
            data    :   {txt_company_id: company_id},
            beforeSend: function(){
                $this.attr('disabled', true);
            },
            success: function(data){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    $('select#txt_product_threshold_group_id').html(ret.data);
                }else{
                    alert(ret.message);
                }
                $this.attr('disabled', false);
            }
        });
    });

    $('input#txt_product_sku').focusout(function(){
        var v_old_product_sku = '<?php echo $v_product_sku; ?>';
        var v_new_product_sku = $('#txt_product_sku').val();

        if(v_old_product_sku!=v_new_product_sku)
        {
            $.ajax({
                url	    :'<?php echo URL.$v_admin_key ?>/check',
                type	:'POST',
                data	:{txt_type:'SKU',txt_product_sku:$.trim(v_new_product_sku)},
                beforeSend: function(){
                    $('#sp_product_sku').removeClass();
                    $('#sp_product_sku').html('Checking!....');
                },

                success: function(data, type){
                    var ret = $.parseJSON(data);
                    $('#sp_product_sku').html(ret.message);
                    if(ret.error==0)
                        $('#sp_product_sku').addClass('success');
                    else
                        $('#sp_product_sku').addClass('error');

                    $('#txt_error').val(ret.error);
                }
            });
        }
    });
	$('select#txt_material_id').change(function(e) {
        var id = $(this).val();
		id = parseInt(id, 10);
		if(isNaN(id)) id = 0;
		if(id<=0) return;
		var $this = $(this);
		$.ajax({
			type	: 'POST',
			url:	"<?php echo URL.$v_admin_key;?>/material_option",
			data	: {txt_material_id: id},
			beforeSend: function(){
				$this.attr('disabled', true);
			},
			success: function(data, status){
				var content = $.parseJSON(data);
				if(content.error == 0){
					var option = content.option;
					opt = new Array();
					for(var i=0; i<option.length;i++){
						opt[i] = new Option(option[i].thick, option[i].unit_code, option[i].unit_name, option[i].color_code, option[i].color_name);
					}
					var list_thick='';
					var list_unit='';
					var list_color='';
					$('select#txt_thick option').remove();
					var j=0;
					for(var i=0; i<opt.length; i++){
						if(list_thick.indexOf(opt[i].thick+',')==-1){
							list_thick += opt[i].thick+',';
							var $opt = $('<option value="'+opt[i].thick+'">'+opt[i].thick+'</option>'); 
							$('select#txt_thick').append($opt);
							j++;
						}
					}
					if(j>0){
						$('select#txt_thick option').eq(0).attr('selected', true);
						$('select#txt_thick').trigger('change');
					}
					
				}else{
					alert(content.message);
				}
				$this.attr('disabled', false);
			}
		});
    });
	$('select#txt_thick').change(function(e) {
        var thick = $(this).val();
		thick = parseFloat(thick);
		var list_unit = ''; 
		var j = 0;
		$('select#txt_thick_unit option').remove();
		for(var i=0; i<opt.length; i++){
			if(thick==opt[i].thick){
				if(list_unit.indexOf(opt[i].unit_code+',')==-1){
					list_unit += opt[i].unit_code+',';
					var $opt = $('<option value="'+opt[i].unit_code+'">'+opt[i].unit_name+'</option>');
					$('select#txt_thick_unit').append($opt);
					j++;
				}
			}
		}
		if(j>0){
			$('select#txt_thick_unit option').eq(0).attr('selected', true);
			$('select#txt_thick_unit').trigger('change');
		}
    });
	$('select#txt_thick_unit').change(function(e) {
        var unit_code = $(this).val();
		var thick = $('select#txt_thick').val();
		thick = parseFloat(thick);
		var list_color = ''; 
		$('select#txt_color option').remove();
		for(var i=0; i<opt.length; i++){
			if(thick==opt[i].thick && unit_code==opt[i].unit_code){
				if(list_color.indexOf(opt[i].color_code+',')==-1){
					list_color += opt[i].color_code+',';
					var $opt = $('<option value="'+opt[i].color_code+'">'+opt[i].color_name+'</option>');
					$('select#txt_color').append($opt);
				}
			}
		}
    });
});
var current_color = '#000000';
var material = new Array();
<?php
echo $v_dsp_material_script;
?>
var count_text = <?php echo $v_text_count;?>;

function remove_material(m, c, w, l, us, t, ut){
	var r = false;
	for(var i = 0; i< material.length; i++){
		if(material[i].compare(m, c, w, l, us, t, ut)){
			material[i].remove();
			r = true;
		}
	}
	return r;
}

function Material(id, name, color, width, length, usize, thick, uthick, price, sop){
	var t = parseInt(id, 10);
	if(isNaN(t) || t<0) t= 0; 
	this.id = t;
	this.name = name;
	this.color = color;
	t = parseFloat(width);
	if(isNaN(t) || t<0) t = 0;
	this.width = t;
	t = parseFloat(length);
	if(isNaN(t) || t<0) t = 0;
	this.length = t;
	
	t = parseFloat(thick);
	if(isNaN(t) || t<0) t  = 0;
	if (t == 0) {
		uthick = 'none';
	}
	this.thick = t;
	this.uthick = uthick;
	this.usize = usize;
	t = parseFloat(price);
	if(isNaN(t) || t<0) t  = 0;
    price = parseFloat(price);
    if(isNaN(price)) price = 0;
	this.price = price;
	this.size = sop!=1?0:1; 
	this.status = 0;
}
Material.prototype.compare = function(m, c, w, l, us, t, ut){
	//alert('id: '+m+' - c: '+c + ' -w: '+w + ' -l: '+l + ' -us: '+us + ' -t: '+t + ' -us: '+us);
	return (this.id == m && this.color==c && this.width == w && this.length==l && this.thick==t && this.usize==us && this.uthick == ut && this.status==0);
}
Material.prototype.remove = function(){
	this.status = 1;
}
function Option(thick, unit_code, unit_name, color_code, color_name){
	thick = parseFloat(thick);
	this.thick = thick;
	this.unit_code = unit_code;
	this.unit_name = unit_name;
	this.color_code = color_code;
	this.color_name = color_name;
}
var opt = new Array();
function add_material(obj){
	var mid = $('select#txt_material_id').val();
	var m = $('select#txt_material_id option:selected').text();
	mid = parseInt(mid, 10);

	var w = $('input#txt_size_width').val();
	w = parseFloat(w);
	if(isNaN(w)) w = 0;

	var l = $('input#txt_size_length').val();
	l = parseFloat(l);
	if(isNaN(l)) l = 0;

	if (l*w == 0) {
		if ((l + w) != 0) {
            alert('<?php echo $cls_tb_message->select_value('invalid_size_is_not_customizable'); ?>');
			return;
		}
	}
	var us = $('select#txt_size_unit').val();
	if (l*w != 0) {
		if (us == 'none') {
            alert('<?php echo $cls_tb_message->select_value('invaild_input_unit_of_size'); ?>');
			return;
		}
	}

	var thick = $('select#txt_thick').val();
	thick = $.trim(thick);

	var ut = $('select#txt_thick_unit').val();
	var p = $('input#txt_price').val();
	p = $.trim(p);
	if(p!='') p = parseFloat(p);
	if (l*w != 0) {
		if(isNaN(p) || p<0){
            alert('<?php echo $cls_tb_message->select_value('invalid_input_valid_value_price'); ?>');
			$('input#txt_price').focus();
			return;
		}		
	}
	if(mid > 0){
		if(isNaN(p) || p<0){
            alert('<?php echo $cls_tb_message->select_value('invalid_input_valid_value_price_material'); ?>');
			$('input#txt_price').focus();
			return;
		}	
	}
		

	current_color = $('select#txt_color').val();
	var size = $('input#txt_allow_size_option').attr('checked')?1:0;
	if (size == 1) {
		if(p=='' || isNaN(p) || p<=0){
            alert('<?php echo $cls_tb_message->select_value('invalid_input_valid_value_price_size_customizable'); ?>');
			$('input#txt_price').focus();
			return;
		}		
	}
	if (w == 0 && l == 0 && size == 0) {
        alert('<?php echo $cls_tb_message->select_value('invalid_input_size_option'); ?>');
		$('input#txt_allow_size_option').focus();
		return;
	}

	var temp = new Material(mid, m, current_color,w,l,us, thick, ut, p, size);
	var f= false;
	var pos = 0;
	for(var i=0; (i< material.length) && !f;i++){
		f = material[i].compare(mid, current_color, w, l, us, thick, ut); 
		if(f) pos = i;
	}
	if(!f){	
		material.push(temp);

		var $div = $('<div class="node" style="color:#000;margin-top: 10px;" id="material_'+pos+'">'+m+' ('+w+' &times; '+l+' '+us+') '+thick+' '+ut+' &rArr; $'+p+' - Color'+current_color+'</div>');
		var $img = $('<img class="img_action" id="img_material_'+pos+'" data-id="'+mid+'" data-name="'+m+'" data-width="'+w+'" data-length="'+l+'" data-unit-size="'+us+'" data-thick="'+thick+'" data-unit-thick="'+ut+'" data-price="'+p+'" data-color="'+current_color+'" data-size="'+size+'" data-flag="material" src="images/icons/delete.png" />');
		$img.bind('click', function(){
			var id = $(this).attr('data-id');
			var m = $(this).attr('data-name');
			var c = $(this).attr('data-color');
			var w = $(this).attr('data-width');
			var l = $(this).attr('data-length');
			var us = $(this).attr('data-unit-size');
			var ut = $(this).attr('data-unit-thick');
			var t = $(this).attr('data-thick');
			var p = $(this).attr('data-price');
			var size = $(this).attr('data-size');
			id = parseInt(id, 10);
			if(isNaN(id) || id<0) id = 0;
			p = parseFloat(p);
			if(isNaN(p) || p<0) p = 0;			
			t = parseFloat(t);
			if(isNaN(t) || t<0) t = 0;			
			w = parseFloat(w); if(isNaN(w)) w = 0;
			l = parseFloat(l); if(isNaN(l)) l = 0;
			t = parseFloat(t); if(isNaN(t)) t = 0;
			//remove_size_select(w, h, u);
			//alert('click here');
			if(remove_material(id, c, w, l, us, t, ut)) $(this).parent().remove();
		});
		$div.append($img);
		var $pdiv = $('div#product_material');
		
		$pdiv.append($div);

	}else{
		material[pos].status = 0;
	}
}
function add_text(){
	var $p = $('<p text="'+count_text+'" class="one_text"></p>');
	var $t = $('<input data-text="'+count_text+'" class="text_css" size="50" type="text" id="txt_product_text" name="txt_product_text[]" value="" />');
	var $i = $('<img class="img_action" data-flag="text" data-text="'+count_text+'" style="cursor:pointer" src="images/icons/delete.png" />');
	$i.bind('click', function(){
		$(this).parent().remove();
	});
	var $l = $('<label text="'+count_text+'" id="lbl_product_text" style="color:red;display:none;">(*)</label>');
	$p.append($t);
	$p.append($i);
	$p.append($l);
	$('div#product_text').append($p);
}
function remove_text(obj){
	var id = obj.id;
	$('img#'+id).parent().remove();
}
function Threshold(location_id, location_name, threshold, overflow){
    var val = 0;
    val = location_id;
    val = parseInt(val, 10);
    if(isNaN(val) || val<0) val = 0;
    this.location_id = val;
    this.location_name = location_name;
    val = threshold;
    val = parseInt(val, 10);
    if(isNaN(val) || val<0) val = 0;
    this.threshold = threshold;
    this.overflow = overflow==1?1:0;
}
var list_excluded = new Array();
var list_threshold = new Array();
<?php
echo $v_dsp_script_threshold;
?>
</script>
<link href="lib/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
<script src="lib/colorpicker/colorpicker.js" type="text/javascript"></script>
<link href="lib/dropdownchecklist/ui.dropdownchecklist.standalone.css" rel="stylesheet" type="text/css" />
<script src="lib/dropdownchecklist/ui.dropdownchecklist-1.4-min.js" type="text/javascript"></script>

<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>

<style type="text/css">
#colorSelector {
	position: relative;
	width: 36px;
	height: 36px;
	background: url(lib/colorpicker/images/select2.png);
}
#colorSelector span {
	position: absolute;
	top: -20px;
	display:block;
	left: 3px;
	width: 30px;
	height: 30px;
	background: url(lib/colorpicker/images/select2.png) center;
}
div#div_material{
}
div#div_material div.one{
	float:left;
	margin-left:5px;
	max-width:100px;
	border:#03C 1px solid;
	border-radius:3px;
	height:30px;
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
	overflow:hidden;
}
select{
    font-size: 12px;
}
</style>
<!--[if lt IE 10]>
<style>
#colorSelector span { top:-10px; }
</style>
<![endif]-->

<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/product/products'; ?>">  Product  </a> &gt&gt Insert - Update Product</p>
<p class="highlightNavTitle"><span> Insert - Update Product  </span></p>
<p class="break"></p>
<noscript><label style="color:red; font-weight:bold">This page need enabled JAVASCRIPT to work!!!</label></noscript>
<form id="frm_tb_product" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_product_id.'/edit'?>" method="POST" enctype="multipart/form-data">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_product_id" name="txt_product_id" value="<?php echo $v_product_id;?>" />
<input type="hidden" id="txt_page" name="txt_page" value="<?php echo $v_page;?>" />
<input type="hidden" id="txt_error" name="txt_error" value="0">

<div id="tab-container" class='tab-container'>
    <ul class='etabs'>
        <li class='tab'><a href="#tab_product">Product infomation </a></li>
        <li class='tab'><a href="#tab_threshold">Threshold </a></li>
    </ul>
    <div class='panel-container'>
        <div id="tab_product">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <?php if($v_error_message!=''){?>
            <tr align="left" valign="top">
                <td colspan="4"><?php echo $v_error_message;?>&nbsp;</td>
            </tr>
        <?php }?>
        <tr align="right" valign="top">
            <td>Company</td>
            <td>&nbsp;</td>
            <td align="left" >
                <select id="txt_company_id" name="txt_company_id">
                    <option value="0" selected="selected">-------</option>
                    <?php echo $v_dsp_company_draw;?>
                </select>
                <label id="lbl_company_id" style="color:red;display:none;">(*)</label>
            </td>
            <td class="product-image" align="center" rowspan="4" valign="top"><?php echo $v_image_url!=''? $v_image_url :'';?>&nbsp;</td>
        </tr>
        <tr align="right" valign="top">
            <td>Location</td>
            <td>&nbsp;</td>
            <td align="left" >
                <select id="txt_location_id" name="txt_location_id">
                    <option value="0" selected="selected">--------</option>
                    <?php echo $v_dsp_location_draw;?>
                </select>
                <label id="lbl_location_id" style="color:red;display:none;">(*)</label></td>
        </tr>
        <tr align="right" valign="top">
            <td>Product Group for Threshold </td>
            <td width="30">&nbsp;</td>
            <td align="left">
                <select id="txt_product_threshold_group_id" name="txt_product_threshold_group_id">
                    <?php echo $cls_tb_product_group->draw_all_product_option($v_company_id,0,$v_product_threshold_group_id); ?>
                </select>
                <span id="sp_product_sku"></span>
            </td>
        </tr>

        <tr align="right" valign="top">
            <td>Product Sku</td>
            <td width="30">&nbsp;</td>
            <td align="left">
                <input class="text_css" size="50" type="text" id="txt_product_sku" name="txt_product_sku" value="<?php echo $v_product_sku;?>" />
                <label id="lbl_product_sku" style="color:red;display:none;">(*)</label>
                <span id="sp_product_sku"></span>
            </td>

        </tr>
        <tr align="right" valign="top">
            <td>Short Description</td>
            <td>&nbsp;</td>
            <td align="left"><input class="text_css" size="50" type="text" id="txt_short_description" name="txt_short_description" value='<?php echo $v_short_description;?>' /> <label id="lbl_short_description" style="color:red;display:none;">(*)</label></td>
        </tr>
        <tr align="right" valign="top">
            <td>Long Description</td>
            <td>&nbsp;</td>
            <td align="left">
                <input class="text_css" size="50" type="text" id="txt_long_description" name="txt_long_description" value='<?php echo $v_long_description;?>' /> <label id="lbl_long_description" style="color:red;display:none;">(*)</label></td>
            <td align="center">
                <?php if($v_product_id>0){?>
                    <a rel="product_images" href="<?php echo URL.$v_admin_key.'/'.$v_product_id.'/images';?>"> Upload more images </a><br>
                    Total images of product : <?php echo $v_total_product_images; ?>
                <?php }?>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Number of Images for this product</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <select id="txt_num_images" name="txt_num_images">
                    <?php
                    for($i=1; $i<=9;$i++){
                        echo '<option value="'.$i.'"'.($i==$v_num_images?' selected="selected"':'').'>0'.$i.'</option>';
                    }
                    ?>
                </select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <label><input type="checkbox" name="txt_image_choose" id="txt_image_choose" value="1"<?php echo $v_image_choose==1?' checked="checked"':'';?> /> Allow choose image for product</label>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Product Detail</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <textarea rows="5" cols="60" id="txt_product_detail" name="txt_product_detail" > <?php echo $v_product_detail;?></textarea>
                <label id="lbl_product_detail" style="color:red;display:none;">(*)</label>
            </td>
        </tr>

        <tr align="right" valign="top">
            <td>Thumbnail for product</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <input type="hidden" name="txt_hidden_image_file"  value="<?php echo $v_image_file;?>" />
                <input type="hidden" name="txt_hidden_image_desc"  value="<?php echo $v_image_desc;?>" />
                <input type="hidden" name="txt_hidden_saved_dir"  value="<?php echo $v_saved_dir;?>" />
                <input class="text_css" size="50" type="file" id="txt_image_file" name="txt_image_file" />
            </td>
        </tr>

        <tr align="right" valign="top">
            <td>File Hight Resolution</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <input class="text_css" size="50" type="text" id="txt_file_hd" name="txt_file_hd" value='<?php echo $v_file_hd;?>' />
            </td>
        </tr>

        <tr align="right" valign="top">
            <td>Print's Type</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2"><label>
            <input type="radio" value="0" id="txt_print_type" name="txt_print_type"<?php echo $v_print_type==0?' checked="checked"':'';?> /> <?php echo $cls_settings->get_option_name_by_id('print_type',0);?></label> /
            <label><input type="radio" value="1" id="txt_print_type" name="txt_print_type"<?php echo $v_print_type==1?' checked="checked"':'';?> /> <?php echo $cls_settings->get_option_name_by_id('print_type',1);?></label> /
            <label><input type="radio" value="2" id="txt_print_type" name="txt_print_type"<?php echo $v_print_type==2?' checked="checked"':'';?> /> <?php echo $cls_settings->get_option_name_by_id('print_type',2);?></label>
            </td>
        </tr>

        <tr align="right" valign="top">
            <td>Image Option</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2"><label><input type="checkbox" id="txt_image_option" name="txt_image_option" value="1"<?php echo $v_image_option==1?' checked="checked"':'';?> /> Allow customize</label></td>
        </tr>
        <tr align="right" valign="top">
            <td>Size Option</td>
            <td align="center">&nbsp;</td>
            <td align="left" colspan="2">
                <label><input type="checkbox" id="txt_size_option" name="txt_size_option" value="1"<?php echo $v_size_option==1?' checked="checked"':'';?> /> Allow customize</label>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Material</td>
            <td align="center">&nbsp;<img src="images/icons/add.png" style="cursor:pointer" title="Add Material" onclick="add_material(this)" /></td>
            <td align="left" colspan="2">
                <table cellpadding="2" cellspacing="2" width="100%" class="grid_table">
                    <tr>
                        <td>
                            Width: <input class="text_css" size="10" type="text" id="txt_size_width" name="txt_size_width" value="0"  />
                            &times; Length:
                            <input class="text_css" size="10" type="text" id="txt_size_length" name="txt_size_length" value="0"  /> &nbsp;&nbsp;Size Unit <select id="txt_size_unit" name="txt_size_unit">
                                <?php echo $v_dsp_size_unit_draw;?>
                            </select>
                            &nbsp;&nbsp;
                            <label for="txt_material_id">Material: </label>
                            <select id="txt_material_id" name="txt_material_id">
                                <option value="0" selected="selected">-------</option>
                                <?php echo $v_dsp_material_draw;?>
                            </select>

                            <label for="txt_thick">Thickness: 
                            <select id="txt_thick" name="txt_thick">
                            	<option value="0" selected="selected">----</option>
                            </select>
                            <!--
                            <input size="10" type="text" value="" id="txt_thick" name="txt_thick" onkeydown="forceNumericInput(this, true, false, event)" />--> </label>
                            Thickness Unit:
                            <select id="txt_thick_unit" name="txt_thick_unit">
                            	<option value="" selected="selected">----</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="txt_color">Color: </label>
                        <span id="sp_color">
                            <select id="txt_color" name="txt_color">
                                <option value="" selected="selected">-------</option>
                                <?php
                                //foreach($arr_color as $k=>$v){
                                //    echo '<option value="'.$k.'"'.($k=='Black'?' selected="selected"':'').'>'.$k.'</option>';
                                //}
                                //echo $v_dsp_color_draw;
                                ?>
                            </select>
                        </span>
                            <label for="txt_price">Price (<?php echo $v_sign_money;?>): <input size="10" type="text" value="" id="txt_price" name="txt_price" onkeydown="forceNumericInput(this, true, false, event)" /> </label>
                            <label for="txt_allow_size_option"><input type="checkbox" value="1" id="txt_allow_size_option" name="txt_allow_size_option" /> Allow size option </label>
                            <div id="product_material"><?php echo $v_dsp_material_list;?></div><input type="hidden" id="txt_product_material" name="txt_product_material" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Text</td>
            <td align="center">&nbsp;<img src="images/icons/add.png" style="cursor:pointer" title="Add" onclick="add_text(this)" /></td>
            <td align="left" colspan="2">
                <div id="product_text">
                    <!--
        <p class="one_text">
        <input class="text_css" size="50" type="text" id="txt_product_text" name="txt_product_text[]" value="<?php echo $v_product_text;?>" /> <label id="lbl_product_text" style="color:red;display:none;">(*)</label></p>-->
                    <?php
                    echo $v_dsp_text_list;
                    ?>
                </div>
            </td>
        </tr>
        <tr align="right" valign="top">
            <td>Text Option</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2"><label><input type="checkbox" id="txt_text_option" name="txt_text_option" value="1"<?php echo $v_text_option==1?' checked="checked"':'';?> /> Allow customize</label></td>
        </tr>
        <tr align="right" valign="top">
            <td>Is Multiple?</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2"><label><input type="checkbox" id="txt_package_type" name="txt_package_type" value="1"<?php echo $v_package_type==1?' checked="checked"':'';?> /> </label> &nbsp;&nbsp;&nbsp;&nbsp;<span id="sp_multiple"<?php echo $v_package_type==0?' style="display:none"':'';?>>Quantity for Multiple <input type="text" name="txt_package_quantity" size="10" id="txt_package_quantity" value="<?php echo $v_package_type==1?$v_package_quantity:'1';?>" /> <label style="color:red; display:none;" id="lbl_package_quantity">(*)</label> &nbsp;&nbsp;&nbsp;&nbsp;<label>Allow Single <input type="checkbox" id="txt_allow_single" name="txt_allow_single" disabled="disabled" value="1"<?php //echo $v_allow_single==1?' checked="checked"':'';?> /></label></span></td>
        </tr>
        <tr align="right" valign="top">
            <td>Sold By</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <select id="txt_sold_by" name="txt_sold_by">
                    <?php echo $v_dsp_sold_by;?>
                </select>
                <label id="lbl_sold_by" style="color:red;display:none;">(*)</label></td>
        </tr>
        <tr align="right" valign="top">
            <td>Default Price</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2"><input class="text_css" size="50" type="text" id="txt_default_price" name="txt_default_price" value="<?php echo $v_default_price;?>" onkeydown="forceNumericInput(this, true, false, event)" /> <label id="lbl_default_price" style="color:red;display:none;">(*)</label></td>
        </tr>
        <tr align="right" valign="top">
            <td>Status</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <select id="txt_product_status" name="txt_product_status">
                    <?php
                    echo $v_dsp_product_status_draw;
                    ?>
                </select>
                <label id="lbl_product_status" style="color:red;display:none;">(*)</label></td>
        </tr>

        <tr align="right" valign="top">
            <td>Product Tag</td>
            <td>&nbsp;</td>
            <td align="left" colspan="2">
                <select id="txt_tag_id" name="txt_tag_id[]" multiple="multiple" style="width:250px">
                    <?php echo $v_dsp_tag_draw_multi;?>
                </select> <br />
            </td>
        </tr>
        </table>
        </div>
        <div id="tab_threshold">
            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                <tr align="right" valign="top">
                    <td width="250px">Approved Threshold</td>
                    <td width="20px">&nbsp;</td>
                    <td align="left" colspan="2">
                        <label><input type="checkbox" name="txt_is_threshold" id="txt_is_threshold" value="1"<?php echo $v_product_threshold>=0?' checked="checked"':'';?> />Threshold?</label> &nbsp;
                        <input type="text" size="10" name="txt_product_threshold" id="txt_product_threshold" value="<?php echo $v_product_threshold>=0?$v_product_threshold:'';?>"<?php echo $v_product_threshold<0?' disabled="disabled"':'';?>  onkeydown="forceNumericInput(this, true, false, event)" />
                        <input type="hidden" id="txt_hidden_threshold" value="<?php echo $v_product_threshold;?>" />
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Locations' Threshold</td>
                    <td>&nbsp;<a rel="location_threshold" href="<?php echo URL.$v_admin_key.'/'.$v_product_id.'/threshold';?>"><img width="16" src="<?php echo IMAGE_URL.'icons/table_edit.png';?>" border="0" title="Edit list excluded locations" /></a></td>
                    <td align="left" colspan="2">
                        <div <?php echo $v_dsp_location_threshold==''?' style="display:none"':'';?> id="location_threshold">
                            <select id="txt_location_threshold" name="txt_location_threshold[]" multiple="multiple" style="width:300px; height:200px">
                                <?php echo $v_dsp_location_threshold;?>
                            </select> <br />
                            <input type="hidden" name="txt_hidden_location_threshold" id="txt_hidden_location_threshold" />
                            <span style="color:#00709F">Selected item means that locations are allowed to exceed threshold.</span>
                        </div>&nbsp;
                    </td>
                </tr>
                <tr align="right" valign="top">
                    <td>Excluded Locations</td>
                    <td>&nbsp;<a rel="excluded_location" href="<?php echo URL.$v_admin_key.'/'.$v_product_id.'/exclude';?>"><img width="16" src="<?php echo IMAGE_URL.'icons/table_edit.png';?>" border="0" title="Edit list excluded locations" /></a></td>
                    <td align="left" colspan="2">
                        <div <?php echo $v_dsp_excluded_location==''?' style="display:none"':'';?> id="excluded_location">
                            <select id="txt_excluded_location" name="txt_excluded_location[]" multiple="multiple" style="width:300px; height:200px">
                                <?php echo $v_dsp_excluded_location;?>
                            </select> <br />
                            <!--<span style="color:#00709F">Hold down "Control", or "Command" on a Mac, to select more than one.</span>-->
                        </div>&nbsp;
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<p class="msgbox_success">
<input  type="submit" id="btn_submit_tb_product" name="btn_submit_tb_product" value="Update Product" class="button" />
</p>

</form>
<img src="images/icons/delete.png" style="display:none" />