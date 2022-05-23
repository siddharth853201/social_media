<?php
require_once('db.php');

include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

if (isset($_POST['search'])) {

    $name = $_POST['content'];
    $query = "select * from social_media where Name='$name'";
    $result = mysqli_query($conn, $query);
}
?>

<div class="col-lg-9 bg-light text-dark ovrflw">


    <table>
        <tr>
            <th class="text-dark">Profile</th>
            <th class="text-center text-dark h5 w-50 ">Name</th>
            <th class="text-center text-dark w-50 h5 ">Add Friends</th>
        </tr>


        <?php while ($row = mysqli_fetch_array($result)) {

            $senderid = $_COOKIE['user'];

            $qu = "select * from request_tbl where senderid='$senderid' and Requserid='" . $row['userid'] . "' or senderid='" . $row['userid'] . "' and Requserid='$senderid'";
            $re = mysqli_query($conn, $qu);
            $aarr = mysqli_fetch_array($re);
            if ($aarr['position'] != 1) {



                if ($row['userid'] != $_COOKIE['user']) { ?>

                    <tr>

                        <td>
                            <?php
                            if (empty($row['image'])) { ?>
                                <img class="rounded-pill" src="image/logo.png" alt="not Found" height="75px" width="75px">
                        </td>

                    <?php } else { ?>
                        <img class="rounded-pill" src="<?= $row['image'] ?>" alt="not Found" height="75px" width="75px"></td>

                    <?php }


                            $coo = $_COOKIE['user'];
                            $req = $row['userid'];
                            $quarys = "select * from request_tbl where senderid='$coo' and Requserid='$req' ";
                            $res = mysqli_query($conn, $quarys);
                            $quarysss = "select * from request_tbl where senderid='$req' and Requserid='$coo' ";
                            $resultsss = mysqli_query($conn, $quarysss);
                            if (mysqli_num_rows($res) == 0 && mysqli_num_rows($resultsss) == 0) { ?>
                        <td class="text-center text-dark h5 w-50 "><?= $row['Name'] ?> </td>
                        <td class="text-center text-dark w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-5 py-1 text-white" href="friendrequest.php?id=<?= $row['userid'] ?>"> Add</a></td>

                    <?php } else { ?>
                        <td class="text-center text-dark h5 w-50 "><?= $row['Name'] ?> </td>
                        <td class="text-center text-dark w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-5 py-1 text-white" href="requestcancle.php?id=<?= $row['userid'] ?>">Cancel</a></td>

                    <?php  } ?>



                    </tr>


        <?php  }
            }
        }

        ?>

    </table>









</div>
<?php 
include('includes/footer.php');
