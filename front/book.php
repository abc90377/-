<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto mb-3">
            <h1 class="h1">我要訂票</h1>
            <p>
                網路訂票享更多餐點優惠！
            </p>
        </div>
        <div class="book bg-dark col-10 col-md-7 mx-auto   rounded rounded-lg">
            <form action="?do=seat" method="post">
                <h5 class="m-4">我要訂票</h5>
                <hr>
                <div class="p-3 m-3">
                    <ul>
                        <li class="mb-3">電影:<select style="width: 70%;" onchange="getday()" name="movie" id="movie">
                                <?php
                                $movies = $Movie->all(['sh' => 1]);
                                $today = date("Y-m-d");
                                foreach ($movies as $key => $value) {

                                    if (strtotime($value['onday']) < strtotime("+3day") && strtotime($value['offday']) >= strtotime($today)) {

                                        $select = ($_GET['m'] == $value['id']) ? "selected" : "";

                                ?>
                                        <option value="<?= $value['id']; ?>" <?= $select; ?>><?= $value['name']; ?></option>

                                <?php
                                    }
                                }

                                ?>

                            </select></li>
                        <li class="mb-3">日期:<select style="width: 70%;" onchange="getsession()" name="day" id="day">

                            </select></li>
                        <li class="mb-3">場次:<select style="width: 70%;" name="session" id="session">

                            </select></li>

                    </ul>
                    <input type="submit" class="btn btn-success" value="我要訂票">
                </div>


        </div>
    </div>
    </form>
</section>
<script>
    getday();

    function getday() {
        id = $("#movie").val();
        $.get("api/getday.php", {
            id
        }, function(re) {
            re = re.split(",");
            $("#day").children().remove();
            for (let i = 0; i < re.length; i++) {
                $("#day").append(`<option value=${re[i]}>${re[i]}</option>`)
            }
            getsession();

        })
    }

    function getsession() {
        day = $("#day").val();
        $("#time").children().remove();
        $.get("api/getsession.php", {
            day
        }, function(re) {
            re = re.split(",");
            $("#session").children().remove();

            for (let i = 0; i < re.length; i++) {
                movie=$("#movie").val();
                day=$("#day").val();
                session=re[i];
                $.get("api/getqt.php", {movie,day,session}, function(qt) {
                    if (qt!=20) {
                    $("#session").append(`<option value=${re[i]}>${re[i]}剩餘座位:${20-qt}</option>`)
                        
                    }
                })
            }
        })
    }
</script>