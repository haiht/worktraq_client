<?php
//Danh sách các field trong collection
$arr_fields = array(
	array('name'=>'log_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
	,array('name'=>'user_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>1)
	,array('name'=>'user_password', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'log_ipaddress', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'log_url', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
	,array('name'=>'log_datetime', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
);

?>