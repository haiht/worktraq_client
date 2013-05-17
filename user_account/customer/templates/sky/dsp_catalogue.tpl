
<script type="text/javascript">
    $("document").ready(function(){
        $("input[rel=search_tag]").change(function(){
            $("div[class=notice]").show();
            $("input[name=btn_product_search]").click();
        });
        $("input[name=btn_product_quick_search]").click(function(){
            $("input[rel=search_tag]").each(function(){
                $("div[class=notice]").show();
                $("input[rel=search_tag]").removeAttr('checked');
                $("input[name=btn_product_search]").click();
            });
        });
    });
</script>


<div id="content">
    <div class="sub">
        <a href="[@URL]">Home</a>
        <span class="icon_sub_next"></span>
        <a href="[@URL]catalogue" class="sub_active">Catalogue</a>
    </div>
    <div class="clear">
        <div class="left_ct">
            <form id="search_catalogue" class="from_left_ct" action="" method="post" >
                <div class="clear">
                        <input  class="float_left" id="txt_product_tag_all" type="checkbox" value="0" name="txt_product_tag_all" rel="search_tag" [@CHECK_ALL] >
                        <span class="blue_co">All Products</span><span class="color2"> </span></div>
                        [@TAG_LIST]
           </div>
            <input style="display:none" type="submit" value="Filter" name="btn_product_search" class="btn btn-primary" />
           </form>
        </div>
        <div class="float_right right_indent">
            <div class="title_r float_left">ALL PRODUCTS</div>
            <div class="notice" style="display:none">Searching product in catalogue!.....</div>
            <form id="search_catalogue" class="float_right" action="" method="post" >
                <input id="txt_product_search" name="txt_product_search" type="text" placeholder="Filter your catalogue" class="text_search float_left"/>
                <input type="submit" name="btn_product_search" class="sub_search" value="QUICK SEARCH" />
                <input type="reset"  class="clear_search" value="Clear" />
            </form>
            <div class="right_ct">
                [@PRODUCT_LIST]
            </div>
            <div class="clear"></div>
            <div class="device_page clear">
                [@CATALOGUE_ PAGING]
            </div>
        </div>
    </div>
</div>
</div>

<div class="indent_footer"></div>