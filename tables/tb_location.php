<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'company_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'location_type', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'location_area', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'location_number', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'main_contact', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_unit', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_line_1', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_line_2', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_line_3', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_city', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_province', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_postal', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'address_country', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'open_date', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'close_date', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'status', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
);

?>