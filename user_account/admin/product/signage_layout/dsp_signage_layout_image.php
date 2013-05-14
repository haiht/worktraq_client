<?php
if(!isset($v_sval)) die();
?>
<style type="text/css">
    #div_upload_area{
        float: left;
        width: 400px;
        height: auto;
        border-right: dotted 1px #002c5f;
    }
    #div_list_thumb{
        min-height:200px;
        overflow: auto;
        margin-left: 402px ;
    }
    #div_list_thumb .div_image{
        float:left;
        width:210px;
        text-align:left;
    }
    #div_list_thumb .div_image img.thumb{
        max-height:200px;
        margin:5px;
        width:200px;
        vertical-align:top;
        border-radius:5px;
        border:#39C 1px outset;
    }
    #div_list_thumb .div_image img.icon{
        border:none;
        cursor:pointer;
        margin:2px;
        vertical-align:top;
    }
</style>
<?php if($v_allow==1){?>
<link href="<?php echo URL;?>lib/ajaxupload/css/listTheme/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo URL;?>lib/ajaxupload/ajaxupload.js" type="text/javascript"></script>
<script src="<?php echo URL;?>lib/ajaxupload/addimages.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#upload_area').ajaxupload({
            url:'<?php echo $v_upload_url;?>/',
            remotePath:'<?php echo $v_upload_dir;?>',
            allowExt:['jpg','png'],
            maxConnections: 1,
            editFilename: true,
            maxFileSize:	'5M',
            icons:  {'active':'images/icons/add.png', 'inactive':'images/icons/delete.png', 'product':'images/icons/package_add.png', 'sample': 'images/icons/package_delete.png', 'delete':'images/icons/cancel.png', 'map':'images/icons/map_edit.png'},
            size_thumb: '<?php echo PRODUCT_IMAGE_THUMB;?>',
            data:	{'txt_session_id':'<?php echo session_id();?>', 'txt_company_id':'<?php echo $v_company_id;?>', 'txt_location_id':'<?php echo $v_location_id;?>'},
            finish: function(files){

            },
            error: function(){
                //alert('X');
            },
            success:function(fileName, received){
                var src = this.remotePath+this.size_thumb+'_'+fileName;
                addImageSignageLayout(src,received, fileName, this.icons, '<?php echo URL;?>', 'div_list_thumb', 0);
                var len = parent.list_image.length;
                parent.list_image[len] = new parent.Image(src, fileName, received, 0);
            }


        });
    });
</script>
<?php
}
?>
<div id="div_upload_area">
<?php if($v_allow==1){?>
    <div id="upload_area">

    </div>
<?php
}else{
    echo '<h2>Error! Cannot get Area ID!</h2>';
}
?>
</div>
<div id="div_list_thumb">

</div>

<div style="display:none">
    <img src="<?php echo URL;?>images/icons/accept.png" />
    <img src="<?php echo URL;?>images/icons/delete.png" />
    <img src="<?php echo URL;?>images/icons/cancel.png" />
    <img src="<?php echo URL;?>images/icons/package_add.png" />
    <img src="<?php echo URL;?>images/icons/package_delete.png" />
    <img src="<?php echo URL;?>images/icons/map_edit.png" />
    <img src="<?php echo URL;?>images/icons/loading.gif" />
</div>

<script type="text/javascript">
    var loading = 'images/icons/loading.gif';
    parent.list_image = null;
    parent.list_image = new Array();
    function change_status(obj, id, name, value, flag){
        var thisid = obj.id;
        var idx = id;
        idx = parseInt(idx, 10);

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
                    $this.attr('src', loading);
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
                            for(var i=0; i<parent.list_image.length; i++){
                                if(idx == parent.list_image[i].id && parent.list_image[i].status==0){
                                    parent.list_image[i].activated(value);
                                    i = parent.list_image.length;
                                }
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
        var loading = 'images/icons/loading.gif';
        var thisid = obj.id;
        var idx = id;
        idx = parseInt(idx, 10);
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
                    $this.attr('src', loading);
                },
                success: function(data, type){
                    var ret = $.parseJSON(data);
                    if(ret.error==0){
                        $this.parent().remove();
                        for(var i=0; i<parent.list_image.length; i++){
                            if(idx == parent.list_image[i].id && parent.list_image[i].status==0){
                                parent.list_image[i].remove();
                                i = parent.list_image.length;
                            }
                        }

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