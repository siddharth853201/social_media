<?php
require_once('db.php');
$id = $_GET['id'];


if (isset($_POST['send'])) {

    $message = $_POST['name'];
    $sender = $_COOKIE['user'];

    $que = "insert into message_tbl (senderid,reciverid,message) values('$sender','$id','$message')";
    $res = mysqli_query($conn, $que);
}


include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');




?>



<div class="col-lg-9 bg-light text-dark ovrflw">

    <div class="card">
        <div class="card-header">
            <?php

            $query4 = "select * from social_media where userid='$id'";
            $result4 = mysqli_query($conn, $query4);
            $arr = mysqli_fetch_array($result4);
            if (empty($arr['image'])) { ?>
                <img src="image/logo.png" height="35px" width="35px" alt="Not found">
            <?php    } else { ?>

                <img src="<?= $arr['image'] ?>" height="35px" width="35px" alt="Not found">

            <?php     }
            ?>
            <a class="text-decoration-none text-dark mx-3 h5" href="#"><?= $arr['Name'] ?></a>
        </div>
    </div>

    <div class="row">
        <?php

        $sender = $_COOKIE['user'];
        $que1 = "select * from message_tbl where senderid='$sender' and reciverid='$id' or senderid='$id' and reciverid='$sender'  ORDER BY time ASC";
        $res1 = mysqli_query($conn, $que1);
        while ($row = mysqli_fetch_array($res1)) {

            if ($row['senderid'] == $sender) { ?>
                <h6 id="messagebg" class="text-dark" style="text-align:right; "><?= $row['message'] ?></h6>

            <?php } else { ?>
                <h6 class="text-danger "><?= $row['message'] ?></h6>
        <?php }
        } ?>
        
    </div>


    <form action="Message.php?id=<?= $id ?>" method="post">

        <div class="form-group px-5 fixed-bottom ">
            <!-- <label id="namelabel" class="text-white h4 ml-5">Enter the Name:</label><br> -->
            <div class="row">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9 d-flex flex-row mb-1">

                    <input class="form-control " type="text" name="name" placeholder="Message...">
                    <input class="bg-primary h6 text-center mx-1 rounded py-1 px-5" type="submit" value="Send" name="send">
                </div>

            </div>
        </div>

    </form>
</div>

<?php
include('includes/footer.php');
?>