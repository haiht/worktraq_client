// JavaScript Document
var current_work_url = '[@URL]order/';
var material;
var material_value = 0;
var order = '';
var image_name = '';
var text_option = 0;
var item = null;
var company_product_url = '[@COMPANY_PRODUCT_URL]';
var sign_money = '';
var package_type = 0;
var graphic_id = 0;
var product_id = 0;
var image_choose = null;
var is_image_choose = 0;
var imgDropdown = null;


var size = new Array();
var mat = new Array();
var color = new Array();
var thick = new Array();

function Size(width, length, unit, row){
	this.width = width;
    this.length = length;
    this.unit = unit;
    this.row = row;
    this.list = row+'';
}

function Material(id, name, row){
	this.id = id;
    this.name = name;
    this.row = row;	
    this.list = row+'';
}

function Color(color, row){
	this.color = color;
    this.row = row;
    this.list = row+'';
}
function Thickness(thick, unit, row){
	this.thick = thick;
    this.unit = unit;
    this.row = row;
    this.list = row+'';
}

function get_image(id){
	var ret = '';
	if(image_choose!=null && image_choose!=''){
    	for(var i=0; i<image_choose.length; i++){
        	if(image_choose[i].value==id){
            	ret = image_choose[i].image;
                i = image_choose.length;
            }
        }
    }
    return ret;
}
function load_ajax(pid, oid, otid, imageid, imageurl){
    $('input#product_quantity').val('1');
    $('input#custom-width').val('');
    $('input#custom-length').val('');
    $('span#sp-custom-width').html('(in)');
    $('span#sp-custom-length').html('(in)');
    product_id = pid;
	$.ajax({
		url	:	'[@AJAX_LOAD_PRODUCT_URL]',
		type	:	'POST',
		data	:	{txt_product_id:pid, txt_order_id:oid, txt_order_item_id: otid, txt_image_id:imageid, txt_image_url:imageurl, txt_session_id:'[@SESSION_ID]', txt_order_ajax:100},
        cache	: false,
        async: false,
        timeout	: 10000,
		beforeSend: function(){

		},
		success	: function(data, type){
        	var ret = $.parseJSON(data);

            if(ret==null){
            	alert('Unknown error');
                return;
            }
            var err = ret.error;
            item = null;
            image_choose = null;
            product = null;
			if(err==0){
            	item = ret.item;
                product = ret.product;
                var image_option = '-  Printing file: ';
                if (product.image_option == 0) {
                    image_option = image_option + "Anvy has printing file for this product. If you want to print with new printing file, please upload to ftp and paste the path here. ";
                } else {
                    image_option = image_option +"Please upload printing file(s) to ftp and paste the path(s) here.";
                }
                image_option = image_option + "\n-  Note for this product: ";
                $('textarea#image_text').text(image_option);

                image_choose = ret.image;
                material = product.material;
                //alert('material:' + JSON.stringify(ret.product));
                material_value = 0;
                var list_size = '';
                var list_mat = '';
                var list_thick = '';
                var list_color = '';
                var temp = '';
                size = new Array();
                mat = new Array();
                thick = new Array();
                color = new Array();
                for(var k = 0; k <material.length; k++){
                	temp = ','+material[k].width+'-'+material[k].length+'-'+material[k].usize
                	if(list_size.indexOf(temp)==-1){
	                    var s = new Size(material[k].width,material[k].length,material[k].usize, k);
                        size.push(s);
                        list_size += temp;
                    }else{
                    	for(var x = 0; x<size.length; x++){
                        	if(size[x].width==material[k].width && size[x].length==material[k].length && size[x].unit==material[k].usize){
                            	size[x].list += ','+k;
                                x = size.length;
                            }
                        }
                    }
                    
                    temp = ','+material[k].id;
                    if(list_mat.indexOf(temp)==-1){
                    	var s = new Material(material[k].id, material[k].name, k);
                    	mat.push(s);
                        list_mat += temp;
                    }else{
                    	for(var x=0; x<mat.length; x++){
                        	if(mat[x].id==material[k].id){
                            	mat[x].list += ',' + k;
                                x = mat.length;
                            }
                        }
                    }  	
                    
                    temp = ','+material[k].thick+'-'+material[k].uthick;
                    if(list_thick.indexOf(temp)==-1){
                    	var s = new Thickness(material[k].thick, material[k].uthick, k);
                    	thick.push(s);
                        list_thick += temp;
                    }else{
                    	for(var x=0; x<thick.length; x++){
                        	if(thick[x].thick==material[k].thick && thick[x].unit==material[k].uthick){
                            	thick[x].list += ','+k;
                                x = thick.length;
                            }
                        }
                    }  	
                    temp = ','+material[k].color;
                    if(list_color.indexOf(temp)==-1){
                    	var s = new Color(material[k].color, k);
                    	color.push(s);
                        list_color += temp;
                    }else{
                    	for(var x=0; x<color.length; x++){
                        	if(color[x].color==material[k].color){
                            	color[x].list += ','+k;
                                x = color.length;
                            }
                        }
                    }
                    
                }

                imgDropdown = null;
                is_image_choose = 0;
                
                package_type = product.package_type;
                graphic_id = product.graphic_id;

				$('h4#product_detail').html(product.product_sku+' - '+product.short_description);
				$('input#txt_product_detail').val(product.product_detail);
				$('input#txt_product_sku').val(product.product_sku);
                var product_image_url = get_image(graphic_id);
                var $img = $('<img src="'+product_image_url+'"  />');
                
				$('div.image-item span span span span').children('img').remove();
				$('div.image-item span span span span').append($img);
				image_name = product_image_url;
                if(product.image_option==0){
                	$('form#upload-image').css('display','none');
                    $('div#image-nofication').css('display','');	
                }else{
                	$('form#upload-image').css('display','');
                    $('div#image-nofication').css('display','none');	
                }
				$('div#product_description').html('<p>'+product.short_description+'</p><p>'+product.long_description+'</p>');			
				$('select#product_size option').remove();
                if (size.length == 0) {
                    var $opt = $('<option value="" selected="selected">No option for size</option>');
                    $('select#product_size').append($opt);
                } else {
    				var $opt = $('<option value="" selected="selected">Select...</option>');
    				$('select#product_size').append($opt);
    				for(var i=0; i<size.length; i++){
                        if (size[i].width == 0 && size[i].length == 0) {
                            $opt = $('<option value="custom">Custom...</option>');
                        } else {
    					   $opt = $('<option value="'+size[i].width+'-'+size[i].length+'-'+size[i].unit+'">'+size[i].width+' &times; '+size[i].length+' '+size[i].unit+'</option>');
                        }   
    					$('select#product_size').append($opt);
    				}
                }    
                /*
                if(product.size_option==1){
                    $opt = $('<option value="custom">Custom...</option>');
                    $('select#product_size').append($opt);
                }
				*/
				//setup_material();
				
				var text = product.text;
				$('ul#product_text li').remove();
				text_option = product.text_option;
				if(product.text_option==1){
					var ttext;
					if(item!=null && item!='') {
						ttext = item.product_text;
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
                	$('div#text-option').css('display','');
                    $('div#text-nofication').css('display','none');
				}else{
                	$('div#text-option').css('display','none');
                    $('div#text-nofication').css('display','');
                }
				$('input#txt_product_id[type="hidden"]').val(pid);
                $('label#lbl_price').html('');
				var q = $('input#product_quantity').val();
				q = parseInt(q,10);
				if(isNaN(q) || q<=0) q = 1;
				$('label#lbl_price_ex').html('');
				setup_startup();
			}else{
				alert(readKey('message', data));
			}
		}
	});
}

function setup_startup(){

    $('div#image_choose').find('div').remove();
    $('div#image_choose').css('display','none');
	if(image_choose!=null && product.image_change==1){
        for(var i=0; i<image_choose.length; i++){
        	var $sub = $('<div style="clear:both;" data-image-id="'+image_choose[i].value+'" data-image-code="'+image_choose[i].text+'" data-image-name="'+image_choose[i].image+'">'+image_choose[i].text+'</div>');
            var $img = $('<img src="'+image_choose[i].image+'" style="float:left; margin: 5px; width:150px;" />');
            var $chk = $('<input type="radio" name="r_image_choose"'+(image_choose[i].selected==1?' checked="checked"':'')+' />');
            $chk.bind('click', function(){
            	var id = $(this).parent().attr("data-image-id");
                id = parseInt(id, 10);
                graphic_id = id;
                image_name = get_image(graphic_id);
                var $img = $('<img src="'+image_name+'"  />');
                
				$('div.image-item span span span span').children('img').remove();
				$('div.image-item span span span span').append($img);
            });
            $sub.append($img);
            $sub.append($chk);
            $('div#image_choose').append($sub);
        }
        $('div#image_choose').css('display','');
        $('div.image_choose').scrollbars();
    }else{
    	is_image_choose = 0;
    }
	
	if((item=='') || (item.product_quantity=='undefined')){     
        if($('select#product_size option').length==2){
            $('select#product_size option').eq(0).remove();
        	$('select#product_size option').eq(0).attr('selected','selected');
            $('select#product_size').trigger('change');
        }
        if ($('select#product_size option').eq(0).val() != 'custom') {
            $('div#product_customize_size').css('display','none');
        }    
    	return;
	}
    package_type = item.package_type;
    if(item.current_size_option==1 && product.size_option==1){
    	$('div#product_customize_size').css('display','');
        $('select#product_size').val('custom');
        $('input#custom-width').val(item.size_width);
        $('input#custom-length').val(item.size_length);
        $('span#sp-custom-width').html('('+item.size_unit+')');
        $('span#sp-custom-length').html('('+item.size_unit+')');
    }else{
    	$('select#product_size').val(item.size_width+'-'+item.size_length+'-'+item.size_unit);
    	$('div#product_customize_size').css('display','none');
    }
	
    $('select#product_size').trigger('change');
    
	$('select#product_material').val(item.material_id);
    $('select#product_material').trigger('change');
	$('select#material_thickness').val(item.material_thickness_value+'-'+item.material_thickness_unit);
	$('select#material_thickness').trigger('change');
	$('select#material_color').val(item.material_color);
    
    $('label#lbl_price').html(item.product_price);

	$('input#product_quantity').val(item.product_quantity);

	$('label.price-ex').html(''+$.number(item.product_price*item.product_quantity,2));

}
function setup_size(obj){
    var val = obj.value;
    if(val=='custom'){
    	$('div#product_customize_size').css('display','');
    }else{
    	$('div#product_customize_size').css('display','none');
    }
    var $opt = $('<option value="" selected="selected">Select...</option>');
    var $msel = $('select#product_material');
    $msel.find('option').remove();
    var $tsel = $('select#material_thickness');
    $tsel.find('option').remove();
    var $csel = $('select#material_color');
    $csel.find('option').remove();
    
    $msel.append($opt);
    $opt = $('<option value="" selected="selected">Select...</option>');
    $tsel.append($opt);
    $opt = $('<option value="" selected="selected">Select...</option>');
    $csel.append($opt);
    if(val!=''){
        var count = 0;
 		if(val!='custom'){
            var tmp = '';
            for(var i=0; i<size.length; i++){
            	if(val == ''+size[i].width+'-'+size[i].length+'-'+size[i].unit){
                	tmp = size[i].list;
                    i = size.length;
                }
            }
            var temp = tmp.split(',');
            var list = '';
            for(var i=0; i<temp.length; i++){
            	var j = temp[i];
                j = parseInt(j,10);
                if(list.indexOf(material[j].id+',')==-1){
                    if (material[j].id != 0) {
                        $opt = $('<option value="'+material[j].id+'">'+material[j].name+'</option>');
                        $msel.append($opt);
                        count++;
                        list+=material[j].id+',';
                    }    
                }
            }
        }else{
        	var list = '';
            $('label#lbl_price').html('');
            $('label.price-ex').html('');
            var m_length = material.length;
            for(var i=0; i<m_length; i = i+1) {
                if(material[i].size==1){
                    if(list.indexOf(material[i].id+',') == -1){
                        if (material[i].id != 0) {
                            $opt = $('<option value="'+material[i].id+'">'+material[i].name+'</option>');
                            $msel.append($opt);
                            count++;
                            list+=material[i].id+',';
                        }    
                    }
                }
            }
        }

        if (count == 0) {
            $opt = $('<option value="" selected="selected">No option for material</option>');
            $msel.find('option').remove();
            $msel.append($opt);

            $('select#material_thickness option').remove();
            $opt = $('<option value="" selected="selected">No option for material thickness</option>');
            var $tsel = $('select#material_thickness');
            $tsel.append($opt);

            var $csel = $('select#material_color');
            $('select#material_color option').remove();
            $opt = $('<option value="" selected="selected">No option for material color</option>');
            $csel.append($opt);
        }

        if(count==1){
            $msel.find('option').eq(0).remove();
            $msel.find('option').eq(0).attr('selected', 'selected');
            $msel.trigger('change');
        }
    }
}
function setup_thickness(sel){
    var val = sel.value;
	var vsize = $('select#product_size').val();
    var vmaterial = $('select#product_material').val();
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
	var thicks='';
	var count = 0;
    
    for(var i=0;i< mat.length; i++){
    	if(val+''==mat[i].id+''){
        	list = mat[i].list;
            i = mat.length;
        }
    }
    if(list=='') {
        $('select#material_thickness option').remove();
        $opt = $('<option value="" selected="selected">No option for material thickness</option>');
        $tsel.append($opt);
        return;
    }    
    items = list.split(',');
    for(var i=0; i<items.length; i++){
    	var j = items[i];
        j = parseInt(j,10);
        if(thicks.indexOf(material[j].thick+'-'+material[j].uthick)==-1){
        	if(vsize==material[j].width+'-'+material[j].length+'-'+material[j].usize && vmaterial+''==material[j].id+''){
                if (material[j].thick != 0) {
                    $opt = $('<option value="'+material[j].thick +'-'+material[j].uthick+'">'+material[j].thick +' '+material[j].uthick+'</option>');
                    $tsel.append($opt);
                    thicks += material[j].thick+'-'+material[j].uthick;
                    count++;
                }    
            }else if(vsize=='custom' && vmaterial+''==material[j].id+''){
                if(material[j].width == '0' && material[j].length == '0'){
                    if (material[j].thick != 0) {                    
                        $opt = $('<option value="'+material[j].thick +'-'+material[j].uthick+'">'+material[j].thick +' '+material[j].uthick+'</option>');
                        $tsel.append($opt);
                        thicks += material[j].thick+'-'+material[j].uthick;
                        count++;
                    }    
                }    
            }
        }
    }
    
    if (count == 0) {
        $('select#material_thickness option').remove();
        $opt = $('<option value="" selected="selected">No option for material thickness</option>');
        $tsel.append($opt);
    }

    if(count==1){
        $tsel.find('option').eq(0).remove();
    	$tsel.find('option').eq(0).attr('selected', 'selected');
        $tsel.trigger('change');
    }
}
function setup_color(sel){
    var val = sel.value;
    var vsize = $('select#product_size').val();
    var vmaterial = $('select#product_material').val();
    var vthick = $('select#material_thickness').val();
    
    var vthick_text = $("select#material_thickness option[value='']").text();
    if (vthick_text == 'Select...' && vthick == '') {
        return;
    }

	var $csel = $('select#material_color');
	$('select#material_color option').remove();
	var $opt = $('<option value="" selected="selected">Select...</option>');
	$csel.append($opt);
	var list = '';
	var items = '';
	var colors='';
	var price = 0;
	var count = 0;
    
    if (vthick != '') {
        for(var i=0;i< thick.length; i++){
        	//if(val+''==thick[i].thick+'-'+thick[i].unit){
            if(vthick+''==thick[i].thick+'-'+thick[i].unit){
            	list = thick[i].list;
                i = thick.length;
            }
        }
    } else {    
        for(var i=0;i< mat.length; i++){
            var compare = (val+'' == (mat[i].id+''));
            
            if(compare == true){
                list = mat[i].list;
                i = mat.length;          
            }
        }
    }
    
    if(list=='') {
        $('select#material_color option').remove();
        $opt = $('<option value="" selected="selected">No option for material color</option>');
        $csel.append($opt);
        return;
    }   

    items = list.split(',');
    if (vthick == '') {
        vthick = '0-none';
    }
    for(var i=0; i<items.length; i++){
    	var j = items[i];
        j = parseInt(j,10);
        if(colors.indexOf(material[j].color+',')==-1){
        	if(vsize==material[j].width+'-'+material[j].length+'-'+material[j].usize && vmaterial+''==material[j].id+'' && vthick==material[j].thick+'-'+material[j].uthick){
                if (material[j].color != 'None') {
                    $opt = $('<option value="'+material[j].color +'">'+material[j].color+'</option>');
                    $csel.append($opt);
                    colors += material[j].color+',';
                    count++;
                }    
            } else if(vsize=='custom' && vmaterial+''==material[j].id+'' && vthick==material[j].thick+'-'+material[j].uthick){
                if(material[j].width == '0' && material[j].length == '0'){
                    if (material[j].color != 'None') {
                        $opt = $('<option value="'+material[j].color +'">'+material[j].color+'</option>');
                        $csel.append($opt);
                        colors += material[j].color+',';
                        count++;
                    }    
                }    
            }
        }
    }
    if (count == 0) {
        $('select#material_color option').remove();
        $opt = $('<option value="" selected="selected">No option for material color</option>');
        $csel.append($opt);

    }
    if(count==1){
        $csel.find('option').eq(0).remove();
    	$csel.find('option').eq(0).attr('selected', 'selected');
        $csel.trigger('change');
    }
}

function setup_price(obj){
    var price = 0;
    var quantity = $('input#product_quantity').val();
	var tmp = '';
    var val = 0;
    var w=0, l=0, us = 'ft';
    var s = $('select#product_size').val();
    var m = $('select#product_material').val();
    var t = $('select#material_thickness').val(); 
    var c = $('select#material_color').val();

    if (m=='') {
        m = '0';
    }

    if (t == '') {
        t = '0-none';
    }

    if (c == 0) {
        c = 'None';
    }

    if(s=='custom'){
    	w = $('input#custom-width').val();
        l = $('input#custom-length').val();
        w = parseFloat(w); if(isNaN(w)) w = 0;
        l = parseFloat(l); if(isNaN(l)) l = 0;
        us = $('span#sp-custom-width').html();
        us = us.replace('(','');
        us = us.replace(')','');
        if(us=='') us = 'in';
        for(var i=0; i<material.length; i++){
            tmp = material[i].id+'-'+material[i].thick+'-'+material[i].uthick+'-'+material[i].color;
            if(tmp==m+'-'+t+'-'+c && material[i].size==1){
                val = material[i].price;
                var square = w*l;
                if(us=='in')
                    square /= 144;
                else if(us=='cm')
                    square /= 929;   
                price = square * parseFloat(val);                
                i = material.length;
            }
        }        
    }else{    
        for(var i=0; i<material.length; i++){
            tmp = material[i].width+'-'+material[i].length+'-'+material[i].usize+'-'+material[i].id+'-'+material[i].thick+'-'+material[i].uthick+'-'+material[i].color;
            if(tmp==s+'-'+m+'-'+t+'-'+c){                
                price = material[i].price;
                w = material[i].width;
                l = material[i].length;
                us = material[i].usize;
                i = material.length;               
            }
        }
	}

    quantity = parseInt(quantity, 10);
    if(isNaN(quantity) && quantity<1) quantity = 1;
    $('input#product_quantity').val(quantity); 
    if (price != 0) {
        $('label#lbl_price').html(''+$.number(price, 2));
	    $('label.price-ex').html(''+$.number(price*quantity, 2));
    } else {
        $('label#lbl_price').html('');
        $('label.price-ex').html('');
    }  
}

function check_and_order(pid, oid, otid){
    if(pid<=0){
        alert('[@ALERT_INVALID_DATA]!');
        return false;
    }
    if(package_type<=1)
    {
        var size = $('select#product_size').val();
        if(size==''){
            alert('[@ALERT_CHOISE_SIZE]');
            return false;
        }
        var size_option = 0;
        if(size=='custom'){
            var size_width = $('input#custom-width').val();
            var size_length = $('input#custom-length').val();
            size_width = $.trim(size_width);
            size_length = $.trim(size_length);
            if(size_width=='' || size_length==''){
                alert('Please input size of width or size of length!');
                return false;
            }
            var size_unit = $('span#sp-custom-width').html();
            size_unit = size_unit.replace('(','');
            size_unit = size_unit.replace(')','');
            if(size_unit=='') size_unit = 'in';
            size_option = 1;
        }else{
            var arr_size = size.split('-');
            if(arr_size.length!=3){
                alert('[@ALERT_INVALID_PRODUCT_SIZE]!');
                return false;
            }
            var size_width = arr_size[0];
            var size_length = arr_size[1];
            var size_unit = arr_size[2];
        }
        var material_id = $('select#product_material').val();
        if(material_id==''){
            material_id = 0;

        }else{
            material_id = parseInt(material_id, 10);
            if(isNaN(material_id) || material_id < 0){
                alert('[@ALERT_INVALID_MATERIAL]!');
                return false;
            }
        }
        var material_name = $('select#product_material option:selected').text();
        if (material_id == 0) {
            material_name = "";
        }
        var material_thickness = $('select#material_thickness').val();
        if(material_thickness==''){
            material_thickness = "0-none";
        }
        var arr_material_thickness = material_thickness.split('-');
        if(arr_material_thickness.length!=2){

            alert('[@ALERT_MATERIAL_THICKNESS]!');
            return false;
        }
        var material_thickness_value = arr_material_thickness[0];
        var material_thickness_unit = arr_material_thickness[1];
        var material_color = $('select#material_color').val();
        if(material_color==''){
            material_color = 'None';
        }
	}else{
    	var size_option =0;
        var size_width = 0;
        var size_length = 0;
        var size_unit = 0;
        var material_id = 0;
        var material_name = '';
        var material_thickness_value = 0;
        var material_thickness_unit = '';
        var material_color = 'Black';
    }    
    
    var product_quantity = $('input#product_quantity').val();

    product_quantity = parseInt(product_quantity, 10);
    if(isNaN(product_quantity) || product_quantity<=0) product_quantity = 1;

    var product_price = $('label#lbl_price').html(); 
    product_price = product_price.replace(',','');
    if(isNaN(product_price) || product_price<0) product_price = 0;
    var product_image = image_name;

    var product_detail = product.short_description;
	var product_sku = $('input#txt_product_sku[type="hidden"]').val();

	var product_text = "";
	var text = new Array();
	$('input[name="txt_product_text"]').each(function(index, element) {
        var t = $.trim($(this).val());
		text[index] = t;
    });
    if($('select#txt_list_order').length>0){
    	var tmp_oid = $('select#txt_list_order').val();
        tmp_oid = parseInt(tmp_oid, 10);
        if(!isNaN(tmp_oid) || tmp_oid >=0 ) oid = tmp_oid; 
    }

    var image_path = $('textarea#image_text').val();

    $.ajax({
		url	:	'[@AJAX_ADD_ORDER_URL]',
		type	:	'POST',
		data	:	{session_id:'[@SESSION_ID]',txt_product_id:pid, txt_order_id:oid, txt_order_item_id:otid, txt_product_description: product_detail, txt_product_sku: product_sku, txt_product_image: product_image, txt_product_price: product_price, txt_product_quantity: product_quantity, txt_size_width: size_width, txt_size_length: size_length, txt_size_unit: size_unit,txt_material_id: material_id, txt_material_name: material_name, txt_material_thickness_value: material_thickness_value, txt_material_thickness_unit: material_thickness_unit, txt_material_color: material_color, txt_size_option: size_option, txt_package_type:package_type, txt_graphic_id:graphic_id, txt_product_text:YAHOO.lang.JSON.stringify(text), txt_order_ajax:101, txt_custom_image_path:image_path },
        cache	: false,
        async: false,
        timeout	: 10000,
		beforeSend: function(){
            $('input#btn_add_order').attr('disabled',true);
		},
		success: function(data, type){
			var err = readKey('error', data, 'int');
			var msg = readKey('message', data);
            var allocated = readKey('allocated', data, 'int');
			if(err==0){
            	if(allocated==1){
                	alert("[@ALERT_ALLOCATE]!");
                }
                if(oid<=0)
					document.location = '[@URL]order/create';
                else
                   document.location = '[@URL]order/'+oid+'/edit';
			}else{
            	alert(msg);
            }
			$('input#btn_add_order').attr('disabled',false);
		}
    });
    return true;
}
$(document).ready(function(){
	$('#user_upload').ajaxupload({
		url:'[@URL]order/upload/',
		allowExt:['jpg','png'],
		maxConnections: 1,
		maxFiles: 1,
		editFilename: false,
		maxFileSize:	'5M',
		finish: function(files){
			
		},
		success:function(fileName, received){
			var src = company_product_url + product_id+'/150_'+ fileName;
            image_name = src;
            graphic_id = received;
            var $img = $('<img src="'+src+'"  />');
            $('div.image-item span span span span').children('img').remove();
            $('div.image-item span span span span').append($img);
		}
	});
});