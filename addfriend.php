<?php

//*********************** */ if cookie is not set so go to login pages**********************


if (!isset($_COOKIE['user'])) {
    header('Location:login.php'); 
}


// ***************************************************************


require_once('db.php');

// ************************ select social media table from data base************************

$quary = "select * from social_media";
$result = mysqli_query($conn, $quary);


// *******************************************************************

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="opacity:inherit;" class="bg-light">


    <?php
 //*************     */ include navbar sidebar and header on every pages  *************************

    include('includes/navbar.php'); 
    include('includes/sidebar.php');
    include('includes/header.php');



// ********************************************************************

    ?>

<!-- ********************************* Show all list for make friends ************************************* -->

    <div class="col-lg-9 text-danger ovrflw">

        <table>

        <!-- ********************* Show profile heading ****************************** -->
            <tr>
                <th class="text-dark">Profile</th>
                <th class="text-center text-dark h5 w-50 ">Name</th>
                <th class="text-center text-dark w-50 h5 ">Add Friends</th>
            </tr>

        <!-- ***************************************************************************** -->
            <?php while ($row = mysqli_fetch_array($result)) { // fetch array of social medie database table

                $senderid = $_COOKIE['user']; // Get cookie

                $qu = "select * from request_tbl where senderid='$senderid' and Requserid='" . $row['userid'] . "' or senderid='" . $row['userid'] . "' and Requserid='$senderid'";
                $re = mysqli_query($conn, $qu); // if senderid  equal to reciver id and reciver equal to userid of clickible on th button or revers of this then  selsect thouse row
                $aarr = mysqli_fetch_array($re);
                if ($aarr['position'] != 1) {

                    // if position is not equal to 1 so, thouse id is not friend on sended rquest by sender. 


                    if ($row['userid'] != $_COOKIE['user']) {  // this is used for not present my name in out all friend list
            ?>

                        <tr>

                            <td>
                                <?php
                                if (empty($row['image'])) { ?>
                                    <!-- if prfile image is not present in database so bydefault image are present on thouse page -->
                                    <img class="rounded-pill" src="image/logo.png" alt="not Found" height="75px" width="75px">
                            </td>

                        <?php } else { ?>
                            <img class="rounded-pill" src="<?= $row['image'] ?>" alt="not Found" height="75px" width="75px"></td>

                        <?php }

                                //********************** */ This is used for if cookie is send request any one
                                //  so send requset then present cancle button and if 
                                // cookie is cancle request so present send button****************************

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

                        <!-- **************************************************************************************** -->

                        </tr>


            <?php  }
                }
            }

            ?>

        </table>


    </div>
<!-- **************************************************************************************** -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>