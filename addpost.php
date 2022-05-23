<?php
require_once('db.php');


// ***************** This is used for uplode post in post folder ***********************


if (isset($_POST['uploads'])) { // uploads is the name of submit button .

//*************Select the table when userid equal to cookie and then fetch array for acces data***** */
    $querys = "select * from social_media where userid=".$_COOKIE['user'];
    $results = mysqli_query($conn, $querys);
    $arr = mysqli_fetch_array($results);
// ***********************************************************


//**************** */ Get file using $_FILES and myfile is the name of file input and name,tmp_name is th pre define value 
 

    $file_name = $_FILES['myfile']['name'];
    $file_temp_name = $_FILES['myfile']['tmp_name'];

    $path = "post/" . $file_name; // path of file 

    move_uploaded_file($file_temp_name, $path); // move image in post folder
    $cooki = $_COOKIE['user'];
    $name = $arr['Name'];
    $query = "INSERT INTO post_tbl (id, Name, image)
    VALUES ('$cooki', '$name', '$path')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location:home.php');  // after the insert data in post table then located home pages
    } else {
        echo " file is not uploads please try again.";
    }
}

// *******************************************************
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


    <style>
        body {
            /* background-image: url('image/background.jpg'); */
            /* background-repeat: no-repeat; */
            background-color: gray;
        }

        #form {
            margin-left: 40%;
            margin-top: 20%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
    

    <!--  ********************** Select the file images for post *************************  -->
            <form id="form" action="" method="post" enctype="multipart/form-data">

                <!-- <label class="text-white"> any file for uploads:</label><br> -->

                <input type="file" name="myfile"><br>

                <br>
                <input class="px-4 bg-primary  rounded-pill" type="submit" name="uploads" value="uploads"><br>


            </form>

            <!-- ***********************************************-->


            
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>