<?php

session_start();

if(isset($_SESSION["logged_in"])){
    if(isset($_SESSION["username"])){
        $textaccount = $_SESSION["username"];
    }else{
        $textaccount = "Account";
    }
}else{
    $textaccount = "Account";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FIORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="background-color: #ee959e;"><i class="bi bi-list"></i></button>
                <div class="offcanvas offcanvas-start bg-dark text-white" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title mt-3" id="offcanvasWithBothOptionsLabel">FIORE</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start ms-3" id="menu">
                        <li class="nav-item">
                            <a href="/carinalauricefernandez/index.php" class="nav-link align-middle px-0 fw-bold" style="color: #ee959e;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/carinalauricefernandez/profilepage.php" class="nav-link align-middle px-0 fw-bold" style="color: #ee959e;">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="/carinalauricefernandez/orders.php" class="nav-link align-middle px-0 fw-bold" style="color: #ee959e;">Orders</a>
                        </li>
                        <li>
                            <a href="/carinalauricefernandez/indexabout.php" class="nav-link px-0 align- fw-bold" style="color: #ee959e;">About</a>
                        </li>
                        <li>
                            <a href="/carinalauricefernandez/indexcontact.php" class="nav-link px-0 align-middle fw-bold" style="color: #ee959e;">Contact Us</a>
                        </li>
                        <li>
                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle px-4 mt-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php  echo $textaccount; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/carinalauricefernandez/logout.php">Logout</a></li>
                            </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>

                <a href="/carinalauricefernandez/landingpage.php" class="navbar-brand ms-5" style="font-family: Papyrus, fantasy; font-weight: bold;">FIORE</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-4">
                    </div>
                </div>
        </nav>
    </div>

    <div class="container-fluid bg-image text-center text-white p-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1551499779-ee50f1aa4d25?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8N3x8fGVufDB8fHx8&w=1000&q=80'); 
    height: 80vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
        <h1 style="font-family: Garamond, serif; margin-top: 150px;">Make Your Special Day Special</h1>
        <p class="mt-n1 fs-5" style="font-family: Garamond, serif;">Whatever the occassion, our flowers will make it special.</p>
        <a type="button" class="btn px-3 fs-6" style="background-color: #ffe9ec; font-family: Monaco, monospace;
        font-weight: bold;" href="/carinalauricefernandez/index.php" role="button">SHOP</a>
    </div>

    <div class="container-fluid text-center" style="background-color: #ffe9ec;
    height: auto;">
        <p class="fs-6 pt-5" style="font-family: Monaco, monospace; font-weight: bold; color: #d3ab9e;">THIS IS WHAT WE DO</p>
        <h1 class="display-5" style="font-family: Garamond, serif;">Our Services</h1>

        <div class="card-group">
        <div class="row p-5">
            <div class="card col p-2 mx-2" style="height: auto;">
                <img src="https://bouqs.com/media/W1siZiIsIjIwMjEvMDgvMTYvMTkvNDQvMzgvMWViYzEyNjUtMTcwNC00MmJmLWJiZjgtMDZmNjM1NTVkYTEzL0FtZXRoeXN0XzUxODkuanBnIl1d/Amethyst_5189.jpg?sha=56db848ee4d31e6d" class="card-img-top" alt="First Pic">
                <div class="card-body" style="background-color: #d3ab9e">
                    <h5 class="card-title mt-3" style="font-family: Garamond, serif; font-weight: bold;">Custom Bouquets</h5>
                    <p class="card-text mt-3" style="font-family: Garamond, serif;">Do you have an acquired taste? From your favourite flowers to the rarest hidden secrets, we have what you need.</p>
                    <a type="button" class="btn fw-bold" href="/carinalauricefernandez/loginpage.php" role="button" style="background-color: #ee959e;">Buy Now</a>
                </div>
            </div>

            <div class="card col p-2 mx-2" style="height: auto;">
                <img src="https://www.theflowershed.com.au/wp-content/uploads/2020/03/pastel-bouquet-1024x1024.jpg" class="card-img-top" alt="First Pic">
                <div class="card-body" style="background-color: #d3ab9e">
                    <h5 class="card-title mt-3" style="font-family: Garamond, serif; font-weight: bold;">Occassion Flowers</h5>
                    <p class="card-text mt-3" style="font-family: Garamond, serif;">Favourite flowers for your special day or the perfect decoration for your next business event.</p>
                    <a type="button" class="btn fw-bold" href="/carinalauricefernandez/loginpage.php" role="button" style="background-color: #ee959e;">Buy Now</a>
                </div>
            </div>

            <div class="card col p-2 mx-2" style="height: auto;">
                <img src="https://i.pinimg.com/originals/a2/81/b3/a281b3b4c392be074e1338e04fd1b22b.jpg" class="card-img-top" alt="First Pic">
                <div class="card-body" style="background-color: #d3ab9e">
                    <h5 class="card-title mt-3" style="font-family: Garamond, serif; font-weight: bold;">Premade Bouquets</h5>
                    <p class="card-text mt-3" style="font-family: Garamond, serif;">Our florists are passionate about creating the most beautiful combinations of selected flowers.</p>
                    <a type="button" class="btn fw-bold" href="/carinalauricefernandez/loginpage.php" role="button" style="background-color: #ee959e;">Buy Now</a>
                </div>
            </div>
            </div>
        </div>

    </div>
    <hr>
    <footer>
        <div class="container-fluid row m-2">

            <div class="col-md-6">
                <p>Copyright &copy; 2023 Carina Laurice Fernandez</p>
            </div>

        </div>
    </footer>
</body>
</html>