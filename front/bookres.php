
    
    <div class="flex-wrap col-md-12 d-flex justify-content-center  ">
    <h3 class="mt-5 col-12 text-center">您的訂單</h3>
        <?php

        if (!empty($Book->all(['phone' => $_POST['phone'], 'email' => $_POST['email']]))) {
            $list = [];
            foreach ($Book->all(['phone' => $_POST['phone'], 'email' => $_POST['email']]) as $key => $v) {
                $today = date("Y-m-d");
                if (strtotime($today) <= strtotime($v['day'])) {
                    $list[] = $v['id'];
                }
            }
            if (!empty($list)) {
                foreach ($list as  $v) {
                    $b = $Book->find($v);
                    $seats = explode(",", $b['seat']);
                    $seat = [];
                    foreach ($seats as $k => $s) {
                        $n = [5, 1, 2, 3, 4];
                        $row = ["", "A", "B", "C", "D"];
                        $num = $n[$s % 5];
                        $seat[] = $row[ceil($s / 5)] . "排" . $num . "號";

        ?>
                        <div class="bg-success text-white m-3 rounded rounded-lg col-12 col-md-4">
                            <p>訂單編號: <?= $b['number']; ?></p>
                            <p>電影: <?= $Movie->find($b['movie'])['name']; ?></p>
                            <p>座位: <?= implode(",", $seat); ?></p>
                            <p>日期: <?= $b['day']; ?></p>
                            <p>場次: <?= $sess[$b['session']]; ?></p>

                        </div>

        <?php
                    }
                }
            }
        } else {
            echo "<h1 class='m-5'>查無此筆資料</h1>";
        }





        ?>
        <div class="text-center col-12 m-5">
        <a href="index.php"><div class="btn btn-success">回首頁</div></a>
        </div>
    </div>
