<?php if(!isset($v_sval)) die();?>
<style type="text/css">
    .div_list_thumb{
        overflow:auto;
    }
    .div_list_thumb .div_image{
        float:left;
        width:210px;
        text-align:left;
    }
    .div_list_thumb .div_image img.thumb{
        max-height:200px;
        margin:5px;
        width:200px;
        vertical-align:top;
        border-radius:5px;
        border:#39C 1px outset;
    }
    .div_list_thumb .div_image img.icon{
        border:none;
        cursor:pointer;
        margin:2px;
        vertical-align:top;
    }
</style>

<p class="navTitle"><a href="<?php echo URL .'admin'; ?>"> Account  </a> &gt; &gt;  Insert - Update Signage Layout </p>
<p class="highlightNavTitle"><span> Insert - Update Signage Layout </span></p>
<p class="break"></p>
<fieldset>
	<legend>Select Company and Location</legend>
    <form id="frm_tb_area" action="<?php echo isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:''; ?>" method="post">
    Company: <select id="txt_company_id" name="txt_company_id">
        	<option value="0" selected="selected">-------</option>
            <?php echo $v_dsp_company_draw;?>
        </select>
    Location: <select id="txt_location_id" name="txt_location_id">
        	<option value="0" selected="selected">--------</option>
            <?php echo $v_dsp_location_draw;?>
        </select>
	</form>        
</fieldset>
<p class="break"></p>
<?php
echo $v_dsp_tb_location_area;
echo $v_dsp_paginition;
?>
<div style="display:none">
<img src="images/icons/accept.png" /><img src="images/icons/delete.png" /><img src="images/icons/cancel.png" /><img src="images/icons/map_edit.png" /><img src="images/icons/loading.gif" />
</div>
<script src="<?php echo URL;?>lib/ajaxupload/addimages.js" type="text/javascript"></script>
<script type="text/javascript">
var icons = {'active':'images/icons/accept.png', 'inactive':'images/icons/delete.png', 'delete':'images/icons/cancel.png', 'map':'images/icons/map_edit.png', 'loading':'images/icons/loading.gif'};
$(document).ready(function(e) {
	$('.confirm').live('click', function(){
		return confirm('Are you sure you want to delete this info?');
	});
	$('select#txt_company_id').change(function(e) {
		var $this = $(this);
        var company_id = $(this).val();
		company_id = parseInt(company_id, 10);
		if(isNaN(company_id) || company_id<0) company_id = 0;
        $('form#frm_tb_area').submit();

    });
	$('select#txt_location_id').change(function(e) {
        var company_id = $('select#txt_company_id').val();
		var location_id = $('select#txt_location_id').val();
		company_id = parseInt(company_id, 10);
		location_id = parseInt(location_id, 10);
		if(isNaN(company_id)) company_id=0;
		if(isNaN(location_id)) location_id=0;
		
		/*if(company_id>0)*/
		$('form#frm_tb_area').submit();

    });
    $("a[rel=open_popup_upload]").each(function(){
        var area = $(this).attr("data-area");
        $(this).fancybox({
            'showNavArrows'         : false,
            'width'                 : '65%',
            'height'                : '85%',
            'transitionIn'	        :	'elastic',
            'transitionOut'	        :	'elastic',
            'overlayShow'	        :	true,
            'type'                 : 'iframe',
            onClosed:function(){
                for(var i=0; i<list_image.length; i++){
                    if(list_image[i].status==0){
                        //alert(list_image[i].active);
                        addImageSignageLayout(list_image[i].url,list_image[i].id, list_image[i].name, icons, '<?php echo URL;?>', 'div_list_thumb_'+area, list_image[i].active);
                    }
                }
            }
        });
    })

});
function Image(url, name, id, active){
    var idx = id;
    idx = parseInt(idx, 10);
    if(isNaN(idx)) idx = 0;
    this.url = url;
    this.id = id;
    this.name = name;
    this.status = 0;
    active = parseInt(active, 10);
    if(active!=0) active = 1;
    this.active = active;
}
Image.prototype.remove = function(){
    this.status = 1;
}
Image.prototype.activated = function(active){
    this.active = active;
}

var list_image = new Array();
</script>
<script type="text/javascript">
    function change_status(obj, id, name, value, flag){
        var thisid = obj.id;
        var $this = $('img#'+thisid);
        var src = $this.attr('src');
        var message = flag=='delete'?'Do you want to delete image: "'+name+'"':'Do you want to change status for image: "'+name+'"?';
        if(confirm(message)){
            $.ajax({
                url	: '<?php echo $v_change_url;?>',
                type	:	'POST',
                async: false,
                cache: false,
                timeout: 10000,
                data	:	{txt_session_id:'<?php echo session_id();?>', txt_product_image: id, txt_status: value, txt_flag: flag},
                beforeSend: function(){
                    $this.attr('disabled', true);
                    $this.attr('src', icons.loading);
                },
                success: function(data, type){
                    var ret = $.parseJSON(data);
                    if(ret.error==0){
                        $this.css('display','none');
                        if(flag=='active'){
                            if(value==1){
                                $this.parent().find('img#img_disable_'+id).css('display','');
                                $this.parent().find('img#img_disable_'+id).attr('title','Go Active');

                            }else{
                                $this.parent().find('img#img_enable_'+id).css('display','');
                                $this.parent().find('img#img_enable_'+id).attr('title','Go Inactive');
                            }
                        }else if(flag=='type'){
                            if(value==0){
                                $this.parent().find('img#img_sample_'+id).css('display','');
                                $this.parent().find('img#img_sample_'+id).attr('title','Go product image');
                            }else{
                                $this.parent().find('img#img_product_'+id).css('display','');
                                $this.parent().find('img#img_product_'+id).attr('title','Go sample image');
                            }
                        }
                    }else{
                        alert(ret.message);
                    }
                    $this.attr('disabled', false);
                    $this.attr('src', src);
                }
            });
        }
    }
    function delete_image(obj, id, name){
        var thisid = obj.id;
        var $this = $('img#'+thisid);
        var src = $this.attr('src');
        if(confirm('Do you want to delete image: "'+name+'"?')){
            $.ajax({
                url	: '<?php echo $v_change_url;?>',
                type	:	'POST',
                async: false,
                cache: false,
                timeout: 10000,
                data	:	{txt_session_id:'<?php echo session_id();?>', txt_product_image: id, txt_flag:'delete'},
                beforeSend: function(){
                    $this.attr('disabled', true);
                    $this.attr('src', icons.loading);
                },
                success: function(data, type){
                    //alert(data);
                    var ret = $.parseJSON(data);
                    if(ret.error==0){
                        $this.parent().remove();
                    }else{
                        alert(ret.message);
                        $this.attr('disabled', false);
                        $this.attr('src', src);
                    }
                }
            });
        }
    }

</script>
