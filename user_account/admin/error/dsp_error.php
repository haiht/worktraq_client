<?php if(!isset($v_sval)) die();?>
<script type="text/javascript">
    var time = 20;
    var tm;
$(document).ready(function(){
    $('label#lbl_time').html(time);

    count_down();
});
function count_down(){
    time--;
    if(time<0){
        clearTimeout(tm);
        document.location = '<?php echo URL;?>';
    }else{
        $('label#lbl_time').html(time);
        tm = setTimeout("count_down()", 1000);
    }
}

</script>
<div class="pane-content k-block k-widget">
    <div class="k-block k-widget" style="margin-bottom: 20px; padding-left: 20px"><h3>ERROR</h3></div>
    <div id="leftNav" class="k-block k-widget" style="min-height: 500px; width: 600px; text-align: left; margin: auto">
        <div class="k-header k-shadow" style="text-align: center">Information</div>
        <h3>This URL could not be found of you do not have permission to view </h3>
        <p style="text-align: left">The browser will be redirect to home page in <label id="lbl_time"></label> second(s) </p>
        <p style="text-align: left">If the browser will not redirect, click <a class="a-link" href="<?php echo URL;?>">here</a>! </p>
    </div>
</div>