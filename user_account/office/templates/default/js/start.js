
/**
 * Website start here
 **/
var html_one_allocation;
var list_allocation = new Array();
var total_location = 0;
var count_location = -1;
var control_popup = false;
jQuery(document).ready(function(){		
	tab();
	accordion();	
	addQuantity();

	mathExprice();
	actionSelect();
	
	addFieldLocation();
	deleteFieldLocation();	
	
	showPopupPassedon();	
	showPopupProduct();
	showPopupSearchOrder();
	showPopupDisapproveOrder();

	updateVal();
	checkClass();
	searchCatalogue();
	addFieldLocationExtra();
	$('#slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'       
		directionNav: true,
    });
	$('input#btn_create_new_order').click(function(){
		create_new_order();
	});
	if($.trim($('input#txt_po_number').val())==''){
		$('.wrap-tab ul li').eq(0).click();
	}else{
		$('.wrap-tab ul li').eq(1).click();
	}
	
});

var myScrollers = new Array();
function loaded() {
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	var els = document.querySelectorAll(".wrapper");
	
	var idx = 0;
	for (var i=0; i<els.length; i++) {
		id = $(els[i]).attr('id');
	
		if(id) {
			myScrollers[idx] = new iScroll(id, { 
				onBeforeScrollStart: function (e) {
					var target = e.target;
					while (target.nodeType != 1) target = target.parentNode;
		
					if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
						e.preventDefault();
				}
			});
			idx++;
		}
	}
}
document.addEventListener('DOMContentLoaded', loaded, true);


jQuery(window).resize(function(){
	var D = document;
    var a = Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
	$('#login-cms').height(a);
	var b = $('#main').height() - 44;
	$('#sidebar').height(b);	
		
}).trigger('resize');



function tab(){
	$(".wrap-content-tab .content-tab").hide(); // Initially hide all content
	$(".tabs-nav li:first").attr("class","current"); // Activate first tab
	$(".wrap-content-tab .content-tab:first").fadeIn(); // Show first tab content
	$('.tabs-nav li').unbind('click').bind('click',function(){     
       	$(".wrap-content-tab .content-tab").hide(); //Hide all content		
        $(".tabs-nav li").attr("class",""); //Reset id's
        $(this).attr("class","current"); // Activate this
        $('.' + $(this).attr('title')).fadeIn(); // Show content for current tab
		
		
    });
	
	var $items = $('.tabs-item>ul>li');
	$items.unbind('click').bind('click',function() {
   		$items.removeClass('selected');
    	$(this).addClass('selected');
   		var index = $items.index($(this));
    	$('.tabs-item>div').hide().eq(index).show();
	}).eq(0).click();
	
};

function accordion(){
	$('.title-acc').unbind('click').bind('click',function(){
		  if($(this).next().is(':hidden') != true) 
		  {
			$(this).removeClass('active'); 
			$(this).next().slideUp("normal");
		  } 
		  else {
			 $('.title-acc').removeClass('active');  
			 $('.content-acc').slideUp('normal');
			if($(this).next().is(':hidden') == true) {
				$(this).addClass('active');
				$(this).next().slideDown('normal');
			 }   
		  }
		
		 
	 });
	
	  $('.content-acc').hide();
	
	  $('.expand').unbind('click').bind('click',function(){
		$('.title-acc').next().slideDown('normal');
			{$('.title-acc').addClass('active');}
				
		});
	
	  $('.collapse').unbind('click').bind('click',function(){
		$('.title-acc').next().slideUp('normal');
			{$('.title-acc').removeClass('active');}			
		});
};

function addQuantity(){
	$('.wrap-quantity').each(function(index, element) {
		 var that = this;
		 $(that).find('a:first').unbind('click').bind('click',function(){
			 that.value =  parseInt($(that).find('input').val());
 			 that.value -= 1; 
			  if(that.value<0) {
				 that.value=0;
			 }
 			 $(that).find('input').val(that.value);

			 updateVal()			
		 });
 		$(that).find('a:last').unbind('click').bind('click',function(){
			that.value =  parseInt($(that).find('input').val());
  			that.value += 1;
  			$(that).find('input').val(that.value);
			updateVal()
		});
	});
	$('.wrap-quantity').find('input').change(function(){		
		updateVal();
	}).trigger('change');	
};


function mathExprice(){	
	$('.wrap-quantity').delegate('a','click',function(){
		$('.module-item').find('.price-ex').html('');
		$('.module-item').each(function(){
			var count = $(this).find('input').val();
			var price = $(this).find('.price').text();
			price = price.replace(',','');
			price = parseFloat(price);

			var totalprice = sign_money+$.number(count*price,2);			
			$(this).find('.price-ex').append(totalprice);	
		});
	}).trigger('click');
	
	$('.wrap-quantity').find('input').change(function(){
		
		$('.module-item').find('.price-ex').html('');
		$('.module-item').each(function(){
			var count = $(this).find('input').val();
			var price = $(this).find('.price').text();
			price = price.replace(',','');
			price = parseFloat(price);
			var totalprice = sign_money+$.number(count*price,2);			
			$(this).find('.price-ex').append(totalprice);	
		});
	}).trigger('change');		
};

function actionSelect(){
	$('.tab-items').find('.tr-row').each(function(){
		$(this).find('select').change(function(event){
			//var valueSelect = $(this).find('option:selected').index();
			var valueSelect = $(this).find('option:selected').val();
			var product = $(this).attr('data-product-id');
			var order = $(this).attr('data-order-id');
			var order_item = $(this).attr('data-order-item-id');
			var type = $(this).attr('data-order-type');
			var image_id = $(this).attr('data-image-id');
			image_id = parseInt(image_id, 10);
			if(isNaN(image_id) || image_id<0) image_id = 0;
			var image_url = $(this).attr('data-image-url');
			var that = this;
			//alert(order);
			product = parseInt(product,10);
			if(isNaN(product)||product<0) product = 0;
			order = parseInt(order, 10);
			if(isNaN(order)||order<0) order = 0;
			order_item = parseInt(order_item, 10);
			if(isNaN(order_item)||order_item<0) order_item = 0;
			switch(valueSelect){
				case 'delete':
					$('.popup-confirm').showPopup({
						onHide: function(){										
							$(that).find('option').eq(0).attr('selected', 'selected');		
						},
						onConfirm:function(){
							var $parent = $(that).parents('ul');
							control_popup = delete_item($parent, product, order, order_item);
							
								 //$(that).parents('ul').remove();
								 //checkClass();
						}
					});
					break;
				case 'edit':
					load_ajax(product, order, order_item, image_id, image_url);
					$('.popup-item').showPopup({						
						onHide: function(){										
							$(that).find('option').eq(0).attr('selected', 'selected');		
						},
						onConfirm:function(){
							//alert('here');
					
							//$(that).find('option').eq(0).attr('selected', 'selected');
							control_popup = check_and_order(product, order, order_item);
						}				
					});
					break;
				case 'allocation':
					//alert(valueSelect);
					load_allocation(product, order, order_item);
					$('.popup-allocation').showPopup({
						onHide: function(){						
							$(that).find('option').eq(0).attr('selected', 'selected');		
						},
						onConfirm:function(){
							$(that).find('option').eq(0).attr('selected', 'selected');
							control_popup = allocation_order(product, order, order_item);
						}
					});
					break;
			}
		});
	});
	
	$('.order-history').find('.tr-row').each(function(){
		$(this).find('select').change(function(event){
			//var valueSelect = $(this).find('option:selected').index();
			var valueSelect = $(this).find('option:selected').val();
			var product = $(this).attr('data-product-id');
			var order = $(this).attr('data-order-id');
			var order_item = $(this).attr('data-order-item-id');
			var type = $(this).attr('data-order-type');
			var that = this;
			
			switch(valueSelect){
				case 'delete':
					$('.popup-confirm').showPopup({
						onHide: function(){						
							$('.order-history').find('.tr-row').find('select').find('option').eq(0).attr('selected', 'selected');		
						},
						onConfirm: function(){
							//$(that).parents('ul').remove();
							if(!isNaN(order)){
								if(order>=0) document.location = 'order/'+order+'/delete';
							}
						}
					});
					break;
				case 'edit':
					//order = parseInt(order,10);
					//alert(order);
					if(!isNaN(order)){
						if(order>0) 
							document.location = 'order/'+order+'/edit';
						else
							document.location = 'order/create';
					}
					break;
				case 'view':
					if(!isNaN(order)){
						if(order>0) document.location = 'order/'+order+'/view';
					}
					break;
				case 'reorder':
					if(!isNaN(order)){
						if(order>0) document.location = 'order/'+order+'/reorder';
					}else{
						$(this).find('option').eq(0).attr('selected', 'selected');		
					}
					break;
			}
/*
			if(valueSelect == 1){
				var that = this;
				$('.popup-confirm').showPopup({
					onHide: function(){						
						$('.order-history').find('.tr-row').find('select').find('option').eq(0).attr('selected', 'selected');		
					},
					onConfirm: function(){
						$(that).parents('ul').remove();
					}
				});
			}	
*/
		});
	});
}


function addFieldLocation(){
	$('.add-allocation a').unbind('click').bind('click', function(){		
		if(count_location<total_location){
			var temp = $('div#html_allocation').html();
			temp = temp.replace('[@LOCATION_QUANTITY_SCRIPT]','0');
			temp = temp.replace('[@LOCATION_QUANTITY_ID]','0');
			temp = temp.replace('[@ALLOCATION]',list_allocation);
			$('.allocation-list').append('<li>'+temp+'</li>');
			count_location++;
			//alert(count_location);
			addQuantity();
			updateVal();
			refreshPopup();
		}else{
			alert ('Not allow add more location!');
		}
	});	
};

function addFieldLocationExtra(){
	//$('.add-allocation a').unbind('click').bind('click', function(){		
		var $html = $(html_one_allocation).appendTo($('.allocation-list'));
		var $sel = $html.find('select');
		var val = $sel.attr("data-location");
		$sel.val(val);
		count_location++;
		addQuantity();
		updateVal();
		refreshPopup();
	//});	
};

function refreshPopup(){				
			var jwindow = jQuery(window);
			var jpopup = $('.popup-allocation');
			
			var rePosition = function () {
				var winWidth = jwindow.width(),
				winHeight = jwindow.height(),
				popupWidth = jpopup.width(),
				popupHeight = jpopup.height(),
				top = Math.max(0, (winHeight - popupHeight) / 2),
				left = Math.max(0, (winWidth - popupWidth) / 2);				
				return {
					top : top,
					left : left
				};
			}		
			var newpos = rePosition();		
			console.log(newpos.top);
				var position = ((jwindow.height() < jpopup.outerHeight(true)) || (jwindow.width() < jpopup.outerWidth(true))) ? 'absolute' : 'fixed';
				if (position == 'absolute') {
					newpos.top += jQuery(window).scrollTop();
				}
				console.log(newpos.top);
				jpopup.css({
					'position' : position,
					'top' : newpos.top,
					'left' : newpos.left
				});
			
}

function deleteFieldLocation(){	
        $('.allocation-list').delegate('.btn-danger', 'click', function() {	
			if($('.allocation-list li').length>1){
				$(this).parents('li').remove(); 
				updateVal();
				refreshPopup();
				count_location--;
			}
		});	
};

function showPopupProduct(){
	$('span#sp_basket img#img_basket').each(function(index, element) {
		var product = $(this).attr('data-product-id');
		var order = $(this).attr('data-order-id');
		var order_item = $(this).attr('data-order-item-id');
		var image_id = $(this).attr('data-image-id');
		var image_url = $(this).attr('data-image-url');
		product = parseInt(product,10);
		order = parseInt(order,10);
		order_item = parseInt(order_item,10);
		image_id = parseInt(image_id, 10);
		if(isNaN(product) || product<0) product = 0;
		if(isNaN(order) || order<0) order = 0;
		if(isNaN(order_item) || order_item<0) order_item = 0;
		if(isNaN(image_id) || image_id<0) image_id = 0;
        $(this).unbind('click').bind('click',function(){
			load_ajax(product, order, order_item, image_id, image_url);
			$('.popup-item').showPopup({
				//product_id: product, order_id:order
				onHide: function(){						
							
				},
				onConfirm: function(){
					//alert(this.options.product_id);
					control_popup = check_and_order(product, order, order_item);		
				}
			});
		});
    });		
}
function showPopupPassedon(){

	$('#btn_add_order').each(function(index, element) {
			var product = $(this).attr('data-product-id');
			var order = $(this).attr('data-order-id');
			var order_item = $(this).attr('data-order-item-id');
			product = parseInt(product,10);
			order = parseInt(order,10);
			order_item = parseInt(order_item,10);
			if(isNaN(product) || product<0) product = 0;
			if(isNaN(order) || order<0) order = 0;
			if(isNaN(order_item) || order_item<0) order_item = 0;
	        $(this).unbind('click').bind('click',function(){
	        	//alert("You clicked the button! with product: " + product + " order: " + order + " order_item: "+ order_item);
	        	//return;

				load_ajax(product, order, order_item, 0, '');
				$('.popup-item').showPopup({
					onHide: function(){						
								
					},
					onConfirm: function(){
						//console.log("You clicked the button!");
						control_popup = check_and_order(product, order, order_item);		
					}
				});
			});
    });


	$('.list-items #btn_product_information').each(function(index, element) {
		var product = $(this).attr('data-product-id');
		product = parseInt(product, 10);
		if(isNaN(product) || product <=0) return;
        $(this).unbind('click').bind('click',function(){
			document.location = 'catalogue/'+product+'/info';
		});
  });
}

function showPopupSearchOrder(){

	$('#btn_search_order_form').each(function(index, element) {
		$(this).unbind('click').bind('click',function(){
			$('.popup-search').showPopup({
				onHide: function(){						
							
				},
				onConfirm: function(){
					//alert("You clicked the button!");
					$('form#frm_order_search').submit();
				}
			});
		});
    });

}
function showPopupDisapproveOrder(){
	$('#btn_disapprove_order').each(function(index, element) {
		$(this).unbind('click').bind('click',function(){
			$('.popup-disapprove').showPopup({
				onHide: function(){						
							
				},
				onConfirm: function(){
					var val = $('textarea#txt_disapprove_order').val();
					if($.trim(val)=='')
						alert("Please input some reasons for disapproving!");
					else{
						$('form#frm_disapprove_order').submit();
					}
				}
			});
		});
    });
}
function updateVal(){	
	var val=0;
	for(var i=0;i<$('.allocation-list').find('input').length;i++){
		val = val + parseInt($('.allocation-list').find('input').eq(i).val());		
		}
	var sumQuantity = $('.total-quantity').text() - val;
	$('.check-quantity').find('.valRemain').text(sumQuantity);	
	var alertMessage = $('.check-quantity');
	if(sumQuantity<0){		
		
		alertMessage.find('p').remove();
		alertMessage.append('<p>Please check your quantity!</p>');
		 var cssObj = {
		  'background-color' : 'rgba(0,0,0,0.2)',
		  'font-weight' : 'bold',
		   'font-size' : '16px',		   
		  'color' : 'rgb(255,0,0)',
		  'z-index':'999',
		   'margin-top' : '5px',
		  'padding':'5px 20px'
		};
		alertMessage.find('p').css(cssObj);		
	}
	else {alertMessage.find('p').remove();}	
}

function checkClass(){
	$('.table ul').removeClass('odd even');	
	$('.table ul:odd').addClass('odd');
	$('.table ul:even').addClass('even');
	$('.table ul:nth-child(1)').removeClass('odd even');
	$('.table ul:nth-child(2)').removeClass('odd even');	
}

function searchCatalogue(){
	$('input#txt_product_tag_all').click(function(){
		var chk = $(this).attr('checked')?true:false;
		$('input#txt_product_search').attr('disabled',chk);
		$('input#txt_product_search').val('')
		$('input#txt_product_tag[type="checkbox"]').each(function(index, element) {
			//if(chk)
			$(this).attr('checked', chk);
			//$(this).attr('disabled', chk);		
		});
	});
	$('input#txt_product_tag').click(function(){
		$('input#txt_product_tag_all').attr('checked', false);
		$('input#txt_product_search').attr('disabled',false);
	});
}
function create_new_order(){
	var msg = "Are you sure you want to create a new order?\n";
	msg += "After creating a new order, you can add items to your order from the Catalogue!\n";
	msg += "Create a new order?";
	if(confirm(msg)) document.location = 'catalogue/order';
}

/*Order Allocation*/
function Location(location_id, location_name, location_number, quantity){
	var value = 0;
	value = location_id;
	value = parseInt(value, 10);
	if(isNaN(value) || value <0) value = 0;
	this.location_id = location_id;
	this.location_name = location_name;
	this.location_number = location_number;
	value = quantity;
	value = parseInt(value, 10);
	if(isNaN(value) || value <0) value = 0;
	this.quantity = quantity;
	this.status = quantity>0?1:0;
}
Location.prototype.change_status = function(status){
	this.status = status;
}
$(document).ready(function(e) {
	//startup();
    $('tr#tr_row').find('input[type="checkbox"]').click(function(index, element) {
		var $parent = $(this).parent().parent();
        if($(this).attr('checked')){
			$parent.addClass('select');
		}else{
			$parent.removeClass('select');
		}
    });
	$('button#btn_up').click(function(e) {
        $(this).each(function(index, element) {
			var val=$(this).parent().parent().parent().parent().find('input[type="text"]').val();
			val = parseInt(val, 10);
			var location_id=$(this).parent().parent().parent().parent().find('input[type="text"]').attr('data-location');
			var p = find_location(location_id);
			if(p>=0 && val>0){
				var c_remain = $('span#remain').html();
				c_remain = parseInt(c_remain,10);
				if(!isNaN(c_remain) && c_remain>0){
					val = val + 1;
					c_remain--;
					$(this).parent().parent().parent().parent().find('input[type="text"]').val(val);
					loc[p].quantity = val;
					$('span#remain').html(c_remain);
				}
			}
        });
    });
	$('button#btn_down').click(function(e) {
        $(this).each(function(index, element) {
			var val=$(this).parent().parent().parent().parent().find('input[type="text"]').val();
			val = parseInt(val, 10);
			var location_id=$(this).parent().parent().parent().parent().find('input[type="text"]').attr('data-location');
			var p = find_location(location_id);
			if(p>=0 && val>1){
				var c_remain = $('span#remain').html();
				c_remain = parseInt(c_remain,10);
				val = val - 1;
				c_remain++;
				$(this).parent().parent().parent().parent().find('input[type="text"]').val(val);
				loc[p].quantity = val;
				$('span#remain').html(c_remain);
			}
        });
    });
	$('button#btn_delete').click(function(e) {
        $(this).each(function(index, element) {
			var location_id = $(this).attr('data-location');
			var p = find_location(location_id);
			if(p>=0){
				loc[p].status = 0;
				setup_list();
				$(this).parent().parent().remove();
				var c_remain = $('span#remain').html();
				c_remain = parseInt(c_remain, 10);
				c_remain += loc[p].quantity;
				$('span#remain').html(c_remain);
				loc[p].quantity = 0;
			}
        });
    });
	$('input#btn_right').click(function(e) {
    	var $l = $('select#txt_all_locations option:selected');
		if($l.length==1){
			var location_id = $('select#txt_all_locations option:selected').val();
			var pos = find_location(location_id);
			if(pos>=0) add_row_table(pos);
		}
    });
});


var loc = new Array();
function setup_list(){
	$('select#txt_all_locations option').remove();
	for(var i = 0; i<loc.length; i++){
		if(loc[i].status==1) continue;
		var $opt = $('<option value="'+loc[i].location_id+'">'+create_location_text(loc[i].location_name, loc[i].location_number, 8)+'</option>');
		$('select#txt_all_locations').append($opt);
	}
}
function find_location(location_id){
	var pos = -1;
	var i = 0;
	var val = location_id;
	val = parseInt(val,10);
	while(i<loc.length && pos<0){
		if(loc[i].location_id==location_id) pos = i;
		i++;
	}
	return pos;
}

function add_row_table(pos){
	var remain = $('span#remain').html();
	remain = parseInt(remain,10);
	if(remain<=0) return;

	var location_id = loc[pos].location_id;
	var location_name = loc[pos].location_name;
	var location_number = loc[pos].location_number;
	var quantity = loc[pos].quantity;
	if(quantity==0) quantity = 1;
	loc[pos].quantity = quantity;
	
	var c1 = document.createElement('td');
	var ck =  document.createElement('input');
	ck.type ='checkbox';
	
	var $tr = $('<tr id="tr_row" align="right"></tr>');
	/*
	var $c1 = $('<td></td>');
	var $ck = $('<input />',
		{
			type:'checkbox',
			value: location_id,
			click: function(){
				var $parent = $(this).parent().parent();
				if($(this).attr('checked')){
					$parent.addClass('select');
				}else{
					$parent.removeClass('select');
				}
			}
		}
	);
	*/
	var $c2 = $('<td>'+location_number+'</td>');
	var $c3 = $('<td align="left">'+location_name+'</td>');
	//$c1.append($ck);
	//$tr.append($c1);
	$tr.append($c2);
	$tr.append($c3);
	var $c4 = $('<td valign="middle"></td>');
	var $d1 = $('<div class="allocation-link"></div>');
	var $d11 = $('<div class="allocation-button"></div>');
	var $d111 = $('<div class="allocation-button1"></div>');
	var $d112 = $('<div class="allocation-button2"></div>');
	var $b1 = $('<button />',
		{
			text:'▲',
			class:'allocation-button-up',
			id:'btn_up',
			click:function(){
				var val=$(this).parent().parent().parent().parent().find('input[type="text"]').val();
				val = parseInt(val, 10);
				var s_location_id=$(this).parent().parent().parent().parent().find('input[type="text"]').attr('data-location');
				var p = find_location(s_location_id);
				if(p>=0 && val>0){
					var c_remain = $('span#remain').html();
					c_remain = parseInt(c_remain,10);
					if(!isNaN(c_remain) && c_remain>0){
						val = val + 1;
						c_remain--;
						$(this).parent().parent().parent().parent().find('input[type="text"]').val(val);
						loc[p].quantity = val;
						$('span#remain').html(c_remain);
					}
				}
			}
		}
		);
	var $b2 = $('<button />',
		{
			text:'▼',
			class:'allocation-button-down',
			id:'btn_down',
			click:function(){
				var val=$(this).parent().parent().parent().parent().find('input[type="text"]').val();
				val = parseInt(val, 10);
				var s_location_id=$(this).parent().parent().parent().parent().find('input[type="text"]').attr('data-location');
				var p = find_location(s_location_id);
				if(p>=0 && val>1){
					var c_remain = $('span#remain').html();
					c_remain = parseInt(c_remain,10);
					val = val - 1;
					c_remain++;
					$(this).parent().parent().parent().parent().find('input[type="text"]').val(val);
					loc[p].quantity = val;
					$('span#remain').html(c_remain);
				}
			}
		}
		);
	$d111.append($b1);
	$d112.append($b2);
	$d11.append($d111);
	$d11.append($d112);
	var $t = $('<input type="text" class="allocation-input" data-location="'+location_id+'" readonly="readonly" value="'+quantity+'" />');
	var $d12 = $('<div class="allocation-text"></div>');
	$d12.append($t);
	$d1.append($d11);
	$d1.append($d12);
	$c4.append($d1);
	$tr.append($c4);
	remain-=quantity;
	$('span#remain').html(remain);
	var $c5 = $('<td></td>');
	var $b = $('<button />',
		{
			text:'Delete',
			'data-location':location_id,
			'class':'btn_delete',
			id:'btn_delete',
			click:function(){
				var s_location_id = $(this).attr('data-location');
				var p = find_location(s_location_id);
				if(p>=0){
					loc[p].status = 0;
					setup_list();
					$(this).parent().parent().remove();
					var c_remain = $('span#remain').html();
					c_remain = parseInt(c_remain, 10);
					c_remain += loc[p].quantity;
					$('span#remain').html(c_remain);
					loc[p].quantity = 0;
				}
			}
		}
		);
	$c5.append($b);
	$tr.append($c5);
	$('table#tbl_allocation').append($tr);
	$('select#txt_all_locations option:selected').remove();
	loc[pos].status = 1;	
}
function pad_left(str, len, char){
	var ret = '';
	var pad = 0;
	str+='';
	ret = str;
	if(str.length > len){
		//pad = str.length - len;
		//ret = str.substring(pad, str.length);
	}else{
		pad = len - str.length;
		for(var i=0; i<pad; i++)
			ret = char + ret;
	}
	return ret;
}
function create_location_text(location_name, location_number, len){
	return pad_left(location_number, len, '&nbsp;')+' | '+location_name;
}