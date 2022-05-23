<?php
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');


require_once('db.php');

$query = "select * from request_tbl";
$result = mysqli_query($conn, $query) or die('Some Error');
// $query2 = "select * from social_media";
// $result2 = mysqli_query($conn, $query2) or die('Some Error in query2'); 
?>
<!-- <div class="container-fluid"> -->
<div class="col-lg-9 bg-light">

    <table class="my-2">
        <tr>
            <th class="text-dark"> Profile picture</th>
            <th class="text-center text-dark w-50 h5 "> All Request</th>
            <th class="text-center text-dark w-50 h5 "> Accept</th>
            <th class="text-center text-dark w-50 h5 "> Reject</th>
        </tr>
        <?php
        while ($row3 = mysqli_fetch_array($result)) {
            if ($row3['position'] != 1) {
                if ($row3['Requserid'] == $_COOKIE['user']) { ?>

                    <tr>
                        <?php if (empty($row3['images'])) { ?>
                            <td><img class="rounded-pill" src="image/logo.png" height="75px" width="75px"></td>

                        <?php } else { ?>



                            <td><img class="rounded-pill" src="<?= $row3['images'] ?>" alt="not Found" height="75px" width="75px"></td>

                        <?php }    ?>

                        <td class="text-center text-dark w-50 h5 "><?= $row3['recivername'] ?></td>
                        <td class="text-center  w-50 h5 "><a class="bg-primary  text-decoration-none border h6 rounded-pill px-2 py-1 text-white" href="Accept.php?id=<?= $row3['UID'] ?>">Accept</a1>
                        </td>
                        <td class="text-center  w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-2 py-1 text-white " href="Reject.php?id=<?= $row3['UID'] ?>">Reject</a1>
                        </td>
                    </tr>

        <?php }
            } else {
                continue;
            }
        } ?>

    </table>
</div>

<?php
include('includes/footer.php');
