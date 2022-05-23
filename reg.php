<?php
require_once('db.php');

if (isset($_COOKIE['user'])) {

    header('Location:home.php');
}

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "Insert into social_media (Name,Email,password) values ('$name','$email','$password')";
    if (mysqli_query($conn, $query)) {
        header('Location:login.php');
    } else {
        echo "Some thing is worng";
    }
}
?>
