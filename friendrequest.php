<?php
require_once('db.php');
$id = $_GET['id'];
$query = "SELECT * from social_media";
$result = mysqli_query($conn, $query) or die('Some Error');



$currentid = $_COOKIE['user'];

// ********************* find name and image of cookie ***********************
$query3 = "SELECT * FROM social_media WHERE userid='$currentid';";
$result2 = mysqli_query($conn, $query3) or die('Error');
$row4 = mysqli_fetch_array($result2);
$recivername = $row4['Name'];
$reciveimage = $row4['image'];

// *****************************************************************************



?>
<?php
if (!isset($_COOKIE['user'])) {
    header('Location:login.php');
}
include('includes/header.php');
include('includes/navbar.php');
// include('includes/sidebar.php');

?>
<div class="container-fluid">
    <div class="col-lg-9 bg-light text-dark ">
        <table>
            <!-- <tr>
                <th>Request</th>
            </tr> -->
            <?php
            while ($row1 = mysqli_fetch_array($result)) {

                // ******* if get id by previous page  is equal to userid in main tabile 
                // then find name  and insert in request table  ***********************

                if ($id == $row1['userid']) {
                    $name = $row1['Name'];

                    $query1 = "Insert into request_tbl (senderid,Requserid,ReqName,recivername,images) values ('$currentid','$id','$name','$recivername','$reciveimage')";
                    mysqli_query($conn, $query1) or die('query1 Error');
                    header('Location:addfriend.php');


            ?>

            <?php }
            } ?>
        </table>
    </div>
</div>


<?php
include('includes/footer.php');
