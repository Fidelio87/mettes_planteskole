<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 05/05/2017
 * Time: 08:32
 */

$kontakt_navn = '';
$kontakt_emne = '';
$kontakt_email = '';
$kontakt_besked = '';

if (isset($_POST['contact_submit'])) {
    $kontakt_navn = $_POST['contact_name'];
    $kontakt_emne = $_POST['contact_subj'];
    $kontakt_email = $_POST['contact_email'];
    $kontakt_besked = $_POST['contact_msg'];

    if (empty($kontakt_navn) || empty($kontakt_email) || empty($kontakt_emne) || empty($kontakt_besked)) {
        echo '<p class="text-danger">Fejl! Ikke alle felter er udfyldt</p>';
    } else {
        $modtager = 'admin@planteskole.dk';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        $headers .= 'From: ' . $kontakt_navn . ' <' . $kontakt_email . '>' . "\r\n";

        mail($modtager, $kontakt_emne, $kontakt_besked, $headers);

        echo '<p class="text-success">Tak for din henvendelse. Vi vil svare hurtigst muligt!</p>';

        $kontakt_navn = '';
        $kontakt_emne = '';
        $kontakt_email = '';
        $kontakt_besked = '';
    }
} else {
    if (isset($_SESSION['UUID'])) {
        $kontakt_navn = $_SESSION['user_name'];
        $kontakt_email = $_SESSION['user_email'];
    }
}

?>
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
                $result = mysqli_query($db, $query);

                if (!$result) {
                    query_error($query, __LINE__, __FILE__);
                }

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
                        . $row->tidspunkt_til;
                    ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
    <div class="row">
        <form action="#" method="post" role="form" class="form-horizontal">
            <div class="form-group col-md-8">
                <label for="">Navn</label>
                <input type="text" class="form-control" name="contact_name" value="" id="" placeholder="Navn">
            </div>
            <div class="form-group col-md-8">
                <label for="">Emne</label>
                <input type="text" class="form-control" name="contact_subj" value="" id="" placeholder="Emne">
            </div>
            <div class="form-group col-md-8">
                <label for="">Email</label>
                <input type="email" class="form-control" name="contact_email" value="" id="" placeholder="@">
            </div>
            <div class="form-group col-md-8">
                <label for="">Besked</label>
                <textarea class="form-control" cols="16" rows="3" name="contact_msg"
                          placeholder="Skriv din besked her.">
            </textarea>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="contact_submit" value="" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    <div>