<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 08/05/2017
 * Time: 14:19
 */

if (isset($_SESSION['user']['id']))
{
    redirect_to('Location: index.php');
    exit;
}

$name = $email  = '';

if (isset($_POST['create_user'])) {
    $name  = $db->escape_string($_POST['user_name']);
    $email = $db->escape_string($_POST['user_email']);

    if (empty($_POST['user_name']) ||
         empty($_POST['user_email']) ||
         empty($_POST['user_password']) ||
         empty($_POST['confirm_user_password']) ) {
        alert('warning', 'Alle felter er ikke udfyldt!');
    } else {
        $query =
            "SELECT 
				bruger_id 
			FROM 
				brugere
			WHERE 
				bruger_email = '$email'";
        $result = $db->query($query);

        if (!$result) query_error($query, __LINE__, __FILE__);

        if ($result->num_rows > 0) {
            alert('warning', 'Den indtastede e-mailadresse er ikke tilgængelig');
        } else {
            if ($_POST['user_password'] != $_POST['confirm_user_password']) {
                alert('warning', 'Indtastede kodeord skal være ens!');
            } else {
                $password_hash = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

                $query =
                    "INSERT INTO 
						brugere (bruger_brugernavn, bruger_email, bruger_password) 
					VALUES 
						('$name', '$email', '$password_hash')";
                $result = $db->query($query);

                if (!$result) query_error($query, __LINE__, __FILE__);

//                if ( login($email, $_POST['user_password']) ) {
//                    header('Location: index.php');
//                    exit;
//                }
            }
        }
    }
}
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <form method="post">
        <div class="form-group">
            <label for="name">Brugernavn</label>
            <input type="text" class="form-control" name="user_name" id="" required value="<?php echo $name; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="user_email" id="" required value="<?php echo $email; ?>">
        </div>

        <div class="form-group">
            <label for="password">Adgangskode</label>
            <input type="password" class="form-control" name="user_password" id="" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Bekræft adgangskode</label>
            <input type="password" class="form-control" name="confirm_user_password" id="" required>
        </div>

        <div class="form-group">
            <button type="submit" name="create_user" class="btn btn-primary"><i class="fa fa-user-plus"></i> Opret bruger</button>
        </div>
    </form>
</div>
