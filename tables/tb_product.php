<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'product_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'product_sku', 'type'=>'string', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'short_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'long_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'product_detail', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_option', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size_unit', 'type'=>'string', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'size', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'image_option', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'num_images', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'package_quantity', 'type'=>'int', 'default'=>'1', 'pkey'=>0, 'index'=>0)
	,array('name'=>'allow_single', 'type'=>'int', 'default'=>'1', 'pkey'=>0, 'index'=>0)
	,array('name'=>'package_type', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'package_content', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'image_file', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'image_desc', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'saved_dir', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'map_content', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'material', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'text_option', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'text', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'sold_by', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'default_price', 'type'=>'float', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'product_status', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'company_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'taxonomy', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'tag', 'type'=>'array', 'default'=>'array()', 'pkey'=>0, 'index'=>0)
	,array('name'=>'product_note', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'user_name', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'user_type', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'date_created', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
);

?>