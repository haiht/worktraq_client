<script type="text/javascript">
    $("document").ready(function()
    {
        $("input[rel=search_tag]").change(function(){
            $("div[class=notice]").show();
            $("input[name=btn_product_search]").click();
        });

    });
</script>

<div class="sub">
    <a href="[@URL]">HOME</a>
    <span class="icon_sub_next"></span>
    <a class="sub_active" href="[@URL]catalogue" >CATALOGUE</a>
</div>
</div>
</div>
<div class="content">
    <div class="left_ct">
        <div class="float_right">
            <form action="#" method="post">
                <input type="text" class="bg_input" name="txt_product_search_input" placeholder="Search...." style="text-align: right" />
                <input type="submit" class="bg_button" name="txt_product_search" />
            </form>
        </div>
        <div class="clear"></div>
        <form class="from_left_ct filter" id="search_catalogue" method="post">
            <div class="first">
                tag filter
            </div>
            <div class="clear">
                <!--input class="float_right" type="radio" value=0 name="rd_search_tags" rel="search_tag" checked="checked"  />All-->
                <input rel="search_tag" class="float_right" type="checkbox" id="txt_product_tag_all" name="txt_product_tag_all" value=1 [@SELECT] />All
            </div>
            [@TAG_FIELD]
            <input style="display:none" type="submit" value="Filter" id="btn_product_search" name="btn_product_search" class="btn btn-primary" />
        </form>
    </div>
    <div class="float_right">
        <div class="title_r">
            Calalogue
        </div>
        <div class="notice" style="display:none">Searching product in catalogue!.....</div>
        <div class="right_ct">
            <div class="clear_tab">             [@TAG_CLEAR_TAB]          </div>
        </div>
        <div class="device_page">
            <div class="indent">
                [@DEVICE_PAGE]
            </div>
        </div>
    </div>
</div>


