<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 28/04/2017
 * Time: 11:04
 */

?>

<!--                KONTAKTOPLYSNINGER-->
<div class="row">
    <address class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3>Kontakt</h3>
        <ul class="list-group">
            <?php

            $query = "SELECT adresse_navn, 
                              adresse_gade, 
                              adresse_husnr, 
                              adresse_postnr, 
                              adresse_by, 
                              adresse_tlf, 
                              adresse_email 
                      FROM adresser
                      WHERE adresse_status = 1
                      ORDER BY adresse_id";
            $result = $db->query($query);

            if (!$result) { query_error($query, __LINE__, __FILE__); }

            while ($row = $result->fetch_object()) {

                ?>
                <li class="list-group-item"><b><?php echo $row->adresse_navn; ?></b></li>
                <li class="list-group-item"><?php echo $row->adresse_gade . " " . $row->adresse_husnr; ?></li>
                <li class="list-group-item"><?php echo $row->adresse_postnr . " - " . $row->adresse_by; ?></li>
                <li class="list-group-item"><?php echo $row->adresse_tlf; ?></li>
                <li class="list-group-item"><a href="mailto:<?php echo $row->adresse_email ?>" target="_blank">
                        <?php echo $row->adresse_email; ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </address>
    <!--                TIDER-->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3>Åbningstider</h3>
        <ul class="list-group">
            <?php
            //here we query the db for different times, but also edit the format in the process
            //to display only hours and minutes (24h)
            //we also limit the listing for safety measures
            $query = "SELECT TIME_FORMAT(tidspunkt_tid_fra, '%H.%i') AS tidspunkt_fra, 
                        TIME_FORMAT(tidspunkt_tid_til, '%H.%i') AS tidspunkt_til, 
                        tidspunkt_ugedag
                      FROM tidspunkter
                      ORDER BY tidspunkt_id
                      LIMIT 7";
            $result = $db->query($query);

            if (!$result) {
                query_error($query, __LINE__, __FILE__);
            }

            while ($row = $result->fetch_object()) {
                ?>
                    <li class="list-group-item list-group-item-info">
                        <?php echo $row->tidspunkt_ugedag . ': '
                            . $row->tidspunkt_fra . ' - '
                            .   $row->tidspunkt_til;
                        ?>
                    </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
