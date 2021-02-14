<?php
include_once("../base.php");
$data=$Movie->find($_POST['id']);
$data['sh']=$_POST['t'];
$Movie->save($data);