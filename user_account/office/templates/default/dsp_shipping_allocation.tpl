                                <div class="title-acc">Orders #[@PO_NUMBER]</div>
                                <article class="content-acc">                            
                                    <p><span>Order Ref:</span><span>[@ORDER_REF]</span></p>
                                    <p>Created Date:[@CREATED_DATE]</p>
                                    <p>Total Amount:[@TOTAL_AMOUNT]</p>
									<div class="wrapper" data-order-id="[@ORDER_ID]" id="[@ORDER_ID]">
                                   
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
                                                [@SHIPPING_ROW_ITEM_ALLOCATION]
                                            </div>
                                     </div>
                                    <div class="location-price">
                                        <p>Shipping Fee:</p>	
                                        <p>Shipping Amount: <span>[@SHIPPING_AMOUNT]</span></p>
                                    </div>
                                </article>
