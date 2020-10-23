<?php
ob_start();
session_start();

if (!isset($_SESSION['seller'])) {
    header("Location: ./Login/login.php");
    exit;
}

require_once('./header.php');

if (isset($_POST['data'])) {
    $product_name = trim($_POST['name']);
    $product_price = trim($_POST['cost']);
    $product_description = trim($_POST['description']);

    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_parts = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($file_parts));

    define('SITE_ROOT', realpath(dirname(__FILE__)));
    $fileName = rand() . "." . $file_ext;
    $dest = SITE_ROOT . "/upload/" . $fileName;

    move_uploaded_file($file_tmp, $dest);

    $conn = new mysqli("localhost", "root", "RishabhB@7130R", "Organic_India");
    if ($conn->connect_error) {
        die("Connection to Mysql failed");
    }
    $query = "INSERT INTO products (product_name, product_price, product_image,	product_description, sellerid) VALUES ('" . $product_name . "','" . $product_price . "','" . $fileName . "','" . $product_description . "','" . $_SESSION['seller'] . "')";
    if (!$result = $conn->query($query)) {
        die('There was an error running the query [' . $conn->error . ']');
    } else {
        echo "Product Added!";
    }
    echo "<h3>File uploaded successfully<h3>";
    header("Location: ./index.php");
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organic India</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <style>
        #loading-img {
            display: none;
        }

        .response_msg {
            margin-top: 10px;
            font-size: 13px;
            background: #E5D669;
            color: #ffffff;
            width: 250px;
            padding: 3px;
            display: none;
        }
        div.container{
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Product name">
            </div>
            <div class="form-group">
                <label for="cost">Product cost</label>
                <input type="number" name="cost" class="form-control" id="cost" placeholder="Product cost">
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload product image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>
            <input type="submit" name="data" class="btn btn-primary" />
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>