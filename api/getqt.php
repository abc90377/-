<?php
include_once("../base.php");
$_GET['session']=array_keys($sess,$_GET['session'])[0];
$all=$Book->all(['movie'=>$_GET['movie'],'day'=>$_GET['day'],'session'=>$_GET['session']]);
$qt=0;
if (!empty($all)) {
    foreach ($all as $key => $value) {
    $qt=$qt+$value['qt'];
}
}
echo $qt;
?>