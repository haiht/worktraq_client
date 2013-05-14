// JavaScript Document
var material;
var material_value = '';
var order = '';
var image_name = '';
var text_option = 0;
var product = null;
function load_ajax(pid, oid){
	//alert(id);
	$.ajax({
		url	:	'[@ajax_load_product_url]',
		type	:	'POST',
		data	:	{txt_product_id:pid, txt_order_id:oid, txt_session_id:'[@session_id]', txt_order_ajax:100},
		beforeSend: function(){
		},
		success	: function(data, type){
			//alert(data);
			var err = readKey('error', data, 'int');
			var msg = readKey('message', data);
			if(err==0){
				var pd = readKey('product', data);
				//alert(pd);
				if(pd!=''){
					pd = replaceText(pd,'&ldquo;','{');
					pd = replaceText(pd,'&rdquo;','}');
					product = jQuery.parseJSON(pd);
				}else product = null;
				msg = replaceText(msg,'&ldquo;','{');
				msg = replaceText(msg,'&rdquo;','}');
				
				//alert(msg);
				var obj = jQuery.parseJSON(msg);
				$('h4#product_detail').html(obj.product_sku+' - '+obj.product_detail);
				$('input#txt_product_detail').val(obj.product_detail);
				$('input#txt_product_sku').val(obj.product_sku);
				var $img = $('<img width="148" height="148" src="[@url]images/products/'+pid+'/'+obj.image_file+'" />');
				$('div.image-item').children('img').remove();
				$('div.image-item').append($img);	
				image_name = obj.image_file;
				$('div#product_description').html('<p>'+obj.short_description+'</p><p>'+obj.long_description+'</p>');			
				var size = obj.size;
				$('select#product_size option').remove();
				var $opt = $('<option value="" selected="selected">Select...</option>');
				$('select#product_size').append($opt);
				for(var i=0; i<size.length; i++){
					$opt = $('<option value="'+size[i].width+'-'+size[i].height+'-'+size[i].unit+'">'+size[i].width+' &times; '+size[i].height+' '+size[i].unit+'</option>');
					$('select#product_size').append($opt);
				}
                if(obj.size_option==1){
                    $opt = $('<option value="custom">Custom...</option>');
                    $('select#product_size').append($opt);
                }
				
				material = obj.material;
				setup_material();
				
				var text = obj.text;
				$('ul#product_text li').remove();
				text_option = obj.text_option;
				if(obj.text_option==1){
					var ttext;
					if(product!=null) {
						ttext = product.product_text;
					}else{
						ttext = new Array();
						for(var i=0;i<text.length; i++){
							ttext[i] = text[i].text;
						}
					}
					for(var i=0; i<ttext.length;i++){
						$opt = $('<li><label for="field-'+(i+1)+'">Field '+(i+1)+': </label><input name="txt_product_text" id="field-'+(i+1)+'" type="text" class="" value="'+ttext[i]+'" /></li>');
						$('ul#product_text').append($opt);
					}
				}
				$('input#txt_product_id[type="hidden"]').val(pid);
				$('label#lbl_price').html(obj.default_price);
				var q = $('input#product_quantity').val();
				q = parseInt(q,10);
				if(isNaN(q) || q<=0) q = 1;
				$('span.price-ex').html((obj.default_price*q)+'$');
				
				setup_startup();
			}else{
				alert(readKey('message', data));
			}
		}
	});
}

function setup_startup(){
	//alert('ST');
	if(product==null) return;
	
	var $img = $('<img width="148" height="148" src="[@url]images/products/'+product.product_id+'/'+product.product_image+'" />');
	$('div.image-item').children('img').remove();
	$('div.image-item').append($img);
	
	$('select#product_size').val(product.size_width+'-'+product.size_height+'-'+product.size_unit);
	$('select#product_material').val(product.material_id);
	$('select#product_material').trigger('change');
	$('select#material_thickness').val(product.material_thickness_value+'-'+product.material_thickness_unit);
	$('select#material_thickness').trigger('change');
	$('select#material_color').val(product.material_color);

	$('label#lbl_price').html(product.product_price);
	//alert(product.product_price);
	//alert(product.product_quantity);
	$('input#product_quantity').val(product.product_quantity);
	$('span.price-ex').html((product.product_price*product.product_quantity)+'$');

			
}
function setup_material(){
	var $msel = $('select#product_material');
	var $tsel = $('select#material_thickness');
	//alert($tsel.html());
	var $csel = $('select#material_color');
	$('select#product_material option').remove();
	$('select#material_thickness option').remove();
	$('select#material_color option').remove();
	var $opt = $('<option value="" selected="selected">Select...</option>');
	$msel.append($opt);
	$opt = $('<option value="" selected="selected">Select...</option>');
	$tsel.append($opt);
	$opt = $('<option value="" selected="selected">Select...</option>');
	$csel.append($opt);
	var list = '';
	var items = '';
	for(var i=0; i<material.length; i++){
		items = material[i].material;
		if(list.indexOf(','+items)==-1){
			$opt = $('<option value="'+material[i].material+'">'+material[i].material_name+'</option>');
			$msel.append($opt);
			list +=','+items;
		}
	}
}
function setup_thickness(sel){
	var val = sel.value;
	var $tsel = $('select#material_thickness');
	$('select#material_thickness option').remove();
	var $csel = $('select#material_color');
	$('select#material_color option').remove();
	var $opt = $('<option value="" selected="selected">Select...</option>');
	$tsel.append($opt);
	$opt = $('<option value="" selected="selected">Select...</option>');
	$csel.append($opt);
	var list = '';
	var items = '';
	var thick='';
	for(var i=0; i<material.length; i++){
		items = material[i].material;
		if(items+''==val+''){
			thick = material[i].thickness +' '+material[i].unit;
			if(list.indexOf(','+items)==-1){
				$opt = $('<option value="'+material[i].thickness +'-'+material[i].unit+'">'+material[i].thickness +' '+material[i].unit+'</option>');
				$tsel.append($opt);
				list +=','+items;
			}
		}
	}
	material_value = val;
}
function setup_color(sel){
	var val = sel.value;
	var $csel = $('select#material_color');
	$('select#material_color option').remove();
	var $opt = $('<option value="" selected="selected">Select...</option>');
	$csel.append($opt);
	var list = '';
	var items = '';
	var thick='';
	var color='';
	var price = 0;
	for(var i=0; i<material.length; i++){
		items = material[i].material;
		thick = material[i].thickness+'-'+material[i].unit;
		if(items+''==material_value+'' && thick==val){
			color = material[i].color;
			if(list.indexOf(','+color)==-1){
				$opt = $('<option style="color:'+color+'" value="'+color+'">'+color+'</option>');
				$csel.append($opt);
				list +=','+color;
			}
		}
	}
}

function check_and_order(){

	var product_id = $('input#txt_product_id').val();
    product_id = parseInt(product_id, 10);
    if(isNaN(product_id)|| product_id<=0){
        alert('Invalid data!');
        return false;
    }
	var size = $('select#product_size').val();
    if(size==''){
        alert('Please choose size for this product!');
        return false;
    }
    if(size=='custom'){
        var size_width = $('input#custom-width').val();
        var size_height = $('input#custom-height').val();
        size_width = $.trim(size_width);
        size_height = $.trim(size_height);
        if(size_width=='' || size_height==''){
            alert('Please input size of width or size of height!');
            return false;
        }
        var size_unit = 'in';
    }else{
        var arr_size = size.split('-');
        if(arr_size.length!=3){
            alert('Invalid product size!');
            return false;
        }
        var size_width = arr_size[0];
        var size_height = arr_size[1];
        var size_unit = arr_size[2];
    }
    /*
    size_width = parseInt(size_width,10);
    size_height = parseInt(size_height,10);
    if(isNaN(size_width) || size_width<=0){
        alert('Invalid product size of width!');
        return false;
    }
    if(isNaN(size_height) || size_height<=0){
        alert('Invalid product size of height!');
        return false;
    }
    */
	var material_id = $('select#product_material').val();
	if(material_id==''){
        alert('Please choose material for this product!');
        return false;
	}else{
        material_id = parseInt(material_id, 10);
        if(isNaN(material_id) || material_id<=0){
            alert('Invalid material!');
            return false;
        }
    }
    var material_name = $('select#product_material option:selected').text();
    var material_thickness = $('select#material_thickness').val();
    if(material_thickness==''){
        alert('Please choose material thickness!');
        return false;
    }
    var arr_material_thickness = material_thickness.split('-');
    if(arr_material_thickness.length!=2){
        alert('Invalid material thickness!');
        return false;
    }
    var material_thickness_value = arr_material_thickness[0];
    var material_thickness_unit = arr_material_thickness[1];
    var material_color = $('select#material_color').val();
    if(material_color==''){
        alert('Please choose color for material!');
        return false;
    }
    var product_quantity = $('input#product_quantity').val();
	//alert(product_quantity);
    product_quantity = parseInt(product_quantity, 10);
    if(isNaN(product_quantity) || product_quantity<=0) product_quantity = 1;
	//alert(product_quantity);
    var product_price = $('label#lbl_price').html();
    var product_image = image_name;
	var product_detail = $('input#txt_product_detail[type="hidden"]').val();
	var product_sku = $('input#txt_product_sku[type="hidden"]').val();
	//alert(product_detail+' -- '+product_sku);
	var product_text = "";
	var text = new Array();
	$('input[name="txt_product_text"]').each(function(index, element) {
        var t = $.trim($(this).val());
		text[index] = t;
    });
    $.ajax({
		url	:	'[@ajax_add_order_url]',
		type	:	'POST',
		data	:	{session_id:'[@session_id]',txt_product_id:product_id, txt_order_id:[@order_id], txt_product_detail: product_detail, txt_product_sku: product_sku, txt_product_image: product_image, txt_product_price: product_price, txt_product_quantity: product_quantity, txt_size_width: size_width, txt_size_height: size_height, txt_size_unit: size_unit,txt_material_id: material_id, txt_material_name: material_name, txt_material_thickness_value: material_thickness_value, txt_material_thickness_unit: material_thickness_unit, txt_material_color: material_color, txt_product_text:YAHOO.lang.JSON.stringify(text), txt_order_ajax:101 },
		beforeSend: function(){
			$('input#btn_add_order').attr('disabled',true);
		},
		success: function(data, type){
			var err = readKey('error', data, 'int');
			var msg = readKey('message', data);
			if(err==0){
				//alert(msg);
				document.location = '[@url]order/create';
			}else{
            	alert(msg);
            }
			//alert(data);
			$('input#btn_add_order').attr('disabled',false);
		}
    });
    return true;
}
