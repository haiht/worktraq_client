        <section id="main">
        	<ul class="breadcrumb">
                <li><a href="#" title="Home">Home</a><span class="divider">/</span></li>
                <li><a href="#" title="Shipping">Shipping</a><span class="divider">/</span></li>
                <li class="active">Shippings Detail</li>
            </ul>
            <h2 class="title-page"><span>Shippings Detail</span></h2>
            <section id="content">
            	
            	<div class="wrap-content">
				<p style="margin:2px; padding:5px; font-family:Verdana, Geneva, sans-serif; font-size:14px; font-style:italic">[@SHIP_INFO]</p>
                    <div class="wrap-tab">
                        <ul class="tabs-nav">
                            <li title="tab-information">Information</li>
                            <li title="tab-items">Items</li>
                            <li title="tab-distribution">Distribution</li>
                        </ul>
                    </div>                
                  	<div class="wrap-content-tab">
                    	<div class="tab-information content-tab">
                        [@SHIPPING_INFORMATION]
                        
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
										<li class="th-cell">Product Describe</li>
										<li class="th-cell">Quantity</li>
										<li class="th-cell">Unit Price</li>
										<li class="th-cell">Extended Price</li>
										<li class="th-cell">Order PO Number</li>                               
									</ul>
									[@SHIPPING_DETAIL_ITEMS]
								</div>
							</div>
                        </div>
                        <div class="tab-distribution content-tab">
						
								<div class="wrap-button">
									<a href="javascript:void(0)" title="Collapse all" class="btn collapse">Collapse all</a>
									<a href="javascript:void(0)" title="Expand all" class="btn expand">Expand all</a>
								</div>
								<section class="accordion-distribution">
								[@SHIPPING_DETAIL_ALLOCATION]
								</section>                            
								<div class="total-price">Total price: <span>[@TOTAL_AMOUNT]</span></div>
						
                        </div>                    
                    </div>
                    <!--                    
                    <div class="block-submit">
						<input id="btn_save_order" type="button" class="btn btn-large btn-success" value="Save Your Order" [@SAVE_BUTTON_DISPLAY] />
						<input id="btn_submit_order" type="button" class="btn btn-large btn-primary" value="Submit Your Order" [@SUBMIT_BUTTON_DISPLAY] />
                    </div>
                    -->                    
                </div>
            </section>                                
