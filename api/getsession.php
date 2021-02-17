<?php
include_once('../base.php');
$sess=[
    1=>"10:00~12:00",
    2=>"12:00~14:00",
    3=>"14:00~16:00",
    4=>"16:00~18:00",
    5=>"18:00~20:00",
    ];
$now=date("G");
$day=$_GET['day'];
$today=date("Y-m-d");
if ($day==$today) {
    if($now<10){
        $time=$sess;

    }else {
        $start=floor(($now-10)/2)+2;
        $time=[];
        for ($i=$start; $i <=5 ; $i++) { 
            $time[]=$sess[$i];
        }
    }
}else{
    $time=$sess;
}

echo implode(",",$time);

?>
