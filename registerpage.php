<?php

include("connection.php");

$firstname  = $lastname = $email = $password = $errorMessage = $successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
        $errorMessage = "All fields are required";
    } else {
        $result = $connection->query("INSERT INTO users (firstname, lastname, email, password) VALUES('$firstname', '$lastname', '$email', '$password')");

        if (!$result) {
            $errorMessage = "Invalid query " . $connection->error;
        } else {
            $successMessage = "Client added successfully";
            header("location: /carinalauricefernandez/loginpage.php");
            exit;
        }
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
    height: 93vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
        <div class="card mx-auto p-5" style="width: 500px;">
            <div class="card-body">
                <h1 class="h4 mb-4">Sign Up</h1>
                <form method="POST" action="<?php htmlspecialchars("SELF_PHP"); ?>">
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-sm-12">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $password; ?>">
                        </div>
                    </div>
                    <div class="ms-auto mt-3">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn fw-bold p-2" href="/carinalauricefernandez/index.php" value="submit" style="background-color: #ee959e;">Sign Up</button>
                            <p class="text-center">Already have an account? <a href="/carinalauricefernandez/loginpage.php" class="text-center mt-1 mb-0 text-decoration-none">Sign in here.</a></p>    
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