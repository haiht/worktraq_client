<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'product_price_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'product_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'company_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'price_title', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'price', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'price_date', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'price_status', 'type'=>'int', 'default'=>'1', 'pkey'=>0, 'index'=>0)
);
