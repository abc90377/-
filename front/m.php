<?php
$m = $Movie->find($_GET['movie']);
?>
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-4 product-wap rounded-0">
                    <div class="card rounded-0">
                        <img class="card-img rounded-0 img-fluid" src="img/<?= $m['poster']; ?>">
                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">

                        </div></a>
                    </div>


                </div>

            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $m['name']; ?></h1>
                        <p class="h3 py-2 text-muted">2021-1-1</p>


                        <h6>劇情簡介:</h6>
                        <span width="100%" style="overflow-wrap: anywhere;"><?= nl2br($m['inform']); ?></span>


                        <h6>主演:</h6>
                        <ul class="list-unstyled pb-3">
                            <?php
                            $stars = explode(",", $m['star']);
                            foreach ($stars as  $star) {
                                echo "<li>{$star}</li>";
                            }

                            ?>
                        </ul>

                        <div class="row pb-3">
                            <div class="col-6 d-grid">
                                <a href="?do=book&m=<?= $_GET['movie']; ?>"><button class="btn btn-success btn-lg w-100">去訂票</button></a>
                            </div>
                            <div class="col-6 d-grid">
                                <a href="?do=movies"><button class="btn btn-success btn-lg w-100">返回</button></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>