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
                        <h3>Tag</h3>
                    </div>
                    <div id="div_quick">
                    <div id="div_quick_search">
                    <form method="post" id="frm_quick_search">

                    <span class="k-textbox k-space-left" id="txt_quick_search">
                    <input type="text" name="txt_quick_search" placeholder="Search by Tag Name" value="<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>" />
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
                    <h2>Advanced Search for Tag</h2>
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
                                    title: "Advanced Search for Tag"
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
                                        data: {txt_session_id:"<?php echo session_id();?>",txt_quick_search:'<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>',txt_search_tag_name:'<?php echo isset($v_search_tag_name)?htmlspecialchars($v_search_tag_name):'';?>', txt_search_company_id: '<?php echo $v_company_id;?>'}
                                    }
                                },
                                schema: {
                                    data: "tb_tag"
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
							{field: "tag_name", title: "Tag Name", type:"string", width:"80px", sortable: true },
							{field: "location_name", title: "Location", type:"string", width:"100px", sortable: true},
							{field: "company_name", title: "Company", type:"string", width:"100px", sortable: true},
							{field: "user_name", title: "User Name", type:"string", width:"50px", sortable: true },
                            {field: "tag_status", title: "Status", type:"string", width:"50px", sortable: true, template: '<span style="float:right">#= tag_status==0?"Active":"Inactive" #</span>'},
							{field: "date_created", title: "Date Created", type:"string", width:"50px", sortable: true, template: '<span style="float:right">#= date_created #</span>'},
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
                    document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.tag_id+"/view";
                }
                function edit_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to edit tag with ID: '+dataItem.tag_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.tag_id+"/edit";
                    }
                }
                function delete_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to delete tag with ID: '+dataItem.tag_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.tag_id+"/delete";
                    }
                }
            </script>
                </div>
            </div>
        </div>
  </div>