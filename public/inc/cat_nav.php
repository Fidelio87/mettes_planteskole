<?php
/**
 * Created by PhpStorm.
 * User: 3529588
 * Date: 05/05/2017
 * Time: 10:34
 */

if (isset($_GET['category'])) {
    $kateori_url_id = mysqli_real_escape_string($mysqli, $_GET['category']);
} else {
    $kateori_url_id = '';
}

?>

<div class="row text-center">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <ul class="nav nav-pills">
            <?php

            $query = "SELECT * FROM kategorier ORDER BY kategori_id";
            $result = mysqli_query($mysqli, $query);

            if (!$result) {
                query_error($query, __LINE__, __FILE__);
            }

            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <li class="presentation <?php if ($row['kategori_id'] == $kateori_url_id) echo 'active"'; ?>">
                    <a href="index.php?page=products&category=<?php echo $row['kategori_id']; ?>"><?php echo $row['kategori_navn'];?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
