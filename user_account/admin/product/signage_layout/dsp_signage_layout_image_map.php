<?php if(!isset($v_sval)) die();?>
<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
$(document).ready(function(){
    $("a[rel=map_product_images]").fancybox({
        'showNavArrows'         : false,
        'width'                 : 820,
        'height'                : 600,
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe'
    });
    //$('span#sp_map_content').css('display','');
    $("a[rel=choose_product]").fancybox({
        'showNavArrows'         : false,
        'width'                 : '700',
        'height'                : '600',
        'transitionIn'	        :	'elastic',
        'transitionOut'	        :	'elastic',
        'overlayShow'	        :	true,
        'type'                 : 'iframe',
        'hideOnOverlayClick'	: false,
        onClosed	:	function(){
            var i=0;
            myimgmap.config.areaText = [];
            for(var j=0; j<product.length;j++){
                if(product[j].status == 0){
                    i++;
                }
            }
            if(i>0){
                $('img#delete_area_icon').css('display','');
            }
            delete_cookie('ck_product_location');
        }
    });
});
</script>
<script type="text/javascript" src="lib/js/yahoo-min.js"></script>
<script type="text/javascript" src="lib/js/json-min.js"></script>
<script type="text/javascript" src="lib/js/reload_image.js"></script>
<script type="text/javascript">
    MM_preloadImages(<?php echo $v_list_images;?>);
</script>

<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt&gt<a href="<?php echo URL .'admin/product'; ?>">  Product  </a> &gt; &gt; <a href="<?php echo URL.$v_admin_key;?>">Signage Layout</a> &gt; &gt; Create / Edit Hot Spot</p>
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
            <p style="text-align: left"><a rel="choose_product" href="<?php echo URL.$v_admin_key.'/'.$v_product_images_id.'/product';?>" title="Add more product">
            <img src="images/icons/add.png" border="0" title="Add more product" /></a> &nbsp; <img id="delete_area_icon" style="cursor: pointer;<?php echo $v_max_hot_spot>0?'':'display:none;';?>" src="images/icons/delete.png" title="Remove hot-spot" onclick="update_area(this)" />
            </p>
        </td>
        <td width="1%">&nbsp;</td>
        <td align="left">
            <fieldset>
                <legend>
                    <a onClick="toggleFieldset(this.parentNode.parentNode)">Status</a>
                </legend>
                <div id="status_container"></div>
            </fieldset>
            <div id="pic_container">
                <?php //echo $v_dsp_main_product;?>
            </div>
            <div id="pic_result">
            </div>
            <input type="hidden" id="dd_zoom" value="1" />

            <fieldset id="fieldset_html" class="fieldset_off" style="display: none;">
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
        <td colspan="3"><input type="button" id="btn_submit_hot_spot" name="btn_submit_hot_spot" value="  Save " class="button" onclick="check_hot_spot(this)" />
            <br />
            <span id="sp_map_content"<?php echo $v_hot_spot==0?' style="display:none;"':'';?>>[ <a title="View created hot-spot" rel="map_product_images" href="<?php echo URL.$v_admin_key.'/'.$v_product_images_id.'/mview';?>" /> VIEW DEMO</a> ]</span>
        </td>
    </tr>
</table>
<script type="text/javascript" src="<?php echo URL;?>lib/imgmap/imgmap_bak.js"></script>
<script type="text/javascript" src="<?php echo URL;?>lib/imgmap/default_interface_hot_spot.js"></script>
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
        label: '%a',
        maxArea: <?php echo $v_max_hot_spot;?>,
        areaText: [<?php echo $v_dsp_list_link;?>],
        areaAlt: [<?php echo $v_dsp_list_alt;?>]
    });
    myimgmap.addEvent(document.getElementById('html_container'), 'blur',  gui_htmlBlur);
    myimgmap.addEvent(document.getElementById('html_container'), 'focus', gui_htmlFocus);

    gui_loadImage('<?php echo URL. $v_main_product_url;?>');
    <?php //for($i=0; $i<$v_max_hot_spot; $i++){?>
    for(var i = 0; i< <?php echo $v_max_hot_spot;?>; i++){
        //alert('x:');
        myimgmap.addNewArea(product[i]);
    }
    <?php //}?>
    function check_hot_spot(obj){
        var count = 0;
        var p = -1;
        var id = obj.id;
        var $this = $('input#'+id);
        var tmp = new Array();

        $('div#form_container div.img_area').each(function(index, element){
            var product_id = $(this).find('input.img_id').attr('data-id');
            product_id = parseInt(product_id, 10);
            if(isNaN(product_id)) product_id = 0;
            var product_name = $(this).find('input.img_alt').val();
            var product_url = $(this).find('input.img_href').val();
            var product_image = $(this).find('img').attr('src');
            var map_shape = $(this).find('select.img_shape').val();
            var map_coords = $(this).find('input.img_coords').val();
            var map_key = get_unique_key(3);
            tmp[count++] = new Map(product_id, product_name, product_image, product_url, map_shape, map_coords, map_key);
        });
        if(count==0){
            //alert('Please create any hot spot!');
            //return;
        }
        $.ajax({
            url     : '<?php echo URL.$v_admin_key.'/'.$v_product_images_id;?>/cmap',
            type    :   'POST',
            async: false,
            cache: false,
            timeout: 30000,
            data    :   {txt_map_content: YAHOO.lang.JSON.stringify(tmp)},
            beforeSend:function(){
                $this.attr('disabled',true);
            },
            success: function(data, type){
                var ret = $.parseJSON(data);
                var err = ret.error;
                var message = ret.message;
                if(err==0){
                    $('span#sp_map_content').css('display', '');
                }else{
                    $('span#sp_map_content').css('display', 'none');
                }
                alert(message);
                $this.attr('disabled', false);
            }
        });
    }
    function update_area(){
        //alert('Currrent: '+myimgmap.currentid);
        var idx = myimgmap.currentid;
        idx = parseInt(idx, 10);
        var f = false;
        var i = -1;
        while(i<product.length && !f){
            i++;
            if(product[i].map_area == idx && product[i].status==0) f = true;
        }
        if(f){
            product[i].remove();
            myimgmap.removeArea(myimgmap.currentid);

            var c = 0;
            for(var i=0; i<product.length; i++){
                if(product[i].status == 0){
                    c++;
                }
            }
            if(c==0) $('img#delete_area_icon').css('display', 'none');
        }
    }
    function get_unique_key(len){
        var key = 'ABCDEFGHIJKLMNOPQRSTUVXYZW';
        var i = 0;
        var list = list_key;
        var ret = '';
        var p = 0;
        while(i<len){
            p = Math.floor(Math.random()*key.length);
            ret += key.charAt(p);
            i++;
            if(i==len){
                if(list.indexOf(ret)>=0){
                    i = 0;
                    ret = '';
                }
            }
        }
        list_key += ret+',';
        return ret;
    }
</script>