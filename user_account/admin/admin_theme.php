<?php
if(!isset($v_sval)) die();
?>
<div id="mainWrapInner" class="floatWrap clear">
    <ul style="display: block;" class="tc-theme-container">
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="default">
                <span class="tc-color" style="background-color: #ef6f1c"></span>
                <span class="tc-color" style="background-color: #e24b17"></span>
                <span class="tc-color" style="background-color: #5a4b43"></span>
                <span class="tc-color" style="background-color: #ededed"></span>
                <span class="tc-theme-name">Default</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="blueopal">
                <span class="tc-color" style="background-color: #076186"></span>
                <span class="tc-color" style="background-color: #7ed3f6"></span>
                <span class="tc-color" style="background-color: #94c0d2"></span>
                <span class="tc-color" style="background-color: #daecf4"></span>
                <span class="tc-theme-name">Blue Opal</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="bootstrap">
                <span class="tc-color" style="background-color: #0044cc"></span>
                <span class="tc-color" style="background-color: #0088cc"></span>
                <span class="tc-color" style="background-color: #333333"></span>
                <span class="tc-color" style="background-color: #e6e6e6"></span>
                <span class="tc-theme-name">Bootstrap</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="silver">
                <span class="tc-color" style="background-color: #298bc8"></span>
                <span class="tc-color" style="background-color: #515967"></span>
                <span class="tc-color" style="background-color: #bfc6d0"></span>
                <span class="tc-color" style="background-color: #eaeaec"></span>
                <span class="tc-theme-name">Silver</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="uniform">
                <span class="tc-color" style="background-color: #666666"></span>
                <span class="tc-color" style="background-color: #cccccc"></span>
                <span class="tc-color" style="background-color: #e7e7e7"></span>
                <span class="tc-color" style="background-color: #ffffff"></span>
                <span class="tc-theme-name">Uniform</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="metro">
                <span class="tc-color" style="background-color: #8ebc00"></span>
                <span class="tc-color" style="background-color: #787878"></span>
                <span class="tc-color" style="background-color: #e5e5e5"></span>
                <span class="tc-color" style="background-color: #ffffff"></span>
                <span class="tc-theme-name">Metro</span></a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="black">
                <span class="tc-color" style="background-color: #0167cc"></span>
                <span class="tc-color" style="background-color: #4698e9"></span>
                <span class="tc-color" style="background-color: #272727"></span>
                <span class="tc-color" style="background-color: #000000"></span>
                <span class="tc-theme-name">Black</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="metroblack">
                <span class="tc-color" style="background-color: #00aba9"></span>
                <span class="tc-color" style="background-color: #0e0e0e"></span>
                <span class="tc-color" style="background-color: #333333"></span>
                <span class="tc-color" style="background-color: #565656"></span>
                <span class="tc-theme-name">Metro Black</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="highcontrast">
                <span class="tc-color" style="background-color: #b11e9c"></span>
                <span class="tc-color" style="background-color: #880275"></span>
                <span class="tc-color" style="background-color: #664e62"></span>
                <span class="tc-color" style="background-color: #1b141a"></span>
                <span class="tc-theme-name">High Contrast</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
        <li class="tc-theme">
            <a href="#" class="tc-link" data-value="moonlight">
                <span class="tc-color" style="background-color: #ee9f05"></span>
                <span class="tc-color" style="background-color: #40444f"></span>
                <span class="tc-color" style="background-color: #2f3640"></span>
                <span class="tc-color" style="background-color: #212a33"></span>
                <span class="tc-theme-name">Moonlight</span>
            </a>
            <span class="tc-theme-name"><label><input type="checkbox" id="chk_apply" />Apply for all browser</label></span>
        </li>
    </ul>
</div>
<style>
    .floatWrap:after{
        clear: both;
        content: "";
        display: block;
    }
    #mainWrapInner {
        border-top: 1px solid #DFDFDF;
        padding-top: 18px;
    }
    .clear {
        clear: both;
    }
    .tc-theme-container {
        border-bottom: 1px solid #DFDFDF;
        list-style-type: none;
        margin: 0 0 18px;
        padding: 0 0 18px 10px;
    }
    .tc-theme{
        display: inline-block;
        text-decoration: none;
    }
    .tc-link {
        border: 1px solid #FFFFFF;
        color: #4F4F4F;
        padding: 10px;
    }
    .tc-color {
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(255, 255, 255, 0.1);
        border-style: solid;
        border-width: 1px;
        display: inline-block;
        height: 23px;
        width: 23px;
    }
    .tc-theme .tc-link {
        border: 1px solid #FFFFFF;
        color: #4F4F4F;
        padding: 10px;
    }
    .tc-theme .tc-theme-name {
        display: block;
        padding: 0;
        width: auto;
    }
    .tc-theme-name {
        padding-right: 4px;
        vertical-align: middle;
        width: 80px;
    }
    .k-theme-chooser, .tc-theme, .tc-color, .tc-link, .tc-theme-name {
        display: inline-block;
        text-decoration: none;
    }
    .tc-theme .tc-link.active {
        border-color: #D6D6D6;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.15) inset;
    }
    .tc-theme .tc-link:hover {
        border-color: #D6D6D6;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.15);
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $.each($('li.tc-theme a.tc-link'), function(index, element){
            if($(this).attr("data-value")=='<?php echo isset($v_default_theme)?$v_default_theme:'';?>'){
                $(this).addClass('active');
            }
        });
        $("a.tc-link").click(function(e){
            e.preventDefault();
            var $this = $(this);
            var theme = $(this).attr("data-value");
            $("ul.tc-theme-container").find(".active").removeClass("active");
            $this.addClass('active');
            $.cookie("_ck_anvy_theme",null,{path:'/'});
            $.cookie("_ck_anvy_theme", theme, {path:'/', expires: 7 });
            $('link#link_theme').attr("href",'<?php echo URL.'lib/css/theme.';?>'+theme+'.css');
            $.each($('iframe'), function(index, element){
                if($(this).contents().find('link#link_theme').length>0){
                    var $css = $(this).contents().find('link#link_theme');
                    $css.attr("href",'<?php echo URL.'lib/css/theme.';?>'+theme+'.css');
                }
            });

            var chk = $(this).parent().find('input[type="checkbox"]').prop("checked");
            $.ajax({
                url : '<?php echo URL.'admin/theme';?>',
                type: 'POST',
                data:   {txt_session_id:'<?php echo session_id();?>', txt_ajax_type: 'change_theme', txt_remember: chk?1:0, txt_theme: theme},
                success: function(data, status){

                }
            });
        });
    });
</script>