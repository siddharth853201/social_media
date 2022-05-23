<?php
require_once('db.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');


// This is used for fetch all post of cookie .

$cookie = $_COOKIE['user'];
$query = "select image from post_tbl where id='$cookie'";
$result = mysqli_query($conn, $query);


?>
<div class="col-lg-9 ovrflw bg-light">

    <div class="row mt-5">
        <?php while ($arr = mysqli_fetch_array($result)) { ?>
            <div class="col-lg-3">
                <img src="<?= $arr['image'] ?>" height="300px" width="200px">
            </div>
        <?php } ?>

    </div>


</div>