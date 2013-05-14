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
<section id="main" >
        	<ul class="breadcrumb">
                <li><a href="#" title="Home">Home</a><span class="divider">/</span></li>               
                <li class="active">Catalogue</li>
            </ul>
            <h2 class="title-page"><span>Catalogue</span></h2>
            <section id="sidebar">
				<form method="post" action="" class="form-general filter" id="search_catalogue">
                    <lable class="lable"> Quick Search </lable>
                	<input size="16" type="text" name="txt_product_search" id="txt_product_search" value="[@PRODUCT_SEARCH]" placeholder="Enter your search" >
                    <input type="submit" value=" " style="width: 35px" name="btn_product_quick_search" class="btn_quick_search" />
                    <br>
                    <lable class="lable"> Tag Fillter </lable>
                <ul class="list-catalogue">
                	[@PRODUCT_TAG]
                </ul>                
                <input style="display:none" type="submit" value="Filter" name="btn_product_search" class="btn btn-primary" />
                </form>
            </section>
			<section id="content" class="two-col">
                <div class="notice" style="display:none">Searching product in catalogue!.....</div>
				<ul class="list-items">
					[@LIST_PRODUCTS]
				</ul>
	            [@PRODUCT_PAGING]
			</section>
		</section>
		
[@POPUP_ADD_ORDER]