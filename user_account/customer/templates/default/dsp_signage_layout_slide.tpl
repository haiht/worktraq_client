<script type="text/javascript" src="[@URL]lib/carousel/jquery.carouFredSel-6.1.0-packed.js"></script>
<link href="[@URL]lib/carousel/carousel.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(document).ready(function(e) {
        $("#product_slide").carouFredSel({
            circular: false,
            infinite: false,
            auto 	: false,
            prev	: {
                button	: "#product_slide_prev",
                key		: "left"
            },
            next	: {
                button	: "#product_slide_next",
                key		: "right"
            },
            pagination	: "#product_slide_pag"
        });
    });
</script>
<div class="context contact-info" style="width:750px !important; overflow:auto;">
    <div class="image_carousel">
        <div id="product_slide">
            [@IMAGE_LIST]
        </div>
        <div class="clearfix"></div>
        <a class="prev" id="product_slide_prev" href="#"><span>prev</span></a>
        <a class="next" id="product_slide_next" href="#"><span>next</span></a>
        <div class="pagination" id="product_slide_pag"></div>
    </div>
</div>
