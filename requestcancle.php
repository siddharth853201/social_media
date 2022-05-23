<?php
require_once('db.php');
$id=$_GET['id'];
$query="DELETE FROM request_tbl WHERE Requserid='$id'";
mysqli_query($conn,$query);
header('Location:addfriend.php');


?>