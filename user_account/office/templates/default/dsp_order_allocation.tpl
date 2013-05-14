                                <div class="title-acc">Location [@LOCATION_NAME]</div>
                                <article class="content-acc">                            
                                    <p><span>Address:</span><span>[@LOCATION_ADDRESS]</span></p>
                                    <p>Shipping Date: [@SHIPPING_STATUS]</p>
                                    <p>Tracking Number: [@TRACKING_NUMBER]</p>

									<div class="wrapper" data-location-id="[@LOCATION_ID]" id="[@LOCATION_ID]">
                                   
                                            <div class="table">
                                                <ul class="col-group">                                                  
                                                    <li class="tbl-col width-product"></li>                                      
                                                    <li class="tbl-col width-quantity"></li>
                                                    <li class="tbl-col width-unitprice"></li>
                                                    <li class="tbl-col width-extendprice"></li>                                                
                                                </ul>
                                                <ul class="tr-row">                                                 
                                                    <li class="th-cell">Your Product</li>                                    
                                                    <li class="th-cell">Quantity</li>
                                                    <li class="th-cell">Unit Price</li>
                                                    <li class="th-cell">Extended Price</li>                                                                        
                                                </ul>
                                                [@ORDER_ROW_ITEM_ALLOCATION]
                                            </div>
                                     </div>
                                    <div class="location-price" style="cursor:default;[@PRICE_DISPLAY]">
                                        <p>Shipping Fee:</p>	
                                        <p>Location Price: <span>[@LOCATION_PRICE]</span></p>
                                    </div>
                                </article>
