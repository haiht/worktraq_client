<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'module_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'module_pid', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'module_text', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_key', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_type', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)//0:admin, 1=>...
	,array('name'=>'module_root', 'type'=>'string', 'default'=>'admin', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_dir', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_order', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_index', 'type'=>'string', 'default'=>'index.php', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_locked', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_time', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'module_category', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'module_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
);

?>