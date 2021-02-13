<!DOCTYPE html>
<html lang="en">

<head>
    <title>我要訂票</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:abc870710@gmail.com">abc870710@gmail.com</a>

                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                Movie
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="book.html">立即購票</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="movies.html">電影一覽</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="backend.php">後臺管理</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>
    <!-- Close Header -->






    <!-- Start Content -->
    <div class="container py-5">
        <div class="text-white bg-success col-12 mx-auto p-3  rounded rounded-lg">
            <div class="navchose d-flex justify-content-around">
                <a href="?do=main">電影上架</a>
                <a href="?do=movie">電影管理</a>
                <a href="?do=book">訂單管理</a>

            </div><hr>
            <div class="content d-flex justify-content-center">
                <?php
                $file = (!empty($_GET['do'])) ? $_GET['do'] : "main";
                include("back/$file.php");
                ?>
            </div>
            
        </div>
    </div>
    <!-- End Content -->




    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row text-white p-5">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio adipisci suscipit tempore alias hic
                dignissimos doloribus quo quisquam necessitatibus eos.

            </div>


        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>