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
			/*
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'titlePosition' 	: 'over',

            'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
                return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
            }
			*/
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
<section id="main">
    <ul class="breadcrumb">
        <li><a title="Home" href="#">Home</a><span class="divider">/</span></li>
        <li class="active">Hot Spot</li>
    </ul>
    <h2 class="title-page"><span>Signage Layout</span></h2>
    <section id="content">
        <div class="block-submit" style="text-align: left;padding-left: 35px;">
        <fieldset>
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
            </fieldset>
        </div>
    </section>
    <div class="wrap-content" >
        [@IMAGES]
    </div>
</section>