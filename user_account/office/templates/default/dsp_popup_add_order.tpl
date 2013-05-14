<link href="[@URL]lib/scrollbars/jquery.scrollbars.css" rel="stylesheet" type="text/css" />
<link href="[@URL]lib/ajaxupload/css/listTheme/style.css" rel="stylesheet" type="text/css" />
<script src="[@URL]lib/ajaxupload/ajaxupload.js" type="text/javascript"></script>
<script type="text/javascript" src="[@URL]lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="[@URL]lib/js/json-min.js"></script>
<script type="text/javascript" src="[@URL]lib/scrollbars/jquery.scrollbars.js"></script>
<script type="text/javascript">
[@JAVASCRIPT_TPL]   
</script>
<div class="popup-item popup hidden">
    <a href="#" title="Close" class="btn-close close-popup">X</a>
    <div class="info-item">
        <div class="image-item"><span class="feature-img"><span ><span><span></span> </span></span></span></div>
        <div class="context-item">
            <h4 id="product_detail"><!--"Freshly Brewed" [AD] - 3mm Sintra--></h4>
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
            </div-->          
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
                    <div><label for="custom-width">Width:</label> <input type="text" id="custom-width" name="width" onchange="setup_price(this); " /><span id="sp-custom-width">(in)</span></div>
                    <div><label for="custom-length">Length:</label> <input type="text" id="custom-length" name="length" onchange="setup_price(this); " /><span id="sp-custom-length">(in)</span></div>
                </fieldset>
            </div>
        </div>
        <div class="tab-material">
            <div class="select-ganeral">
                <span>Please select a Meterial for this item: </span>
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
                <span>Please select a Thickness for this item: </span>
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
                <span>Please select a Colour for this item: </span>
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
            <div class="nofication" id="text-nofication" style="display:none">No custom text is required for this product</div>
            <div id="text-option">
            <div>Please add text to the areas provided</div>
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

        <div style="width: 300px;[@PRICE_DISPLAY]">Unit Price: <span class="type-txt-01">[@SIGN_MONEY] <label class="price" id="lbl_price">&nbsp;</label></span></div>
        <div style="width: 350px;[@PRICE_DISPLAY]">Total Price: <span class="type-txt-02">[@SIGN_MONEY] <label class="price-ex" id="lbl_price_ex">&nbsp;</label></span></div>

    </div>
    <div class="wrap-button">
        <input type="hidden" id="txt_product_id" />
        <input type="hidden" id="txt_product_detail" />
        <input type="hidden" id="txt_product_sku" />
        [@SELECT_LIST_ORDER] 
        <input type="button" value="Add to Order" id="btn_add_cart" class="btn btn-primary" style="margin-top:5px; float:right;" /></div>
    </div>
</div>
