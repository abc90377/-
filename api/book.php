<?php
include_once("../base.php");
$_POST['qt']=count(explode(",",$_POST['seat']));
$n=rand(1111,9999);
$_POST['number']=date("Ymd").(count($Book->all())+1).$n;
$_POST['session']=array_keys($sess,$_POST['session'])[0];
$m=$Movie->find($_POST['movie']);
$m['count']++;

$Movie->save($m);
$Book->save($_POST);
echo $Book->find(['number'=>$_POST['number']])['id'];


?>