<?php
if (!isset($_COOKIE['user'])) {
    header('Location:login.php');
}
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$id = $_COOKIE['user'];
// $query="select * from social_media where userid='$id'";



$query = "SELECT Name,image
FROM social_media
ORDER BY time DESC";
$result = mysqli_query($conn, $query);



//******** Show all post present on home pages in descending order accoding to time********* */

$querys1 = "SELECT id,Name,image,UId
FROM post_tbl
ORDER BY time DESC";
$results1 = mysqli_query($conn, $querys1);

?>

<div class="col-lg-9 ovrflw bg-light">





    <?php
    while ($arr = mysqli_fetch_array($results1)) { 
        $nameid=$arr['id'];
        $query8="select * from social_media where userid='$nameid' ";
        $result8=mysqli_query($conn,$query8);
        $arr8=mysqli_fetch_array($result8);
        $image8=$arr8['image'];?>


        <div class="card">


            <?php if (empty($arr['image'])) {
                // If image is empty so cointinue the loop
                continue;
            } else {
            ?>
                <div class="card-header">

                    <!-- fetch the Name of post user from post_tbl  -->
                    <img class="rounded-pill" src="<?=$image8?>" height="25px" width="25px" >
                    <spen class="h5" ><?= $arr['Name'] ?></spen>

                <?php } ?>


                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <?php if (empty($arr['image'])) {
                            continue;
                        } else { ?>

                            <!-- Post image -->
                            <img src="<?= $arr['image'] ?>" height="100%" width="100%">
                        <?php  } ?>

                        <div class="card-header w-100">
                            <!-- Click on the heart and featch id of thous image from post_tbl  and Redirect on the like.php file -->
                            <a href="like.php?id=<?= $arr['UId'] ?>"><img src="image/heart.png" height="25px" width="25px"></a>

                            <!-- clike on the like button then goto seelike.php file with UID of thous button  -->
                            <a href="seelike.php?id=<?= $arr['UId'] ?>" class="rounded-pill border text-decoration-none text-white bg-primary px-2 h5">Likes</a>

                        </div>



                    </blockquote>
                </div>
        </div>
    <?php } ?>
    <!-- ************************************************************************ -->
    <?php
    include('includes/footer.php');
