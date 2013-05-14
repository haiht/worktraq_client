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
                    <h3>Allocations for Shipping</h3>
                </div>
                <div id="div_quick">
                    <div id="div_quick_search">
                        <form method="post" id="frm_quick_search">

                    <span class="k-textbox k-space-left" id="txt_quick_search">
                    <input type="text" name="txt_quick_search" placeholder="Search by Location Name" value="<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>" />
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
                    <h2>Advanced Search for Allocations</h2>
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
                                    title: "Advanced Search for Allocations"
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
                                        data: {txt_session_id:"<?php echo session_id();?>",txt_quick_search:'<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>', txt_search_company_id: '<?php echo $v_company_id;?>',txt_search_location_name:'<?php echo isset($v_search_location_name)?htmlspecialchars($v_search_location_name):'';?>', txt_json_type:'main_grid'}
                                    }
                                },
                                schema: {
                                    data: "tb_shipping"
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
                            detailInit: detail_row,
                            columns: [
                                {field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false, template: '<span style="float:right">#= row_order #</span>'},
                                {field: "location_name", title: "Location Name", type:"string", width:"80px", sortable: true },
                                {field: "location_address", title: "Location Address", type:"string", width:"120px", sortable: true, encoded:false },
                                {field: "shipper", title: "Shipper", type:"string", width:"50px", sortable: true},
                                {field: "tracking_number", title: "Tracking No.", type:"string", width:"60px", sortable: true },
                                {field: "tracking_url", title: "Tracking URL", type:"string", width:"100px", sortable: true, encoded: false },
                                {field: "date_shipping", title: "Date Shipping", type:"string", width:"50px", sortable: true, template: '<span style="float:right">#= date_shipping #</span>'},
                                {field: "ship_status", title: "Ship Status", type:"int", width:"50px", sortable: true, template: '<span style="float:right">#= kendo.toString(ship_status,"n0") #</span>'}
                            ]
                        }).data("kendoGrid");

                        function detail_row(e){
                            $("<div style='width: 600px'/>").appendTo(e.detailCell).kendoGrid({
                                dataSource: {
                                    transport: {
                                        read: {
                                            url: "<?php echo URL.$v_admin_key;?>/json",
                                            type: "POST",
                                            data: {txt_session_id:"<?php echo session_id();?>",txt_json_type:'sub_grid', txt_shipping_id: e.data.shipping_id}
                                        }
                                    },
                                    schema: {
                                        data: "products"
                                        ,total: function(data){
                                            return data.total_rows;
                                        }
                                    },
                                    type: "json",
                                    serverPaging: false,
                                    serverSorting: false,
                                    pageSize: 5,
                                    aggregate: [ { field: "product_name", aggregate: "count" },
                                        { field: "quantity", aggregate: "sum" },
                                        { field: "amount", aggregate: "sum" }]
                                },
                                scrollable: true,
                                sortable: false,
                                pageable: true,
                                columns: [
                                    { field: "product_name", title:"Product", width: "120px", encoded: false, type:"string", footerTemplate: "<span style='float:right'> Total Count: #=count#</span>" },
                                    { field: "graphic", title:"Image", width: "120px", type:"string", template: '<p style="text-align:center; margin: 0"><img style="max-width: 120px" src="#= graphic #" /></p>' },
                                    { field: "quantity", title: "Quantity", width: "80px", type:"int", template:'<span style="float:right">#= quantity#</span>', footerTemplate: "<span style='float:right'>Total: #=sum#</span>" },
                                    { field: "price", title: "Price", width: "60px", type:"int", template:'<span style="float:right">#= kendo.toString(price, "c2")#</span>'},
                                    { field: "amount", title: "Amount", width: "100px", type:"int", template:'<span style="float:right">#= kendo.toString(amount, "c2")#</span>', footerTemplate: '<span style="float:right">Total: #= kendo.toString(sum, "c2")#</span>' }
                                ]
                            });
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>