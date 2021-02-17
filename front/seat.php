<style>
    .choose {
        background-color: orange;
        cursor:pointer;
    }

    .notchoose {
        background-color: #59ab6e;
        cursor:pointer;
    }
    .booked{
        background-color: #212934;
    
    }
</style>
<div class="wrap d-flex justify-content-center ">
    <div class="d-flex flex-wrap justify-content-center m-5" style="width: 300px;">
        <div class="m-3 bg-dark text-white text-center" style="width: 250px;height:50px;">STAGE</div>
        <?php
        $allbooked = [];
        $session = array_keys($sess, $_POST['session'])[0];
        $bookeds = $Book->all(['movie' => $_POST['movie'], 'day' => $_POST['day'], 'session' => $session]);
        if (!empty($bookeds)) {
            foreach ($bookeds as  $v) {
                $ary=explode(",",$v['seat']);
                foreach ($ary as $s) {
                    $allbooked[]=$s;
                }
            }
        }

        for ($i = 1; $i <= 20; $i++) {
            $type="notchoose";
            if (!empty($allbooked)) {
                if (!empty(array_keys($allbooked,$i))) {
                    $type="booked";
                }
            }


            $row = ["", "A", "B", "C", "D"];
            if ($i > 5) {
                $n = [5, 1, 2, 3, 4];
                $num = $n[$i % 5];
            } else {
                $num = $i;
            }

        ?>
            <div id="<?= $i; ?>" onclick="choose(this)" class="<?=$type;?> text-white  seat m-1  rounded rounded-lg" style="width: 50px;height:50px;">
                <?= $row[ceil($i / 5)]; ?>排<br>
                <?= $num; ?>號

            </div>

        <?php
        }
        ?>
    </div>
</div>
<div class="col-12  text-center">
    <p>您選擇的電影是：<?= $Movie->find($_POST['movie'])['name']; ?></p>
    <p>您選擇的時刻是：<?= $_POST['day']; ?> <?= $_POST['session']; ?></p>
    <p>您己經勾選<span id="amount"></span>張票，最多可以購買四張票</p>
    <form action="?do=bookinfo" method="post">
        <input type="hidden" name="movie" value="<?= $_POST['movie']; ?>">
        <input type="hidden" name="day" value="<?= $_POST['day']; ?>">
        <input type="hidden" name="session" value="<?= $_POST['session']; ?>">
        <input type="hidden" name="seat" id="seatinput">
        <input type="submit" value="確認訂票">

    </form>
</div>
<script>
    var chooseSeat = [];

    function choose(seat) {
        if ($(seat).hasClass("notchoose")) {
            if (chooseSeat.length >= 4) {
                alert("最多只能購買四張票")
            } else {
                $(seat).removeClass("notchoose");
                $(seat).addClass("choose");

                chooseSeat.push($(seat).attr("id"));
            }


        } else if($(seat).hasClass("choose")) {
            $(seat).removeClass("choose");
            $(seat).addClass("notchoose");
            for (var i = 0; i < chooseSeat.length; i++) {

                if (chooseSeat[i] === $(seat).attr("id")) {
                    chooseSeat.splice(i, 1);
                    i--;
                }
            }

        }
        getamount();

    }
    getamount();

    function getamount() {

        $("#amount").text(chooseSeat.length);
        $("#seatinput").val(chooseSeat.join());
    }
</script>