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
                        <h3>Product</h3>
                    </div>
                    <div id="div_quick">
                    <div id="div_quick_search">
                    <form method="post" id="frm_quick_search">
                    <span class="k-textbox k-space-left" id="txt_quick_search">
                    <input type="text" name="txt_quick_search" placeholder="Search by Product Sku or Description" value="<?php echo isset($v_quick_search)?htmlspecialchars($v_quick_search):'';?>" />
                    <a id="a_quick_search" style="cursor: pointer" class="k-icon k-i-search"></a>
                        <script type="text/javascript">
                            $(document).ready(function(e){
                                $('a#a_quick_search').click(function(e){
                                    $('form#frm_quick_search').submit();
                                })
                            });
                        </script>
                    </span>
                        <input type="hidden" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    </form>
                    </div>
                    <div id="div_select">
                    <form id="frm_company_id" method="post">
                    Company: <select id="txt_company_id" name="txt_company_id" onchange="this.form.submit();">
                    <option value="0" selected="selected">-------</option>
                    <?php
					echo $v_dsp_company_option;
					?>
                    </select><input type="hidden" name="txt_quick_search" value="<?php echo $v_quick_search;?>" />
                    </form>
                    </div>
                    </div>


                    <div id="grid"></div>
                    <div id="advanced_search_window" style="display:none">
                    <h2>Advanced Search for Product</h2>
                        <form id="frm_advanced_search" method="post" action="<?php echo URL.$v_admin_key;?>">
                            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                                <tr align="left" valign="middle">
                                    <td align="right">Company:</td>
                                    <td>
                                    <select id="txt_search_company_id" name="txt_search_company_id">
                                    <option value="0" selected="selected">--------</option>
									<?php
                                    echo $v_dsp_company_option;
                                    ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr align="left" valign="middle">
                                    <td align="right">Product Sku:</td>
                                    <td><input type="text" size="20" class="text_css" name="txt_search_product_sku" /></td>
                                </tr>
                                <tr align="left" valign="middle">
                                    <td align="right">Short Description:</td>
                                    <td><input type="text" size="20" class="text_css" name="txt_search_short_description" /></td>
                                </tr>
                                <tr align="left" valign="middle">
                                    <td align="right">Product Tag:</td>
                                    <td>
                                    <select id="txt_search_product_tag" name="txt_search_product_tag[]" multiple="multiple">
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
                                    title: "Advanced Search for Product"
                                });
                            }
                            window_search.data("kendoWindow").center().open();
                        });
                        <?php echo $v_dsp_tag_script;?>
                        $("#txt_search_product_tag").width(300).kendoMultiSelect({
                            dataSource: tag,
                            dataTextField: "tag_name",
                            dataValueField: "tag_id"
                        });
                        var product_tag = $("#txt_search_product_tag").data("kendoMultiSelect");
                        product_tag.value(<?php echo json_encode($arr_product_tag)?>);
						$('select#txt_search_company_id').change(function(){
                            var $this = $(this);
                            var company_id = $(this).val();
                            company_id = parseInt(company_id, 10);
                            if(isNaN(company_id) || company_id<0) company_id = 0;

                            $.ajax({
                                url : '<?php echo URL;?>admin/product/tags/ajax',
                                type    : 'POST',
                                data    :   {txt_company_id: company_id},
                                beforeSend: function(){
                                    $this.attr('disabled', true);
                                },
                                success: function(data, type){
                                    try{
                                        var ret = $.parseJSON(data);
                                        if(ret.error==0){
                                            product_tag.value([]);
                                            product_tag.setDataSource(ret);
                                        }else{
                                            alert(ret.message);
                                        }
                                    }catch(e){
                                        alert('Data error!')
                                    }
                                    $this.attr('disabled', false);
                                }
                            });

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
                                        data: {txt_session_id:"<?php echo session_id();?>",txt_quick_search:'<?php echo $v_quick_search;?>',txt_search_company_id:<?php echo $v_company_id;?>, txt_search_product_sku:'<?php echo $v_search_product_sku;?>', txt_search_short_description:'<?php echo $v_search_short_description;?>', txt_search_product_tag: <?php echo json_encode($arr_product_tag);?>}
                                    }
                                },
                                schema: {
                                    data: "tb_product"
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
							{field: "product_sku", title: "Product Sku", type:"string", width:"80px", sortable: true },
							{field: "short_description", title: "Short Description", type:"string", width:"120px", sortable: true },
                            {field: "image_url", title: "Image", type:"string", width:"100px", sortable: false, template:'<p style="text-align:center; margin:0"><img src="#= image_url#" style="max-width:150px" /></p>'},
                            {field: "company_name", title: "Company Name", type:"string", width:"100px", sortable: false},
							{field: "package_type", title: "Package Type", type:"string", width:"50px", sortable: false},
							{field: "product_status", title: "Product Status", type:"string", width:"50px", sortable: false},
                            {field: "product_tag", title: "Tag", type:"string", width:"100px", sortable: false},
							{ command:  [
								{ name: "View", text:'', title:'View info', click: view_row, imageClass: 'k-grid-View' }
								<?php if($v_edit_right || $v_is_admin){?>
								,{ name: "Edit", text:'', title:'Edit item', click: edit_row, imageClass: 'k-grid-Edit' }
								<?php }?>
								<?php if($v_delete_right || $v_is_admin){?>
								,{ name: "Delete", text:'', title:'Delete item', click: delete_row, imageClass: 'k-grid-Delete' }
								<?php }?>
								],
								title: " ", width: "70px" }
						 ]
					 }).data("kendoGrid");
				});
              function view_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.product_id+"/view";
                }
                function edit_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to edit product with ID: '+dataItem.product_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.product_id+"/edit";
                    }
                }
                function delete_row(e) {
                    e.preventDefault();
                    var dataItem = this.dataItem($(e.currentTarget).closest("tr"));
                    if(confirm('Do you want to delete product with ID: '+dataItem.product_id+'?')){
                        document.location = "<?php echo URL.$v_admin_key.'/';?>"+dataItem.product_id+"/delete";
                    }
                }
            </script>
                </div>
            </div>
        </div>
  </div>
<style type="text/css">
    .k-grid td {
        background: -moz-linear-gradient(top,  rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.15) 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.05)), color-stop(100%,rgba(0,0,0,0.15)));
        background: -webkit-linear-gradient(top,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
        background: -o-linear-gradient(top,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
        background: -ms-linear-gradient(top,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
        background: linear-gradient(to bottom,  rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.15) 100%);
        padding: 20px;
    }
</style>