<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 05/05/2017
 * Time: 08:32
 */

$kontakt_navn	= '';
$kontakt_emne	= '';
$kontakt_email	= '';
$kontakt_besked	= '';

if ( isset($_POST['contact_submit']) )
{
    $kontakt_navn	= $_POST['contact_name'];
    $kontakt_emne	= $_POST['contact_subj'];
    $kontakt_email	= $_POST['contact_email'];
    $kontakt_besked	= $_POST['contact_msg'];

    // Hvis en af felterne er tomme udskrives fejl
    if ( empty($kontakt_navn) || empty($kontakt_email) || empty($kontakt_emne)  || empty($kontakt_besked) )
    {
        echo '<p class="text-danger">Fejl! Ikke alle felter er udfyldt</p>';
    }
    // Ellers kan vi sende e-mail
    else
    {
        $modtager	= 'admin@planteskole.dk';
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        $headers .= 'From: '.$kontakt_navn.' <'.$kontakt_email.'>' . "\r\n";

        // Send mail
        mail($modtager, $kontakt_emne, $kontakt_besked, $headers);

        echo '<p class="text-success">Tak for din henvendelse. Vi vil svare hurtigst muligt!</p>';

        // Nulstil værdier i formular
        $kontakt_navn	= '';
        $kontakt_emne	= '';
        $kontakt_email	= '';
        $kontakt_besked	= '';
    }
}
else
{
    // Hvis bruger er logget på gemmes oplysninger fra session i variabler der bruges i formular
    if ( isset($_SESSION['UUID']) )
    {
        $kontakt_navn	= $_SESSION['bruger_navn'];
        $kontakt_email	= $_SESSION['bruger_email'];
    }
}


?>

<div class="container">

    <p>Dansevej 74<br>4000 Holbæk<br>
    </p>
    <p><i class="fa fa-phone"></i>
        <abbr title="Phone">Tlf</abbr>: 59441234</p>
    <p><i class="fa fa-envelope-o fa-fw"></i>
        <abbr title="Email">email</abbr>: <a href="mailto:landrup@dans.dk">landrup@dans.dk</a></p>

    <h3><i class="fa fa-clock-o fa-fw"></i> Åbningstider</h3>
    <p>Man - 9.00 til 17.00</p>

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
            <textarea class="form-control" cols="16" rows="3" name="contact_msg" placeholder="Skriv din besked her."></textarea>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="contact_submit" value="" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>