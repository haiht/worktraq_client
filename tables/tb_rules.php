<?php
$arr_fields = array(
    array('name'=>'rule_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
    ,array('name'=>'rule_title', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'rule_type', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0) // User Or Company
    ,array('name'=>'rule_key', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'rule_admin', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
);
?>