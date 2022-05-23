<?php

require_once('db.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$id = $_GET['id'];
$query = "select likes from post_tbl where UId='$id'";
$result = mysqli_query($conn, $query);
$post_data = mysqli_fetch_array($result);
$array = $post_data['likes'];



$arrays1 = explode(",", $array);

$arrays=array_unique($arrays1);
// print_r($arrays); die;

?>
<div class="col-lg-9 ovrflw bg-light">
    <table>


        <tr>
            <th class="text-dark">Profile</th>
            <th class="text-center text-dark h5 w-50 ">Name</th>
        </tr>
        <?php
        foreach ($arrays as $value) {
            $querys = "select * from social_media where userid='$value'";
            $result = mysqli_query($conn, $querys);
            $row = mysqli_fetch_array($result);   
                
        ?>

            <tr>
                <td>
                    <?php
                    if (empty($row['image'])) { ?>
                        <img class="rounded-pill" src="image/logo.png" alt="not Found" height="75px" width="75px">


                    <?php } else { ?>
                        <img class="rounded-pill" src="<?= $row['image'] ?>" alt="not Found" height="75px" width="75px">
                </td>

            <?php }  ?>
            </td>
            <td class="text-center text-dark h5 w-50 "><?= $row['Name'] ?> </td>

            </tr>

        <?php

        } ?>

    </table>
</div>

<?php include('includes/footer.php'); ?>