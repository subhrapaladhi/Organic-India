<?php
ob_start();
session_start();
require_once ("./header.php");
require_once ('./CreateDb.php');

if (!isset($_SESSION['admin'])) {
    header("Location: ./Login/login.php");
    exit;
}

$conn = new mysqli("localhost","root","RishabhB@7130R","Organic_India");
if($conn->connect_error){
    die("Connection to Mysql failed");
}

if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
        $query = "DELETE FROM sellers WHERE id=".$_GET['id'];
        $conn->query($query);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
<div class="container">
<h1 style="margin-top: 1%;">List of Sellers</h1>
<table class="table">
    <tr>
        <th>Seller Name</th>
        <th>Seller Email</th>
        <th>Remove</th>
    </tr>

<?php
$sellerDB = new CreateDb("Organic_India", "sellers");
$sellerList = $sellerDB->getData();

while($row = mysqli_fetch_assoc($sellerList)){
    $person = "
    <tr>
    <form action=\"sellerList.php?action=remove&id=".$row['id']."\" method=\"post\">
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td><button type=\"submit\" name=\"remove\">Remove</button></td>
    </form>
    </tr>
    ";
    echo $person;
}
?>
</table>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>