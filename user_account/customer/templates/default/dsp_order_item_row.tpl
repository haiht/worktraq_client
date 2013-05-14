<script>
    $(document).ready(function(){
        $("#product_quantity").change(function(){
            var quan = $(this).val();
            var unit = $("#txt_unit_price").val();

            var total = quan * unit;
           $("#total_price_span").text(total);
            $("#total_price").val(total);
        });
        $("#btn_up").click(function(){
            var quantity = $("#product_quantity").val();
            quantity = parseInt(quantity);
            quantity +=1;
            $("#product_quantity").val(quantity);
            var price = $("#txt_unit_price").val();
            var total = quantity * price;
            $("#total_price_span").text(total);
        });

        $("#btn_down").click(function(){
            var quantity = $("#product_quantity").val();
            quantity = parseInt(quantity);
            quantity -=1;
            if(quantity<=0)
                return false;
            $("#product_quantity").val(quantity);
            var price = $("#txt_unit_price").val();
            var total = quantity * price;
            $("#total_price_span").text(total);
        });

    });
</script>
<div class="[@PRODUCT_ADD_ORDER_CLASS]">
    <div class="table_qua float_left">
        <form class="field" method="post">
            <input type="text" id="product_quantity" name="product_quantity" class="bg float_left" data-location="10327" readonly="readonly" value="1">
        </form>
        <input type="image" src="[@URL_TEMPLATE]/images/up.jpg" id="btn_up" class="btn_down">
        <input type="image" src="[@URL_TEMPLATE]/images/down.jpg"  id="btn_down" class="btn_up">
    </div>
    <div class="table_choo float_left">
        <form class="field" method="post">
            <select id='txt_list_order' [@DISABLED]>
                [@OPTION_FIELD]
            </select>
        </form>
    </div>
    <div class="table_unit float_left">
        <span id="spn_unit_price">[@UNIT_PRICE] </span>
        <input type="hidden" id="txt_unit_price" value="[@UNIT_PRICE]" />
    </div>
    <div class="table_topri float_left" >
        <span id="total_price_span">[@TOTAL_PRICE]</span>
        <input type="hidden" id="txt_total_price" value="[@TOTAL_PRICE]" />
    </div>
</div>
