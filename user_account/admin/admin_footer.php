<?php if(!isset($v_sval)) die();?>
<div id="div_footer" class="k-widget">
    <?php $v_time_end = microtime(true);  ?>
    <br /> WorkTraq-Admin Panel version 1.0  <br />
    <?php echo "Php execution time in :" . ($v_time_end -  $v_time_start) .' microseconds '; ?>
</div>
</div>
<div id="div_theme" style="display: none">
    <?php include "admin_theme.php";?>
</div>
<script type="text/javascript">
    var window_theme;
$(document).ready(function(e) {
    var left_pane_width = $.cookie("_ck_anvy_left_pane_width");
    if(!left_pane_width) left_pane_width = "220px";
    var test_pane = left_pane_width.replace('px','');
    test_pane = parseInt(test_pane, 10);
    if(isNaN(test_pane) || test_pane<=0){
        test_pane = 0;
        $('ul.icons li:first-child').css('display', '');
    }
	var site_splitter = $("#div_splitter_content").kendoSplitter({
		panes: [
			{ collapsible: true, size: "220px" },
			{ collapsible: false}
		],
        resize: on_resize_splitter,
        collapse: on_collapse_splitter,
        expand: on_expand_splitter

	}).data("kendoSplitter");
    if(site_splitter){
        var pane = $("#div_splitter_content").children()[0];
        var action = $.cookie("_ck_anvy_left_pane_action");
        if(!action) action = 'resize';

        if(test_pane>0 && test_pane!=220){
            site_splitter.size(pane, test_pane);
        }else{
            if(action=='collapse')
                site_splitter.toggle(pane, false);
            else if(action=='expand')
                site_splitter.toggle(pane, true);
            else if(action=='resize'){
                if(test_pane<=0) test_pane = 220;
                site_splitter.size(pane, test_pane);
            }
        }
        $.cookie("_ck_anvy_left_pane_action", action, {path:'/', expires: 0 });
    }
    function on_collapse_splitter(e){
        action = 'collapse';
        $.cookie("_ck_anvy_left_pane_action", action, {path:'/', expires: 7 });
        $('ul.icons li:first-child').css('display','');
    }
    function on_expand_splitter(e){
        action = 'expand';
        $.cookie("_ck_anvy_left_pane_action", action, {path:'/', expires: 7 });
        $('ul.icons li:first-child').css('display','none');
    }
    function on_resize_splitter(e){
        var pane_width = $("#div_left_pane").css("width");
        $.cookie("_ck_anvy_left_pane_width", pane_width, {path:'/', expires: 7 });
        pane_width = pane_width.replace('px','');
        pane_width = parseInt(pane_width, 10);
        if(isNaN(pane_width) || pane_width<=0){
            $('ul.icons li:first-child').css('display','');
        }else{
            $('ul.icons li:first-child').css('display','none');
        }
    }
    $('ul.icons li:first-child').click(function(e){
        site_splitter.toggle(pane, $(pane).width()<=0);
    });
    window_theme = $("div#div_theme");
    $("img#icons_theme").bind("click", function(){
        if (!window_theme.data("kendoWindow")) {
            window_theme.kendoWindow({
                width: "600px",
                height: "400px",
                actions: ["Close"],
                modal: true,
                title: "Choose Theme"
            });
        }
        window_theme.data("kendoWindow").center().open();

    });

});
</script>
</body>
</html>