<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 26/04/2017
 * Time: 21:33
 */

include '../config/config.php';
include "../vendor/vendor/autoload.php";


if (isset($_GET['page'])) {
    $side_url_navn = mysqli_real_escape_string($mysqli, $_GET['page']);
} else {
    $side_url_navn = '';
}

if (!isset($_SESSION['kurv'])) {
    $_SESSION['kurv'] = [];
}


$query = "SELECT side_titel, side_indhold, side_include_filnavn
            FROM sider
            LEFT JOIN side_includes
            ON fk_side_include_id = side_include_id
            WHERE side_url_navn = '$side_url_navn' AND side_status = 1";
$result = $mysqli->query($query) or die($mysqli->errno);
$side = mysqli_fetch_assoc($result);

if (isset($side)) {
    $side_titel = $side['side_titel'];
} else {
    $side_titel = 'HTTP 404';
}

?>

<!doctype html>
<html class="no-js" lang="da">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $side_titel; ?> - Mettes Planteskole</title>
    <meta name="description" content="WI63 Praktik 4 RTS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    FONTAWESOME CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="main-body container-fluid">
    <!--    HEADER-->
    <?php include 'inc/header.php'; ?>
    <!--NAV-->
    <?php include 'inc/top_nav.php'; ?>

<!--    IF USER IS ON BUTIKKEN PAGE -->
    <?php

    if (isset($_GET['page']) && $_GET['page'] == 'products') {
        include "inc/cat_nav.php";
    }

    ?>



    <div class="main-content container-fluid">
        <div class="row">
            <aside class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-left">Mest populære</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item">Item 1</li>
                            <li class="list-group-item">Item 2</li>
                            <li class="list-group-item">Item 3</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-12">
                        <h4 class="text-left">Links</h4>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item">
								<a href="#">
								<img class="img-responsive" src="img/filial_1.jpg"></a>
                            </li>
                            <li class="list-group-item">
								<a href="#">
								<img class="img-responsive" src="img/filial_2.jpg"></a>
                            </li>
                            <li class="list-group-item">
								<a href="#">
								<img class="img-responsive" src="img/filial_3.jpg"></a>
                            </li>
                            <!--                            TODO make images as background-->
                        </ul>
                    </div>
                </div>
            </aside>
            <section class="col-xs-8 col-sm-8 col-md-8 col-lg-8">


                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-left"><?php echo $side_titel; ?></h4>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <?php
                        if (isset($side)) {
                            if (isset($side['side_indhold'])) {
                                echo $side['side_indhold'];
                            }

                            if (isset($side['side_include_filnavn']) && file_exists('inc/' . $side['side_include_filnavn'])) {
                                    include('inc/' . $side['side_include_filnavn']);
                            }

                        } else {
                            header('Location: error.php');
                        }
                    ?>
                </div>
            </section>
<!--            			INDKØBSKURV og LOGIN-->
            <aside class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div class="row">
                    <?php include 'inc/cart.php'; ?>
                </div>
                <hr>
                <div class="row">
                    <?php include 'inc/login.php' ?>
                </div>
            </aside>
        </div>
        <!--        For debugging-->
<!--        <div class="row">-->
<!--            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">-->
<!--                --><?php
//                show_dev_info();
//                ?>
<!--            </div>-->
<!--        </div>-->
    </div>

    <!-- Footer -->
    <?php include 'inc/footer.php'; ?>

</div>

<script src="../vendor/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js?lang=php"></script>

</body>
</html>
<?php
//session_destroy();

mysqli_close($mysqli);
ob_end_flush();
?>
