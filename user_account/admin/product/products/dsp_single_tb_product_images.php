<?php
if(!isset($v_sval)) die();
?>
<style type="text/css">
#div_upload_area{
    float: left;
    width: 450px;
    height: auto;
    border-right: dotted 1px #002c5f;
}
#div_list_thumb{
    min-height:200px;
    overflow: auto;
    margin-left: 452px ;
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
.ui-widget-content{
    font-size: 12px !important;
    font-weight:normal !important;
}
</style>
<link href="<?php echo URL;?>lib/fileuploader/css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo URL;?>lib/css/jquery_ui/ui-lightness/jquery.ui.all.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo URL;?>lib/fileuploader/css/fileUploader.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo URL;?>lib/js/jquery-ui-1.8.14.custom.min.js"></script>
<script src="<?php echo URL;?>lib/fileuploader/js/jquery.fileUploader.js" type="text/javascript"></script>
<script src="<?php echo URL;?>lib/fileuploader/js/addimages.js" type="text/javascript"></script>
<script type="text/javascript">
var  icons =  {'active':'images/icons/add.png', 'inactive':'images/icons/delete.png', 'product':'images/icons/package_add.png', 'sample': 'images/icons/package_delete.png', 'delete':'images/icons/cancel.png', 'map':'images/icons/map_edit.png', 'savecode':'images/icons/save.png'};

$(document).ready(function(e) {
    $('.fileUpload').fileUploader({
        autoUpload: false,
        limit: false,
        buttonUpload: '#px-submit',
        buttonClear: '#px-clear',
        selectFileLabel: 'Select files',
        allowedExtension: 'jpg|jpeg|gif|png',
        timeInterval: [1, 2, 4, 2, 1, 5], //Mock percentage for iframe upload
        percentageInterval: [10, 20, 30, 40, 60, 80],

        //Callbacks
        onValidationError: function(e) {

        },
        onFileChange: function(e, form) {

        },
        onFileRemove: function(e) {

        },
        beforeUpload: function(e) {
            //alert(this.filename);
        },
        beforeEachUpload: function(form) {

        },
        afterEachUpload: function(data, status, formContainer) {
            var ret = $.parseJSON(data);
            addImage(ret.thumb,ret.receive, ret.name, icons, '<?php echo URL;?>');
        },
        afterUpload: function(formContainer) {

        }
    });

});
</script>

<div id="div_upload_area">
    <div id="upload_area">
        <form action="<?php echo $v_upload_url;?>/" method="post" enctype="multipart/form-data">
            <input type="file" name="txt_file_name" class="fileUpload" multiple>

            <button id="px-submit" type="submit">Upload</button>
            <button id="px-clear" type="reset">Clear</button>
        </form>

    </div>
</div>
<div id="div_list_thumb">
    <?php echo $v_dsp_list_images;?>
</div>


<div style="display:none">
<img src="<?php echo URL;?>images/icons/add.png" />
<img src="<?php echo URL;?>images/icons/delete.png" />
<img src="<?php echo URL;?>images/icons/cancel.png" />
<img src="<?php echo URL;?>images/icons/package_add.png" />
<img src="<?php echo URL;?>images/icons/package_delete.png" />
<img src="<?php echo URL;?>images/icons/map_edit.png" />
<img src="<?php echo URL;?>images/icons/key_add.png" />

</div>
<script type="text/javascript">
function change_status(obj, id, name, value, flag){
	var thisid = obj.id;

	var $this = $('img#'+thisid);
    var message = flag=='delete'?'Do you want to delete image: "'+name+'"':'Do you want to change status for image: "'+name+'"?';
	if(confirm(message)){
		$.ajax({
			url	: '<?php echo $v_change_url;?>',
			type	:	'POST',
			data	:	{txt_session_id:'<?php echo session_id();?>', txt_product_image: id, txt_status: value, txt_flag: flag},
			beforeSend: function(){
				$this.attr('disabled', true);
			},
			success: function(data, type){
				var ret = $.parseJSON(data);
				if(ret.error==0){
					$this.css('display','none');
                    if(flag=='active'){
                        if(value==0){
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
			}
		});
	}
}
function save_code(obj, id, name, flag){
    var val = obj.value;
    var thisid = obj.id;
    var $this = $('input#thisid');
    $.ajax({
        url	: '<?php echo $v_change_url;?>',
        type	:	'POST',
        data	:	{txt_session_id:'<?php echo session_id();?>', txt_product_image: id, txt_code: val, txt_flag: flag},
        beforeSend: function(){
            $this.attr('disabled', true);
        },
        success: function(data, type){
            var ret = $.parseJSON(data);
            if(ret.error!=0){
                alert(ret.message);
            }
            $this.attr('disabled', false);
        }
    });
}
function delete_image(obj, id, name){
	var thisid = obj.id;
	var $this = $('img#'+thisid);
	if(confirm('Do you want to delete image: "'+name+'"?')){
		$.ajax({
			url	: '<?php echo $v_change_url;?>',
			type	:	'POST',
			data	:	{txt_session_id:'<?php echo session_id();?>', txt_product_image: id, txt_flag:'delete'},
			beforeSend: function(){
				$this.attr('disabled', true);
			},
			success: function(data, type){
				var ret = $.parseJSON(data);
				if(ret.error==0){
					$this.parent().remove();
				}else{
					alert(ret.message);
					$this.attr('disabled', false);
				}
			}
		});
	}
}

</script>