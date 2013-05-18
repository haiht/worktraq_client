<script type="text/javascript" language="javascript" src="[@URL]lib/js/fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" href="[@URL]lib/js/fancybox/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
<style type="text/css">
    .imgborder
    {
        text-align: center;
        padding:5px;
        width: 250px;
        float: left;
		font-size: 11px;
    }
    .imgborder .img
    {
        padding: 5px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .imgborder .footerimg
    {
        width: 250px;
        text-align: center;
        font-size: 11px;
    }
    .image_signage_layout{
        text-align: center;
        vertical-align: top;
    }

    #slide-wrap {
        width: 100%;
        height: 120px;
        margin:0 auto;
        overflow: auto;
    }
    #inner-wrap {
        float:left;
        margin-right:-30000px;/*Be safe with Opera's limited negative margin of 32695px (-999em could cause problems with large font sizes)*/
    }
    #inner-wrap img{
        padding: 5px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $("a[rel=signage_layout_image]").fancybox({
			'showNavArrows'         : false,
			'width'                 : 820,
			'height'                : 600,
			'transitionIn'	        :	'elastic',
			'transitionOut'	        :	'elastic',
			'overlayShow'	        :	true,
			'type'                 : 'iframe'
        });
    });
</script>
<div class="sub">
    <a href="[@URL]">Home</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]signage_layout" >Signage Layout</a>
</div>
</div>
</div>
<div class="content">
    <div class="title_r">Signage Layout</div>
    <div class="" style="text-align: left;padding-left: 35px;">
        <form action="" method="POST">
            Location: <select name="txt_location_id" onchange="this.form.submit()">
                [@LOCATION]
            </select>
            &nbsp
            Area: <select name="txt_location_area_id" onchange="this.form.submit()">
                <option value="0" selected="selected">-----</option>
                [@AREA]
            </select>
            &nbsp
            View Option: <select name="txt_option" onchange="this.form.submit()">
                [@OPTIONS]
            </select>
            <input type="hidden" name="txt_session_id" value="[@SESSION_ID]" />
        </form>
    </div>
    <div class="wrap-content" >
        [@IMAGES]
    </div>
</div>