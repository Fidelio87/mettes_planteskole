<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 15/05/2017
 * Time: 17:20
 */

if (!isset($_SESSION['user']['id'])) {
    header('Location: index.php?page=create_user');
    exit;
}

$user_id = intval($_SESSION['user']['id']);



$query = "SELECT
            bruger_brugernavn,
            bruger_fornavn,
            bruger_efternavn,
            bruger_adresse,
            bruger_postnr,
            bruger_by,
            bruger_tlf,
            bruger_email
          FROM
            brugere
            WHERE
            bruger_id = $user_id
            AND 
            bruger_status = 1";

$result = $db->query($query);

if (!$result) query_error($query, __LINE__, __FILE__);

$row = $result->fetch_object();

// TODO: basic validation

if (isset($_POST['submit_update'])) {

    edit_user($user_id,
        $_POST['username'],
        $_POST['user_surname'],
        $_POST['user_lastname'],
        $_POST['password'],
        $_POST['conf_password'],
        $_POST['user_address'],
        $_POST['user_zip'],
        $_POST['user_city'],
        $_POST['user_phone'],
        $_POST['user_email'],
        '');
}

?>

<form method="post">
    <div class="form-group">
        <label for="name">Brugernavn</label>
        <input type="text" class="form-control" name="username" required value="<?php echo $row->bruger_brugernavn ?>">
    </div>
    <div class="form-group">
        <label for="name">Fornavn</label>
        <input type="text" class="form-control" name="user_surname" value="<?php echo $row->bruger_fornavn ?>">
    </div>
    <div class="form-group">
        <label for="name">Efternavn</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $row->bruger_efternavn ?>">
    </div>

    <div class="alert alert-info">
        <small class="help-block">Indtast kun ny adgangskode, hvis du ønsker at skifte den.</small>
        <div class="form-group">
            <label for="adgangskode" class="control-label">Adgangskode:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="bekraeft_adgangskode" class="control-label">Bekræft adgangskode:</label>
            <input type="password" name="conf_password" class="form-control">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                <label for="address">Adresse <span class="text-muted">(valgfri)</span></label>
                <input type="text" class="form-control" name="user_address" id="address" value="<?php echo $row->bruger_adresse ?>">
            </div>
        </div>
        <div class="col-sm-4 col-md-2">
            <div class="form-group">
                <label for="zip">Post nr. <span class="text-muted">(valgfri)</span></label>
                <input type="number" min="0000" max="9999" class="form-control" name="user_zip" value="<?php echo $row->bruger_postnr ?>">
            </div>
        </div>
        <div class="col-sm-8 col-md-4">
            <div class="form-group">
                <label for="city">By <span class="text-muted">(valgfri)</span></label>
                <input type="text" class="form-control" name="user_city" id="city" value="<?php echo $row->bruger_by ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="phone">Telefon <span class="text-muted">(valgfri)</span></label>
                <input type="number" min="00000000" max="99999999" class="form-control" name="user_phone" value="<?php echo $row->bruger_tlf ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="user_email" required value="<?php echo $row->bruger_email ?>">
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" name="submit_update" class="btn btn-primary"><i class="fa fa-save"></i> Redigér profil</button>
        <button type="reset" name="reset" class="btn btn-warning"> Ryd</button>
    </div>
</form>

<?php



?>
