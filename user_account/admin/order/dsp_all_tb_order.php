<?php if(!isset($v_sval)) die();?>
    <div id="div_body">
        <div id="div_splitter_content" style="height: 100%; width: 100%;">
            <div id="div_left_pane">
                <div class="pane-content">
                	<div id="div_treeview"></div>
                </div>
            </div>
            <div id="div_right_pane">
                <div class="pane-content">
                    <div id="div_title" class="k-block k-widget">
                        <h3>Order</h3>
                    </div>
                    <div id="div_quick">
                    <div id="div_quick_search">
                    <form method="post" id="frm_quick_search">

                    <span class="k-textbox k-space-left" id="txt_quick_search">
                    <input type="text" name="txt_quick_search" placeholder="Search by PO Number Or Order Ref" value="<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>" />
                    <a id="a_quick_search" style="cursor: pointer" class="k-icon k-i-search"></a>
                    <script type="text/javascript">
                        $(document).ready(function(e){
                            $('a#a_quick_search').click(function(e){
                                $('form#frm_quick_search').submit();
                            })
                        });
                    </script>
                    </span>

                    <input type="hidden" name="txt_company_id" id="txt_company_id" value="<?php echo $v_company_id;?>" />
                    </form>
                    </div>
                    <div id="div_select">
                    <form id="frm_company_id" method="post">
                    Company: <select id="txt_company_id" name="txt_company_id" onchange="this.form.submit();">
                    <option value="0" selected="selected">-------</option>
                    <?php
					echo $v_dsp_company_option;
					?>
                    </select>
                    <input type="hidden" name="txt_quick_search" id="txt_quick_search" value="<?php echo htmlspecialchars($v_quick_search);?>" />
                    </form>
                    </div>
                    </div>


                    <div id="grid"></div>
                    <div id="advanced_search_window" style="display:none">
                    <h2>Advanced Search for Order</h2>
                    <form id="frm_advanced_search" method="post" action="<?php echo URL.$v_admin_key;?>">
                    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                    <tr align="left" valign="middle">
                    <td align="right">Company:</td>
                    <td>
                    <select id="txt_search_company_id" name="txt_search_company_id">
                    <option value="0" selected="selected">--------</option>
                    <?php echo $v_dsp_company_option;?>
                    </select>
                    </td>
                    </tr>
                    <tr align="center" valign="middle">
                    <td colspan="2">
                    <input type="submit" class="k-button k-button button_css" value="Search" name="btn_advanced_search" />
                    <input type="submit" class="k-button k-button button_css" value="Reset" name="btn_advanced_reset" />
                    </td>
                    </tr>
                    </table>
                    </form>
                    </div>
				<script type="text/javascript">
					var window_search;
                    $(document).ready(function() {
                        window_search = $('div#advanced_search_window');
                        $('li#icons_advanced_search').bind("click", function() {
                            if (!window_search.data("kendoWindow")) {
                                window_search.kendoWindow({
                                    width: "600px",
                                    actions: ["Maximize", "Close"],
                                    modal: true,
                                    title: "Advanced Search for Order"
                                });
                            }
                            window_search.data("kendoWindow").center().open();
                        });

                        var grid = $("#grid").kendoGrid({
                            dataSource: {
                                pageSize: 20,
                                page: <?php echo (isset($v_page) && $v_page>0)?$v_page:1;?>,
                                serverPaging: true,
                                serverSorting: true,
                                transport: {
                                    read: {
                                        url: "<?php echo URL.$v_admin_key;?>/json/",
                                        type: "POST",
                                        data: {txt_session_id:"<?php echo session_id();?>",txt_json_type:'json_order', txt_quick_search:'<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>', txt_search_company_id: '<?php echo $v_company_id;?>', txt_search_po_number:'<?php echo isset($v_search_po_number)?htmlspecialchars($v_search_po_number):'';?>', txt_search_order_ref:'<?php echo isset($v_search_order_ref)?htmlspecialchars($v_search_order_ref):'';?>'}
                                    }
                                },
                                schema: {
                                    data: "tb_order"
                                    ,total: function(data){
                                        return data.total_rows;
                                    }
                                },
                                type: "json"
                            },
                            pageSize: 20,
                            height: 430,
                            scrollable: true,
                            sortable: true,
                            //selectable: "single",
                            pageable: {
                                input: true,
                                refresh: true,
                                pageSizes: [10, 20, 30, 40, 50],
                                numeric: false
                            },
                        dataBound: on_data_bound,
						columns: [
							{field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false, template: '<span style="float:right">#= row_order #</span>'},
							{field: "company_name", title: "Company", type:"string", width:"100px", sortable: true},
							{field: "po_number", title: "Po Number", type:"string", width:"70px", sortable: true },
                            {field: "order_ref", title: "Order Ref", type:"string", width:"60px", sortable: true },
							{field: "total_order_amount", title: "Total Amount", width:"50px", sortable: true, template: '<span style="float:right">#= kendo.toString(total_order_amount,"c") #</span>'},
							{field: "date_created", title: "Date Created", type:"string", width:"50px", sortable: true, template: '<span style="float:right">#= date_created #</span>'},
							{field: "date_required", title: "Date Required", type:"string", width:"60px", sortable: true, template: '<span style="float:right">#= date_required #</span>'},
							{field: "delivery_method", title: "Delivery Method", type:"string", width:"70px", sortable: true},
                            <?php if($v_edit_right || $v_is_admin){?>
                            {field: "status_name", title: "Order Status", type:"string", width:"120px", sortable: false,template:'<span id="sp_save" style="display:none"><span id="sp_sel_status"><select data-status="#= status#" id="sel_status" data-order="#= order_id#"></select></span><span id="sp_cancel">&nbsp;<img id="img_save_#= order_id#" data-order="#= order_id#" src="<?php echo URL;?>images/icons/accept.png" style="cursor: pointer" onclick="save_status(this)" />&nbsp;<img id="img_cancel_#= order_id#" data-order="#= order_id#" src="<?php echo URL;?>images/icons/cancel.png" style="cursor: pointer" onclick="cancel_status(this)" /></span></span><span id="sp_status_title">#= status_name #</span><span id="sp_edit"#= <?php echo $v_is_admin?'Math.abs(status)<30':'status!=30';?>?" style=\'display:none\'":"" #>&nbsp;&nbsp;<img id="img_edit_#= order_id#" data-order="#= order_id#" src="<?php echo URL;?>images/icons/tab_edit.png" style="cursor: pointer;" onclick="edit_status(this)" /></span>'},
                            <?php }else{?>
                            {field: "status_name", title: "Order Status", type:"string", width:"80px", sortable: false},
                            <?php }?>
							{ command:  [
								{ name: "View", text:'', click: view_row, imageClass: 'k-grid-View' }
                                <?php if($v_report_right || $v_is_admin){?>
                                ,{ name: "Print", text:'', click: print_row, imageClass: 'k-grid-Print' }
                                <?php }?>
								],
								title: " ", width: "50px" }
						 ]
					 }).data("kendoGrid");
                    var status_data = <?php echo json_encode($arr_order_status);?>;
                    function on_data_bound(e){
                        var grid = e.sender;
                        var data = grid.dataSource.view();
                        for(var i=0; i<data.length; i++){
                            var $sel = grid.tbody.find("tr[data-uid='" + data[i].uid + "'] select#sel_status");
                            var $sp = grid.tbody.find("tr[data-uid='" + data[i].uid + "'] span#sp_status");
                            <?php if($v_is_admin){?>
                            if(Math.abs(data[i].status)>=30){
                                var combo = $sel.width(120).kendoDropDownList({
                                    dataSource:status_data,
                                    dataTextField:'status_name',
                                    dataValueField:'status_id'
                                }).data("kendoDropDownList");
                                combo.value(data[i].status);
                            }else{

                            }
                            <?php }else if($v_edit_right){?>
                            if(data[i].status==30){
                                var combo = $sel.width(120).kendoDropDownList({
                                    dataSource:status_data,
                                    dataTextField:'status_name',
                                    dataValueField:'status_id'
                                }).data("kendoDropDownList");
                                combo.value(data[i].status);
                            }else{

                            }
                            <?php }?>
                        }
                    }
				});
                var loading = '<?php echo URL;?>images/icons/loading.gif';
                function edit_status(obj){
                    var id = obj.id;
                    var $this = $('img#'+id);
                    $this.parent().parent().find('span#sp_save').css('display','');
                    $this.parent().parent().find('span#sp_status_title').css('display','none');
                    $this.parent().parent().find('span#sp_edit').css('display','none');
                }
                function save_status(obj){
                    var id = obj.id;
                    var $this = $('img#'+id);
                    var $sel = $this.parent().parent().find('select#sel_status');
                    var old_status = $sel.attr("data-status");
                    old_status = parseInt(old_status, 10);
                    var order_id = $sel.attr("data-order");
                    var combo = $sel.data("kendoDropDownList");
                    var new_status = combo.value();
                    new_status = parseInt(new_status, 10);
                    var src = $this.attr("src");
                    $.ajax({
                        url     : '<?php echo URL.$v_admin_key;?>/ajax',
                        type    :   'POST',
                        data    :   {txt_session_id:'<?php echo session_id();?>', txt_ajax_type:'save_order_status', txt_order_id:order_id, txt_status: new_status},
                        beforeSend: function(){
                            $this.attr("src", loading);
                            $this.prop("disabled", true);
                        },
                        success: function(data, status){
                            var ret = $.parseJSON(data);
                            $this.attr("src", src);
                            $this.prop("disabled", false);
                            if(ret.error==0){
                                $sel.attr("data-status", new_status);
                                $this.parent().parent().parent().find('span#sp_save').css('display','none');
                                $this.parent().parent().parent().find('span#sp_status_title').css('display','');

                                if(new_status==40 || new_status==50){
                                    $this.parent().parent().parent().find('span#sp_status_title').html('<a class="a-link" href="<?php echo URL.$v_admin_key.'/';?>'+order_id+'/shipping">'+combo.text()+'</a>');
                                    $this.parent().parent().parent().find('span#sp_edit').css('display','none');
                                }else{
                                    $this.parent().parent().parent().find('span#sp_status_title').html(combo.text());
                                }
                                $this.parent().parent().parent().find('span#sp_edit').css('display',new_status==300?'none':'');
                            }else{
                                alert(ret.message);
                            }
                        }
                    });
                }
                function cancel_status(obj){
                    var id = obj.id;
                    var $this = $('img#'+id);
                    var $sel = $this.parent().parent().find('select#sel_status');
                    var status = $sel.attr("data-status");
                    status = parseInt(status, 10);
                    var combo = $sel.data("kendoDropDownList");
                    combo.value(status);
                    $this.parent().parent().parent().find('span#sp_save').css('display','none');
                    $this.parent().parent().parent().find('span#sp_status_title').css('display','');
                    $this.parent().parent().parent().find('span#sp_edit').css('display','');
                }
                function view_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                      window.open("<?php echo URL.$v_admin_key.'/';?>"+dataItem.order_id+"/view","_self");
                }
                function print_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to print order with ID: '+dataItem.order_id+'?')){
                        window.open("<?php echo URL.$v_admin_key.'/';?>"+dataItem.order_id+"/print","_blank");
                    }
                }
            </script>
                </div>
            </div>
        </div>
  </div>