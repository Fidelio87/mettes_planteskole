<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 26/04/2017
 * Time: 21:33
 */

include '../config/config.php';
//include 'inc/functions.php';

?>

<!doctype html>
<html class="no-js" lang="da">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    FONTAWESOME CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<div class="main-body container-fluid">
    <!--    HEADER-->
    <header class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <img class="img-responsive img-center" src="img/layout/banner.jpg" alt="">
        </div>
    </header>
    <!--NAV-->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Forsiden</a>
                    </li>
                    <li>
                        <a href="#">Butikken</a>
                    </li>
                    <li>
                        <a href="#">Kontakt</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!--    IF USER IS ON BUTIKKEN PAGE -->

    <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="nav nav-pills">
                <li class="active presentation">
                    <a href="#">Home</a>
                </li>
                <li class="presentation">
                    <a href="#">Link</a>
                </li>
                <li>
                    <a href="#">Link</a>
                </li>
                <li>
                    <a href="#">Link</a>
                </li>
            </ul>
        </div>
    </div>

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
                        <h4 class="text-left">Forsiden</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Velkommen til Mettes Planteskole</h1>
                        <img class="img-responsive" src="img/lokation.jpg">
                        <h3>Lidt om os</h3>
                        <p>I udkanten af Roskilde finder du Mettes planteskole.
                            Vi er ikke så store, men vores produkter er altid i top.
                            Du kan besøge os på en af vores åbningsdage, eller du kan foretage en bestilling her på
                            hjemmesiden for senere afhentning.</p>
                    </div>
                </div>
                <!--                KONTAKT-->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <h3>Kontakt</h3>
                        <ul class="list-group">
                            <li class="list-group-item">x</li>
                            <li class="list-group-item">x</li>
                            <li class="list-group-item">x</li>
                            <li class="list-group-item">x</li>
                        </ul>
                    </div>
                    <!--                TIDER-->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <h3>Åbningstider</h3>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info">x</li>
                                <li class="list-group-item list-group-item-info">x</li>
                                <li class="list-group-item list-group-item-info">x</li>
                                <li class="list-group-item list-group-item-info">x</li>
                            </ul>
                        </div>
                    </div>
            </section>
            <!--			INDKØBSKURV og LOGIN-->
            <aside class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                <div class="row">
                    <h4 class="text-left">Indkøbskurv</h4>
					<form action="#" method="post" role="form">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Produkt</th>
                                    <th>Pris</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Example</td>
                                    <td>177</td>
                                </tr>
                                <tr>
                                    <td>asdaa</td>
                                    <td>45645</td>
                                </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <button type="submit" name="submit_kasse" value="" class="btn btn-primary pull-right"><i class="fa fa-shopping-cart fa-fw"></i> Til kasse</button>
					</form>
<!--                    <hr>-->
                </div>
                <div class="row">
                    <div class="row">
                        <form action="#" method="post" role="form">
                            <h4>Login</h4>
                            <div class="form-group">
                                <label for="brugernavn"></label>
                                <input type="text" class="form-control" name="bruger_navn" id="" placeholder="Brugernavn ex. 'hans'">
                                <label for="password"></label>
                                <input type="password" class="form-control" name="bruger_passw" id="" placeholder="Password ex. '123'">
                            </div>

                            <button type="submit" value="" name="" class="btn btn-primary pull-right"><i class="fa fa-user fa-fw"></i> Login</button>
                        </form>
                    </div>
<!--                    Make this design choice conditional-->
                    <div class="row">
                        <p class="text-info">Ikke bruger? </p><a href="#"><h5><i class="fa fa-user-plus fa-fw"></i> Opret bruger</h5></a>
                    </div>

                </div>
            </aside>
        </div>
        <!--        For debugging-->
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php
                show_dev_info();
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-center text-capitalize">Mettes Plante skole <span class="text-info">bla</span> -
                        <span class="text-info">bla</span> <span class="text-info">bla</span> <span class="text-info">bla</span>
                    </h5>
                    <p class="text-center">Copyright &copy; Mettes Planteskole 2017-</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>

</div>

<script src="../vendor/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
