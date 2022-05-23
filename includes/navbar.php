<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->

        <img class="mx-4" src="image/logo.png" height="25px" width="25px" alt="Not found">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 h6 ">
                <li class="nav-item">
                    <a class="nav-link text-white d-lg-none d-sm-block" href="userprofile.php">User Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="addfriend.php">Add Friends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="allfriends.php">Message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="recive.php">Show all Request</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">Logout</a>
                </li>
                <!-- <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="logout.php" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Logout</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="http://localhost/cookie/project/login.php">Login</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>

                        </ul>
                    </li> -->
            </ul>

            <form class="d-flex" action="search.php" method="post">
                <input class="form-control me-2" type="text" name="content" placeholder="Search" aria-label="Search">
                <input class="btn  bg-white text-black" type="submit" value="Search" name="search">
            </form>
        </div>
    </div>
</nav>