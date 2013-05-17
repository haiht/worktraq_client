<div id="content">
    <div class="sub">
        <a href="[@URL]">Home</a>
        <span class="icon_sub_next"></span>
        <a href="[@URL]catalogue">products </a>
        <span class="icon_sub_next"></span>
        <a href="#" class="sub_active">products information</a>
    </div>
    <div class="line_or">
        <div class="title_r float_left">Detail Product</div>
        <div class="float_right">
            <input type="button" class="btn_3" value="Back to catalogue" onclick="location.href='[@URL]/catalogue'" />
        </div>
        <div class="clear"></div>
    </div>

    <div class="main_lates clear">
        <p class="title">[@PRODUCT_INFO_TITLE] </p>
        <p class="sub_title">[@SUB_TITLE]</p>
        <div class="div_img float_left">
            <p class="clear:both"></p>
            <img class="img_1" src="[@INFO_PRODUCT_IMAGE_1]" [@STYLE_IMAGE_1] />
            <p class="clear:both"></p>
            <div class="indent float_right">
                <a href="add-to-order.html"><input type="button" class="btn_3" value="Add to order" /></a>
                <a href="order-history.html"><input type="button" class="btn_3" value="Orders history" /></a>
            </div>
        </div>
        <div class="right_lates float_right">
            <div class="box_lates">[@DESCRIPTION]</div>
            <div class="clear indent_lates">
                <p class="up">Print Image</p>
                <p class="up_lates">This product uses a standard image already provided.</p>
            </div>
            <div class="clear indent_lates">
                <p class="up">Custom Size</p>
                <p class="up_lates">[@PRODUCT_SIZE]</p>
            </div>
            <div class="clear indent_lates">
                <p class="up">Print Materials</p>
                <p class="up_lates">[@PRODUCT_MATERIAL]</p>
            </div>
            <div class="clear indent_lates">
                <p class="up">Product Combinations</p>
                <p class="up_lates">[@PRODUCT_MATERIAL] - [@PRODUCT_COLOR] [@PRODUCT_SIZE_2] </p>
            </div>
        </div>
    </div>

</div>