<?php
if(!isset($v_sval)) die();
?>
<script type="text/javascript" src="lib/js/reload_image.js"></script>
<div id="div_close">
    <input type="button" value="Get them" id="btn_get" class="button" />
</div>
<div id="div_title" style="text-align: left; font-size: 12px; font-weight: 500">
	<fieldset>
    <?php echo $v_row_title;?> 
    <form action="" method="post">
    ---- Choose product from more locations: <select id="txt_product_location" name="txt_product_location" onchange="this.form.submit()">
    <option value="0" selected="selected">------</option>
    <?php
	echo $v_dsp_location_draw;
	?>
    </select>
    </form>
    </fieldset>
</div>
<div id="div_pagination">
    <?php echo $v_dsp_pagination;?>
</div>

<div id="div_content">
    <?php echo $v_dsp_content;?>
</div>

<style type="text/css">
    #div_close{
        height:40px;
        text-align:right;
        padding-right:10px;
    }
    #div_pagination{
        height:50px;
        width:100%;
    }
</style>
<script type="text/javascript">

    var tmp = new Array();
    var j=0;
    for(var i=0; i<parent.product.length; i++){
        if(parent.product[i].status == 0){
            //tmp[j++] = new parent.Product(parent.product[i].product_id, parent.product[i].product_name, parent.product[i].product_image, parent.product[i].product_url, parent.product[i].map_shape, parent.product[i].map_coords, parent.product[i].map_key, 1);
            tmp[j++] = parent.product[i];
        }
    }

    MM_preloadImages(<?php echo $v_list_images;?>);
    $(document).ready(function(e) {
        $('input[type="checkbox"]').each(function(index, element) {
            var pid = $(this).attr('data-id');
            pid = parseInt(pid, 10);
            var found = false;


            for(var i=0; i<tmp.length; i++){
                //alert(tmp[i].product_id==pid + ' --- '+ parent.product[i].status);
                if(tmp[i].product_id==pid && tmp[i].status==0 ){
                    $(this).attr('checked', 'checked');
                    $(this).attr('disabled', 'disabled');
                }
            }
        });
        $('input#btn_get').click(function(e) {
            //alert(parent.arr_package.length);
            var count = 0;
            var total = 0;
            var is_check = false;
            parent.myimgmap.config.areaText = [];
            parent.myimgmap.config.areaAlt = [];
            $('input[type="checkbox"]').each(function(index, element) {
                if($(this).attr('checked') && !$(this).attr('disabled')){
                    var idx = parent.product.length;
                    var name = $(this).attr('data-name');
                    var id = $(this).attr('data-id');
                    var image = $(this).attr('data-image-name');
                    var image_url = $(this).attr('data-image-url');
                    var found = false;
                    var tmp;
                    var pos = 0;

                    //for(var i=0; i<parent.product.length && !found; i++){
                    //    if(parent.product[i].product_id==id && parent.product[i].status==0){
                    //        found = true;
                    //        pos = i;
                    //    }
                    //}
                    //alert(found);
                    //if(!found){
                        is_check = true;
                        parent.product[idx] = new parent.Product(id, name, image_url, 'catalogue/'+id+'/info', 'rect', '0,0,0,0',get_unique_key(3), 0);
                    //}
                    count++;
                }
            });
            if(count==0){
                alert('Please choose any item to continue. If you simple want to close, click sign \'Close\' at right-top corner!');
                return false;
            }else{
                for(var i=0; i<parent.product.length;i++){
                    parent.myimgmap.config.areaText.push(parent.product[i].product_url);
                    parent.myimgmap.config.areaAlt.push(parent.product[i].product_name);
                    if(parent.product[i].is_new==0){
                        parent.myimgmap.addNewArea(parent.product[i]);
                        parent.product[i].is_new = 1;
                    }
                }
            }
            if(is_check){
            }
            //alert(parent.arr_package.length);
            parent.$.fancybox.close();
        });
    });
function get_unique_key(len){
    var key = 'ABCDEFGHIJKLMNOPQRSTUVXYZW';
    var i = 0;
    var list = parent.list_key;
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
    parent.list_key += ret+',';
    return ret;
}
</script>