        <section id="main">
        	<ul class="breadcrumb">
                <li><a href="#" title="Home">Home</a><span class="divider">/</span></li>               
                <li class="active">Orders </li>
            </ul>
            <h2 class="title-page"><span>Orders</span></h2>



            <section id="content">            	
            	<div class="wrap-content">
					<!--
					<div class="block-filter">
                        <h4>Filter Order</h4>
                        <form method="post" action="" class="form-general " id="filter-order">
                           <div> <input type="text" placeholder="Some text..."></div>
                           <div>
                               <div>Type Filter:</div>
                               <div class="select-ganeral">
                                   <label>
                                        <select>
                                            <option selected>Select...</option>
                                            <option>Date</option>
                                            <option>Total</option> 
                                            <option>Status</option>                                           
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-success" value="Filter"/>
                            </div>
                        </form> 
                    </div>
					-->
                	<h3>Order History</h3>
					<div class="block-submit">                    
						<input id="btn_search_order_form" type="button" class="btn btn-large btn-success" value="Search Order" />
						<input id="btn_create_new_order"[@HIDE_DIV] type="button" class="btn btn-large btn-primary" value="Create New Order" />
                    </div>
                    <div class="wrapper" id="wrapper-order-history">
                    	[@FORM_SEARCH]
                        <div class="table order-history">
                             <ul class="col-group">                                    
                                <li class="tbl-col width-no"></li>
                                <li class="tbl-col width-date"></li>
                                <li class="tbl-col width-orderref"></li>
                                <li class="tbl-col width-total"></li>
                                <li class="tbl-col width-status"></li>
                                <li class="tbl-col width-action"></li>
                            </ul>
                            <ul class="tr-row">                                    
                                <li class="th-cell">No</li>
                                <li class="th-cell">Date</li>
                                <li class="th-cell">PO Number</li>
                                <li class="th-cell">Location Name</li>
                                <li class="th-cell">Total($)</li>
                                <li class="th-cell">Status</li>
                                <li class="th-cell">Action</li>                               
                            </ul>
							[@ORDER_LIST_ITEM]

                        </div>
                    </div>
                    [@ORDER_PAGING]
					<!--
					<div class="paging">
                        <ul>
                            <li><a href="#" title="Previous"><</a></li>
                            <li><a href="#" title="1">1</a></li>
                            <li><a href="#" title="2">2</a></li>
                            <li class="current">3</li>
                            <li><a href="#" title="4">4</a></li>
                            <li><a href="#" title="5">5</a></li>
                            <li><a href="#" title="Next">></a></li>
                             
                        </ul>
                    </div>
					-->
                </div>
			</section>
        </section>
<div class="popup popup-confirm hidden" >
	<a href="#" title="Close" class="btn-close close-popup">X</a>   
   <div class="confirm-message"><span class="confirm-text">Do you want to delete?</span></div>
   <div class="confirm-buttons"><button class="btn btn-primary" style="margin-left: 0px;">Ok</button><button class="btn btn-danger close-popup" style="margin-left: 5px;">Cancel</button></div>
</div>
