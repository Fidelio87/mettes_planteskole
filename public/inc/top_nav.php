<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 27/04/2017
 * Time: 08:52
 */

?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-apple fa-fw"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav">
                <?php
                $query	= "SELECT side_url_navn, side_nav_label FROM sider WHERE side_status = 1 AND side_url_navn != '' AND side_nav_visning = 1 ORDER BY side_nav_sortering";
                $result	= mysqli_query($db, $query) or die( mysqli_error($db) );
                while( $row = mysqli_fetch_assoc($result) )
                {
                    ?>
                    <li<?php if ($row['side_url_navn'] == $side_url_navn) echo ' class="active"'; ?>>
                        <a href="index.php?page=<?php echo $row['side_url_navn']; ?>"><?php echo $row['side_nav_label']; ?></a>
                    </li>
                    <?php
                }
                ?>
<!--                <li>-->
<!--                    <a href="#">Forsiden</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">Butikken</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">Kontakt</a>-->
<!--                </li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['user']['id'])) {
                    $current_user_id = intval($_SESSION['user']['id']);
                    $query	=
                        "SELECT 
								bruger_brugernavn
							FROM 
								brugere
							WHERE 
								bruger_id = $current_user_id";
                    $result = $db->query($query);

                if (!$result) query_error($query, __LINE__, __FILE__);

                $user = $result->fetch_object();
//                var_dump($user);
                ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->bruger_brugernavn; ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if ($_SESSION['user']['access_level'] >= 10) { ?>
                        <li><a href="#"></a> Administration</li>
                        <?php } ?>
                        <li><a href="index.php?page=update-user"> Redigér profil</a> </li>
                        <li><a href="index.php?logout"> Log af</a> </li>
                    </ul>

                </li>
                <?php
                } else {
                    echo '<li><a href="index.php#login-form"> Log ind</a></li>';
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
