<?php
require_once('db.php');

// select those row when featch id from home.php after click on the heart icon.
$query = "select * from post_tbl where UId=" . $_GET['id'];
$result = mysqli_query($conn, $query);
$arr = mysqli_fetch_array($result);

$like = $arr['likes']; // fetch likes coloums of their row when UID is equal to get_id.

if (empty($like)) {
    // if like is empty so store user cookie id
    $likes = $_COOKIE['user'];
} else {
    //  if like is not empty so congate with comma 
    $likes = $like . ',' . $_COOKIE['user'];
}

// and update cookie when user is like the phote 
$querys = "UPDATE post_tbl
SET likes='$likes'
WHERE UId=" . $_GET['id'];
mysqli_query($conn, $querys);
header('Location:home.php');
