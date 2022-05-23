<?php

require_once('db.php');

include('includes/navbar.php');
include('includes/sidebar.php');
include('includes/header.php');



?>

<div class="col-lg-9 text-danger ovrflw">



    <table>
        <tr>
            <th>Profile</th>
            <th class="text-center text-dark h5 w-50 ">Name</th>
            <th class="text-center text-dark h5 w-50 ">Messages</th>
        </tr>

        <?php

//******************** */ select thouse id when position is equal to 1 ********************

        $query = "select * from request_tbl where position=1";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
        
            // *****************Then check condition if 
            // senderid equal to cookie then show me name of reciver id accound
            // otherwise show sender id.  *************************************


            if ($row['senderid'] == $_COOKIE['user']) {
                $reqestid = $row['Requserid'];

                // **********************if sender id is equal to cookie so select data from 
                // social medial main table when userid equal to reciver id*********************
                $query1 = "select * from social_media where userid='$reqestid'";
                $result1 = mysqli_query($conn, $query1);
                $arr = mysqli_fetch_array($result1);

        ?>

                <tr>

                    <?php if (empty($arr['image'])) { ?>

                      <td>  <img class="rounded-pill" src="image/logo.png" alt="not Found" height="75px" width="75px"> </td>

                        <td class="text-center text-dark h5 w-50 "><?= $arr['Name'] ?></td>
                    <td class="text-center text-dark w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-5 py-1 text-white" href="Message.php?id=<?=$arr['userid']?>">Messages</a></td>


                    <?php  } else { ?>

                        <td> <img class="rounded-pill" src="<?= $arr['image'] ?>" alt="not Found" height="75px" width="75px"></td>
                        <td class="text-center text-dark h5 w-50 "><?= $arr['Name'] ?></td>
                    <td class="text-center text-dark w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-5 py-1 text-white" href="Message.php?id=<?=$arr['userid']?>">Messages</a></td>

                </tr>

            <?php }
                }
                if ($row['Requserid'] == $_COOKIE['user']) {

                    // ******************if reciver id is equal to cookie then select data from social mediea table when 
                    // user id equal to reciver id.**********************************************
                   
                   
                    $reqestid = $row['senderid'];
                    $query2 = "select * from social_media where userid='$reqestid'";
                    $result2 = mysqli_query($conn, $query2);
                    $arr2 = mysqli_fetch_array($result2); ?>

            <tr>

                <?php if (empty($arr2['image'])) { ?>
                    <img class="rounded-pill" src="image/logo.png" alt="not Found" height="75px" width="75px">
                    <td class="text-center text-dark h5 w-50 "><?= $arr2['Name'] ?></td>
                    <td class="text-center text-dark w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-5 py-1 text-white" href="Message.php?id=<?=$arr2['userid']?>">Messages</a></td>


                <?php   } else { ?>

                    <td> <img class="rounded-pill" src="<?= $arr2['image'] ?>" alt="not Found" height="75px" width="75px"></td>
                    <td class="text-center text-dark h5 w-50 "><?= $arr2['Name'] ?></td>
                    <td class="text-center text-dark w-50 h5 "><a class="bg-primary border text-decoration-none h6 rounded-pill px-5 py-1 text-white" href="Message.php?id=<?=$arr2['userid']?>">Messages</a></td>


                <?php        } ?>
            </tr>




    <?php            }
            }

    ?>
    </table>
</div>