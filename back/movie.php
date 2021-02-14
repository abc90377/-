<?php
if (!empty($_GET['notice'])) {
    if ($_GET['notice'] == "editsus") {
        echo "<script>alert('修改成功!')</script>";
    }
}

?>
<h3 class="col-12 text-center">電影管理</h3>
<div class=" col-12 mb-3 d-flex justify-content-end">
    顯示:
    <select oninput="show()" id="select">
        <option value="all">全部</option>
        <option value="on">上映中</option>
        <option value="wait">尚未上映</option>
        <option value="off">已下檔</option>
    </select>
</div>
<table width="80%" class="table text-center text-white">
    <thead>
        <td>狀態</td>
        <td>片名</td>
        <td>海報</td>
        <td>顯示</td>
        <td>操作</td>
    </thead>
    <?php
    $movies = $Movie->all();
    foreach ($movies as $key => $value) {
    ?>
        <tr class="all">
            <td>
                <?php
                $today = date("Y-m-d");
                if (strtotime($value['onday']) > strtotime($today) && strtotime($value['offday']) > strtotime($today)) {
                    echo "<p class='wait'class='bg-dangerous text-white'>尚未上映</p>";
                } else if (strtotime($value['onday']) <= strtotime($today) && strtotime($value['offday']) > strtotime($today)) {
                    echo "<p class='on' class='bg-dangerous text-white'>上映中</p>";
                } elseif (strtotime($value['offday']) < strtotime($today)) {
                    echo "<p class='off' class='bg-dangerous text-white'>已下檔</p>";
                }

                ?>
            </td>
            <td><?= $value['name']; ?></td>
            <td><img src="img/<?= $value['poster']; ?>" width="50px" height="80px;"></td>
            <td>
                <select oninput="sh(this,<?= $value['id']; ?>)">
                    <option value="1" <?= $value['sh'] == 1 ? "selected" : ""; ?>>顯示</option>
                    <option value="0" <?= $value['sh'] == 0 ? "selected" : ""; ?>>隱藏</option>
                </select>
            </td>
            <td>
                <a href="?do=edit&movie=<?= $value['id']; ?>"><button>編輯更多</button></a>
                <button onclick="del(<?= $value['id']; ?>,this)">刪除</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<script>
    function show() {
        type = $("#select").val()
        switch (type) {
            case "all":
                $(".all").hide()
                $(".wait").parent("td").parent("tr").show()
                $(".on").parent("td").parent("tr").show()
                $(".off").parent("td").parent("tr").show()
                break;
            case "wait":
                $(".all").hide()

                $(".wait").parent("td").parent("tr").show()

                break;
            case "on":
                $(".all").hide()

                $(".on").parent("td").parent("tr").show()

                break;
            case "off":
                $(".all").hide()

                $(".off").parent("td").parent("tr").show()

                break;

        }


    }

    function sh(select, id) {
        t = $(select).val();
        $.post('api/editsh.php', {
            id,
            t
        });
    }

    function del(id, item) {

        chk = confirm("確定刪除嗎?");
        if (chk) {

            $.get("api/delmovie.php", {
                id
            }, function() {
                $(item).parent("td").parent("tr").hide();

            })
        }
    }
</script>