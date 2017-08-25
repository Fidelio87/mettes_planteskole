<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 27/04/2017
 * Time: 08:52
 */

if (isset($_POST['submit_login'])) {
    if (login($_POST['user_email'], $_POST['user_passw'])) {
        header('Location: index.php');
        exit;
    }
}
?>

<form action="#" method="post" id="login-form" role="form">
    <h4>Login</h4>
    <div class="form-group">
        <label for="brugernavn"></label>
        <input type="email" class="form-control" name="user_email" id="" placeholder="ex. navn@domæne.dk" required>
        <label for="password"></label>
        <input type="password" class="form-control" name="user_passw" id="" placeholder="Password ex. '123'" required>
    </div>
    <button type="submit" value="" name="submit_login" class="btn btn-primary pull-right"><i class="fa fa-user fa-fw"></i> Login</button>
</form>
<!--                    Make this design choice conditional-->
<span class="text-info">Ikke bruger? </span><a href="index.php?page=create-user"><h5><i class="fa fa-user-plus fa-fw"></i> Opret bruger</h5></a>
