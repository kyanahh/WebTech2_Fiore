<?php

include("connection.php");

session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
    header("location: loginpage.php");
    exit();
}

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

$username = $_SESSION["username"];
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

if (empty($email)) {
    $errorMessage = "Email parameter is missing.";
} else {
    $sql = "SELECT users.firstname, orders.type, orders.address
    FROM orders
    INNER JOIN users ON orders.usersid = users.usersid
    WHERE users.firstname = '$username'";
}

// Retrieve the user's bookings
$sql = "SELECT orders.orderid, users.firstname, orders.type, orders.address
        FROM orders
        INNER JOIN users ON orders.usersid = users.usersid
        WHERE users.firstname = '$username'";

$result = mysqli_query($connection, $sql);

$type = $address = $successMessage = $errorMessage = "";

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = mysqli_real_escape_string($connection, $_POST["type"]);
    $address = mysqli_real_escape_string($connection, $_POST["address"]);


    // Check if any field is empty
    if (empty($type) || empty($address)) {
        $errorMessage = "All fields are required";
    } else {
        // Retrieve the loginid based on the username
        $username = $_SESSION['username'];
        $query = "SELECT usersid FROM users WHERE firstname = '$username'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        $usersid = $row['usersid'];

        // Insert the booking into the database
        $book = "INSERT INTO orders (usersid, type, address) 
                    VALUES ('$usersid', '$type', '$address')";
        if (mysqli_query($connection, $book)) {
            $_SESSION["success_message"] = "Order added successfully";
            header("location: orders.php");
            exit();
        } else {
            $_SESSION["error_message"] = "Error: " . mysqli_error($connection);
        }
    }
}

// Handle delete button click
if(isset($_POST['delete'])) {
    $orderid = mysqli_real_escape_string($connection, $_POST['orderid']);

    // Delete booking from database
    $sql = "DELETE FROM orders WHERE orderid='$orderid'";
    if(mysqli_query($connection, $sql)) {
        $_SESSION['success_message'] = "Order deleted successfully";
        header("location: orders.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error deleting booking: " . mysqli_error($connection);
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
        <div class="card mx-auto p-4" style="width: 500px;">
            <div class="card-body">
                <h1 class="h3">Book Now</h1>
                    <?php
                        if (!empty($errorMessage)) {
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                    ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row">
                            <div class="col-sm-12 mt-3">
                                <select class="form-select" name="type" id="type" value="<?php echo $type; ?>">
                                    <option selected>Please Choose Flower Type</option>
                                    <option value="Custom Bouquets">Custom Bouquets</option>
                                    <option value="Occassion Flowers">Occassion Flowers</option>
                                    <option value="Premade Bouquets">Premade Bouquets</option>
                                </select>
                            </div>
                    </div>
                    <div class="row mt-4">
                        <div class="mb-3 col-md-12">
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $address; ?>">                            
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
                    <div class="row mt-3">
                        <div class="mb-3 col-md-12">
                            <button class="btn fw-bold px-4" href="/carinalauricefernandez/orders.php" value="Submit" style="background-color: #ee959e;">Save Changes</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <hr class="my-5">
        <div class="container-fluid mt-3">
        <div class="card mx-5" style="height: 500px;">
            <div class="card-body p-3 mx-4">
                <h1 class="h4 my-5">Order History</h1>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-label col-sm-3" id="myInput" onkeyup="myFunction()" placeholder="Search">
                    </div>
                </div>
                <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table text-center" id="myTable">
                        <thead>
                            <tr>
                                <th>Flower Type</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row['type'] . "</td><td>" . $row['address'] . "</td>" . "<td>
                                    <form method='POST'>
                                        <input type='hidden' name='orderid' value='" . $row['orderid'] . "'>
                                        <button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#exampleModal'>Delete</button>
                                        
                                        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                          <div class='modal-dialog'>
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Confirm Delete</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                              </div>
                                              <div class='modal-body'>
                                                Are you sure you want to delete this booking?
                                              </div>
                                              <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </form>
                                  </td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                var display = false;
                // Loop through all table columns, and check if any column matches the search query
                for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                td = tr[i].getElementsByTagName("td")[j];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    display = true;
                    break;
                    }
                }
                }
                // Set the row display style based on whether any column matches the search query
                if (display) {
                tr[i].style.display = "";
                } else {
                tr[i].style.display = "none";
                }
            }

            // If the search field is empty, show all rows
            if (filter.length === 0) {
                for (i = 0; i < tr.length; i++) {
                tr[i].style.display = "";
                }
            }
        }

    </script>

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