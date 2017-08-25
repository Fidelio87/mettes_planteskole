<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 27/04/2017
 * Time: 08:52
 */

$query = "SELECT * FROM adresser
          WHERE adresse_status = 1";

$result = $db->query($query);

if (!$result) query_error($query, __LINE__, __FILE__);

$row = $result->fetch_object();
?>

<footer class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-center text-capitalize"><?php echo $row->adresse_navn; ?> <span class="text-info"><?php echo $row->adresse_gade; ?></span>
                    <span class="text-info"><?php echo $row->adresse_husnr; ?></span>,
                    <span class="text-info"><?php echo $row->adresse_postnr . ' - ' . $row->adresse_by; ?></span>
                    <span class="text-info">Tlf: <?php echo $row->adresse_tlf; ?></span>
                </h5>
                <p class="text-center">Copyright &copy; <?php echo $row->adresse_navn . ' ' . date('Y'); ?></p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer>
