<?php
include_once("../base.php");
$movie = $Movie->find($_GET['id']);
$on = $movie['onday'];
$off = $movie['offday'];
$today = date("Y-m-d");
if (strtotime($today) >=strtotime($on)) { //已上檔
    if (date("G") >= 18) {
        $start = date("Y-m-d", strtotime("+1day"));
    } else {
        $start = $today;
    }
} else {
    $start = $on;
}
if (strtotime("+3day") <= strtotime($off)) {
    $end = date("Y-m-d", strtotime("+3day")); //三天後持續上映
} else {
    $end = $off;
}
$showday = (strtotime($end) - strtotime($start)) / (60 * 60 * 24) + 1;
$day = [];
for ($i = 0; $i < $showday; $i++) {
    $day[] = date("Y-m-d", strtotime($start . "+{$i}day"));
}
echo implode(",", $day);
