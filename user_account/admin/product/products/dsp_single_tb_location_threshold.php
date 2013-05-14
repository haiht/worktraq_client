<?php
if(!isset($v_sval)) die();
?>

<style type="text/css">
#div_area{
    width: 100%;
    text-align: justify;
}
#div_close{
    height:40px;
    text-align:right;
    padding-right:10px;
}

select, table{
    font-size: 12px;
}

</style>
<script type="text/javascript">
    var data = <?php echo json_encode($arr_data);?>;
$(document).ready(function(){
    $("#txt_company_id").width(300).kendoComboBox();
    var company_combo = $("#txt_company_id").data("kendoComboBox");
    <?php if($v_product_id>0){?>
    company_combo.enable(false);
    <?php }?>
    $('input#btn_get').click(function(){
        var i=0;
        parent.list_threshold = new Array();
        var data = grid.dataSource.data();
        for(var j=0; j<data.length;j++){
            if(data[j].enable){
                parent.list_threshold[i++] = new parent.Threshold(data[i].location_id, data[i].location_name, data[i].threshold, data[i].overflow?1:0);
            }
        }
        parent.window_location_threshold_close_flag = true;
        parent.window_location_threshold.data("kendoWindow").close();
    });
    var grid = $("div#div_data").kendoGrid({
        dataSource:{
            data:data,
            pageSize:20,
            schema: {
                model: {
                    id: "location_id",
                    fields: {
                        location_id: { editable: false, nullable: false },
                        location_name: {editable:false, type:"string" },
                        location_number: { editable:false, type:"string" },
                        threshold: { type: "number", validation: { required: true, min: 0}},
                        overflow: { type: "boolean" },
                        enable: { type: "boolean" }
                    }
                }
            }
        },
        height: 390,
        scrollable: true,
        sortable: true,
        pageable: {
            input: true,
            numeric: false
        },
        editable:"inline",
        batch:true,
        save:function(){
            this.refresh();
        },
        filterable: true,
        columns: [
            { field: "enable", title:"&nbsp",type:"boolean", width:"40px", sortable:true, editable:true,filterable: false, template:"#= enable==1?'Enabled':'Disabled'#"},
            { field: "location_name", title:"Location Name",type:"string", width:"120px", sortable:true, editable:false},
            { field: "location_number", title:"Loc. Number",type:"string", width:"50px", sortable:true, editable:false},
            { field: "threshold", title:"Threshold",type:"number",format:"{0:n0}",filterable: false, width:"50px", sortable:true, editable:true},
            { field: "overflow", title:"Overflow",type:"boolean", width: "40px", editable:true,filterable: false, template:"#= overflow==1?'Yes':'No'#" },
            { command: ["edit"], title: "&nbsp;", width: "100px" }
        ]
    }).data("kendoGrid");
    //var dataSource = $("div#div_data").data("kendoGrid");
});
</script>
<div id="div_close">
    <input type="button" value="Get them" id="btn_get" class="k-button button_css" />
</div>

<div id="div_area" class="k-block">
<form method="POST" action="<?php echo URL.$v_admin_key.'/'.$v_product_id.'/threshold';?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
    <tr align="left" valign="top">
    <td width="200" align="right">
    Company:</td>
    <td width="2">&nbsp;</td>
    <td>
    <select id="txt_company_id" name="txt_company_id" onchange="this.form.submit()">
    <option value="0" selected="selected">---- Choose Company ----</option>
    <?php echo $v_dsp_company;?>
    </select>
    </td>
    </tr>
</table>

</form>
    <div id="div_data"></div>
</div>
