<?php
$v_host = "127.0.0.1";
$v_port = "27017";
$v_user = "admin";
$v_pass = "admin";
$v_database = "anvyinc";
$v_options=array('timeout'=> 100);


try{
    $v_mongo = new Mongo("mongodb://".$v_host.":".$v_port,$v_options);
    $v_databases = $v_mongo->selectDB('anvyinc');
}
catch(MongoConnectionException $e){
    die("Can not connection MongoDB!....". $e->getMessage());
}
catch (MongoException $e) {
    die('Error: ' . $e->getMessage());
};
?>
