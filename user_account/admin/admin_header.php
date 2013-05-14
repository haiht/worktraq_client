<?php if(!isset($v_sval)) die();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $v_main_site_title .' - '.  $v_sub_site_title;?> </title>
    <base href="<?php echo URL;?>" />
    <link href="<?php echo URL;?>lib/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo URL;?>lib/kendo/css/kendo.common.min.css" rel="stylesheet" />
    <link href="<?php echo URL;?>lib/css/special.css" rel="stylesheet" type="text/css" />
    <link id="link_theme" href="<?php echo URL;?>lib/css/theme.<?php echo $v_default_theme;?>.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="<?php echo URL;?>lib/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>lib/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>lib/js/jquery.resize.js"></script>
    <script type="text/javascript" src="<?php echo URL;?>lib/kendo/js/kendo.web.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $("#menu").kendoMenu({
                dataUrlField: "LinksTo",
                <?php echo $v_dsp_horizontal_menu;?>
            });
            var treeview = $("#div_treeview").kendoTreeView({
                dataUrlField: "LinksTo",
                <?php echo $v_dsp_tree_menu;?>
            }).data("kendoTreeView");
            $('select#txt_company_id').width(250).kendoComboBox();
            $('select#txt_search_company_id').width(250).kendoComboBox();
			$('div#div_logo').bind('click', function(){
				document.location = '<?php echo URL;?>';
			});
            $('div#div_right_pane').resize(function(){
                var splitter = $("#div_splitter_content").data("kendoSplitter");
                if(splitter) splitter.trigger("resize");
            });
        });
    </script>

</head>

<body>

<div id="div_wrapper">
    <div id="div_header" class="k-widget">
        <div id="div_logo"></div>
        <div id="div_info">
            <div id="div_account"><?php echo isset($v_user_full_name)?$v_user_full_name:'';?> | Account | <a href="<?php echo URL;?>logout.html">Logout</a></div>
            <div id="div_icon">
                <ul class="icons">
                    <li style="display: none">
                        <p><img id="icons_splitter" src="images/icons/arrow_right.png" title="Theme" /></p><p>Expand Pane</p>
                    </li>
                    <li>
                        <p><img id="icons_theme" src="images/icons/color_wheel.png" title="Theme" /></p><p>Theme</p>
                    </li>
                <?php if($v_show_function_icon){?>
                    <?php echo isset($v_dsp_show_action_icons)?$v_dsp_show_action_icons:'';?>
                <?php if($v_show_report_icon && @$v_act=='A'){?>
                	<li>
                    <a href="<?php echo URL.$v_admin_key;?>/print" target="_blank">
                    <p><img id="icons" src="images/icons/printer.png" title="Print" /></p><p>Print</p>
                    </a>
                    </li>
                    <li>
                    <a href="<?php echo URL.$v_admin_key;?>/export" target="_blank">
                    <p><img id="icons" src="images/icons/excel.png" title="Export" /></p><p>Export</p>
                    </a>
                    </li>
                <?php }?>
                <?php if($v_show_view_icon&& @$v_act!='A'){?>
                <li>
                <a href="<?php echo URL.$v_admin_key;?>">
                <p><img id="icons" src="images/icons/all.png" title="View All" /></p><p>View</p>
                </a>
                </li>
                <?php }?>
                <?php if($v_show_create_icon && @$v_act=='A'){?>
                	<li>
                    <a href="<?php echo URL.$v_admin_key.'/add';?>">
                    <p><img id="icons_add_new" src="images/icons/add.png" title="Add New" /></p><p>Add New</p>
                    </a>
                    </li>
                <?php }?>

                <?php if($v_show_search_icon && @$v_act=='A'){?>
                <li id="icons_advanced_search">
                <p><img id="icons_advanced_search" src="images/icons/zoom.png" title="Advanced Search" /></p><p>Advanced</p>
                </li>
                <?php }?>
                <?php }?>
                </ul>
            </div>
        </div>
        <div id="div_header_top">&nbsp;</div>
        <div id="div_header_menu">
            <div id="menu"></div>
        </div>
    </div>