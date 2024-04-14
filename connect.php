<?php

session_start();

include("connection.php");

if(isset($_POST["email"]) && ($_POST["password"])){
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $connection->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    $record = $result->fetch_assoc();
    $_SESSION["username"] = $record["firstname"];
    $_SESSION["lastname"] = $record["lastname"];
    $_SESSION["email"] = $record["email"];
    $_SESSION["logged_in"] = true;

    header("Location:   index.php");

}

?>