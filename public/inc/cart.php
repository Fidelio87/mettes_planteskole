<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 07/05/2017
 * Time: 21:27
 */
?>

<h3>Kurv (<?php echo count($_SESSION['kurv']) ?>)</h3>

<form action="#" method="post" role="form">
    <?php

    if (isset($_GET['product_add'], $_GET['product_id'], $_GET['product_amount'])) {
        if (in_array($_GET['product_id'], array_keys($_SESSION['kurv']))) {
            $_SESSION['kurv'][$_GET['product_id']] += $_GET['product_amount'];
        } else {
            $_SESSION['kurv'][($_GET['product_id'])] = $_GET['product_amount'];
        }
    }

    if (isset($_POST['cart_update'], $_POST['product_amount'])) {
        foreach ($_POST['product_amount'] as $product_id => $amount) {
            if ($amount > 0) {
                $_SESSION['kurv'][$product_id] = $amount;
            } else {
                unset($_SESSION['kurv'][$product_id]);
            }
        }
    }

    if (isset($_GET['product_delete'], $_GET['product_id'])) {
        unset($_SESSION['kurv'][$_GET['product_id']]);
    }

    if (isset($_POST['cart_empty'])) {
        $_SESSION['kurv'] = [];
    }

    if (count($_SESSION['kurv']) > 0) {
    $product_id_array	= array_keys($_SESSION['kurv']);

    $product_id_array	= array_map('intval', $product_id_array);

    $product_id_csv		= implode(', ', $product_id_array);

    $query = 'SELECT 
            produkt_id, produkt_navn, produkt_pris
            FROM produkter
            WHERE produkt_id IN (' . $product_id_csv . ')
            AND produkt_status = 1';
        $result = mysqli_query($db, $query) or
        die(mysqli_error($db) . '<pre>' . $query . '</pre>' . 'Fejl i forespørgsel på linje: ' . __LINE__ . ' i fil: ' . __FILE__);

    ?>
<!--    <div class="table-responsive">-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Navn</th>
                    <th>#</th>
                    <th>Pris</th>
                    <th>I alt</th>
                    <th>Fjern</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $cart_sum = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $product_amount	= $_SESSION['kurv'][$row['produkt_id']];
                    $product_sum	= $product_amount * $row['produkt_pris'];
                    $cart_sum		+= $product_sum;
            ?>
                <tr>
                    <td class="small"><a href="index.php?page=product&product=<?php echo $row['produkt_id'] ?>"><?php echo $row['produkt_navn'] ?></a></td>
                    <td>
                        <p class="small"><?php echo $product_amount; ?></p>
<!--                        <div class="form-group-sm">-->
<!--                            <input class="form-control" type="number" name="amount[--><?php //echo $row['produkt_id'] ?><!--]" placeholder="--><?php //echo $product_amount; ?><!--" readonly>-->
<!--                        </div>-->
<!--                        <input type="number" name="amount[--><?php //echo $row['produkt_id']; ?><!--]" value="--><?php //echo $product_amount; ?><!--" required min="0" max="101" class="form-control" title="Antal">-->
                    </td>
                    <td><div class="form-group-sm"><?php echo $row['produkt_pris']; ?> ;-</div></td>
                    <td><a class="btn btn-xs btn-warning" href="index.php?page=products&product_delete=&product_id=<?php echo $row['produkt_id'] ?>"><i class="fa fa-minus-circle"></i></a></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td><a href="index.php?page=products&category=1"><i class="fa fa-chevron-circle-left"></i> Til produkter</a></td>
            </tr>
            </tbody>
        </table>
        <?php
        } else {
                alert('danger', 'kurven er tom');
            }
        ?>
<!--    </div>-->
    <div class="btn-group-sm">
        <button class="btn btn-sm btn-default" name="cart_empty"> Tøm kurv</button>
        <button class="btn btn-sm btn-default" name="cart_update"> Opdatér</button>
    </div>
    <div class="btn-group-sm btn-group-vertical">
        <a href="index.php?page=checkout" class="btn btn-sm btn-succes" name="cart_checkout"><i class="fa fa-shopping-cart"></i> Til kasse</a>
    </div>
</form>
