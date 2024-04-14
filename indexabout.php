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

<body >

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

                <a href="/carinalauricefernandez/index.php" class="navbar-brand ms-5" style="font-family: Papyrus, fantasy; font-weight: bold;">FIORE</a>
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
    <br><br>
    <div class="container-fluid">
        <h1 class="text-center h4">ABOUT US</h1>
            <div class="mx-5 mt-5" style="font-family: 'Times New Roman', Times, serif;">
                <h1 class="h5 fw-bold">Welcome to Fiore website</h1>
                <p class="mt-4 h5">Fiore offers flowers, chocolates and souvenir delivery services. 
                    It is the most reliable and recognized leading company  in the TRNC floriculture market. 
                    Every order you make is covered by the warranty. We deliver flowers 24/7 in Nicosia, Kyrenia, 
                    Famagusta, Lefke, Güzelyurt, İskele city. Orders from all over the world are offered to you with 
                    the advantage of easy payment with all domestic and international cards. We carefully prepare and 
                    deliver your order to home, workplace, restaurant, hospital or anywhere else in North Cyprus. 
                    Do you live in another country and want to please your loved ones in North Cyprus? We help by delivering 
                    the beautiful products of your choice as quickly as possible. You can choose from a range of quality, 
                    fresh and varied products for your Valentine's day, birthday, father's day, mother's day, New Year's Eve 
                    and many more special occasions. For all your questions, opinions and complaints, you can contact us 
                    through our communication channels on our site</p>
                
            </div>
        </div>
    </div>
    <br><br>
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