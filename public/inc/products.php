<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 28/04/2017
 * Time: 11:03
 */

?>

<div class="col-md-12">
<!--    <div class="row">-->

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="text-left">Produkt navn</div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="text-left">Pris</div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="text-left">Info</div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="text-left">Antal</div>
                </div>
            </div>
        </div>
        <div class="panel-body">
        <?php
            if (isset($_GET['category'])) {
                foreach(getProducts($_GET['category']) as $row) {
                    ?>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="text-left"><?php echo $row['produkt_navn']; ?></div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <div class="text-left"><?php echo $row['produkt_pris']; ?>;-</div>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="index.php?page=product&product=<?php echo $row['produkt_id']; ?>"><p class="text-info">
                                    <i class="fa fa-question-circle fa-fw"></i>
                                </p></a>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <form action="#" class="form-inline" role="form">
                                <div class="input-group">
                                    <input type="hidden" name="product_add" class="form-control">
                                    <input type="hidden" name="product_id" value="<?php echo $row['produkt_id']; ?>"
                                           class="form-control">
                                    <input type="number" name="product_amount" class="form-control" id="" value="1"
                                           min="1" max="99">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info">Tilføj til kurv</button>
                                     </span>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                }
            }
        ?>
        </div>
</div>