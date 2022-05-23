<?php
require_once('db.php');

if (isset($_POST['uploads'])) {
    $file_name = $_FILES['myfile']['name'];
    $file_temp_name = $_FILES['myfile']['tmp_name'];
    $path = "upload/" . $file_name;
    move_uploaded_file($file_temp_name, $path);
    $cooki = $_COOKIE['user'];
    $query = "UPDATE social_media SET image='$path' WHERE userid='$cooki'";
    $result = mysqli_query($conn, $query);
    $query1="select * fro m social_media";
    $result1 = mysqli_query($conn,
     $query1);
    $arr=mysqli_fetch_array($result1);
     ?>

    <img src="<?=$arr['image']?>">

<?php

    if ($result) {
        echo " file uploads sucessfully";
        header('Location:home.php');
    } else {
        echo " file is not uploads please try again.";
    }
}
?>
