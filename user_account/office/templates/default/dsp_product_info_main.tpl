<link href="[@URL]lib/treejquery/css/jquery.treeview.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="[@URL]lib/treejquery/js/jquery.cookie.js"></script>
<script type="text/javascript" src="[@URL]lib/treejquery/js/jquery.treeview.js"></script>
<script type="text/javascript">
$(function(){
	$('#tree_menu').treeview({
		collapsed: false,
		animated :"medium",
		control :"#sidetreecontrol",
		persist: "location"
	});
});
</script>
        <section id="main">
        	<ul class="breadcrumb">
                <li><a href="#" title="Home">Home</a><span class="divider">/</span></li>
                <li><a href="/catalogue" title="Catalogue">Catalogue</a><span class="divider">/</span></li>
                <li class="active">Product Information</li>
            </ul>
            <h2 class="title-page"><span>Product Information</span></h2>
            <section id="content">
            <div class="wrap-content">

                <h3>[@PRODUCT_NAME]</h3>
                <div class="context contact-info" style="overflow:auto;">
                	<div class="row">
                        <div class="span11" style="margin-left: 40px;">
                            <p></p>
                            <div class="well long-description">[@LONG_DESCRIPTION]</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="span5">
                            [@PRODUCT_PRICE]                        
                            <span>[@TREE_VIEW]</span>
                        </div>
                        <div class="span6 pagination-centered">
                            <span class="feature-img">
                                <img style="clear:both" src="[@PRODUCT_IMAGE]" alt="[@PRODUCT_IMAGE]" />
                            </span><br />
                            <button class="btn btn-success" id="btn_add_order" title="[@PRODUCT_NAME]" data-order-item-id="0" data-order-id="[@ORDER_ID]" data-product-id="[@PRODUCT_ID]"[@DISPLAY_BUTTON]>Add to Order</button><br>
                            <a class="btn" id="btn_back" href="[@URL]catalogue">Back to Catalogue</a>
                        </div>


                    </div>
                
                
                </div>
				[@PRODUCT_INFO_SLIDE]
				[@PRODUCT_INFO_ORDER]                
            </div>
            </section>
        </section>
[@POPUP_ADD_ORDER]