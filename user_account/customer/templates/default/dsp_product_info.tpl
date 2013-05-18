<script>
    $(document).ready(function(){
        $("#btn_add_to_order").click(function(){
            $("#hidden").show();
        });
        $("#btn_order_history").click(function(){
            window.location = '[@URL]/order';
        });
        $("#btn_back_to_order").click(function(){
            window.location = '[@URL]/catalogue';
        });
    });
</script>
<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]catalogue" >PRODUCTS</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]catalogue/[@PRODUCT_ID]/info" >PRODUCT INFORMATION</a>
</div>
</div>
</div>
<div class="content">
    <div class="float-right">
        <div class="title_r">
            products information
        </div>
        <div class="right_ct_pro_lates" >
            <div class="btn_lates float_right">
                <form name="submint_info_product">
                    <input id="btn_order_history" class="btn" type="button" value="Order History">
                    <input id="btn_back_to_order" class="btn" type="button" value="Back to Catalogue">
                </form>
            </div>
            <div class="main_lates clear">
                <div class="float_left">
                    <span class="box_img"><img class="img_1" src="[@INFO_PRODUCT_IMAGE_1]" /></span>
                    <span class="box_img2">
                        <img class="img_2" src="[@INFO_PRODUCT_IMAGE_2]"/>
                        <img class="img_2" src="[@INFO_PRODUCT_IMAGE_2]" />
                        <img class="img_2" src="[@INFO_PRODUCT_IMAGE_2]" />
                    </span>
                </div>
                <div class="left_lates float_left">
                    <p class="title_lates">[@PRODUCT_INFO_TITLE]</p>
                    <div class="clear indent_lates">
                        <p class="up float_left">Print Image:</p>
                        <p class="up_lates">This product uses a standard image already provided.</p>
                    </div>
                    <div class="clear indent_lates">
                        <p class="up float_left">Size:</p>
                        <p class="up_lates">[@PRODUCT_SIZE]</p>
                    </div>
                    <div class="clear indent_lates">
                        <p class="up float_left">Print Materials:</p>
                        <p class="up_lates">[@PRODUCT_MATERIAL]</p>
                    </div>
                    <div class="clear indent_lates">
                        <p class="up float_left">Product Combinations:</p>
                        <p class="up_lates">[@PRODUCT_MATERIAL] - [@PRODUCT_COLOR] [@PRODUCT_SIZE_2].</p>
                    </div>
                    <div class="clear indent_lates2">
                        <p class="up float_left">Description :</p>
                        <p class="up_lates2 clear"></p>
                        <p>
                            [@DESCRIPTION]
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="clear"></div>
            <div class="indent clear" style="[@DISPLAY_MENU]">
                <div class="title_r">
                    add to order
                </div>
                [@PRODUCT_ORDER_ROW]
            </div>
    </div>
</div>