<?php


if (isset($_COOKIE['user'])) {
    header('Location:home.php');
}

require_once('db.php');

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "select * from social_media
    where email='$email' and password='$password'";

    $result = mysqli_query($conn, $query) or die('Error');

    if (mysqli_num_rows($result)) {
        $data = mysqli_fetch_array($result);
        $id = $data['userid'];
        setcookie('user', $data['userid'], time() + 86400, '/');

        //  setcookie('user', $data['id'], time() + 86400 * 30, '/');
        header('Location:login.php');
    } else {
        header('Location:login.php?login=false');
    }
}

?>



<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="login.Css"> -->

</head>

<body>
    <?php
    if (isset($_GET['login'])) {
        echo "<div class='alert alert-danger' role='alert'>
            Invalid Email or Password!
        </div>";
    }
    ?>





<img class="rounded mx-auto d-block my-5" src="image/logo.png" height="100px" width="100px" alt="Not found">


<div class="container">
    <form action="" method="post">

        <div class="row justify-content-center my-5">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                        <!-- <form class="form-horizontal" method="post" action="#"> -->

                           
                            <div class="form-group">
                                <label for="email" class="cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <!-- <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" require />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="cols-sm-2 control-label">Password</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <!-- <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span> -->
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your Password" require />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" name="login" class=" bg-primary rounded border border-white my-2">
                            </div>
                            <div class="login-register">
                                <a href="index.php">Registration</a>
                            </div>
                        <!-- </form> -->
                    </div>

                </div>
            </div>
        </div>
    </form>


</div>












    <!-- Bootstrap JavaScript Libraries -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>