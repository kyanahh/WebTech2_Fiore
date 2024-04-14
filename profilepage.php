<?php

session_start();

if(isset($_SESSION["logged_in"])){
    if(isset($_SESSION["username"]) && ($_SESSION["lastname"] && ($_SESSION["email"]))){
        $textaccount = $_SESSION["username"];
        $lastname = $_SESSION["lastname"];
        $email = $_SESSION["email"];
    }else{
        $textaccount = "Account";
    }
}else{
    $textaccount = "Account";
}

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION["email"];
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $result = $connection->query("SELECT password FROM users WHERE email = '$email'");
    $record = $result->fetch_assoc();
    $stored_password = $record["password"];
    if ($old_password == $stored_password) {
      $connection->query("UPDATE users SET password = '$new_password' WHERE email = '$email'");
      $_SESSION["success_message"] = "Password changed successfully";
    } else {
      $_SESSION["error_message"] = "Old password does not match";
    }
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

    <div class="container-fluid bg-image p-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1551499779-ee50f1aa4d25?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8N3x8fGVufDB8fHx8&w=1000&q=80'); 
    height: 80vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="card mx-auto" style="width: 500px;">
            <div class="card-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $textaccount; ?>" readonly>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" readonly>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <input type="email" class="form-control" name="email" placeholder="Email address" value="<?php echo $email; ?>" readonly>                            
                        </div>
                    </div>
                    <hr style="color: black;">
                    <div class="row">
                        <div class="mb-3 mt-3 col-md-12">
                            <input type="password" class="form-control" name="old_password" placeholder="Old Password">                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                            <?php
                            if (isset($_SESSION["success_message"])) {
                                echo "<label>" . $_SESSION["success_message"] . "</label>";
                                unset($_SESSION["success_message"]);
                            } elseif (isset($_SESSION["error_message"])) {
                                echo "<label>" . $_SESSION["error_message"] . "</label>";
                                unset($_SESSION["error_message"]);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <button class="btn fw-bold px-4" href="/carinalauricefernandez/profilepage.php" value="Submit" style="background-color: #ee959e;">Save Changes</button>
                        </div>
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