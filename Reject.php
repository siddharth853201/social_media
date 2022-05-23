<?php

require_once('db.php');
$id=$_GET['id'];
$query="DELETE FROM request_tbl WHERE UID='$id'";
if(mysqli_query($conn,$query)){

    header('Location:recive.php');

}

?>