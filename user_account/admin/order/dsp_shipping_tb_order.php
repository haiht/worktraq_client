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
    <h3>Dispatch<?php echo $v_h3_title;?></h3>
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

            <input type="hidden" name="txt_company_id" id="txt_company_id" value="<?php echo isset($v_company_id)?$v_company_id:0;?>" />
        </form>
    </div>
    <div id="div_select"><!--
        <form id="frm_company_id" method="post">
            Company: <select id="txt_company_id" name="txt_company_id" onchange="this.form.submit();">
                <option value="0" selected="selected">-------</option>
                <?php
                //echo $v_dsp_company_option;
                ?>
            </select>
            <input type="hidden" name="txt_quick_search" id="txt_quick_search" value="<?php echo htmlspecialchars($v_quick_search);?>" />
        </form>
    --></div>
</div>


<div id="grid"></div>
    <div class="k-block k-widget div_buttons">
        <form id="frm_create_dispatch" method="POST" action="<?php echo URL.$v_admin_key.'/'.(isset($v_order_id)?$v_order_id:0);?>/tracking">
        <input type="submit" id="btn_submit_tb_shipping" name="btn_submit_tb_shipping" value="Create Dispatch" class="k-button" />
            <input type="hidden" value="" id="txt_list_allocation" name="txt_list_allocation" />
            <input type="hidden" value="<?php echo isset($v_company_id)?$v_company_id:0;?>" id="txt_company_id" name="txt_company_id" />
            <input type="hidden" value="<?php echo isset($v_location_from)?$v_location_from:0;?>" id="txt_location_from" name="txt_location_from" />
            <input type="hidden" value="<?php echo isset($v_order_id)?$v_order_id:0;?>" id="txt_order_id" name="txt_order_id" />
        </form>
    </div>

    <div id="advanced_search_window" style="display:none">
    <h2>Advanced Search for Allocation</h2>
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
                    title: "Advanced Search for Allocation"
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
                        data: {txt_session_id:"<?php echo session_id();?>",txt_json_type:'json_shipping', txt_order_id:<?php echo isset($v_order_id)?$v_order_id:0;?>, txt_quick_search:'<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>', txt_search_location_name:'<?php echo isset($v_search_location_name)?htmlspecialchars($v_search_location_name):'';?>', txt_search_company_id: '<?php echo isset($v_company_id)?$v_company_id:0;?>'}
                    }
                },
                schema: {
                    data: "tb_allocations"
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
                {field: "check_row", title: "<input type='checkbox' id='chk_check_all' />", type:"string", width:"20px", sortable: false, template: '<p id="p_checkbox" style="text-align:center; margin:5px"><input type="checkbox" data-allocation="#= allocation_id#" /></p>'},
                {field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false, template: '<span style="float:right">#= row_order #</span>'},
                {field: "location_name", title: "Location", type:"string", width:"100px", sortable: true, encoded: false},
                {field: "product_name", title: "Product", type:"string", width:"100px", sortable: true, encoded: false},
                {field: "quantity", title: "Quantity", type:"int", width:"50px", sortable: true, template:'<span style="float:right">#= kendo.toString(quantity,"n0")#</span>' },
                {field: "shipper", title: "Shipper", type:"string", width:"50px", sortable: true },
                {field: "tracking_number", title: "Tracking No.", width:"50px", sortable: true},
                {field: "tracking_url", title: "Tracking URL", width:"80px", sortable: true, encoded: false},
                {field: "ship_status", title: "Shipping Status", type:"string", width:"70px", sortable: true},
                {field: "date_shipping", title: "Date Shipping", type:"string", width:"70px", sortable: true, template: '<span style="float:right">#= date_shipping #</span>'}
                ,{command:{text:"Reset", click: reset_shipping}, title:" ", width: "50px"}
            ]
        }).data("kendoGrid");
        function on_data_bound(e){
            var grid = e.sender;
            var data = grid.dataSource.view();
            for(var i=0; i<data.length; i++){
                if(data[i].shipper==''){
                    grid.tbody.find("tr[data-uid='" + data[i].uid + "']").find("td:last").html("&nbsp;");
                }else{
                    grid.tbody.find("tr[data-uid='" + data[i].uid + "']").find("td:first").find('input[type="checkbox"]').prop("disabled", true);
                }
            }
            $('input#chk_check_all').prop('checked', false);
        }
        function reset_shipping(e){
            e.preventDefault();
            var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
            var allocation_id = dataItem.allocation_id;
            allocation_id = parseInt(allocation_id, 10);
            //var $td = $(e.currentTarget).closest("tr").find("td:last");
            if(allocation_id>0){
                if(!confirm('Do you want to remove this shipping?')) return;
                $.ajax({
                    url:'<?php echo URL.$v_admin_key;?>/ajax',
                    type:'POST',
                    data: {txt_session_id: '<?php echo session_id();?>', txt_allocation_id: allocation_id, txt_ajax_type: 'reset_shipping'},
                    beforeSend: function(){
                        //$td.html('&nbsp;');
                    },
                    success: function(data, status){
                        var ret = $.parseJSON(data);
                        if(ret.error==0){
                            var dt = grid.dataSource.data();
                            for(var i=0; i<dt.length; i++){
                                if(dt[i].allocation_id==allocation_id){
                                    dt[i].shipper = '';
                                    dt[i].tracking_number = '';
                                    dt[i].tracking_url = '';
                                    dt[i].date_shipping = '';
                                }
                            }
                            grid.dataSource.data(dt);
                        }else{
                            alert(ret.message);
                        }
                    }
                })
            }
        }
        $('input#chk_check_all').click(function(e){
            var chk = $(this).prop("checked");
            $.each($('p#p_checkbox').find('input[type="checkbox"]'), function(index, element){
                if(!$(this).prop("disabled")) $(this).prop("checked", chk);
            });
        });
        $('input#btn_submit_tb_shipping').click(function(e){
            var list_allocation = '';
            $.each($('p#p_checkbox').find('input[type="checkbox"]'), function(index, element){
                if($(this).prop("checked")) list_allocation += $(this).attr("data-allocation")+',';
            });
            if(list_allocation!='') list_allocation = list_allocation.substring(0, list_allocation.length-1);
            if(list_allocation==''){
                e.preventDefault();
                alert("Please choose any location to dispatch first!");
                return false;
            }
            $("input#txt_list_allocation").val(list_allocation);
            return true;
        });
    });
</script>
</div>
</div>
</div>
</div>