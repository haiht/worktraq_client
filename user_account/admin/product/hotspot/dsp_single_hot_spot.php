<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
$(document).ready(function(){
    $("a[rel=map_product_images]").fancybox({
        'showNavArrows'         : false,
        'width'                 : '65%',
        'height'                : '85%',
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe'
    });
    $('span#sp_map_content').css('display','');
    //$('div#pic_container').append('<?php //echo $v_dsp_canvas;?>');
});
</script>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>
<script type="text/javascript" src="lib/js/reload_image.js"></script>
<script type="text/javascript">
    MM_preloadImages(<?php echo $v_list_images;?>);
</script>

<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/product'; ?>">  Product  </a> &gt; &gt; Create / Edit Hot Spot</p>
<p class="highlightNavTitle"><span> Create/Edit Hot Spot  </span></p>
<p class="break"></p>

    <table align="center" width="100%" border="1" class="list_table" cellpadding="3" cellspacing="0">
        <tr align="center" valign="top">
            <td width="300">
                <fieldset>
                    <div id="form_container" style="clear: both;">
                        <!-- form elements comehere -->
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Extra Information</legend>
                    <div id="location_area" style="text-align: left">
                        <input type="hidden" id="txt_company_id" name="txt_company_id" value="<?php echo $v_hot_spot_company_id;?>" />
                        <input type="hidden" id="txt_location_id" name="txt_location_id" value="<?php echo $v_hot_spot_location_id;?>" />
                        <p id="list_location_area" style="margin: 5px; line-height: 150%">
                        <?php echo $v_list_check_location_area;?>
                        </p>
                        <label for="txt_extra_location_area">New Location Area: <input type="text" name="txt_extra_location_area" id="txt_extra_location_area" value="" size="20" /></label>
                    </div>

                </fieldset>

                <?php //echo $v_dsp_list_product;?>&nbsp;
            </td>
            <td width="1%">&nbsp;</td>
            <td align="left">
                <div id="pic_container">
                    <?php //echo $v_dsp_main_product;?>
                </div>
                <div id="pic_result">
                </div>
                <input type="hidden" id="dd_zoom" value="1" />
                <fieldset>
                    <legend>
                        <a onClick="toggleFieldset(this.parentNode.parentNode)">Status</a>
                    </legend>
                    <div id="status_container"></div>
                </fieldset>

                <fieldset id="fieldset_html" class="fieldset_off">
                    <legend>
                        <a onClick="toggleFieldset(this.parentNode.parentNode)">Code</a>
                    </legend>
                    <div>
                        <div id="output_help">
                        </div>
                        <textarea id="html_container" style="display:none"></textarea></div>
                </fieldset>


                &nbsp;</td>
        </tr>
        <tr align="center" valign="middle">
            <td colspan="3"><input type="button" id="btn_submit_hot_spot" name="btn_submit_hot_spot" value="Submit" class="button" onclick="check_hot_spot(this)" />
            <br />
                <span id="sp_map_content" style="display:none;"><a rel="map_product_images" href="<?php echo URL.$v_admin_key.'/'.$v_product_images_id.'/view';?>" /> View Demo</a</span>
            </td>
        </tr>
    </table>
<script type="text/javascript" src="lib/imgmap/imgmap_bak.js"></script>
<script type="text/javascript" src="lib/imgmap/default_interface_hot_spot.js"></script>
<script type="text/javascript">
<?php
echo $v_dsp_script."\n";
?>
    /** INIT SECTION **************************************************************/
    var myimgmap;
    //instantiate the imgmap component, setting up some basic config values
    myimgmap = new imgmap({
        mode : "editor",
        custom_callbacks : {
            'onStatusMessage' : function(str) {gui_statusMessage(str);},//to display status messages on gui
            'onHtmlChanged'   : function(str) {gui_htmlChanged(str);},//to display updated html on gui
            'onModeChanged'   : function(mode) {gui_modeChanged(mode);},//to switch normal and preview modes on gui
            'onAddArea'       : function(id)  {gui_addArea_bak(id);},//to add new form element on gui
            'onRemoveArea'    : function(id)  {gui_removeArea(id);},//to remove form elements from gui
            'onAreaChanged'   : function(obj) {gui_areaChanged(obj);},
            'onSelectArea'    : function(obj) {gui_selectArea(obj);}//to select form element when an area is clicked
        },
        pic_container: document.getElementById('pic_container'),
        bounding_box : false,
        label: '%h',
        maxArea: <?php echo $v_max_hot_spot;?>,
        areaText: [<?php echo $v_dsp_list_link;?>]
    });
    //gui_outputChanged();
    myimgmap.addEvent(document.getElementById('html_container'), 'blur',  gui_htmlBlur);
    myimgmap.addEvent(document.getElementById('html_container'), 'focus', gui_htmlFocus);

    gui_loadImage('<?php echo URL. $v_main_product_url;?>');
    <?php //for($i=0; $i<$v_max_hot_spot; $i++){?>
    for(var i = 0; i< <?php echo $v_max_hot_spot;?>; i++){
        //alert('x:');
        myimgmap.addNewArea(product[i]);
    }
    <?php //}?>
//var html = myimgmap.pic_container.innerHTML;
//myimgmap.pic_container.append('<?php //echo $v_dsp_canvas;?>');
//myimgmap._repaintAll();
//alert(myimgmap.areas[0].ahref);
function check_hot_spot(obj){
    //alert(myimgmap.maxArea);
    var count = 0;
    var id = obj.id;
    var $this = $('input#'+id);
    for(var i=0; i<myimgmap.areas.length; i++){
        //alert(myimgmap.areas[i].ahref);
        if(myimgmap.areas[i].ahref!='undefined'){
            //myimgmap._updatecoords(i);
            if(myimgmap.areas[i].lastInput!='undefined' && myimgmap.areas[i].shape!='undefined'){
                product[i].map_coords = myimgmap.areas[i].lastInput;
                product[i].map_shape = myimgmap.areas[i].shape;
                count++;
            }
        }
    }
    if(count==0){
        alert('Please create any hot spot!');
        return;
    }
    var extra_location_area = $('input#txt_extra_location_area').val();
    extra_location_area = $.trim(extra_location_area);
    var location_area = '';
    $('input#txt_location_area[type="checkbox"]').each(function(){
        if($(this).attr('checked')) location_area += $(this).val()+',';
    });
    //if(location_area!='') location_area = location_area.substr(0, location_area.length-1);
    $.ajax({
        url     : '<?php echo URL.$v_admin_key.'/'.$v_product_images_id;?>/update',
        type    :   'POST',
        async: false,
        cache: false,
        timeout: 30000,
        data    :   {txt_map_content: YAHOO.lang.JSON.stringify(product), txt_location_area: location_area,txt_extra_location_area:extra_location_area},
        beforeSend:function(){
            $this.attr('disabled',true);
        },
        success: function(data, type){
            var ret = $.parseJSON(data);
            var err = ret.error;
            var message = ret.message;
            if(err==0){
                $('span#sp_map_content').css('display', '');
                $('p#list_location_area').html(ret.extra_data);
                $('input#txt_extra_location_area').val('');
            }else{
                $('span#sp_map_content').css('display', 'none');
            }
            alert(message);
            $this.attr('disabled', false);
        }
    });
}

</script>
