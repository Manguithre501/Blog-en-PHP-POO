<?php $url = "http://dts/POO/public/"; ?>
<!DOCTYPE html>
<html dir="ltr" lang="fr-FR">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
	============================================= -->

    <link rel="stylesheet" href="<?= $url . 'css/bootstrap.css' ?>" type="text/css" />

    <link rel="stylesheet" href="<?= $url . 'style.css' ?>" type="text/css" />
    <link rel="stylesheet" href="<?= $url . 'css/dark.css' ?>" type="text/css" />



    <link rel="stylesheet" href="<?= $url . 'css/font-icons.css' ?>" type="text/css" />

    <title>404 - <?= APP_NAME ?> </title>

</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">



        <section id="slider" class="slider-element min-vh-60 min-vh-md-100 dark error404-wrap include-header" style="background: url('http://dts/POO/public/images/static.jpg') center;">
            <div class="slider-inner">

                <div class="vertical-middle">
                    <div class="container text-center py-5 py-md-0">

                        <div class="error404">404</div>

                        <div class="heading-block border-bottom-0" style="color: #fff;">
                            <h4>Ooopps.! La page que vous recherchez est introuvalbe.</h4>
                        </div>

                        <div class="mx-auto mb-0">
                            <a href="<?= APP_URL ?>" class="button button-large  button-light text-dark py-2 rounded-1 fw-medium nott ls0 ms-0 mt-3" style="background-color: #F9BE79;"> <i class="icon-home1"></i> Page d'accueil</a>

                        </div>

                    </div>
                </div>

            </div>
        </section>



    </div><!-- #wrapper end -->

</body>

</html>