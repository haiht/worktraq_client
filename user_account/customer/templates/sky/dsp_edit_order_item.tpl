<script type="text/javascript" src="[@URL]/lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="[@URL]/lib/js/json-min.js"></script>
<SCRIPT>
    $(document).ready(function(){
        $("a.tab").click(function () {
            $(".active").removeClass("active");
            $(this).addClass("active");
            $(".content_table_item").hide();
            var content_show = $(this).attr("title");
            $("#"+content_show).show();
            return false;
        });
        $("#txt_list_order").change(function(){
            $("#data-order-id").val( $(this).val());
        });
        $("#btn_add_cart").click(function(){
            var product_id = $("#data-product-id").val();
            product_id = parseInt(product_id, 10);
            if(product_id<0){
                alert('[@ALERT_INVALID_DATA]');
                return false;
            }
            var size = $('select#txt_product_size').val();
            if(size==''){
                alert('[@ALERT_CHOISE_SIZE]');
                return false;
            }
            var order_id = $("#data-order-id").val();
            order_id = parseInt(order_id, 10);
            var idx =$("#data-material-idx").val();
            var v_product_quantity = $("#product_quantity").val();
            var arr =[@TEXT_CONTAINT] ;
            $.ajax({
                url	:	'[@AJAX_ADD_ORDER_URL]',
                type	:	'POST',
                data	:	{session_id:'[@SESSION_ID]',txt_product_id:product_id, txt_order_id:order_id,
                txt_product_quantity:v_product_quantity, txt_material_idx : idx,txt_text:arr, txt_order_ajax:101 },
                beforeSend: function(){
                    $('input#btn_add_order').attr('disabled',true);
                },
                success: function(data, type){
                    var err = readKey('error', data, 'int');
                    var msg = readKey('message', data);
                    if(err==0){
                        if(order_id<=0)
                            document.location = '[@URL]order/create';
                        else
                            document.location = '[@URL]order/'+order_id+'/edit';

                    }else{
                        alert(msg);
                    }
                    $('input#btn_add_order').attr('disabled',false);
                }
            });
            return true;
        });
        var material = [@MATERIAL_OPTION];
        $('select#txt_product_size').change(function(e){
            var idx = $(this).val();
            idx = parseInt(idx, 10);
            $("#data-material-idx").val(idx);
            var size = '('+material[idx].width+' &times; '+material[idx].length+ ' '+material[idx].usize+')';
            var $sel_material = $('select#txt_product_material');
            $('select#txt_product_material option').remove();
            var list_material = '';
            for(var i=0; i<material.length;i++){
                var one = '('+material[i].width+' &times; '+material[i].length+ ' '+material[i].usize+')';
                if(size==one ){
                    var $opt = $('<option value="'+i+'">'+material[i].name+'</option>')
                    $sel_material.append($opt);
                    list_material += one+',';
                }
            }
            if(list_material!='') $sel_material.trigger("change");
        });
        $('select#txt_product_material').change(function(e){
            var idx = $(this).val();
            idx = parseInt(idx, 10);
            $("#data-material-idx").val(idx);
            var size = '('+material[idx].width+' &times; '+material[idx].length+ ' '+material[idx].usize+')';
            var mat = material[idx].name;

            var $sel_thick = $('select#txt_material_thickness');
            $('select#txt_material_thickness option').remove();
            var list_thick = '';
            for(var i=0; i<material.length;i++){
                var one_size = '('+material[i].width+' &times; '+material[i].length+ ' '+material[i].usize+')';
                var one_material = material[i].name;
                var one = material[i].thick+' '+material[i].uthick;
                if(size==one_size && mat==one_material && list_thick.indexOf(one)==-1){
                    var $opt = $('<option value="'+i+'">'+one+'</option>')
                    $sel_thick.append($opt);
                    list_thick += one;
                }
            }
            if(list_thick!='') $sel_thick.trigger("change");
        });
        $('select#txt_material_thickness').change(function(e){
            var idx = $(this).val();
            idx = parseInt(idx, 10);
            var size = '('+material[idx].width+' &times; '+material[idx].length+ ' '+material[idx].usize+')';
            var mat = material[idx].name;
            var thick = material[idx].thick+' '+material[idx].uthick;
            var $sel_color = $('select#txt_material_color');
            $('select#txt_material_color option').remove();
            var list_color = '';
            for(var i=0; i<material.length;i++){
                var one_size = '('+material[i].width+' &times; '+material[i].length+ ' '+material[i].usize+')';
                var one_material = material[i].name;
                var one_thick = material[i].thick+' '+material[i].uthick;
                var one = material[i].color;
                if(size==one_size && mat==one_material && one_thick==thick && list_color.indexOf(one+',')==-1){
                    var $opt = $('<option value="'+i+'">'+one+'</option>')
                    $sel_color.append($opt);
                    list_color += one+',';
                }
            }
            if(list_color!='') $sel_color.trigger("change");
        });
        $('select#txt_material_thickness').change(function(e){
            var idx = $(this).val();
            idx = parseInt(idx, 10);
            $("#spn_unit_price").html(material[idx].price);
            $("#txt_unit_price").val(material[idx].price);
        });
    });
</SCRIPT>
<div class="sub" [@DSP_HIDDEN]>
<a href="[@URL]">HOME</a>
<span class="icon_sub_next"></span>
<a class="sub_active" href="[@URL]order" >ORDER</a>
<span class="icon_sub_next"></span>
<a class="sub_active" href="[@URL]order/[@order_id]/item/[@order_item_id]" >ITEM</a>
</div>
</div>
</div>
<div class="content" STYLE="[@DIV_HIDE]">
    <input type="hidden" id="data-order-id" value="[@ORDER_ID]" />
    <input type="hidden" id="data-order-item-id" value="[@order_item_id]" />
    <input type="hidden" id="data-product-id" value="[@PRODUCT_ID]" />
    <input type="hidden" id="date-order-type" value="order_edit" />
    <input type="hidden" id="data-material-idx" value="[@MATERIAL_IDX]" />
    <input type="hidden" id="data-order-status" value="[@ORDER_STATUS]" />

    <div class="float_right"  >
        <div class="right_ct_pro_lates" [@DSP_HIDDEN] >
        <br>
        <div class="main_lates clear" >
            <div class="float_left">
                <img style="width:250px;" class="img_1" src="[@PRODUCT_IMAGE]"  />
            </div>
            <div class="left_lates float_left">
                <p class="title_lates">[@PRODUCT_INFO_TITLE]</p>
                <div class="clear indent_lates">
                    <p class="up float_left">Print Image:</p>
                    <p class="up_lates">This product uses a standard image already provided.</p>
                </div>
                <div class="clear indent_lates2">
                    <p class="up float_left">Description :</p>
                    <p class="up_lates2 clear"></p>
                    <p>
                        [@DESCRIPTION]
                    </p>
                    <br>
                </div>

            </div>
        </div>
    </div>
    <div class="order">
        <div class="indents">
            <div class="indent">
                <div class="box_2 tabs_item">
                    <div class="infor float_left">
                        <a href="#" title="IMAGES" class="tab ">IMAGES</a>
                    </div>
                    <div class="infor float_left">
                        <a href="#" title="SIZE" class="tab active">SIZE</a>
                    </div>
                    <div class="infor float_left">
                        <a href="#" title="MATERIALS" class="tab ">MATERIALS</a>
                    </div>
                    <div class="infor float_left">
                        <a href="#" title="TEXT" class="tab  ">TEXT</a>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="tab-image content_table_item reate text_3"  style="display: none" id="IMAGES">
                    <div class="clear">
                        <textarea id="image_text" name="image_text" rows="4" cols="130" style="padding: 10px; width: 98%;">
                            - Printing file: Anvy has printing file for this product. If you want to print with new printing file, please upload to ftp and paste the path here.-  Note for this product:
                        </textarea>
                    </div>
                </div>
                <div class="reate text_3 tab-size content_table_item"id="SIZE" >
                    <div class="clear">
                        <p class="float_left text2 bold">
                            Please select size for item only :
                        </p>
                        <p class="float_left">
                            <select id="txt_product_size" clas="box_icon2" >
                                [@OPTION_SIZE]
                            </select>

                        </p>
                    </div>
                    <p class="clear"></p>
                </div>
                <div id="MATERIALS"  style="display: none" class="content_table_item tab-material">
                    <div class="reate text_3">
                        <div class="float_left">
                            <div class="clear"><p class="float_left text2 bold">
                                    Please select a Meterial for this item
                                </p>
                                <p class="float_left">

                                    <select class="box_icon2 text_color" id="txt_product_material">
                                        [@OPTION_MATERIAL]
                                    </select>
                                </p>
                            </div>
                            <div class="clear">
                                <p class="float_left text2 bold">
                                    Please select a Meterial thickness for this item</p>
                                <p class="float_left">

                                    <select class="box_icon2 text_color" name="txt_material_thickness" id="txt_material_thickness" >
                                        [@OPTION_THICKNESS]
                                    </select>

                                </p>
                            </div>
                            <div class="clear">
                                <p class="float_left text2 bold">
                                    Please select a Meterial color for this item
                                </p>
                                <p class="float_left">
                                    <select class="box_icon2 text_color" id="txt_material_color" >
                                        [@OPTION_COLOR]
                                    </select>
                                </p>
                            </div>
                        </div>
                        <p class="clear"></p>
                    </div>
                </div>
                <div class="tab-image content_table_item reate text_3"  style="display: none" id="TEXT">
                    <div class="clear" style="text-align: center">
                        [@OPTION_TEXT]
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="table2">
    <div class="td_1">
        <div class="table_qua float_left">
            Quatity
        </div><div class="table_choo float_left">
            Choose order
        </div><div class="table_unit float_left">
            Unit price
        </div><div class="table_topri float_left">
            Total price
        </div>
    </div>
    [@TABLE_ITEM_ROW]
</div>
<div class="line" style="[@STYLE]">
    <input id="btn_add_cart" class="btn_create" type="button" value="[@BTN_NAME_DISPLAY]" id="btn_save_order" >
</div>
</div>