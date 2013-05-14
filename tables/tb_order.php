<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'order_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'raw_id', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'anvy_id', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'po_number', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'order_type', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'shipping_contact', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'total_order_amount', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'total_discount', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'billing_contact', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'net_order_amount', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'gross_order_amount', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'job_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'sale_rep', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'date_created', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'date_required', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'term', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'delivery_method', 'type'=>'int', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'source', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'status', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'dispatch', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'tax_1', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'tax_2', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'tax_3', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
);

?>