<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'product_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'material_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'thickness', 'type'=>'string', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'color', 'type'=>'string', 'default'=>'#000000', 'pkey'=>0, 'index'=>0)
);

?>