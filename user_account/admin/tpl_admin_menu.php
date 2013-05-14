<?php
if(!isset($v_sval)) die();
	$v_url = URL.'admin/';
	$v_module_pid = 0;
	$arr_fields = array('module_id', 'module_pid', 'module_text', 'module_key', 'module_root', 'module_dir','module_menu','module_locked');

	$arr_where = array('module_pid'=>$v_module_pid);
	$arr_order = array('_id'=>1);
	$cls_menu_module = new cls_tb_module($db, LOG_DIR);
	$cls_smenu_module = new cls_tb_module($db, LOG_DIR);

    $arr = $cls_menu_module->select_limit_fields(0, 100, $arr_fields,$arr_where,$arr_order);

	$v_dsp_menu_all='';

    foreach($arr as $k=>$a){
       $v_menu_module_id = $a['module_id'];
       $v_menu_module_text = $a['module_text'];;
       $v_menu_module_key = $a['module_key'];;
       $v_menu_module_key = $a['module_locked'];

        $v_dsp_menu_one = '';
        $arr_order = array('module_order'=>-1);
		$arr_sub = NULL;
        $arr_where = array('module_pid'=>$v_menu_module_id);

        $arr_sub = $cls_smenu_module->select_limit_fields(0, 100, $arr_fields, $arr_where, $arr_order);
        foreach($arr_sub as $ks=>$as){
            $v_subm_module_text = $as['module_text'];
            $v_subm_module_key = $as['module_key'];
            $v_subm_module_menu = $as['module_menu'];
            $v_subm_module_look = $as['module_locked'];

            if($v_subm_module_look==0)
                $v_dsp_menu_one .= '<li class="subcat"><a href="'.$v_url.$v_subm_module_key.'">'.$v_subm_module_text.'</a></li>';
        }
        if($v_dsp_menu_one!=''){
            $v_dsp_menu_one = '<li class="cat">
                                    <a href="#">'.$v_menu_module_text.'</a>
                                        <ul class="subnav" style="display: none;">'.$v_dsp_menu_one.'</ul>
                                </li>';
            $v_dsp_menu_all.=$v_dsp_menu_one;
        }
    }
?>
<div id="header">
    <div id="menu_contain">
        <ul class="menu_inside">
            <?php echo $v_dsp_menu_all; ?>
            <li class="cat">
                <a href="<?php echo URL.'logout.html'?>" class="">Logout</a>
            </li>

        </ul>
    </div>
</div>
<p class="break"></p>
<script type="text/javascript">
	$(document).ready(function(){
        $(document).click(function() {
            $("#content_menu_expand").hide();
        });
        $('#content_menu_expand').click(function(e) {
            e.stopPropagation();
        });

        $('#menu_expand').click(function()
        {
            if ($('#content_menu_expand').is(":hidden"))
            {
                $('#content_menu_expand').show();
            }
            else
            {
                $('#content_menu_expand').hide();
            }
            return false;
        });

        $('#close_menu').click(function() {
            $('#content_menu_expand').hide();
            return false;
        });

        $("ul.menu_inside li a").hover(function()
        {
            $(this).parent().find("ul.subnav").slideDown(0).show();
            $(this).parent().hover(function() {
            }, function(){
                $(this).parent().find("ul.subnav").slideUp(0);
            });
        }).hover(function() {
                $(this).addClass("subhover");
            }, function(){
                $(this).removeClass("subhover");
            });
    });
</script>