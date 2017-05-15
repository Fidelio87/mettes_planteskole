<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 27/04/2017
 * Time: 08:52
 */
?>

<form action="#" method="post" role="form">
    <h4>Login</h4>
    <div class="form-group">
        <label for="brugernavn"></label>
        <input type="text" class="form-control" name="user_name" id="" placeholder="Brugernavn ex. 'hans'" required>
        <label for="password"></label>
        <input type="password" class="form-control" name="user_passw" id="" placeholder="Password ex. '123'" required>
    </div>
    <button type="submit" value="" name="" class="btn btn-primary pull-right"><i class="fa fa-user fa-fw"></i> Login</button>
</form>
<!--                    Make this design choice conditional-->
<span class="text-info">Ikke bruger? </span><a href="index.php?page=create-user"><h5><i class="fa fa-user-plus fa-fw"></i> Opret bruger</h5></a>
