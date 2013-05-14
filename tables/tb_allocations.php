<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'allocation_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'order_items_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'order_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
    ,array('name'=>'location_name', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>1)
    ,array('name'=>'location_address', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>1)
	,array('name'=>'quantity', 'type'=>'int', 'default'=>'1', 'pkey'=>0, 'index'=>0)
	,array('name'=>'shipper', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'tracking_number', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'tracking_url', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'date_shipping', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'ship_status', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'location_from', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'create_by', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'create_time', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
);

?>