<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 26/04/2017
 * Time: 21:33
 */

require_once '../config/config.php';
include '../vendor/vendor/autoload.php';

if (isset($_GET['logout'])) {
    logout();
    redirect_to('index.php');
    exit;
}

$side_url_navn = isset($_GET['page']) ? $db->real_escape_string($_GET['page']) : '';

if (!isset($_SESSION['kurv'])) {
    $_SESSION['kurv'] = [];
}

$query = "
            SELECT 
              side_titel, side_indhold, side_include_filnavn
            FROM 
              sider
            LEFT JOIN 
              side_includes
            ON 
              fk_side_include_id = side_include_id
            WHERE 
              side_url_navn = '$side_url_navn' AND side_status = 1";

$result = $db->query($query) or die($db->errno);
$side = $result->fetch_object();

$side_titel = isset($side) ? $side->side_titel : 'HTTP 404';

?>

<?php include 'inc/head.php'; ?>

<body>
    <!--    MAIN BODY-->
    <div class="main-body container-fluid">
        <!--    HEADER-->
        <?php include 'inc/header.php'; ?>
        <!--NAV-->
        <?php include 'inc/top_nav.php'; ?>

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
                                <!--TODO: make images as background-->
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
                            if (isset($side->side_indhold)) {
                                echo $side->side_indhold;
                            }

                            if (isset($side->side_include_filnavn) && file_exists('inc/' . $side->side_include_filnavn)) {
                                include('inc/' . $side->side_include_filnavn);
                            }

                        } else {
                            redirect_to('error.php');
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
                        <?php include 'inc/login.php'; ?>
                    </div>
                </aside>
            </div>
    <!--                For debugging-->
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <?php
                    show_dev_info();
    //                check_fingerprint();
                    check_last_activity();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
        <?php include 'inc/footer.php'; ?>

        <?php include 'inc/scripts.php'; ?>

    <?php include 'inc/bottom.php'; ?>


<?php
//session_destroy();

mysqli_close($db);
ob_end_flush();
?>
