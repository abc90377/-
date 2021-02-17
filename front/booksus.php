<div class="m-5 d-flex  align-items-center flex-column">
<h2>訂購完成!</h2>
<h5 class="text-muted">以下是您的訂單資訊</h5>
<?php
$b=$Book->find($_GET['id']);
$seats=explode(",",$b['seat']);
$seat=[];
foreach ($seats as $k => $s) {
    $n = [5, 1, 2, 3, 4];
    $row = ["", "A", "B", "C", "D"];
    $num = $n[$s % 5];
    $seat[]=$row[ceil($s / 5)]."排".$num."號";
}
?>
<div class="m-3">
<p>訂單編號: <?=$b['number'];?></p>
<p>電影: <?=$Movie->find($b['movie'])['name'];?></p>
<p>座位: <?=implode(",",$seat);?></p>
<p>日期: <?=$b['day'];?></p>
<p>場次: <?=$sess[$b['session']];?></p>
</div>
<a href="index.php"><div class="btn btn-success">回首頁</div></a>
</div>