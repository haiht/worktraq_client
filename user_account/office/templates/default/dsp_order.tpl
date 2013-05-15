<link href="[@URL]lib/ajaxupload/css/listTheme/style.css" rel="stylesheet" type="text/css" />
<script src="[@URL]lib/ajaxupload/ajaxupload.js" type="text/javascript"></script>
<link href="[@URL]lib/css/jquery_ui/cupertino/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[@URL]lib/js/jquery-ui-timepicker-addon.js"></script>
<link href="[@URL]lib/scrollbars/jquery.scrollbars.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[@URL]lib/scrollbars/jquery.scrollbars.js"></script>
<script type="text/javascript" src="[@URL]/lib/js/date.js"> </script>
<style type="text/css">
<!--
.tabs-nav li {
	[@TAB_WARNING_CSS];
}
-->
</style>
<script type="text/javascript">
$(document).ready(function(e) {
	var show = '1';
	$('input#txt_date_required').datepicker({
		dateFormat: 'dd-M-yy',
		changeMonth:true,
		changeYear:true,
		showOn:'both',
		buttonImage:"[@URL]images/_calendar.gif",
		buttonImageOnly:true
	});
	if(show=='[@DISABLE_PICKER]')
		$('input#txt_date_required').datepicker('disable');
	$('input#txt_po_number').change(function(e) {
        var val = $(this).val();
		var order_id = $('input#txt_order_id').val();
		save_order_info('po_number', val, order_id);
    });
	$('input#txt_order_ref').change(function(e) {
        var val = $(this).val();
		var order_id = $('input#txt_order_id').val();
		save_order_info('order_ref', val, order_id);
    });
	$('input#txt_date_required').change(function(e) {
        var val = $(this).val();
		var order_id = $('input#txt_order_id').val();
		save_order_info('date_required', val, order_id);
    });
	$('textarea#txt_order_description').change(function(e) {
        var val = $(this).val();
		var order_id = $('input#txt_order_id').val();
		save_order_info('description', val, order_id);
    });

	$('input#btn_submit_order').click(function(){
		check_save_order(2);
	});
	$('input#btn_save_order').click(function(){
		check_save_order(1);
	});
	$('input#btn_disapprove_order').click(function(){
	});
	$('form#frm_order_information').submit(function(e) {
    });
	$('input#txt_po_number').change(function(){
		var val = $(this).val();
		val = $.trim(val);
		var id = $('input#txt_order_id').val();
		var $this = $(this);
		var color = $('input#txt_order_ref').css('color');
		id = parseInt(id, 10);
		if(isNaN(id) || id <0) id = 0;
		if(val!=''){
			$.ajax({
				url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
				type	:	'POST',
				data	:	{txt_po_number:val, txt_order_id:id, txt_session_id:'[@SESSION_ID]', txt_order_ajax:105},
				beforeSend: function(){
				},
				success	: function(data, type){
					var err = readKey('error', data, 'int');
					var msg = readKey('message', data);
					if(err==0){
						$this.css('color', color);
					}else{
						$this.css('color', 'red');
						alert(msg);
					}
				}
			});
			
		}
	});
	
});
function save_order_info(key, value, order){
	$.ajax({
		url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
		type	:	'POST',
		data	:	{txt_order_id:order, txt_order_key:key, txt_order_value:value, txt_session_id:'[@SESSION_ID]', txt_order_ajax:106},
		beforeSend: function(){
		},
		success	: function(data, type){
		}
	});
}
function check_save_order(order_status){
	var po_number = $.trim($('input#txt_po_number').val());
	var order_ref = $.trim($('input#txt_order_ref').val());
	var order_desc = $.trim($('textarea#txt_order_description').val());
	var order_allocated = $.trim($('input#txt_order_allocated').val());	
	var order_threshold = $.trim($('input#txt_order_threshold').val());	
	order_allocated = parseInt(order_allocated, 10);
	order_threshold = parseInt(order_threshold, 10);
	if(isNaN(order_allocated) || order_allocated!=1) order_allocated = 0;
	if(isNaN(order_threshold)) order_threshold = 0;
	if(order_threshold!=1 && order_threshold!=2) order_threshold = 0;
	
	// compare date required and date created. Date required >= date created

	var date_required = Date.parse($('input#txt_date_required').val());
	var date_created = Date.parse($('input#txt_date_created').val());
	var msg = '';
	var ask = false;

	if(po_number==''){
		alert('Please input PO NUMBER for current order!');
		$('.wrap-tab ul li').eq(0).click();
		return;
	}
	if(order_ref==''){
		alert('Please input Order Ref for current order!');
		$('.wrap-tab ul li').eq(0).click();
		return;
	}
    if(date_required!=null)
    {
        if(date_required < date_created )
        {
            alert('Please check date required, the date required is not past the date created');
            return false;
        }
    }
	msg = $('input#txt_order_message').val();
	if(order_status==2){
		if(order_allocated==1){
			//msg = "One or more items have not been allocated. Do you want to allocate them?\nIf you click 'Yes', you may allocate them.\nOtherwise, status of this order will be saved 'Not Submitted'.";
			//ask = confirm(msg);
			alert(msg);
			$('.wrap-tab ul li').eq(3).click();
			order_status = 1;
			return;
			/*
			if(ask){
				$('.wrap-tab ul li').eq(3).click();
				return;
			}else{
				order_status = 1;
			}
			*/
		}else{
			if(order_threshold>=1){
				alert(msg);
				$('.wrap-tab ul li').eq(3).click();
				order_status = 1;
				return;
			}
			/*
			if(order_threshold==1){
				//msg = "You have allocated items more than the threshold values.\nAre you sure you want to submit this order?\nYour submitted order may required approval.";
				ask = confirm(msg);
				if(!ask){
					$('.wrap-tab ul li').eq(3).click();
					return;					
				}
			}else if(order_threshold>=1){
				//msg = "You have not authorize to order or allocate items more than the threshold values.\nPlease correct and re-submit!";
				alert(msg);
				$('.wrap-tab ul li').eq(3).click();
				return;
			}
			*/
		}
	}
	$('input#txt_order_status').val(order_status);
	$('form#frm_order_information').submit();
}
function delete_item($parent, pid, oid, otid){
	if(pid<=0) return false;
	$.ajax({
		url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
		type	:	'POST',
		data	:	{txt_product_id: pid, txt_order_id:oid, txt_order_item_id:otid, txt_session_id:'[@SESSION_ID]', txt_order_ajax:104},
		beforeSend: function(){
		},
		success	: function(data, type){
			var err = readKey('error', data, 'int');
			var msg = readKey('message', data);
			if(err==0){
				$parent.remove();
				checkClass();
			}else{
				alert(msg);
			}
		}
	});
	return true;
}
function load_allocation(pid, oid, otid){
	$.ajax({
		url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
		type	:	'POST',
		data	:	{txt_product_id: pid, txt_order_id:oid, txt_order_item_id:otid, txt_session_id:'[@SESSION_ID]', txt_order_ajax:102},
		beforeSend: function(){
		},
		success	: function(data, type){
			var err= readKey('error', data, 'int');
			var msg = readKey('message', data);
			if(err==0){
				count_location = 0;
				$('p#p_loading').css('display','none');
				msg = replaceText(msg,'&ldquo;','{');
				msg = replaceText(msg,'&rdquo;','}');
				var location = jQuery.parseJSON(msg);
				var total = location.product_quantity;
				var allocation = location.allocation;
				var location_id = 0;
				var location_number = 0;
				var location_name = '';
				var quantity = 0;
				$('table tr#tr_row').remove();
				product_id = location.product_id;
				$('h4#product_detail').html(location.product_name);
				$('span.total-quantity').html(total);
				loc = new Array();
				for(var i=0;i<allocation.length;i++){
					location_id = allocation[i].location_id;
					location_number = allocation[i].location_number;
					location_name = allocation[i].location_name;
					quantity = allocation[i].quantity;
					loc[i] = new Location(location_id, location_name, location_number, quantity);
				}
				$('span#remain').html(total);
				setup_list();
				for(var i=0; i<loc.length;i++){
					if(loc[i].status==1){
						add_row_table(i);
					}
				}
			}
		},
		error: function (xhr, ajaxOptions, thrownError) {
      	}	
	});
}
function allocation_order(pid, oid, otid){

	var total = $('span.total-quantity').html();
	total = parseInt(total, 10);
	if(isNaN(total)) return false;
	var flag = true;
	var allocation = [];

	for(var i=0; i<loc.length;i++){
		if(loc[i].status==1){
			allocation.push(new Array(pid,loc[i].location_id, loc[i].quantity));
			total -= loc[i].quantity;
		}
	}

	flag = total==0;
	var ask = false;
	
	if(!flag){
		if(total>0){ 
			ask = confirm('Some quantity (exactly '+total+') has not allocated. Do you want to continue saving without allocating?');
			flag = ask;
        }else{
			alert("Remaining quantity to allocate is negative. This prevents saved. \nIf you don't want to change, please click 'Cancel' button");
		}
	}
	if(flag){
		$.ajax({
			url	:	'[@AJAX_LOAD_ORDER_ALLOCATION_URL]',
			type	:	'POST',
			data	:	{txt_product_id:pid, txt_order_id:oid, txt_order_item_id:otid, txt_session_id:'[@SESSION_ID]', txt_allocation:YAHOO.lang.JSON.stringify(allocation), txt_order_ajax:103},
			beforeSend: function(){
			},
			success	: function(data, type){
				var err = readKey('error', data, 'int');
				var msg = readKey('message', data);
				if(err==0){
					document.location = '[@URL_REQUEST]';
				}
			}
		});
	}
	/*
	else{
        if(v_location_not_allocation>0){
            alert('Allocation Quantity of 0 is not allowed. Please correct ');
        }
        else{
            if(v_location_not_select>0) alert('Please choose a location to allocate.');
            else if(total>0) alert('You cannot save this order because you still have remaining quantity to allocate');
        }
    }
	*/
	return flag;
}
</script>

<script type="text/javascript" src="[@URL]/lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="[@URL]/lib/js/json-min.js"></script>
<script type="text/javascript">
[@JAVASCRIPT_TPL]
</script>
        <section id="main">
        	<ul class="breadcrumb">
                <li><a href="#" title="Home">Home</a><span class="divider">/</span></li>
                <li><a href="/orders" title="Orders">Orders</a><span class="divider">/</span></li>
                <li class="active">Order Details</li>
            </ul>
            <h2 class="title-page"><span>Order Details</span></h2>
            <section id="content">
            	
            	<div class="wrap-content">
				<p style="margin:2px; padding:5px; font-family:Verdana, Geneva, sans-serif; font-size:14px; font-style:italic">[@ORDER_INFO]</p>
                    <div class="wrap-tab">
                        <ul class="tabs-nav">
                            <li title="tab-information">Information</li>
                            <li title="tab-items">Items</li>
                            <li title="tab-distribution">Distribution</li>
                            <li title="tab-warning" style="color:red;[@TAB_WARNING_DISPLAY]">Warning</li>
                        </ul>
                    </div>                
                  	<div class="wrap-content-tab">
                    	<div class="tab-information content-tab">
                        [@ORDER_INFORMATION_FORM]
                        </div>
                          <div class="tab-items content-tab">
							<div class="wrapper" id="wrapper-tab-items">
								<div class="table">
									<ul class="col-group">                                    
										<li class="tbl-col width-image"></li>
										<li class="tbl-col width-name"></li>
										<li class="tbl-col width-quantity"></li>
										<li class="tbl-col width-unitprice"></li>
										<li class="tbl-col width-extendprice"></li>
										<li class="tbl-col width-action"></li>
									</ul>
									<ul class="tr-row">                                    
										<li class="th-cell">Your Items</li>
										<li class="th-cell">Name</li>
										<li class="th-cell">Quantity</li>
										<li class="th-cell">Unit Price</li>
										<li class="th-cell">Extended Price</li>
										<li class="th-cell">Action</li>                               
									</ul>
									[@ORDER_DETAIL_ITEMS]
								</div>
							</div>
                        </div>
                        <div class="tab-distribution content-tab">
						
								<div class="wrap-button">
									<a href="javascript:void(0)" title="Collapse all" class="btn collapse">Collapse all</a>
									<a href="javascript:void(0)" title="Expand all" class="btn expand">Expand all</a>
								</div>
								<section class="accordion-distribution">
								[@ORDER_DETAIL_ALLOCATION]
								</section>                            
								<div class="total-price" style="cursor:default;[@PRICE_DISPLAY]">Total price: <span>[@TOTAL_AMOUNT]</span></div>
						
                        </div>                    
                    	<div class="tab-warning content-tab" style="font-style:normal;[@TAB_WARNING_DISPLAY]">
                        <div style="min-height:300px; padding:20px;">
                        [@WARNING_DISPLAY]
                        </div>
                        </div>
                    </div>                    
                    <div class="block-submit">
	                     <a class="btn btn-large btn-success" href="[@URL]catalogue" title="Add More Item" [@ADD_BUTTON_ITEM]>Add More Item</a>
						<input id="btn_save_order" type="button" class="btn btn-large btn-success" value="Save Your Order" [@SAVE_BUTTON_DISPLAY] />
                        <input id="btn_disapprove_order" type="button" class="btn_create btn btn-large btn-success" value="Disapprove Your Order" [@DIS_BUTTON_DISPLAY] />
						<input id="btn_submit_order" type="button" class="btn btn-large btn-primary" value="[@SUBMIT_BUTTON_TITLE] Your Order" [@SUBMIT_BUTTON_DISPLAY] />
                    </div>                    
                </div>
            </section>                                
	</section>



<div class="popup-item popup hidden">
    <a href="#" title="Close" class="btn-close close-popup">X</a>
    <div class="info-item">
        <div class="image-item"><span class="feature-img"><span><span><span></span></span></span></span></div>
        <div class="context-item">
            <h4 id="product_detail"><!--"Freshly Brewed" [AD] - 3mm Sintr-->a</h4>
            <div class="fckDefault" id="product_description">
            <!--
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt </p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt </p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt </p>
                -->
            </div>
        </div>
    </div>
    <div class="tabs-item">
        <ul>
            <li>Image</li>
            <li>Size</li>
            <li>Material</li>
            <li>Text</li>
        </ul>
        <div class="tab-image">
        	<div>
                <label style="margin-bottom:10px;">Printing file and Note: <br></label><textarea id="image_text" name="image_text" rows="4" cols="130" style="width: 735px;"> Information of printing file </textarea>                    
            </div>

            <!--
            <div id="image_choose" class="image_choose" style="min-height:100px; height:140px; width:300px; overflow:scroll; float:left">
            </div>
            <div id="upload_image" style="margin-left:310px">
            <div class="nofication" id="image-nofication" style="display:none">There is no option avaiable for this item</div>
                <div id="user_upload">
                </div>
            </div><!-- <img id="preview-image" class="preview-image" src="images/visu-item.jpg"/>  -->
        </div>
        <div class="tab-size">
            <div class="select-ganeral">
                <span>Please select size for item: </span>
                <label>
                    <select id="product_size" onchange="setup_size(this); setup_price(this)">
                        <option selected="">Select...</option>
                        <!--
                        <option>18"x20"</option>
                        <option>36"x40"</option>
                        <option>10"x10"</option>
                        <option>Custom</option>
                        -->
                    </select>
                </label>
            </div>
            <div class="custom-size" id="product_customize_size">
                <fieldset>
                    <legend>Custom Size</legend>
                    <div><label for="custom-width">Width:</label> <input type="text" id="custom-width" name="width" onchange="setup_price(this)"><span id="sp-custom-width">(in)</span></div>
                    <div><label for="custom-length">Length:</label> <input type="text" id="custom-length" name="length" onchange="setup_price(this)"><span id="sp-custom-length">(in)</span></div>
                </fieldset>
            </div>
        </div>
        <div class="tab-material">
            <div class="select-ganeral">
                <span>Please select Meterial for item: </span>
                <label>
                    <select id="product_material" onchange="setup_thickness(this); setup_color(this); setup_price(this);">
                        <option selected="">Select...</option>
                        <!--
                        <option>Sintra</option>
                        <option>Coroplast</option>
                        <option>Custom</option>
                        -->
                    </select>
                </label>
            </div>
            <div class="select-ganeral">
                <span>Please select Thickness for item: </span>
                <label>
                    <select id="material_thickness" onchange="setup_color(this);setup_price(this);">
                        <option selected="">Select...</option>
                        <!--
                        <option>3mm</option>
                        <option>6mm</option>
                        <option>4,5mm</option>
                        -->
                    </select>
                </label>
            </div>
            <div class="select-ganeral">
                <span>Please select Colour for item: </span>
                <label>
                    <select id="material_color" onchange="setup_price(this)">
                        <option selected="">Select...</option>
                        <!--
                        <option>red</option>
                        <option>white</option>
                        <option>blue</option>
                        -->
                    </select>
                </label>
            </div>
        </div>
        <div class="tab-text">
        	<div class="nofication" id="text-nofication" style="display:none">There is no option avaiable for this item</div>
            <div id="text-option">
            <div>Please fill text you want to change</div>
            <ul id="product_text">
                <li><label for="field-1">Field 1: </label><input id="field-1" type="text" class=""></li>
                <li><label for="field-2">Field 2: </label><input id="field-2" type="text" class=""></li>
                <li><label for="field-3">Field 3: </label><input id="field-3" type="text" class=""></li>
                <li><label for="field-4">Field 4: </label><input id="field-4" type="text" class=""></li>
            </ul>
            </div>
        </div>
    </div>
    <div class="module-item">
        <div class="wrap-quantity"><span>Quantity: </span><a href="javascript:void(0)" title="reduced" class="btn">&lt;</a><input type="text" id="product_quantity" name="product_quantity" value="1" class=""><a href="javascript:void(0)" title="inscrease" class="btn">&gt;</a></div>
        <div style="width: 300px;[@PRICE_DISPLAY]">Unit Price: <span class="type-txt-01">[@SIGN_MONEY]<label class="price" id="lbl_price">&nbsp;</label></span></div>
        <div style="width: 350px;[@PRICE_DISPLAY]">Extended Price: <span class="type-txt-02">[@SIGN_MONEY]<label class="price-ex" id="lbl_price_ex">&nbsp;</label></span></div>
    </div>
    <div class="wrap-button">
    	<input type="hidden" id="txt_product_id" />
        <input type="hidden" id="txt_product_detail" />
        <input type="hidden" id="txt_product_sku" />
        <input type="button" value="Save to Order" id="btn_add_cart" class="btn btn-primary" />
    </div>
</div>



<div class="popup popup-allocation hidden">
	<a href="javascript:void(0)" title="Close" class="btn-close close-popup">X</a>   
     <div class="allocation">
     	<div id="product_name">
    	<h4 id="product_detail">Cup [VH] - 3mm Sintra</h4>
        </div>
        <div id="list_location">
        <h4>All Locations</h4>
        <select id="txt_all_locations" size="10">
        </select>
        </div>
        <div id="list_allocation">
        <h4>Allocated Locations</h4>
        <table id="tbl_allocation" align="center" width="500" border="0" cellpadding="2" cellspacing="0">
        	<tr align="center" valign="middle">
            <th width="80">Number</th>
            <th width="270">Name</th>
            <th width="100">Quantity</th>
            <th width="50">&nbsp;</th>
            </tr>
        </table>
        </div>
        <div id="list_button">
        <input type="button" id="btn_right" class="btn_right" value="  &gt;  " />
        <p id="p_loading" style="margin:5px 0 0 5px; padding:0; text-align:center; color:red">
        <img src="[@URL]images/icons/loading.gif" /> Wait few seconds
        </p>
        </div>
        <div style="clear:both; margin-top:10px;">
        	<div style="float:left; width:400px;">
            	<p id="total_quantity">Quantity: <span class="total-quantity">20</span></p>
                <p><span>Remaining to Allocate: </span><span id="remain" class="btn valRemain">20</span></p>
            </div>
            <div style="margin-left:402px; text-align:right; padding-right:10px">
                <button class="btn btn-primary" style="margin-left: 0px;">Save</button>
                <button class="btn btn-danger close-popup" style="margin-left: 5px;">Cancel</button>
            </div>
        </div>

    </div>
</div>

<div class="popup popup-confirm hidden" >
	<a href="javascript:void(0)" title="Close" class="btn-close close-popup">X</a>   
   <div class="confirm-message"><span class="confirm-text">Do you want to delete?</span></div>
   <div class="confirm-buttons"><button class="btn btn-primary" style="margin-left: 0px;">Ok</button><button class="btn btn-danger close-popup" style="margin-left: 5px;">Cancel</button></div>
</div>

<div id="html_allocation" style="display:none">
            	<div class="select-ganeral">
                    <label>
                        <select id="location" data-location="[@LOCATION_ID_SCRIPT]">
                            <option selected="selected">Select...</option>
                            [@ALLOCATION]
                        </select>
                    </label>
                </div>
               <div class="wrap-quantity"><span>Quantity: </span><a href="javascript:void(0)" title="reduced" class="btn">&lt;</a><input type="text" name="value quantity" value="[@LOCATION_QUANTITY_SCRIPT]" class=""><a href="javascript:void(0)" title="inscrease" class="btn">&gt;</a></div>
                <div>
                	<!--<a href="#" title="Add" class="btn btn-success">Add</a>-->
                </div>
                <div>
                	<a href="javascript:void(0)" title="Delete" class="btn btn-danger">Delete</a>
                </div>
</div>
<div class="popup popup-disapprove hidden" >
	<a href="javascript:void(0)" title="Close" class="btn-close close-popup">X</a>   
    <div class="select-ganeral">
    <form id="frm_disapprove_order" method="post" action="[@URL]order/disapprove">
        <label for="txt_disapprove_order">Disapproving Reason</label>
        <textarea id="txt_disapprove_order" name="txt_disapprove_order" cols="200" rows="10"></textarea><br />
        <input type="hidden" name="txt_order_id" id="txt_order_id" value="[@ORDER_ID]" />
        <button class="btn btn-primary" style="margin-left: 0px;">Submit</button><button class="btn btn-danger close-popup" style="margin-left: 5px;">Cancel</button>
    </form>
    </div>
</div>