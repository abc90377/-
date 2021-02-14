<!-- Start Content -->
<?php
$m = $Movie->all(['sh' => 1]);
?>
<div class="container py-5">
<div class=" col-12 mb-3 d-flex justify-content-end">
    顯示:
    <select oninput="show()" id="select">
        <option value="all">全部</option>
        <option value="on">上映中</option>
        <option value="wait">尚未上映</option>
    </select>
</div>
    <div class="row d-flex justify-content-md-around justify-content-center">



        <div class="col-lg-9 ">
            <div class="row">
                <?php
                foreach ($m as $key => $value) {
                ?>
                <?php
                $today = date("Y-m-d");
                if (strtotime($value['onday']) > strtotime($today) && strtotime($value['offday']) > strtotime($today)) {
                    $state="wait";
                } else if (strtotime($value['onday']) <= strtotime($today) && strtotime($value['offday']) > strtotime($today)) {
                    $state="on";
                } 
                if (strtotime($value['offday']) > strtotime($today)) {
                ?>
                    <div class="col-md-4  <?= $state; ?> all" >
                        <a href="?do=m&movie=<?= $value['id']; ?>">

                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="img/<?= $value['poster']; ?>" >
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                                    </div>
                        </a>
                    </div>

                    <div class="card-body">
                        <h6><?= $value['name']; ?></h6>
                        <p class="text-muted"><?= $value['onday']; ?></p>
                    </div>

            </div>
        </div>
    <?php
                }}

    ?>


    </div>
    <div div="row">
        <ul class="pagination pagination-lg justify-content-end">
            <li class="page-item disabled">
                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
            </li>
            <li class="page-item">
                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
            </li>
        </ul>
    </div>
</div>

</div>
</div>
<!-- End Content -->
<script>
    function show() {
        console.log(1);
        type = $("#select").val()
        switch (type) {
            case "all":
                $(".all").show()
                
                break;
            case "wait":
                $(".all").hide()

                $(".wait").show()

                break;
            case "on":
                $(".all").hide()

                $(".on").show()

                break;

        }}
</script>