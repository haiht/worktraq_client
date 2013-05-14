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
                        <h3>Module</h3>
                    </div>
                    <div id="div_quick">
                    <!--
                    <div id="div_quick_search">
                    <form method="post" id="frm_quick_search">
                    <input type="text" name="txt_quick_search" id="txt_quick_search" placeholder="" value="" />
                    </form>
                    </div>
                    <div id="div_select">
                    <form id="frm_company_id" method="post">
                    Company: <select id="txt_company_id" name="txt_company_id">
                    <option value="0" selected="selected">-------</option>
                    <?php
					//echo $v_dsp_company_option;
					?>
                    </select>
                    </form>
                    </div>
                    -->
                    </div>

                    <div id="grid"></div>
                    <div id="advanced_search_window" style="display:none">
                    <h2>Advanced Search for Location</h2>
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
                                    title: "Advanced Search"
                                });
                            }
                            window_search.data("kendoWindow").center().open();
                        });
                        var grid = $("#grid").kendoGrid({
                            dataSource: {
                                pageSize: 20,
                                serverPaging: true,
                                serverSorting: true,
                                transport: {
                                    read: {
                                        url: "<?php echo URL.$v_admin_key;?>/json/",
                                        type: "POST",
                                        data: {txt_session_id:"<?php echo session_id();?>"}
                                    }
                                },
                                schema: {
                                    data: "tb_module"
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
						columns: [
							{field: "row_order", title: "&nbsp;", type:"int", width:"20px", sortable: false, template: '<span style="float:right">#= row_order #</span>'},
							{field: "module_text", title: "Module Text", type:"string", width:"80px", sortable: true },
                            {field: "module_pid", title: "Parent", type:"int", width:"80px", sortable: true},
							{field: "module_key", title: "Module Key", type:"string", width:"100px", sortable: true },
							{field: "module_type", title: "Type", type:"int", width:"20px", sortable: true, template: '<span style="float:right">#= module_type #</span>'},
							{field: "module_root", title: "Module Root", type:"string", width:"50px", sortable: true },
							{field: "module_dir", title: "Module Dir", type:"string", width:"100px", sortable: true },
							{field: "module_icon", title: "Icon", type:"string", width:"30px", sortable: true, template: '<img src="#= module_icon #" width="16" />'},
							{field: "module_menu", title: "Module Menu", type:"string", width:"80px", sortable: true },
							{field: "module_role", title: "R", type:"string", width:"20px", sortable: true},
							{field: "module_order", title: "O", type:"int", width:"20px", sortable: true, template: '<span style="float:right">#= module_order #</span>'},
							{field: "module_index", title: "Index file", type:"string", width:"80px", sortable: true },
							{field: "module_locked", title: "L", type:"string", width:"30px", sortable: true},
							{field: "module_category", title: "Cat.", type:"int", width:"20px", sortable: true, template: '<span style="float:right">#= module_category #</span>'},
							{ command:  [
								{ name: "View", text:'', click: view_row, imageClass: 'k-grid-View' }
								<?php if($v_edit_right || $v_is_admin){?>
								,{ name: "Edit", text:'', click: edit_row, imageClass: 'k-grid-Edit' }
								<?php }?>
								<?php if($v_delete_right || $v_is_admin){?>
								,{ name: "Delete", text:'', click: delete_row, imageClass: 'k-grid-Delete' }
								<?php }?>
								],
								title: " ", width: "70px" }
						 ]
					 }).data("kendoGrid");
				});
              function view_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.module_id+"/view";
                }
                function edit_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to edit module with ID: '+dataItem.module_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.module_id+"/edit";
                    }
                }
                function delete_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to delete module with ID: '+dataItem.module_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.module_id+"/delete";
                    }
                }
            </script>
                </div>
            </div>
        </div>
  </div>