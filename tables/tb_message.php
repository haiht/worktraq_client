<?php
$arr_fields = array(
    array('name'=>'message_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
    ,array('name'=>'message_type', 'type'=>'int', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'message_key', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'message_value', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'message_order', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
);

?>