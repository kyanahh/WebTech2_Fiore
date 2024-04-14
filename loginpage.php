<?php

include("connection.php");

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) == 1) {
        header('Location: loginpage.php');
        exit();
    } else if (mysqli_num_rows($result) == 0) {
        echo '<p class="text-danger">Incorrect email or password.</p>';
        exit();
    }
    
    mysqli_close($connection);
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
    <div>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffe9ec;">
            <div class="container-fluid">
                <a href="/carinalauricefernandez/landingpage.php" class="navbar-brand ms-5" style="font-family: Papyrus, fantasy; font-weight: bold;">FIORE</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-4">
                        <a href="/carinalauricefernandez/aboutpage.php" class="nav-item nav-link mx-4" style="font-family: Monaco, monospace; font-weight: bold;">ABOUT</a>
                        <a href="/carinalauricefernandez/contactpage.php" class="nav-item nav-link mx-4" style="font-family: Monaco, monospace; font-weight: bold;">CONTACT</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="container-fluid bg-image text-center p-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('https://images.unsplash.com/photo-1551499779-ee50f1aa4d25?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8N3x8fGVufDB8fHx8&w=1000&q=80'); 
    height: 80vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="card mx-auto mt-3 p-5" style="width: 500px;">
            <div class="card-body">
                <h1 class="h4 mb-4">Log in</h1>
                <form method="POST" action="connect.php">
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="ms-auto mt-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn fw-bold p-2" href="/carinalauricefernandez/index.php" value="submit" style="background-color: #ee959e;">Sign in</button>
                            <p class="text-center">Do not have an account yet? <a href="/carinalauricefernandez/registerpage.php" class="text-center mt-1 mb-0 text-decoration-none">Register here.</a></p>    
                        </div>
                    </div>
                </form>
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