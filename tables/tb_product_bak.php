<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'product_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'product_sku', 'type'=>'string', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'short_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'long_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'product_detail', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_option', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_width', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_height', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_dept', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_unit', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'image_option', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'image_file', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'material_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'text_option', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'text', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'sold_by', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'default_price', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'product_status', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'company_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
);

?>