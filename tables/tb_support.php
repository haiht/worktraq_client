<?php
$arr_fields = array(
     array('name'=>'support_id', 'type'=>'int', 'default'=>'0', 'pkey'=>1, 'index'=>1)//Xem như khóa chính (1 field)??
    ,array('name'=>'support_title', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'support_description', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'company_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'location_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'contact_id', 'type'=>'int', 'default'=>'0', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'date_created', 'type'=>'datetime', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'username', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
    ,array('name'=>'image_file', 'type'=>'string', 'default'=>'', 'pkey'=>0, 'index'=>0)
);
?>