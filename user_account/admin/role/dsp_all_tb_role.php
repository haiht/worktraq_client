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
                        <h3>Role</h3>
                    </div>
                    <div id="div_quick">
                    <div id="div_quick_search">
                    <form method="post" id="frm_quick_search">
                    <span class="k-textbox k-space-left" id="txt_quick_search">
                    <input type="text" name="txt_quick_search" placeholder="Search by Role Title" value="<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>" />
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
                    <input type="hidden" name="txt_quick_search" class="k-textbox" id="txt_quick_search" value="<?php echo $v_quick_search;?>" />
                    </form>
                    </div>
                    </div>


                    <div id="grid"></div>
                    <div id="advanced_search_window" style="display:none">
                    <h2>Advanced Search for Role</h2>
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
                                    title: "Advanced Search for Role"
                                });
                            }
                            window_search.data("kendoWindow").center().open();
                        });

                        var grid = $("#grid").kendoGrid({
                            dataSource: {
                                pageSize: 20,
                                page:<?php echo (isset($v_page) && $v_page>0)?$v_page:1;?>,
                                serverPaging: true,
                                serverSorting: true,
                                transport: {
                                    read: {
                                        url: "<?php echo URL.$v_admin_key;?>/json/",
                                        type: "POST",
                                        data: {txt_session_id:"<?php echo session_id();?>", txt_quick_search:"<?php echo isset($v_quick_search)?$v_quick_search:'';?>", txt_search_company_id: '<?php echo $v_company_id;?>', txt_search_role_title:'<?php echo $v_quick_search;?>'}
                                    }
                                },
                                schema: {
                                    data: "tb_role"
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
							{field: "role_title", title: "Role Title", type:"string", width:"100px", sortable: true },
							{field: "role_type", title: "Type", type:"int", width:"30px", sortable: true},
							{field: "role_key", title: "Role Key", type:"string", width:"100px", sortable: true },
							{field: "status", title: "Status", type:"boolean", width:"50px", sortable: false, template: '<span style="float:right">#= status==0?"Active":"Inactive" #</span>'},
							{field: "user_type", title: "User Type", type:"string", width:"80px", sortable: false},
							{field: "default_role", title: "Default Role", type:"boolean", width:"50px", sortable: true, template: '<span style="float:right">#= default_role?"Yes":"No" #</span>'},
							{field: "color", title: "Color", type:"string", width:"50px", sortable: true },
							{field: "bold", title: "Bold", type:"boolean", width:"30px", sortable: false, template: '<span style="float:right; font-weight">#= bold==1?"Yes":"No" #</span>'},
							{field: "italic", title: "Italic", type:"boolean", width:"30px", sortable: true, template: '<span style="float:right">#= italic==1?"Yes":"No" #</span>'},
							{field: "location_name", title: "Location", type:"string", width:"80px", sortable: false},
							{field: "company_name", title: "Company", type:"string", width:"100px", sortable: true},
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
                    document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.role_id+"/view";
                }
                function edit_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to edit role with ID: '+dataItem.role_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.role_id+"/edit";
                    }
                }
                function delete_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to delete role with ID: '+dataItem.role_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.role_id+"/delete";
                    }
                }
            </script>
                </div>
            </div>
        </div>
  </div>