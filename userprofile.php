<?php
require_once('db.php');
$cooki = $_COOKIE['user'];
$query5 = "select * from social_media where userid='$cooki'";
$result5 = mysqli_query($conn, $query5);
$arr = mysqli_fetch_array($result5);

include('includes/header.php');
?>

<div class="container-fluid ">


    <div class="row">
        <div class="col-lg-3 d-lg-none d-sm-block" id="userprofile">
            <?php
            if (empty($arr['image'])) { ?>
                <a href="userimage.php"> <img class="rounded mx-auto rounded-circle d-block my-5" src="image/logo.png" height="100px" width="100px" alt="Not found"></a>

                <h4 class="text-center"><?=$arr['Name']?></h4>
            <?php } else { ?>
                <a href="userimage.php"> <img class="rounded mx-auto rounded-circle d-block my-5" src="<?= $arr['image'] ?>" height="100px" width="100px" alt="Not found"></a>

                <h4 class="text-center"><?=$arr['Name']?></h4>
            <?php }

            ?>

            <!-- <a href="#"><img class="text-center" src="image/logo.png" alt="Not Found" height="100px" width="100px"></a> -->
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center "> <a class="text-decoration-none" href="http://localhost/cookie/project/home.php">Home</a></h6>
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center "> <a class="text-decoration-none" href="http://localhost/cookie/project/allpost.php">Your All Post</a></h6>
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center "> <a class="text-decoration-none" href="http://localhost/cookie/project/addpost.php">Add Post</a></h6>
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center"> <a class="text-decoration-none" href="http://localhost/cookie/project/addfriend.php">Add Friends</a></h6>
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center"> <a class="text-decoration-none" href="http://localhost/cookie/project/allfriends.php">Messages</a></h6>
            <!-- <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center"> <a class="text-decoration-none" href="http://localhost/cookie/project/home.php">Add Stories</a></h6> -->
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center"> <a class="text-decoration-none" href="http://localhost/cookie/project/recive.php">Show all request</a></h6>
            <h6 class="border mx-lg-5 py-2 px-5 border-primary text-center"> <a class="text-decoration-none" href="http://localhost/cookie/project/logout.php">Login with another account</a></h6>
        </div>