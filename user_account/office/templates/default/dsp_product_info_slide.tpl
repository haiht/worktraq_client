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
                        	<!--
                            <span><img src="lib/carousel/images/basketball.jpg" alt="basketball" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/beachtree.jpg" alt="beachtree" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/cupcackes.jpg" alt="cupcackes" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/hangmat.jpg" alt="hangmat" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/new_york.jpg" alt="new york" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/laundry.jpg" alt="laundry" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/mom_son.jpg" alt="mom son" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/picknick.jpg" alt="picknick" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/shoes.jpg" alt="shoes" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/paris.jpg" alt="paris" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/sunbading.jpg" alt="sunbading" width="140" height="140" /><br />View | Add Order</span>
                            <span><img src="lib/carousel/images/yellow_couple.jpg" alt="yellow couple" width="140" height="140" /><br />View | Add Order</span>
                            -->
                            [@IMAGE_LIST]
                        </div>
                        <div class="clearfix"></div>
                        <a class="prev" id="product_slide_prev" href="#"><span>prev</span></a>
                        <a class="next" id="product_slide_next" href="#"><span>next</span></a>
                        <div class="pagination" id="product_slide_pag"></div>
                    </div>
				</div>                
