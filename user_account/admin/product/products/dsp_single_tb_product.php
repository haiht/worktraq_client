<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
$(document).ready(function(){
    $("input#btn_submit_tb_product").click(function(e){
        var company_id = $("select#txt_company_id").val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id)||company_id<0) company_id = 0;
        if(company_id==0){
            e.preventDefault();
            alert('Please, choose company first!');
            $("select#txt_company_id").focus();
            return false;
        }
        if(!validator.validate()){
            e.preventDefault();
            if(tab_strip.select().index()!=0) tab_strip.select(0);
            return false;
        }

        var a_material = [];
        for(var i=0; i<material.length; i++){
            if(material[i].status==0){
                var one = {
                    id: material[i].id,
                    name: material[i].name,
                    color: material[i].color,
                    width: material[i].width,
                    length:material[i].length,
                    usize:material[i].usize,
                    thick: material[i].thick,
                    uthick:material[i].uthick,
                    sided:material[i].sided,
                    price:material[i].price,
                    size:material[i].size,
                    status:0
                };

                //var t = new Material(material[i].id, material[i].name, material[i].color, material[i].width, material[i].length, material[i].usize, material[i].thick, material[i].uthick,material[i].sided, material[i].price, material[i].size);
                a_material.push(one);
            }
        }
        $('input#txt_product_material').val(JSON.stringify(a_material));

        var threshold = '';
        if(list_threshold.length>0){
            $('select#txt_location_threshold option').each(function(index, element){
                if($(this).prop('selected')){
                    list_threshold[index].overflow = 1;
                }else{
                    list_threshold[index].overflow = 0;
                }
            });
            threshold = JSON.stringify(list_threshold);
        }
        $('input#txt_hidden_location_threshold').val(threshold);
        return true;
    });
    var validator = $('div.information').kendoValidator().data("kendoValidator");

    var tab_strip = $("#data_single_tab").kendoTabStrip({
        animation:  {
            open: {
                effects: "fadeIn"
            }
        }
    }).data("kendoTabStrip");
    var tooltip = $("span.tooltips").kendoTooltip({
        filter: 'a',
        width: 120,
        position: "top"
    }).data("kendoTooltip");

    var tags = <?php echo json_encode($arr_all_tag);?>;
    var locations = <?php echo json_encode($arr_all_location);?>;
	var groups = <?php echo json_encode($arr_all_group);?>;
    $("#txt_tag").width(300).kendoMultiSelect({
        dataSource: tags,
        dataTextField: "tag_name",
        dataValueField: "tag_id"
    });
    $("select#txt_location_id").width(250).kendoComboBox({
        dataSource: locations,
        dataTextField:'location_name',
        dataValueField:'location_id'
    });
	$('select#txt_product_threshold_group_id').width(200).kendoComboBox({
		dataSource: groups,
		dataValueField: "product_group_id",
		dataTextField: "product_group_name"
	});;
    var locations_data = $("select#txt_location_id").data("kendoComboBox");
    locations_data.value(<?php echo $v_location_id;?>);
    var groups_data = $("select#txt_product_threshold_group_id").data("kendoComboBox");
    groups_data.value(<?php echo $v_product_threshold_group_id;?>);

    $("select#txt_product_status").width(200).kendoComboBox();
    $("select#txt_sold_by").width(200).kendoComboBox();
    var product_tag = $("#txt_tag").data("kendoMultiSelect");
    product_tag.value(<?php echo json_encode($arr_product_tag);?>);
    var combo_company = $("select#txt_company_id").data("kendoComboBox");
    <?php if($v_company_id>0){?>
    combo_company.enable(false);
    <?php }?>
    $('select#txt_num_images').width(50).kendoComboBox();
    $('select#txt_size_unit').width(100).kendoComboBox();
    $('select#txt_material_id').width(300).kendoComboBox();
    var combo_material = $('select#txt_material_id').data("kendoComboBox");
    var thicks = [{"thick":0}];
    var thicks_unit = [{"unit_code":"", "unit_name":"----"}];
    var colors = [{"color_code":"", "color_name":"------"}];
    $('select#txt_thick').width(100).kendoComboBox({
        dataSource:thicks,
        dataValueField: "thick",
        dataTextField: "thick"
    });
    var combo_thicks = $('select#txt_thick').data("kendoComboBox");
    $('select#txt_thick_unit').width(100).kendoComboBox({
        dataSource:thicks_unit,
        dataValueField: "unit_code",
        dataTextField: "unit_name"
    });
    var combo_thicks_unit = $('select#txt_thick_unit').data("kendoComboBox");
    $('select#txt_color').width(200).kendoComboBox({
        dataSource:colors,
        dataValueField: "color_code",
        dataTextField: "color_name"
    });
    var combo_color = $('select#txt_color').data("kendoComboBox");
    $("#txt_size_width").kendoNumericTextBox({
        format: "n2",
        min: 0,
        max: 100,
        step: 0.01
    });
    $("#txt_size_length").kendoNumericTextBox({
        format: "n2",
        min: 0,
        max: 100,
        step: 0.01
    });
    $("#txt_price").kendoNumericTextBox({
        format: "c2",
        min: 0,
        max: 100,
        step: 0.01
    });
    $("#txt_default_price").kendoNumericTextBox({
        format: "c2",
        min: 0,
        max: 100,
        step: 0.01
    });
    $('#txt_product_threshold').kendoNumericTextBox({
       format:"n0",
        min:0,
        max:100,
        step:1
    });
    $('#txt_package_quantity').kendoNumericTextBox({
        format:"n0",
        min:0,
        max:100,
        step:1
    });
    var thresholds = $('#txt_product_threshold').data("kendoNumericTextBox");

    $('input#txt_image_file').kendoUpload({
        multiple: false
        ,select: on_select
        /*
        <?php if($v_product_id>0){?>

            ,async: {
            saveUrl: "<?php echo URL.$v_admin_key;?>/ajax",
                autoUpload: true
            }
            ,upload: on_upload
        <?php }?>
        */
    });
    <?php if($v_product_id>0){?>
    function on_upload(e){
        e.data = {txt_ajax_type: "upload_thumbnail", txt_product_id: <?php echo $v_product_id;?>};
    }
    <?php }?>
    function on_select(e){
        //alert(e.files[0].name);
    }
    $('input#txt_package_type').click(function(e) {
        var c = $(this).prop('checked');
        if(c){
            $('span#sp_multiple').css('display', '');
            var q = $('input#txt_package_quantity').val();
            q = parseInt(q, 10);
            if(isNaN(q) || q<=1) q = 10;
            $('input#txt_package_quantity').val(q);
        }else{
            $('span#sp_multiple').css('display', 'none');
        }
    });
    $('input#txt_is_threshold').click(function(e) {
        var chk = $(this).prop('checked');
        if(chk){
            var old = $('input#txt_hidden_threshold').val();
            old = parseInt(old, 10);
            if(isNaN(old) || old<0) old = 0;
            thresholds.value(old);
            thresholds.enable(true);
        }else{
            thresholds.value([]);
            thresholds.enable(false);
        }
    });

    $('img.img_action').each(function(index, element) {
        $(this).click(function(e) {
            var flag = $(this).attr('data-flag');
            if(flag=='material'){
                var i = $(this).attr('data-id');
                var t = $(this).attr('data-thick');
                var c = $(this).attr('data-color');
                var us = $(this).attr('data-unit-size');
                var ut = $(this).attr('data-unit-thick');
                var w = $(this).attr('data-width');
                var l = $(this).attr('data-length');
                var p = $(this).attr('data-price');
                var sd = $(this).attr('data-sided');
                i = parseInt(i, 10);
                if(isNaN(i) || i<0) i = 0;
                t = parseFloat(t);
                if(isNaN(t) || t<0) t=0;
                p = parseFloat(p);
                if(isNaN(p) || p<0) p=0;
                w = parseFloat(w);
                l = parseFloat(l);
                sd = parseInt(sd, 10);
                if(isNaN(sd)) sd = 0;
                if(sd <0 || sd>1) sd = 0;
                if(remove_material(i, c, w, l, us, t, ut, sd)) $(this).parent().remove();
            }else if(flag=='text'){
                $(this).parent().remove();
            }
        });
    });


    $('select#txt_company_id').change(function(e) {
        var $this = $(this);
        var company_id = $(this).val();
        company_id = parseInt(company_id, 10);
        if(isNaN(company_id) || company_id<0) company_id = 0;
        $.ajax({
            url : '<?php echo URL.$v_admin_key;?>/ajax',
            type    : 'POST',
            data    :   {txt_company_id: company_id, txt_ajax_type:'product_info'},
            beforeSend: function(){
                $this.prop('disabled', true);
                combo_company.enable(false);
            },
            success: function(data, type){
                var ret = $.parseJSON(data);
                if(ret.error==0){
                    var locations = ret.location;
                    var tags = ret.tag;
                    var groups = ret.group;
                    locations_data.setDataSource(locations);
                    product_tag.setDataSource(tags);
                    groups_data.setDataSource(groups);
                    locations_data.value(0);
                    product_tag.value([]);
                    groups_data.value(0);
                    $('form#frm_tb_product').find('#txt_company_id').val($(this).val(company_id));
                }else{
                    alert(ret.message);
                }
                $this.prop('disabled', false);
                combo_company.enable(true);
            }
        });
    });

    $('input#txt_product_sku').focusout(function(){
        var v_old_product_sku = '<?php echo $v_product_sku; ?>';
        var v_new_product_sku = $.trim($(this).val());
        if((v_old_product_sku + v_new_product_sku)=='') return false;
        if(v_old_product_sku==v_new_product_sku) return false;
        if(v_new_product_sku==''){
            $(this).val('');
            $('input#txt_hidden_product_sku').val('N');
            validator.validate();
            return false;
        }
        var company_id = $('input#txt_company_id').val();
        var product_id = $('input#txt_product_id').val();
        $.ajax({
            url	    :'<?php echo URL.$v_admin_key ?>/ajax',
            type	:'POST',
            data	:{txt_ajax_type:'product_sku',txt_product_sku:$.trim(v_new_product_sku), txt_product_id:product_id, txt_company_id:company_id},
            beforeSend: function(){
                $('span#sp_product_sku').html('Checking!....');
            },

            success: function(data, type){
                var ret = $.parseJSON(data);
                $('span#sp_product_sku').html('');
                var val = ret.error==0?v_new_product_sku:'';
                $('input#txt_hidden_product_sku').val(val);
                validator.validate();
            }
        });
    });
    $('select#txt_material_id').change(function(e) {
        var id = $(this).val();
        id = parseInt(id, 10);
        if(isNaN(id)) id = 0;
        if(id<=0) return;
        var $this = $(this);
        $.ajax({
            type	: 'POST',
            url:	"<?php echo URL.$v_admin_key;?>/ajax",
            data	: {txt_material_id: id, txt_ajax_type: "material_option"},
            beforeSend: function(){
                $this.prop('disabled', true);
                combo_material.enable(false);
            },
            success: function(data, status){
                var content = $.parseJSON(data);
                if(content.error == 0){
                    var option = content.option;
                    opt = new Array();
                    for(var i=0; i<option.length;i++){
                        opt[i] = new Option(option[i].thick, option[i].unit_code, option[i].unit_name, option[i].color_code, option[i].color_name,option[i].sided);
                    }
                    var list_thick='';
                    var thicks = [];
                    var j=0;
                    for(var i=0; i<opt.length; i++){
                        if(list_thick.indexOf(opt[i].thick+',')==-1){
                            list_thick += opt[i].thick+',';
                            var one = {"thick":opt[i].thick};
                            thicks.push(one);
                            j++;
                        }
                    }
                    if(j>0){
                        combo_thicks.setDataSource(thicks);
                        combo_thicks.select(0);
                        //$('select#txt_thick').kendoComboBox().trigger("change");
                        $('select#txt_thick').trigger('change');
                    }else{
                        combo_thicks.select(-1);
                    }

                }else{
                    alert(content.message);
                }
                $this.prop('disabled', false);
                combo_material.enable(true);
            }
        });
    });

    $('select#txt_thick').change(function(e){
        var thick = $(this).val();
        thick = parseFloat(thick);
        var list_unit = '';
        var j = 0;
        var units = [];
        for(var i=0; i<opt.length; i++){
            if(thick==opt[i].thick){
                if(list_unit.indexOf(opt[i].unit_code+',')==-1){
                    list_unit += opt[i].unit_code+',';
                    var one = {"unit_code":opt[i].unit_code, "unit_name":opt[i].unit_name};
                    units.push(one);
                    j++;
                }
            }
        }
        combo_thicks_unit.setDataSource(units);
        if(j>0){
            combo_thicks_unit.select(0);
            $('select#txt_thick_unit').trigger("change");
        }else{
            combo_thicks_unit.select(-1);
        }

    });

    $('select#txt_thick_unit').change(function(e) {
        var unit_code = $(this).val();
        var thick = $('select#txt_thick').val();
        thick = parseFloat(thick);
        var list_color = '';
        //$('select#txt_color option').remove();
        var colors = [];
        var j = 0;
        for(var i=0; i<opt.length; i++){
            if(thick==opt[i].thick && unit_code==opt[i].unit_code){
                if(list_color.indexOf(opt[i].color_code+',')==-1){
                    list_color += opt[i].color_code+',';
                    //var $opt = $('<option value="'+opt[i].color_code+'">'+opt[i].color_name+'</option>');
                    //$('select#txt_color').append($opt);
                    var one = {"color_code":opt[i].color_code, "color_name":opt[i].color_name};
                    colors.push(one);
                    j++;
                }
            }
        }
        combo_color.setDataSource(colors);
        combo_color.select(j>0?0:-1);
        if(j>0){
            $('select#txt_color').trigger("change");
        }
    });
    $('select#txt_color').change(function(){
        var color = $(this).val();
        var thick = $('select#txt_thick').val();
        thick = parseInt(thick);
        var unit = $('select#txt_thick_unit').val();
        var j=-1;
        for(var i=0; i<opt.length && j==-1; i++){
            if(thick==opt[i].thick && unit==opt[i].unit_code && color==opt[i].color_code){
                j = i;
            }
        }
        if(j>=0){
            var sided = opt[j].two_sided==1;
            $('input#txt_two_sided').prop("disabled", !sided);
            if(!sided)
                $('input#txt_two_sided').prop("checked", false);
        }
    });

});
var current_color = '#000000';
var material = new Array();
<?php
echo $v_dsp_material_script;
?>
var count_text = <?php echo $v_text_count;?>;

function remove_material(m, c, w, l, us, t, ut, sd){
    var r = false;
    for(var i = 0; i< material.length; i++){
        if(material[i].compare(m, c, w, l, us, t, ut, sd)){
            material[i].remove();
            r = true;
        }
    }
    return r;
}

function Material(id, name, color, width, length, usize, thick, uthick, sided, price, sop){
    var t = parseInt(id, 10);
    if(isNaN(t) || t<0) t= 0;
    this.id = t;
    this.name = name;
    this.color = color;
    t = parseFloat(width);
    if(isNaN(t) || t<0) t = 0;
    this.width = t;
    t = parseFloat(length);
    if(isNaN(t) || t<0) t = 0;
    this.length = t;

    t = parseFloat(thick);
    if(isNaN(t) || t<0) t  = 0;
    if (t == 0) {
        uthick = 'none';
    }
    this.thick = t;
    this.uthick = uthick;
    this.usize = usize;
    t = parseFloat(price);
    if(isNaN(t) || t<0) t  = 0;
    price = parseFloat(price);
    if(isNaN(price)) price = 0;
    this.price = price;
    this.size = sop!=1?0:1;
    this.status = 0;
    sided = parseInt(sided,10);
    if(isNaN(sided)) sided = 0;
    if(sided<0 || sided>1) sided = 0;
    this.sided = sided;
}
Material.prototype.compare = function(m, c, w, l, us, t, ut, sd){
    //alert('id: '+m+'<>'+this.id+' - c: '+c +'<>'+this.color+ ' -w: '+w + '<>'+this.width+' -l: '+l + '<>'+this.length+' -us: '+us + '<>'+this.usize+' -t: '+t + '<>'+this.thick+' -ut: '+ut+ '<>'+this.uthick+' -sd:'+sd+'<>'+this.sided);

    return (this.id == m && this.color==c && this.width == w && this.length==l && this.thick==t && this.usize==us && this.uthick == ut && this.sided==sd && this.status==0);
}
Material.prototype.remove = function(){
    this.status = 1;
}
function Option(thick, unit_code, unit_name, color_code, color_name, two_sided){
    thick = parseFloat(thick);
    this.thick = thick;
    this.unit_code = unit_code;
    this.unit_name = unit_name;
    this.color_code = color_code;
    this.color_name = color_name;
    this.two_sided = two_sided;
}
var opt = new Array();
function add_material(obj){
    var mid = $('select#txt_material_id').val();
    var m = $('select#txt_material_id option:selected').text();
    mid = parseInt(mid, 10);

    var w = $('input#txt_size_width').val();
    w = parseFloat(w);
    if(isNaN(w)) w = 0;

    var l = $('input#txt_size_length').val();
    l = parseFloat(l);
    if(isNaN(l)) l = 0;

    if (l*w == 0) {
        if ((l + w) != 0) {
            alert('<?php echo $cls_tb_message->select_value('invalid_size_is_not_customizable'); ?>');
            return;
        }
    }
    var us = $('select#txt_size_unit').val();
    if (l*w != 0) {
        if (us == 'none') {
            alert('<?php echo $cls_tb_message->select_value('invaild_input_unit_of_size'); ?>');
            return;
        }
    }

    var thick = $('select#txt_thick').val();
    thick = $.trim(thick);

    var ut = $('select#txt_thick_unit').val();
    var p = $('input#txt_price').val();
    p = $.trim(p);
    if(p!='') p = parseFloat(p);
    if (l*w != 0) {
        if(isNaN(p) || p<0){
            alert('<?php echo $cls_tb_message->select_value('invalid_input_valid_value_price'); ?>');
            $('input#txt_price').focus();
            return;
        }
    }
    if(mid > 0){
        if(isNaN(p) || p<0){
            alert('<?php echo $cls_tb_message->select_value('invalid_input_valid_value_price_material'); ?>');
            $('input#txt_price').focus();
            return;
        }
    }


    current_color = $('select#txt_color').val();
    var size = $('input#txt_allow_size_option').prop('checked')?1:0;
    if (size == 1) {
        if(p=='' || isNaN(p) || p<=0){
            alert('<?php echo $cls_tb_message->select_value('invalid_input_valid_value_price_size_customizable'); ?>');
            $('input#txt_price').focus();
            return;
        }
    }
    if (w == 0 && l == 0 && size == 0) {
        alert('<?php echo $cls_tb_message->select_value('invalid_input_size_option'); ?>');
        $('input#txt_allow_size_option').focus();
        return;
    }
    var sd = $('input#txt_two_sided').prop("checked")?1:0;
    var temp = new Material(mid, m, current_color,w,l,us, thick, ut, sd, p, size);
    var f= false;
    var pos = 0;
    for(var i=0; (i< material.length) && !f;i++){
        f = material[i].compare(mid, current_color, w, l, us, thick, ut, sd);
        if(f) pos = i;
    }
    if(!f){
        material.push(temp);

        var $div = $('<div class="node k-block k-widget" id="material_'+pos+'"><div style="width:10px; height:10px; border:1px solid #000; background-color:'+current_color+'"></div>'+m+' ('+w+' &times; '+l+' '+us+') '+thick+' '+ut+' '+(sd== 1?'(Allow two-sided print)':'')+' &rArr; $'+p+'</div>');
        var $img = $('<img class="img_action" id="img_material_'+pos+'" data-id="'+mid+'" data-name="'+m+'" data-width="'+w+'" data-length="'+l+'" data-unit-size="'+us+'" data-thick="'+thick+'" data-unit-thick="'+ut+'" data-price="'+p+'" data-color="'+current_color+'" data-size="'+size+'" data-sided="'+sd+'" data-flag="material" src="images/icons/delete.png" />');
        $img.bind('click', function(){
            var id = $(this).attr('data-id');
            var m = $(this).attr('data-name');
            var c = $(this).attr('data-color');
            var w = $(this).attr('data-width');
            var l = $(this).attr('data-length');
            var us = $(this).attr('data-unit-size');
            var ut = $(this).attr('data-unit-thick');
            var t = $(this).attr('data-thick');
            var p = $(this).attr('data-price');
            var size = $(this).attr('data-size');
            var sided = $(this).attr('data-sided');
            id = parseInt(id, 10);
            if(isNaN(id) || id<0) id = 0;
            p = parseFloat(p);
            if(isNaN(p) || p<0) p = 0;
            t = parseFloat(t);
            if(isNaN(t) || t<0) t = 0;
            w = parseFloat(w); if(isNaN(w)) w = 0;
            l = parseFloat(l); if(isNaN(l)) l = 0;
            t = parseFloat(t); if(isNaN(t)) t = 0;
            sided = parseInt(sided, 'int');
            if(isNaN(sided)) sided = 0;
            if(sided<0 || sided>1) sided = 0;
            //remove_size_select(w, h, u);
            //alert('click here');
            if(remove_material(id, c, w, l, us, t, ut, sided)) $(this).parent().remove();
        });
        $div.append($img);
        var $pdiv = $('div#product_material');

        $pdiv.append($div);

    }else{
        material[pos].status = 0;
    }
}
function add_text(){
    var $p = $('<p text="'+count_text+'" class="one_text"></p>');
    var $t = $('<input data-text="'+count_text+'" class="text_css k-textbox" size="50" type="text" id="txt_product_text" name="txt_product_text[]" value="" />');
    var $i = $('<img class="img_action" data-flag="text" data-text="'+count_text+'" style="cursor:pointer" src="images/icons/delete.png" />');
    $i.bind('click', function(){
        $(this).parent().remove();
    });
    var $l = $('<label text="'+count_text+'" id="lbl_product_text" style="color:red;display:none;">(*)</label>');
    $p.append($t);
    $p.append($i);
    $p.append($l);
    $('div#product_text').append($p);
}
function remove_text(obj){
    var id = obj.id;
    $('img#'+id).parent().remove();
}
function Threshold(location_id, location_name, threshold, overflow){
    var val = 0;
    val = location_id;
    val = parseInt(val, 10);
    if(isNaN(val) || val<0) val = 0;
    this.location_id = val;
    this.location_name = location_name;
    val = threshold;
    val = parseInt(val, 10);
    if(isNaN(val) || val<0) val = 0;
    this.threshold = threshold;
    this.overflow = overflow==1?1:0;
}
var list_excluded = new Array();
var list_threshold = new Array();
<?php
echo $v_dsp_script_threshold;
?>
</script>

<style type="text/css">
    div#div_material div.one{
        float:left;
        margin-left:5px;
        max-width:100px;
        /*border:#03C 1px solid;*/
        border-radius:3px;
        height:30px;
    }
    .img_action{
        margin-left:2px;
        vertical-align:bottom;
        cursor:pointer;
    }
    div.node{
        /*background-color:#FFF;
        border:1px outset #09C;
        border-radius:5px;
        box-shadow:0 1px 1px #FFFFFF inset;*/
        margin-right:5px;
        padding:5px;
        float:left;
        max-width:300px;
        overflow:hidden;
    }
</style>
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
                        <h3>Product<?php if($v_product_id>0) echo ': '.$v_product_sku.' ('.$v_short_description.')';?></h3>
                    </div>
                    <div id="div_quick">
                        <div id="div_quick_search">
                            &nbsp;
                        </div>
                        <div id="div_select">
                            <form id="frm_company_id" method="post">
                        Company: <select id="txt_company_id" name="txt_company_id">
                                    <option value="0" selected="selected">-------</option>
                                    <?php
                                    echo $v_dsp_company_option;
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>

<form id="frm_tb_product" action="<?php echo URL.$v_admin_key;?>/<?php echo is_null($v_mongo_id)?'add':$v_product_id.'/edit';?>" method="POST" enctype="multipart/form-data">
<input type="hidden" id="txt_mongo_id" name="txt_mongo_id" value="<?php echo $v_mongo_id;?>" />
<input type="hidden" id="txt_product_id" name="txt_product_id" value="<?php echo $v_product_id;?>" />
<input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_company_id;?>" />
                    <div id="data_single_tab">
                    <ul>
                        <li class="k-state-active">Information</li>
                        <li>Image</li>
                        <li>Material</li>
                        <li>Text</li>
                        <li>Threshold</li>
                    </ul>

                    <div class="information div_details">
<table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
<tr align="right" valign="top">
		<td style="width:200px">Location</td>
		<td style="width:1px">&nbsp;</td>
		<td align="left">
            <select id="txt_location_id" name="txt_location_id">
            </select>
        </td>
	</tr>
<tr align="right" valign="top">
		<td>Product Sku</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_product_sku" name="txt_product_sku" value="<?php echo $v_product_sku;?>" required data-required-msg="Please input Product Sku" />
            <input type="hidden" style="width:0px !important; border:none" name="txt_hidden_product_sku" id="txt_hidden_product_sku" value="<?php echo $v_product_sku==''?'Y':'N';?>" required validationMessage="This Product Sku is existed!" />
            <span id="sp_product_sku"></span>
            <span class="tooltips"><a title="Product Sku is unique">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>
            <label id="lbl_product_sku" class="k-required">(*)</label>

        </td>
	</tr>
<tr align="right" valign="top">
		<td>Short Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_short_description" name="txt_short_description" value="<?php echo $v_short_description;?>" required data-required-msg="Please input Short Description" />
            <label id="lbl_short_description" class="k-required">(*)</label></td>
	</tr>
<tr align="right" valign="top">
		<td>Long Description</td>
		<td>&nbsp;</td>
		<td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_long_description" name="txt_long_description" value="<?php echo $v_long_description;?>" /> <label id="lbl_long_description" style="color:red;display:none;">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Product Details</td>
        <td>&nbsp;</td>
        <td align="left">
            <textarea class="text_css k-textbox" cols="40" style="height:80px" id="txt_product_detail" name="txt_product_detail"><?php echo $v_product_detail;?></textarea> <label id="lbl_long_description" style="color:red;display:none;">(*)</label>
        </td>
    </tr>
    <tr align="right" valign="top">
        <td>Is Multiple?</td>
        <td>&nbsp;</td>
        <td align="left" colspan="2"><label><input type="checkbox" id="txt_package_type" name="txt_package_type" value="1"<?php echo $v_package_type==1?' checked="checked"':'';?> /> </label> &nbsp;&nbsp;&nbsp;&nbsp;<span id="sp_multiple"<?php echo $v_package_type==0?' style="display:none"':'';?>>Quantity for Multiple <input type="text" name="txt_package_quantity" size="10" id="txt_package_quantity" value="<?php echo $v_package_type==1?$v_package_quantity:'1';?>" /> <label style="color:red; display:none;" id="lbl_package_quantity">(*)</label> &nbsp;&nbsp;&nbsp;&nbsp;<label>Allow Single <input type="checkbox" id="txt_allow_single" name="txt_allow_single" disabled="disabled" value="1"<?php //echo $v_allow_single==1?' checked="checked"':'';?> /></label></span></td>
    </tr>
    <tr align="right" valign="top">
        <td>Sold By</td>
        <td>&nbsp;</td>
        <td align="left" colspan="2">
            <select id="txt_sold_by" name="txt_sold_by">
                <?php echo $v_dsp_sold_by;?>
            </select>
            <label id="lbl_sold_by" style="color:red;display:none;">(*)</label></td>
    </tr>
<tr align="right" valign="top">
		<td>Default Price</td>
		<td>&nbsp;</td>
		<td align="left"><input type="text" id="txt_default_price" name="txt_default_price" value="<?php echo $v_default_price;?>" /> <label id="lbl_default_price" style="color:red;display:none;">(*)</label></td>
	</tr>
    <tr align="right" valign="top">
        <td>Status</td>
        <td>&nbsp;</td>
        <td align="left" colspan="2">
            <select id="txt_product_status" name="txt_product_status">
                <?php
                echo $v_dsp_product_status_draw;
                ?>
            </select>
            <label id="lbl_product_status" style="color:red;display:none;">(*)</label></td>
    </tr>
<tr align="right" valign="top">
		<td>Tag</td>
		<td>&nbsp;</td>
		<td align="left">
            <select id="txt_tag" name="txt_tag[]" multiple="multiple">
            </select>
        </td>
	</tr>
</table>
                    </div>
                    <div class="image div_details">
                        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                            <tr align="right" valign="top">
                                <td style="width:200px">Thumbnail for Product</td>
                                <td style="width:1px">&nbsp;</td>
                                <td align="left">
                                    <input type="hidden" name="txt_hidden_image_file"  value="<?php echo $v_image_file;?>" />
                                    <input type="hidden" name="txt_hidden_image_desc"  value="<?php echo $v_image_desc;?>" />
                                    <input type="hidden" name="txt_hidden_saved_dir"  value="<?php echo $v_saved_dir;?>" />
                                    <input type="file" id="txt_image_file" name="txt_image_file" accept="image/*" />
                                </td>
                                <td rowspan="4" width="300" align="center" valign="middle">
                                    <?php
                                     echo $v_image_url!=''? $v_image_url :'';
                                    ?>
                                    &nbsp;
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Number of Images for this Product</td>
                                <td>&nbsp;</td>
                                <td align="left">
                                    <select id="txt_num_images" name="txt_num_images">
                                        <?php
                                        for($i=1; $i<=9;$i++){
                                            echo '<option value="'.$i.'"'.($i==$v_num_images?' selected="selected"':'').'>0'.$i.'</option>';
                                        }
                                        ?>
                                    </select> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <label><input type="checkbox" name="txt_image_choose" id="txt_image_choose" value="1"<?php echo $v_image_choose==1?' checked="checked"':'';?> /> Allow choose image for product</label>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Image Option</td>
                                <td>&nbsp;</td>
                                <td align="left"><label><input type="checkbox" id="txt_image_option" name="txt_image_option" value="1"<?php echo $v_image_option==1?' checked="checked"':'';?> /> Allow customize</label></td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>File Hd</td>
                                <td>&nbsp;</td>
                                <td align="left"><input class="text_css k-textbox" size="50" type="text" id="txt_file_hd" name="txt_file_hd" value="<?php echo $v_file_hd;?>" /> <label id="lbl_file_hd" style="color:red;display:none;">(*)</label></td>
                            </tr>
                        </table>
                    </div>
                    <div class="material div_details">
                        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                            <tr align="right" valign="top">
                                <td style="width:200px">Size Option</td>
                                <td style="width:20px">&nbsp;</td>
                                <td align="left">
                                    <label><input type="checkbox" id="txt_size_option" name="txt_size_option" value="1"<?php echo $v_size_option==1?' checked="checked"':'';?> /> Allow customize</label>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Print's Type</td>
                                <td>&nbsp;</td>
                                <td align="left" colspan="2"><label>
                                        <input type="radio" value="0" id="txt_print_type" name="txt_print_type"<?php echo $v_print_type==0?' checked="checked"':'';?> /> <?php echo $cls_settings->get_option_name_by_id('print_type',0);?></label> /
                                    <label><input type="radio" value="1" id="txt_print_type" name="txt_print_type"<?php echo $v_print_type==1?' checked="checked"':'';?> /> <?php echo $cls_settings->get_option_name_by_id('print_type',1);?></label> /
                                    <label><input type="radio" value="2" id="txt_print_type" name="txt_print_type"<?php echo $v_print_type==2?' checked="checked"':'';?> /> <?php echo $cls_settings->get_option_name_by_id('print_type',2);?></label>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Material</td>
                                <td align="center" valign="top">&nbsp;<img src="images/icons/add.png" style="cursor:pointer" title="Add Material" onclick="add_material(this)" /></td>
                                <td align="left" colspan="2">
                                    <table cellpadding="2" cellspacing="2" width="100%" class="grid_table">
                                        <tr>
                                            <td>
                                                Width: <input type="text" id="txt_size_width" name="txt_size_width" value="0" />
                                                &times; Length:
                                                <input type="text" id="txt_size_length" name="txt_size_length" value="0" /> &nbsp;&nbsp;Size Unit <select id="txt_size_unit" name="txt_size_unit">
                                                    <?php echo $v_dsp_size_unit_draw;?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="txt_material_id">Material: </label>
                                                <select id="txt_material_id" name="txt_material_id">
                                                    <option value="0" selected="selected">-------</option>
                                                    <?php echo $v_dsp_material_draw;?>
                                                </select>

                                                <label for="txt_thick">Thickness:
                                                    <select id="txt_thick" name="txt_thick">
                                                        <option value="0" selected="selected">----</option>
                                                    </select>
                                                    </label>
                                                Thickness Unit:
                                                <select id="txt_thick_unit" name="txt_thick_unit">
                                                    <option value="" selected="selected">----</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="txt_color">Color: </label>
                        <span id="sp_color">
                            <select id="txt_color" name="txt_color">
                            </select>
                        </span>
                        <label><input type="checkbox" id="txt_two_sided" name="txt_two_sided" disabled="disabled" /> Allow two-sided print?</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <label for="txt_price">Price (<?php echo $v_sign_money;?>): <input type="text" value="" id="txt_price" name="txt_price" /> </label>
                                                <label for="txt_allow_size_option"><input type="checkbox" value="1" id="txt_allow_size_option" name="txt_allow_size_option" /> Allow size option </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="product_material"><?php echo $v_dsp_material_list;?></div><input type="hidden" id="txt_product_material" name="txt_product_material" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="text div_details">
                        <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                            <tr align="right" valign="top">
                                <td style="width:200px">Text Option</td>
                                <td style="width:20px">&nbsp;</td>
                                <td align="left">
                                    <label><input type="checkbox" id="txt_text_option" name="txt_text_option" value="1"<?php echo $v_text_option==1?' checked="checked"':'';?> /> Allow customize</label>
                                </td>
                            </tr>
                            <tr align="right" valign="top">
                                <td>Text</td>
                                <td align="center" valign="middle">&nbsp;<img src="images/icons/add.png" style="cursor:pointer" title="Add" onclick="add_text(this)" /></td>
                                <td align="left" colspan="2">
                                    <div id="product_text">
                                        <?php
                                        echo $v_dsp_text_list;
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                        <div class="threshold div_details">
                            <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
                                <tr align="right" valign="top">
                                    <td style="width:200px">Product group for threshold</td>
                                    <td style="width:20px">&nbsp;</td>
                                    <td align="left">
                                <select id="txt_product_threshold_group_id" name="txt_product_threshold_group_id">
                                </select>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Approved Threshold</td>
                                    <td>&nbsp;</td>
                                    <td align="left">
                                        <label><input type="checkbox" name="txt_is_threshold" id="txt_is_threshold" value="1"<?php echo $v_product_threshold>=0?' checked="checked"':'';?> />Threshold?</label> &nbsp;
                                        <input type="text" size="10" name="txt_product_threshold" id="txt_product_threshold" value="<?php echo $v_product_threshold>=0?$v_product_threshold:'';?>"<?php echo $v_product_threshold<0?' disabled="disabled"':'';?> />
                                        <input type="hidden" id="txt_hidden_threshold" value="<?php echo $v_product_threshold;?>" />
                                    </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Locations' Threshold</td>
                                    <td><img id="img_location_threshold" width="16" style="cursor: pointer" src="<?php echo IMAGE_URL.'icons/tab_edit.png';?>" border="0" title="Edit list locations threshold" /></a></td>
                                    <td align="left" colspan="2">
                                        <div <?php echo $v_dsp_location_threshold==''?' style="display:none"':'';?> id="location_threshold">
                                            <select id="txt_location_threshold" name="txt_location_threshold[]" multiple="multiple" style="width:300px; height:200px" class="k-textbox k-input">
                                                <?php echo $v_dsp_location_threshold;?>
                                            </select> <br />
                                            <input type="hidden" name="txt_hidden_location_threshold" id="txt_hidden_location_threshold" />
                                            <span style="color:#00709F">Selected item means that locations are allowed to exceed threshold.</span>
                                        </div>&nbsp;
                                    </td>
                                </tr>
                                <tr align="right" valign="top">
                                    <td>Excluded Locations</td>
                                    <td><img id="img_excluded_location" style="cursor: pointer" width="16" src="<?php echo IMAGE_URL.'icons/tab_edit.png';?>" border="0" title="Edit list excluded locations" /></td>
                                    <td align="left" colspan="2">
                                        <div <?php echo $v_dsp_excluded_location==''?' style="display:none"':'';?> id="excluded_location">
                                            <select id="txt_excluded_location" name="txt_excluded_location[]" multiple="multiple" style="width:300px; height:200px" class="k-textbox k-input">
                                                <?php echo $v_dsp_excluded_location;?>
                                            </select> <br />
                                            <!--<span style="color:#00709F">Hold down "Control", or "Command" on a Mac, to select more than one.</span>-->
                                        </div>&nbsp;
                                    </td>
                                </tr>
                            </table>
                        </div>
                   </div>
                   <?php if(isset($v_act) && in_array($v_act, array('E', 'N'))){?>
                   <?php if($v_error_message!=''){?>
                    <div class="k-block k-widget k-error-colored div_errors">
                    <?php echo $v_error_message;?>
                    </div>
                    <?php }?>
                    <div class="k-block k-widget div_buttons">
                    <input type="submit" id="btn_submit_tb_product" name="btn_submit_tb_product" value="Submit" class="k-button button_css" />
                    </div>
                    <?php }?>

</form>
                </div>
            </div>
        </div>
  </div>
<div id="div_location_threshold" style="display: none">

</div>
<div id="div_excluded_location" style="display: none">

</div>
<script type="text/javascript">
    var window_location_threshold_close_flag = false, window_excluded_location_close_flag = false;
    var window_location_threshold, window_excluded_location;
    $(document).ready(function(){
        window_location_threshold = $("div#div_location_threshold");
        window_excluded_location = $("div#div_excluded_location");
        $("img#img_location_threshold").bind("click", function(){
            if (!window_location_threshold.data("kendoWindow")) {
                window_location_threshold.kendoWindow({
                    width: "800px",
                    height: "500px",
                    actions: ["Maximize", "Close"],
                    modal: true,
                    iframe:true,
                    content:"<?php echo URL.$v_admin_key.'/'.$v_product_id?>/threshold",
                    title: "Location Threshold for Product",
                    close: window_threshold_close
                });
            }
            window_location_threshold.data("kendoWindow").center().open();

        });
        $("img#img_excluded_location").bind("click", function(){
            if (!window_excluded_location.data("kendoWindow")) {
                window_excluded_location.kendoWindow({
                    width: "800px",
                    height: "500px",
                    actions: ["Maximize", "Close"],
                    modal: true,
                    iframe:true,
                    content:"<?php echo URL.$v_admin_key.'/'.$v_product_id?>/exclude",
                    title: "Excluded Location for Product",
                    close: window_excluded_close
                });
            }
            window_excluded_location.data("kendoWindow").center().open();

        });

        function window_threshold_close(){
            if(window_location_threshold_close_flag){
                $('select#txt_location_threshold option').remove();

                for(var i=0; i<list_threshold.length; i++){
                    var $opt = $('<option value="'+list_threshold[i].location_id+'"'+(list_threshold[i].overflow==1?' selected="selected"':'')+'>['+list_threshold[i].threshold+'] '+list_threshold[i].location_name+'</option>');
                    $('select#txt_location_threshold').append($opt);
                }
                $('div#location_threshold').css('display',$('select#txt_location_threshold option').length>0?'':'none');
                window_location_threshold_close_flag = false;
            }
        }
        function window_excluded_close(){
            if(window_excluded_location_close_flag){
                if(list_excluded.length>0){
                    $('select#txt_excluded_location option').remove();
                    for(var i=0; i<list_excluded.length; i++){
                        var $opt = $('<option value="'+list_excluded[i][0]+'" selected="selected">'+list_excluded[i][1]+'</option>');
                        $('select#txt_excluded_location').append($opt);
                    }
                    $('div#excluded_location').css('display','');
                }

                window_excluded_location_close_flag = false;
            }
        }
    });
</script>