<?php 
require_once("config.php");
if((isset($_POST['product_name'])&& $_POST['product_name'] !='') && (isset($_POST['product_price'])&& $_POST['product_price'] !=''))
{
 require_once("form.php");
 $productName = $conn->real_escape_string($_POST['product_name']);
$productPrice = $conn->real_escape_string($_POST['product_price']);
$description = $conn->real_escape_string($_POST['description']);
$productImage = $conn->real_escape_string($_POST['product_image']);


$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
    // echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
} else {
    // echo "Sorry, there was an error uploading your file.";
}


$image=basename( $_FILES["imageUpload"]["name"],".jpg"); 

$sql="INSERT INTO products (product_name, product_price, product_image) VALUES ('".$productName."','".$productPrice."','".$image."')";
if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Product Added!";
}
}
else
{
echo "Please fill the Product Details!";
}
?>