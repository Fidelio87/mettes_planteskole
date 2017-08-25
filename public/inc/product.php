<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 06/05/2017
 * Time: 13:06
 */



//debug
//print_r($row);

if (isset($_GET['product'])) {
    foreach (getProduct($_GET['product']) as $row) {

        ?>


<div class="col-md-12">
    <div class="row text-left"><h3><?php echo $row['produkt_navn']; ?></h3></div>
    <div class="product-images row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <img src="img/planter/<?php echo strtolower($row['kategori_navn']) . '/'; echo $row['produkt_billede1']; ?>.jpg" class="img-responsive img-rounded" alt="billede af <?php echo $row['produkt_billede1']; ?>">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <img src="img/planter/<?php echo strtolower($row['kategori_navn']) . '/'; echo $row['produkt_billede2']; ?>.jpg" class="img-responsive img-rounded" alt="billede af <?php echo $row['produkt_billede2']; ?>">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <img src="img/planter/<?php echo strtolower($row['kategori_navn']) . '/'; echo $row['produkt_billede3']; ?>.jpg" class="img-responsive img-rounded" alt="billede af <?php echo $row['produkt_billede2']; ?>">
        </div>
    </div>
    <div class="row">
        <br>
        <p class="col-sm-12 col-lg-8"><i><?php echo $row['produkt_beskrivelse']; ?></i></p>
<!-- TODO: figure out a way to display placeholders if product does not have 3 pictures plus get correct collation for danish letters str8 -->
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <p><b>Jordtype:</b></p>
            <p><?php echo $row['jordtype_navn']; ?></p>
            <p><b>Dyrkningstid:</b></p>
            <p>
                <?php
                    if ($row['dyrk_maaned_fra'] == $row['dyrk_maaned_til']) {
                        echo $row['dyrk_maaned_fra'];
                    } else {
                        echo $row['dyrk_maaned_fra'] . ' - ' . $row['dyrk_maaned_til'];
                    }
                ?>

            </p>
            <p><b>Varenummer:</b></p>
            <p><?php echo $row['produkt_varenr']; ?></p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Køb nu</h3>
                </div>
                <div class="panel-body">
                    <p><b>Pris: <?php echo $row['produkt_pris']; ?>;-</b></p>
                    <form action="#" class="form-inline" role="form">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="hidden" name="product_add" class="form-control">
                                <input type="hidden" name="product_id" value="<?php echo $row['produkt_id']; ?>"
                                       class="form-control">
                                <span class="input-group-addon" id="">Antal: </span>
                                <input type="number" class="form-control" min="1" max="99" name="product_amount" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="submit_product" class="btn btn-primary">Put i kurv</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
} else {
    header('Location: error.php');
}
    ?>
