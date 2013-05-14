<?php
$arr_fields = array(
array('name'=>'lg_threshold_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
,array('name'=>'group_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
,array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
,array('name'=>'company_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
,array('name'=>'threshold_value', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
,array('name'=>'overflow', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
,array('name'=>'threshold_note', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
);
?>