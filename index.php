<?php
ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ./User/index.php");
}

// if (isset($_SESSION['seller']) != "") {
//     header("Location: ./Seller/index.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Organic India
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target = "#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</header>


<div class="container">
    <div class="row">
        <div class="col">
            <a class="btn btn-lg btn-success" href="./User/Login/login.php" role="button">Buyer Signup</a>
        </div>
        <div class="col">
            <a class="btn btn-warning btn-lg" href="#" role="button">Seller Signup</a>
        </div>
    </div>
</div>
</body>
</html>